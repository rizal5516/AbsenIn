<?= $this->extend('layout/admin') ;?>
<?= $this->section('content') ;?>
<?= $this->include('layout/sidebar-admin') ;?>

<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Riwayat Absensi Tanggal 22/06/2023</h4>
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
                                <span class="table-add float-right mb-3">
                                    <a href="<?= base_url('') ?>"
                                        class="btn btn-sm iq-bg-danger"><i class="icon-arrow_back"><span class="pl-1">Back
                                                </span></i>
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
                                        <th>Pegawai</th>
                                        <th>Absen Masuk</th>
                                        <th>Absen Pulang</th>
                                        <th>Izin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="<?= base_url() ?>/assets/img/pegawai/default.jpg" alt="pegawai" class="img-fluid rounded mr-2 mb-4" width="50px">
                                    <div class="d-inline-block">
                                        <a href="#"><strong>user</strong></a>
                                        <p class="text-muted">NIK: #111</p>
                                    </div></td>
                                        <td>07:00</td>
                                        <td>12:00</td>
                                        <td><span class="table-remove"><button type="button"
                                                    class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2">Tidak</button></span>
                                        </td>
                                        <td>
                                            <span class="table-remove"><a
                                                    href="<?= base_url('admin/detailAbsensiHariIni') ?>"
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
    </div>
</div>

<?= $this->endSection() ;?>