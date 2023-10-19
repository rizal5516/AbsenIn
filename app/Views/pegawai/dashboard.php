<?php

use App\Models\AbsenDetailModel;

$AbsenDetailModel = new AbsenDetailModel();
?>

<?= $this->extend('layout/pegawai'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-pegawai'); ?>
<?= session()->getFlashdata('pesan'); ?>

<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Welcome <?= $pegawai->nama_pegawai ?></h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="stepwizard mt-2">
                            <div class="stepwizard-row setup-panel">
                                <div id="document" class="wizard-step">
                                    <a class="btn btn-default">
                                        <i class="icon-user text-danger"></i><span class="font-size-16"><?= $pegawai->nama_pegawai ?></span>
                                    </a>
                                </div>
                                <div id="bank" class="wizard-step">
                                    <a class="btn btn-default">
                                        <i class="icon-card_membership text-success"></i><span class="font-size-16"><?= $pegawai->nip ?></span>
                                    </a>
                                </div>
                                <div id="confirm" class="wizard-step">
                                    <a class="btn btn-default">
                                        <i class="icon-email text-warning"></i><span class="font-size-16"><?= $pegawai->email ?></span>
                                    </a>
                                </div>
                                <div id="user" class="wizard-step">
                                    <a class="btn btn-default">
                                        <img src="<?= base_url() ?>/assets/img/pegawai/<?= $pegawai->gambar ?>" class="avatar-user img-fluid rounded mr-3" alt="user-img">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PEMBERITAHUAN ABSEN -->
        <?php if ($pegawai->is_active == 1) : ?>
            <?php if ($absensi != null) : ?>
                <?php $detail_absen = $AbsenDetailModel->getByKodeAndIdPegawai($absensi->kode_absensi, session()->get('id_pegawai')); ?>

                <?php if ($detail_absen != null) : ?>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <div class="iq-card">
                                <div class="iq-card-body">
                                    <div class="table-responsive">
                                        <a href="<?= base_url('pegawai/absensi'); ?>">
                                            <table class="table">
                                                <tr>
                                                    <th>Absen Hari Ini</th>
                                                    <td><?= $detail_absen->tgl_absen; ?></td>

                                                    <?php if ($detail_absen->status_izin == 0) : ?>
                                                        <th>Masuk</th>
                                                        <td>
                                                            <?php if ($detail_absen->absen_masuk == 0) : ?>
                                                                <span class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2">Belum
                                                                    Absen</span>
                                                            <?php else : ?>
                                                                <?= date('H : i', $detail_absen->absen_masuk); ?>
                                                                <?php if ($detail_absen->status_masuk == 1) : ?>
                                                                    <span class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2">Terlambat</span>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                    <?php endif; ?>

                                                    <?php if ($detail_absen->status_izin == 0) : ?>
                                                        <th>Pulang</th>
                                                        <td>
                                                            <?php if ($detail_absen->absen_keluar == 0) : ?>
                                                                <span class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2">Belum
                                                                    Absen</span>
                                                            <?php else : ?>
                                                                <?= date('H : i', $detail_absen->absen_keluar); ?>
                                                            <?php endif; ?>
                                                        </td>
                                                    <?php endif; ?>

                                                    <th>Izin</th>
                                                    <td>
                                                        <?php if ($detail_absen->izin == null) : ?>
                                                            <span class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2">Tidak
                                                                Izin</span>
                                                        <?php else : ?>
                                                            <?php if ($detail_absen->status_izin == 0) : ?>
                                                                <span class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2">Tunggu
                                                                    Persetujuan</span>
                                                            <?php else : ?>
                                                                <span class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2">Di
                                                                    Izinkan</span>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
        <!-- PEMBERITAHUAN ABSEN -->

        <div class="row">
            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
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

            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Jadwal Absen</h4>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <a class="btn user-bg-color stripes-btn text-white" style="width: 100%;">
                                Jam Masuk <?= $jabatan->jam_masuk; ?></a>
                            <a class="btn user-bg-color stripes-btn mt-3 text-white" style="width: 100%;"> Jam Keluar <?= $jabatan->jam_keluar; ?></a>
                            <?php if ($absensi == null) : ?>
                                <a class="btn btn-dark user-bg-color mt-3 mb-3 absen-hari-ini" href="<?= base_url('pegawai/absen_hari_ini') ?>">Absen Hari Ini</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk mengklik tombol secara otomatis jika $absensi == null
    function otomatisKlik() {
        var tombol = document.querySelector('.absen-hari-ini');
        if (tombol) {
            // Periksa kondisi sebelum mengklik
            if (<?= $absensi === null ? 'true' : 'false' ?>) {
                tombol.click();
            }
        }
    }

    // Panggil fungsi otomatisKlik setelah halaman dimuat
    window.addEventListener('load', otomatisKlik);
</script>

<?= $this->endSection(); ?>