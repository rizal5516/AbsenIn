<?= $this->extend('layout/admin') ;?>
<?= $this->section('content') ;?>
<?= $this->include('layout/sidebar-admin') ;?>

<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Data Pegawai</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div id="table-excel-pdf" class="table-editable">
                            <form class="search-form mb-3 col-md-4 float-right">
                                <span class="table-add float-right mb-3">
                                    <a href="<?= base_url('admin/tambahDataPegawai') ?>"
                                        class="btn btn-sm iq-bg-info"><i class="icon-plus1"><span class="pl-1">Add
                                                New</span></i>
                                    </a>
                                </span>
                                <div class="input-group">
                                    <input type="text" id="search-input" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button type="button" id="search-button"
                                            class="btn user-bg-color text-white">Search</button>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Aisyah</td>
                                        <td>Kepala Sekolah</td>
                                        <td><span class="table-remove"><button type="button"
                                                    class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2">Active</button></span>
                                        </td>
                                        <td>guru@gmail.com</td>
                                        <td>
                                            <span class="table-remove"><button type="button"
                                                    class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2"
                                                    data-toggle="modal" data-target="#exampleModal"><i
                                                        class="icon-edit"></i>Edit</button></span>
                                            <span class="table-remove"><button type="button"
                                                    class="btn iq-bg-danger btn-rounded btn-sm my-0 ml-2"><i
                                                        class="icon-delete"></i>Delete</button></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Edit Data Pegawai</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form id="form-wizard1" class="text-center mt-4">
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card text-left">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Nama Pegawai</label>
                                                    <input type="text" class="form-control" name="nama" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Laki - Laki</option>
                                                        <option>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect2">Jabatan</label>
                                                    <select class="form-control" id="exampleFormControlSelect2">
                                                        <option>Kepala Sekolah</option>
                                                        <option>Office Boy</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect2">Status</label>
                                                    <select class="form-control" id="exampleFormControlSelect2">
                                                        <option>Active</option>
                                                        <option>Deactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="iq-card justify-content-center align-items-center">
                                                    <div class="iq-card-body">
                                                        <img src="<?= base_url() ?>/assets/img/pegawai/default.jpg" class="img-thumbnail"
                                                            alt="Responsive image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-12 form-group input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupFileAddon01">Choose
                                                            File</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                            id="inputGroupFile01"
                                                            aria-describedby="inputGroupFileAddon01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="next"
                                        class="btn user-bg-color text-white next action-button float-left mt-4"
                                        value="Next">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ;?>