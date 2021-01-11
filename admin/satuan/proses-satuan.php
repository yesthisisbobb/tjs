<?php
include '../../config.php';
if(isset( $_POST['daftar']))
	{
		$nama = $_POST['nama'];
		$ket1 = $_POST['ket1'];
		$ket2 = $_POST['ket2'];
		$status = $_POST['status'];

		$sql = "INSERT INTO master_satuan(nama, ket1, ket2, status)  VALUES ('$nama', '$ket1', '$ket2', '$status')";
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
