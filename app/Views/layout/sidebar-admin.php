<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-navbar-logo d-flex justify-content-between">
        <a href="<?= base_url('admin/index'); ?>" class="header-logo">
            <img src="<?= base_url() ?>/assets/template/img/logo-absenin.png" class="img-fluid rounded" alt="AbsenInLogo">
        </a>
        <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
                <div class="main-circle"><i class="icon-menu"></i></div>
                <div class="hover-circle"><i class="icon-close"></i></div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="<?= $menu['tab_home']; ?> mb-1" id="home-tab">
                    <a href="<?= base_url('admin/index'); ?>" class="iq-waves-effect""
                        aria-expanded="true"><span class="ripple rippleEffect"></span><i
                            class="icon-laptop iq-arrow-left"></i><span>Dashboard</span><i
                            class="iq-arrow-right"></i></a>
                </li>

                <li class="<?= $menu['tab_master']; ?>">
                    <a href="#masterinfo" class="iq-waves-effect" data-toggle="collapse"
                        aria-expanded="false"><span class="ripple rippleEffect"></span><i
                            class="icon-database iq-arrow-left"></i><span>Data Master</span><i
                            class="icon-arrow-right iq-arrow-right"></i></a>
                    <ul id="masterinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" >
                        <li><a href="<?= base_url('admin/pegawai') ?>" class="<?= $menu['pegawai']; ?>"><i class="icon-users"></i>Pegawai</a></li>
                        <li><a href="<?= base_url('admin/jabatan') ?>" class="<?= $menu['jabatan']; ?>"><i class="icon-briefcase"></i>Jabatan</a></li>
                        <li><a href="<?= base_url('admin/absensi') ?>" class="<?= $menu['absensi']; ?>"><i class="icon-date_range"></i>Data Absen</a></li>
                        <li><a href="<?= base_url('admin/pengaturan_absen') ?>" class="<?= $menu['pengaturan_absen']; ?>"><i class="icon-settings1"></i>Setting Absen & Gaji</a></li>
                        <li><a href="<?= base_url('admin/dataPenggajian') ?>"><i class="icon-attach_money"></i>Penggajian</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
<!-- TOP Nav Bar -->
<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light pt-2">
            <div class="iq-menu-bt d-flex align-items-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="icon-menu"></i></div>
                    <div class="hover-circle"><i class="icon-close"></i></div>
                </div>
                <div class="iq-navbar-logo d-flex justify-content-between ml-3">
                    <a href="index.html" class="header-logo">
                        <img src="<?= base_url() ?>/assets/template/img/logo-absenin.png" class="img-fluid rounded" alt="">
                    </a>
                </div>
            </div>
            <div class="collapse navbar-collapse">
            </div>
            <ul class="navbar-list">
                <li class="line-height">
                    <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                        <img src="<?= base_url() ?>/assets/img/pegawai/<?= $admin->gambar ?>" class="img-fluid rounded mr-3" alt="admin">
                        <div class="caption">
                            <h6 class="mb-0 line-height"><?= $admin->nama_admin ?></h6>
                            <p class="mb-0">Admin</p>
                        </div>
                    </a>
                    <div class="iq-sub-dropdown iq-user-dropdown">
                        <div class="iq-card shadow-none m-0">
                            <div class="iq-card-body p-0 ">
                                <div class="user-bg-color p-3">
                                    <h5 class="mb-0 text-white line-height">Hello <?= $admin->nama_admin ?></h5>
                                    <span class="text-white font-size-12">Available</span>
                                </div>
                                <a href="<?= base_url('admin/profile') ?>" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                        <div class="rounded iq-card-icon iq-bg-primary">
                                            <i class="icon-user"></i>
                                        </div>
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0 ">My Profile</h6>
                                            <p class="mb-0 font-size-12">View personal profile details.</p>
                                        </div>
                                    </div>
                                </a>
                                <div class="d-inline-block w-100 text-center p-3">
                                    <a class="user-bg-color iq-sign-btn text-white" href="<?= base_url() ?>auth/logout" role="button">Sign
                                        out<i class="icon-exit_to_app ml-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- TOP Nav Bar END -->