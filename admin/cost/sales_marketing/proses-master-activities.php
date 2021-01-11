<?php
include '../../config.php';

extract($_POST);

	$nom = $_POST['nom'];
	$aksi = $_GET['aksi'];

	if ($aksi=="done")
	{
		$kode = $_GET['kode'];
		$sql = "UPDATE master_activities SET status='Done' WHERE `master_activities`.`id`='$kode'";
		$query = mysqli_query($conn, $sql);
		if( $query )
		{
			?>
				<script type="text/javascript"> 
					alert("Your activity has already done!"); 
					window.location.href = "master_activities.php";
				</script>
			<?php
		}
		else
		{
			// header('Location: master_activities.php?status=failed');
			echo "Gagal $sql";
		}
	}

	else if(isset( $_POST['daftar1']))
	{	    	
		// $nama1 = $_POST['nama_kontak'];	
		
		$sql = "UPDATE master_activities SET name='$name_act', type='$type', date='$date_activity', time='$time', duration='$duration', notes='$notes' WHERE `master_activities`.`id`='$nom'";
		$query = mysqli_query($conn, $sql);
		if( $query )
		{			
			?>
				<script type="text/javascript"> 
					alert("You have successfully update a data"); 
					window.location.href = "master_activities.php";
				</script>
			<?php	
			// echo "Berhasil $sql";	
		}
		else
		{
			// header('Location: master_divisi.php?status=gagal');
			
		}

	}
	else if(isset( $_POST['daftar']))
	{    	
	    $sql = "INSERT INTO master_activities (name, type, date, time, duration, notes, status, id_kontak, id_deals)VALUES (
			'$nama2', '$type2', '$date_activity2','$time2', '$duration2', '$notes2', 'On Process', '$kontak2', '$deals2')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{
			?>
				<script type="text/javascript"> 
					alert("You have successfully add a new data"); 
					window.location.href = "master_activities.php";
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
	else
	{
   		die("Access Denied...");
	}

?>
