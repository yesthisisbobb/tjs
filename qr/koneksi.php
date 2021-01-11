<?php
error_reporting(0);
$server		='localhost';
$database	='qr';
$username	='root';
$password	='';
$koneksi	=mysql_connect($server,$username,$password) or die ("gagal terkoneksi ke server");
mysql_select_db($database) or die ("gagal terkoneksi ke database");
?>