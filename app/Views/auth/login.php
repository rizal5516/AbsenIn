<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/template/img/logo-absenin-mini.png">
    <title>Log In - Attendify</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/template/css/bootstrap.min.css">

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/template/fonts/style.css">

    <!-- Typography CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/template/css/typography.css">

    <!-- Style CSS  -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/template/css/login.css">

    <!-- Responsive CSS  -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/template/css/responsive.css">

    <!-- SweetAlert Js  -->
    <script src="<?= base_url() ?>/assets/template/vendor/swal/sweetalert2.all.js"></script>

</head>

<body>
    <div class="loginBox">
        <img class="logo" src="<?= base_url() ?>/assets/template/img/logo-absenin-mini.png" alt="AbsenInLogo" height="45px" width="175px">
        <h3>Log In Here</h3>
        <form action="<?= base_url() ?>auth/login" method="POST">
            <div class="form-group mb-4">
                <label for="inputEmail">Email address</label>
                <input type="email" name="email" class="form-control mb-0" id="inputEmail" placeholder="Enter email" value="<?= old('email'); ?>" autofocus required>
            </div>
            <div class="form-group mb-4">
                <label for="inputPassword">Password</label>
                <input type="password" name="password" class="form-control mb-0" id="inputPassword" placeholder="Password" required>
            </div>
            <div class="sign-info text-center mb-3">
                <button type="submit" class="btn sign-in-btn-color text-white p-2 d-block w-100 mb-2">Sign
                    in</button>
            </div>
        </form>
    </div>
    <!-- Sign in END -->

    <!-- Optional JavaScript -->
    <!-- Jquery and Bootstrap Bundle Js -->
    <script src="<?= base_url() ?>/assets/template/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/template/js/bootstrap.min.js"></script>

    <?= session()->getFlashdata('pesan'); ?>
</body>

</html>