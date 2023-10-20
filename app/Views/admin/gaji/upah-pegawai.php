<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-admin'); ?>
<?= session()->getFlashdata('pesan'); ?>
<!-- *************
				************ Main container start *************
			************* -->
<div class="main-container">

    <!-- Page header starts -->
    <div class="page-header">

        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-9">

                <!-- Search container start -->
                <div class="search-container">

                    <!-- Toggle sidebar start -->
                    <div class="toggle-sidebar" id="toggle-sidebar">
                        <i class="icon-menu"></i>
                    </div>
                    <!-- Toggle sidebar end -->

                    <!-- Mega Menu Start -->
                    <div class="cd-dropdown-wrapper" style="opacity: 0;">
                    </div>
                    <!-- Mega Menu End -->

                    <!-- Search input group start -->
                    <div class="ui fluid category search" style="opacity: 0;">
                    </div>
                    <!-- Search input group end -->

                </div>
                <!-- Search container end -->

            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-3">

                <!-- Header actions start -->
                <ul class="header-actions">
                    <li class="dropdown">
                    </li>
                    <li class="dropdown">
                    </li>
                    <li class="dropdown">
                        <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                            <span class="avatar">
                                <img src="<?= base_url(); ?>/assets/img/pegawai/<?= $admin->gambar; ?>" alt="User Avatar">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end md" aria-labelledby="userSettings">
                            <div class="header-profile-actions">
                                <a href="<?= base_url('admin/profile'); ?>"><i class="icon-user1"></i>Profile</a>
                                <a href="<?= base_url('auth/logout'); ?>"><i class="icon-log-out1"></i>Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- Header actions end -->

            </div>
        </div>
        <!-- Row end -->

    </div>
    <!-- Page header ends -->

    <!-- Content wrapper scroll start -->
    <div class="content-wrapper-scroll">
        <!-- Content wrapper start -->
        <div class="content-wrapper">

            <!-- DETAIL ABSEN -->
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-primary">DETAIL GAJI <span style="text-transform: uppercase;"></span></h3>
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
                                    <h6 class="text-secondary">NIP</h6>
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
                                    <h6 class="text-secondary">: <?= date('F Y', strtotime($gaji['bulan'])); ?></h6>
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
                        <div class="card-footer">
                            <a href="<?= base_url('gaji/index'); ?>" class="btn btn-danger stripes-btn mt-3"><i class="icon-arrow-left"></i>Kembali</a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end DETAIL ABSEN -->

        </div>
        <!-- Content wrapper end -->

    </div>
    <!-- Content wrapper scroll end -->

</div>
<!-- *************
				************ Main container end *************
			************* -->

<script>
    $('.btn-izinkan').click(function(e) {
        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
            title: 'Kamu Yakin?',
            text: "Pegawai akan di Izinkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, izinkan!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {

                document.location.href = href;

            }
        })

    })
</script>
<?= $this->endSection(); ?>