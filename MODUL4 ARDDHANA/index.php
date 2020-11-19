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

<?php
$data = array(
    array("image" => "img1.jpg", "title" => "Yuja Nicain 30 Days Blemish Care Serum", "text" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, architecto assumenda at atque deleniti eos fuga harum impedit iure nam nemo perferendis quaerat rem repellendus tempora, tenetur totam, ut vero.", "price" => 16900),
    array("image" => "img2.png", "title" => "Superior", "text" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, architecto assumenda at atque deleniti eos fuga harum impedit iure nam nemo perferendis quaerat rem repellendus tempora, tenetur totam, ut vero.", "price" => 180000),
    array("image" => "img3.png", "title" => "Luxury", "text" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, architecto assumenda at atque deleniti eos fuga harum impedit iure nam nemo perferendis quaerat rem repellendus tempora, tenetur totam, ut vero.", "price" => 108000)
);

?>
<div class="container h-100 align-content-center p-5">
    <div class="row justify-content-center d-flex h-100">
        <div class="col-12">
            <div class="card rounded-0 border-0">
                <div class="card-header bg-gradient text-center p-4">
                    <div class="card-title">
                        <h1>WAD Beauty</h1>
                        <p>Tersedia Skin Care dengan harga murah tapi bukan murahan dan berkualitas</p>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="row px-3">
                        <?php
                        foreach ($data as $datum) {
                            ?>
                            <div class="col-4 p-0">
                                <div class="card h-100 rounded-0">
                                    <div class="card-img-top" style="overflow: hidden; height: 300px">
                                        <img src="assets/img/<?php echo $datum['image'] ?>" alt="" class="h-100">
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h5><?php echo $datum['title'] ?></h5>
                                        </div>
                                        <div class="card-text">
                                            <p><?php echo $datum['text'] ?></p>
                                        </div>
                                        <div class="card-text">
                                            <strong><p>Rp. <?php echo $datum['price'] ?></p></strong>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <form action="cart.php" method="post">
                                            <input type="hidden" name="nama_barang"
                                                   value="<?php echo $datum['title'] ?>">
                                            <input type="hidden" name="harga" value="<?php echo $datum['price'] ?>">
                                            <button class="btn btn-block btn-primary" type="submit">Tambahkan ke
                                                Keranjang
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
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