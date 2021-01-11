<?php
include '../../config.php';
$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_freight where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location:  master_freight.php?status=sukses');
  }
 else
 {
  header('Location:  master_freight.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_freight SET status='InActive' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location:  master_freight.php?status=sukses');
  }
 else
 {
  header('Location:  master_freight.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_freight SET status='Active' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_freight.php?status=sukses');
  }
 else
 {
  header('Location:  master_freight.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{
// $is = $_POST['is'];
    	$pod = $_POST['pod'];
			$tujuan = $_POST['tujuan'];
			$conttype = $_POST['conttype'];
			$shiptype=$_POST['shiptype'];
			$biaya = $_POST['biaya'];
			$status = $_POST['status'];


	    $sql = "INSERT INTO master_freight (pod,tujuan,conttype,shiptype,biaya,status)VALUES ('$pod','$tujuan', '$conttype', '$shiptype','$biaya', '$status')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{

					header('Location: master_freight.php?status=sukses');
    	}
		else
		{
			header('Location: master_freight.php?status=gagal');
    	}

	}
else	if(isset( $_POST['daftar1']))
		{
			// $is = $_POST['is'];
			$pod = $_POST['pod'];
			$tujuan = $_POST['tujuan'];
			$conttype = $_POST['conttype'];
			$biaya = $_POST['biaya'];
			$shiptype=$_POST['shiptype'];
			$status = $_POST['status'];
				$nom = $_POST['nom'];

				$sql = "UPDATE master_freight SET pod='$pod', tujuan='$tujuan', conttype='$conttype', shiptype='$shiptype', biaya='$biaya' where no='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
						header('Location: master_freight.php?&status=sukses');
	    	}
			else
			{
				header('Location: master_freight.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
