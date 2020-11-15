<?php
require_once "db_connection.php";
if (isset($_POST['submit'])) {
    $name = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    $temp = $_FILES['file_upload']['tmp_name'];
    $gambar = rand(0, 9999) . $_FILES['file_upload']['name'];
    $size = $_FILES['file_upload']['size'];
    $type = $_FILES['file_upload']['type'];
    $folder = "assets/img/";

    $kategori = $_POST['kategori'];
    $tanggal = $_POST['tanggal'];
    $mulai = $_POST['jam_mulai'];
    $berakhir = $_POST['jam_berakhir'];
    $tempat = $_POST['tempat'];
    $harga = $_POST['harga'];
    $ben = $_POST['benefits'];
    $benefit = json_encode($ben);
    $sql = "INSERT INTO event (name,deskripsi,gambar,kategori,tanggal,mulai,berakhir,tempat,harga,benefit) VALUES ('$name','$deskripsi','$gambar','$kategori','$tanggal','$mulai','$berakhir','$tempat',$harga,'$benefit')";
    $res = $conn->query($sql);
    if ($res) {
        if ($size < 20480000 and ($type == 'image/jpeg' or $type == 'image/png' or $type == 'image/jpg')) {
            move_uploaded_file($temp, $folder . $gambar);
        }
        header("Location: index.php");
    } else {
        echo "gagal";
    }

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
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link btn btn-outline-light" href="create_event.php">Buat Event</a>
        </li>
    </ul>
</nav>
<div class="container-fluid pt-3 p-5">
    <div class="col-12 mb-5">
        <h3>Buat Events!</h3>
    </div>
    <form action="create_event.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card h-100">
                    <div class="card-header bg-danger">
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Name</label>
                            <input type="text" class="form-control" name="nama" required id="nama">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="file_upload">Upload Gambar</label>
                            <div class="custom-file" id="file_upload">
                                <input type="file" class="custom-file-input" name="file_upload" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose File</label>
                            </div>
                        </div>

                        <label for="kategori">Kategori</label>
                        <div class="form-group form-check" id="kategori">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="kategori" required
                                       id="kategori_online"
                                       value="Online">
                                <label for="kategori_online" class="form-check-label">Online</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input ml-3" name="kategori" required
                                       id="kategori_offline" value="Offline">
                                <label for="kategori_offline" class="form-check-label">Offline</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card h-100">
                    <div class="card-header bg-primary">
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" required id="tanggal">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="jam_mulai">Jam Mulai</label>
                                    <select name="jam_mulai" id="jam_mulai" class="form-control">
                                        <?php
                                        $time = 6;
                                        $time_value = 6;
                                        for ($i = 0; $i < 15; $i++) {
                                            echo '
                                            <option value="' . $time_value . ':00:00">' . $time . ':00:00</option>
                                            ';
                                            $time_value++;
                                            $time++;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="jam_berakhir">Jam Berakhir</label>
                                    <select name="jam_berakhir" id="jam_berakhir" class="form-control">
                                        <?php
                                        $time = 6;
                                        $time_value = 6;
                                        for ($i = 0; $i < 15; $i++) {
                                            echo '
                                            <option value="' . $time_value . ':00:00">' . $time . ':00:00</option>
                                            ';
                                            $time_value++;
                                            $time++;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tempat">Tempat</label>
                            <input type="text" class="form-control" name="tempat" required id="tempat">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" name="harga" id="tempat" required>
                        </div>
                        <div class="form-group">
                            <label for="benefit">Benefits</label>
                            <div class="form-inline" id="benefit">
                                <input type="checkbox" class="form-control" name="benefits[]"
                                       id="benefit_snack" value="Snacks">
                                <label for="benefit_snack">Snack</label>
                                <input type="checkbox" class="form-control ml-3" name="benefits[]"
                                       id="benefit_sertifikat" value="Sertifikat">
                                <label for="benefit_sertifikat">Sertifikat</label>
                                <input type="checkbox" class="form-control ml-3" name="benefits[]"
                                       id="benefit_souvenir" value="Souvenir">
                                <label for="benefit_souvenir">Souvenir</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right" style="border: none">

                        <button type="submit" name="submit" class="btn btn-primary mr-1">Submit</button>
                        <button class="btn btn-danger ml-1">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
<script !src="">
    $(document).on('change', '.custom-file-input', function (event) {
        $(this).next('.custom-file-label').html(event.target.files[0].name);
    });
</script>
</body>
</html>