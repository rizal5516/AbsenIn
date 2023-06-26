<?= $this->extend('layout/pegawai') ;?>
<?= $this->section('content') ;?>
<?= $this->include('layout/sidebar-pegawai') ;?>

<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Absensi Hari Ini</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div id="table-excel-pdf" class="table-editable">
                            <!-- <span class="table-add float-right mb-3 mr-2">
                                <a href="<?= base_url('admin/tambahDataPegawai') ?>" class="btn btn-sm iq-bg-info"><i class="icon-plus1"><span class="pl-1">Add
                                            New</span></i>
                                </a>
                            </span> -->
                            <table class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Masuk</th>
                                        <th>Pulang</th>
                                        <th>Izin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>07:15</td>
                                        <td>11:12</td>
                                        <td><span class="table-remove"><button type="button"
                                                    class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2">Tidak
                                                    Izin</button></span>
                                        </td>
                                        <td>
                                            <span class="table-remove"><a
                                                    href="<?= base_url('pegawai/detailAbsensi') ?>"
                                                    class="btn iq-bg-warning btn-rounded btn-sm my-0 mr-2"> <i
                                                        class="icon-open_in_new"></i>Show</a></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Riwayat Absensi</h4>
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
                                        <th>Tanggal</th>
                                        <th>Masuk</th>
                                        <th>Pulang</th>
                                        <th>Izin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>22/06/2023</td>
                                        <td>07:15</td>
                                        <td>11:12</td>
                                        <td><span class="table-remove"><button type="button"
                                                    class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2">Tidak
                                                    Izin</button></span>
                                        </td>
                                        <td>
                                            <span class="table-remove"><button type="button"
                                                    class="btn iq-bg-warning btn-rounded btn-sm my-0 mr-2"> <i
                                                        class="icon-open_in_new"></i>Show</button></span>
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