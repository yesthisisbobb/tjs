<?php
include '../../config.php';
if(isset( $_POST['daftar']))
	{

		$nama = $_POST['nama'];
		$ket1 = $_POST['ket'];
		$status = $_POST['status'];

		$sql = "INSERT INTO katgdg(nama, keterangan, status)  VALUES ('$nama', '$ket1',  '$status')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{
        	header('Location: ../../index.php?status=sukses');
    	}
		else
		{
        header('Location: ../../index.php?status=gagal');
    	}

	}
	else
	{
    die("Access Denied...");
	}

?>
