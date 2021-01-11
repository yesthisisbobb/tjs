<?php
session_start();
include("inc/config.php");
include("inc/header.php");

$id=$_GET["id"];
$sesi=$_GET["sessi"];
$nama=$_SESSION["username"];
$gt=0;
// $sqlok = "SELECT * from login where username='$nama'";
// $queryok = mysqli_query($conn, $sqlok);
// while($rowok = mysqli_fetch_array($queryok)) {
// $salesnya=$rowok['sales'];
// }

$sqlcekid = "SELECT * from jual";
$querycekid = mysqli_query($conn, $sqlcekid);
$rowcekjum=mysqli_num_rows($querycekid);
if($rowcekjum==0)
{
	$noakhir1=1;
}
else {
	$sqlcekid1 = "SELECT cart_id from jual order by cart_id  DESC";
	$querycekid1 = mysqli_query($conn, $sqlcekid1);
		while($rowcekid1 = mysqli_fetch_array($querycekid1)) {
			$noakhir=$rowcekid1["cart_id"];
			$noakhir1=$noakhir+1;
		}

}
$noso="SO"."/".$noakhir1;
echo $noso;
