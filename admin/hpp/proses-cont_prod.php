<?php
include '../../config.php';
$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_cont_prod where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location:  master_cont_prod.php?status=sukses');
  }
 else
 {
  header('Location:  master_cont_prod.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_cont_prod SET status='InActive' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location:  master_cont_prod.php?status=sukses');
  }
 else
 {
  header('Location:  master_cont_prod.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_cont_prod SET status='Active' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_cont_prod.php?status=sukses');
  }
 else
 {
  header('Location:  master_cont_prod?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{
    	$kode = $_POST['kode'];
			$kodeprd = $_POST['kodeprd'];
			$ll = $_POST['ll'];
			$unit = $_POST['unit'];

			$status = $_POST['status'];

	    $sql = "INSERT INTO master_cont_prod (kodeprd,kode,ll,unit, status)VALUES ('$kodeprd','$kode', '$ll', '$unit', '$status')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{

					header('Location: master_cont_prod.php?status=sukses');
    	}
		else
		{
			header('Location: master_cont_prod.php?status=gagal');
    	}

	}
else	if(isset( $_POST['daftar1']))
		{
			$kode = $_POST['kode'];
			$kodeprd = $_POST['kodeprd'];
			$ll = $_POST['ll'];
			$unit = $_POST['unit'];
				$nom = $_POST['nom'];

				$sql = "UPDATE master_cont_prod SET kodeprd='$kodeprd', kode='$kode', ll='$ll', unit='$unit' where no='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
						header('Location: master_cont_prod.php?&status=sukses');
	    	}
			else
			{
				header('Location: master_cont_prod.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
