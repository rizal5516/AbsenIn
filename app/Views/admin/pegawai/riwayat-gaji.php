<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-admin'); ?>

<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Riwayat Gaji</h4>
                </div>
                <span class="table-add float-right mb-3 m-3 ">
                    <a href="<?= base_url('admin/dataPenggajian') ?>" class="btn btn-sm iq-bg-danger"><i class="icon-arrow_back"><span class="pl-1">Back
                            </span></i>
                    </a>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-lg-3">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <img src="<?= base_url() ?>/assets/img/pegawai/default.jpg" class="img-fluid" alt="Responsive image">
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card iq-mb-3">
                    <div class="row no-gutters flex-row">
                        <div class="col-md-12">
                            <div class="card-body text-left">
                                <div class="iq-card-body">
                                    <form id="form-wizard1" class="text-center">
                                        <!-- fieldsets -->
                                        <fieldset>
                                            <div class="form-card text-left">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" class="form-control" name="nama" value="User" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>NIK</label>
                                                            <input type="number" class="form-control" name="nik" value="0111" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Jabatan</label>
                                                            <input type="text" class="form-control" name="jabatan" value="Kepala Sekolah" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
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
                                        <button type="button" id="search-button" class="btn user-bg-color text-white">Search</button>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Upah per Jam</th>
                                        <th>Denda Absen</th>
                                        <th>Bonus Siswa</th>
                                        <th>Bonus Absen</th>
                                        <th>Bulan</th>
                                        <th>Jumlah Jam Kerja</th>
                                        <th>Jumlah Denda</th>
                                        <th>Jumlah Bonus Siswa</th>
                                        <th>Total Upah</th>
                                        <th>Total Denda</th>
                                        <th>Total Bonus Siswa</th>
                                        <th>Total Bonus Absen</th>
                                        <th></th>
                                        <th>Gaji Bersih</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Rp 10.000</td>
                                        <td>Rp 1.000</td>
                                        <td>Rp 1.000</td>
                                        <td>Rp 1.000</td>
                                        <td>May 2023</td>
                                        <td>Rp 10</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>Rp 100.000</td>
                                        <td>Rp 1.000</td>
                                        <td>Rp 1.000</td>
                                        <td>Rp 1.000</td>
                                        <td>Rp 102.000</td>
                                        <td>
                                            <span class="table-remove"><button type="button" class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2"> <i class="icon-open_in_new"></i>Print</button></span>
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


<?= $this->endSection(); ?>