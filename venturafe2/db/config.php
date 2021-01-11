<?php

//set koneksi database
$host = "localhost"; //host
$user = "root"; //username host
$pass = ""; // password database
$db   = "smartmar_ventura2erp"; //nama database

$conn = mysqli_connect($host,$user,$pass,$db); //koneksi database


if( !$conn ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}


//set base_url
$base_url = "http://localhost/ventura2erp/venturafe/";
// $admin_url = "http://host-7:8888/admin";
?>