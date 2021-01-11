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
$kode=$_POST['kode'];
$divisi = $_POST['bc'];
$cogs=$_POST['cogs'];
$sc = $_POST['sc'];
$tc = $_POST['tc'];
$mc = $_POST['mc'];
$interest = $_POST['interest'];
$sic = $_POST['sic'];
$fc = $_POST['fc'];
$rpc = $_POST['rpc'];
$saving = $_POST['saving'];
$middle = $_POST['middle'];
$project = $_POST['project'];
$osc = $_POST['osc'];
$stocost = $_POST['stocost'];
$bot=$_POST['bot'];
$disproject=$_POST['dis_project'];
$pl = $_POST['pl'];
$pls = $_POST['pls'];
$retail = $_POST['retail'];
$retails = $_POST['retails'];
$retailm = $_POST['retailm'];
$status = $_POST['status'];

	$sql = " INSERT INTO master_price ( kode,divisi,cogs,sc,tc,mc,interest,sic,fc,rpc,saving,middle,project,osc,
		stocost,bot,disproject,pl,pls,retail,retails,retailm,status )  VALUES('$kode', '$divisi','$cogs','$sc','$tc', '$mc',
			'$interest','$sic,'$fc','$rpc','$saving','$middle','$project','$osc','$stocost','$bot',
			'$disproject','$pl','$pls','$rpc','$retail','$retails','$retailm','$status' ) ";
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
			$kode=$_POST['kode'];
			$divisi = $_POST['bc'];
			$cogs=$_POST['cogs'];
			$sc = $_POST['sc'];
			$tc = $_POST['tc'];
			$mc = $_POST['mc'];
			$interest = $_POST['interest'];
			$sic = $_POST['sic'];
			$fc = $_POST['fc'];
			$rpc = $_POST['rpc'];
			$saving = $_POST['saving'];
			$middle = $_POST['middle'];
			$project = $_POST['project'];
			$osc = $_POST['osc'];
			$stocost = $_POST['stocost'];
			$bot=$_POST['bot'];
			$disproject=$_POST['dis_project'];
			$pl = $_POST['pl'];
			$pls = $_POST['pls'];
			$retail = $_POST['retail'];
			$retails = $_POST['retails'];
			$retailm = $_POST['retailm'];
			$status = $_POST['status'];
			$nom=$_POST['nom'];


			$sql = " UPDATE master_price SET kode='$kode',divisi='$divisi',cogs='$cogs',sc='$sc',tc='$tc',mc='$mc',interest='$interest',sic='$sic',fc='$fc',rpc='$rpc',
			saving='$saving',middle='$middle',project='$project',osc='$osc',stocost='$stocost',bot='$bot',disproject='$disproject',pl='$pl',pls='$pls',retail='$retail',
			retails='$retails',retailm='$retailm',status='$status' where  no='$nom'";
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
	else
	{
    die("Access Denied...");
	}

?>
