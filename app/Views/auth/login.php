<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/template/img/logo-absenin-mini.png">
    <title>Sign In - AbsenIn</title>

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

</head>

<body>
    <div class="loginBox">
        <img class="logo" src="<?= base_url() ?>/assets/template/img/logo-absenin-mini.png" height="100px" width="100px">
        <h3>Log In Here</h3>
        <form action="<?= base_url() ?>auth/login" method="POST">
            <div class="form-group mb-4">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control mb-0" id="exampleInputEmail1"
                    placeholder="Enter email">
            </div>
            <div class="form-group mb-4">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control mb-0" id="exampleInputPassword1"
                    placeholder="Password">
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
</body>

</html>
<div>
    <div>
        <div class="col"></div>
    </div>
</div>