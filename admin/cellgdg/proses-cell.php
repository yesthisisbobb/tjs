<?php
include '../../config.php';
if(isset( $_POST['daftar']))
	{
    	$gudang = $_POST['gudang'];
			$no = $_POST['no'];
			$kapasitas= $_POST['kapasitas'];
			$keterangan = $_POST['keterangan'];
			$status = $_POST['status'];

	    $sql = "INSERT INTO selgudang (nm_gudang, no, kapasitas, keterangan, status)
			 VALUES ('$gudang', '$no', '$kapasitas', '$keterangan', '$status')";
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
