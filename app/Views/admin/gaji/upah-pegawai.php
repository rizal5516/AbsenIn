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
                    <h4 class="card-title">Detail Gaji <?= $pegawai->nama_pegawai ?> Bulan <?= date('F Y', strtotime('-1 month', strtotime($gaji['bulan']))); ?></h4>
                </div>
                <span class="table-add float-right mb-3 m-3 ">
                    <a href="<?= base_url('gaji/dataPenggajian'); ?>" class="btn btn-sm iq-bg-danger"><i class="icon-arrow_back"><span class="pl-1">Back
                            </span></i>
                    </a>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Detail</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <ul class="list-group">
                            <li class="list-group-item text-right"><b class="float-left">Nama:</b> <?= $pegawai->nama_pegawai; ?></li>
                            <li class="list-group-item text-right"><b class="float-left">NIK:</b> <?= $pegawai->nip; ?></li>
                            <li class="list-group-item text-right"><b class="float-left">Jabatan:</b> <?= $pegawai->nama_jabatan; ?></li>
                        </ul>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Settings</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <ul>
                            <li class="list-group-item text-right"><b class="float-left">Gaji Pokok:</b> <?= "Rp. " . number_format($gaji['gaji_pokok'], 0, ',', '.'); ?></li>
                            <li class="list-group-item text-right"><b class="float-left">Tunjangan Pegawai:</b> <?= "Rp. " . number_format($gaji['tunjangan'], 0, ',', '.'); ?></li>
                            <li class="list-group-item text-right"><b class="float-left">Upah per jam:</b> <?= "Rp. " . number_format($gaji['upah'], 0, ',', '.'); ?></li>
                            <li class="list-group-item text-right"><b class="float-left">Denda Absen:</b> <?= "Rp. " . number_format($gaji['denda'], 0, ',', '.'); ?></li>
                            <li class="list-group-item text-right"><b class="float-left">Bonus Siswa:</b> <?= "Rp. " . number_format($gaji['bonus_siswa'], 0, ',', '.'); ?></li>
                            <li class="list-group-item text-right"><b class="float-left">Bonus Absen:</b> <?= "Rp. " . number_format($gaji['bonus_absen'], 0, ',', '.'); ?></li>
                            <li class="list-group-item text-right"><b class="float-left">Bulan:</b> <?= date('F Y', strtotime('-1 month', strtotime($gaji['bulan']))); ?></li>
                            <li class="list-group-item text-right"><b class="float-left">Jumlah Jam Kerja:</b> <?= $gaji['jumlah_jam_kerja']; ?></li>
                            <li class="list-group-item text-right"><b class="float-left">Jumlah Bonus Siswa:</b> <?= $gaji['jumlah_bonus_siswa']; ?></li>
                            <li class="list-group-item text-right"><b class="float-left">Jumlah Bonus Absen:</b> <?= $gaji['jumlah_bonus_absen']; ?></li>
                        </ul>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Akumulasi</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <ul>
                            <li class="list-group-item text-right"><b class="float-left">Total Upah:</b> <?= "Rp. " . number_format($gaji['total_upah'], 0, ',', '.'); ?></li>
                            <li class="list-group-item text-right"><b class="float-left">Total Denda:</b> <?= "Rp. " . number_format($gaji['total_denda'], 0, ',', '.'); ?></li>
                            <li class="list-group-item text-right"><b class="float-left">Total Bonus Siswa:</b> <?= "Rp. " . number_format($gaji['total_bonus_siswa'], 0, ',', '.'); ?></li>
                            <li class="list-group-item text-right"><b class="float-left">Total Bonus Absen:</b> <?= "Rp. " . number_format($gaji['total_bonus_absen'], 0, ',', '.'); ?></li>
                            <li class="list-group-item text-right"><b class="float-left">Gaji Bersih:</b> <?= "Rp. " . number_format($gaji['gaji_bersih'], 0, ',', '.'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Content wrapper end -->

</div>
<!-- Content wrapper scroll end -->

<?= $this->endSection(); ?>