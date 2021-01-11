<?php
include '../../config.php';
$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_perusahaan where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
	 <script>
	 alert("You have successfully Delete this data");
	 window.location.href = "master_perusahaan.php";
 </script>
<?php
  }
 else
 {
  header('Location: master_perusahaan.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_perusahaan SET status='InActive' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
	 <script>
	 alert("You have successfully Disable this data");
	 window.location.href = "master_perusahaan.php";
 </script>
<?php
  }
 else
 {
  header('Location: master_perusahaan.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_perusahaan SET status='Active' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
		<script>
		alert("You have successfully Enable this data");
		window.location.href = "master_perusahaan.php";
	</script>
<?php
  }
 else
 {
  header('Location: master_perusahaan.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{
    	$kode = $_POST['kode_perusahaan'];
			$nama = $_POST['nama'];
			$status = $_POST['status'];

	    $sql = "INSERT INTO master_perusahaan (kode, nm_perusahaan, status)VALUES ('$kode', '$nama', '$status')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{

			?>
			 <script>
			 alert("You have successfully Add a new data");
			 window.location.href = "master_perusahaan.php";
		 </script>
	<?php
    	}
		else
		{
			header('Location: master_perusahaan.php?status=gagal');
    	}

	}
else	if(isset( $_POST['daftar1']))
		{
	    	$kode = $_POST['kode_perusahaan'];
				$nama = $_POST['nama'];
				$nom = $_POST['nom'];
					$status = $_POST['status'];

				$sql = "UPDATE master_perusahaan SET kode='$kode', nm_perusahaan='$nama',status='$status' where id='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
				?>
				 <script>
				 alert("You have successfully update data");
				 window.location.href = "master_perusahaan.php";
			 </script>
		<?php
	    	}
			else
			{
				header('Location: master_perusahaan.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
