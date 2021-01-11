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

$sqlcekid = "SELECT * from ijual";
$querycekid = mysqli_query($conn, $sqlcekid);
$rowcekjum=mysqli_num_rows($querycekid);
if($rowcekjum==0)
{
	$noakhir1=1;
}
else {
	$sqlcekid1 = "SELECT cart_id from ijual order by cart_id  DESC LIMIT 1";
	$querycekid1 = mysqli_query($conn, $sqlcekid1);
		while($rowcekid1 = mysqli_fetch_array($querycekid1)) {
			$noakhir=$rowcekid1["cart_id"];
			$noakhir1=$noakhir+1;
		}

}


$sql2 = "SELECT * from icart where sess_id='$sesi'";
$query2 = mysqli_query($conn, $sql2);
while($row = mysqli_fetch_array($query2)) {
		$uid=$row['user_id'];
		// $tgl=$row['tgl'];
			$tgl=date("d/m/y");
			$noso="SO-I"."/"."$tgl"."/"."SBY"."/".$noakhir1;
		$sql1 = "INSERT INTO ijual(tgl,cart_id,noso,sess_id,user_id,status_payment)  VALUES ('$tgl','$noakhir1','$noso','$sesi','$uid','Unpaid')";
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


			$sql5 = "INSERT INTO ijualdtl(no_cart,noso,sess_id,kode_stok,jumlah,harga,total)  VALUES ('$noakhir1','$noso','$sesi','$kodestok','$jumlah','$harga','$total')";
			$query5 = mysqli_query($conn, $sql5);
			// $sql51 = "INSERT INTO ordertemp(no_cart,sess_id,kode_stok,shading,jumlah,harga,total)  VALUES ('$id','$sesi','$kodestok','$shading','$jumlah','$harga','$total')";
			// $query51 = mysqli_query($conn, $sql51);
			//
			// $sql6 = "UPDATE jual set total='$gt',grand_total='$gt' where cart_id='$id'";
			// $query6 = mysqli_query($conn, $sql6);

		}
		$sql7 = "DELETE from icart where sess_id='$sesi'";
		$query7 = mysqli_query($conn, $sql7);
		$sql8 = "DELETE from icartdtl where sess_id='$sesi'";
		$query8 = mysqli_query($conn, $sql8);


?>



		<?php

		if( $query8 )
		{
			header('Location: index-shop.php?status=indent');
			}
			else
			{
	        header('Location: index-shop.php?status=gagal');
	    	}
				?>

        <!-- <footer class="footer-area bg-paleturquoise">
        <div class="footer-bottom border-top-1 pt-10">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="copyright text-center pb-20">
                            <p>Copyright Smart Marble & Bath © All Right Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> -->
