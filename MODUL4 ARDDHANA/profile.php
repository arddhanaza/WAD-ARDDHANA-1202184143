<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body class="">
<nav class="navbar navbar-expand navbar-light bg-default">
    <a class="navbar-brand" href="index.php"><img alt="" id="logo-nav">WAD Beauty</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href=""><i class="fa fa-shopping-cart"></i></a>
        </li>
        <li class="dropdown">
            <a class="nav-link dropdown-toggle nav-link-lg nav-link-user" data-toggle="dropdown" href="#">
                <div class="d-sm-none d-lg-inline-block">Selamat Datang, <span class="text-primary">Nama</span></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item has-icon" href="">
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item has-icon text-danger" href="">
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    Berhasil Ditambahkan
</div>

<div class="container h-100 align-content-center p-5">
    <div class="row justify-content-center d-flex h-100">
        <div class="col-10 mt-5">
            <div class="card border-0">
                <div class="card-header border-0 bg-transparent text-center">
                    <h1>Profile</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <p>Email</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control form-inline" name="nama" id="nama"
                                       value="Value">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control form-inline" name="no_hp" id="no_hp"
                                       value="Value">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sandi" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" required class="form-control form-inline" name="sandi"
                                       id="sandi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="konfirmasi_sandi" class="col-sm-2 col-form-label">Password Confirm</label>
                            <div class="col-sm-10">
                                <input type="password" required class="form-control form-inline" name="konfirmasi_sandi"
                                       id="konfirmasi_sandi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="warna_navbar" class="col-sm-2 col-form-label">Warna Navbar</label>
                            <div class="col-sm-10">
                                <select name="warna_navbar" id="warna_navbar">
                                    <option value="default">Default</option>
                                    <option value="light">Light</option>
                                    <option value="dark">Dark</option>
                                    <option value="primary">Primary</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary btn-block" type="button">Submit</button>
                        </div>
                        <div class="form-group text-center">
                            <a href="index.php" class="btn btn-secondary btn-block" type="button">Cancle</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        © 2020 Copyright: <a href="index.php">WAD Beauty</a>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>
</html>