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
                            <h4 class="card-title">Tambah Data Pegawai</h4>
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
                                                <input type="text" class="form-control" name="jabatan" />
                                            </div>
                                            <div class="form-group">
                                                <label>Gaji Pokok</label>
                                                <input type="text" class="form-control" name="gaji-pokok"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Tunjangan</label>
                                                <input type="tetx" class="form-control" name="tunjangan"/>
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