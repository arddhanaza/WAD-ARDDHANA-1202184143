<?php
require_once "db_connection.php";
if (!isset($_GET['id'])) {
    header("Location: index.php");
}
$id = $_GET['id'];
$sql = "SELECT * from event WHERE id = $id";
$ress = $conn->query($sql);
if (mysqli_num_rows($ress) <= 0) {
    header("Location: index.php");
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
    <style>
        .fa {
            color: ;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand navbar-dark navbar-ead-event">
    <a class="navbar-brand" href="index.php"><img alt="" id="logo-nav">EAD EVENTS</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link btn btn-outline-light" href="create_event.php">Buat Event</a>
        </li>
    </ul>
</nav>
<div class="container pt-3">
    <div class="row justify-content-center">
        <h3>Details Event!</h3>
    </div>

    <div class="row"></div>
    <div class="col-12">
        <div class="card mb-5 border-0 shadow">
            <?php
            while ($item = $ress->fetch_assoc()) {
            echo '
                    <div class="card-img-top" style="overflow: hidden;height: 400px">
                        <img src="assets/img/' . $item["gambar"] . '" alt="" style="object-position: center;object-fit: fill;max-width: 100%">
                    </div>
                    <div class="card-body">
                        <div class="row col-12">
                            <h3>' . $item["name"] . '</h3>
                        </div>
                        <div class="row col-12">
                            <label for="deskripsi"><b>Deskripsi</b></label>
                            <p id="deskripsi">' . $item["deskripsi"] . '</p>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label><b>Informasi Event</b></label>
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
                                    <div class="col-1">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <div class="col-10">
                                        ' . $item["mulai"] . ' - ' . $item["berakhir"] . '
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <label><b>Benefits</b></label>
                                <div class="row col-12">
                                    <ul>
                                ';
            if (($item["benefit"]) != "null") {
                foreach (json_decode($item["benefit"]) as $ben) {
                    echo '
                                                <li>' . $ben . '</li>
                                            ';
                }
            } else {
                echo '
                                            <li>Tidak ada benefit</li>
                                        ';
            }
            echo '
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row col-12">
                            <span><b>Kategori: </b> ' . $item["kategori"] . '</span>
                        </div>
                        <div class="row col-12">
                            <span><b>HTM Rp ' . $item["harga"] . '</b></span>
                        </div>
                    </div>
                    <div class="card-footer text-center" style="border: none">
                        <button class="btn btn-primary w-25" data-toggle="modal" data-target="#modal_edit">Edit</button>
                        <button class="btn btn-danger w-25" data-toggle="modal" data-target="#modal_delete">Delete</button>
                    </div>          
                    
        </div>
';
            ?>
        </div>
    </div>


    <div class="modal fade" id="modal_delete" tabindex="-2" role="dialog" aria-labelledby="modal_delete"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    <?php
                    echo '
                    <form action="delete_file.php" method="post">
                        <button class="btn btn-danger ml-2" data-toogle="modal" data-target="modal_delete" type="submit" name="btn_delete" value="' . $item["id"] . '">Yes</button>
                    </form>
                ';
                    ?>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modal_edit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form action="save_edit.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <?php
                        echo '
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="card h-100">
                                            <div class="card-header bg-danger">
                                            </div>
                                            <div class="card-body">
                                            <input type="hidden" name="id" value="' . $item["id"] . '">
                                                <div class="form-group">
                                                    <label for="nama">Name</label>
                                                    <input type="text" class="form-control" name="nama" required id="nama" value="' . $item["name"] . '">
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi">Deskripsi</label>
                                                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4">' . $item["deskripsi"] . '</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="file_upload">Upload Gambar</label>
                                                   <div class="custom-file" id="file_upload">
                                                      <input type="file" class="custom-file-input" name="file_upload" id="customFile">
                                                      <label class="custom-file-label" for="customFile">' . $item["gambar"] . '</label>
                                                    </div>
                                                   <input type="hidden"  name="file_lama" value="' . $item["gambar"] . '">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kategori">Kategori</label>
                                                    <div class="form-inline" id="kategori">
                                                        <input type="radio" class="form-control" name="kategori" required
                                                               id="kategori_online" value="Online" ';
                        echo $item["kategori"] == "Online" ? "checked" : "";
                        echo '>
                                                        <label for="kategori_online">Online</label>
                                                        <input type="radio" class="form-control ml-3" name="kategori" required
                                                               id="kategori_offline" value="Offline" ';
                        echo $item["kategori"] == "Offline" ? "checked" : "";
                        echo '>
                                                        <label for="kategori_online">Offline</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="card h-100 ">
                                            <div class="card-header bg-primary">
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal</label>
                                                    <input type="date" class="form-control" name="tanggal" required id="tanggal" value="' . $item["tanggal"] . '">
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="jam_mulai">Jam Mulai</label>
                                                            <select name="jam_mulai" id="jam_mulai" class="form-control">
                                                            <option value="' . $item["mulai"] . '" selected>' . $item["mulai"] . '</option>
                                                                ';
                        $time = 6;
                        $time_value = 6;
                        for ($i = 0; $i < 15; $i++) {
                            echo '
                                                                                        <option value="' . $time_value . ':00:00">' . $time . ':00:00</option>
                                                                                        ';
                            $time_value++;
                            $time++;
                        }
                        echo '
                                                            </select>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="jam_berakhir">Jam Berakhir</label>
                                                            <select name="jam_berakhir" id="jam_berakhir" class="form-control">
                                                            <option value="' . $item["berakhir"] . '" selected>' . $item["berakhir"] . '</option>
                                                                ';
                        $time = 6;
                        $time_value = 6;
                        for ($i = 0; $i < 15; $i++) {
                            echo '
                                                                                        <option value="' . $time_value . ':00:00">' . $time . ':00:00</option>
                                                                                        ';
                            $time_value++;
                            $time++;
                        }
                        echo '
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tempat">Tempat</label>
                                                    <input type="text" class="form-control" name="tempat" required id="tempat" value="' . $item["tempat"] . '">
                                                </div>
                                                <div class="form-group">
                                                    <label for="harga">Harga</label>
                                                    <input type="number" class="form-control" name="harga" id="tempat" required value="' . $item["harga"] . '">
                                                </div>
                                                <div class="form-group">
                                                    <label for="benefit">Benefits</label>
                                                    <div class="form-inline" id="benefit">
                                                        <input type="checkbox" class="form-control" name="benefits[]" 
                                                               id="benefit_snack" value="Snacks" ';
                        if (strpos($item['benefit'], 'Snacks')) echo 'checked = checked';
                        echo '>
                                                        <label for="benefit_snack">Snack</label>
                                                        <input type="checkbox" class="form-control ml-3" name="benefits[]" 
                                                               id="benefit_sertifikat" value="Sertifikat" ';
                        if (strpos($item['benefit'], 'Sertifikat')) echo 'checked = checked';
                        echo '>
                                                        <label for="benefit_sertifikat">Sertifikat</label>
                                                        <input type="checkbox" class="form-control ml-3" name="benefits[]" 
                                                               id="benefit_souvenir" value="Souvenir" ';
                        if (strpos($item['benefit'], 'Souvenir')) echo 'checked = checked';
                        echo '>
                                                        <label for="benefit_souvenir">Souvenir</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                            ';
                        }
                        ?>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="btn_submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
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
<script !src="">
    $(document).on('change', '.custom-file-input', function (event) {
        $(this).next('.custom-file-label').html(event.target.files[0].name);
    });
</script>
</body>
</html>