<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-admin'); ?>

<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Data Penggajian</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-editable">
                            <form class="search-form mb-3 col-md-4 float-right">
                                <div class="input-group">
                                    <input type="text" id="filter_data-penggajian" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button type="button" id="filter_data-penggajian" class="btn user-bg-color text-white">Search</button>
                                    </div>
                                </div>
                            </form>
                            <table id="datatable_data-penggajian" class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Pegawai</th>
                                        <th>Jabatan</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($pegawai != null) : ?>
                                        <?php foreach ($pegawai as $p) : ?>
                                            <tr>
                                                <td><img src="<?= base_url('assets/img/pegawai'); ?>/<?= $p->gambar; ?>" alt="pegawai" class="img-fluid rounded mr-2 mb-4" width="50px">
                                                    <div class="d-inline-block">
                                                        <a href="#"><strong><?= $p->nama_pegawai; ?></strong></a>
                                                        <p class="text-muted" style="letter-spacing: 2px;">NIP: #<?= $p->nip; ?></p>
                                                    </div>
                                                </td>
                                                <td><?= $p->nama_jabatan; ?></td>
                                                <td><?= $p->email; ?></td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn iq-bg-warning btn-salary btn-rounded btn-sm my-0 mr-2" data-toggle="modal" data-target="#salaryModal" data-placement="top" data-original-title="Salary" data-id_pegawai="<?= $p->id_pegawai; ?>">
                                                        <i class="icon-open_in_new"></i>Hitung Gaji</a>
                                                    <a href="<?= base_url('gaji/riwayatPenggajian'); ?>/<?= $p->id_pegawai; ?>" class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2"> <i class="icon-open_in_new"></i>Riwayat Gaji</a>
                                                </td>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                            </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Salary -->
<div class="modal fade" id="salaryModal" tabindex="-1" aria-labelledby="salaryModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('gaji/calculate_salary_'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="salaryModalLabel">Hitung Upah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="overflow-y: scroll;">
                    <!-- Field wrapper start -->
                    <div class="field-wrapper">
                        <input class="form-control" id="id_pegawai" type="hidden" name="id_pegawai" required>
                        <input class="form-control" id="jumlah_siswa" type="number" name="jumlah_siswa" min="0" required>
                        <div class="field-placeholder">Jumlah Siswa <span class="text-danger">*</span></div>
                    </div>
                    <!-- Field wrapper end -->
                </div>
                <div class="modal-footer">
                    <button type="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Hitung</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('.btn-salary').click(function() {
        $('input[name=id_pegawai]').val($(this).data('id_pegawai'));
    });

    $(document).ready(function() {
        $("#salaryModal").on("hidden.bs.modal", function() {
            $("#jumlah_siswa").val("");
        });
    });

    $('#datatable_data-penggajian').DataTable({
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
                title: 'Data Penggajian'
            },
            {
                extend: 'print',
                title: 'Data Penggajian'
            }
        ],
    });

    // Ubah desain search field
    $('#filter_data-penggajian').on('keyup', function() {
        // Aktifkan fungsi search
        $('#datatable_data-penggajian').DataTable().search($('#filter_data-penggajian').val()).draw();
    });
</script>

<?= $this->endSection(); ?>