<?php
include '../../config.php';
$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_port where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_port.php?status=sukses');
  }
 else
 {
  header('Location: master_port.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_port SET status='InActive' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_port.php?status=sukses');
  }
 else
 {
  header('Location: master_port.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_port SET status='Active' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_port.php?status=sukses');
  }
 else
 {
  header('Location: master_port.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{
    	$kode = $_POST['kode'];
			$nama = $_POST['nama'];
			$status = $_POST['status'];

	    $sql = "INSERT INTO master_port (kode, nama, status)VALUES ('$kode', '$nama', '$status')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{

					header('Location: master_port.php?status=sukses');
    	}
		else
		{
			header('Location: master_port.php?status=gagal');
    	}

	}
else	if(isset( $_POST['daftar1']))
		{
	    	$kode = $_POST['kode'];
				$nama = $_POST['nama'];
				$nom = $_POST['nom'];

				$sql = "UPDATE master_port SET kode='$kode', nama='$nama' where no='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
						header('Location: master_port.php?&status=sukses');
	    	}
			else
			{
				header('Location: master_port.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
