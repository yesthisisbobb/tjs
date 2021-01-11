<?php
session_start();
include("inc/config.php");
$sess1=session_id();
$username1=$_SESSION["username"];
if(isset( $_POST['daftar']))
{
	$qty = $_POST['quantity'];
	$kodep = $_POST['kode22'];
	$har=$_POST['har'];
	$sqlcek= "SELECT * FROM cart where sess_id='$sess1' and user_id='$username1'";
	$querycek = mysqli_query($conn, $sqlcek);
	$rowcount=mysqli_num_rows($querycek);
	$total=$qty*$har;


			if ($rowcount==0)
			{
							$sql = "INSERT INTO cart(user_id,sess_id,kodep)  VALUES ('$username1','$sess1','$kodep')";
							$query = mysqli_query($conn, $sql);
			}
			else {
							$sql = "UPDATE cart set user_id='$username1',sess_id='$sess1', kodep='$kodep'";
	  					$query = mysqli_query($conn, $sql);
						}
						$sql1 = "INSERT INTO cartdtl(sess_id,userid, kode_stok,jumlah,harga,total)  VALUES ('$sess1','$username1','$kodep','$qty','$har','$total')";
						$query1 = mysqli_query($conn, $sql1);
}
else
if(isset( $_POST['daftar1']))
{
	$qty = $_POST['quantity'];
	$kodep = $_POST['kode22'];
	$har=$_POST['har'];
	$sqlcek= "SELECT * FROM icart where sess_id='$sess1' and user_id='$username1'";
	$querycek = mysqli_query($conn, $sqlcek);
	$rowcount=mysqli_num_rows($querycek);
	$total=$qty*$har;


			if ($rowcount==0)
			{
							$sql = "INSERT INTO icart(user_id,sess_id,kodep)  VALUES ('$username1','$sess1','$kodep')";
							$query = mysqli_query($conn, $sql);
			}
			else {
							$sql = "UPDATE icart set user_id='$username1',sess_id='$sess1', kodep='$kodep'";
	  					$query = mysqli_query($conn, $sql);
						}
						$sql1 = "INSERT INTO icartdtl(sess_id,userid, kode_stok,jumlah,harga,total)  VALUES ('$sess1','$username1','$kodep','$qty','$har','$total')";
						$query1 = mysqli_query($conn, $sql1);
}
if( $query1 )
{
		header('Location: index-shop.php?status=sukses');
}
else
{
	header('Location: index-shop.php?status=gagal');
}

?>
