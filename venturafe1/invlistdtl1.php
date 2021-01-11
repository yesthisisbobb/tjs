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
	.blink_me {
  animation: blinker 2s linear infinite;
}

@keyframes blinker {
  70% {
    opacity: 0;
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
						<p class="mb-0"><strong>Call:</strong> (6231) 532 45 05 | <strong>Email:</strong> info@smartmarbleandbath.com</p>
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
								<?php
								$user=$_SESSION["username"];
								if($user==""){
								?>
								<li class="top-links-item"><a href="#">Login</a>

									<div class="top-links-section">
										<form id="top-login" method="POST" autocomplete="off" action="cek-login.php">
											<div class="form-group">
												<label>Username</label>
												<input type="email" name="username" id="username" class="form-control" placeholder="Email address">
											</div>
											<div class="form-group">
												<label>Password</label>
												<input type="password" class="form-control" id="password" name="password"  placeholder="Password" required="">
											</div>
											<div class="form-group form-check">
												<input class="form-check-input" type="checkbox" value="" id="top-login-checkbox">
												<label class="form-check-label" for="top-login-checkbox">Remember Me</label>
											</div>
											<button class="btn btn-danger btn-block" type="submit">Sign in</button>
										</form>
									</div>
								</li>
							<?php }else {
								?>
									<li class="top-links-item"><a href="#"><?php echo $user; ?></a>
										<!-- <div class="top-links-section">
													<p><a href="">Profile</a></p>
													<p><a href="logout.php">Log Out</a><p>
										</div> -->

											<ul class="top-links-sub-menu">
												<li class="top-links-item"><a href="#">My Profile</a></li>
												<li class="top-links-item"><a href="#">Transaction History</a></li>
												<li class="top-links-item"><a href="logout.php">Logout</a></li>

											</ul>
										</li>
									<?php } ?>
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
							<img src="img/logo/smblogo.png" ></a>

						</div>
						<!-- #logo end -->

						<div class="header-misc">

							<!-- Top Search
							============================================= -->
							<div id="top-search" class="header-misc-icon">
								<a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
							</div><!-- #top-search end -->

							<!-- Top Cart
							============================================= -->
							<?php
							$total2=0;
							$usern=$_SESSION['username'];
								$sqlunt = "SELECT * FROM cartdtl where userid='$usern'";
										 $queryunt = mysqli_query($conn, $sqlunt);
										 while($amkunt = mysqli_fetch_array($queryunt)){
											 $total2=$total2+1;
										 }
								?>

							<div id="top-cart" class="header-misc-icon d-none d-sm-block">
								<a href="#" id="top-cart-trigger">
									<?php
									if($total2>0)
									{ ?>
									<i class="icon-line-bag animated bounceIn infinite"></i>
								<?php } else { ?>
									<i class="icon-line-bag"></i>
								<?php } ?>
									<span class="top-cart-number"><?php echo $total2; ?></span></a>
								<div class="top-cart-content">
									<div class="top-cart-title">
										<h4>Shopping Cart</h4>
									</div>
									<div class="top-cart-items">

										            <?php
																$total1=0;
																$usern=$_SESSION['username'];
										              $sqlun = "SELECT * FROM cartdtl where userid='$usern'";
										                   $queryun = mysqli_query($conn, $sqlun);
										                   while($amkun = mysqli_fetch_array($queryun)){
																				 $kodes=$amkun['kode_stok'];
																				 $har=$amkun['harga'];
																				 $jum=$amkun['jumlah'];
																				 $total=$har*$jum;
																				 $total1=$total1+$total;
										              ?>

																	<?php

											              $sqlun1 = "SELECT * FROM master_stok where kode_stok='$kodes'";
											                   $queryun1 = mysqli_query($conn, $sqlun1);
											                   while($amkun1 = mysqli_fetch_array($queryun1)){
																					 $kodetipe=$amkun1['kodetipe'];

																				 }
											              ?>


										<div class="top-cart-item">
											<div class="top-cart-item-image">
												<a href="#"><img src="img/gambar/<?php echo $kodetipe;?>.jpg"></a></a>
											</div>

											<div class="top-cart-item-desc">
												<div class="top-cart-item-desc-title">
													<a href="#"><?php echo $kodes; ?></a>
													<span class="top-cart-item-price d-block"><?php echo rupiah($har); ?></span>
												</div>
												<div class="top-cart-item-quantity">x <?php echo $jum; ?></div>
											</div>
										</div>
									<?php }?>

									</div>
									<?php
									$sess1=session_id();
									?>
									<div class="top-cart-action">
										<span class="top-checkout-price"><?php echo rupiah($total1);?></span>

									</div>
									<div class="top-cart-action">
									<a href="checkout.php?sessi=<?php echo $sess1;?>" class="btn btn-info btn-block" role="button">Buy</a>
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
			<img src="img/bg/koh5.jpg" height="20%" width="100%" alt="Cloudy Sky">
			<div class="text-block">
    <h2 class="animated bounceIn slow" id="hiddenlater">PREMIUM QUALITY</h2>
    <p id="hiddenlater">A High Standard Quality of Tile & Sanitary</p>
		<button class="btn btn-info" id="hiddenlater" type="submit">Products</button>
  </div>
				<!-- <h1>100% Full Width Layout</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Pages</a></li>
					<li class="breadcrumb-item active" aria-current="page">100% Full Width Layout</li>
				</ol> -->
				<!-- <div class="centered">Dream Bathroom & Kitchen Promo</div> -->
			</div>
			<div class="container-fluid">

			<table class="table table-striped">
				<tr>
					<th>
						 Inv.Date
					</th>
					<th>
						 Inv.No
					</th>
					<th>
						 Delivery Date
					</th>

					<th>
						 Action
					</th>

					<?php

					$soku=$_GET["no"];
					echo "<br><h5>"."Invoices for SO No. ".$soku."</h5>";

					$sqlinv1 = "SELECT * FROM inv where noso='$soku'";
						$queryinv1 = mysqli_query($conn, $sqlinv1);
							 while($amkuinv1 = mysqli_fetch_array($queryinv1)){
								 $tgl=$amkuinv1['tgl'];
								 $noinv=$amkuinv1['noinv'];
								 // $userid=$amkuinv['user_id'];
								 // $statusp=$amkuinv['status_payment'];

								?>
								<tr>
								<td>
									<?php echo $tgl; ?>
								</td>
								<td>
									<?php echo $noinv; ?>
								</td>
								<td>
									<?php echo $tgl ?>
								</td>

								<td>
										<a href="invlistdtl2.php?no=<?php echo $noinv; ?>" class="btn btn-info btn-sm">View Invoice</a>
										<a href="dolistdtl2.php?no=<?php echo $noinv; ?>" class="btn btn-info btn-sm">View DO</a>
								</td>
							</tr>
							<?php }?>
			</table>
		</container>


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
