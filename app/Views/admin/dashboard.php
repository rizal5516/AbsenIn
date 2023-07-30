<?= $this->extend('layout/admin') ;?>
<?= $this->section('content') ;?>
<?= $this->include('layout/sidebar-admin') ;?>

<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4">
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
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
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
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
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
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ;?>