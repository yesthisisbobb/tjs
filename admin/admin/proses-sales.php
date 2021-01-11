<?php
include '../../config.php';
if(isset( $_POST['daftar']))
	{

		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$hp = $_POST['hp'];
		$email = $_POST['email'];
		$ket = $_POST['ket'];
		$status = $_POST['status'];

		$sql = "INSERT INTO sales (nama, alamat, no_telp, email, keterangan, status)  VALUES ('$nama', '$alamat', '$hp', '$email', '$ket', '$status')";
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
