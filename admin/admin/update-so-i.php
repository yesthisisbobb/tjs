<?php
include '../../config.php';
if(isset( $_POST['daftar']))
	{
			$dis= $_POST['dis1'];
			$grand=$_POST['grand'];
			$sono=$_POST['sono1'];
			$status=$_POST['status'];
			$bott=$_POST['bott'];
			$sc=$_POST['sc'];
			$sc1=$_POST['sc1'];
			$mc=$_POST['mc'];
			$fc=$_POST['fc'];
			$cogsp=$_POST['cogsp'];
			$gprofit=$_POST['gprofit'];



$sql = "UPDATE ijual SET dis='$dis',grand_total='$grand', bott='$bott', sc='$sc', sc1='$sc1', mc='$mc',fc='$fc',
cogsp='$cogsp', gprofit='$gprofit', status='$status' WHERE cart_id='$sono'";
$query = mysqli_query($conn, $sql);

    	if( $query )
		{
        	header('Location: so_in_i.php?status=sukses');
    	}
		else
		{
			header('Location: so_in_i.php?status=gagal');
    	}

	}
	else if(isset( $_POST['daftar1']))
		{
				$bayar= $_POST['payment'];
				$kembali=$_POST['kembali'];
				$sono=$_POST['sono1'];
				$statusp=$_POST['statusp'];
				$status=$_POST['status'];
				$jum=$_POST['jum'];
				$kode=$_POST['kode'];
				// $date1 = strtr($_POST["tglkirim"], '/', '-');
				$tgl=$_POST['tglkirim'];
				$date1 = strtr($_REQUEST['date'], '/', '-');
				$tglkirim1=date("Y-m-d",strtotime($tgl));



				$bott=$_POST['bott'];
				$sc=$_POST['sc'];
				$sc1=$_POST['sc1'];
				$mc=$_POST['mc'];
				$fc=$_POST['fc'];
				$cogsp=$_POST['cogsp'];
				$gprofit=$_POST['gprofit'];



	$sql = "UPDATE ijual SET bayar='$bayar',kembali='$kembali', tglkirim='$tglkirim1', status_payment='$statusp', status='$status' WHERE cart_id='$sono'";
	$query = mysqli_query($conn, $sql);

	$nomer=1;
	$sql8="SELECT * FROM masterpo";
	$query8 = mysqli_query($conn, $sql8);
	while($amku8 = mysqli_fetch_array($query8)){
		$nomer=$nomer+1;
	}
	$cek=0;
	$sqlcek="SELECT * FROM masterpo where sono='$sono'";
	$querycek = mysqli_query($conn, $sqlcek);
	while($amkucek = mysqli_fetch_array($querycek)){
		$cek=$cek+1;
	}
if ($cek==0)
{
	$sql1 = "INSERT INTO masterpo(nopo,sono,dist,status)  VALUES ('$nomer','$sono','KM','CLOSED')";
	$query1 = mysqli_query($conn, $sql1);

	$sql6="SELECT * FROM ijualdtl where no_cart='$sono'";
	$query6 = mysqli_query($conn, $sql6);
	while($amku6 = mysqli_fetch_array($query6)){
		$kodeku=$amku6['kode_stok'];
		$jum1=$amku6['jumlah'];

		$sql7="SELECT * FROM master_hpp where tjscode='$kodeku'";
		$query7 = mysqli_query($conn, $sql7);
		while($amku7 = mysqli_fetch_array($query7)){
				$hpp7=$amku7['cogsp']*$amku7['sqmctn'];
				$totalakhir=$hpp7*$jum1;
		}

		$sql9 = "INSERT INTO podtl(nopo,noso,kode,jumlah,harga,total)  VALUES('$nomer','$sono','$kodeku','$jum1','$hpp7','$totalakhir')";
		$query9 = mysqli_query($conn, $sql9);
	}
}

else {

}

	    	if( $query )
			{
	        	header("Location: inv-i.php?status=sukses&no=$sono");
	    	}
			else
			{
				header('Location: inv-i.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
