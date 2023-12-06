<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-admin'); ?>
<?= session()->getFlashdata('pesan'); ?>

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
                        <form action="<?= base_url('admin/tambah_pegawai_'); ?>" method="POST" enctype="multipart/form-data" class="text-center mt-4">
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card text-left">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input type="text" class="form-control" name="nip" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="nama_pegawai" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin" title="Select Product Category" data-live-search="true" required>
                                                    <option value="Laki - Laki">Laki - Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Jabatan</label>
                                                <select class="form-control" id="exampleFormControlSelect2" name="jabatan" title="Select Product Category" data-live-search="true" required>
                                                    <?php foreach ($jabatan as $j) : ?>
                                                        <option value="<?= $j->id_jabatan; ?>"><?= $j->nama_jabatan; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" required />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tunjangan</label>
                                                <input type="text" class="form-control" name="tunjangan" required />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="iq-card justify-content-center align-items-center">
                                                <div class="iq-card-body">
                                                    <img src="<?= base_url('assets/img/pegawai'); ?>/default.jpg" class="img-thumbnail foto-pegawai" alt="Foto Pegawai">
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
                                                    <input type="file" name="gambar" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" onchange="previewImg();" accept=".jpg, .jpeg, .png">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn user-bg-color text-white next action-button float-left mt-4">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.select2').select2();

    function previewImg() {
        const gambar = document.querySelector('#inputGroupFile01');
        const imgPreview = document.querySelector('.foto-pegawai');

        const filegambar = new FileReader();
        filegambar.readAsDataURL(gambar.files[0]);

        filegambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<?= $this->endSection(); ?>