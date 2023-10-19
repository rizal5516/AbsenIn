<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-admin'); ?>
<?= session()->getFlashdata('pesan'); ?>

<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Absensi Hari Ini</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-editable">
                            <table id="datatable_absensi-hari-ini" class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Jumlah Pegawai</th>
                                        <th>Jumlah Masuk</th>
                                        <th>Jumlah Pulang</th>
                                        <th>Jumlah Izin</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($absensi != null) : ?>
                                        <tr>
                                            <td><?= ($absensi->jumlah_pegawai != null) ? "$absensi->jumlah_pegawai" : '0'; ?>
                                                Pegawai</td>
                                            <td><?= ($absensi->jumlah_absen_masuk != null) ? "$absensi->jumlah_absen_masuk" : '0'; ?>
                                                Pegawai</td>
                                            <td><?= ($absensi->jumlah_absen_keluar != null) ? "$absensi->jumlah_absen_keluar" : '0'; ?>
                                                Pegawai</td>
                                            <td><?= ($absensi->jumlah_izin != null) ? "$absensi->jumlah_izin" : '0'; ?>
                                                Pegawai</td>
                                            <td><?= ($absensi->total_pegawai != null) ? "$absensi->total_pegawai" : '0'; ?>
                                                Pegawai</td>
                                            <td>
                                                <span class="table-remove">
                                                    <a href="<?= base_url('admin/absen') ?>/<?= $absensi->kode_absensi; ?>" class="btn iq-bg-warning btn-rounded btn-sm my-0"> <i class="icon-open_in_new" data-placement="top" data-original-title="Detail">
                                                        </i></a></span>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Riwayat Absensi</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-editable">
                            <!-- <span class="table-add float-right mb-3 mr-2">
                                <a href="<?= base_url('admin/tambahDataPegawai') ?>" class="btn btn-sm iq-bg-info"><i class="icon-plus1"><span class="pl-1">Add
                                            New</span></i>
                                </a>
                            </span> -->
                            <div class="search-form mb-3 col-md-4 float-right">
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
                                        <th>Tanggal</th>
                                        <th>Jumlah Pegawai</th>
                                        <th>Jumlah Masuk</th>
                                        <th>Jumlah Pulang</th>
                                        <th>Jumlah Izin</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($riwayat_absen != null) : ?>
                                        <?php
                                        $no = 1;
                                        foreach ($riwayat_absen as $absen) : ?>
                                            <?php if ($absen->tgl_absen != date('d-M-Y', time())) : ?>
                                                <tr>
                                                    <td><?= $absen->tgl_absen; ?></td>
                                                    <td><?= $absen->jumlah_pegawai; ?> Pegawai</td>
                                                    <td><?= ($absen->jumlah_absen_masuk == null) ? 0 : $absen->jumlah_absen_masuk; ?>
                                                        Pegawai</td>
                                                    <td><?= ($absen->jumlah_absen_keluar == null) ? 0 : $absen->jumlah_absen_keluar; ?>
                                                        Pegawai</td>
                                                    <td><?= ($absen->jumlah_izin == null) ? 0 : $absen->jumlah_izin; ?> Pegawai</td>
                                                    <td><?= $absen->total_pegawai; ?> Pegawai</td>
                                                    <td>
                                                        <span class="table-remove"><a href="<?= base_url('admin/absen') ?>/<?= $absen->kode_absensi; ?>" class="btn iq-bg-warning btn-rounded btn-sm my-0"> <i class="icon-open_in_new" data-placement="top" data-original-title="Edit"></i></a></span>
                                                        <a href="<?= base_url('admin/hapus_absen'); ?>/<?= $absen->kode_absensi; ?>" class="table-remove btn-hapus" data-placement="top" data-original-title="Delete"><button class="btn iq-bg-danger btn-rounded btn-sm my-0"><i class="icon-delete"></i></button></a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
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
    $('#datatable_absensi-hari-ini').DataTable({
        "ordering": true,
        "lengthMenu": [
            [-1, 5, 10, 25, 50],
            ["All", 5, 10, 25, 50]
        ],
        dom: 'lfrtip',
    });

    $('#datatable_riwayat-absensi').DataTable({
        "ordering": true,
        "lengthMenu": [
            [-1, 5, 10, 25, 50],
            ["All", 5, 10, 25, 50]
        ],
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: 'Riwayat Absensi'
            },
            // 'csvHtml5',
            {
                extend: 'pdfHtml5',
                title: 'Riwayat Absensi'
            },
            {
                extend: 'print',
                title: 'Riwayat Absensi'
            }
        ],
        "order": [
            [1, "asc"]
        ]
    });

    // Ubah desain search field
    $('#filter_riwayat-absensi').on('keyup', function() {
        // Aktifkan fungsi search
        $('#datatable_riwayat-absensi').DataTable().search($('#filter_riwayat-absensi').val()).draw();
    });

    $('.absen-hari-ini').click(function(e) {
        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
            title: 'Kamu Yakin?',
            text: "Absen untuk hari ini akan dibuat!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, buat!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {

                document.location.href = href;

            }
        })
    })
</script>

<?= $this->endSection(); ?>