<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-admin'); ?>
<?= session()->getFlashdata('pesan'); ?>

<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Riwayat Presensi
                                <?= $absensi->tgl_absen; ?></h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-editable">
                            <div class="search-form mb-3 col-md-4 float-right">
                                <span class="table-add float-right mb-3">
                                    <a href="<?= base_url('admin/absensi') ?>" class="btn btn-sm iq-bg-danger"><i class="icon-arrow_back"><span class="pl-1">Kembali
                                            </span></i>
                                    </a>
                                </span>
                                <div class="input-group">
                                    <input type="text" id="filter_riwayat-absensi" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button type="button" id="filter_riwayat-absensi" class="btn user-bg-color text-white">Search</button>
                                    </div>
                                </div>
                            </div>
                            <table id="datatable_riwayat-absensi" class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Pegawai</th>
                                        <th>Presensi Masuk</th>
                                        <th>Presensi Pulang</th>
                                        <th>Total Jam Kerja</th>
                                        <th>Izin</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($detail_absensi != null) : ?>
                                        <?php
                                        foreach ($detail_absensi as $absen) : ?>
                                            <tr>
                                                <td><img src="<?= base_url('assets/img/pegawai'); ?>/<?= $absen->gambar; ?>" alt="pegawai" class="img-fluid rounded mr-2 mb-4" width="50px">
                                                    <div class="d-inline-block">
                                                        <a href="#"><strong><?= $absen->nama_pegawai; ?></strong></a>
                                                        <p class="text-muted" style="letter-spacing: 2px;">NIK: #<?= $absen->nip; ?></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php if ($absen->izin == null) : ?>
                                                        <?php if ($absen->absen_masuk == 0) : ?>
                                                            <span class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2">Belum Presensi</span>
                                                        <?php else : ?>
                                                            <?php if ($absen->status_masuk == 1) : ?>
                                                                <span class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2"><?= date('H : i', $absen->absen_masuk); ?></span>
                                                            <?php else : ?>
                                                                <?= date('H : i', $absen->absen_masuk); ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>

                                                    <?php else : ?>
                                                        IZIN
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($absen->izin == null) : ?>
                                                        <?php if ($absen->absen_keluar == 0) : ?>
                                                            <span class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2">Belum Presensi</span>
                                                        <?php else : ?>
                                                            <?= date('H : i', $absen->absen_keluar); ?>
                                                        <?php endif; ?>
                                                    <?php else : ?>
                                                        IZIN
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($absen->absen_keluar == 0) : ?>
                                                        <span class="btn iq-bg-info btn-rounded btn-sm my-0 mr-2">Data Tidak Lengkap</span>
                                                    <?php else : ?>
                                                        <?php
                                                        $absenMasuk = $absen->absen_masuk;
                                                        $absenKeluar = $absen->absen_keluar;
                                                        $timeDiffSeconds = $absenKeluar - $absenMasuk;
                                                        $hours = floor($timeDiffSeconds / 3600);
                                                        $minutes = floor(($timeDiffSeconds % 3600) / 60);
                                                        $seconds = $timeDiffSeconds % 60;
                                                        echo "$hours jam $minutes menit $seconds detik";
                                                        ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($absen->izin == null) : ?>
                                                        <span class="btn iq-bg-info btn-rounded btn-sm my-0 mr-2">Tidak</span>
                                                    <?php else : ?>
                                                        <?php if ($absen->status_izin == 0) : ?>
                                                            <span class="btn iq-bg-warning btn-rounded btn-sm my-0 mr-2">Pending</span>
                                                        <?php else : ?>
                                                            <span class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2">Di Izinkan</span>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($absen->izin == null) : ?>
                                                        <span class="table-remove"><a href="<?= base_url('admin/absen_pegawai') ?>/<?= $absen->kode_absensi; ?>/<?= $absen->pegawai; ?>" data-placement="top" data-original-title="Edit" class="btn iq-bg-warning btn-rounded btn-sm my-0"> <i class="icon-open_in_new"></i></a></span>
                                                    <?php else : ?>
                                                        <span class="table-remove"><a href="<?= base_url('admin/izin_pegawai') ?>/<?= $absen->kode_absensi; ?>/<?= $absen->pegawai; ?>" data-placement="top" data-original-title="Edit" class="btn iq-bg-warning btn-rounded btn-sm my-0"> <i class="icon-open_in_new"></i></a></span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#datatable_riwayat-absensi').DataTable({
        "ordering": true,
        "lengthMenu": [
            [-1, 5, 10, 25, 50],
            ["All", 5, 10, 25, 50]
        ],
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: 'Riwayat Absensi <?= $absensi->tgl_absen; ?>'
            },
            // 'csvHtml5',
            {
                extend: 'pdfHtml5',
                title: 'Riwayat Absensi <?= $absensi->tgl_absen; ?>'
            },
            {
                extend: 'print',
                title: 'Riwayat Absensi <?= $absensi->tgl_absen; ?>'
            }
        ]
    });

    // Ubah desain search field
    $('#filter_riwayat-absensi').on('keyup', function() {
        // Aktifkan fungsi search
        $('#datatable_riwayat-absensi').DataTable().search($('#filter_riwayat-absensi').val()).draw();
    });
</script>

<?= $this->endSection(); ?>