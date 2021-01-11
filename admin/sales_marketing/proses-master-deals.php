<?php
include '../../config.php';

$aksi = $_GET['aksi'];
extract($_POST);	

	if(isset( $_POST['daftar1']))
	{	    	
		$nom = $_POST['nom'];		

		$sql = "UPDATE master_deals SET keterangan='$information', name='$nama_deals', value='$value_deals', closing_date='$closing', id_kontak='$id_kontak', id_stage='$stage_deal' WHERE id='$nom'";
		$query = mysqli_query($conn, $sql);
		if( $query )
		{
			?>
				<script type="text/javascript"> 
					alert("You have successfully update a data"); 
					window.location.href = "master_deals.php";
				</script>
			<?php		
		}
		else
		{
			// header('Location: master_deals.php?status=gagal');
			echo "Gagal. ".mysqli_error();	
			echo "Gagal. $sql";	
		}

	}
	else if(isset( $_POST['daftar']))
	{    	
		$tgl= date('Y-m-d H:i:s');
	    $sql = "INSERT INTO master_deals(name, value, closing_date, id_kontak, id_stage) VALUES ('$nama2', '$value2', '$closing2', '$kontak_name', '$stage2')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{
			?>
				<script type="text/javascript"> 
					alert("You have successfully add a new data"); 
					window.location.href = "master_deals.php";
				</script>
			<?php	
    	}
		else
		{
			echo "Gagal. ".mysqli_error();	
			echo "Gagal. $sql";	
    	}

	}	
	else if ($aksi=="delete")
	{
		$nomor = $_GET['no'];

		$sql = "DELETE FROM master_deals WHERE id='$nomor'";
		$query = mysqli_query($conn, $sql);
		if( $query )
		{
			?>
				<script type="text/javascript"> 
					alert("You have successfully delete a data"); 
					window.location.href = "master_deals.php";
				</script>
			<?php	
		}
		else
		{
			echo "Gagal. ".mysqli_error();	
			echo "Gagal. $sql";	
		}
	}
	
	else
	{
   		die("Access Denied...");
	}

?>
