<?php
require_once 'db_connection.php';
$sql = "SELECT * FROM event";
$res = $conn->query($sql);
$status = false;
if (mysqli_num_rows($res) > 0) {
    $status = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Booking</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-expand navbar-dark navbar-ead-event">
    <a class="navbar-brand" href="index.php"><img alt="" id="logo-nav">EAD EVENTS</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home </a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn btn-outline-light" href="create_event.php">Buat Event</a>
        </li>
    </ul>
</nav>
<div class="container pt-3">
    <div class="row justify-content-center">
        <h3>WELCOME TO EAD EVENTS</h3>
    </div>
    <div class="row">
        <?php
        if ($status) {
            while ($item = $res->fetch_assoc()) {
                echo '
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-5">
                        <div class="card h-100 border-0 shadow">
                            <div class="card-img-top" style="overflow: hidden; height: 300px">
                                <img src="assets/img/' . $item["gambar"] . '" alt="" style="max-width: 100%;object-position: center;object-fit: cover">
                            </div>
                            <div class="card-body">
                                <div class="row col-12">
                                    <h3>' . $item["name"] . '</h3>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <div class="col-10">
                                        ' . $item["tanggal"] . '
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="col-10">
                                        ' . $item["tempat"] . '
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10">
                                        Kategori: Event ' . $item["kategori"] . '
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a class="btn btn-primary" href="details_event.php?id=' . $item["kategori"] . '">Details</a>
                            </div>
                        </div>
                    </div>
            ';
            }
        } else {
            echo '
            <div class="col-12">
                <span>No Events Found</span>
            </div>
        ';
        }
        ?>
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