<!DOCTYPE html>
<?php
session_start();
include("inc/config.php"); //include koneksi database

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
    <h2 class="animated bounceIn slow" id="hiddenlater">PREMIUM QUALITY</h2>
    <p id="hiddenlater">A High Standard Quality of Tile & Sanitary</p>
		<a href="index-shop.php#produk" id="hiddenlater" class="btn btn-info" role="button">Products</a>
  </div>
				<!-- <h1>100% Full Width Layout</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Pages</a></li>
					<li class="breadcrumb-item active" aria-current="page">100% Full Width Layout</li>
				</ol> -->
				<!-- <div class="centered">Dream Bathroom & Kitchen Promo</div> -->
			</div>
			<div class="container-fluid" id="isi">
				<section id="content">
					<div class="content-wrap">
						<div class="container clearfix">
							<!-- <div class="row">

								<div class="col-md-4">
							<?php
							$status=$_GET["status"];
							if ($status=="sukses")
							{
							?>
							<div class="alert alert-success">
															<i class="icon-gift"></i><strong>Well done!</strong> You are successfully registered. Please Login Now
														</div>
									<?php } ?>
								</div>
							</div> -->
							<div class="row">

								<div class="col-md-4">
									<?php
									$status=$_GET["status"];
									if ($status=="sukses")
									{
									?>
									<div class="alert alert-success">
																	<i class="icon-gift"></i><strong>Well done!</strong> You are successfully registered. Please Login Now
																</div>
											<?php } ?>
									<div class="well well-lg mb-0">
										<form id="login-form" name="login-form" class="row" action="cek-login.php" method="post">

											<div class="col-12">
												<h3>Login to your Account</h3>
											</div>

											<div class="col-12 form-group">
												<label for="login-form-username">Username:</label>
												<input type="text" id="username" name="username" value="" class="form-control" />
											</div>

											<div class="col-12 form-group">
												<label for="login-form-password">Password:</label>
												<input type="password" id="passwordku" name="password" value="" class="form-control" />
													<span toggle="#passwordku" class="fa fa-fw fa-eye field-icon toggle-password"></span>
											</div>

											<div class="col-12 form-group">
												<button class="btn btn-secondary m-0" id="login-form-submit" name="login-form-submit" value="login">Login</button>
												<a href="#" class="float-right">Forgot Password?</a>
											</div>

										</form>
									</div>

								</div>

								<div  class="col-md-8">


									<h3>Don't have an Account for Retail Member? Register Now.</h3>

<p> By registering retail member you would be able to start shopping, get special promotions and faster assistance as well as information on new products. <br>Start your retail registration NOW!!! </p>

									<form id="register-form" name="register-form" class="row" action="daftar.php" method="post">

										<div class="col-6 form-group">
											<label for="register-form-name">Name:</label>
											<input type="text" id="nama" name="nama" value="" class="form-control" />
										</div>

										<div class="col-6 form-group">
											<label for="register-form-email">Email Address:</label>
											<input type="email" id="email" name="email" value="" class="form-control" />
										</div>
										<div class="col-6 form-group">
											<label for="register-form-email">Address:</label>
											<input type="text" id="email" name="email" value="" class="form-control" />
										</div>
										<div class="col-6 form-group">
											<label for="register-form-email">City: </label>
											<input type="text" id="email" name="email" value="" class="form-control" />
										</div>
										<div class="col-6 form-group">
											<label for="register-form-email">Province: </label>
											<input type="text" id="email" name="email" value="" class="form-control" />
										</div>
										<div class="col-6 form-group">
											<label for="register-form-phone">Phone / Whatsapp:</label>
											<!-- <input type="text" id="phone" name="phone" value="" class="form-control" /> -->
											<input type="text" id="phone" name="phone"  class="form-control"

       required>
										</div>
										<div class="col-6 form-group">
											<label for="register-form-phone">Tax</label>
											<select class="form-control" onchange="cek(this.value)">
												<option>
													Yes
												</option>
												<option>
													No
												</option>
											</select>
										</div>
										<script>
										function cek(str)
										{
										if (str=="No")
											{
												document.getElementById("npwp").value="None";
												document.getElementById("npwp").readOnly = true;
											}
											else if (str=="Yes")
												{
													document.getElementById("npwp").value="";
													document.getElementById("npwp").readOnly = false;
												}

										}
										</script>
										<div class="col-6 form-group">
											<label for="register-form-username">NPWP No.</label>
											<input type="text" id="npwp" name="npwp" value="" class="form-control" />
										</div>
										<div class="w-100"></div>

										<div class="col-6 form-group">
											<label for="register-form-username">Choose a Username:</label>
											<input type="text" id="uname" name="uname" value="" class="form-control" />
										</div>
										<div class="col-6 form-group">
											<label for="register-form-password">Choose Password:</label>
										<input id="password-field" type="password" class="form-control" name="password">
										<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

										</div>


										<div class="w-100"></div>



										<div class="col-6 form-group">
											<label for="register-form-repassword">Re-enter Password:</label>
											<input type="password" id="register-form-repassword" name="register-form-repassword" value="" class="form-control" />
											<span toggle="#register-form-repassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
										</div>
										<div class="col-6 form-group">
											<label for="register-form-phone">Sales</label>
											<select class="form-control">
												<?php
		                    $user1=$_SESSION["username"];

		                    $sqlku111 = "SELECT * FROM login where role='sales'";
		                    $queryku111 = mysqli_query($conn, $sqlku111);
		                     while($amku111 = mysqli_fetch_array($queryku111)){

		                       $statusnama=$amku111['username'];
													 $noku=$amku111['id'];

													 ?>
													 <option value="<?php echo $noku; ?>"><?php echo $statusnama; ?></option>
													 <?php
		                     }?>
 <option>Any Sales Person</option>
											</select>
										</div>

										<div class="w-100"></div>

										<div class="col-12 form-group">
											<button class="btn btn-dark m-0" id="register-form-submit" name="register-form-submit" value="register">Register Now</button>
										</div>

									</form>

								</div>

							</div>

						</div>
					</div>
				</section>

		</container>


		<!-- Footer
		============================================= -->
		<!-- #footer end -->
<?php include("footer1.php");?>
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
