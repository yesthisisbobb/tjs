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
		$kodemerk = $_POST['kodemerk'];
		$kodesup = $_POST['kodesup'];
		$country = $_POST['country'];
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
		$kgsstok = $_POST['kgsstok'];
		$cubicstok = $_POST['cubicstok'];
		$contstan=$_POST['contstan'];
		$maxcont=$_POST['maxcont'];
		$stokcont=$_POST['stokcont'];
		$comment=$_POST['commentku'];
		$nm_user=$_SESSION['username'];
		$status = $_POST['status'];

		//$sql = "INSERT INTO master_stok (Kode, kode_perusahaan) VALUES ('$kd_stok', '$kd_perusahaan')";

		$sql = "INSERT INTO master_stok(kodetipe,kodehs, kodeperusahaan, kodemerk, country, kodesup, grade, factory_code,
			kode_stok, nm_stok, panjang,lebar,tebal,tinggi, pcsctn, sqmctn,sellunit, kgsstok, cubicstok, contstan, maxcont, stokcont,
			des, nm_user,status) VALUES ('$kodetipe','$kodehsku','$kodeperusahaan', '$kodemerk','$country', '$kodesup'
				,'$grade', '$fic','$kode_stok','$nm_stok','$panjang', '$lebar', '$tebal','$tinggi','$pcsctn', '$sqmctn', '$sellunit','$kgsstok', '$cubicstok','$contstan',
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
			$kodeperusahaan = $_POST['kodeperusahaan'];
			$kodemerk = $_POST['kodemerk'];
			$kodesup = $_POST['kodesup'];
			$kodedivisi = $_POST['kodedivisi'];
			$kelas = $_POST['kelas'];
			$kode_stok = $_POST['kode_stok'];
			$kodeitem_stok = $_POST['kodetipe'];
			$panjang = $_POST['panjang'];
			$lebar = $_POST['lebar'];
			$tebal = $_POST['tebal'];
			$pcsctn = $_POST['pcsctn'];
			$sqmctn = $_POST['sqmctn'];
			$kgctn = $_POST['kgctn'];
			$volctn = $_POST['volctn'];
				$jum=$_POST['jum'];
			$status = $_POST['status'];
			$nom = $_POST['nom'];

			//$sql = "INSERT INTO master_stok (Kode, kode_perusahaan) VALUES ('$kd_stok', '$kd_perusahaan')";
			$sql = "UPDATE master_stok SET kodetipe='$kodetipe', kodeperusahaan='$kodeperusahaan',
			kodemerk='$kodemerk', kodesup='$kodesup', kodedivisi='$kodedivisi', kelas='$kelas', kode_stok='$kode_stok',
			kodeitem_stok='$kodeitem_stok', panjang='$panjang', lebar='$lebar', tebal='$tebal',
			pcsctn='$pcsctn', sqmctn='$sqmctn', kgctn='$kgctn', volctn='$volctn', jum='$jum' where no='$nom'";


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
