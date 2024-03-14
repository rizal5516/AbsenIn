<?= $this->extend('layout/pegawai'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-pegawai'); ?>
<?= session()->getFlashdata('pesan'); ?>

<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="iq-card col-md-6">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Presensi Masuk</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="col-lg-12">
                        <div class="card iq-mb-3">
                            <div class="row no-gutters">
                                <?php if ($detail_absen->absen_masuk != null) : ?>
                                    <div class="col-md-4">
                                        <center>
                                            <img src="<?= base_url('assets/img/pegawai'); ?>/<?= $detail_absen->bukti_masuk; ?>" class="card-img" alt="Bukti Masuk">
                                        </center>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <style>
                                                .list-group-item {
                                                    display: flex;
                                                    justify-content: space-between;
                                                }
                                            </style>
                                            <ul class="list-group">
                                                <li class="list-group-item"><span>Jadwal
                                                        Masuk:</span><?= $jabatan->jam_masuk; ?>
                                                </li>
                                                <li class="list-group-item"><span>Presensi Masuk:</span>
                                                    <?= date('H:i', $detail_absen->absen_masuk); ?></li>
                                                <li class="list-group-item"><span>Status Presensi:</span>
                                                    <?php if ($detail_absen->status_masuk == 0) : ?>
                                                        <span class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2">Sukses</span>
                                                    <?php else : ?>
                                                        <span class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2">Terlambat</span>
                                                    <?php endif; ?>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php else : ?>
                                        <div class="alert alert-danger">Belum Presensi Masuk</div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="iq-card col-md-6">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Presensi Pulang</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="col-lg-12">
                    <div class="card iq-mb-3">
                        <div class="row no-gutters">
                            <?php if ($detail_absen->absen_keluar != null) : ?>
                                <div class="col-md-4">
                                    <center>
                                        <img src="<?= base_url('assets/img/pegawai'); ?>/<?= $detail_absen->bukti_keluar; ?>" class="card-img" alt="Bukti Keluar">
                                    </center>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <style>
                                            .list-group-item {
                                                display: flex;
                                                justify-content: space-between;
                                            }
                                        </style>
                                        <ul class="list-group">
                                            <li class="list-group-item"><span>Jadwal Pulang:</span>
                                                <?= $jabatan->jam_keluar; ?>
                                            </li>
                                            <li class="list-group-item"><span>Presensi Pulang:</span>
                                                <?= date('H:i', $detail_absen->absen_keluar); ?>
                                            <li class="list-group-item"><span>Status Presensi:</span>
                                                <?php if ($detail_absen->status_keluar == 0) : ?>
                                                    <span class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2">Sukses</span>
                                                <?php else : ?>
                                                    <span class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2">Terlambat</span>
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="alert alert-danger">Belum Presensi Pulang</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>