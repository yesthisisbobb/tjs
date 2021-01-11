<?php
include '../../config.php';
session_start();

$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_buy where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_buy.php?status=sukses');
  }
 else
 {
  header('Location: master_buy.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_buy SET status='InActive' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_buy.php?status=sukses');
  }
 else
 {
  header('Location: master_buy.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_buy SET status='Active' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_buy.php?status=sukses');
  }
 else
 {
  header('Location: master_buy.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{
		$kode = $_POST['kode'];
		$buying_cur = $_POST['buying_cur'];
		$bp = $_POST['bp'];
		$status = $_POST['status'];
		$nama_user=$_SESSION["username"];
		$tgl= date('Y-m-d H:i:s');
		$sql = "INSERT INTO master_buy(tgl,kode, cur, price, nm_user, status)  VALUES ('$tgl','$kode', '$buying_cur','$bp', '$nama_user', '$status')";
		$query = mysqli_query($conn, $sql);
			if( $query )
		{
					header('Location: master_buy.php?status=sukses');
			}
		else
		{
				header('Location: master_buy.php?status=gagal');
			}

echo $kode;

	}
else	if(isset( $_POST['daftar1']))
		{
			$kode = $_POST['kode'];
			$buying_cur = $_POST['buying_cur'];
			$bp = $_POST['bp'];
			$status = $_POST['status'];
			$nama_user=$_SESSION["username"];
				$nom = $_POST['nom'];

				$sql = "UPDATE master_buy SET kode='$kode', cur='$buying_cur', price='$bp',nm_user='$nama_user', status='$status' where id='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
						header('Location: master_buy.php?&status=sukses');
	    	}
			else
			{
				header('Location: master_buy.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
