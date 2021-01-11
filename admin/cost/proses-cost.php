<?php
include '../../config.php';
session_start();
$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_tipe where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_tipe.php?status=sukses');
  }
 else
 {
  header('Location: master_mtipe.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_tipe SET status='InActive' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_tipe.php?status=sukses');
  }
 else
 {
  header('Location: master_tipe.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_tipe SET status='Active' where id='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_tipe.php?status=sukses');
  }
 else
 {
  header('Location: master_tipe.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{

$divisi = $_POST['bc1'];
$sc = $_POST['sc'];
$tc = $_POST['tc'];
$mc = $_POST['mc'];
$interest = $_POST['interest'];
$sic = $_POST['sic'];
$fc = $_POST['fc'];
$net = $_POST['net'];
$saving = $_POST['saving'];
$middle = $_POST['middle'];
$project = $_POST['project'];
$osc = $_POST['osc'];
$stocost = $_POST['stocost'];
$status = $_POST['status'];

	    $sql = " INSERT INTO master_cost ( divisi, sc, tc, mc, interest, sic, fc, net, saving, middle, project, osc, stocost, status )  VALUES
			('$divisi', '$sc', '$tc', '$mc', '$interest','$sic', '$fc', '$net', '$saving','$middle','$project','$osc','$stocost', '$status' ) ";
		$query = mysqli_query($conn, $sql);
    	if( $query )
		{

					header('Location: master_cost.php?status=sukses');
    	}
		else
		{
			header('Location: master_cost.php?status=gagal');
    	}

	}
else	if(isset( $_POST['daftar1']))
		{
			// $kodegrup = $_POST['kodegrup'];
			// $kode = $_POST['kode'];
			// $nama = $_POST['nama'];
			// $shading = $_POST['shading'];
			// $faces = $_POST['faces'];
			// $surface = $_POST['surface'];
			// $color = $_POST['color'];
			// $pattern = $_POST['pattern'];
			// $status = $_POST['status'];
			$kodegrup = $_POST['kodegrup'];
			$kode = $_POST['kode'];
			$nama = $_POST['nama'];
			$import = $_POST['import'];
			$panjang = $_POST['panjang'];
			$lebar = $_POST['lebar'];
			$faces = $_POST['faces'];
			$surface = $_POST['surface'];
			// $glosy = $_POST['glosy'];
			$color = $_POST['color'];
			$pattern = $_POST['pattern'];
			$buy = $_POST['buy'];
			$stock = $_POST['stock'];
			$selling = $_POST['selling'];
			$ll = $_POST['ll'];
			$bc = $_POST['bc'];
			$bc1 = $_POST['bc1'];
			$material = $_POST['material'];
			$nts = $_POST['nts'];
			$min = $_POST['min'];
			$max = $_POST['max'];
			$smallamount = $_POST['smallamount'];
			$kon = $_POST['kon'];
			$status = $_POST['status'];
				$nom = $_POST['nom'];

				$sql11 = "SELECT * FROM master_material where nama='$material'";
						 $query11 = mysqli_query($conn, $sql11);
						 while($amku11 = mysqli_fetch_array($query11)){
							 $material1=$amku11['id'];
					}
					$sql2 = "SELECT * FROM master_unit where nama='$buy'";
							 $query2 = mysqli_query($conn, $sql2);
							 while($amku2 = mysqli_fetch_array($query2)){
								 $buy1=$amku2['id'];
						}
						$sql3 = "SELECT * FROM master_unit where nama='$stock'";
								 $query3 = mysqli_query($conn, $sql3);
								 while($amku3 = mysqli_fetch_array($query3)){
									 $stock1=$amku3['id'];
							}
							$sql4 = "SELECT * FROM master_unit where nama='$selling'";
									 $query4 = mysqli_query($conn, $sql4);
									 while($amku4 = mysqli_fetch_array($query4)){
										 $selling1=$amku4['id'];
								}

				$sql = "UPDATE master_tipe SET kodegrup='$kodegrup', kode='$kode', nama='$nama', import='$import',
				panjang='$panjang', lebar='$lebar',faces='$faces', surface='$surface',color='$color', pattern='$pattern',
				buy='$buy1',stock='$stock1',selling='$selling1',ll='$ll',
				bc='$bc',bc1='$bc1',material='$material1',nts='$nts',min='$min',max='$max',smallamount='$smallamount',
				kon='$kon',status='$status' where id='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
						header('Location: master_tipe.php?&status=sukses');
	    	}
			else
			{
				header('Location: master_tipe.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
