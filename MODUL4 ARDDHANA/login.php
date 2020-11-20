<?php
require_once 'UserModel.php';
if (isset($_SESSION['logged_in'])) {
    header('location: index.php');
}
$login = new UserModel();
$rememberMe = false;
if (isset($_POST['btn_login'])) {
    $email = $_POST['email'];
    $password = $_POST['sandi'];
    $rememberMe = isset($_POST['remember_me']);
    var_dump($login->login($email, $password, $rememberMe));
    if ($login->login($email, $password, $rememberMe)) {
        $alert = "Login Berhasil";
        $_SESSION['message'] = $alert;
        header('Location: index.php');
        exit();
    } else {
        $alert = "Login Gagal";
        $_SESSION['message'] = $alert;
        header('Location: login.php');
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
    <title>Login</title>
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
    <div class="row justify-content-center h-100">
        <div class="col-6  justify-content-center align-middle">
            <div class="card shadow border-0">
                <div class="card-header text-center bg-transparent border-0 mt-4">
                    <h3 class="text-decoration-none">Login</h3>
                </div>
                <div class="card-body px-5">
                    <?php
                    if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
                        $saved_email = $_COOKIE['email'];
                        $saved_password = $_COOKIE['password'];
                    } else {
                        $saved_email = "";
                        $saved_password = "";
                    }
                    ?>
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="e-mail">E-mail</label>
                            <input type="email" required class="form-control" name="email" id="e-mail"
                                   value="<?php echo $saved_email ?>">
                        </div>
                        <div class="form-group">
                            <label for="sandi">Kata Sandi</label>
                            <input type="password" required class="form-control" name="sandi" id="sandi"
                                   value="<?php echo $saved_password ?>">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" class="form-check-inline" name="remember_me"
                                   id="remember_me" value="true">
                            <label for="remember_me">Remember Me</label>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" name="btn_login" type="submit">Login</button>
                        </div>
                        <div class="form-group text-center">
                            <a href="register.php" class="">Belum punya akun? Registrasi</a>
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
</body>
</html>