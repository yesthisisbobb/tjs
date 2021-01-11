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


$sql = "UPDATE jual SET dis='$dis',grand_total='$grand', bott='$bott', sc='$sc', sc1='$sc1', mc='$mc',fc='$fc',
cogsp='$cogsp', gprofit='$gprofit', status='$status' WHERE cart_id='$sono'";
$query = mysqli_query($conn, $sql);

    	if( $query )
		{
        	header('Location: so_in.php?status=sukses');
    	}
		else
		{
			header('Location: so_in.php?status=gagal');
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



	$sql = "UPDATE jual SET bayar='$bayar',kembali='$kembali', tglkirim='$tglkirim1', status_payment='$statusp', status='$status' WHERE cart_id='$sono'";
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

	$sql6="SELECT * FROM jualdtl where no_cart='$sono'";
	$query6 = mysqli_query($conn, $sql6);
	while($amku6 = mysqli_fetch_array($query6)){
		$kodeku=$amku6['kode_stok'];
		$jum1=$amku6['jumlah'];

		$sql7="SELECT * FROM master_hpp where tjscode='$kodeku'";
		$query7 = mysqli_query($conn, $sql7);
		while($amku7 = mysqli_fetch_array($query7)){
				$hpp7=$amku7['cogsp'];
				$totalakhir=$hpp7*$jum1;
		}

		$sql9 = "INSERT INTO podtl(nopo,noso,kode,jumlah,harga,total)  VALUES('$nomer','$sono','$kodeku','$jum1','$hpp7','$totalakhir')";
		$query9 = mysqli_query($conn, $sql9);
	}
}

else {

}
$nomerdo=1;
$sqldo="SELECT * FROM do";
$querydo = mysqli_query($conn, $sqldo);
while($amkudo = mysqli_fetch_array($querydo)){
	$nomerdo=$nomerdo+1;
}
$sql1do = "INSERT INTO do(nodo,cart_id,tglkirim,status)  VALUES ('$nomerdo','$sono','$tglkirim1','CLOSED')";
$query1do = mysqli_query($conn, $sql1do);

$sql6do="SELECT * FROM jualdtl where no_cart='$sono'";
$query6do = mysqli_query($conn, $sql6do);
while($amku6do = mysqli_fetch_array($query6do)){
	$kodekudo=$amku6do['kode_stok'];
	$shading=$amku6do['shading'];
	$sqltipe = "SELECT * FROM master_stok where kode_stok='$kodekudo'";
	$querytipe = mysqli_query($conn, $sqltipe);
	while($amkutipe = mysqli_fetch_array($querytipe)){
		$kodetipeku=$amkutipe['kodeitem_stok'];
	}

	$jum1do=$amku6do['jumlah'];
	$sql9do = "INSERT INTO dodtl(nodo,no_cart,kode_stok,shading,jumlah)  VALUES('$nomerdo','$sono','$kodetipeku','$shading','$jum1do')";
	$query9do = mysqli_query($conn, $sql9do);
}

	    	if( $query )
			{
	        	header("Location: inv.php?status=sukses&no=$sono");
	    	}
			else
			{
				header('Location: inv.php?status=gagal');
	    	}

		}
	else
	{
    die("Access Denied...");
	}

?>
