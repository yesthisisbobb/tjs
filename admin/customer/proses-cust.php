<?php
include '../../config.php';
$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_tipe where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_tipe.php?status=sukses');
  }
 else
 {
  header('Location: master_mtipe.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_tipe SET status='InActive' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_tipe.php?status=sukses');
  }
 else
 {
  header('Location: master_tipe.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_tipe SET status='Active' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_tipe.php?status=sukses');
  }
 else
 {
  header('Location: master_tipe.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{

			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$telpon = $_POST['telpon'];
			$email = $_POST['email'];
			$pic = $_POST['pic'];
			$status = $_POST['status'];

	    $sql = "INSERT INTO customerp (nama, alamat, telpon , email, pic, status)VALUES (
				'$nama', '$alamat', '$telpon','$email','$pic', '$status')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{

					header('Location: master_customer.php?status=sukses');
    	}
		else
		{
			header('Location: master_customer.php?status=gagal');
    	}

	}
else	if(isset( $_POST['daftar1']))
		{
			$kodegrup = $_POST['kodegrup'];
			$kode = $_POST['kode'];
			$nama = $_POST['nama'];
			$shading = $_POST['shading'];
			$faces = $_POST['faces'];
			$surface = $_POST['surface'];
			$color = $_POST['color'];
			$pattern = $_POST['pattern'];
			$status = $_POST['status'];
				$nom = $_POST['nom'];

				$sql = "UPDATE master_tipe SET kodegrup='$kodegrup', kode='$kode', nama='$nama', shading='$shading'
				,faces='$faces', surface='$surface', color='$color', pattern='$pattern' where id='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
						header('Location: master_tipe.php?&status=sukses');
	    	}
			else
			{
				header('Location: master_tipe.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
