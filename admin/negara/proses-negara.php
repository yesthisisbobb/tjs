<?php
include '../../config.php';
if(isset( $_POST['daftar']))
	{
    $kode = $_POST['kode'];
		$nama = $_POST['nama'];

		$status = $_POST['status'];

		$sql = "INSERT INTO master_negara (Kode, nama, status)  VALUES ('$kode', '$nama', '$status')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{
        	header('Location: ../index.php?status=sukses');
    	}
		else
		{
        header('Location: ../index.php?status=gagal');
    	}

	}
	else
	{
    die("Access Denied...");
	}

?>
