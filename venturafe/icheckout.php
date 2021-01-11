<?php
session_start();
include("inc/config.php");
$id=$_GET["id"];
$sesi=$_GET["sesi"];
$nama=$_SESSION["username"];
$gt=0;
$sqlok = "SELECT * from login where username='$nama'";
$queryok = mysqli_query($conn, $sqlok);
while($rowok = mysqli_fetch_array($queryok)) {
$salesnya=$rowok['sales'];
}

$sql2 = "SELECT * from icart where sess_id='$sesi'";
$query2 = mysqli_query($conn, $sql2);
while($row = mysqli_fetch_array($query2)) {
		$uid=$row['user_id'];
		$tgl=$row['tgl'];
		$sql1 = "INSERT INTO ijual(cart_id,sess_id,user_id,tgl,sales)  VALUES ('$id','$sesi','$uid','$tgl','$salesnya')";
		$query1 = mysqli_query($conn, $sql1);
	}

	$sql3 = "SELECT * from icartdtl where sess_id='$sesi'";
	$query3 = mysqli_query($conn, $sql3);
	while($row1 = mysqli_fetch_array($query3)) {
			// $uid=$row['user_id'];
			// $tgl=$row['tgl'];
			$kodestok=$row1['kode_stok'];
			$jumlah=$row1['jumlah'];
			$harga=$row1['harga'];
			$total=$jumlah*$harga;
			$gt=$gt+$total;
			$sql5 = "INSERT INTO ijualdtl(no_cart,sess_id,kode_stok,jumlah,harga,total)  VALUES ('$id','$sesi','$kodestok','$jumlah','$harga','$total')";
			$query5 = mysqli_query($conn, $sql5);
			$sql51 = "INSERT INTO ordertemp(no_cart,sess_id,kode_stok,jumlah,harga,total)  VALUES ('$id','$sesi','$kodestok','$jumlah','$harga','$total')";
			$query51 = mysqli_query($conn, $sql51);
			$sql6 = "UPDATE ijual set grand_total='$gt' where cart_id='$id'";
			$query6 = mysqli_query($conn, $sql6);

		}
		$sql7 = "DELETE from icart where sess_id='$sesi'";
		$query7 = mysqli_query($conn, $sql7);
		$sql8 = "DELETE from icartdtl where sess_id='$sesi'";
		$query8 = mysqli_query($conn, $sql8);

    	if( $query6 )
		{

        	header('Location: index.php?status=sukses');
    	}
		else
		{
        header('Location: index.php?status=gagal');
    	}




?>
