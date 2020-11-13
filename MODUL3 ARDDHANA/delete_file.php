<?php
require_once 'db_connection.php';
if (isset($_POST['btn_delete'])) {
    $id = $_POST['btn_delete'];
    $location = "assets/img/";
    $select = "SELECT gambar FROM event WHERE  id = '$id'";
    $res = $conn->query($select);
    if (mysqli_num_rows($res) <= 0) {
        header("Location: index.php");
    }
    $data = $res->fetch_assoc();

    $sql = "DELETE from event WHERE id='$id'";
    unlink('assets/img/' . $data['gambar']);
    $ress = $conn->query($sql);
    if (mysqli_affected_rows($conn) > 0) {
        echo 'deleted';
        header("Location index.php");
    } else {
        echo 'failed';
    }
}
?>