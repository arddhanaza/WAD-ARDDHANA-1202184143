<?php
require_once 'UserModel.php';
$user = new UserModel();
if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
}
if (isset($_POST['btn_logout'])) {
    $user->logOut();
}
if (isset($_GET['id'])) {
    if ($_GET['id'] == $_SESSION['id']) {
        $item = $user->getDataUser($_GET['id'])->fetch_assoc();
    } else {
        header('location: profile.php?id=' . $_SESSION["id"]);
    }
} else {
    header("location: index.php");
    exit();
}
if (isset($_POST['btn_edit'])) {
    $id = $_SESSION['id'];
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $password_baru = $_POST['sandi'];
    if (isset($_POST['warna_navbar'])) {
        $warna_navbar = $_POST['warna_navbar'];
    } else {
        $warna_navbar = "bg-default";
    }
    if ($user->save_edit($id, $nama, $email, $no_hp, $password_baru, $warna_navbar)) {
        $alert = "Berhasil Update Data";
        $_SESSION['message'] = $alert;
        header("Location: profile.php?id=" . $_SESSION["id"]);
        exit();
    } else {
        $alert = "Gagal Update Data";
        $_SESSION['message'] = $alert;
        header("Location: profile.php?id=" . $_SESSION["id"]);
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
    <title>Profile</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body class="">
<?php
if (isset($_COOKIE['theme']) == true) {
    $bg = $_COOKIE['theme'];
} else {
    $bg = 'bg-default';
}
?>
<nav class="navbar navbar-expand navbar-light <?php echo $bg ?>">
    <a class="navbar-brand" href="index.php"><img alt="" id="logo-nav">WAD Beauty</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i></a>
        </li>
        <li class="dropdown">
            <a class="nav-link dropdown-toggle nav-link-lg nav-link-user" data-toggle="dropdown" href="#">
                <div class="d-sm-none d-lg-inline-block">Selamat Datang, <span
                            class="text-primary"><?php echo $_SESSION['nama'] ?></span></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item has-icon" href="profile.php?id=<?php echo $_SESSION['id'] ?>">
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <form action="index.php" method="post">
                    <button class="dropdown-item has-icon text-danger" type="submit" name="btn_logout">
                        Logout
                    </button>
                </form>
            </div>
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
        <div class="col-10 mt-5">
            <div class="card border-0">
                <div class="card-header border-0 bg-transparent text-center">
                    <h1>Profile</h1>
                </div>
                <div class="card-body">
                    <form action="profile.php?id=<?php echo $item["id"] ?>" method="post">
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <p><?php echo $item["email"] ?></p>
                                <input type="hidden" name="email" value="<?php echo $item["email"] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control form-inline" name="nama" id="nama"
                                       value="<?php echo $item["nama"] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                            <div class="col-sm-10">
                                <input type="number" required class="form-control form-inline" name="no_hp" id="no_hp"
                                       value="<?php echo $item["no_hp"] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sandi" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control form-inline" name="sandi"
                                       id="sandi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="konfirmasi_sandi" class="col-sm-2 col-form-label">Password Confirm</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control form-inline"
                                       name="konfirmasi_sandi"
                                       id="konfirmasi_sandi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="warna_navbar" class="col-sm-2 col-form-label">Warna Navbar</label>
                            <div class="col-sm-10">
                                <select name="warna_navbar" id="warna_navbar">
                                    <option value="bg-default">Default</option>
                                    <option value="bg-light">Light</option>
                                    <option value="bg-dark">Dark</option>
                                    <option value="bg-primary">Primary</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary btn-block" type="submit" name="btn_edit">Submit</button>
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