<?php
session_start();
include("inc/config.php");
include("inc/header.php");

$id=$_GET["id"];
$sesi=$_GET["sesi"];
$nama=$_SESSION["username"];
$gt=0;
$sqlok = "SELECT * from login where username='$nama'";
$queryok = mysqli_query($conn, $sqlok);
while($rowok = mysqli_fetch_array($queryok)) {
$salesnya=$rowok['sales'];
}

$sql2 = "SELECT * from cart where sess_id='$sesi'";
$query2 = mysqli_query($conn, $sql2);
while($row = mysqli_fetch_array($query2)) {
		$uid=$row['user_id'];
		$tgl=$row['tgl'];
		$sql1 = "INSERT INTO jual(cart_id,sess_id,user_id,tgl,sales,status_payment)  VALUES ('$id','$sesi','$uid','$tgl','$salesnya','Unpaid')";
		$query1 = mysqli_query($conn, $sql1);
	}

	$sql3 = "SELECT * from cartdtl where sess_id='$sesi' and jumlah<>0";
	$query3 = mysqli_query($conn, $sql3);
	while($row1 = mysqli_fetch_array($query3)) {
			// $uid=$row['user_id'];
			// $tgl=$row['tgl'];
			$kodestok=$row1['kode_stok'];
			$jumlah=$row1['jumlah'];
			$harga=$row1['harga'];
			$shading=$row1['shading'];
			$total=$jumlah*$harga;
			$gt=$gt+$total;

			// $sqljum = "SELECT * from master_stok where kode_stok='$kodestok'";
			// $queryjum = mysqli_query($conn, $sqljum);
			// while($rowjum = mysqli_fetch_array($queryjum)) {
			// 	$sisa=$rowjum['jum']-$jumlah;
			// }
			//
			// $sqlstok = "INSERT INTO kartu_stok(kode_stok,invno,keluar,ket)  VALUES ('$kodestok','$id','$jumlah','Stok Out')";
			// $querystok = mysqli_query($conn, $sqlstok);
			// $sqlup="UPDATE master_stok SET jum='$sisa' where kode_stok='$kodestok'";
			// $queryup = mysqli_query($conn, $sqlup);



			$sql5 = "INSERT INTO jualdtl(no_cart,sess_id,kode_stok,shading,jumlah,harga,total)  VALUES ('$id','$sesi','$kodestok','$shading','$jumlah','$harga','$total')";
			$query5 = mysqli_query($conn, $sql5);
			$sql51 = "INSERT INTO ordertemp(no_cart,sess_id,kode_stok,shading,jumlah,harga,total)  VALUES ('$id','$sesi','$kodestok','$shading','$jumlah','$harga','$total')";
			$query51 = mysqli_query($conn, $sql51);

			$sql6 = "UPDATE jual set total='$gt',grand_total='$gt' where cart_id='$id'";
			$query6 = mysqli_query($conn, $sql6);

		}
		$sql7 = "DELETE from cart where sess_id='$sesi'";
		$query7 = mysqli_query($conn, $sql7);
		$sql8 = "DELETE from cartdtl where sess_id='$sesi'";
		$query8 = mysqli_query($conn, $sql8);


?>


    <header class="header-area sticky-bar">
        <div class="main-header-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo pt-20">
                            <a href="index.php">
                                <img src="assets/img/logo/logo.png" alt="">
                            </a>
                        </div>
                    </div>


                </div>
            </div>
            <!-- main-search start -->
        </div>
    </header>
		<div class="breadcrumb-area pt-20 pb-20  bg-paleturquoise">
				<div class="container">
						<div class="breadcrumb-content text-center">
								<!-- <ul>
										<li>
												<a href="index.php">Home</a>
										</li>
										<li class="active">login & register </li>
								</ul> -->
						</div>
				</div>
		</div>
		<?php

		if( $query6 )
			{
				?>
	<div class="container-fluid text-center pt-100 pb-100">
	<div class="alert alert-info alert-dismissible">
	<a href="index.php?status=sukses" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Thank You for order, </strong>  Please Procceed to payment
	</div>
	</div>
	<?php
	    	}
			else
			{
	        header('Location: index.php?status=gagal');
	    	}
				?>

        <footer class="footer-area bg-paleturquoise">
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
    </footer>
