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
                            <h4 class="card-title">Data Jabatan</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div id="table-excel-pdf" class="table-editable">
                            <form class="search-form mb-3 col-md-4 float-right">
                                <span class="table-add float-right mb-3">
                                    <a href="<?= base_url('admin/tambahDataJabatan') ?>"
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
                                        <th>Jabatan</th>
                                        <th>Gaji Pokok</th>
                                        <th>Tunjangan</th>
                                        <th>Id Jabatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Kepala Sekolah</td>
                                        <td>Rp 1000.000</td>
                                        <td>Rp 1000.000</td>
                                        <td>1</td>
                                        <td>
                                            <span class="table-remove"><button type="button"
                                                    class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2" data-toggle="modal" data-target="#exampleModal"><i
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Edit Data Jabatan</h4>
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
                                                    <label>Jabatan</label>
                                                    <input type="text" class="form-control" name="nama" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Gaji Pokok</label>
                                                    <input type="text" class="form-control" name="email" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Tunjangan</label>
                                                    <input type="text" class="form-control" name="password" />
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