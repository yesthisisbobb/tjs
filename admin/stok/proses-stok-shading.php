<?php
include '../../config.php';

$aksi=$_GET['aksi'];
$nomer=$_GET['no'];
if ($aksi=="delete")
{

	$sql = "DELETE FROM master_shading where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_shading_stok.php?status=sukses');
  }
 else
 {
  header('Location: master_shading_stok.php?status=gagal');
  }

}
else
if(isset( $_POST['daftar']))
	{

		$kode_stok= $_POST['kode'];
		$tempcode=$_POST['tempcode'];
		$kd_shading = $_POST['kode_shading'];
		$gdg=$_POST['gdg'];
		$jum=$_POST['jum'];
		$status = $_POST['status'];

	  $sql = "INSERT INTO master_shading(tempcode, kode_stok, kd_shading, gudang, jum, status)
		VALUES ('$tempcode', '$kode_stok', '$kd_shading', '$gdg', '$jum', '$status')";

			$query = mysqli_query($conn, $sql);
    	if( $query )
		{
        	header('Location: master_stok.php?status=sukses');

			}
		else
		{
		   header('Location: master_stok.php?status=gagal');

  	}

}
else	if(isset( $_POST['daftar1']))
		{

			$kode_stok= $_POST['kode'];
			$tempcode=$_POST['tempcode'];
			$kd_shading = $_POST['kode_shading'];
			$jum=$_POST['jum'];
			$status = $_POST['status'];
				$nom = $_POST['nom'];

				$sql = "UPDATE master_shading SET tempcode='$tempcode', kode_stok='$kode_stok', kd_shading='$kd_shading'
				,jum='$jum', status='$status' where no='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
						header('Location: master_stok.php?&status=sukses');
	    	}
			else
			{
				header('Location: master_stok.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
