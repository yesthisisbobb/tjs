<?php
include "../config.php";
if(isset( $_POST['daftar']))

	{
		$nm_grup = $_POST['nm_grup'];
		$alamat = $_POST['alamat'];
		$kota = $_POST['kota'];
		$telp = $_POST['telp'];
		$email = $_POST['email'];
		$pic = $_POST['pic'];
	    	$sql =  "INSERT INTO master_toko (nm_grup, alamat, kota, telp, email, pic, tgl_masuk ) VALUES ( '$nm_grup', '$alamat', '$kota', '$telp', '$email', '$pic', NOW()) ";
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
