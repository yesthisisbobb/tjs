<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include("inc/config.php");

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai

$sql2 = "SELECT * FROM login  where email='$username' and password='$password'";
     $query2 = mysqli_query($conn, $sql2);

// menghitung jumlah data yang ditemukan

$cek = mysqli_num_rows($query2);

if($cek > 0){
	$_SESSION['username'] = $username;

	header("location:index-shop.php");
}else{
	header("location:index-shop.php?pesan=gagal");
}
?>
