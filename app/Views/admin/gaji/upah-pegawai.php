<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-admin'); ?>
<?= session()->getFlashdata('pesan'); ?>

<!-- Content wrapper scroll start -->
<div id="content-page" class="content-page">
    <!-- Content wrapper start -->
    <div class="container-fluid">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Detail Gaji</h4>
                </div>
                <span class="table-add float-right mb-3 m-3 ">
                    <a href="<?= base_url('gaji/dataPenggajian'); ?>" class="btn btn-sm iq-bg-danger"><i class="icon-arrow_back"><span class="pl-1">Back
                            </span></i>
                    </a>
                </span>
            </div>
        </div>
        <!-- DETAIL ABSEN -->
        <div class="row ">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Nama</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= $pegawai->nama_pegawai; ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">NIK</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= $pegawai->nip; ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Jabatan</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= $pegawai->nama_jabatan; ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Gaji Pokok</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= "Rp. " . number_format($gaji['gaji_pokok'], 0, ',', '.'); ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Tunjangan Pegawai</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= "Rp. " . number_format($gaji['tunjangan'], 0, ',', '.'); ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Upah per jam</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= "Rp. " . number_format($gaji['upah'], 0, ',', '.'); ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Denda Absen</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= "Rp. " . number_format($gaji['denda'], 0, ',', '.'); ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Bonus Siswa</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= "Rp. " . number_format($gaji['bonus_siswa'], 0, ',', '.'); ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Bonus Absen</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= "Rp. " . number_format($gaji['bonus_absen'], 0, ',', '.'); ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Bulan</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= date('F Y', strtotime('-1 month', strtotime($gaji['bulan']))); ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Jumlah Jam Kerja</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= $gaji['jumlah_jam_kerja']; ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Jumlah Denda</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= $gaji['jumlah_denda']; ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Jumlah Bonus Siswa</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= $gaji['jumlah_bonus_siswa']; ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Jumlah Bonus Absen</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= $gaji['jumlah_bonus_absen']; ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Total Upah</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= "Rp. " . number_format($gaji['total_upah'], 0, ',', '.'); ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Total Denda</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= "Rp. " . number_format($gaji['total_denda'], 0, ',', '.'); ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Total Bonus Siswa</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= "Rp. " . number_format($gaji['total_bonus_siswa'], 0, ',', '.'); ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Total Bonus Absen</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-secondary">: <?= "Rp. " . number_format($gaji['total_bonus_absen'], 0, ',', '.'); ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="text-secondary">Gaji Bersih</h6>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="text-primary">: <?= "Rp. " . number_format($gaji['gaji_bersih'], 0, ',', '.'); ?></h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end DETAIL ABSEN -->

    </div>
    <!-- Content wrapper end -->

</div>
<!-- Content wrapper scroll end -->

<?= $this->endSection(); ?>