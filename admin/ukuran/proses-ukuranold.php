<?php
include '../../config.php';
if(isset( $_POST['daftar']))

	{
		$ukuran= $_POST['ukuran'];
		
	    $sql = "INSERT INTO master_ukuran (Keterangan)  VALUES ('$ukuran')";
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