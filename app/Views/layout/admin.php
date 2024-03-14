<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/template/img/logo-absenin-mini.png">

    <title>Admin</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/template/css/bootstrap.min.css">

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/template/fonts/style.css">

    <!-- Typography CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/template/css/typography.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/template/css/style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/template/css/responsive.css">

    <!-- Jquery and Bootstrap Bundle Js -->
    <script src="<?= base_url() ?>/assets/template/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/template/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/template/vendor/swal/sweetalert2.all.js"></script>

    <!-- PLUGIN -->
    <?= $plugin; ?>

</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->

    <!-- Page wrapper start -->
    <div class="wrapper">
        <?= $this->renderSection('content'); ?>
    </div>
    <!-- Page wrapper end -->

    <!-- Footer -->
    <footer class="iq-footer">
        <!-- <div class="container-fluid"> -->
        <div class="row">
            <div class="col-lg-12 text-right">
                &copy; <?php echo date('Y'); ?> <a>Attendify</a>
            </div>
        </div>
        <!-- </div> -->
    </footer>
    <!-- Footer END -->


    <!-- Magnific Popup JavaScript -->
    <script src="<?= base_url() ?>/assets/template/js/jquery.magnific-popup.min.js"></script>

    <!-- Select2 JavaScript -->
    <script src="<?= base_url() ?>/assets/template/js/select2.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="<?= base_url() ?>/assets/template/js/custom.js"></script>

    <script>
        $(document).ready(function() {
            $('.btn-hapus').click(function(e) {
                e.preventDefault();
                var href = $(this).attr('href');

                Swal.fire({
                    title: 'Kamu Yakin?',
                    text: "data yg di hapus tidak dapat kembali!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {

                        document.location.href = href;

                    }
                })

            })
        });
    </script>

</body>

</html>