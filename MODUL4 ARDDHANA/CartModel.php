<?php

class CartModel
{
    var $host = "localhost:3306";
    var $user = "root";
    var $pass = "";
    var $db = "wad_modul4";
    var $con;

    function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
    }

    function saveItem($user_id, $nama_barang, $harga)
    {
        $insert = mysqli_query($this->con, "INSERT INTO cart VALUES ('','$user_id','$nama_barang','$harga')");
        return $insert;
    }

    function getItem($user_id)
    {
        return mysqli_query($this->con, "SELECT * from cart");
    }

    function getTotal($user_id)
    {
        $total = mysqli_query($this->con, "SELECT SUM(harga) as total from cart WHERE user_id = $user_id");
        $data = $total->fetch_array();
        return $data['total'];
    }

    function deleteItem($id)
    {
        $delete = mysqli_query($this->con, "DELETE from cart WHERE id = '$id'");
        if ($delete) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

?>