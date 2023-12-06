<?= $this->extend('layout/admin'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/sidebar-admin'); ?>
<?= session()->getFlashdata('pesan'); ?>

<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Data Jabatan</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-editable">
                            <div class="search-form mb-3 col-md-4 float-right">
                                <span class="table-add float-right mb-3">
                                    <a href="<?= base_url('admin/tambah_jabatan') ?>" class="btn btn-sm iq-bg-info"><i class="icon-plus1"><span class="pl-1">Add
                                                New</span></i>
                                    </a>
                                </span>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..." id="datatable_filter-jabatan">
                                    <div class="input-group-append">
                                        <button type="button" id="datatable_filter-jabatan" class="btn user-bg-color text-white">Search</button>
                                    </div>
                                </div>
                            </div>

                            <table id="datatable-jabatan" class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Jabatan</th>
                                        <th>Gaji Pokok</th>
                                        <th>Jam Masuk - Jam Keluar</th>
                                        <th>Id Jabatan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($jabatan != null) : ?>
                                        <?php
                                        $no = 1;
                                        foreach ($jabatan as $j) : ?>
                                            <tr>
                                                <td><?= $j->nama_jabatan; ?></td>
                                                <td>Rp <?= $j->gaji_pokok; ?></td>
                                                <td><?= $j->jam_masuk; ?> - <?= $j->jam_keluar; ?></td>
                                                <td><?= $j->id_jabatan; ?></td>
                                                <td>
                                                    <a href="javascript:void(0);" class="table-remove btn-edit" data-placement="top" data-original-title="Edit" data-id_jabatan="<?= $j->id_jabatan; ?>" data-nama_jabatan="<?= $j->nama_jabatan; ?>" data-gaji_pokok="<?= $j->gaji_pokok; ?>" data-jam_masuk="<?= $j->jam_masuk; ?>" data-jam_keluar="<?= $j->jam_keluar; ?>"><button class="btn iq-bg-primary btn-rounded btn-sm my-0" data-toggle="modal" data-target="#jabatanModal">
                                                            <i class="icon-edit"></i></button></a>
                                                    <a href="<?= base_url('admin/hapus_jabatan'); ?>/<?= $j->id_jabatan; ?>" class="table-remove btn-hapus" data-placement="top" data-original-title="Delete"><button class="btn iq-bg-danger btn-rounded btn-sm my-0"><i class="icon-delete"></i></button></a>
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

<div class="modal fade" id="jabatanModal" tabindex="-1" role="dialog" aria-labelledby="jabatanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Edit Data Jabatan</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form action="<?= base_url('admin/edit_jabatan'); ?>" method="POST" enctype="multipart/form-data" class="text-center mt-4">
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card text-left">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Jabatan</label>
                                                    <input class="form-control" type="hidden" name="id_jabatan" required>
                                                    <input class="form-control" type="text" name="nama_jabatan" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Gaji Pokok</label>
                                                    <input type="text" class="form-control" name="gaji_pokok" required />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Jam Masuk</label>
                                                    <input type="time" class="form-control" name="jam_masuk" required />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Jam Keluar</label>
                                                    <input type="time" class="form-control" name="jam_keluar" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn user-bg-color text-white next action-button float-left mt-4">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.btn-edit').click(function() {
        $('input[name=id_jabatan]').val($(this).data('id_jabatan'));
        $('input[name=nama_jabatan]').val($(this).data('nama_jabatan'));
        $('input[name=gaji_pokok]').val($(this).data('gaji_pokok'));
        $('input[name=jam_masuk]').val($(this).data('jam_masuk'));
        $('input[name=jam_keluar]').val($(this).data('jam_keluar'));
    });

    var table = $('#datatable-jabatan').DataTable({
        "ordering": true,
        dom: 'lfrtip',
        "lengthMenu": [
            [-1, 5, 10, 25, 50],
            ["All", 5, 10, 25, 50]
        ],
        "pageLength": 5,
    });
    var ordering = table.order();

    // Ubah desain search field
    $('#datatable_filter-jabatan').on('keyup', function() {
        // Aktifkan fungsi search
        $('#datatable-jabatan').DataTable().search($('#datatable_filter-jabatan').val()).draw();
    });
</script>

<?= $this->endSection(); ?>