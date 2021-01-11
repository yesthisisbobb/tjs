<?php
include '../../config.php';

$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_surface where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
		<script>
		alert("You have successfully delete data");
		window.location.href = "master_surface.php";
	</script>
<?php
  }
 else
 {
  header('Location: master_surface.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_surface SET status='InActive' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
		<script>
		alert("You have successfully disable data");
		window.location.href = "master_surface.php";
	</script>
<?php
  }
 else
 {
  header('Location: master_surface.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_surface SET status='Active' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
		<script>
		alert("You have successfully enable data");
		window.location.href = "master_surface.php";
	</script>
<?php
  }
 else
 {
  header('Location: master_surface.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{
		$kode = $_POST['kode'];
		$nama = $_POST['nama'];
		$status = $_POST['status'];
		$sql = "INSERT INTO master_surface(kode, nama, status)  VALUES ('$kode', '$nama', '$status')";
		$query = mysqli_query($conn, $sql);
			if( $query )
		{
			?>
			 <script>
			 alert("You have successfully insert data");
			 window.location.href = "master_surface.php";
		 </script>
	<?php
			}
		else
		{
				header('Location: master_surface.php?status=gagal');
			}



	}
else	if(isset( $_POST['daftar1']))
		{
	    	$kode = $_POST['kode'];
				$nama = $_POST['nama'];
				$nom = $_POST['nom'];
				$status = $_POST['status'];

				$sql = "UPDATE master_surface SET kode='$kode', nama='$nama', status='$status' where id='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
				?>
				 <script>
				 alert("You have successfully update data");
				 window.location.href = "master_surface.php";
			 </script>
		<?php
	    	}
			else
			{
				header('Location: master_surface.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
