<?php
include '../../config.php';
if(isset( $_POST['daftar']))
	{
		$status = $_POST['status'];
		$ket1 = $_POST['ket1'];
		$ket2 = $_POST['ket2'];


		$sql = "INSERT INTO master_status(status, ket1, ket2)  VALUES ( '$status', '$ket1', '$ket2')";
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
