<?php
session_start();
include("inc/config.php");
$aksi=$_GET["aksi"];
$no=$_GET["no"];
if ($aksi=="delete")
{
	$sql4= "DELETE from cartdtl where no='$no'";
	$query4 = mysqli_query($conn, $sql4);
	if( $query4 )
{
			header('Location: index.php?status=sukses');
	}
}
if(isset( $_POST['indent']))
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
			$sql1 = "INSERT INTO icartdtl(sess_id,kode_stok,jumlah,harga)  VALUES ('$sess1','$kodeitem','$qty','$harga')";
			$query1 = mysqli_query($conn, $sql1);
}
else
	{
		$sql1 = "INSERT INTO icartdtl(sess_id,kode_stok,jumlah,harga)  VALUES ('$sess1','$kodeitem','$qty','$harga')";
		$query1 = mysqli_query($conn, $sql1);
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

if(isset( $_POST['daftar']))
	{
		$sess1=session_id();
		$username1=$_SESSION["username"];
		$kodeitem= $_POST['kodeitem'];
		$qty = $_POST['qty'];

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
			$sql = "INSERT INTO cart(user_id,sess_id)  VALUES ('$username1','$sess1')";
			$query = mysqli_query($conn, $sql);
			$sql1 = "INSERT INTO cartdtl(sess_id,kode_stok,jumlah,harga)  VALUES ('$sess1','$kodeitem','$qty','$harga')";
			$query1 = mysqli_query($conn, $sql1);
}
else
	{
		$sql1 = "INSERT INTO cartdtl(sess_id,kode_stok,jumlah,harga)  VALUES ('$sess1','$kodeitem','$qty','$harga')";
		$query1 = mysqli_query($conn, $sql1);
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
