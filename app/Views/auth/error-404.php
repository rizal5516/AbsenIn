<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404 Page</title>

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/template/css/bootstrap.min.css">

    <!-- Error Page CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/template/css/error-404.css">

</head>

<body>
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="text-center error-page">
        <h1 class="fw-bold display-1 text-color">404</h1>
        <p class="fs-5">Mohon maaf sepertinya<br> halaman yang kamu tuju tidak ada atau sedang dalam perbaikan.</p>
        <!-- <h5>We're sorry but it looks <br>like that page doesn't exist anymore.</h5> -->
        <a href="<?= base_url('auth'); ?>" class="btn btn-color">Back to Home</a>
    </div>
</div>

<!-- Jquery and Bootstrap Bundle Js -->
<script src="<?= base_url()?>/assets/template/js/jquery.min.js"></script>
<script src="<?= base_url()?>/assets/template/js/bootstrap.bundle.min.js"></script>

</body>

</html>