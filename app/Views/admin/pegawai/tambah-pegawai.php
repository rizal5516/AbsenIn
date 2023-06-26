<?= $this->extend('layout/admin') ;?>
<?= $this->section('content') ;?>
<?= $this->include('layout/sidebar-admin') ;?>

<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Tambah Data Jabatan</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form id="form-wizard1" class="text-center mt-4">
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card text-left">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input type="number" class="form-control" name="nik" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>Laki - Laki</option>
                                                    <option>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Jabatan</label>
                                                <select class="form-control" id="exampleFormControlSelect2">
                                                    <option>Kepala Sekolah</option>
                                                    <option>Office Boy</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="iq-card justify-content-center align-items-center">
                                                <div class="iq-card-body">
                                                    <img src="<?= base_url() ?>/assets/img/pegawai/default.jpg"
                                                        class="img-thumbnail" alt="Responsive image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-12 form-group input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupFileAddon01">Gambar
                                                        </span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                        aria-describedby="inputGroupFileAddon01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" name="next"
                                    class="btn user-bg-color text-white next action-button float-left mt-4"
                                    value="Next">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ;?>