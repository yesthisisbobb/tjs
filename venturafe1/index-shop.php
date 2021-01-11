<!DOCTYPE html>
<?php
session_start();
include("inc/config.php"); //include koneksi database
include("phpqrcode/qrlib.php");

?>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
<script src="https://use.fontawesome.com/f119966b0e.js"></script>

	<link rel="stylesheet" href="css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="include/rs-plugin/css/settings.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="include/rs-plugin/css/layers.css">
	<link rel="stylesheet" type="text/css" href="include/rs-plugin/css/navigation.css">

	<!-- Document Title
	============================================= -->
	<title>www.smartmarbleandbtah.com</title>

	<style>
	.blinkme {

  	animation: blinker 1s linear;
		animation-iteration-count: 3;

}

@keyframes blinker {
	50% {
color:black;
}

100% {
color:black;
}
}
	.Table
	{
			display: table;
			border-collapse: collapse;
			width: 100%;
	}
	.field-icon {
	  float: right;
	  margin-left: -25px;
	  margin-top: -25px;
		padding-right: 30px;
	  position: relative;
	  z-index: 2;
	}
	.Title
	{
			display: table-caption;
			text-align: center;
			font-weight: bold;
			font-size: larger;
	}
	.Heading
	{
			display: table-row;

			font-weight: bold;
			text-align: center;
	}
	.Heading2
	{
			display: table-row;
background-color: lightblue;

padding:15px;
			font-weight: bold;
			text-align: center;
	}

	.Row
	{
			display: table-row;
			padding: 5px;

	}
	.Cell
	{
			display: table-cell;
			border: solid 1px;
			border-width: thin;
			padding-left: 5px;
			padding-right: 5px;

			padding: 5px;
	}

	.blink_me {
  animation: blinker 2s linear infinite;
}

#hidelater{
	display: block;
}

@keyframes blinker {
  70% {
    opacity: 0;
  }
}
@media (max-width: 990px) {

	#hidelater{
	display: none;
}
}

	.horizontal-scrollable > .row {
					overflow-x: auto;
					white-space: nowrap;
			}
	.container2 {
  position: relative;
  color: white;
}
@media (max-width: 1440px) {
	.container2 {
		position: relative;
	  color: white;
		width: 100%;
	}
	.container2 h2 {
		font-size: 20px;
		position: relative;
		top: 30px;
		left: 0px;
	}
	.container2 p {
		font-size: 12px;
		position: relative;
		top: 40px;
		left: 0px;
	}
	.container2 a {

		position: relative;
		top: 30px;
		left: 0px;

	}


}
.text-block {
  position: absolute;
  bottom: 150px;
  left: 170px;
  color: white;
  padding-left: 20px;
  padding-right: 20px;

}
.text-block h2{
 color:white;
 font-family: Montserrat;
 text-shadow: 1px 1px #000000;
}
.text-block p{
 color:white;
 opacity: 50;
 font-size: 16px;
 margin-top: -30px;
 font-family: Montserrat;
}
	.centered {
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  transform: translate(-50%, -50%);
	}
	    img{
	        max-width: 100%;
	        max-height:100%;
					margin-left: 0px;
					margin-right: 0px;
					margin-top: 0px;
					margin-bottom: 0px;
	        display: block; /* remove extra space below image */
	    }

		.revo-slider-emphasis-text {
			font-size: 58px;
			font-weight: 700;
			letter-spacing: 1px;
			font-family: 'Poppins', sans-serif;
			padding: 15px 20px;
			border-top: 2px solid #FFF;
			border-bottom: 2px solid #FFF;
		}

		.revo-slider-desc-text {
			font-size: 20px;
			font-family: 'Lato', sans-serif;
			width: 650px;
			text-align: center;
			line-height: 1.5;
		}

		.revo-slider-caps-text {
			font-size: 16px;
			font-weight: 400;
			letter-spacing: 3px;
			font-family: 'Poppins', sans-serif;
		}

		.tp-video-play-button { display: none !important; }

		.tp-caption { white-space: nowrap; }

	</style>

</head>

<body class="stretched">
	<?php
	  function rupiah($angka){

		$hasil_rupiah = "Rp ". number_format($angka,0,',','.');
		return $hasil_rupiah;

	}
	?>
	<!-- Document Wrapper
	============================================= -->
	 <div id="wrapper" class="clearfix">
		<?php include("topbar.php"); ?>
	 <?php include("header1.php"); ?>
		<?php include("header2.php");?>

<?php
$statusku=$_GET["status"];
if ($statusku=="sukses")
{
?>
			<div class="modal-on-load" data-target="#myModal1"></div>

								<!-- Modal -->
								<div class="modal1 mfp-hide" id="myModal1">
									<div class="block mx-auto" style="background-color: #FFF; max-width: 1000px;">
									<div class="container">
										<div class="row">
											<div class=col-sm-6>
										<div class="center" style="padding: 10px;">
											<h3>Your Ready Stock</h3>
											<p>
													<div class="Table">
													<div class="Heading">
														<div class="Cell">
															Picture
														</div>
														<div class="Cell">
															Product Code
														</div>
														<div class="Cell">
															Qty
														</div>
														<div class="Cell">
															Price
														</div>
														<div class="Cell">
															Total
														</div>
													</div>
												<?php
												$tot=0;
													$sess2=session_id();
												$sql2ku = "SELECT * FROM cartdtl where sess_id='$sess2'";
														 $query2ku = mysqli_query($conn, $sql2ku);
														 $cek=mysqli_num_rows($queryku2);

														 while($am2ku = mysqli_fetch_array($query2ku)){
															 $kodeku=$am2ku['kode_stok'];
															 			$sql3ku = "SELECT * FROM master_stok where kode_stok='$kodeku'";
			 														 	$query3ku = mysqli_query($conn, $sql3ku);
																	 			while($am3ku = mysqli_fetch_array($query3ku)){
																		 			$tipeku=$am3ku['kodetipe'];
																					}
															 $jumku=$am2ku['jumlah'];
															 $hargaku=$am2ku['harga'];
															 $totalku=$am2ku['total'];
															 $tot=$tot+$totalku;

												 ?>

												 <div class="Heading">
													 <div class="Cell">
													 <img src="img/gambar/<?php echo $tipeku;?>.jpg" width="75" height="75">
												 </div>
													 <div class="Cell align-middle">
													 <?php echo $tipeku; ?>
												 </div>

											 <div class="Cell align-middle">
											 <?php echo $jumku; ?>
										 </div>
										 <div class="Cell align-middle">
										 <?php echo rupiah($hargaku); ?>
									 </div>
									 <div class="Cell align-middle">
									 <?php echo rupiah($totalku); ?>
								 </div>
											 </div>


											 <?php } ?>
											 <div class="Heading2">
												<div class="Cell">
												</div>
												<div class="Cell">
												</div>
												<div class="Cell">
											 </div>
											 <div class="Cell">
												 Total Purchase
											 </div>
												<div class="Cell">
												<?php echo rupiah($tot); ?>
											</div>
											</div>
										 </div>
											</p>
										</div>
										<div class="center m-0" style="padding: 20px;">
											<a href="#produkoke" class="btn btn-info">Add More</a>
											<!-- <a href="index-shop.php#produk" class="btn btn-info" onClick="$.magnificPopup.close();return false;">Add More</a> -->

												<a href="checkout.php?sessi=<?php echo $sess2;?>" class="btn btn-info" role="button">Buy</a>
										</div>
									</div>
									<script>
									function test()
									{
										document.getElementById("myModal1").close;
									}
									</script>
											<div class="col-sm-6 border-left">
										<div class="left" style="padding: 10px;">
											<h3 class="center">Your Indent Stock</h3>
											<p>
													<div class="Table">
													<div class="Heading">
														<div class="Cell">
															Picture
														</div>
														<div class="Cell">
															Product Code
														</div>
														<div class="Cell">
															Qty
														</div>
														<div class="Cell">
															Price
														</div>
														<div class="Cell">
															Total
														</div>
													</div>
												<?php
												$toti=0;
												$un=$_SESSION["username"];
													$sess2=session_id();
												$sql2kui = "SELECT * FROM icartdtl where sess_id='$sess2'";
														 $query2kui = mysqli_query($conn, $sql2kui);
														 $ceki=mysqli_num_rows($query2kui);

														 while($am2kui = mysqli_fetch_array($query2kui)){
															 $kodekui=$am2kui['kode_stok'];
															 			$sql3kui = "SELECT * FROM master_stok where kode_stok='$kodekui'";
			 														 	$query3kui = mysqli_query($conn, $sql3kui);
																	 			while($am3kui = mysqli_fetch_array($query3kui)){
																		 			$tipekui=$am3kui['kodetipe'];
																					}
															 $jumkui=$am2kui['jumlah'];
															 $hargakui=$am2kui['harga'];
															 $totalkui=$am2kui['total'];
															 $toti=$toti+$totalkui;

												 ?>

												 <div class="Heading">
													 <div class="Cell">
													 <img src="img/gambar/<?php echo $tipekui;?>.jpg" width="75" height="75">
												 </div>
													 <div class="Cell align-middle">
													 <?php echo $tipekui; ?>
												 </div>

											 <div class="Cell align-middle">
											 <?php echo $jumkui; ?>
										 </div>
										 <div class="Cell align-middle">
										 <?php echo rupiah($hargakui); ?>
									 </div>
									 <div class="Cell align-middle">
									 <?php echo rupiah($totalkui); ?>
								 </div>
											 </div>


											 <?php } ?>
											 <div class="Heading2">
												<div class="Cell">
												</div>
												<div class="Cell">
												</div>
												<div class="Cell">
											 </div>
											 <div class="Cell">
												 Total Purchase
											 </div>
												<div class="Cell">
												<?php echo rupiah($toti); ?>
											</div>
											</div>
										 </div>
											</p>
										</div>
										<div class="center m-0" style="padding: 20px;">
											<a href="index-shop.php#produk" class="btn btn-info" onClick="$.magnificPopup.close();return false;">Add More</a>
												<a href="checkout2.php?sessi=<?php echo $sess2;?>" class="btn btn-info" role="button">Indent</a>
										</div>
									</div>
									</div>

								</div>

									</div>
								</div>
<?php } else if ($statusku=="kosong") {?>
	<div class="modal-on-load" data-target="#myModal2"></div>

	<!-- Modal -->
	<div class="modal1 mfp-hide subscribe-widget" id="myModal2">
		<div class="block dark mx-auto" style="background: url('images/modals/green.jpg') no-repeat; background-size: cover; max-width: 700px;" data-height-xl="400">
			<div style="padding: 50px;">
				<div class="heading-block border-bottom-0 bottommargin-sm" style="max-width:500px;">
					<h3>YOUR CART IS EMPTY NOW</h3>
					<span>Click next button to continue shopping</span>
				</div>
				<div class="widget-subscribe-form-result"></div>
					<a href="#"  class="button button-rounded button-border button-light ml-0" onClick="$.magnificPopup.close();return false;">NEXT</a>
				<!-- <p class="mb-0"><small><em>*We  &amp; Junk Emails.</em></small></p> -->
			</div>
		</div>
	</div>

<?php } else if ($statusku=="selesai") {?>
	<div class="modal-on-load" data-target="#myModal3"></div>

	<!-- Modal -->
	<div class="modal1 mfp-hide subscribe-widget" id="myModal3">
		<div class="block dark mx-auto" style="background: url('images/modals/green.jpg') no-repeat; background-size: cover; max-width: 700px;" data-height-xl="400">
			<div style="padding: 50px;">
				<div class="heading-block border-bottom-0 bottommargin-sm" style="max-width:500px;">
					<h3><strong>Thank You for order</strong>  </h3>
					<span>please procceed to any of our sales person to </span>
					<span>decide price & delivery date before proceeding to cashier</span>

				</div>
				<div class="widget-subscribe-form-result"></div>
					<a href="#"  class="button button-rounded button-border button-light ml-0" onClick="$.magnificPopup.close();return false;">NEXT</a>
				<!-- <p class="mb-0"><small><em>*We  &amp; Junk Emails.</em></small></p> -->
			</div>
		</div>
	</div>
<?php } else if ($statusku=="indent") { ?>
	<div class="modal-on-load" data-target="#myModal4"></div>

	<!-- Modal -->
	<div class="modal1 mfp-hide subscribe-widget" id="myModal4">
		<div class="block dark mx-auto" style="background: url('images/modals/green.jpg') no-repeat; background-size: cover; max-width: 700px;" data-height-xl="400">
			<div style="padding: 50px;">
				<div class="heading-block border-bottom-0 bottommargin-sm" style="max-width:500px;">
					<h3><strong>Your order is Indent.</strong>  </h3>
					<span>We will contact you after your indent item is available</span>
					<span>Click Next button to continue shopping</span>

				</div>
			<?php } ?>
				<div class="widget-subscribe-form-result"></div>
					<a href="#"  class="button button-rounded button-border button-light ml-0" onClick="$.magnificPopup.close();return false;">NEXT</a>
				<!-- <p class="mb-0"><small><em>*We  &amp; Junk Emails.</em></small></p> -->
			</div>
		</div>
<div id="produkoke"></div>
	</div>


<div class="container mt-0">

	<h2>PRODUCTS</h2>
	<form action="index-shop.php" method="get">
		<input type="text" name="nama" placeholder="Product type Search">
		<input type="text" name="merek" placeholder="Brand Search">
		<input type="text" placeholder="Size search">

		<input type="submit" value="cari"></form>
	<SPAN>SEARCH RESULT:
		<?php
		//$nama1=$_GET['grup'];
		if ($nama1=="")
		{
			echo "ALL";
		}else {
			echo $nama1;
		}

		?>

	</SPAN>
						<ul class="tab-nav clearfix">
							<?php
							$totu=0;
							$userku=$_SESSION["username"];
							$sqluku = "SELECT * FROM fav where user='$userku'";
								$queryuku = mysqli_query($conn, $sqluku);
									 while($amkuuku = mysqli_fetch_array($queryuku)){
										 $totu=$totu+1;
									 }
										 	?>

							<?php
							$totu1=0;
							$userku1=$_SESSION["username"];
							$sqluku1 = "SELECT * FROM jual where user_id='$userku1'";
								$queryuku1 = mysqli_query($conn, $sqluku1);
									 while($amkuuku1 = mysqli_fetch_array($queryuku1)){
										 $totu1=$totu1+1;
									 }
										 	?>
							<!-- <li><a href="#tabs-14">My Ready Order <span class="badge badge-pill badge-info"><?php echo $totu1;?></span></a></li> -->

							<?php
							$totu1=0;
							$userku1=$_SESSION["username"];
							$sqluku1 = "SELECT * FROM ijual where user_id='$userku1'";
								$queryuku1 = mysqli_query($conn, $sqluku1);
									 while($amkuuku1 = mysqli_fetch_array($queryuku1)){
										 $totu1=$totu1+1;
									 }
											?>
							<!-- <li><a href="#tabs-15">My Indent Order <span class="badge badge-pill badge-info"><?php echo $totu1;?></span></a></li> -->


						</ul>



								<div class="shop row gutter-30">
									<?php

									//$grup=$_GET['grup'];

											$batas   = 42;
									        //$halaman = $_GET['halaman'];
									            if(empty($halaman)){
									                $posisi  = 0;
									                $halaman = 1;
									            }
									            else{
									                $posisi  = ($halaman-1) * $batas;
									            }

									        $no = $posisi+1;

													if(isset($_GET["nama"])){
														$carip = $_GET["nama"];
														$sql11 = "SELECT * from master_stok where kodetipe like '%".$carip."%'";
													}


													/*else if ($grup<>""){
														$sql11 = "SELECT * FROM master_stok where grupname='$grup' limit $posisi,$batas";
													}*/

													else
													{
														$sql11 = "SELECT * FROM master_stok where kodemerk='BV' limit $posisi,$batas";

													}

									// $sql11 = "SELECT * FROM master_stok where kodemerk='BV' limit $posisi,$batas";
									$query11 = mysqli_query($conn, $sql11);
											 while($amku = mysqli_fetch_array($query11)){
												 $kodetipe=$amku['kodetipe'];
												 $kodetjs=$amku['kode_stok'];
												 $kodemerk=$amku['kodemerk'];
												 $grup=$amku['grupname'];
												 $gam=$amku['gam1'];

												 ?>


												 <?php
												 $sql1 = "SELECT * FROM master_merk where kode='$kodemerk'";
															$query1 = mysqli_query($conn, $sql1);
															while($amku1 = mysqli_fetch_array($query1)){
																$namasup=strtoupper($amku1['nama']);
										 } ?>


									<div class="product col-lg-2 col-md-4 col-sm-6 col-12" id="produk">

										<div class="grid-inner">
											<a href="include/ajax/shop-item.php?kode=<?php echo $kodetjs; ?>" data-lightbox="ajax"><img src="img/gambar/<?php echo $kodetipe;?>.jpg" onerror="this.onerror=null;this.src='default-image.png';"></a>
											<?php
											$sql2 = "SELECT * FROM master_price where kode='$kodetjs'";
													 $query2 = mysqli_query($conn, $sql2);
													 while($amku2 = mysqli_fetch_array($query2)){
														 $bot=$amku2['dis_showroom'];
														 $dis1=$amku['dis_distribusi'];
														 $pl=$amku2['pl'];
														 $pls=$amku2['pls'];
														 $dp=$amku2['disprice'];
														 $bp=$amku2['bp'];
														 $disprice=$amku2['disprice'];
														 $disproject=$amku2['disproject'];
														 $bot=$amku2['bot'];
														 $cogs=$amku2['cogs'];

														 $retail=$amku2['retail'];
														  $retails=$amku2['retails'];
															$retailm=$amku2['retailm'];
														 $diskon=(($pl-$bot)/$pl)*100;

														 $a=$a+1;
													 }

													 ?>
													 <?php
													 $jum=0;
													 $sqlss = "SELECT * FROM master_shading where kode_stok='$kodetjs'";
													 $queryss = mysqli_query($conn, $sqlss);
													  while($amkuss = mysqli_fetch_array($queryss)){
													 	$jum=$jum+$amkuss["jum"];
													  }
													  ?>

											<div class="product-desc">
												<a href="include/ajax/shop-item.php?kode=<?php echo $kodetjs; ?>"  data-lightbox="ajax" class="btn btn-light btn-sm mt-5 ml-3 mr-1"><i class="fa fa-shopping-basket"></i></a>
												<?php
												$ada=0;
												$unku1=$_SESSION["username"];
												$sqlku1 = "SELECT * FROM fav where kode='$kodetjs' and user='$unku1'";
												$queryku1 = mysqli_query($conn, $sqlku1);
												 while($amku1 = mysqli_fetch_array($queryku1)){
													$ada=$ada+1;
												 }
												 if ($ada==1)
												 {
												 ?>
												 <a href="fav.php?aksi=del1&kode=<?php echo $kodetjs; ?>" class="btn btn-warning btn-sm mt-5 ml-2 mr-1"><i class="icon-thumbs-up"></i></a>
											 <?php } else { ?>

													<a href="fav.php?aksi=add&kode=<?php echo $kodetjs; ?>" class="btn btn-light btn-sm mt-5 ml-2 mr-1"><i class="icon-thumbs-up"></i></a>
												<?php } ?>
												<a href="include/ajax/shop-item.php?kode=<?php echo $kodetjs; ?>" class="btn btn-sm btn-light mt-5 ml-2 mr-1" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
												<hr>
												<div class="product-title">	<a href="include/ajax/shop-item.php?kode=<?php echo $kodetjs; ?>" data-lightbox="ajax"><h3><?php echo $kodetipe; ?></h3></a></div>
												<div class="product-merk text-muted"><?php echo $namasup; ?></div>
												<div class="product-merk text-muted"><?php echo $grup; ?></div>

												<?php
												$user=$_SESSION["username"];

												$sqlku11 = "SELECT * FROM login where email='$user'";
												$queryku11 = mysqli_query($conn, $sqlku11);
												 while($amku11 = mysqli_fetch_array($queryku11)){
													 $divisiku=$amku11['divisi2'];
													 $role=$amku11['role'];

												 }
												 if (($divisiku=="PTA LOW") and ($role=="admin"))
												 {
												?>
												Store Price
												<div class="product-price text-muted"><?php echo rupiah($pls); ?></div>
												<hr>
												Discount Limit
												<div class="product-price text-muted"><?php echo rupiah($retail); ?></div>
											<?php }
											else if (($divisiku=="PTA LOW") and ($role=="supervisor"))
											{
										 ?>
										 Store Price
										 <div class="product-price text-muted"><?php echo rupiah($pls); ?></div>
										 <hr>
										 Discount Limit
										 <div class="product-price text-muted"><?php echo rupiah($retails); ?></div>
									 <?php }
									 else if (($divisiku=="PTA LOW") and ($role=="manager"))
									 {
									?>
									Store Price
									<div class="product-price text-muted"><?php echo rupiah($pls); ?></div>
									<hr>
									Discount Limit
									<div class="product-price text-muted"><?php echo rupiah($retailm); ?></div>
								<?php }
											else if (($divisiku=="PTA LOW") and ($role=="director")) {?>
												Store Price
												<div class="product-price text-muted"><?php echo rupiah($pls); ?></div>
												<hr>
												Discount Limit
												<div class="product-price text-muted"><?php echo rupiah($disproject); ?></div>
												<hr>
												Bottom Price
												<div class="product-price text-muted"><?php echo rupiah($bot); ?></div>
												<hr>
												Purchase Price
												<div class="product-price text-muted"><?php echo rupiah($cogs); ?></div>
											<?php } else {?>
												<div class="product-price text-muted"><?php echo rupiah($pls); ?></div>
												<?php
											}
												?>
												<?php
												if($jum==0)
												{
												?>

												<div class="product-price"><span class="badge badge-danger">Indent Stock</span></div>
												<?php
												}


												else if (($jum>0) and ($jum<5)) { ?>

													<div class="product-price">	<span class="badge badge-warning">Limited Stock</span></div>
												<?php }
												else if ($jum>18) { ?>
											<div class="product-price">	<span class="badge badge-info">Ready Stock </span></div>
												<?php }
												else if($jum==0) {
												?>

												<div class="product-price"><span class="badge badge-danger">Indent Stock</span></div>
												<?php
												}


												else if (($jum>0) and ($jum<5)) { ?>

													<div class="product-price"><span class="badge  badge-warning">Limited Stock </span></div>
												<?php }

												else if ($jum>5) { ?>
												<div class="product-price"><span class="badge  badge-info">Ready Stock</span></div>
												<?php }?>
												<hr>
												<!-- <div class="product-merk text-muted"><button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#myModal<?php echo $kodetjs; ?>">Add to compare</button></div> -->

												<?php
												QRCode::png("http://smartmarbleandbath.com/index-shop.php?kodetipe='$kodetjs'",$kodetjs.".png","L",1,1);

												?>
												<img src="<?php echo $kodetjs;?>.png" width='50' height='50'/>
											</div>
										</div>
									</div>

<?php  $no++; } ?>
								</div>
							<?php
							$query20     = mysqli_query($conn,"SELECT * from master_stok where kodemerk='BV'");
							$jmldata    = mysqli_num_rows($query20);
							$jmlhalaman = ceil($jmldata/$batas);
							?>
							<div class="text-center">
									<ul class="pagination">
											<?php
											for($i=1;$i<=$jmlhalaman;$i++) {
													if ($i != $halaman) {
															echo "<li class='page-item'><a class='page-link' href='index-shop.php?halaman=$i#produkoke'>$i</a></li>";
													} else {
															echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
													}
											}
											?>
									</ul>
							</div>




							<!-- <div class="tab-content" id="tabs-14">
* My Order report will be available after you choose your item and click <button class="btn btn-info btn-sm mb-2 ml-2 mr-2 ">Buy</button> in the Shopping Cart<i class="fa fa-shopping-basket mb-2 mr-2 ml-2"></i><br>
								<div class="shop row gutter-30">

									<table class="table table-striped">
										<tr>
											<th>
												 SO.Date
											</th>
											<th>
												 SO.No
											</th>
											<th>
												 User ID
											</th>
											<th>
												 Status Payment
											</th>
											<th>
												 Action
											</th>

											<?php
										 $useridku=$_SESSION["username"];
											$sqlinv = "SELECT * FROM jual where user_id='$useridku'";
												$queryinv = mysqli_query($conn, $sqlinv);
													 while($amkuinv = mysqli_fetch_array($queryinv)){
														 $tgl=$amkuinv['tgl'];
														 $noso=$amkuinv['noso'];
														 $userid=$amkuinv['user_id'];
														 $statusp=$amkuinv['status_payment'];

														?>
														<tr>
														<td>
															<?php echo $tgl; ?>
														</td>
														<td>
															<?php echo $noso; ?>
														</td>
														<td>
															<?php echo $userid; ?>
														</td>
														<td>
															<?php echo $statusp; ?>
														</td>

														<td>
																<a href="invlistdtl.php?no=<?php echo $noso; ?>" class="btn btn-info btn-sm">View Detail</a>
														 	  <a href="invlistdtl1.php?no=<?php echo $noso; ?>" class="btn btn-info btn-sm">Invoices</a>
														</td>
													</tr>
													<?php }?>
									</table>




								</div>

							</div> -->

<!--
							<div class="tab-content" id="tabs-15">
							* We will contact you via whatsapp once your indent order is available <br>
								<div class="shop row gutter-30">

									<table class="table table-striped">
										<tr>
											<th>
												 SO.Date
											</th>
											<th>
												 SO.No
											</th>
											<th>
												 User ID
											</th>
											<th>
												 Status Payment
											</th>
											<th>
												 Action
											</th>

											<?php
										 $useridku=$_SESSION["username"];
											$sqlinv = "SELECT * FROM ijual where user_id='$useridku'";
												$queryinv = mysqli_query($conn, $sqlinv);
													 while($amkuinv = mysqli_fetch_array($queryinv)){
														 $tgl=$amkuinv['tgl'];
														 $noso=$amkuinv['noso'];
														 $userid=$amkuinv['user_id'];
														 $statusp=$amkuinv['status_payment'];

														?>
														<tr>
														<td>
															<?php echo $tgl; ?>
														</td>
														<td>
															<?php echo $noso; ?>
														</td>
														<td>
															<?php echo $userid; ?>
														</td>
														<td>
															<?php echo $statusp; ?>
														</td>

														<td>
																<a href="invlistdtl.php?no=<?php echo $noso; ?>" class="btn btn-info btn-sm">View Detail</a>
																<a href="invlistdtl1.php?no=<?php echo $noso; ?>" class="btn btn-info btn-sm">Invoices</a>
														</td>
													</tr>
													<?php }?>
									</table>




								</div>

							</div> -->

</div>
					<div class="clear bottommargin-sm"></div>
					<div class="container">
					<div class="row justify-content-center col-mb-50 mb-0">
						<div class="col-sm-6 col-lg-4">
							<div class="fancy-title title-border">
								<h4>About Us</h4>
							</div>
							<p><strong>Smart Marble & Bath(SMB)</strong> was founded in 2018, in Jakarta, the business center of Indonesia. SMB offers top quality line of tile, bathroom, fitting, and sanitary products. Our Showroom located in Jagat Building, Jalan Tomang Raya 28-30, West Jakarta 11430.</p>
						</div>

						<div class="col-sm-6 col-lg-4 subscribe-widget">
							<div class="fancy-title title-border">
								<h4>Subscribe for Offers</h4>
							</div>
							<p>Subscribe to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</p>
							<div class="widget-subscribe-form-result"></div>
							<form id="widget-subscribe-form2" action="include/subscribe.php" method="post" class="mb-0">
								<div class="input-group mx-auto">
									<div class="input-group-prepend">
											<div class="input-group-text"><i class="icon-email2"></i></div>
										</div>
									<input type="email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
									<div class="input-group-append">
										<button class="btn btn-secondary" type="submit">Subscribe</button>
									</div>
								</div>
							</form>
						</div>

						<div class="col-sm-6 col-lg-4">
							<div class="fancy-title title-border">
								<h4>Connect with Us</h4>
							</div>

							<a href="#" class="social-icon si-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon si-instagram" data-toggle="tooltip" data-placement="top" title="Instagram">
								<i class="icon-instagram"></i>
								<i class="icon-instagram"></i>
							</a>

							<a href="#" class="social-icon si-gplus" data-toggle="tooltip" data-placement="top" title="Google+">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon si-wikipedia" data-toggle="tooltip" data-placement="top" title="Wikipedia">
								<i class="icon-wikipedia"></i>
								<i class="icon-wikipedia"></i>
							</a>

							<a href="#" class="social-icon si-foursquare" data-toggle="tooltip" data-placement="top" title="FourSquare">
								<i class="icon-foursquare"></i>
								<i class="icon-foursquare"></i>
							</a>

							<a href="#" class="social-icon si-call" data-toggle="tooltip" data-placement="top" title="Call">
								<i class="icon-call"></i>
								<i class="icon-call"></i>
							</a>


						</div>
					</div>
				</div>

					<div class="clear"></div>

					<div class="fancy-title title-border title-center topmargin-sm">
						<h4>Our Brands</h4>
					</div>

					<ul class="clients-grid grid-2 grid-sm-3 grid-md-6 mb-0">
						<li class="grid-item"><a href="#"><img src="images/clients/logo/kohler.jpg" alt="Clients"></a></li>
						<li class="grid-item"><a href="#"><img src="images/clients/logo/fiandre.png" alt="Clients"></a></li>
						<li class="grid-item"><a href="#"><img src="images/clients/logo/tre.png" alt="Clients"></a></li>
						<li class="grid-item"><a href="#"><img src="images/clients/logo/sm.png" alt="Clients"></a></li>
						<li class="grid-item"><a href="#"><img src="images/clients/logo/bra.png" alt="Clients"></a></li>
						<li class="grid-item"><a href="#"><img src="images/clients/logo/bri.png" alt="Clients"></a></li>

					</ul>

				</div>

				<div class="section mb-0">
					<div class="container">

						<div class="row col-mb-50">
							<div class="col-sm-6 col-lg-2">
								<div class="feature-box fbox-plain fbox-dark fbox-sm">
									<div class="fbox-icon">
										<i class="icon-thumbs-up2"></i>
									</div>
									<div class="fbox-content">
										<h3>100% Original</h3>
										<p class="mt-0">We guarantee you the sale of Original Brands.</p>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-lg-2">
								<div class="feature-box fbox-plain fbox-dark fbox-sm">
									<div class="fbox-icon">
										<i class="icon-credit-cards"></i>
									</div>
									<div class="fbox-content">
										<h3>Payment Options</h3>
										<p class="mt-0">We accept Bank Transfer, Debit, Visa, and MasterCard.</p>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-lg-2">
								<div class="feature-box fbox-plain fbox-dark fbox-sm">
									<div class="fbox-icon">
										<i class="icon-truck2"></i>
									</div>
									<div class="fbox-content">
										<h3>Free Shipping</h3>
										<p class="mt-0">Free Delivery for Jakarta & Surabaya</p>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-lg-2">
								<div class="feature-box fbox-plain fbox-dark fbox-sm">
									<div class="fbox-icon">
										<i class="icon-undo"></i>
									</div>
									<div class="fbox-content">
										<h3>14-Days Returns</h3>
										<p class="mt-0">Within 14 days in same condition as received</p>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-lg-2">
								<div class="feature-box fbox-plain fbox-dark fbox-sm">
									<div class="fbox-icon">
										<i class="icon-home"></i>
									</div>
									<div class="fbox-content">
										<h3>Warranty</h3>
										<p class="mt-0">3 years for Sanitary ware & 2 years for tiles</p>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-lg-2">
								<div class="feature-box fbox-plain fbox-dark fbox-sm">
									<div class="fbox-icon">
										<i class="icon-upload"></i>
									</div>
									<div class="fbox-content">
										<h3>Pre & Post Sales Services</h3>
										<p class="mt-0">Design Consultancy, Installation, Supervision, Maintenance</p>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="section border-top-0 border-bottom-0 mb-0 p-0 bg-transparent footer-stick">
					<div class="container clearfix">

						<div class="row col-mb-50">
							<div class="col-md-6 d-none d-md-flex align-self-end">
								<img src="images/services/4.jpg" alt="Image" class="mb-0">
							</div>

							<div class="col-md-6 mb-5 subscribe-widget">
								<div class="heading-block">
									<h3><strong>GET 5% OFF*</strong></h3>
									<span>Our App scales beautifully to different Devices.</span>
								</div>

								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet cumque, perferendis accusamus porro illo exercitationem molestias.</p>

								<div class="widget-subscribe-form-result"></div>
								<form id="widget-subscribe-form3" action="include/subscribe.php" method="post" class="mb-0">
									<div class="input-group" style="max-width:400px;">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="icon-email2"></i></div>
										</div>
										<input type="email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
										<div class="input-group-append">
											<button class="btn btn-danger" type="submit">Subscribe Now</button>
										</div>
									</div>
								</form>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<!-- #footer end -->
<?php include("footer1.php"); ?>
	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->

	<script src="js/jquery.js"></script>
	<script>
	$(".toggle-password").click(function() {

	$(this).toggleClass("fa-eye fa-eye-slash");
	var input = $($(this).attr("toggle"));
	if (input.attr("type") == "password") {
	input.attr("type", "text");
	} else {
	input.attr("type", "password");
	}
	});
	</script>
	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>

	<!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
	<script src="include/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="include/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

	<script src="include/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
	<script src="include/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>

	<script>

		var tpj=jQuery;
		tpj.noConflict();
		let $ = jQuery.noConflict();

		tpj(document).ready(function() {

			var apiRevoSlider = tpj('#rev_slider_ishop').show().revolution(
			{
				sliderType:"standard",
				jsFileLocation:"include/rs-plugin/js/",
				sliderLayout:"fullwidth",
				dottedOverlay:"none",
				delay:9000,
				navigation: {},
				responsiveLevels:[1200,992,768,480,320],
				gridwidth:1140,
				gridheight:500,
				lazyType:"none",
				shadow:0,
				spinner:"off",
				autoHeight:"off",
				disableProgressBar:"on",
				hideThumbsOnMobile:"off",
				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				debugMode:false,
				fallbacks: {
					simplifyAll:"off",
					disableFocusListener:false,
				},
				navigation: {
					keyboardNavigation:"off",
					keyboard_direction: "horizontal",
					mouseScrollNavigation:"off",
					onHoverStop:"off",
					touch:{
						touchenabled:"on",
						swipe_threshold: 75,
						swipe_min_touches: 1,
						swipe_direction: "horizontal",
						drag_block_vertical: false
					},
					arrows: {
						style: "ares",
						enable: true,
						hide_onmobile: false,
						hide_onleave: false,
						tmp: '<div class="tp-title-wrap">	<span class="tp-arr-titleholder">{{title}}</span> </div>',
						left: {
							h_align: "left",
							v_align: "center",
							h_offset: 10,
							v_offset: 0
						},
						right: {
							h_align: "right",
							v_align: "center",
							h_offset: 10,
							v_offset: 0
						}
					}
				}
			});

			apiRevoSlider.on("revolution.slide.onloaded",function (e) {
				SEMICOLON.slider.sliderDimensions();
			});

		}); //ready

	</script>
	<script>
	$(document).ready(function () {
					var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
					if (window.location.hash && isChrome) {
							setTimeout(function () {
									var hash = window.location.hash;
									window.location.hash = "";
									window.location.hash = hash;
							}, 300);
					}
			});
	</script>

</body>
</html>
