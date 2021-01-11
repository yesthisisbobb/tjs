<!DOCTYPE html>

<html dir="ltr" lang="en-US">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="venturafe1/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="venturafe1/style.css" type="text/css" />
	<link rel="stylesheet" href="venturafe1/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="venturafe1/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="venturafe1/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="venturafe1/ss/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="venturafe1/css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Login - Layout 5 | Canvas</title>

</head>
<?php
session_start();

include("config.php"); //include koneksi database
include("proses.php");
if(isset($_SESSION["level"])){
	if(isset($_GET["approval"])){
		header('location:admin/salesku/viewso.php?noso='.$_GET['noso']);
		echo "anjae";
	 }
	 else{

header('location: ./'.$_SESSION["level"].'/');
	 }
}
?>
<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap py-0">

				<div class="section p-0 m-0 h-100 position-absolute" style="background: url('venturafe1/images/parallax/home/apart.jpg') center center no-repeat; background-size: cover;"></div>

				<div class="section bg-transparent min-vh-100 p-0 m-0">
					<div class="vertical-middle">
						<div class="container-fluid py-5 mx-auto">
							<div class="center">
								<a href="index.html"><img src="venturafe1/img/smblogo.png" alt="Canvas Logo"></a>

							</div>
<br><br>
							<div class="card mx-auto rounded-0 border-0" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
								<div class="card-body" style="padding: 40px;">
									<form id="login-form" name="login-form" class="mb-0" action="" method="post">
										<h3>Login to your Account</h3>

										<div class="row">
											<div class="col-12 form-group">
												<label for="login-form-username">Username:</label>
												<input type="text" id="username" name="username" value="" class="form-control not-dark" />
											</div>

											<div class="col-12 form-group">
												<label for="login-form-password">Password:</label>
												<input type="password" id="password" name="password" value="" class="form-control not-dark" />
											</div>

											<div class="col-12 form-group">
												<button type="submit" name="login" class="button button-3d button-black m-0" id="login-form-submit" name="login-form-submit" value="login">Login</button>
												<a href="#" class="float-right">Forgot Password?</a>
											</div>
										</div>
									</form>

									<div class="line line-sm"></div>

									<div class="w-100 text-center">
										<!-- <h4 style="margin-bottom: 15px;">or Login with:</h4>
										<a href="#" class="button button-rounded si-facebook si-colored">Facebook</a>
										<span class="d-none d-md-inline-block">or</span>
										<a href="#" class="button button-rounded si-twitter si-colored">Twitter</a> -->
									</div>
								</div>
							</div>
<br><Br>
							<div class="text-center dark mb-3"><small>Copyrights &copy; All Rights Reserved by SmartMarbleandBath.com.</small></div>
						</div>
					</div>
				</div>

			</div>
		</section><!-- #content end -->

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

</body>
</html>
