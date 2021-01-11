<?php
include '../../config.php';
if(isset( $_POST['daftar']))

	{
    	$kode = $_POST['kode'];
		$tipe= $_POST['tipe'];
		
	    $sql = "INSERT INTO master_tipe (Kode, Keterangan)  VALUES ('$kode', '$tipe')";
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