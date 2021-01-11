<?php
include '../../config.php';

extract($_POST);

	$nom = $_POST['nom'];
	$aksi = $_GET['aksi'];

	if(isset( $_POST['daftar1']))
	{	    	
		// $nama1 = $_POST['nama_kontak'];	
		
		$sql = "UPDATE deal_stage SET name='$name', percentage='$persentase' WHERE `deal_stage`.`id`='$nom'";
		$query = mysqli_query($conn, $sql);
		if( $query )
		{
			// header('Location: master_kontak.php?&status=sukses');
			?>
				<script type="text/javascript"> 
					alert("You have successfully update a data"); 
					window.location.href = "master_stage.php";
				</script>
			<?php			
			// echo "Berhasil $sql";	
		}
		else
		{
			// header('Location: master_divisi.php?status=gagal');
			echo "Gagal $sql";
		}

	}
	else if(isset( $_POST['daftar']))
	{    	
	    $sql = "INSERT INTO deal_stage VALUES (NULL, '$nama2', '$persentase2')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{
			?>
				<script type="text/javascript"> 
					alert("You have successfully add a new data"); 
					window.location.href = "master_stage.php";
				</script>
			<?php	
			// echo "Berhasil. $sql";
    	}
		else
		{
			// header('Location: master_stage.php?status=gagal');
			echo "Gagal $sql";
    	}

	}
	else if ($aksi=="delete")
	{
		$nomor = $_GET['no'];

		$sql = "DELETE FROM deal_stage WHERE id='$nomor'";
		$query = mysqli_query($conn, $sql);
		if( $query )
		{
			// header('Location: master_kontak.php?status=sukses');
			?>
				<script type="text/javascript"> 
					alert("You have successfully delete a data"); 
					window.location.href = "master_stage.php";
				</script>
			<?php	
			// echo "Berhasil. $sql";
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
