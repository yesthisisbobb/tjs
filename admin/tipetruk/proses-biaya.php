<?php
include '../../config.php';
if(isset( $_POST['daftar']))
	{

		$tipe = $_POST['tipe'];
		$wilayah = $_POST['wilayah'];
		$kota = $_POST['kota'];
		$biaya = $_POST['biaya'];
		$ket1 = $_POST['ket1'];
		$status = $_POST['status'];

		$sql = "INSERT INTO master_biaya_tr (jenis, wilayah, kota, biaya, keterangan, status)  VALUES ('$tipe', '$wilayah', '$kota', '$biaya', '$ket1', '$status')";
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
