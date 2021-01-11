<?php
include '../../config.php';
if(isset( $_POST['daftar1']))
		{

				$status=$_POST['status'];
				$sono=$_POST['sono'];
	$sql = "UPDATE masterpo SET status='$status' WHERE nopo='$sono'";
	$query = mysqli_query($conn, $sql);

	    	if( $query )
			{
	        	header("Location: po.php?status=sukses&nopo=$sono");
	    	}
			else
			{
				header('Location: po.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
