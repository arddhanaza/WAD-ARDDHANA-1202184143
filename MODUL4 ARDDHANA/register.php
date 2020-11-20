<?php
require_once 'UserModel.php';
if (isset($_SESSION['logged_in'])) {
    header('location: index.php');
}
$register = new UserModel();
$alert = '';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $password = $_POST['password'];
    if ($register->register($nama, $email, $no_hp, $password)) {
        $alert = "Berhasil Registrasi";
        $_SESSION['message'] = $alert;
        header("Location: register.php");
        exit();
    } else {
        $alert = "Berhasil Registrasi";
        $_SESSION['message'] = $alert;
        header("Location: register.php");
        exit();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body class="body-default">
<nav class="navbar navbar-expand navbar-light bg-default">
    <a class="navbar-brand" href="index.php"><img alt="" id="logo-nav">WAD Beauty</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="login.php.php">Login</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="register.php.php">Register</a>
        </li>
    </ul>
</nav>

<?php
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    ' . $_SESSION["message"] . '
                  </div>';
    unset($_SESSION['message']);
}
?>

<div class="container h-100 align-content-center p-5">
    <div class="row justify-content-center d-flex h-100">
        <div class="col-6  justify-content-center align-middle">
            <div class="card shadow border-0">
                <div class="card-header text-center bg-transparent border-0 mt-4">
                    <h3 class="text-decoration-none">Registrasi</h3>
                </div>
                <div class="card-body px-5">
                    <form action="register.php" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" required class="form-control" name="nama" id="nama"
                                   placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <label for="e-mail">E-mail</label>
                            <input type="email" required class="form-control" name="email" id="e-mail"
                                   placeholder="Masukkan Email">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No. Handphone</label>
                            <input type="number" required class="form-control" name="no_hp" id="no_hp"
                                   placeholder="Masukkan Nomor Hp">
                        </div>
                        <div class="form-group">
                            <label for="sandi">Kata Sandi</label>
                            <input type="password" required class="form-control" name="password" id="sandi"
                                   placeholder="Masukkan Password">
                        </div>
                        <div class="form-group">
                            <label for="konfirmasi_sandi">Konfirmasi Kata Sandi</label>
                            <input type="password" required class="form-control" name="konfirmasi_sandi"
                                   id="konfirmasi_sandi" placeholder="Masukkan Konfirmasi Password">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" name="submit" type="submit">Daftar</button>
                        </div>
                        <div class="form-group text-center">
                            <a href="login.php" class="">Sudah punya akun? Login</a>
                        </div>
                    </form>
                </div>
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
<script !src="">
    var new_password = document.getElementById("sandi")
        , confirm_password = document.getElementById("konfirmasi_sandi");

    function validatePassword() {
        if (new_password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    new_password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>

</body>
</html>
