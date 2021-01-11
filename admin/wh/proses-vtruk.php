<?php
include '../../config.php';
$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_merk where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_merk.php?status=sukses');
  }
 else
 {
  header('Location: master_merk.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_merk SET status='InActive' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_merk.php?status=sukses');
  }
 else
 {
  header('Location: master_merk.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_merk SET status='Active' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_merk.php?status=sukses');
  }
 else
 {
  header('Location: master_merk.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{
    	$kode = $_POST['kode'];
			$jenis = $_POST['jenis'];
			$vol = $_POST['vol'];
			$sqm = $_POST['sqm'];
			$sopir = $_POST['sopir'];
			$status = $_POST['status'];

	    $sql = "INSERT INTO master_vtruk (nopol, jenis, berat, luas, sopir, status)VALUES ('$kode', '$jenis','$vol',
				'$sqm','$sopir', '$status')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{

					header('Location: master_vtruk.php?status=sukses');
    	}
		else
		{
			header('Location: master_vtruk.php?status=gagal');
    	}

	}
else	if(isset( $_POST['daftar1']))
		{
	    	$kode = $_POST['kode'];
				$nama = $_POST['nama'];
				$nom = $_POST['nom'];

				$sql = "UPDATE master_merk SET kode='$kode', nama='$nama' where no='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
						header('Location: master_merk.php?&status=sukses');
	    	}
			else
			{
				header('Location: master_merk.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
