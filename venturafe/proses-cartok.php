<?php
session_start();
include("inc/config.php");
$aksi=$_GET["aksi"];
$qtysi=$_POST['qtysi'];
$no=$_GET["no"];

if(isset( $_POST['daftar']))
	{
		if($qtysi>0)
			{
				$sess1=session_id();
				$username1=$_SESSION["username"];
				$kodeitem= $_POST['kodeitem'];
				$qty = $_POST['qty'];


				$harga=$_POST['harga'];
				// $status = $_POST['status'];
				$sqlcek= "SELECT * FROM icart where sess_id='$sess1'";
			  $querycek = mysqli_query($conn, $sqlcek);
				if ($querycek)
				{
					$rowcount=mysqli_num_rows($querycek);
				}

		if ($rowcount==0)
		{
					$sql = "INSERT INTO icart(user_id,sess_id)  VALUES ('$username1','$sess1')";
					$query = mysqli_query($conn, $sql);
					$sql1 = "INSERT INTO icartdtl(sess_id,kode_stok,jumlah,harga)  VALUES ('$sess1','$kodeitem','$qtysi','$harga')";
					$query1 = mysqli_query($conn, $sql1);
		}
		else
			{
				$sql1 = "INSERT INTO icartdtl(sess_id,kode_stok,jumlah,harga)  VALUES ('$sess1','$kodeitem','$qtysi','$harga')";
				$query1 = mysqli_query($conn, $sql1);
			}


			}


		$sess1=session_id();
		$username1=$_SESSION["username"];
		$kodeitem= $_POST['kodeitem'];
		$qty = $_POST['qty'];
		$qtys=$_POST['qtys2'];
		$qtysi=$_POST['qtysi'];

		$kd1=$_POST['kd1'];
		$gd1=$_POST['gd1'];


		$jumar=count($qtys);
		// echo $qtys[1];

		// $sqlcek1= "SELECT * FROM master_stok where kode_stok='$kodeitem'";
	 //  $querycek1 = mysqli_query($conn, $sqlcek1);
	 // while($amcek1 = mysqli_fetch_array($querycek1)){
		//  	$jumlah=$amcek1['jum'];
	 // }

		$harga=$_POST['harga'];
		// $status = $_POST['status'];
		$sqlcek= "SELECT * FROM cart where sess_id='$sess1'";
	  $querycek = mysqli_query($conn, $sqlcek);
		if ($querycek)
		{
			$rowcount=mysqli_num_rows($querycek);
		}

if ($rowcount==0)
{
	$a=0;
			$sql = "INSERT INTO cart(user_id,sess_id)  VALUES ('$username1','$sess1')";
			$query = mysqli_query($conn, $sql);

			$sqlcek1= "SELECT * FROM master_shading where kode_stok='$kodeitem'";
			$querycek1 = mysqli_query($conn, $sqlcek1);
			while($amkucek1 = mysqli_fetch_array($querycek1)){
		  $kodeshading=$amkucek1['kd_shading'];

			$sql1 = "INSERT INTO cartdtl(sess_id,kode_stok,shading,jumlah,gudang,harga)  VALUES ('$sess1','$kodeitem','$kodeshading','$qtys[$a]','$gd1[$a]',$harga')";
			$query1 = mysqli_query($conn, $sql1);

			$sql2 = "SELECT * from master_shading where kode_stok='$kodeitem' and kd_shading='$kodeshading'";
			$query2 = mysqli_query($conn, $sql2);
			while($amku2 = mysqli_fetch_array($query2)){
				$jum=$amku2['awal'];
				$totakhir=$jum-$qtys[$a];
				echo $totakhir;
				$sql3 = "UPDATE master_shading SET keluar='$qtys[$a]',sisa='$totakhir', awal='$totakhir' where kode_stok='$kodeitem'and kode_shading='$kodeshading'";
				$query3 = mysqli_query($conn, $sql3);
			}
			$a=$a+1;

		}


}
else
	{
		$a=0;
		$sqlcek1= "SELECT * FROM master_shading where kode_stok='$kodeitem'";
		$querycek1 = mysqli_query($conn, $sqlcek1);
		while($amkucek1 = mysqli_fetch_array($querycek1)){
		$kodeshading=$amkucek1['kd_shading'];
		$gd2=$amkucek1['gudang'];
		$sql1 = "INSERT INTO cartdtl(sess_id,kode_stok, shading, gudang,jumlah,harga)  VALUES ('$sess1','$kodeitem','$kodeshading','$gd2[$a]','$qtys[$a]','$harga')";
		$query1 = mysqli_query($conn, $sql1);
		// $sql2 = "SELECT * from master_shading where kode_stok='$kodeitem' and kd_shading='$kodeshading'";
		// $query2 = mysqli_query($conn, $sql2);
		// while($amku2 = mysqli_fetch_array($query2)){
		// 	$jum=$amku2['awal'];
		// 	$totakhir=$jum-$qtys[$a];
		// 	echo $totakhir;
		// 	$sql3 = "UPDATE master_shading SET keluar='$qtys[$a]',sisa='$totakhir', awal='$totakhir' where kode_stok='$kodeitem'and kd_shading='$kodeshading'";
		// 	$query3 = mysqli_query($conn, $sql3);
		// }
		$a=$a+1;

	}

}

    	if( $query1 )
		{
        	header('Location: index.php?status=sukses');
    	}
		else
		{
        header('Location: index.php?status=gagal');
    	}
	}

	else
	{
    die("Access Denied...");
	}

?>
