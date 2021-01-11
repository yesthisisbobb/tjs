<?php 
session_start();
include "config.php";
	$username = $_POST['username'];
	$password = $_POST['password']; 
	$login = mysqli_query($db,"select * from sales where email='$username' and password='$password'");
	$cek = mysqli_num_rows($login);
echo $cek;
	if($cek > 0){
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "login";
		header("location:sales/index.php");
		}
		else
		{
	header("location:index.php?pesan=gagal");	

}

?>