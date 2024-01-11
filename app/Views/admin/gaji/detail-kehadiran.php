<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-admin'); ?>

<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Detail Kehadiran Bulanan <?= $pegawai->nama_pegawai; ?></h4>
                </div>
                <span class="table-add float-right mb-3 m-3 ">
                    <a href="<?= base_url('gaji/dataPenggajian') ?>" class="btn btn-sm iq-bg-danger"><i class="icon-arrow_back"><span class="pl-1">Back
                            </span></i>
                    </a>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-lg-3">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <img src="<?= base_url('assets/img/pegawai'); ?>/<?= $pegawai->gambar; ?>" class="img-fluid" alt="Responsive image">
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card iq-mb-3">
                    <div class="row no-gutters flex-row">
                        <div class="col-md-12">
                            <div class="card-body text-left">
                                <div class="iq-card-body">
                                    <form class="text-center">
                                        <!-- fieldsets -->
                                        <fieldset>
                                            <div class="form-card text-left">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" class="form-control" name="nama" value="<?= $pegawai->nama_pegawai; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>NIK</label>
                                                            <input type="number" class="form-control" name="nik" value="<?= $pegawai->nip; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Jabatan</label>
                                                            <input type="text" class="form-control" name="jabatan" value="<?= $pegawai->nama_jabatan; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <!-- <div class="iq-card">
                <div class="iq-card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-12">
                                <label for="bulanDetailKehadiran">Bulan</label>
                                <select class="form-control" id="bulanDetailKehadiran">
                                    <option selected="" disabled="">Pilih Bulan</option>
                                    <?php
                                    for ($i = 0; $i <= 12; $i++) {
                                        $monthName = date('F', strtotime("2023-$i-01"));
                                        echo "<option value='$i'>" . $monthName . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group col-12">
                                <label for="tahunDetailKehadiran">Tahun</label>
                                <select class="form-control" id="tahunDetailKehadiran">
                                    <option selected="" disabled="">Pilih Tahun</option>
                                    <?php
                                    $currentYear = date('Y');
                                    for ($i = $currentYear - 5; $i <= $currentYear; $i++) {
                                        echo "<option value='$i'>" . $i . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-body">
                            <div id="table-excel-pdf" class="table-editable">
                                <form class="search-form mb-3 col-md-4 float-right">
                                    <div class="input-group">
                                        <input type="text" id="filter_detail-kehadiran" class="form-control" placeholder="Search...">
                                        <div class="input-group-append">
                                            <button type="button" id="filter_detail-kehadiran" class="btn user-bg-color text-white">Search</button>
                                        </div>
                                    </div>
                                </form>
                                <table id="datatable_detail-kehadiran" class="table table-bordered table-responsive-md table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th colspan="3">Jam Masuk</th>
                                            <th colspan="3">Jam Keluar</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th>Keterangan</th>
                                            <th>Jam Masuk</th>
                                            <th>Menit Masuk</th>
                                            <th>Status</th>
                                            <th>Jam Keluar</th>
                                            <th>Menit Keluar</th>
                                            <th>Status</th>
                                            <th>Total Jam Kerja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($detail_absensi != null) : ?>
                                            <?php foreach ($detail_absensi as $abs) : ?>
                                                <tr>
                                                    <!-- Jam Masuk  -->
                                                    <td><?= date('d F Y', strtotime($abs->tgl_absen)); ?></td>
                                                    <td><?php if ($abs->absen_masuk == 0) : ?>
                                                            <span class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2">-</span>
                                                        <?php else : ?>

                                                            <?php if ($abs->status_masuk == 1) : ?>
                                                                <span class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2"><?= date('H', $abs->absen_masuk); ?>:00</span>
                                                            <?php else : ?>
                                                                <span class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2"><?= date('H', $abs->absen_masuk); ?>:00
                                                                </span>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>

                                                    <!-- Menit Masuk  -->
                                                    <td>
                                                        <?php if ($abs->absen_masuk == 0) : ?>
                                                            <span class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2">-</span>
                                                        <?php else : ?>
                                                            <?php if ($abs->status_masuk == 1) : ?>
                                                                <span class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2">00:<?= date('i', $abs->absen_masuk); ?></span>
                                                            <?php else : ?>
                                                                <span class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2">00:<?= date('i', $abs->absen_masuk); ?>
                                                                </span>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>

                                                    <!-- Status Masuk -->
                                                    <td>
                                                        <?php if ($abs->absen_masuk != 0) : ?>
                                                            <span class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2">Sudah Absen</span>
                                                        <?php else : ?>
                                                            <?php if ($abs->absen_masuk == 0) : ?>
                                                                <span class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2">Belum Absen</span>
                                                            <?php else : ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>


                                                    <!-- Jam Keluar -->
                                                    <td>
                                                        <?php if ($abs->absen_keluar == 0) : ?>
                                                            <span class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2">-</span>
                                                        <?php else : ?>
                                                            <?php if ($abs->status_keluar == 1) : ?>
                                                                <span class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2"><?= date('H', $abs->absen_keluar); ?>:00</span>
                                                            <?php else : ?>
                                                                <span class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2"><?= date('H', $abs->absen_keluar); ?>:00
                                                                </span>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>

                                                    <!-- Menit Keluar -->
                                                    <td>
                                                        <?php if ($abs->absen_keluar == 0) : ?>
                                                            <span class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2">-</span>
                                                        <?php else : ?>
                                                            <?php if ($abs->status_keluar == 1) : ?>
                                                                <span class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2">00:<?= date('i', $abs->absen_keluar); ?></span>
                                                            <?php else : ?>
                                                                <span class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2">00:<?= date('i', $abs->absen_keluar); ?>
                                                                </span>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>

                                                    <!-- Status Keluar -->
                                                    <td>
                                                        <?php if ($abs->absen_keluar != 0) : ?>
                                                            <span class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2">Sudah Absen</span>
                                                        <?php else : ?>
                                                            <?php if ($abs->absen_keluar == 0) : ?>
                                                                <span class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2">Belum Absen</span>
                                                            <?php else : ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>

                                                    <!-- Total Jam Kerja -->
                                                    <td>
                                                        <?php if ($abs->absen_keluar == 0) : ?>
                                                            <span class="btn iq-bg-info btn-rounded btn-sm my-0 mr-2">Data Tidak Lengkap</span>
                                                        <?php else : ?>
                                                            <?php if ($abs->status_keluar == 1) : ?>
                                                                <span class="btn iq-bg-info btn-rounded btn-sm my-0 mr-2">Telat Absen Pulang</span>
                                                            <?php else : ?>
                                                                <?php
                                                                $absenMasuk = $abs->absen_masuk;
                                                                $absenKeluar = $abs->absen_keluar;
                                                                $timeDiffSeconds = $absenKeluar - $absenMasuk;
                                                                $hours = floor($timeDiffSeconds / 3600);
                                                                $minutes = floor(($timeDiffSeconds % 3600) / 60);
                                                                $seconds = $timeDiffSeconds % 60;
                                                                echo "$hours jam $minutes menit $seconds detik";
                                                                ?>
                                                            <?php endif; ?>
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
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-body">
                            <div id="table-excel-pdf" class="table-editable">
                                <form class="search-form mb-3 col-md-4 float-right">
                                    <div class="input-group">
                                        <input type="text" id="filter_detail-bulan" class="form-control" placeholder="Search...">
                                        <div class="input-group-append">
                                            <button type="button" id="filter_detail-bulan" class="btn user-bg-color text-white">Search</button>
                                        </div>
                                    </div>
                                </form>
                                <table id="datatable_detail-bulan" class="table table-bordered table-responsive-md table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>Keterangan</th>
                                            <th>OnTime CheckIn</th>
                                            <th>OnTime CheckOut</th>
                                            <th>Total Jam Kerja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($detail_bulan != null) : ?>
                                            <?php foreach ($detail_bulan as $bln) : ?>
                                                <tr>
                                                    <td><?= date('F Y', strtotime($bln->bulanSaja)); ?></td>
                                                    <td><?= $bln->onTimeIn; ?></td>
                                                    <td><?= $bln->onTimeOut; ?></td>
                                                    <td>
                                                        <?php
                                                        // Tampilkan total jam kerja
                                                        $totalJamKerja = $bln->totalJamKerja ?? 0;
                                                        $totalHours = floor($totalJamKerja / 3600);
                                                        $totalMinutes = floor(($totalJamKerja % 3600) / 60);
                                                        $totalSeconds = $totalJamKerja % 60;
                                                        echo "$totalHours jam $totalMinutes menit $totalSeconds detik";
                                                        ?>
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
</div>

<script>
    $('#datatable_detail-kehadiran').DataTable({
        "ordering": true,
        "lengthMenu": [
            [-1, 5, 10, 25, 50],
            ["All", 5, 10, 25, 50]
        ],
        "pageLength": 31,
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: 'Detail Kehadiran <?= $pegawai->nama_pegawai; ?>',
            },
            // 'csvHtml5',
            {
                extend: 'pdfHtml5',
                title: 'Riwayat Absensi <?= $pegawai->nama_pegawai; ?>'
            },
            {
                extend: 'print',
                title: 'Riwayat Absensi <?= $pegawai->nama_pegawai; ?>'
            }
        ],
        "order": [
            [0, "desc"]
        ],
        // New code:
        "columnDefs": [{
            "type": "date",
            "targets": 0,
            "orderSequence": ["desc", "asc"]
        }]
    });

    $('#datatable_detail-bulan').DataTable({
        "ordering": true,
        "lengthMenu": [
            [-1, 5, 10, 25, 50],
            ["All", 5, 10, 25, 50]
        ],
        "pageLength": 5,
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: 'Detail Kehadiran <?= $pegawai->nama_pegawai; ?>'
            },
            // 'csvHtml5',
            {
                extend: 'pdfHtml5',
                title: 'Riwayat Absensi <?= $pegawai->nama_pegawai; ?>'
            },
            {
                extend: 'print',
                title: 'Riwayat Absensi <?= $pegawai->nama_pegawai; ?>'
            }
        ],
        "order": [
            [0, "desc"]
        ],
        // New code:
        "columnDefs": [{
            "type": "date",
            "targets": 0,
            "orderSequence": ["desc", "asc"]
        }]
    });

    // Ubah desain search field
    $('#filter_detail-kehadiran').on('keyup', function() {
        // Aktifkan fungsi search
        $('#datatable_detail-kehadiran').DataTable().search($('#filter_detail-kehadiran').val()).draw();
    });

    // Ubah desain search field
    $('#filter_detail-bulan').on('keyup', function() {
        // Aktifkan fungsi search
        $('#datatable_detail-bulan').DataTable().search($('#filter_detail-bulan').val()).draw();
    });
</script>

<?= $this->endSection(); ?>