<?php
include '../../config.php';
session_start();

$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_color where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_color.php?status=sukses');
  }
 else
 {
  header('Location: master_color.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_color SET status='InActive' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_color.php?status=sukses');
  }
 else
 {
  header('Location: master_color.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_color SET status='Active' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_color.php?status=sukses');
  }
 else
 {
  header('Location: master_color.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{
		$kode = $_POST['kode'];
		$nama = $_POST['nama'];
		$status = $_POST['status'];
		$nama_user=$_SESSION["username"];
		$sql = "INSERT INTO master_color(kode, nama, nm_user, status)  VALUES ('$kode', '$nama', '$nama_user', '$status')";
		$query = mysqli_query($conn, $sql);
			if( $query )
		{
					header('Location: master_color.php?status=sukses');
			}
		else
		{
				header('Location: master_color.php?status=gagal');
			}



	}
else	if(isset( $_POST['daftar1']))
		{
	    	$kode = $_POST['kode'];
				$nama = $_POST['nama'];
				$nom = $_POST['nom'];

				$sql = "UPDATE master_color SET kode='$kode', nama='$nama' where id='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
						header('Location: master_color.php?&status=sukses');
	    	}
			else
			{
				header('Location: master_color.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
