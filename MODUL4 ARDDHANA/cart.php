<?php
require_once 'UserModel.php';
require_once 'CartModel.php';
$user = new UserModel();
$cart = new CartModel();
if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
}
if (isset($_POST['btn_logout'])) {
    $user->logOut();
}
if (isset($_POST['btn_delete'])) {
    if ($cart->deleteItem($_POST['btn_delete'])) {
        $alert = "Berhasil Menghapus";
        $_SESSION['message'] = $alert;
        header("Location: cart.php");
        exit();
    } else {
        $alert = "Gagal Menghapus";
        $_SESSION['message'] = $alert;
        header("Location: cart.php");
        exit();
    }

}
$data_belanja = $cart->getItem($_SESSION['id']);
$data_belanja->fetch_assoc();
?>
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
                    <?php
                    $i = 0;
                    foreach ($data_belanja as $item) {
                        $i++;
                        echo '
                        <tr>
                            <td>' . $i . '</td>
                            <td>' . $item["nama_barang"] . '</td>
                            <td>Rp. ' . $item["harga"] . '</td>
                            <form action="cart.php" method="post">
                                <td><button class="btn btn-danger" type="submit" name="btn_delete"
                                value="' . $item["id"] . '">Hapus</button></td>
                            </form>   
                        </tr>  
                        ';
                    }
                    ?>
                    </tbody>
                    <tfooter>
                        <tr>
                            <th colspan="2">Total</th>
                            <th colspan="2">Rp. <?php echo $cart->getTotal($_SESSION['id']); ?></th>
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