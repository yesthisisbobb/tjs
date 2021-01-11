<?php
include '../../config.php';

extract($_POST);

	$nom = $_POST['nom'];
	$aksi = $_GET['aksi'];

	if(isset( $_POST['daftar1']))
	{	    	
		// $nama1 = $_POST['nama_kontak'];	
		
		$sql = "UPDATE detail_team SET target='$target2', wilayah='$region' WHERE `detail_team`.`kode`='$nom'";
		$query = mysqli_query($conn, $sql);
		if( $query )
		{
			?>
				<script type="text/javascript"> 
					alert("You have successfully updated a new data"); 
					window.location.href = "master_team.php?aksi";
				</script>
			<?php	
		}
		else
		{
			// header('Location: master_divisi.php?status=gagal');
			echo "Gagal $sql";
		}

	}
	else if ($aksi=="delete")
	{
		$nomor = $_GET['no'];

		$sql = "DELETE FROM detail_team WHERE `detail_team`.`kode`='$nomor'";
		$query = mysqli_query($conn, $sql);
		if( $query )
		{
			?>
				<script type="text/javascript"> 
					alert("You have successfully deleted a data"); 
					window.location.href = "master_team.php?aksi";
				</script>
			<?php	
		}
		else
		{
			// header('Location: master_kontak.php?status=gagal');
			echo "Gagal $sql";
		}
	}
	else
	{
   		die("Access Denied...");
	}

?>
