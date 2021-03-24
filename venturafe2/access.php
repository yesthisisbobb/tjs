<?php
include('db/config.php');
include('rupiah.php');
?>

<!DOCTYPE html>
<html>
<style>
	html {
		scroll-behavior: smooth;
	}
</style>

<head>
	<title>SMB | Login or Register</title>
	<?php include("./headerdkk/template-head.php"); ?>
</head>

<body class="homepages-1" id="realcontainer">
	<?php include('headerdkk/header.php'); ?>
	<div class="page-content">
		<!-- My Account Section -->
		<section class="my-account-section section-box" style="padding-top: 140px">
			<div class="woocommerce">
				<div class="container">
					<div class="content-area">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="entry-content">
									<h4 class="ma-header">Login</h4>
									<form id="login-form-ma" class="woocommerce-form-register js-contact-form">
										<div class="input-container input-border">
											<i class=" fa fa-envelope icon icon"></i>
											<input autocomplete="username" type="email" class="input-field" required="" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" name="email" placeholder="E-mail">
										</div>
										<br>
										<div class="input-container input-border">
											<i class="fa fa-lock icon"></i>
											<input autocomplete="current-password" type="password" required="" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" id="password2" class="input-field " name="password" placeholder="Password">
											<i class="fa fa-eye toggle-visible" id="icon-toggle" onClick="toggleVisible(3)"></i>
										</div>
										<button style="cursor:pointer;background:#6c757d;color:white;border:0px solid white;padding:12px" id="login-button-ma" type="button" data-dismiss="modal" class="au-btn loginBtn">
											L O G I N
										</button>
										<div id="other-login">
											<h4 class="ma-header">or login with social media</h4>
											<div class="g-signin2" data-onsuccess="onSignIn"></div>
											<div class="fb-login-button" data-width="" data-size="medium" data-button-type="login_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false"></div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="novas-form-signup">
									<h4 class="ma-header">Register</h4>
									<form id="formRegister" class="woocommerce-form-register">
										<div class="input-container input-border">
											<i class=" fa fa-envelope icon icon"></i>
											<input autocomplete="email" type="email" class="input-field" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" id="email" name="email" placeholder="E-mail">
										</div>
										<br>
										<div class="input-container">
											<i class="fa fa-user icon icon"></i>
											<input type="text" class="input-field input-border" required name="fullname" placeholder="Full Name">
										</div>
										<br>
										<div class="input-container">
											<i class="fa fa-user icon icon"></i>
											<input type="text" class="input-field input-border" required name="username" placeholder="Username">
										</div>
										<br>
										<div class="input-container input-border">
											<i class="fa fa-lock icon"></i>
											<input autocomplete="current-password" type="password" required id="password1" class="input-field" name="password" placeholder="Password">
											<i class="fa fa-eye toggle-visible" id="icon-toggle" onClick="toggleVisible(2)"></i>
										</div>
										<br>
										<div class="row">
											<div class="input-container col-lg-6">
												<i class="fas fa-flag icon icon"></i>
												<select name="country">
													<option value="none">Select a country</option>
													<?php
													$command = "SELECT * FROM COUNTRY ORDER BY 2 ASC";
													$query = mysqli_query($conn, $command);
													while ($res = mysqli_fetch_assoc($query)) {
														$cname = $res["countryname"];
														$ccode = $res["countrycode"];
														$pc = $res["pc"];

														echo "<option value='$ccode'>$cname (+ $pc)</option>";
													}
													?>
												</select>
											</div>
											<div class="input-container  col-lg-6">
												<i class=" fa fa-phone icon icon"></i>
												<input type="text" class="input-field input-border " required name="phone" placeholder="Phone (Ex: 81221362119)">
											</div>
										</div>
										<br>
										<div class="row">
											<div class="input-container col-lg-6">
												<i class=" fa fa-map icon icon"></i>
												<input type="text" class="input-field input-border" required name="province" placeholder="Province">
											</div>
											<div class="input-container col-lg-6">
												<i class=" fa fa-city icon icon"></i>
												<input type="text" class="input-field input-border" required name="city" placeholder="City">
											</div>
										</div>
										<br>
										<div class="row">
											<div class="input-container col-lg-6">
												<i class=" fa fa-address-book-o icon icon"></i>
												<input type="text" class="input-field input-border" required name="alamat" id="alamat" placeholder="Address">
											</div>
										</div>
										<br>
										<div class="row">
											<div class="input-container  col-lg-6 ">
												<i class=" fa fa-money icon icon"></i>
												<select id="tax" class="input-field input-border" name="tax">
													<option>Using Tax?</option>
													<option value="yes">YES</option>
													<option value="no">NO</option>
												</select>
											</div>
											<div class="input-container col-lg-6" id="npwp">
												<i class=" fa fa-address-card icon icon"></i>
												<input type="text" class="input-field  input-border" required name="npwp" placeholder="Your NPWP">
											</div>
										</div>
										<br>
										<div class="input-container input-border">
											<i class=" fa fa-users icon icon"></i>
											<select id="sales" class="input-field" name="sales">
												<option value='none'>Prefer to not have sales person</option>
												<option value='rec'>Recommend me a sales person</option>
												<?php
												$query = $conn->query("SELECT username FROM login WHERE role = 'sales'");
												while ($row = mysqli_fetch_assoc($query)) {
													echo '<option value="' . $row['id'] . '">' . $row['username'] . '</option>';
												}
												?>
											</select>
											<i class="fa fa-caret-down toggle-dropdown" id="toggle-option" aria-hidden="true" id="dropdown"></i>
										</div>
										<input style="cursor:pointer;background:#6c757d;color:white;border:0px solid white;padding:12px" id="register" type="submit" name="add-to-cart" class="au-btn register" value="R E G I S T E R">

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End My Account Section -->
	</div>
	<?php include("headerdkk/footer.php"); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			FB.getLoginStatus(function(response) {
				console.log(response);
				// statusChangeCallback(response);
			});
		});

		$('#register').on('click', function() {
			if ($('#email').val() != "" && $('#password1').val() != "" && $('#alamat').val() != "") {
				let decision = "";
				$.ajax({
					type: 'POST',
					url: 'ajaxRegister.php',
					dataType: "JSON",
					data: $('#formRegister').serialize(),
					success: function(data) {
						let qs1Found = false,
							qs2Found = false;
						for (let i = 0; i < data.length; i++) {
							const code = data[i];
							if (code === "QS1") qs1Found = true;
							if (code === "QS2") qs2Found = true;
						}
						if (qs1Found && qs2Found) {
							decision = "success";
						}
					},
					complete: function() {
						if (decision == 'success') {
							Swal.fire(
								'Congratulations',
								'You Can Login',
								'success'
							)
						} else {
							Swal.fire(
								'Oops!',
								'You forgot to fill something',
								'error'
							)
						}
					}
				});
			}
		});
		$('#npwp').hide();
		$('#npwpbr').hide();
		$("#tax").on('change', function() {
			let npwp = $('#tax').val();
			if (npwp == "yes") {
				$('#npwp').fadeIn();
				$('#npwpbr').show();
			} else {
				$('#npwp').fadeOut();
				$('#npwpbr').hide();
			}
		});
		$('#toggle-option').on('click', function() {
			$("#sales").mousedown();
		});
		// setInterval(function() {
		// 	$.ajax({
		// 		type: 'POST',
		// 		url: 'ajaxCheckSession.php',
		// 		success: function(data) {
		// 			if (data != "") {
		// 				window.location = "index.php";
		// 			}
		// 		}
		// 	});
		// }, 500)
	</script>
</body>

</html>
<script>
	// Ngabil value dari URL
	function getUrlParameter(sParam) {
		var sPageURL = window.location.search.substring(1),
			sURLVariables = sPageURL.split('&'),
			sParameterName;

		for (let i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');

			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? false : decodeURIComponent(sParameterName[1]);
			}
		}
	}

	let logged = getUrlParameter("logged");
	if (typeof logged !== 'undefined') {
		tata.info("Login Required!", 'In order to interact with our website, please login first', {
			position: 'mr',
			duration: 4000,
			animate: 'slide'
		});
	}
</script>