<?php
include '../../config.php';

extract($_POST);

	$nom = $_POST['nom'];
	$aksi = $_GET['aksi'];

	if(isset( $_POST['daftar1']))
	{	    	
		$nama1 = $_POST['nama_kontak'];	
		
		$sql = "UPDATE kontak SET nama='$nama1', perusahaan='$perusahaan', alamat='$alamat', telp='$telp', email='$email', label='$label' WHERE `kontak`.`id`='$nom'";
		$query = mysqli_query($conn, $sql);
		if( $query )
		{
			// header('Location: master_kontak.php?&status=sukses');
			?>
				<script type="text/javascript"> 
					alert("You have successfully update a data"); 
					window.location.href = "master_kontak.php";
				</script>
			<?php			
			// echo "Berhasil $sql";	
		}
		else
		{
			header('Location: master_divisi.php?status=gagal');
		}

	}
	else if(isset( $_POST['daftar']))
	{    	
	    $sql = "INSERT INTO kontak(nama, foto, perusahaan, alamat, telp, email, label, idkaryawan) VALUES ('$nama2', 'kontak1', '$perusahaan2', '$alamat2', '$telp2', '$email2', '$label2', '$idkrywn')";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{
			?>
				<script type="text/javascript"> 
					alert("You have successfully add a new data"); 
					window.location.href = "master_kontak.php";
				</script>
			<?php	
			// echo "Berhasil. $sql";
    	}
		else
		{
			header('Location: master_kontak.php?status=gagal');
    	}

	}
	else if ($aksi=="delete")
	{
		$nomor = $_GET['no'];

		$sql = "DELETE FROM kontak WHERE id='$nomor'";
		$query = mysqli_query($conn, $sql);
		if( $query )
		{
			// header('Location: master_kontak.php?status=sukses');
			?>
				<script type="text/javascript"> 
					alert("You have successfully delete a data"); 
					window.location.href = "master_kontak.php";
				</script>
			<?php	
			// echo "Berhasil. $sql";
		}
		else
		{
			header('Location: master_kontak.php?status=gagal');
		}
	}
	else
	{
   		die("Access Denied...");
	}

?>
