<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-navbar-logo d-flex justify-content-between">
        <a href="<?= base_url('pegawai/index') ?>" class="header-logo">
            <img src="<?= base_url() ?>/assets/template/img/logo-absenin.png" class="img-fluid rounded"
                alt="AbsenIn Logo">
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
                <li class="mb-1 <?= $menu['tab_home']; ?>" id="home-tab">
                    <a href="<?= base_url('pegawai/index') ?>" class="iq-waves-effect" <?= $menu['dashboard']; ?>
                        aria-expanded="true"><span class="ripple rippleEffect"></span><i
                            class="icon-laptop iq-arrow-left"></i><span>Dashboard</span><i
                            class="iq-arrow-right"></i></a>
                </li>

                <li class="<?= $menu['tab_master']; ?>">
                    <a href="#userinfo" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span
                            class="ripple rippleEffect"></span><i class="icon-database iq-arrow-left"></i><span>Data
                            Master</span><i class="icon-arrow-right iq-arrow-right"></i></a>
                    <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="<?= base_url('pegawai/absensi') ?>" class="<?= $menu['absensi']; ?>"><i
                                    class="icon-date_range"></i>Data
                                Absen</a></li>
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
                        <img src="<?= base_url() ?>/assets/template/img/logo-absenin.png" class="img-fluid rounded"
                            alt="">
                    </a>
                </div>
            </div>
            <div class="collapse navbar-collapse">
            </div>
            <ul class="navbar-list">
                <li class="line-height">
                    <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                        <img src="<?= base_url() ?>/assets/img/pegawai/<?= $pegawai->gambar ?>"" class=" img-fluid
                            rounded mr-3" alt="user">
                        <div class="caption">
                            <h6 class="mb-0 line-height"><?= $pegawai->nama_pegawai ?></h6>
                            <p class="mb-0">User</p>
                        </div>
                    </a>
                    <div class="iq-sub-dropdown iq-user-dropdown">
                        <div class="iq-card shadow-none m-0">
                            <div class="iq-card-body p-0 ">
                                <div class="user-bg-color p-3">
                                    <h5 class="mb-0 text-white line-height">Hello <?= $pegawai->nama_pegawai ?></h5>
                                    <span class="text-white font-size-12">Available</span>
                                </div>
                                <a href="<?= base_url('pegawai/profile') ?>" class="iq-sub-card iq-bg-primary-hover">
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
                                    <a class="user-bg-color iq-sign-btn text-white"
                                        href="<?= base_url('auth/logout') ?>" role="button">Sign
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