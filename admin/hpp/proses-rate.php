<?php
include '../../config.php';
$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_rate where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_rate.php?status=sukses');
  }
 else
 {
  header('Location: master_rate.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_rate SET status='InActive' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_rate.php?status=sukses');
  }
 else
 {
  header('Location: master_rate.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_rate SET status='Active' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_rate.php?status=sukses');
  }
 else
 {
  header('Location: master_rate.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{
    	$kode = $_POST['kode'];
			$nama = $_POST['nama'];
			$nama1 = $_POST['nama1'];
			$bd=$_POST['bd'];

			$status = $_POST['status'];

	    $sql = "INSERT INTO master_rate (bd, kode, nama, nama1, status)VALUES ('$bd','$kode', '$nama','$nama1', '$status')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{

					header('Location: master_rate.php?status=sukses');
    	}
		else
		{
			header('Location: master_rate.php?status=gagal');
    	}

	}
else	if(isset( $_POST['daftar1']))
		{
			$kode = $_POST['kode'];
			$nama = $_POST['nama'];
			$nama1 = $_POST['nama1'];
			$bd=$_POST['bd'];

				$nom = $_POST['nom'];

				$sql = "UPDATE master_rate SET bd='$bd', kode='$kode', nama='$nama', nama1=$nama1 where no='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
						header('Location: master_rate.php?&status=sukses');
	    	}
			else
			{
				header('Location: master_rate.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
