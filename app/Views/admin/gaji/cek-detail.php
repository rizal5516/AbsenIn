<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-admin'); ?>

<!-- Page Content -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Riwayat Kehadiran</h4>
                </div>
                <span class="table-add float-right mb-3 m-3">
                    <button onclick="history.back()" class="btn btn-sm iq-bg-danger">
                        <i class="icon-arrow_back"><span class="pl-1">Back</span></i>
                    </button>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <div id="table-excel-pdf" class="table-editable">
                            <table id="datatable_riwayat-penggajian"
                                class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Keterangan</th>
                                        <th>Nama</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Total Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($gaji != null) : ?>
                                    <?php foreach ($gaji as $g) : ?>
                                    <tr>
                                        <td><?= date('Y-M-01', strtotime($g->bulan)); ?></td>
                                        <td>
                                            <span class="table-remove">
                                                <a href="<?= base_url('gaji/cekDetail') . '/' . $g->id; ?>"
                                                    class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2">
                                                    <i class="icon-open_in_new"></i>Cek Detail
                                                </a>
                                            </span>
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
                title: 'Data Penggajian'
            },
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