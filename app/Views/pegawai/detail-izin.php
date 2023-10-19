<?= $this->extend('layout/pegawai'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-pegawai'); ?>
<?= session()->getFlashdata('pesan'); ?>

<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <?php if ($detail_absensi->izin == null) : ?>
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Form Permohonan Izin Absensi</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form class="was-validated" action="<?= base_url('pegawai/izin'); ?>" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="kode_absen" value="<?= $detail_absensi->kode_absensi; ?>">
                                <div class="mb-3">
                                    <label for="validationTextarea">Alasan</label>
                                    <textarea name="alasan" class="form-control is-invalid" id="validationTextarea" placeholder="Masukkan Alasan Izin Absensi" cols="30" rows="10" required></textarea>
                                </div>
                                <label>Bukti</label>
                                <div class="custom-file">
                                    <input type="file" name="bukti_izin" class="custom-file-input" id="buktiIzin" accept=".jpg, .jpeg, .png, .pdf, .doc" required>
                                    <label class="custom-file-label" for="buktiIzin">Choose file...</label>
                                    <div class="invalid-feedback">Bukti Berupa File Foto Ataupun PDF</div>
                                </div>
                                <button class="user-bg-color btn btn-secondary mt-2 mb-2" type="submit">Submit form</button>
                            </form>
                        <?php else : ?>
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Data Permohonan Izin Absensi</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="mb-3">
                                    <label for="validationTextarea">Alasan</label>
                                    <p><?= $detail_absensi->alasan; ?></p>
                                </div>
                                <center>
                                    <div class="doc-block" style="padding: 13px;">
                                        <div class="doc-icon">
                                            <img src="<?= base_url('assets/template/'); ?>/img/docs/file.png" alt="Doc Icon">
                                        </div>
                                        <div class="doc-title">File Bukti Izin</div>
                                        <a href="<?= base_url('pegawai/download_izin'); ?>/<?= $detail_absensi->bukti_izin; ?>" class="btn btn-primary" target="_blank">Download</a>
                                    </div>
                                </center>
                                <p>Status Izin : <?= ($detail_absensi->status_izin == 0) ? '<span class="badge badge-warning">Pending</span>' : '<span class="badge badge-success">Di Setujui</span>'; ?></p>
                                <a href="<?= base_url('pegawai/absensi'); ?>" class="btn btn-sm iq-bg-danger mt-2"><i class="icon-arrow_back"></i>Kembali</a>
                            </div>
                        <?php endif; ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Event listener untuk mengubah label
    $("#buktiIzin").on("change", function() {
        // Dapatkan nama file
        var fileName = $(this).val().split("\\").pop();

        // Ubah label menjadi nama file
        $(this).next().text(fileName);
    });
</script>

<?= $this->endSection(); ?>