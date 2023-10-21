<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-admin'); ?>

<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Riwayat Kehadiran</h4>
                </div>
                <span class="table-add float-right mb-3 m-3 ">
                    <a href="<?= base_url('gaji/dataPenggajian') ?>" class="btn btn-sm iq-bg-danger"><i
                            class="icon-arrow_back"><span class="pl-1">Back
                            </span></i>
                    </a>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-lg-3">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <img src="<?= base_url('assets/img/pegawai'); ?>/<?= $pegawai->gambar; ?>" class="img-fluid"
                            alt="Responsive image">
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card iq-mb-3">
                    <div class="row no-gutters flex-row">
                        <div class="col-md-12">
                            <div class="card-body text-left">
                                <div class="iq-card-body">
                                    <form class="text-center">
                                        <!-- fieldsets -->
                                        <fieldset>
                                            <div class="form-card text-left">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" class="form-control" name="nama"
                                                                value="<?= $pegawai->nama_pegawai; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>NIK</label>
                                                            <input type="number" class="form-control" name="nik"
                                                                value="<?= $pegawai->nip; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Jabatan</label>
                                                            <input type="text" class="form-control" name="jabatan"
                                                                value="<?= $pegawai->nama_jabatan; ?>" />
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
                            <form class="search-form mb-3 col-md-4 float-right">
                                <div class="input-group">
                                    <input type="text" id="filter_riwayat-penggajian" class="form-control"
                                        placeholder="Search...">
                                    <div class="input-group-append">
                                        <button type="button" id="filter_riwayat-penggajian"
                                            class="btn user-bg-color text-white">Search</button>
                                    </div>
                                </div>
                            </form>
                            <table id="datatable_riwayat-penggajian"
                                class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Bulan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($gaji != null) : ?>
                                    <?php foreach ($gaji as $g) : ?>
                                    <tr>
                                        <td><?= date('F Y', strtotime($g->bulan)); ?></td>
                                        <td>
                                            <span class="table-remove"><a href="<?= base_url('gaji/cekDetail'); ?>/<?= $g->id; ?>
                                                    class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2">
                                                    <i class="icon-open_in_new"></i>Cek Detail</a></span>
                                        </td>
                                    </tr>
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
    $('#datatable_riwayat-penggajian').DataTable({
        "ordering": true,
        "lengthMenu": [
            [-1, 5, 10, 25, 50],
            ["All", 5, 10, 25, 50]
        ],
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: 'Data Penggajian '
            },
            // 'csvHtml5',
            {
                extend: 'pdfHtml5',
                title: 'Data Penggajian',
                orientation: 'landscape',
                margin: [50, 50, 50, 50]
            },
            {
                extend: 'print',
                title: 'Data Penggajian'
            }
        ],
        "order": [
            [7, 'desc']
        ]
    });

    // Ubah desain search field
    $('#filter_riwayat-penggajian').on('keyup', function () {
        // Aktifkan fungsi search
        $('#datatable_riwayat-penggajian').DataTable().search($('#filter_riwayat-penggajian').val()).draw();
    });
</script>

<?= $this->endSection(); ?>