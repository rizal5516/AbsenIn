<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-admin'); ?>
<?= session()->getFlashdata('pesan'); ?>

<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Detail Izin <span style="text-transform: uppercase;"><?= $detail_absensi->nama_pegawai; ?></h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="doc-block" style="padding: 13px;">
                                    <div class="doc-icon">
                                        <img src="<?= base_url('assets/template/'); ?>/img/docs/file.png" alt="Doc Icon">
                                    </div>
                                    <div class="doc-title">File Bukti Izin</div>
                                    <a href="<?= base_url('admin/download_izin'); ?>/<?= $detail_absensi->bukti_izin; ?>" class="btn btn-primary" target="_blank">Download</a>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <h6 class="card-title"><strong>Alasan</strong></h6>
                                <p><?= $detail_absensi->alasan; ?></p>
                                <p>Status Izin : <?= ($detail_absensi->status_izin == 0) ? '<span class="badge badge-warning">Pending</span>' : '<span class="badge badge-success">Di Setujui</span>'; ?></p>
                                <?php if ($detail_absensi->status_izin == 0) : ?>
                                    <a href="<?= base_url('admin/izinkan'); ?>/<?= $detail_absensi->kode_absensi; ?>/<?= $detail_absensi->pegawai; ?>" class="btn btn-success stripes-btn mt-3 btn-izinkan">Izinkan</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.btn-izinkan').click(function(e) {
        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
            title: 'Kamu Yakin?',
            text: "Pegawai akan di Izinkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, izinkan!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {

                document.location.href = href;

            }
        })

    })
</script>

<?= $this->endSection(); ?>