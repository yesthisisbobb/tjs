<?php
include '../../config.php';
$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_supplier where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
		<script>
		alert("You have successfully delete data");
		window.location.href = "master_supplier.php";
	</script>
<?php
  }
 else
 {
  header('Location: master_supplier.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_supplier SET status='InActive' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
		<script>
		alert("You have successfully disable data");
		window.location.href = "master_supplier.php";
	</script>
<?php
  }
 else
 {
  header('Location: master_supplier.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_supplier SET status='Active' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
		<script>
		alert("You have successfully Enable data");
		window.location.href = "master_supplier.php";
	</script>
<?php
  }
 else
 {
  header('Location: master_supplier.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{
		$kode = $_POST['kode'];
		$nama = $_POST['nama'];
		$alamat= $_POST['alamat'];
		$kota = $_POST['kota'];
		$negara = $_POST['negara'];
		$telpon = $_POST['telpon'];
		$email = $_POST['email'];
		$pic = $_POST['pic'];
		$cl = $_POST['cl'];
		$top = $_POST['top'];
		$kur1 = $_POST['kur1'];
		$kur2 = $_POST['kur2'];
		$kur3 = $_POST['kur3'];
		$status = $_POST['status'];


			$sql = "INSERT INTO master_supplier (kode, nama, alamat, kota, negara, telpon, email, cl, top, pic, kur1, kur2,kur3, status)  VALUES
		('$kode', '$nama', '$alamat', '$kota', '$negara', '$telpon', '$email', '$cl', '$top', '$pic', '$kur1','$kur2','$kur3','$status')";
		$query = mysqli_query($conn, $sql);
			if( $query )
		{
			?>
			 <script>
			 alert("You have successfully add new data");
			 window.location.href = "master_supplier.php";
		 </script>
	<?php
			}
		else
		{
				header('Location: master_supplier.php?status=gagal');
			}
	}
else	if(isset( $_POST['daftar1']))
		{
			$kode = $_POST['kode'];
			$nama = $_POST['nama'];
			$alamat= $_POST['alamat'];
			$kota = $_POST['kota'];
			$negara = $_POST['negara'];
			$telpon = $_POST['telpon'];
			$email = $_POST['email'];
			$pic = $_POST['pic'];
			$cl = $_POST['cl'];
			$top = $_POST['top'];
			$kur1 = $_POST['kur1'];
			$kur2 = $_POST['kur2'];
			$kur3 = $_POST['kur3'];
			$status = $_POST['status'];
				$nom = $_POST['nom'];

				$sql = "UPDATE master_supplier SET kode='$kode', nama='$nama', alamat='$alamat', kota='$kota', negara='$negara',
				telpon='$telpon', email='$email', pic='$pic', cl='$cl', top='$top', kur1='$kur1', kur2='$kur2', kur3='$kur3', status='$status' where id='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
				?>
				 <script>
				 alert("You have successfully update data");
				 window.location.href = "master_supplier.php";
			 </script>
		<?php
	    	}
			else
			{
				header('Location: master_supplier.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
