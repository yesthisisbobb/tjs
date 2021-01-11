<?php
include '../../config.php';
$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_sub_grup where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
		<script>
		alert("You have successfully delete data");
		window.location.href = "master_sub_grup.php";
	</script>
<?php
  }
 else
 {
  header('Location: master_sub_grup.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_sub_grup SET status='InActive' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
		<script>
		alert("You have successfully disable data");
		window.location.href = "master_sub_grup.php";
	</script>
<?php
  }
 else
 {
  header('Location: master_sub_grup.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_sub_grup SET status='Active' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
		<script>
		alert("You have successfully enable data");
		window.location.href = "master_sub_grup.php";
	</script>
<?php
  }
 else
 {
  header('Location: master_sub_grup.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{
		$kode = $_POST['kode'];
		$namagrup= $_POST['kodemastergrup'];
		$nama = $_POST['nama'];
		$status = $_POST['status'];

		$sql = "INSERT INTO master_sub_grup(kode, namagrup, nama, status)  VALUES ('$kode', '$namagrup', '$nama', '$status')";
		$query = mysqli_query($conn, $sql);
			if( $query )
		{
			?>
			 <script>
			 alert("You have successfully insert new data");
			 window.location.href = "master_sub_grup.php";
		 </script>
	<?php
			}
		else
		{
				header('Location: master_sub_grup?status=gagal');
			}

	}
else	if(isset( $_POST['daftar1']))
		{
			$kode = $_POST['kode'];
			$namagrup= $_POST['kodemastergrup'];
			$nama = $_POST['nama'];
			$status = $_POST['status'];
			$nom = $_POST['nom'];

				$sql = "UPDATE master_sub_grup SET kode='$kode', namagrup='$namagrup', nama='$nama', status='$status' where id='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
				?>
				 <script>
				 alert("You have successfully update data");
				 window.location.href = "master_sub_grup.php";
			 </script>
		<?php
	    	}
			else
			{
				header('Location: master_sub_grup.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
