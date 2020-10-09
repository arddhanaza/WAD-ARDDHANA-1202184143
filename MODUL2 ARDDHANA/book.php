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
            <a class="nav-link" href="">Home </a>
        </li>
        <li class="nav-item active ">
            <a class="nav-link" href="">Booking</a>
        </li>
    </ul>
</nav>
<section class="container mt-5">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <form action="">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-inline form-control" name="nama" id="nama">
                </div>
                <div class="form-group">
                    <label for="check-in-date">Check In</label>
                    <input type="date" class="form-inline form-control" name="check-in-data" id="check-in-date">
                </div>
                <div class="form-group">
                    <label for="dur">Check In</label>
                    <input type="number" class="form-inline form-control" name="dur" id="dur">
                    <span>Day(s)</span>
                </div>
                <div class="form-group">
                    <label for="room-type">Check In</label>
                    <select name="room-type" id="room-type" class="form-inline form-control">
                        <option value="standard">
                            Standard
                        </option>
                        <option value="Superior" selected>
                            Superior
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="add-service">Add Service(s)</label>
                    <span>$20/ Service</span>
                    <div class="" id="add-service">
                        <input type="checkbox" name="roomservice" id="roomservice">
                        <label for="roomservice">Room Service</label>
                        <br>
                        <input type="checkbox" name="breakfast" id="breakfast">
                        <label for="breakfast">Breakfast</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phonenumber">Phone Number</label>
                    <input type="number" class="form-inline form-control" name="phonenumber" id="phonenumber">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">Book</button>
                </div>
            </form>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <img src="assets/img/img1.jpg" alt="" style="width: 500px">
        </div>
    </div>
</section>
<script src="assets/js/bootstrap.bundle.js"></script>
</body>
</html>
