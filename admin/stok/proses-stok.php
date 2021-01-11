<?php
include '../../config.php';
session_start();
$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_stok where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_stok.php?status=sukses');
  }
 else
 {
  header('Location: master_stok.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_stok SET status='InActive' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_stok.php?status=sukses');
  }
 else
 {
  header('Location: master_stok.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_stok SET status='Active' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_stok.php?status=sukses');
  }
 else
 {
  header('Location: master_stok.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{
		$kodetipe = $_POST['kodetipe'];
		$kodehsku=$_POST['hscode'];
		$kodeperusahaan = $_POST['kodeperusahaan'];
		$kodemerk = $_POST['kodku'];
		$kodegrup1=$_POST['kodegrup1'];
		$kodesup = $_POST['kodesup'];
		$country = $_POST['country'];
		$grade = $_POST['grade'];
		$kode_stok = $_POST['kode_stok'];
		$nm_stok = $_POST['nm_stok'];
		$fic=$_POST['fic'];
		$panjang = $_POST['panjang'];
		$lebar = $_POST['lebar'];
		$ctnpallet=$_POST['ctnpallet'];
		$tebal = $_POST['tebal'];
		$tinggi = $_POST['tinggi'];
		$pcsctn = $_POST['pcsctn'];
		$sqmctn = $_POST['sqmctn'];
		$sellunit = $_POST['sellunit'];
		$kgsstok = $_POST['kgsstok'];
		$cubicstok = $_POST['cubicstok'];
		$contstan=$_POST['contstan'];
		$maxcont=$_POST['maxcont'];
		$stokcont=$_POST['stokcont'];
		$comment=$_POST['commentku'];
		$nm_user=$_SESSION['username'];
		$status = $_POST['status'];

		//$sql = "INSERT INTO master_stok (Kode, kode_perusahaan) VALUES ('$kd_stok', '$kd_perusahaan')";

		$sql = "INSERT INTO master_stok(kodetipe, grupname, kodehs, kodeperusahaan, kodemerk, country, kodesup, grade, factory_code,
			kode_stok, nm_stok, panjang,lebar,tebal,tinggi, ctnpallet, pcsctn, sqmctn,sellunit, kgsstok, cubicstok, contstan, maxcont, stokcont,
			des, nm_user,status) VALUES ('$kodetipe','$kodegrup1','$kodehsku','$kodeperusahaan', '$kodemerk','$country', '$kodesup'
				,'$grade', '$fic','$kode_stok','$nm_stok','$panjang', '$lebar', '$tebal','$tinggi','$ctnpallet','$pcsctn', '$sqmctn', '$sellunit','$kgsstok', '$cubicstok','$contstan',
				'$maxcont','$stokcont','$comment','$nm_user','$status')";

			$queryok = mysqli_query($conn, $sql);
			if( $queryok )
		{
					header('Location: master_stok.php?status=sukses');
			}
		else
		{
			 header('Location: master_stok.php?status=gagal');

			}

	}
else	if(isset( $_POST['daftar1']))
		{
			$kodetipe = $_POST['kodetipe'];
			$kodehsku=$_POST['hscode'];
			$kodeperusahaan = $_POST['kodeperusahaan'];
			$kodemerk = $_POST['kodemerk'];
			$kodesup = $_POST['kodesup'];
			$kodegrup1=$_POST['kodegrup1'];
			$country = $_POST['country'];
			$ctnpallet=$_POST['ctnpallet'];
			$grade = $_POST['grade'];
			$kode_stok = $_POST['kode_stok'];
			$nm_stok = $_POST['nm_stok'];
			$fic=$_POST['fic'];
			$panjang = $_POST['panjang'];
			$lebar = $_POST['lebar'];
			$tebal = $_POST['tebal'];
			$tinggi = $_POST['tinggi'];
			$pcsctn = $_POST['pcsctn'];
			$sqmctn = $_POST['sqmctn'];
			$sellunit = $_POST['sellunit'];
			$kgsstok = $_POST['kgctn'];
			$cubicstok = $_POST['volctn'];
			$contstan=$_POST['contstan'];
			$maxcont=$_POST['maxcont'];
			$stokcont=$_POST['stokcont'];
			$comment=$_POST['commentku'];
			$nm_user=$_SESSION['username'];
			$status = $_POST['status'];

			$nom = $_POST['nom'];

			//$sql = "INSERT INTO master_stok (Kode, kode_perusahaan) VALUES ('$kd_stok', '$kd_perusahaan')";
			$sql = "UPDATE master_stok SET kodetipe='$kodetipe', kodehs='$kodehsku', kodeperusahaan='$kodeperusahaan',
			kodemerk='$kodemerk', country='$country',kodesup='$kodesup', grade='$grade', factory_code='$fic',
			kode_stok='$kode_stok',nm_stok='$nm_stok', panjang='$panjang', lebar='$lebar', tebal='$tebal',
			tinggi='$tinggi',ctnpallet='$ctnpallet', pcsctn='$pcsctn', sqmctn='$sqmctn',sellunit='$sellunit', kgsstok='$kgsstok', cubicstok='$cubicstok', contstan='$contstan',
			maxcont='$maxcont',stokcont='$stokcont',des='$comment', nm_user='$nm_user', status='$status' where no='$nom'";

			// $sql = "UPDATE master_stok SET kodetipe='$kodetipe', kodehs='$kodehsku', kodeperusahaan='$kodeperusahaan',
		 	// 		kodemerk='$kodemerk', country='$country',kodesup='$kodesup', grade='$grade', factory_code='$fic',
		 	// 		kode_stok='$kode_stok',nm_stok='$nm_stok', panjang='$panjang', lebar='$lebar', tebal='$tebal',tinggi='$tinggi',
		 	// 		pcsctn='$pcsctn', sqmctn='$sqmctn',sellunit='$sellunit', kgsstok='$kgsstok', cubicstok='$cubicstok', contstan='$contstan',
		 	// 		maxcont='$maxcont',stokcont='$stokcont',des='$comment', nm_user='$nm_user', status='$status' where no='$nom'";

				$queryok = mysqli_query($conn, $sql);
				if( $queryok )
			{
						header('Location: master_stok.php?status=sukses');
				}
			else
			{
				 header('Location: master_stok.php?status=gagal');

				}
		}
	else
	{
    die("Access Denied...");
	}

?>




<
