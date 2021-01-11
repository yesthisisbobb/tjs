<?php
session_start();
include("inc/config.php");
if(isset( $_POST['daftar']))
	{
		$nama = $_POST['username'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sales = $_POST['sales'];

		$sql = "INSERT INTO login(username, nama, email, level, role, password,sales,gam)  VALUES ('$username','$nama','$email','admin', 'perwira','$password', '$sales','noimage.png')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{
        	header('Location: login-register.php?status=sukses');
    	}
		else
		{
        header('Location: login-register.php?status=gagal');
    	}

	}
	else
	{
    die("Access Denied...");
	}

?>
