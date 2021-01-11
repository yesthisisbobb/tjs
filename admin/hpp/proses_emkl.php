<?php
include '../../config.php';
$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_emkl where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location:  master_emkl.php?status=sukses');
  }
 else
 {
  header('Location:  master_emkl.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_emkl SET status='InActive' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location:  master_emkl.php?status=sukses');
  }
 else
 {
  header('Location:  master_emkl.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_emkl SET status='Active' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_emkl.php?status=sukses');
  }
 else
 {
  header('Location:  master_emkl.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{
$is = $_POST['is'];
    	$pod = $_POST['pod'];
			$koded=$_POST['koded'];
			$tujuan = $_POST['tujuan'];
			$conttype = $_POST['conttype'];
			$biaya = $_POST['biaya'];
			$status = $_POST['status'];


	    $sql = "INSERT INTO master_emkl (import_system,pod,tujuan,conttype,biaya,koded,status)VALUES ('$is','$pod','$tujuan', '$conttype', '$biaya','$koded', '$status')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{

					header('Location: master_emkl.php?status=sukses');
    	}
		else
		{
			header('Location: master_emkl.php?status=gagal');
    	}

	}
else	if(isset( $_POST['daftar1']))
		{
			$is = $_POST['is'];
			$koded=$_POST['koded'];
			$pod = $_POST['pod'];
			$tujuan = $_POST['tujuan'];
			$conttype = $_POST['conttype'];
			$biaya = $_POST['biaya'];
			$status = $_POST['status'];
				$nom = $_POST['nom'];

				$sql = "UPDATE master_emkl SET import_system='$is', pod='$pod', tujuan='$tujuan', conttype='$conttype', biaya='$biaya', koded='$koded' where no='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
						header('Location: master_emkl.php?&status=sukses');
	    	}
			else
			{
				header('Location: master_emkl.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
