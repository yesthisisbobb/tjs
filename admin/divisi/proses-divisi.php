<?php
include '../../config.php';
$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_divisi where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
	 <script>
	 alert("You have successfully deleted this data");
	 window.location.href = "master_divisi.php";
 </script>
<?php
  }
 else
 {
  header('Location: master_divisi.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_divisi SET status='InActive' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
		<script>
		alert("You have successfully disabled this data");
		window.location.href = "master_divisi.php";
	</script>
<?php
  }
 else
 {
  header('Location: master_divisi.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_divisi SET status='Active' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
		<script>
		alert("You have successfully enabled this data");
		window.location.href = "master_divisi.php";
	</script>
<?php
  }
 else
 {
  header('Location: master_divisi.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{
    	$kode = $_POST['kode'];
			$nama = $_POST['nama'];
			$status = $_POST['status'];

	    $sql = "INSERT INTO master_divisi (kode, nama, status)VALUES ('$kode', '$nama', '$status')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{

			?>
			 <script>
			 alert("You have successfully added a new data");
			 window.location.href = "master_divisi.php";
		 </script>
	<?php
    	}
		else
		{
			header('Location: master_divisi.php?status=gagal');
    	}

	}
else	if(isset( $_POST['daftar1']))
		{
	    	$kode = $_POST['kode'];
				$nama = $_POST['nama'];
				$nom = $_POST['nom'];
				$status = $_POST['status'];

				$sql = "UPDATE master_divisi SET kode='$kode', nama='$nama', status='$status' where no='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
		 ?>
			<script>
  		alert("You have successfully edited data");
			window.location.href = "master_divisi.php";
		</script>
 <?php
	    	}
			else
			{
				header('Location: master_divisi.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
