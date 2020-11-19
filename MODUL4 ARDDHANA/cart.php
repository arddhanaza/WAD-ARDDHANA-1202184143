<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
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
        <div class="col-12 mt-5">
            <div class="">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Nama Barang</td>
                        <td>Harga</td>
                        <td><a href="#" class="btn btn-danger">Hapus</a></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nama Barang</td>
                        <td>Harga</td>
                        <td><a href="#" class="btn btn-danger">Hapus</a></td>
                    </tr>
                    </tbody>
                    <tfooter>
                        <tr>
                            <th colspan="2">Total</th>
                            <th colspan="2">Rp.12</th>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </div>
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