<?php
include '../../config.php';
if(isset( $_POST['daftar']))
	{
    	$cabang = $_POST['cabang'];
			$nama = $_POST['nama'];
			$alamat= $_POST['alamat'];
			$kota = $_POST['kota'];
			$jenis = $_POST['jenis'];
			$keterangan = $_POST['keterangan'];
			$status = $_POST['status'];

	    $sql = "INSERT INTO gudang (nm_cabang, nm_gudang, alamat, kota, jenis, keterangan, status)
			 VALUES ('$cabang', '$nama', '$alamat', '$kota', '$jenis', '$keterangan', '$status')";
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
