<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Check Out</title>
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
        <li class="nav-item">
            <a class="nav-link" href="book.php">Booking</a>
        </li>
    </ul>
</nav>
<section class="container mt-5">
    <table class="table">
        <thead>
        <tr>
            <th>Booking Number</th>
            <th>Name</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Room Type</th>
            <th>Phone Number</th>
            <th>Service</th>
            <th>Total Price</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php

            if (isset($_GET['nama'])) {
                $nama = $_POST['nama'];
                $check_in_date = $_POST['checkindate'];
                $duration = $_POST['duration'];
                $room_type = $_POST['roomtype'];
                $phonenumber = $_POST['phonenumber'];

                $add_date = new DateTime($check_in_date);
                $add_date->modify('' . $duration . ' day');
                $checkout = $add_date->format('Y-m-d');
                if ($room_type == "Standard") {
                    $price = 90;
                    $price = $price * $duration;
                } elseif ($room_type == "Superior") {
                    $price = 150;
                    $price = $price * $duration;
                } else {
                    $price = 200;
                    $price = $price * $duration;
                }

                if ((isset($_POST['roomservice']))) {
                    $roomservices = $_POST['roomservice'];
                    $final_price = $price + ((20 * count($roomservices)) * $duration);
                } else {
                    $roomservices = null;
                    $final_price = $price;
                }
            } else {
                header("Location: home.php");
            }
            ?>
            <td><b><?php echo rand(min([11111]), max([99999])) ?></b></td>
            <td><?php echo $nama ?></td>
            <td><?php echo $check_in_date; ?></td>
            <td><?php echo $checkout ?></td>
            <td><?php echo $room_type ?></td>
            <td><?php echo $phonenumber ?></td>
            <td>
                <ul>
                    <?php
                    if ((isset($roomservices))) {
                        foreach ($roomservices as $room) {
                            echo '
                            <li>' . $room . '</li>            
                        ';
                        }
                    } else {
                        echo '<li>No Service</li>';
                    }
                    ?>
                </ul>
            </td>
            <td><?php echo $final_price ?></td>
        </tr>
        </tbody>
    </table>
</section>

<script src="assets/js/bootstrap.bundle.js"></script>
</body>
</html>
