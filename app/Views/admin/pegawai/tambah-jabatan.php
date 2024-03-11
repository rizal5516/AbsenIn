<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-admin'); ?>

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
                        <span class="table-add float-right mb-3 m-3 ">
                            <a href="<?= base_url('admin/jabatan') ?>" class="btn btn-sm iq-bg-danger"><i class="icon-arrow_back"><span class="pl-1">Kembali
                                    </span></i>
                            </a>
                        </span>
                    </div>
                    <div class="iq-card-body">
                        <form action="<?= base_url('admin/tambah_jabatan_'); ?>" method="POST" class="text-center mt-4">
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card text-left">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Jabatan</label>
                                                <input type="text" class="form-control" name="nama_jabatan[]" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Tunjangan</label>
                                                <input type="text" class="form-control" name="tunjangan" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Jam Masuk</label>
                                                <input type="time" class="form-control" name="jam_masuk" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Jam Keluar</label>
                                                <input type="time" class="form-control" name="jam_keluar" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn user-bg-color text-white next action-button float-left mt-4">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>