<?php
session_start();
include("inc/config.php");
$sess1=session_id();
$username1=$_SESSION["username"];
if(isset( $_POST['daftar']))
{
	$nilai = $_POST['qtys2'];
	$nilai1= $_POST['qtysi'];
	$kd = $_POST['kd'];
	$kodep=$_POST['kodep1'];
	$harga=$_POST['harga'];
	$gd=$_POST['gd1'];
	$kodestok=$_POST['kodestok'];
	$jum=count($nilai);


	$sqlcek= "SELECT * FROM cart where sess_id='$sess1' and kodep='$kodep'";
	$querycek = mysqli_query($conn, $sqlcek);
	if ($querycek)
	{
		$rowcount=mysqli_num_rows($querycek);
	}

			if ($rowcount==0)
			{
							$sql = "INSERT INTO cart(user_id,sess_id,kodep)  VALUES ('$username1','$sess1','$kodep')";
							$query = mysqli_query($conn, $sql);
			}
			else {
							$sql = "UPDATE cart set user_id='$username1',sess_id='$sess1', kodep='$kodep'";
	  					$query = mysqli_query($conn, $sql);
						}

for($i=0;$i<=$jum;$i++)
{
	$sql1 = "INSERT INTO cartdtl(sess_id,kode_stok, shading,jumlah,harga,gudang)  VALUES ('$sess1','$kodestok','$kd[$i]','$nilai[$i]',
	'$harga','$gd[$i]')";
	$query1 = mysqli_query($conn, $sql1);
}

$sqlcek1= "SELECT * FROM icart where sess_id='$sess1'";
$querycek1 = mysqli_query($conn, $sqlcek1);
if ($querycek1)
{
	$rowcount1=mysqli_num_rows($querycek1);
}

if ($rowcount1==0)
{
	if ($nilai1>0)
	{
	$sqlin = "INSERT INTO icart(user_id,sess_id)  VALUES ('$username1','$sess1')";
	$queryin = mysqli_query($conn, $sqlin);
	}
}
else {
	$sqlin = "UPDATE icart set user_id='$username1',sess_id='$sess1'";
	$queryin = mysqli_query($conn, $sqlin);
}
if ($nilai1>0)
{
		$sql2 = "INSERT INTO icartdtl(sess_id,kode_stok,jumlah,harga)  VALUES ('$sess1','$kodestok','$nilai1','$harga')";
		$query2 = mysqli_query($conn, $sql2);
}
}


?>
