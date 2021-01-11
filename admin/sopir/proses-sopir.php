<?php
include '../../config.php';
if(isset( $_POST['daftar']))
	{

		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$hp = $_POST['hp'];
		$role = $_POST['role'];
		$notruk = $_POST['notruk'];

		$ket = $_POST['ket'];
		$status = $_POST['status'];

		$sql = "INSERT INTO sopir (nama, alamat, no_telp, role, nopol, keterangan, status)  VALUES ('$nama', '$alamat', '$hp', '$role', '$notruk', '$ket', '$status')";
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
