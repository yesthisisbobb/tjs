<?php
include '../../config.php';
session_start();


if(isset( $_POST['daftar3']))
	{
		$role = $_POST['role1'];
		$status = $_POST['status'];
		$nama_user=$_SESSION["username"];

		$sql = "INSERT INTO master_role(kode, nm_user, status)  VALUES ('$role', '$nama_user', '$status')";
		$query = mysqli_query($conn, $sql);
			if( $query )
		{
					header('Location: master_agent.php?status=sukses');
			}
		else
		{
				header('Location: master_agent.php?status=gagal');
			}

	}
	else
	{
    die("Access Denied...");
	}

?>
