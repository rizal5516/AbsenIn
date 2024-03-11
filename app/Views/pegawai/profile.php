<?php

use App\Models\AbsenDetailModel;

$AbsenDetailModel = new AbsenDetailModel();
?>

<?= $this->extend('layout/pegawai'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-pegawai'); ?>
<?= session()->getFlashdata('pesan'); ?>

<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-7 col-lg-7">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Pengaturan Akun</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="stepwizard mt-2">
                            <div class="stepwizard-row setup-panel">
                                <div id="user" class="wizard-step">
                                    <a href="#user-detail" class="btn btn-default">
                                        <img src="<?= base_url() ?>/assets/img/pegawai/<?= $pegawai->gambar ?>" class="avatar-user img-fluid rounded mr-3" alt="user-img">
                                    </a>
                                </div>

                                <div class="row">
                                    <form action="<?= base_url('pegawai/profile_'); ?>" method="POST" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text" class="form-control" name="nama" value="<?= $pegawai->nama_pegawai ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 form-group input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="changeAvatar">Pilih File</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="hidden" class="form-control" name="gambar_lama" value="<?= $pegawai->gambar; ?>">
                                                    <input type="file" name="gambar" class="custom-file-input" id="changeAvatar" aria-describedby="changeAvatar">
                                                    <label class="custom-file-label" for="changeAvatar">Pilih File</label>
                                                </div>
                                            </div>
                                            <button class="btn user-bg-color mt-2 ml-3 p-2 text-white">Simpan Pengaturan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-5 col-lg-5">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Pengaturan Password</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form action="<?= base_url('pegawai/password'); ?>" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="current_password" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password Baru</label>
                                            <input type="password" class="form-control" name="new_password" placeholder="Password Baru" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn user-bg-color mt-3 ml-3 p-2 text-white">Simpan Pengaturan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get the custom file input element
        const customFileInput = document.querySelector('.custom-file-input');

        // Add an event listener for the 'change' event
        customFileInput.addEventListener('change', function() {
            // Get the file name
            const fileName = customFileInput.value.split('\\').pop();

            // Update the label text
            const customFileLabel = document.querySelector('.custom-file-label');
            customFileLabel.textContent = fileName;
        });
    </script>

    <?= $this->endSection(); ?>