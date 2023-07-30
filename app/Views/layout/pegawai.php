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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-right">
                    Copyright 2023 <a href="#">AbsenIn</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END -->

    <!-- Jquery Counter Up JavaScript -->
    <script src="<?= base_url() ?>/assets/template/js/jquery.counterup.min.js"></script>

    <!-- Magnific Popup JavaScript -->
    <script src="<?= base_url() ?>/assets/template/js/jquery.magnific-popup.min.js"></script>

    <!-- Smooth Scrollbar JavaScript -->
    <script src="<?= base_url() ?>/assets/template/js/smooth-scrollbar.js"></script>

    <!-- Slick JavaScript -->
    <script src="<?= base_url() ?>/assets/template/js/slick.min.js"></script>

    <!-- Select2 JavaScript -->
    <script src="<?= base_url() ?>/assets/template/js/select2.min.js"></script>

    <!-- Chart Custom JavaScript -->
    <script src="<?= base_url() ?>/assets/template/js/chart-custom.js"></script>

    <!-- Custom JavaScript -->
    <script src="<?= base_url() ?>/assets/template/js/custom.js"></script>
</body>

</html>