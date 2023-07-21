<?= $this->extend('layout/admin') ;?>
<?= $this->section('content') ;?>
<?= $this->include('layout/sidebar-admin') ;?>

<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-7 col-lg-7">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Account Settings</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="stepwizard mt-2">
                            <div class="stepwizard-row setup-panel">
                                <div id="user" class="wizard-step">
                                    <a href="#user-detail" class="btn btn-default">
                                        <img src="<?= base_url() ?>/assets/img/pegawai/default.jpg"
                                            class="avatar-user img-fluid rounded mr-3" alt="user-img">
                                    </a>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="user">
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon01">Choose File</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                    aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                        <button class="btn user-bg-color mt-2 ml-3 p-2 text-white">Save
                                            Settings</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-5 col-lg-5">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Password Settings</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="pwd" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" name="cpwd"
                                            placeholder="New Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn user-bg-color mt-2 ml-3 p-2 text-white">Save Settings</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection() ;?>