<?php
$kamar = array(
    array("image" => "img1.jpg", "tipe" => "Standard", "harga" => 90, "facilities" => array("1 Single Bed", "1 Bathroom")),
    array("image" => "img2.jpg", "tipe" => "Superior", "harga" => 150, "facilities" => array("1 Double Bed", "1 Television and WI-FI", "1 Bathroom with Hot Water")),
    array("image" => "img3.jpg", "tipe" => "Luxury", "harga" => 200, "facilities" => array("2 Double Bed", "2 Bathroom with Hot Water", "1 Kitchen", "1 Television and WI-FI", "1 Workroom")),
)
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Home</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-primary  justify-content-center">
    <a class="navbar-brand" href="home.html"><img alt="" id="logo-nav" src="assets/img/logo-ead.png"></a>
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="">Home </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="">Booking</a>
        </li>
    </ul>
</nav>
<section class="container mt-5">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>EAD HOTEL</h1>
            <h3>Welcome to 5 Star Hotel</h3>
        </div>
    </div>
    <div class="row">
        <?php
        for ($row = 0; $row < count($kamar); $row++) {
            echo '
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card text-center">
                    <div class="card-img-top" style="overflow: hidden">
                        <img src="assets/img/' . $kamar[$row]["image"] . '" alt="" style="object-fit: cover !important; width: 500px;">
                    </div>
                    <div class="card-header">
                        <h3>' . $kamar[$row]["tipe"] . '</h3>
                        <h5>$ ' . $kamar[$row]["harga"] . '/ Day</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Facilities</th>
                            </tr>
                            </thead>
                            <tbody>';
            for ($facility = 0; $facility < count($kamar[$row]['facilities']); $facility++) {
                echo '
                                <tr>
                                    <td>' . $kamar[$row]["facilities"][$facility] . '</td>
                                </tr>';
            }
            echo '
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>    
            ';
        }
        ?>

    </div>
</section>
<script src="assets/js/bootstrap.bundle.js"></script>
</body>
</html>
