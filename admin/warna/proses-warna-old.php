<?php
include '../../config.php';
if(isset( $_POST['daftar']))

	{
		$warna= $_POST['warna'];
		
	    $sql = "INSERT INTO master_warna (Keterangan)  VALUES ('$warna')";
		$query = mysqli_query($db, $sql);
    	if( $query ) 
		{ 
        	header('Location: ../../index.php?status=sukses');
    	} 
		else 
		{
        header('Location: ../../index.php?status=gagal');
    	}

	} 
	else 
	{
    die("Access Denied...");
	}

?>