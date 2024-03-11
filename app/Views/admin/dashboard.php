<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-admin'); ?>

<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 col-12">
                <a href="<?= base_url('admin/index') ?>">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                                <i class="icon-user"></i>
                            </div>
                            <p class="text-secondary">Admin</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>1</b></h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-12">
                <a href="<?= base_url('admin/pegawai') ?>">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-danger">
                                <i class="icon-users"></i>
                            </div>
                            <p class="text-secondary">Pegawai</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b><?= count($pegawai); ?></b></h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-12">
                <a href="<?= base_url('admin/jabatan') ?>">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-success">
                                <i class="icon-briefcase"></i>
                            </div>
                            <p class="text-secondary">Jabatan</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b><?= count($jabatan); ?></b></h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Presensi Hari Ini</h4>
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Lokasi</h4>
                        </div>
                    </div>
                    <div class="card" style="height: 400px;">
                        <div class="card-body">
                            <iframe style="width: 100%; height: 95%;" class="w-100" src="https://www.google.com/maps?q=<?= $pengaturan->latitude; ?>,<?= $pengaturan->longitude; ?>&hl=es;z=14&output=embed" frameborder="0"></iframe>
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
</script>

<?= $this->endSection(); ?>