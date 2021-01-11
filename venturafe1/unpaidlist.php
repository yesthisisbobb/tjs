<!DOCTYPE html>

<?php
session_start();
include("inc/config.php"); //include koneksi database
include("phpqrcode/qrlib.php");
?>
<html dir="ltr" lang="en-US">
<head>

<script src="https://use.fontawesome.com/f357868c5a.js"></script>
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
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
	padding-right: 30px;
  position: relative;
  z-index: 2;
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

							<!-- Top Cart
							============================================= -->

						</div>

						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu">

							<ul class="menu-container">
								<li class="menu-item current"><a class="menu-link" href="index-shop.php"><div>Home</div></a>
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
								<?php
								$sqlh = "SELECT * FROM master_grup";
										 $queryh = mysqli_query($conn, $sqlh);
										 $cekh=mysqli_num_rows($queryku2h);

										 while($amh = mysqli_fetch_array($queryh)){
											 $nama=$amh["nama"];
											 ?>
								<!-- .mega-menu end -->
								<li class="menu-item mega-menu mega-menu-small"><a class="menu-link" href="#"><div><?php echo $nama; ?></div></a>
									<div class="mega-menu-content mega-menu-style-2">
										<div class="container">
											<div class="row">
												<ul class="sub-menu-container mega-menu-column col-lg-6">
													<!-- <li class="menu-item mega-menu-title"><a class="menu-link" href="#"><div>Footwear</div></a> -->
														<ul class="sub-menu-container">
															<?php
															$sqli = "SELECT * FROM master_sub_grup where namagrup='$nama'";
																	 $queryi = mysqli_query($conn, $sqli);
																	 $ceki=mysqli_num_rows($queryi);

																	 while($ami = mysqli_fetch_array($queryi)){
																		 $nama1=$ami["nama"];

																		 ?>
															<li class="menu-item"><a class="menu-link" href="#"><div><?php echo $nama1; ?></div></a></li>
														<?php } ?>
														</ul>
													</li>
												</ul>

											</div>
										</div>
									</div>
								</li><!-- .mega-menu end --><?php } ?>
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
    <h2 class="animated bounceIn slow">PREMIUM QUALITY</h2>
    <p>A High Standard Quality of Tile & Sanitary</p>
		<a href="index-shop.php#produk" class="btn btn-info" role="button">Products</a>
  </div>
				<!-- <h1>100% Full Width Layout</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Pages</a></li>
					<li class="breadcrumb-item active" aria-current="page">100% Full Width Layout</li>
				</ol> -->
				<!-- <div class="centered">Dream Bathroom & Kitchen Promo</div> -->

			</div>

			<div class="container" id="tost">
					<h4>UNPAID TRANSACTION HISTORY</h4>
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
					<th>
						 QRCode
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
								 $nosor=str_replace("/","",$noso);
								?>
								<tr>
								<td>
									<?php echo $tgl; ?>
								</td>
								<td>
									<?php echo $noso; ?><?php


									//  ?>
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
								<td>
									<?php
									QRCode::png("http://smartmarbleandbath/invlistdtl.php?noso='$noso'",$nosor.".png","L",1,1);

										?>
									<img src="<?php echo $nosor;?>.png" width='50' height='50'/>
								</td>


							</tr>
							<?php }?>
			</table>
</div>

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
