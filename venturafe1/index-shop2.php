<!DOCTYPE html>
<?php
session_start();
include("inc/config.php"); //include koneksi database

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


	<link rel="stylesheet" href="css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="include/rs-plugin/css/settings.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="include/rs-plugin/css/layers.css">
	<link rel="stylesheet" type="text/css" href="include/rs-plugin/css/navigation.css">

	<!-- Document Title
	============================================= -->
	<title>Home - Shop | Canvas</title>

	<style>
	.horizontal-scrollable > .row {
					overflow-x: auto;
					white-space: nowrap;
			}
	.container2 {
  position: relative;
  text-align: center;
  color: white;
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

		$hasil_rupiah = "Rp ". number_format($angka,2,',','.');
		return $hasil_rupiah;

	}
	?>
	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">
		<div id="top-bar">
			<div class="container clearfix">

				<div class="row justify-content-between">
					<div class="col-12 col-md-auto">
						<p class="mb-0"><strong>Call:</strong> (6231) 532 45 05 | <strong>Email:</strong> info@smartmarbleandbath</p>
					</div>

					<div class="col-12 col-md-auto">

						<!-- Top Links
						============================================= -->
						<div class="top-links on-click">
							<ul class="top-links-container">
								<li class="top-links-item"><a href="#">USD</a>
									<ul class="top-links-sub-menu">
										<li class="top-links-item"><a href="#">EUR</a></li>
										<li class="top-links-item"><a href="#">AUD</a></li>
										<li class="top-links-item"><a href="#">GBP</a></li>
									</ul>
								</li>
								<li class="top-links-item"><a href="#">EN</a>
									<ul class="top-links-sub-menu">
										<li class="top-links-item"><a href="#"><img src="images/icons/flags/french.png" alt="French"> FR</a></li>
										<li class="top-links-item"><a href="#"><img src="images/icons/flags/italian.png" alt="Italian"> IT</a></li>
										<li class="top-links-item"><a href="#"><img src="images/icons/flags/german.png" alt="German"> DE</a></li>
									</ul>
								</li>
								<li class="top-links-item"><a href="#">Login</a>
									<div class="top-links-section">
										<form id="top-login" autocomplete="off">
											<div class="form-group">
												<label>Username</label>
												<input type="email" class="form-control" placeholder="Email address">
											</div>
											<div class="form-group">
												<label>Password</label>
												<input type="password" class="form-control" placeholder="Password" required="">
											</div>
											<div class="form-group form-check">
												<input class="form-check-input" type="checkbox" value="" id="top-login-checkbox">
												<label class="form-check-label" for="top-login-checkbox">Remember Me</label>
											</div>
											<button class="btn btn-danger btn-block" type="submit">Sign in</button>
										</form>
									</div>
								</li>
							</ul>
						</div><!-- .top-links end -->

					</div>
				</div>

			</div>
		</div>
		<!-- Top Bar
		============================================= -->


		<!-- Header
		============================================= -->
		<header id="header">
			<div id="header-wrap">
				<div class="container">
					<div class="header-row">

						<!-- Logo
						============================================= -->
						<div id="logo">
							<img src="img/logo/smblogo.png"></a>

						</div><!-- #logo end -->

						<div class="header-misc">

							<!-- Top Search
							============================================= -->
							<div id="top-search" class="header-misc-icon">
								<a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
							</div><!-- #top-search end -->

							<!-- Top Cart
							============================================= -->
							<div id="top-cart" class="header-misc-icon d-none d-sm-block">
								<a href="#" id="top-cart-trigger"><i class="icon-line-bag"></i><span class="top-cart-number">5</span></a>
								<div class="top-cart-content">
									<div class="top-cart-title">
										<h4>Shopping Cart</h4>
									</div>
									<div class="top-cart-items">
										<div class="top-cart-item">
											<div class="top-cart-item-image">
												<a href="#"><img src="images/shop/small/1.jpg" alt="Blue Round-Neck Tshirt" /></a>
											</div>
											<div class="top-cart-item-desc">
												<div class="top-cart-item-desc-title">
													<a href="#">Blue Round-Neck Tshirt with a Button</a>
													<span class="top-cart-item-price d-block">$19.99</span>
												</div>
												<div class="top-cart-item-quantity">x 2</div>
											</div>
										</div>
										<div class="top-cart-item">
											<div class="top-cart-item-image">
												<a href="#"><img src="images/shop/small/6.jpg" alt="Light Blue Denim Dress" /></a>
											</div>
											<div class="top-cart-item-desc">
												<div class="top-cart-item-desc-title">
													<a href="#">Light Blue Denim Dress</a>
													<span class="top-cart-item-price d-block">$24.99</span>
												</div>
												<div class="top-cart-item-quantity">x 3</div>
											</div>
										</div>
									</div>
									<div class="top-cart-action">
										<span class="top-checkout-price">$114.95</span>
										<a href="#" class="button button-3d button-small m-0">View Cart</a>
									</div>
								</div>
							</div><!-- #top-cart end -->

						</div>

						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu">

							<ul class="menu-container">
								<li class="menu-item current"><a class="menu-link" href="#"><div>Home</div></a>
									<ul class="sub-menu-container">
										<li class="menu-item"><a class="menu-link" href="index-corporate.html"><div>About Us</div></a>

										</li>
										<li class="menu-item"><a class="menu-link" href="index-portfolio.html"><div>Services</div></a>

										</li>
										<li class="menu-item"><a class="menu-link" href="index-blog.html"><div>News/Event</div></a>

										</li>
										<li class="menu-item"><a class="menu-link" href="index-shop.html"><div>Contact Us</div></a>

										</li>


										</ul>
								</li>
								<!-- Mega Menu
								============================================= -->
								<li class="menu-item mega-menu"><a class="menu-link" href="#"><div>TILE</div></a>
									<div class="mega-menu-content mega-menu-style-2">
										<div class="container">
											<div class="row">
												<ul class="sub-menu-container mega-menu-column col-lg-3">
													<li class="menu-item mega-menu-title"><a class="menu-link" href="#"><div>Footwear</div></a>
														<ul class="sub-menu-container">
															<li class="menu-item"><a class="menu-link" href="#"><div>Casual Shoes</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Formal Shoes</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Sports shoes</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Flip Flops</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Slippers</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Sports Sandals</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Party Shoes</div></a></li>
														</ul>
													</li>
												</ul>
												<ul class="sub-menu-container mega-menu-column col-lg-3">
													<li class="menu-item mega-menu-title"><a class="menu-link" href="#"><div>SANITARY</div></a>
														<ul class="sub-menu-container">
															<li class="menu-item"><a class="menu-link" href="#"><div>Casual Shirts</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>T-Shirts</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Collared Tees</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Pants / Trousers</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Ethnic Wear</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Jeans</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Sweamwear</div></a></li>
														</ul>
													</li>
												</ul>
												<ul class="sub-menu-container mega-menu-column col-lg-3">
													<li class="menu-item mega-menu-title"><a class="menu-link" href="#"><div>FITTING</div></a>
														<ul class="sub-menu-container">
															<li class="menu-item"><a class="menu-link" href="#"><div>Bags &amp; Backpacks</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Watches</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Sunglasses</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Wallets</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Caps &amp; Hats</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Jewellery</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Belts, Ties</div></a></li>
														</ul>
													</li>
												</ul>
												<ul class="sub-menu-container mega-menu-column col-lg-3">
													<li class="menu-item mega-menu-title"><a class="menu-link" href="#"><div>OTHERS</div></a>
														<ul class="sub-menu-container">
															<li class="menu-item"><a class="menu-link" href="#"><div>T-Shirts</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Formal Shoes</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Accessories</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Watches</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Perfumes</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Belts, Ties</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Formal Shirts</div></a></li>
														</ul>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</li><!-- .mega-menu end -->
								<li class="menu-item mega-menu mega-menu-small"><a class="menu-link" href="#"><div>SANITARY</div></a>
									<div class="mega-menu-content mega-menu-style-2">
										<div class="container">
											<div class="row">
												<ul class="sub-menu-container mega-menu-column col-lg-6">
													<li class="menu-item mega-menu-title"><a class="menu-link" href="#"><div>Footwear</div></a>
														<ul class="sub-menu-container">
															<li class="menu-item"><a class="menu-link" href="#"><div>Casual Shoes</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Formal Shoes</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Sports shoes</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Flip Flops</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Slippers</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Sports Sandals</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Party Shoes</div></a></li>
														</ul>
													</li>
												</ul>
												<ul class="sub-menu-container mega-menu-column col-lg-6">
													<li class="menu-item mega-menu-title"><a class="menu-link" href="#"><div>Clothing</div></a>
														<ul class="sub-menu-container">
															<li class="menu-item"><a class="menu-link" href="#"><div>Casual Shirts</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>T-Shirts</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Collared Tees</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Pants / Trousers</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Ethnic Wear</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Jeans</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Sweamwear</div></a></li>
														</ul>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</li><!-- .mega-menu end -->
								<li class="menu-item"><a class="menu-link" href="#"><div>FITTING</div><span>Awesome Works</span></a></li>
								<li class="menu-item"><a class="menu-link" href="#"><div>OTHERS</div><span>Awesome Works</span></a></li>
								<!-- <li class="menu-item"><a class="menu-link" href="#"><div>Blog</div><span>Latest News</span></a></li>
								<li class="menu-item"><a class="menu-link" href="#"><div>Videos</div><span>Latest News</span></a></li>
								<li class="menu-item"><a class="menu-link" href="#"><div>Contact</div><span>Get In Touch</span></a></li> -->
							</ul>

						</nav><!-- #primary-menu end -->

						<form class="top-search-form" action="search.html" method="get">
							<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
						</form>

					</div>
				</div>
			</div>
		</header>


			<div class="container2">
			<img src="img/bg/koh5.jpg" alt="Cloudy Sky">

				<!-- <h1>100% Full Width Layout</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Pages</a></li>
					<li class="breadcrumb-item active" aria-current="page">100% Full Width Layout</li>
				</ol> -->
				<!-- <div class="centered">Dream Bathroom & Kitchen Promo</div> -->
			</div>





		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">

					<div class="row">
						<div class="col-lg-8">

							<div class="row">
								<div class="col-lg-6 pr-0" style="margin-bottom: 15px;">
									<a href="#"><img src="img/tre.jpg" alt="Image"></a>
								</div>

								<div class="col-lg-6 pr-0" style="margin-bottom: 15px;">
									<a href="#"><img src="img/banner/9.jpg" alt="Image"></a>
								</div>

								<div class="w-100"></div>

								<div class="col-lg-12 pr-0">
									<a href="#"><img src="img/fi.jpg" alt="Image"></a>
								</div>
							</div>

						</div>

						<div class="col-lg-4">
							<a href="#"><img src="img/10.jpg" height="550"alt="Image"></a>
						</div>
					</div>

					<div class="clear"></div>

					<div class="tabs topmargin-lg clearfix" id="tab-3">

						<ul class="tab-nav clearfix">
							<li><a href="#tabs-9">Our Products</a></li>
							<li><a href="#tabs-10">Best sellers</a></li>
							<li><a href="#tabs-11">You may like</a></li>
						</ul>

						<div class="tab-container">

							<div class="tab-content" id="tabs-9">

								<div class="shop row gutter-30">
									<?php
									$sql = "SELECT * FROM master_stok limit 12";
										$query = mysqli_query($conn, $sql);
											 while($amku = mysqli_fetch_array($query)){
												 $kodetipe=$amku['kodetipe'];
												 $kodetjs=$amku['kode_stok'];
												 $kodemerk=$amku['kodemerk'];
												 $grup=$amku['grupname'];
												 ?>
												 <?php
												 $sql1 = "SELECT * FROM master_merk where kode='$kodemerk'";
															$query1 = mysqli_query($conn, $sql1);
															while($amku1 = mysqli_fetch_array($query1)){
																$namasup=strtoupper($amku1['nama']);
										 }
										 ?>
									<div class="product col-lg-2 col-md-4 col-sm-6 col-12">

										<div class="grid-inner">

											<div class="product-image">
												<a href="#"><img src="img/gambar/<?php echo $kodetipe;?>.jpg" alt="Checked Short Dress"></a>
												<a href="#"><img src="img/gambar/<?php echo $kodetipe;?>.jpg" alt="Checked Short Dress"></a>
												<!-- <a href="#"><img src="images/shop/dress/1-1.jpg" alt="Checked Short Dress"></a> -->
												<!-- <div class="sale-flash badge badge-success p-1">50% Off*</div> -->
												<div class="bg-overlay">
													<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
														<!-- <a href="#" class="btn btn-dark btn-sm mr-2"><i class="icon-shopping-basket"></i></a>
														<a href="include/ajax/shop-item.php?kode=<?php echo $kodetjs; ?>" class="btn btn-sm btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a> -->
													</div>
													<div class="bg-overlay-bg bg-transparent"></div>
												</div>
											</div>
											<?php
											$sql2 = "SELECT * FROM master_price where kode='$kodetjs'";
													 $query2 = mysqli_query($conn, $sql2);
													 while($amku2 = mysqli_fetch_array($query2)){
														 $bot=$amku2['dis_showroom'];
														 $dis1=$amku['dis_distribusi'];
														 $pl=$amku2['pl'];
														 $dp=$amku2['disprice'];
														 $bp=$amku2['bp'];
														 $disprice=$amku2['disprice'];
														 // $dd1=$disprice.Fixed(0);
														 $diskon=(($pl-$bot)/$pl)*100;

														 // $diskon=$diskon1.toFixed(0);
														 // g = e.toFixed(0);
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
												<a href="proses-cart3.php?kode=<?php echo $kodetjs; ?>" class="btn btn-light btn-sm mr-1"><i class="icon-shopping-basket"></i></a>
													<a href="#" class="btn btn-light btn-sm mr-1"><i class="icon-thumbs-up"></i></a>
												<a href="include/ajax/shop-item.php?kode=<?php echo $kodetjs; ?>" class="btn btn-sm btn-light mr-1" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
												<hr>
												<div class="product-title1"><h3><?php echo $kodetjs; ?></h3></div>
												<div class="product-merk text-muted"><?php echo $namasup; ?></div>
												<div class="product-merk text-muted"><?php echo $grup; ?></div>
												<div class="product-price text-muted"><?php echo rupiah($bot); ?></div>
												<?php
												if($jum==0)
												{
												?>

												<div class="product-price"><span class="badge badge-danger">Indent Stock</span></div>
												<?php
												}


												else if (($jum>0) and ($jum<18)) { ?>

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


												else if (($jum>0) and ($jum<18)) { ?>

													<div class="product-price"><span class="badge  badge-warning">Limited Stock </span></div>
												<?php }

												else if ($jum>18) { ?>
												<div class="product-price"><span class="badge  badge-info">Ready Stock</span></div>
												<?php }?>
												<hr>
												<div class="product-merk text-muted"><button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#myModal<?php echo $kodetjs; ?>">Add to compare</button></div>
												<div id="myModal<?php echo $kodetjs; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Add To Compare</h4>
      </div>
      <div class="modal-body" >

				<?php
				$idku=$kodetjs;
                      $sqlid = "SELECT * FROM master_stok where kode_stok='$idku'";
                           $queryid = mysqli_query($conn, $sqlid);
                           while($amkuid = mysqli_fetch_array($queryid)){
														 $kodeku=$amkuid["kode_stok"];
														 $tipeku=$amkuid["kodetipe"];

													 }
                      ?>

			<img src="img/gambar/<?php echo $kodetipe;?>.jpg" width="100" height="100"><br>
			<?php
			$idku=$kodetjs;
										$sqlid1 = "SELECT * FROM master_tipe where kode='$tipeku'";
												 $queryid1 = mysqli_query($conn, $sqlid1);
												 while($amkuid1 = mysqli_fetch_array($queryid1)){
													 $warnaku=$amkuid1["color"];
											}
										?>

										<?php
										$sqlid2 = "SELECT * FROM master_tipe where color='$warnaku' LIMIT 5";
												$queryid2 = mysqli_query($conn, $sqlid2);
												while($amkuid2 = mysqli_fetch_array($queryid2)){
													$kode=$amkuid2["kode"];
													$warnaku1=$amkuid2["color"];
													$panjang=$amkuid2["panjang"];
													$lebar=$amkuid2["lebar"];
													$surface=$amkuid2["surface"];
													$pattern=$amkuid2["pattern"];

													?>
														<img src="img/gambar/<?php echo $kode;?>.jpg" width="50px" height="50px">

												}

			<!-- <div class="container-fluid"  style="font-size:10px;">
			<div class="row" >
				<div class="col-sm-1">
					Picture
				</div>
				<div class="col-sm-2">
					Product Code
				</div>
				<div class="col-sm-2">
					Color
				</div>
				<div class="col-sm-2">
					Dimension
				</div>
				<div class="col-sm-2">
					Surface
				</div>
				<div class="col-sm-2">
					Pattern
				</div>


			</div>
			<?php
			$idku=$kodetjs;
										$sqlid1 = "SELECT * FROM master_tipe where kode='$tipeku'";
												 $queryid1 = mysqli_query($conn, $sqlid1);
												 while($amkuid1 = mysqli_fetch_array($queryid1)){
													 $warnaku=$amkuid1["color"];
											}
										?>

										<?php
										$sqlid2 = "SELECT * FROM master_tipe where color='$warnaku' LIMIT 5";
									 			$queryid2 = mysqli_query($conn, $sqlid2);
									 			while($amkuid2 = mysqli_fetch_array($queryid2)){
									 				$kode=$amkuid2["kode"];
													$warnaku1=$amkuid2["color"];
													$panjang=$amkuid2["panjang"];
													$lebar=$amkuid2["lebar"];
													$surface=$amkuid2["surface"];
													$pattern=$amkuid2["pattern"];

													?>

<div class="row">
		<div class="col-sm-1 border">
		<img src="img/gambar/<?php echo $kode;?>.jpg" width="50px" height="50px">
</div>
<div class="col-sm-2 border">
<?php echo $kode; ?>
</div>
<div class="col-sm-2 border">
<?php echo $warnaku1; ?>
</div>
<div class="col-sm-2 border	">
<?php echo $panjang; ?>x<?php echo $lebar; ?>
</div>
<div class="col-sm-2 border">
<?php echo $surface; ?>
</div>
<div class="col-sm-2 border">
<?php echo $pattern; ?>
</div>


</div>


<?php } ?>



      </div> -->
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

											</div>

										</div>

									</div>
<?php } ?>
<ul class="pagination pagination-inside-transparent">
	<li class="page-item"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a></li>
	<li class="page-item"><a class="page-link" href="#">1</a></li>
	<li class="page-item active"><a class="page-link" href="#">2</a></li>
	<li class="page-item"><a class="page-link" href="#">3</a></li>
	<li class="page-item"><a class="page-link" href="#">4</a></li>
	<li class="page-item"><a class="page-link" href="#">5</a></li>
	<li class="page-item"><a class="page-link" href="#">...</a></li>
	<li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul>

									<!-- <div class="product col-lg-3 col-md-4 col-sm-6 col-12">
										<div class="grid-inner">
											<div class="product-image">
												<a href="#"><img src="images/shop/pants/1-1.jpg" alt="Slim Fit Chinos"></a>
												<a href="#"><img src="images/shop/pants/1.jpg" alt="Slim Fit Chinos"></a>
												<div class="bg-overlay">
													<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
														<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
														<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
													</div>
													<div class="bg-overlay-bg bg-transparent"></div>
												</div>
											</div>
											<div class="product-desc">
												<div class="product-title"><h3><a href="#">Slim Fit Chinos</a></h3></div>
												<div class="product-price">$39.99</div>
												<div class="product-rating">
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star-half-full"></i>
													<i class="icon-star-empty"></i>
												</div>
											</div>
										</div>
									</div> -->

									<!-- <div class="product col-lg-3 col-md-4 col-sm-6 col-12">
										<div class="grid-inner">
											<div class="product-image">
												<div class="fslider" data-arrows="false">
													<div class="flexslider">
														<div class="slider-wrap">
															<div class="slide"><a href="#"><img src="images/shop/shoes/1.jpg" alt="Dark Brown Boots"></a></div>
															<div class="slide"><a href="#"><img src="images/shop/shoes/1-1.jpg" alt="Dark Brown Boots"></a></div>
															<div class="slide"><a href="#"><img src="images/shop/shoes/1-2.jpg" alt="Dark Brown Boots"></a></div>
														</div>
													</div>
												</div>
												<div class="bg-overlay">
													<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
														<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
														<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
													</div>
													<div class="bg-overlay-bg bg-transparent"></div>
												</div>
											</div>
											<div class="product-desc">
												<div class="product-title"><h3><a href="#">Dark Brown Boots</a></h3></div>
												<div class="product-price">$49</div>
												<div class="product-rating">
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star-empty"></i>
													<i class="icon-star-empty"></i>
												</div>
											</div>
										</div>
									</div> -->
<!--
									<div class="product col-lg-3 col-md-4 col-sm-6 col-12">
										<div class="grid-inner">
											<div class="product-image">
												<a href="#"><img src="images/shop/dress/2.jpg" alt="Light Blue Denim Dress"></a>
												<a href="#"><img src="images/shop/dress/2-2.jpg" alt="Light Blue Denim Dress"></a>
												<div class="bg-overlay">
													<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
														<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
														<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
													</div>
													<div class="bg-overlay-bg bg-transparent"></div>
												</div>
											</div>
											<div class="product-desc">
												<div class="product-title"><h3><a href="#">Light Blue Denim Dress</a></h3></div>
												<div class="product-price">$19.95</div>
												<div class="product-rating">
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star-empty"></i>
												</div>
											</div>
										</div>
									</div> -->

								</div>

							</div>

							<div class="tab-content" id="tabs-10">

								<div class="shop row gutter-30">
									<?php
									$sql = "SELECT * FROM master_stok where grupname='basin faucet' limit 12";
										$query = mysqli_query($conn, $sql);
											 while($amku = mysqli_fetch_array($query)){
												 $kodetipe=$amku['kodetipe'];
												 $kodetjs=$amku['kode_stok'];
												 $kodemerk=$amku['kodemerk'];
												 ?>
												 <?php
												 $sql1 = "SELECT * FROM master_merk where kode='$kodemerk'";
															$query1 = mysqli_query($conn, $sql1);
															while($amku1 = mysqli_fetch_array($query1)){
																$namasup=strtoupper($amku1['nama']);
										 }
										 ?>
									<div class="product col-lg-2 col-md-4 col-sm-6 col-12">

										<div class="grid-inner">

											<div class="product-image">
												<a href="#"><img src="img/gambar/<?php echo $kodetipe;?>.jpg" alt="Checked Short Dress"></a>
												<a href="#"><img src="img/gambar/<?php echo $kodetipe;?>.jpg" alt="Checked Short Dress"></a>
												<!-- <a href="#"><img src="images/shop/dress/1-1.jpg" alt="Checked Short Dress"></a> -->
												<!-- <div class="sale-flash badge badge-success p-1">50% Off*</div> -->
												<div class="bg-overlay">
													<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
														<a href="#" class="btn btn-dark btn-sm mr-2"><i class="icon-shopping-basket"></i></a>
														<a href="include/ajax/shop-item.php?kode=<?php echo $kodetjs; ?>" class="btn btn-sm btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
													</div>
													<div class="bg-overlay-bg bg-transparent"></div>
												</div>
											</div>
											<?php
											$sql2 = "SELECT * FROM master_price where kode='$kodetjs'";
													 $query2 = mysqli_query($conn, $sql2);
													 while($amku2 = mysqli_fetch_array($query2)){
														 $bot=$amku2['dis_showroom'];
														 $dis1=$amku['dis_distribusi'];
														 $pl=$amku2['pl'];
														 $dp=$amku2['disprice'];
														 $bp=$amku2['bp'];
														 $disprice=$amku2['disprice'];
														 // $dd1=$disprice.Fixed(0);
														 $diskon=(($pl-$bot)/$pl)*100;

														 // $diskon=$diskon1.toFixed(0);
														 // g = e.toFixed(0);
														 $a=$a+1;
													 }

													 ?>

											<div class="product-desc">
												<div class="product-title1"><h3><?php echo $kodetjs; ?></h3></div>
												<div class="product-merk text-muted"><?php echo $namasup; ?></div>
												<div class="product-price text-muted"><?php echo rupiah($bot); ?></div>

											</div>

										</div>

									</div>
<?php } ?>
<ul class="pagination pagination-inside-transparent">
	<li class="page-item"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a></li>
	<li class="page-item"><a class="page-link" href="#">1</a></li>
	<li class="page-item active"><a class="page-link" href="#">2</a></li>
	<li class="page-item"><a class="page-link" href="#">3</a></li>
	<li class="page-item"><a class="page-link" href="#">4</a></li>
	<li class="page-item"><a class="page-link" href="#">5</a></li>
	<li class="page-item"><a class="page-link" href="#">...</a></li>
	<li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul>

									<!-- <div class="product col-lg-3 col-md-4 col-sm-6 col-12">
										<div class="grid-inner">
											<div class="product-image">
												<a href="#"><img src="images/shop/pants/1-1.jpg" alt="Slim Fit Chinos"></a>
												<a href="#"><img src="images/shop/pants/1.jpg" alt="Slim Fit Chinos"></a>
												<div class="bg-overlay">
													<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
														<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
														<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
													</div>
													<div class="bg-overlay-bg bg-transparent"></div>
												</div>
											</div>
											<div class="product-desc">
												<div class="product-title"><h3><a href="#">Slim Fit Chinos</a></h3></div>
												<div class="product-price">$39.99</div>
												<div class="product-rating">
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star-half-full"></i>
													<i class="icon-star-empty"></i>
												</div>
											</div>
										</div>
									</div> -->

									<!-- <div class="product col-lg-3 col-md-4 col-sm-6 col-12">
										<div class="grid-inner">
											<div class="product-image">
												<div class="fslider" data-arrows="false">
													<div class="flexslider">
														<div class="slider-wrap">
															<div class="slide"><a href="#"><img src="images/shop/shoes/1.jpg" alt="Dark Brown Boots"></a></div>
															<div class="slide"><a href="#"><img src="images/shop/shoes/1-1.jpg" alt="Dark Brown Boots"></a></div>
															<div class="slide"><a href="#"><img src="images/shop/shoes/1-2.jpg" alt="Dark Brown Boots"></a></div>
														</div>
													</div>
												</div>
												<div class="bg-overlay">
													<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
														<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
														<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
													</div>
													<div class="bg-overlay-bg bg-transparent"></div>
												</div>
											</div>
											<div class="product-desc">
												<div class="product-title"><h3><a href="#">Dark Brown Boots</a></h3></div>
												<div class="product-price">$49</div>
												<div class="product-rating">
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star-empty"></i>
													<i class="icon-star-empty"></i>
												</div>
											</div>
										</div>
									</div> -->
<!--
									<div class="product col-lg-3 col-md-4 col-sm-6 col-12">
										<div class="grid-inner">
											<div class="product-image">
												<a href="#"><img src="images/shop/dress/2.jpg" alt="Light Blue Denim Dress"></a>
												<a href="#"><img src="images/shop/dress/2-2.jpg" alt="Light Blue Denim Dress"></a>
												<div class="bg-overlay">
													<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
														<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
														<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
													</div>
													<div class="bg-overlay-bg bg-transparent"></div>
												</div>
											</div>
											<div class="product-desc">
												<div class="product-title"><h3><a href="#">Light Blue Denim Dress</a></h3></div>
												<div class="product-price">$19.95</div>
												<div class="product-rating">
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star-empty"></i>
												</div>
											</div>
										</div>
									</div> -->

								</div>
							</div>

							<div class="tab-content" id="tabs-11">

								<div class="shop row gutter-30">

									<div class="product col-lg-3 col-md-4 col-sm-6 col-12">
										<div class="grid-inner">
											<div class="product-image">
												<div class="fslider" data-arrows="false">
													<div class="flexslider">
														<div class="slider-wrap">
															<div class="slide"><a href="#"><img src="images/shop/dress/3.jpg" alt="Pink Printed Dress"></a></div>
															<div class="slide"><a href="#"><img src="images/shop/dress/3-1.jpg" alt="Pink Printed Dress"></a></div>
															<div class="slide"><a href="#"><img src="images/shop/dress/3-2.jpg" alt="Pink Printed Dress"></a></div>
														</div>
													</div>
												</div>
												<div class="bg-overlay">
													<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
														<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
														<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
													</div>
													<div class="bg-overlay-bg bg-transparent"></div>
												</div>
											</div>
											<div class="product-desc">
												<div class="product-title"><h3><a href="#">Pink Printed Dress</a></h3></div>
												<div class="product-price">$39.49</div>
												<div class="product-rating">
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star-empty"></i>
													<i class="icon-star-empty"></i>
												</div>
											</div>
										</div>
									</div>

									<div class="product col-lg-3 col-md-4 col-sm-6 col-12">
										<div class="grid-inner">
											<div class="product-image">
												<a href="#"><img src="images/shop/pants/5.jpg" alt="Green Trousers"></a>
												<a href="#"><img src="images/shop/pants/5-1.jpg" alt="Green Trousers"></a>
												<div class="sale-flash badge badge-danger p-2">Sale!</div>
												<div class="bg-overlay">
													<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
														<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
														<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
													</div>
													<div class="bg-overlay-bg bg-transparent"></div>
												</div>
											</div>
											<div class="product-desc">
												<div class="product-title"><h3><a href="#">Green Trousers</a></h3></div>
												<div class="product-price"><del>$24.99</del> <ins>$21.99</ins></div>
												<div class="product-rating">
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star-half-full"></i>
													<i class="icon-star-empty"></i>
												</div>
											</div>
										</div>
									</div>

									<div class="product col-lg-3 col-md-4 col-sm-6 col-12">
										<div class="grid-inner">
											<div class="product-image">
												<a href="#"><img src="images/shop/sunglasses/2.jpg" alt="Men Aviator Sunglasses"></a>
												<a href="#"><img src="images/shop/sunglasses/2-1.jpg" alt="Men Aviator Sunglasses"></a>
												<div class="bg-overlay">
													<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
														<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
														<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
													</div>
													<div class="bg-overlay-bg bg-transparent"></div>
												</div>
											</div>
											<div class="product-desc">
												<div class="product-title"><h3><a href="#">Men Aviator Sunglasses</a></h3></div>
												<div class="product-price">$13.49</div>
												<div class="product-rating">
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star-empty"></i>
												</div>
											</div>
										</div>
									</div>

									<div class="product col-lg-3 col-md-4 col-sm-6 col-12">
										<div class="grid-inner">
											<div class="product-image">
												<a href="#"><img src="images/shop/tshirts/4.jpg" alt="Black Polo Tshirt"></a>
												<a href="#"><img src="images/shop/tshirts/4-1.jpg" alt="Black Polo Tshirt"></a>
												<div class="bg-overlay">
													<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
														<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
														<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
													</div>
													<div class="bg-overlay-bg bg-transparent"></div>
												</div>
											</div>
											<div class="product-desc">
												<div class="product-title"><h3><a href="#">Black Polo Tshirt</a></h3></div>
												<div class="product-price">$11.49</div>
												<div class="product-rating">
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
													<i class="icon-star3"></i>
												</div>
											</div>
										</div>
									</div>

								</div>

							</div>

						</div>

					</div>

					<div class="clear bottommargin-sm"></div>

					<div class="row justify-content-center col-mb-50 mb-0">
						<div class="col-sm-6 col-lg-4">
							<div class="fancy-title title-border">
								<h4>About Us</h4>
							</div>
							<p>Jane Jacobs educate, leverage affiliate Martin Luther King Jr. agriculture conflict resolution dignity. Cooperation international progress non-partisan lasting change meaningful.</p>
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

							<a href="#" class="social-icon si-delicious" data-toggle="tooltip" data-placement="top" title="Delicious">
								<i class="icon-delicious"></i>
								<i class="icon-delicious"></i>
							</a>

							<a href="#" class="social-icon si-paypal" data-toggle="tooltip" data-placement="top" title="PayPal">
								<i class="icon-paypal"></i>
								<i class="icon-paypal"></i>
							</a>

							<a href="#" class="social-icon si-flattr" data-toggle="tooltip" data-placement="top" title="Flattr">
								<i class="icon-flattr"></i>
								<i class="icon-flattr"></i>
							</a>

							<a href="#" class="social-icon si-android" data-toggle="tooltip" data-placement="top" title="Android">
								<i class="icon-android"></i>
								<i class="icon-android"></i>
							</a>

							<a href="#" class="social-icon si-smashmag" data-toggle="tooltip" data-placement="top" title="Smashing Magazine">
								<i class="icon-smashmag"></i>
								<i class="icon-smashmag"></i>
							</a>

							<a href="#" class="social-icon si-gplus" data-toggle="tooltip" data-placement="top" title="Google+">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon si-wikipedia" data-toggle="tooltip" data-placement="top" title="Wikipedia">
								<i class="icon-wikipedia"></i>
								<i class="icon-wikipedia"></i>
							</a>

							<a href="#" class="social-icon si-stumbleupon" data-toggle="tooltip" data-placement="top" title="StumbleUpon">
								<i class="icon-stumbleupon"></i>
								<i class="icon-stumbleupon"></i>
							</a>

							<a href="#" class="social-icon si-foursquare" data-toggle="tooltip" data-placement="top" title="FourSquare">
								<i class="icon-foursquare"></i>
								<i class="icon-foursquare"></i>
							</a>

							<a href="#" class="social-icon si-call" data-toggle="tooltip" data-placement="top" title="Call">
								<i class="icon-call"></i>
								<i class="icon-call"></i>
							</a>

							<a href="#" class="social-icon si-ninetyninedesigns" data-toggle="tooltip" data-placement="top" title="Ninety Nine Design">
								<i class="icon-ninetyninedesigns"></i>
								<i class="icon-ninetyninedesigns"></i>
							</a>

							<a href="#" class="social-icon si-forrst" data-toggle="tooltip" data-placement="top" title="Forrst">
								<i class="icon-forrst"></i>
								<i class="icon-forrst"></i>
							</a>

							<a href="#" class="social-icon si-digg" data-toggle="tooltip" data-placement="top" title="Digg">
								<i class="icon-digg"></i>
								<i class="icon-digg"></i>
							</a>
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
							<div class="col-sm-6 col-lg-3">
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

							<div class="col-sm-6 col-lg-3">
								<div class="feature-box fbox-plain fbox-dark fbox-sm">
									<div class="fbox-icon">
										<i class="icon-credit-cards"></i>
									</div>
									<div class="fbox-content">
										<h3>Payment Options</h3>
										<p class="mt-0">We accept Visa, MasterCard and American Express.</p>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-lg-3">
								<div class="feature-box fbox-plain fbox-dark fbox-sm">
									<div class="fbox-icon">
										<i class="icon-truck2"></i>
									</div>
									<div class="fbox-content">
										<h3>Free Shipping</h3>
										<p class="mt-0">Free Delivery to 100+ Locations on orders above $40.</p>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-lg-3">
								<div class="feature-box fbox-plain fbox-dark fbox-sm">
									<div class="fbox-icon">
										<i class="icon-undo"></i>
									</div>
									<div class="fbox-content">
										<h3>30-Days Returns</h3>
										<p class="mt-0">Return or exchange items purchased within 30 days.</p>
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
									<h3><strong>GET 20% OFF*</strong></h3>
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
		<footer id="footer" class="dark">
			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap">

					<div class="row col-mb-50">
						<div class="col-lg-8">

							<div class="row col-mb-50">
								<div class="col-md-4">

									<div class="widget clearfix">
										<img src="img/logo/smblogo.png" alt="Image" class="footer-logo">
										<!-- <img src="images/footer-widget-logo.png" alt="Image" class="footer-logo"> -->

										<p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards.</p>

										<div style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
											<address>
												<strong>Headquarters:</strong><br>
												No.119-121 Kav, Jl. Baliwerti No.10,Alun-alun Contong, <br>
												 Surabaya, Jawa Timur 60274<br>
											</address>
											<abbr title="Phone Number"><strong>Phone:</strong></abbr> (6231) 532 45 05<br>

											<abbr title="Email Address"></abbr> info@smartmarbleandbath.com
										</div>

									</div>

								</div>

								<div class="col-md-4">

									<div class="widget widget_links clearfix">

										<h4>Blogroll</h4>

										<ul>
											<li><a href="https://codex.wordpress.org/">Documentation</a></li>
											<li><a href="https://wordpress.org/support/forum/requests-and-feedback">Feedback</a></li>
											<li><a href="https://wordpress.org/extend/plugins/">Plugins</a></li>
											<li><a href="https://wordpress.org/support/">Support Forums</a></li>
											<li><a href="https://wordpress.org/extend/themes/">Themes</a></li>
											<li><a href="https://wordpress.org/news/">Canvas Blog</a></li>
											<li><a href="https://planet.wordpress.org/">Canvas Planet</a></li>
										</ul>

									</div>

								</div>

								<div class="col-md-4">

									<div class="widget clearfix">
										<h4>Recent Posts</h4>

										<div class="posts-sm row col-mb-30" id="post-list-footer">
											<div class="entry col-12">
												<div class="grid-inner row">
													<div class="col">
														<div class="entry-title">
															<h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
														</div>
														<div class="entry-meta">
															<ul>
																<li>10th July 2021</li>
															</ul>
														</div>
													</div>
												</div>
											</div>

											<div class="entry col-12">
												<div class="grid-inner row">
													<div class="col">
														<div class="entry-title">
															<h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
														</div>
														<div class="entry-meta">
															<ul>
																<li>10th July 2021</li>
															</ul>
														</div>
													</div>
												</div>
											</div>

											<div class="entry col-12">
												<div class="grid-inner row">
													<div class="col">
														<div class="entry-title">
															<h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
														</div>
														<div class="entry-meta">
															<ul>
																<li>10th July 2021</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>

						</div>

						<div class="col-lg-4">

							<div class="row col-mb-50">
								<div class="col-md-4 col-lg-12">
									<div class="widget clearfix" style="margin-bottom: -20px;">

										<div class="row">
											<div class="col-lg-6 bottommargin-sm">
												<div class="counter counter-small"><span data-from="50" data-to="15065421" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
												<h5 class="mb-0">Total Downloads</h5>
											</div>

											<div class="col-lg-6 bottommargin-sm">
												<div class="counter counter-small"><span data-from="100" data-to="18465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
												<h5 class="mb-0">Clients</h5>
											</div>
										</div>

									</div>
								</div>

								<div class="col-md-5 col-lg-12">
									<div class="widget subscribe-widget clearfix">
										<h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
										<div class="widget-subscribe-form-result"></div>
										<form id="widget-subscribe-form" action="include/subscribe.php" method="post" class="mb-0">
											<div class="input-group mx-auto">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="icon-email2"></i></div>
												</div>
												<input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
												<div class="input-group-append">
													<button class="btn btn-success" type="submit">Subscribe</button>
												</div>
											</div>
										</form>
									</div>
								</div>

								<div class="col-md-3 col-lg-12">
									<div class="widget clearfix" style="margin-bottom: -20px;">

										<div class="row">
											<div class="col-6 col-md-12 col-lg-6 clearfix bottommargin-sm">
												<a href="#" class="social-icon si-dark si-colored si-facebook mb-0" style="margin-right: 10px;">
													<i class="icon-facebook"></i>
													<i class="icon-facebook"></i>
												</a>
												<a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
											</div>
											<div class="col-6 col-md-12 col-lg-6 clearfix">
												<a href="#" class="social-icon si-dark si-colored si-rss mb-0" style="margin-right: 10px;">
													<i class="icon-rss"></i>
													<i class="icon-rss"></i>
												</a>
												<a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
											</div>
										</div>

									</div>
								</div>

							</div>

						</div>
					</div>

				</div><!-- .footer-widgets-wrap end -->

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">
				<div class="container">

					<div class="row col-mb-30">

						<div class="col-md-6 text-center text-md-left">
							Copyrights &copy; 2020 All Rights Reserved by SmartMarbleAndBath.com.<br>
							<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
						</div>

						<div class="col-md-6 text-center text-md-right">
							<div class="d-flex justify-content-center justify-content-md-end">
								<a href="#" class="social-icon si-small si-borderless si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-gplus">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-pinterest">
									<i class="icon-pinterest"></i>
									<i class="icon-pinterest"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-vimeo">
									<i class="icon-vimeo"></i>
									<i class="icon-vimeo"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-github">
									<i class="icon-github"></i>
									<i class="icon-github"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-yahoo">
									<i class="icon-yahoo"></i>
									<i class="icon-yahoo"></i>
								</a>

								<a href="#" class="social-icon si-small si-borderless si-linkedin">
									<i class="icon-linkedin"></i>
									<i class="icon-linkedin"></i>
								</a>
							</div>

							<div class="clear"></div>

							<i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +1-11-6541-6369 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype
						</div>

					</div>

				</div>
			</div><!-- #copyrights end -->
		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="js/jquery.js"></script>

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

</body>
</html>
