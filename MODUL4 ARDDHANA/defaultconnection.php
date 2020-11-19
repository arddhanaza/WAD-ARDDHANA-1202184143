<?php
$host = "localhost:3307";
$user = "root";
$pass = "";
$db = "wad_modul4";
$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection Failed " . mysqli_connect_error());
}
?>