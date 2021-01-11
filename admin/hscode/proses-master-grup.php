<?php
include '../../config.php';

$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_hscode where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
		 <script>
		 alert("You have successfully delete data");
		 window.location.href = "master_hscode.php";
	 </script>
<?php
  }
 else
 {
  header('Location: master_hscode.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_hscode SET status='InActive' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
		 <script>
		 alert("You have successfully disable data");
		 window.location.href = "master_hscode.php";
	 </script>
<?php
  }
 else
 {
  header('Location: master_hscode.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_hscode SET status='Active' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

	 ?>
		 <script>
		 alert("You have successfully Enable data");
		 window.location.href = "master_hscode.php";
	 </script>
<?php
  }
 else
 {
  header('Location: master_hscode.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{
		$kode = $_POST['kode'];
		$nama = $_POST['nama'];
		$nama1 = $_POST['nama1'];
		$status = $_POST['status'];
		$sql = "INSERT INTO master_hscode(kode, nama, nama1, status)  VALUES ('$kode', '$nama','$nama1', '$status')";
		$query = mysqli_query($conn, $sql);
			if( $query )
		{
			?>
				<script>
				alert("You have successfully add new data");
				window.location.href = "master_hscode.php";
			</script>
	 <?php
			}
		else
		{
				header('Location: master_hscode.php?status=gagal');
			}



	}
else	if(isset( $_POST['daftar1']))
		{
	    	$kode = $_POST['kode'];
				$nama = $_POST['nama'];
				$nama1 = $_POST['nama1'];
				$nom = $_POST['nom'];
				$status = $_POST['status'];

				$sql = "UPDATE master_hscode SET kode='$kode', nama='$nama', nama1='$nama1', status='$status' where id='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
				?>
					<script>
					alert("You have successfully update data");
					window.location.href = "master_hscode.php";
				</script>
		 <?php
	    	}
			else
			{
				header('Location: master_hscode.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
