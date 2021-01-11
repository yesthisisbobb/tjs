<?php
include '../../config.php';
if(isset( $_POST['daftar']))
	{

			$no = $_POST['nopol'];
			$kapasitas= $_POST['kapasitas'];
			$kubik = $_POST['kubik'];
			$berat = $_POST['berat'];
			$keterangan = $_POST['keterangan'];
			$status = $_POST['status'];

	    $sql = "INSERT INTO vtruk (nopol, kapasitas, kubik, berat, keterangan, status)
			 VALUES ('$no', '$kapasitas', '$kubik', '$berat', '$keterangan', '$status')";
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
