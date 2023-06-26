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
                            <h4 class="card-title">Data Penggajian</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div id="table-excel-pdf" class="table-editable">
                            <!-- <span class="table-add float-right mb-3 mr-2">
                                <a href="<?= base_url('admin/tambahDataPegawai') ?>" class="btn btn-sm iq-bg-info"><i class="icon-plus1"><span class="pl-1">Add
                                            New</span></i>
                                </a>
                            </span> -->
                            <form class="search-form mb-3 col-md-4 float-right">
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
                                        <th>Pegawai</th>
                                        <th>Jabatan</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="<?= base_url() ?>/assets/img/pegawai/default.jpg" alt="pegawai"
                                                class="img-fluid rounded mr-2 mb-4" width="50px">
                                            <div class="d-inline-block">
                                                <a href="#"><strong>user</strong></a>
                                                <p class="text-muted">NIK: #111</p>
                                            </div>
                                        </td>
                                        <td>Kepala Sekolah</td>
                                        <td>user@gmail.com</td>
                                        <td>
                                            <span class="table-remove"><a
                                                    href="<?= base_url('') ?>"
                                                    class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2"> <i
                                                        class="icon-open_in_new"></i>Hitung Gaji</a></span>
                                            <span class="table-remove"><a
                                                    href="<?= base_url('admin/riwayatPenggajian') ?>"
                                                    class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2"> <i
                                                        class="icon-open_in_new"></i>Riwayat Gaji</a></span>
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

<?= $this->endSection() ;?>