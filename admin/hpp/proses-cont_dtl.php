<?php
include '../../config.php';
$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_contdtl where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location:  master_cont_dtl.php?status=sukses');
  }
 else
 {
  header('Location:  master_cont_dtl.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_contdtl SET status='InActive' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location:  master_cont_dtl.php?status=sukses');
  }
 else
 {
  header('Location:  master_cont_dtl.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_contdtl SET status='Active' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location:  master_cont_dtl.php?status=sukses');
  }
 else
 {
  header('Location:  master_cont_dtl.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{
    	$kode = $_POST['kode'];
			$stc = $_POST['stc'];
			$svc = $_POST['svc'];

			$status = $_POST['status'];

	    $sql = "INSERT INTO master_contdtl (kode, stc, svc, status)VALUES ('$kode', '$stc', '$svc', '$status')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{

					header('Location: master_cont_dtl.php?status=sukses');
    	}
		else
		{
			header('Location: master_cont_dtl.php?status=gagal');
    	}

	}
else	if(isset( $_POST['daftar1']))
		{
			$kode = $_POST['kode'];
			$stc = $_POST['stc'];
			$svc = $_POST['svc'];
				$nom = $_POST['nom'];

				$sql = "UPDATE master_contdtl SET kode='$kode', stc='$stc', svc='$svc' where no='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
						header('Location: master_cont_dtl.php?&status=sukses');
	    	}
			else
			{
				header('Location: master_cont_dtl.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
