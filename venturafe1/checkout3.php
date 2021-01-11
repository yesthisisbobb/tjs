<?php
session_start();
include("inc/config.php");
include("inc/header.php");
$aksi=$_GET["aksi"];
$id=$_GET["id"];
$sesi=$_GET["sessi"];
$nama=$_SESSION["username"];
$gt=0;


	$sqlhapus = "DELETE from cart where sess_id='$sesi'";
	$queryhapus = mysqli_query($conn, $sqlhapus);
	$sqlhapus1 = "DELETE from cartdtl where sess_id='$sesi'";
	$queryhapus1 = mysqli_query($conn, $sqlhapus1);

		if( $queryhapus1 )
			{
header('Location: index-shop.php?status=kosong');
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
