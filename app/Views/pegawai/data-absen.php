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
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Absensi Hari Ini</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-editable">
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
                                    <?php if ($absensi != null) : ?>
                                        <?php $detail_absen = $AbsenDetailModel->getByKodeAndIdPegawai($absensi->kode_absensi, session()->get('id_pegawai')); ?>
                                        <?php if ($detail_absen != null) : ?>
                                            <tr>
                                                <?php if ($detail_absen->izin == null) : ?>
                                                    <td>
                                                        <?php if ($detail_absen->absen_masuk == 0) : ?>
                                                            <span class="table-remove"><button class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2">Belum
                                                                    Absen</button></span>
                                                        <?php else : ?>
                                                            <?php if ($detail_absen->status_masuk == 1) : ?>
                                                                <span class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2"><?= date('H : i', $detail_absen->absen_masuk); ?></span>
                                                            <?php else : ?>
                                                                <?= date('H : i', $detail_absen->absen_masuk); ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($detail_absen->absen_keluar == 0) : ?>
                                                            <span class="table-remove"><button class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2">Belum
                                                                    Absen</button></span>
                                                        <?php else : ?>
                                                            <?= date('H : i', $detail_absen->absen_keluar); ?>
                                                        <?php endif; ?>
                                                    </td>
                                                <?php else : ?>
                                                    <td colspan="2">IZIN</td>
                                                <?php endif; ?>
                                                <td>
                                                    <?php if ($detail_absen->izin == null) : ?>
                                                        <span class="table-remove"><button class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2">Tidak
                                                                Izin</button></span>
                                                    <?php else : ?>
                                                        <?php if ($detail_absen->status_izin == 0) : ?>
                                                            <span class="btn iq-bg-warning btn-rounded btn-sm my-0 mr-2">Tunggu
                                                                Persetujuan</span>
                                                        <?php else : ?>
                                                            <span class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2">Di
                                                                Izinkan</span>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($detail_absen->absen_masuk == null || $detail_absen->absen_keluar == null || $detail_absen->izin == null) : ?>
                                                        <?php if ($detail_absen->izin == null && $detail_absen->absen_keluar == null) : ?>
                                                            <span class="table-remove"><a href="<?= base_url('pegawai/absen') ?>/<?= $detail_absen->kode_absensi; ?>" class="btn iq-bg-warning btn-rounded btn-sm my-0 mr-2">Absen</a></span>
                                                        <?php endif; ?>

                                                        <?php if ($detail_absen->absen_masuk != null && $detail_absen->absen_keluar != null) : ?>
                                                            <span class="table-remove"><a href="<?= base_url('pegawai/detail_absen'); ?>/<?= $detail_absen->kode_absensi; ?>" class="btn iq-bg-warning btn-rounded btn-sm my-0 mr-2"><i class="icon-open_in_new"></i>Detail</a></span>
                                                        <?php endif; ?>

                                                        <?php if ($detail_absen->absen_masuk == null && $detail_absen->absen_keluar == null && $detail_absen->izin == null) : ?>
                                                            <span class="table-remove"><a href="<?= base_url('pegawai/izin_absen'); ?>/<?= $detail_absen->kode_absensi; ?>" class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2">Izin</a></span>
                                                        <?php endif; ?>

                                                        <?php if ($detail_absen->absen_masuk == null && $detail_absen->absen_keluar == null && $detail_absen->izin != null) : ?>
                                                            <span class="table-remove"><a href="<?= base_url('pegawai/izin_absen'); ?>/<?= $detail_absen->kode_absensi; ?>" class="btn iq-bg-warning btn-rounded btn-sm my-0 mr-2"><i class="icon-open_in_new"></i>Detail</a></span>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>
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
                        <div class="table-editable">
                            <!-- <span class="table-add float-right mb-3 mr-2">
                                <a href="<?= base_url('admin/tambahDataPegawai') ?>" class="btn btn-sm iq-bg-info"><i class="icon-plus1"><span class="pl-1">Add
                                            New</span></i>
                                </a>
                            </span> -->
                            <form class="search-form mb-3 col-md-4 float-right">
                                <div class="input-group">
                                    <input type="text" id="filter_riwayat-absensi" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button type="button" id="filter_riwayat-absensi" class="btn user-bg-color text-white">Search</button>
                                    </div>
                                </div>
                            </form>
                            <table id="datatable_riwayat-absensi" class="table table-bordered table-responsive-md table-striped text-center">
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
                                    <?php if ($riwayat_absensi != null) : ?>
                                        <?php foreach ($riwayat_absensi as $ra) : ?>
                                            <?php if ($ra->tgl_absen != date('d-M-Y', time())) : ?>
                                                <tr>
                                                    <td><?= $ra->tgl_absen; ?></td>
                                                    <td>
                                                        <?php if ($ra->izin == null) : ?>
                                                            <?php if ($ra->absen_masuk == 0) : ?>
                                                                <span class="table-remove"><button class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2">Belum
                                                                        Absen</button></span>
                                                            <?php else : ?>
                                                                <?php if ($ra->status_masuk == 0) : ?>
                                                                    <span><?= date('H : i', $ra->absen_masuk); ?></span>
                                                                <?php else : ?>
                                                                    <span class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2"><?= date('H : i', $ra->absen_masuk); ?></span>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php else : ?>
                                                            IZIN
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($ra->izin == null) : ?>
                                                            <?php if ($ra->absen_keluar == 0) : ?>
                                                                <span class="table-remove"><button class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2">Belum
                                                                        Absen</button></span>
                                                            <?php else : ?>
                                                                <?= date('H : i', $ra->absen_keluar); ?>
                                                            <?php endif; ?>
                                                        <?php else : ?>
                                                            IZIN
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($ra->izin == 0) : ?>
                                                            <span class="table-remove"><button class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2">Tidak
                                                                    Izin</button></span>
                                                        <?php else : ?>

                                                            <?php if ($ra->status_izin == 0) : ?>
                                                                <span class="btn iq-bg-warning btn-rounded btn-sm my-0 mr-2">Tunggu
                                                                    Persetujuan</span>
                                                            <?php else : ?>

                                                                <span class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2">Di
                                                                    Izinkan</span>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($ra->izin == 1) : ?>
                                                            <span class="table-remove"><a href="<?= base_url('pegawai/izin_absen'); ?>/<?= $ra->kode_absensi; ?>" class="btn iq-bg-warning btn-rounded btn-sm my-0 mr-2"> <i class="icon-open_in_new"></i>Detail</a></span>
                                                        <?php else : ?>
                                                            <span class="table-remove"><a href="<?= base_url('pegawai/detail_absen'); ?>/<?= $ra->kode_absensi; ?>" class="btn iq-bg-warning btn-rounded btn-sm my-0 mr-2"> <i class="icon-open_in_new"></i>Detail</a></span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#datatable_riwayat-absensi').DataTable({
        "ordering": true,
        "lengthMenu": [
            [-1, 5, 10, 25, 50],
            ["All", 5, 10, 25, 50]
        ],
        dom: 'lfrtip',
        "order": [
            [4, "asc"]
        ]
    });

    // Ubah desain search field
    $('#filter_riwayat-absensi').on('keyup', function() {
        // Aktifkan fungsi search
        $('#datatable_riwayat-absensi').DataTable().search($('#filter_riwayat-absensi').val()).draw();
    });
</script>

<?= $this->endSection(); ?>