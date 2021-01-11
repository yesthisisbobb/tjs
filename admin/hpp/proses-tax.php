<?php
include '../../config.php';
$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_tax where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_tax.php?status=sukses');
  }
 else
 {
  header('Location: master_tax.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_tax SET status='InActive' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_tax.php?status=sukses');
  }
 else
 {
  header('Location: master_tax.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_tax SET status='Active' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_tax.php?status=sukses');
  }
 else
 {
  header('Location: master_tax.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{
    	$hscode = $_POST['hscode'];
			$pph = $_POST['pph'];
			$bm = $_POST['bm'];
			$ppn = $_POST['ppn'];

			$status = $_POST['status'];

	    $sql = "INSERT INTO master_tax(kode, pph,bm,ppn, status)VALUES ('$hscode', '$pph','$bm','$ppn', '$status')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{

					header('Location: master_tax.php?status=sukses');
    	}
		else
		{
			header('Location: master_tax.php?status=gagal');
    	}

	}
else	if(isset( $_POST['daftar1']))
		{
			$hscode = $_POST['hscode'];
			$pph = $_POST['pph'];
			$bm = $_POST['bm'];
			$ppn = $_POST['ppn'];
				$nom = $_POST['nom'];

				$sql = "UPDATE master_tax SET kode='$hscode', pph='$pph', bm='$bm', ppn='$ppn' where no='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
						header('Location: master_tax.php?&status=sukses');
	    	}
			else
			{
				header('Location: master_tax.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
