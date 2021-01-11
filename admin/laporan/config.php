<?php

//set koneksi database
$host = "localhost"; //host
$user = "root"; //username host
$pass = "09071978"; // password database
$db   = "Ventura2erp"; //nama database

$conn = mysqli_connect($host,$user,$pass,$db); //koneksi database


if( !$conn ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}


//set base_url
$base_url = "http://host-7:8888/";
$admin_url = "http://host-7:8888/admin";
