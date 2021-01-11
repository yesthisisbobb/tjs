<?php
include("inc/config.php");
if(isset( $_POST['daftar']))
	{
			$nodo=$_POST['nodo1'];
echo $nodo;

$sql = "UPDATE do SET status1='RECEIVED' WHERE nodo='$nodo'";
$query = mysqli_query($conn, $sql);

    	if( $query )
		{
        	header('Location: index.php?status=sukses');
    	}
		else
		{
			header('Location: index.php?status=gagal');
    	}

	}
	else
	{
    die("Access Denied...");
	}

?>
