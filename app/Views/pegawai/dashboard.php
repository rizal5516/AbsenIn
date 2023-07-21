<?= $this->extend('layout/pegawai') ;?>
<?= $this->section('content') ;?>
<?= $this->include('layout/sidebar-pegawai') ;?>

<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Welcome User</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="stepwizard mt-2">
                            <div class="stepwizard-row setup-panel">
                                <div id="document" class="wizard-step">
                                    <a href="#document-detail" class="btn btn-default">
                                        <i class="icon-user text-danger"></i><span class="font-size-16">Nama - User</span>
                                    </a>
                                </div>
                                <div id="bank" class="wizard-step">
                                    <a href="#bank-detail" class="btn btn-default">
                                        <i class="icon-card_membership text-success"></i><span class="font-size-16">NIK</span>
                                    </a>
                                </div>
                                <div id="confirm" class="wizard-step">
                                    <a href="#cpnfirm-data" class="btn btn-default">
                                        <i class="icon-email text-warning"></i><span class="font-size-16">user@gmail.com</span>
                                    </a>
                                </div>
                                <div id="user" class="wizard-step">
                                    <a href="#user-detail" class="btn btn-default">
                                        <img src="<?= base_url() ?>/assets/img/pegawai/default.jpg" class="avatar-user img-fluid rounded mr-3" alt="user-img">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        <iframe style="width: 100%; height: 95%;" class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d170410.
                            75606658432!2d16.97583486545303!3d48.13592437338002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1
                            !3m3!1m2!1s0x476c89360aca6197%3A0x631f9b82fd884368!2sBratislava%2C%20Slovakia!5e0!3m2!1sen!2sbg!4v1602852055483
                            !5m2!1sen!2sbg" frameborder="0"></iframe>
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
                            <button type="button" class="btn user-bg-color stripes-btn text-white" style="width: 100%;"> Jam Masuk 07:00</button>
                            <button type="button" class="btn user-bg-color stripes-btn mt-3 text-white" style="width: 100%;"> Jam Keluar 12:00</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ;?>