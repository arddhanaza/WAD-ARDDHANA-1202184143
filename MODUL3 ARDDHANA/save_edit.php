<?php
require_once 'db_connection.php';

if (isset($_POST['btn_submit'])) {
    $file_lama = $_POST['file_lama'];
    echo $file_lama;
    $id = $_POST['id'];
    $name = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $tanggal = $_POST['tanggal'];
    $mulai = $_POST['jam_mulai'];
    $berakhir = $_POST['jam_berakhir'];
    $tempat = $_POST['tempat'];
    $harga = $_POST['harga'];
    $ben = $_POST['benefits'];
    $benefit = json_encode($ben);
    if (!empty($_FILES['file_upload']['tmp_name'])) {
        $temp = $_FILES['file_upload']['tmp_name'];
        $gambar = rand(0, 9999) . $_FILES['file_upload']['name'];
        $size = $_FILES['file_upload']['size'];
        $type = $_FILES['file_upload']['type'];
        $folder = "assets/img/";
        $sql = "UPDATE event set name = '$name',deskripsi = '$deskripsi',gambar = '$gambar',kategori = '$kategori',tanggal='$tanggal' ,mulai = '$mulai',berakhir = '$berakhir',tempat = '$tempat',harga = '$harga',benefit ='$benefit' WHERE id='$id'";
        $res = $conn->query($sql);
        if ($res) {
            if ($size < 20480000 and ($type == 'image/jpeg' or $type == 'image/png' or $type == 'image/jpg')) {
                move_uploaded_file($temp, $folder . $gambar);
                unlink($folder . $file_lama);
            }
            header("Location: details_event.php?id=$id");
        } else {
            echo "gagal";
        }
    } else {
        $file_lama = $_POST['file_lama'];
        $sql = "UPDATE event set name = '$name',deskripsi = '$deskripsi',gambar = '$file_lama',kategori = '$kategori',tanggal='$tanggal' ,mulai = '$mulai',berakhir = '$berakhir',tempat = '$tempat',harga = '$harga',benefit ='$benefit' WHERE id='$id'";
        $res = $conn->query($sql);
        if ($res) {
            header("Location: details_event.php?id=$id");
        } else {
            echo "gagal";
        }
    }
} else {
    header("Location: index.php");
}