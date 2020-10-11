
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Booking</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-primary  justify-content-center">
    <a class="navbar-brand" href="home.html"><img alt="" id="logo-nav" src="assets/img/logo-ead.png"></a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="home.php">Home </a>
        </li>
        <li class="nav-item active ">
            <a class="nav-link" href="book.php">Booking</a>
        </li>
    </ul>
</nav>
<section class="container mt-5">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <form action="checkout.php" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-inline form-control" name="nama" id="nama" required>
                </div>
                <div class="form-group">
                    <label for="checkindate">Check In</label>
                    <input type="date" class="form-inline form-control" name="checkindate" id="checkindate" required
                           min="<?php echo date("Y-m-d") ?>">
                </div>
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="number" class="form-inline form-control" name="duration" id="duration" required
                           min="1">
                    <span>Day(s)</span>
                </div>
                <div class="form-group">
                    <label for="room-type">Check In</label>
                    <?php
                    if (isset($_POST['Tipe'])) {
                        $tipe_selected = $_POST['Tipe'];
                        echo '
                            <select name="roomtype" id="room-type" class="form-inline form-control" disabled>
                                <option value="' . $tipe_selected . '">
                                    ' . $tipe_selected . '
                                </option>                           
                            </select>
                            <input type="hidden" name="roomtype" value="' . $tipe_selected . '">
                            ';
                    } else {
                        $tipe_kamar = array('Standard', 'Superior', 'Luxury');
                        echo '
                            <select name="roomtype" id="room-type" class="form-inline form-control">
                            ';
                        for ($tipe = 0; $tipe < count($tipe_kamar); $tipe++) {
                            echo '
                            <option value="' . $tipe_kamar[$tipe] . '">
                                ' . $tipe_kamar[$tipe] . '
                            </option>
                            ';
                        }
                        echo '
                            </select>
                            ';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="add-service">Add Service(s)</label>
                    <span>$20/ Service</span>
                    <div class="" id="add-service">
                        <input type="checkbox" name="roomservice[]" id="roomservice" value="Room Service">
                        <label for="roomservice">Room Service</label>
                        <br>
                        <input type="checkbox" name="roomservice[]" id="breakfast" value="Breakfast">
                        <label for="breakfast">Breakfast</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phonenumber">Phone Number</label>
                    <input type="number" class="form-inline form-control" name="phonenumber" id="phonenumber" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Book</button>
                </div>
            </form>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <?php
            if (isset($_POST['Tipe'])) {
                if ($tipe_selected == "Standard") {
                    echo '
                        <img src="assets/img/img1.jpg" alt="" style="width: 500px">        
                    ';
                } elseif ($tipe_selected == "Superior") {
                    echo '
                        <img src="assets/img/img2.jpg" alt="" style="width: 500px">        
                    ';
                } else {
                    echo '
                        <img src="assets/img/img3.jpg" alt="" style="width: 500px">        
                    ';
                }
            } else {
                echo '
              <img src="assets/img/img1.jpg" alt="" style="width: 500px">
              ';
            }
            ?>
        </div>
    </div>
</section>
<script src="assets/js/bootstrap.bundle.js"></script>
</body>
</html>
