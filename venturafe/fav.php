<?php
session_start();
include("inc/config.php");
$kode=$_GET["kode"];
$aksi=$_GET["status"];
$user=$_SESSION["username"];

if ($aksi=="del")
{
	$sql = "DELETE FROM fav where kode='$kode' and user='$user'";
	$query = mysqli_query($conn, $sql);
	if( $query )
{
			header('Location: favlist.php?status=sukses');
	}
else
{
		header('Location: favlist.php?status=gagal');
	}

}
else if ($aksi=="del1")
{
	$sql = "DELETE FROM fav where kode='$kode' and user='$user'";
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
else {


		$sql = "INSERT INTO fav(user,kode)  VALUES ('$user','$kode')";
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


?>
