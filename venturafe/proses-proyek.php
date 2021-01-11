<?php
session_start();
include("inc/config.php");
if(isset( $_POST['daftar']))
	{

		$nama=$_SESSION["username"];
		$kode= $_POST['kode'];
		$namap = $_POST['namap'];


		$sql = "INSERT INTO proyek(nama, kode, namap, status)  VALUES ('$nama','$kode','$namap','ACTIVE')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{
        	header('Location: projectlist.php?status=sukses');
    	}
		else
		{
        header('Location: projectlist.php?status=gagal');
    	}

	}
	else
	{
    die("Access Denied...");
	}

?>
