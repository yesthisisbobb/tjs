<?php
include '../../config.php';

extract($_POST);

	$nom = $_POST['nom'];
	$aksi = $_GET['aksi'];

	if(isset( $_POST['daftar1']))
	{	    	
		// $nama1 = $_POST['nama_kontak'];	
		
		$sql = "UPDATE master_team SET name='$tim_name', id_manager='$id_manager', target='$value_target', region='$region_tim' WHERE `master_team`.`kode`='$nom'";
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
	else if(isset( $_POST['daftar']))
	{    	
	    $sql = "INSERT INTO master_team(name, id_manager, target, region, status) VALUES ('$tim_name3', '$manager3', '$value_target3', '$region3', 'Active')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{				
			?>
				<script type="text/javascript"> 
					alert("You have successfully add a new data"); 
					window.location.href = "master_team.php?aksi";
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
	else if(isset( $_POST['add_sales']))
	{    	
		$sql = "INSERT INTO detail_team(id_sales, id_team, target, wilayah, status) VALUES ('$sales2', '$team2', '$value_target2', '$region2', 'Active')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{				
			?>
				<script type="text/javascript"> 
					alert("You have successfully add a new data"); 
					window.location.href = "master_team.php?aksi";
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

		$sql = "DELETE FROM master_team WHERE `master_team`.`kode`='$nomor'";
		$query = mysqli_query($conn, $sql);
		if( $query )
		{
			// header('Location: master_kontak.php?status=sukses');			
			echo "Berhasil. $sql";
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
