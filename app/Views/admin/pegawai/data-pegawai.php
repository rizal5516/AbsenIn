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
                            <h4 class="card-title">Data Pegawai</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-editable">
                            <div class="search-form mb-3 col-md-4 float-right">
                                <span class="table-add float-right mb-3">
                                    <a href="<?= base_url('admin/tambah_pegawai') ?>" class="btn btn-sm iq-bg-info"><i class="icon-plus1"><span class="pl-1">Add
                                                New</span></i>
                                    </a>
                                </span>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..." id="table-excel-pdf_filter-pegawai">
                                    <div class="input-group-append">
                                        <button type="button" id="table-excel-pdf_filter-pegawai" class="btn user-bg-color text-white">Search</button>
                                    </div>
                                </div>
                            </div>
                            <table id="table-excel-pdf" class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Nama Pegawai</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Email</th>
                                        <th>Tunjangan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($pegawai != null) : ?>
                                        <?php foreach ($pegawai as $p) : ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex flex-wrap">
                                                        <div class="user-img">
                                                            <img src="<?= base_url('assets/img/pegawai'); ?>/<?= $p->gambar; ?>" class="avatar-60 rounded img-fluid" alt="User Image">
                                                        </div>
                                                        <div class="media-support-info mt-2">
                                                            <a style="font-weight: bolder;"><?= $p->nama_pegawai; ?></a>
                                                            <p class="text-muted" style="letter-spacing: 2px;">NIK: #<?= $p->nip; ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?= $p->nama_jabatan; ?></td>
                                                <td>
                                                    <?php if ($p->is_active == 1) : ?>
                                                        <span class="table-remove"><button type="button" class="btn iq-bg-success btn-rounded btn-sm my-0 mr-2">Active</button></span>
                                                    <?php else : ?>
                                                        <span class="table-remove"><button type="button" class="btn iq-bg-danger btn-rounded btn-sm my-0 mr-2">Deactive</button></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $p->email; ?></td>
                                                <td><?= $p->tunjangan; ?></td>
                                                <td>
                                                    <a href="javascript:void(0);" class="table-remove btn-edit" data-placement="top" data-original-title="Edit" data-id_pegawai="<?= $p->id_pegawai; ?>"><button class="btn iq-bg-primary btn-rounded btn-sm my-0" data-toggle="modal" data-target="#editModal"><i class="icon-edit"></i></button></a>
                                                    <a href="<?= base_url('admin/hapus_pegawai'); ?>/<?= $p->id_pegawai; ?>" class="table-remove btn-hapus" data-placement="top" title="" data-original-title="Delete"><button class="btn iq-bg-danger btn-rounded btn-sm my-0"><i class="icon-delete"></i></button></a>
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

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" style="display: none;" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Edit Data Pegawai</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form action="<?= base_url('admin/edit_pegawai_'); ?>" method="POST" enctype="multipart/form-data" class="text-center mt-4">
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card text-left">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Nama Pegawai</label>
                                                    <input class="form-control" id="id_pegawai" type="hidden" name="id_pegawai" required>
                                                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" title="Select Product Category" data-live-search="true" required>
                                                        <option value="Laki - Laki">Laki - Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="jabatan">Jabatan</label>
                                                    <select class="form-control" id="jabatan" name="jabatan" title="Select Product Category" data-live-search="true" required>
                                                        <?php foreach ($jabatan as $j) : ?>
                                                            <option value="<?= $j->id_jabatan; ?>">
                                                                <?= $j->nama_jabatan; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" required />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Tunjangan</label>
                                                    <input type="text" class="form-control" id="tunjangan" name="tunjangan" required />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="text" class="form-control" id="password" name="password" required />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="is_active">Status</label>
                                                    <select class="form-control" id="is_active" name="is_active" title="Select Product Category" data-live-search="true" required>
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="iq-card justify-content-center align-items-center">
                                                    <div class="iq-card-body">
                                                        <div class="gambar"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-12 form-group input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputFotoPegawai">Choose
                                                            File</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" aria-describedby="inputFotoPegawai" name="gambar" id="input-foto" onchange="previewImg();" accept=".jpg, .jpeg, .png">
                                                        <label class="custom-file-label" for="input-foto">Choose
                                                            file</label>
                                                    </div>
                                                    <input type="hidden" name="gambar_lama" id="gambar_lama">
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
        var id_pegawai = $(this).data('id_pegawai');

        $.ajax({
            type: 'post',
            dataType: 'JSON',
            data: {
                id_pegawai: id_pegawai,
            },
            url: "<?= base_url('admin/edit_pegawai') ?>",
            success: function(data) {
                $.each(data, function(id_pegawai, nip, nama_pegawai, jenis_kelamin, jabatan, email, tunjangan, password, gambar, is_active, role) {
                    $("#id_pegawai").val(data.id_pegawai);
                    $("#nip").val(data.nip);
                    $("#nama_pegawai").val(data.nama_pegawai);
                    $("#jenis_kelamin").val(data.jenis_kelamin);
                    $("#jabatan").val(data.jabatan);
                    $("#email").val(data.email);
                    $("#tunjangan").val(data.tunjangan);
                    $("#password").val(data.password);
                    var gambar = `<img src="<?= base_url('assets/img/pegawai'); ?>/` + data
                        .gambar +
                        `" class="img-thumbnail foto-pegawai" alt="Foto Pegawai" style="width: 90%;">`;
                    $(".gambar").html(gambar);
                    $("#gambar_lama").val(data.gambar);
                    $("#is_active").val(data.is_active);
                });
            }
        })
    });

    function previewImg() {
        const gambar = document.querySelector('#input-foto');
        const imgPreview = document.querySelector('.foto-pegawai');

        const filegambar = new FileReader();
        filegambar.readAsDataURL(gambar.files[0]);

        filegambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }

    // Get the custom file input element
    const customFileInput = document.querySelector('#input-foto');

    // Add an event listener for the 'change' event
    customFileInput.addEventListener('change', function() {
        // Get the file name
        const fileName = customFileInput.value.split('\\').pop();

        // Update the label text
        const customFileLabel = document.querySelector('.custom-file-label');
        customFileLabel.textContent = fileName;
    });

    $('#table-excel-pdf').DataTable({
        "ordering": true,
        "lengthMenu": [
            [-1, 5, 10, 25, 50],
            ["All", 5, 10, 25, 50]
        ],
        "pageLength": 5,
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: 'Data Pegawai'
            },
            // 'csvHtml5',
            {
                extend: 'pdfHtml5',
                title: 'Data Pegawai'
            },
            {
                extend: 'print',
                title: 'Data Pegawai'
            }
        ],
    });

    // Ubah desain search field
    $('#table-excel-pdf_filter-pegawai').on('keyup', function() {
        // Aktifkan fungsi search
        $('#table-excel-pdf').DataTable().search($('#table-excel-pdf_filter-pegawai').val()).draw();
    });
</script>

<?= $this->endSection(); ?>