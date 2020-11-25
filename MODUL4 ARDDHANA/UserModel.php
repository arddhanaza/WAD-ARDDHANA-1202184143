<?php
session_start();

class UserModel
{
    var $host = "localhost:3307";
    var $user = "root";
    var $pass = "";
    var $db = "wad_modul4";
    var $con;

    function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
    }

    function register($nama, $email, $no_hp, $password)
    {
        $insert = mysqli_query($this->con, "INSERT INTO user VALUES ('','$nama','$email','$no_hp','$password')");
        return $insert;
    }

    function login($email, $password, $remember_me)
    {
        $logged = mysqli_query($this->con, "SELECT * from user WHERE email = '$email' AND password = '$password'");
        if ($logged->num_rows >= 1) {
            $data_user = $logged->fetch_array();
            if ($remember_me) {
                setcookie('email', $email, time() + (60 * 60 * 24 * 5), '/WAD-ARDDHANA-1202184143/MODUL4%20ARDDHANA/');
                setcookie('password', $password, time() + (60 * 60 * 24 * 5), '/WAD-ARDDHANA-1202184143/MODUL4%20ARDDHANA/');
            }
            $_SESSION['nama'] = $data_user['nama'];
            $_SESSION['id'] = $data_user['id'];
            $_SESSION['logged_in'] = TRUE;
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getDataUser($id)
    {
        return mysqli_query($this->con, "SELECT * from user WHERE id = '$id'");
    }

    function save_edit($id, $nama, $email, $no_hp, $password, $navbar_color)
    {
        if ($password == "") {
            $update = mysqli_query($this->con, "UPDATE user set email = '$email', no_hp = '$no_hp'");
        } else {
            $update = mysqli_query($this->con, "UPDATE user set email = '$email', no_hp = '$no_hp',password = '$password'");
        }
        setcookie('theme', $navbar_color, '/WAD-ARDDHANA-1202184143/MODUL4%20ARDDHANA/');
        return $update;
    }


    function logOut()
    {
        session_destroy();
        header('Location: login.php');
        exit();
    }
}

?>