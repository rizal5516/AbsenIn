<?= $this->extend('layout/admin') ;?>
<?= $this->section('content') ;?>
<?= $this->include('layout/sidebar-admin') ;?>
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
                        <div id="table-excel-pdf" class="table-editable">
                            <table class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Jumlah Pegawai</th>
                                        <th>Jumlah Masuk</th>
                                        <th>Jumlah Pulang</th>
                                        <th>Jumlah Izin</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if ($absensi != null) : ?>
                                    <tr>
                                        <td><?= ($absensi->jumlah_pegawai != null) ? "$absensi->jumlah_pegawai" : '0'; ?>
                                            Pegawai</td>
                                        <td><?= ($absensi->jumlah_absen_masuk != null) ? "$absensi->jumlah_absen_masuk" : '0'; ?>
                                            Pegawai</td>
                                        <td><?= ($absensi->jumlah_absen_keluar != null) ? "$absensi->jumlah_absen_keluar" : '0'; ?>
                                            Pegawai</td>
                                        <td><?= ($absensi->jumlah_izin != null) ? "$absensi->jumlah_izin" : '0'; ?>
                                            Pegawai</td>
                                        <td><?= ($absensi->total_pegawai != null) ? "$absensi->total_pegawai" : '0'; ?>
                                            Pegawai</td>
                                        <td>
                                            <span class="table-remove">
                                                <a href="<?= base_url('admin/absen') ?>/<?= $absensi->kode_absensi; ?>"
                                                    class="btn iq-bg-warning btn-rounded btn-sm my-0 mr-2"> <i
                                                        class="icon-open_in_new" data-placement="top"
                                                        data-original-title="Detail">
                                                    </i>Show</a></span>
                                        </td>
                                    </tr>
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
                                        <th>Jumlah Pegawai</th>
                                        <th>Jumlah Masuk</th>
                                        <th>Jumlah Pulang</th>
                                        <th>Jumlah Izin</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($riwayat_absen != null) : ?>
                                    <?php
                                            $no = 1;
                                            foreach ($riwayat_absen as $absen) : ?>
                                    <?php if ($absen->tgl_absen != date('d-M-Y', time())) : ?>
                                    <tr>
                                        <td><?= $absen->tgl_absen; ?> Pegawai</td>
                                        <td><?= $absen->jumlah_pegawai; ?> Pegawai</td>
                                        <td><?= ($absen->jumlah_absen_masuk == null) ? 0 : $absen->jumlah_absen_masuk; ?>
                                            Pegawai</td>
                                        <td><?= ($absen->jumlah_absen_keluar == null) ? 0 : $absen->jumlah_absen_keluar; ?>
                                            Pegawai</td>
                                        <td><?= ($absen->jumlah_izin == null) ? 0 : $absen->jumlah_izin; ?> Pegawai</td>
                                        <td><?= $absen->total_pegawai; ?> Pegawai</td>
                                        <td>
                                            <span class="table-remove"><a
                                                    href="<?= base_url('admin/absen') ?>/<?= $absen->kode_absensi; ?>"
                                                    class="btn iq-bg-warning btn-rounded btn-sm my-0 mr-2"> <i
                                                        class="icon-open_in_new" data-placement="top"
                                                        data-original-title="Edit"></i>Show</a></span>
                                            <a href="<?= base_url('admin/hapus_absen'); ?>/<?= $absen->kode_absensi; ?>"
                                                class="table-remove btn-hapus" data-placement="top"
                                                data-original-title="Delete"><button
                                                    class="btn iq-bg-danger btn-rounded btn-sm my-0 ml-2"><i
                                                        class="icon-delete"></i>Delete</button></a>
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
    $('#datatable').DataTable({
        "ordering": true,
        "lengthMenu": [
            [-1, 5, 10, 25, 50],
            ["All", 5, 10, 25, 50]
        ],
    });

    $('#datatable2').DataTable({
        "ordering": true,
        "lengthMenu": [
            [-1, 5, 10, 25, 50],
            ["All", 5, 10, 25, 50]
        ],
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ]
    });

    
</script>

<?= $this->endSection() ;?>