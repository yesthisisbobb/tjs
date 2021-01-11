<?php
include '../../config.php';
$aksi=$_GET['aksi'];
$nomer=$_GET['no'];

if ($aksi=="delete")
{

	$sql = "DELETE FROM master_cont where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_cont.php?status=sukses');
  }
 else
 {
  header('Location: master_cont.php?status=gagal');
  }

}
else
if ($aksi=="update")
{

	$sql = "UPDATE master_cont SET status='InActive' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_cont.php?status=sukses');
  }
 else
 {
  header('Location: master_cont.php?status=gagal');
  }
}
if ($aksi=="active")
{

	$sql = "UPDATE master_cont SET status='Active' where no='$nomer'";
 $query = mysqli_query($conn, $sql);
  if( $query )
 {

 		 header('Location: master_cont.php?status=sukses');
  }
 else
 {
  header('Location: master_cont.php?status=gagal');
  }
}
else
if(isset( $_POST['daftar']))
	{

$tjsitemcode = $_POST['tjsitemcode'];
$pg = $_POST['pg'];
$coo = $_POST['coo'];
$p = $_POST['p'];
$l = $_POST['l'];
$pcsctn = $_POST['pcsctn'];
$teb1 = $_POST['teb1'];
$stokcont = $_POST['stokcont'];
$ct = $_POST['ct'];
$buying_cur = $_POST['buying_cur'];
$pp = $_POST['pp'];
$bp = $_POST['bp'];
$bu = $_POST['bu'];
$su = $_POST['su'];
$kon = $_POST['kon'];
$bprate = $_POST['bprate'];
$buyprice = $_POST['buyprice'];
$suc = $_POST['suc'];
$agent = $_POST['agent'];
$agentbu = $_POST['agentbu'];
// $tax = $_POST['tax'];
$fee = $_POST['fee'];
$tujuan = $_POST['tujuan'];
$shiptype = $_POST['shiptype'];
$fee1 = $_POST['fee1'];
$volctn = $_POST['volctn'];
$kg = $_POST['kg'];
$stc = $_POST['stc'];
$ctc = $_POST['ctc'];
$sqmcont1 = $_POST['sqmcont1'];
$fcostlagi = $_POST['fcostlagi'];
$isku = $_POST['isku'];
$emkl1 = $_POST['emkl1'];
$emkl2 = $_POST['emkl2'];
$lscostdoc = $_POST['lscostdoc'];
$numcont = $_POST['numcont'];
$emklrate = $_POST['emklrate'];
$lscost = $_POST['lscost'];
$iduty = $_POST['iduty'];
$atax = $_POST['atax'];
$itax = $_POST['itax'];
$itax1 = $_POST['itax1'];
$sguard = $_POST['sguard'];
$finc = $_POST['finc'];
$inte = $_POST['inte'];
$sniku = $_POST['sniku'];
$cogsku = $_POST['cogsku'];
$cogskupta = $_POST['cogskupta'];
$cogskusmb = $_POST['cogskusmb'];
$status = $_POST['status'];

$sql = " INSERT INTO master_hpp ( tjsitemcode, pg, coo, p, l, pcsctn, teb1, stokcont, ct, buying_cur, pp, bp, bu, su, kon,
	bprate, buyprice, suc, agent, agentbu, fee, tujuan, shiptype, fee1, volctn, kg, stc, ctc, sqmcont1, fcostlagi, isku, emkl1,
	emkl2, lscostdoc, numcont, emklrate, lscost, iduty, atax, itax, itax1, sguard, finc, inte, sniku, cogsku, cogskupta, cogskusmb, status)
	VALUES ('$tjsitemcode', '$pg', '$coo', '$p', '$l', '$pcsctn', '$teb1', '$stokcont', '$ct', '$buying_cur', '$pp', '$bp', '$bu', '$su',
		'$kon', '$bprate', '$buyprice', '$suc', '$agent', '$agentbu', '$fee', '$tujuan', '$shiptype', '$fee1', '$volctn', '$kg', '$stc',
		'$ctc', '$sqmcont1', '$fcostlagi', '$isku', '$emkl1', '$emkl2', '$lscostdoc', '$numcont', '$emklrate', '$lscost', '$iduty', '$atax', '$itax',
		 '$itax1', '$sguard', '$finc', '$inte', '$sniku', '$cogsku', '$cogskupta', '$cogskusmb', 'Active')";
$query = mysqli_query($conn, $sql);
    	if( $query )
		{

					header('Location: master_hpp.php?status=sukses');
    	}
		else
		{
			header('Location: master_hpp.php?status=gagal');
    	}

	}
else	if(isset( $_POST['daftar1']))
		{
	    	$kode = $_POST['kode'];
				$nama = $_POST['nama'];
				$nom = $_POST['nom'];

				$sql = "UPDATE master_cont SET kode='$kode', nama='$nama' where no='$nom'";
			  $query = mysqli_query($conn, $sql);
	    	if( $query )
			{
						header('Location: master_cont.php?&status=sukses');
	    	}
			else
			{
				header('Location: master_cont.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
