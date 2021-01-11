<?php
/**
 * Namafile : koneksi.php 
 * Coder	: ismail puji saputra
 * ----------------------------*/
error_reporting(0);
$server		=	'localhost';
$database	=	'qr';
$nama		=	'root';
$pass	=	'';
$koneksi	=	mysql_connect($server,$nama,$pass) or die ("gagal terkoneksi ke server");
				mysql_select_db($database) or die ("gagal terkoneksi ke database");
?>