<?php
include '../../config.php';
if(isset( $_POST['daftar']))
	{
    	$jenis = $_POST['jenis'];
			$no = $_POST['no'];
			$kapasitas= $_POST['kapasitas'];
			$kubik = $_POST['kubik'];
			$berat = $_POST['berat'];
			$vt = $_POST['vt'];
			$keterangan = $_POST['keterangan'];
			$status = $_POST['status'];

	    $sql = "INSERT INTO truk (jenis, nopol, kapasitas, kubik, berat, vt, keterangan, status)
			 VALUES ('$jenis', '$no', '$kapasitas', '$kubik', '$berat', '$vt', '$keterangan', '$status')";
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
