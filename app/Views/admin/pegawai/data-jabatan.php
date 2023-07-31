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
                            <h4 class="card-title">Data Jabatan</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div id="table-excel-pdf" class="table-editable">
                            <form class="search-form mb-3 col-md-4 float-right">
                                <span class="table-add float-right mb-3">
                                    <a href="<?= base_url('admin/tambah_jabatan') ?>" class="btn btn-sm iq-bg-info"><i
                                            class="icon-plus1"><span class="pl-1">Add
                                                New</span></i>
                                    </a>
                                </span>
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
                                        <th>Jabatan</th>
                                        <th>Gaji Pokok</th>
                                        <th>Tunjangan</th>
                                        <th>Id Jabatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($jabatan != null) : ?>
                                    <?php
                                            $no = 1;
                                            foreach ($jabatan as $j) : ?>
                                    <tr>
                                        <td><?= $j->nama_jabatan; ?></td>
                                        <td>Rp 1000.000</td>
                                        <td>Rp 1000.000</td>
                                        <td><?= $j->id_jabatan; ?></td>
                                        <td>
                                            <a href="javascript:void(0);" class="table-remove btn-edit"
                                                data-placement="top" data-original-title="Edit"
                                                data-id_jabatan="<?= $j->id_jabatan; ?>"
                                                data-nama_jabatan="<?= $j->nama_jabatan; ?>"><button
                                                    class="btn iq-bg-primary btn-rounded btn-sm my-0 mr-2"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="icon-edit"></i>Edit</button></a>
                                            <a href="<?= base_url('admin/hapus_jabatan'); ?>/<?= $j->id_jabatan; ?>"
                                                class="table-remove btn-hapus" data-placement="top"
                                                data-original-title="Delete"><button
                                                    class="btn iq-bg-danger btn-rounded btn-sm my-0 ml-2"><i
                                                        class="icon-delete"></i>Delete</button></a>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                            <form action="<?= base_url('admin/edit_jabatan'); ?>" method="POST"
                                class="text-center mt-4">
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card text-left">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Jabatan</label>
                                                    <input class="form-control" type="hidden" name="id_jabatan"
                                                        required>
                                                    <input class="form-control" type="text" name="nama_jabatan"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Gaji Pokok</label>
                                                    <input type="text" class="form-control" name="gaji-pokok" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Tunjangan</label>
                                                    <input type="text" class="form-control" name="tunjangan" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button
                                        class="btn user-bg-color text-white next action-button float-left mt-4">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.btn-edit').click(function () {
        $('input[name=id_jabatan]').val($(this).data('id_jabatan'));
        $('input[name=nama_jabatan]').val($(this).data('nama_jabatan'));
    });

    var table = $('#datatable').DataTable({
        "ordering": true,
        "lengthMenu": [
            [-1, 5, 10, 25, 50],
            ["All", 5, 10, 25, 50]
        ],
    });
    var ordering = table.order();
</script>

<?= $this->endSection() ;?>