<?php
session_start();
include("db/config.php");
$username = $_SESSION['username'];
$kodestok = $_POST['kode'];
$query = $conn->query("DELETE FROM fav WHERE kode = '$kodestok'");
if($query){
    $hasil = "Berhasil";
}
else{
    $hasil = "Gagal";
}
echo $hasil;
?>