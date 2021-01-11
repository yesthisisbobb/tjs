<?php
include '../../config.php';
if(isset( $_POST['daftar']))
	{
    $uang = $_POST['uang'];
		$ket1 = $_POST['ket1'];
		$status = $_POST['status'];

		$sql = "INSERT INTO master_uang(nama, ket1, status)  VALUES ('$uang', '$ket1', '$status')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{
        	header('Location:../../index.php?status=sukses');
    	}
		else
		{
        header('Location:../index.php?status=gagal');
    	}

	}
	else
	{
    die("Access Denied...");
	}

?>
