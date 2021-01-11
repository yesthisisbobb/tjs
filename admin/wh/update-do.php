<?php
include '../../config.php';
if(isset( $_POST['daftar']))
	{
			$dono=$_POST['dono1'];
			$tgl=$_POST['tgl'];
			$status=$_POST['status'];

$sql = "UPDATE do SET tgl='$tgl', status='$status' WHERE nodo='$dono'";
$query = mysqli_query($conn, $sql);

    	if( $query )
		{
        	header('Location: do_in.php?status=sukses');
    	}
		else
		{
			header('Location: do_in.php?status=gagal');
    	}

	}
	else
	{
    die("Access Denied...");
	}

?>
