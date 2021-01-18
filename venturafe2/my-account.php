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
	<title>Smart Marble</title>
	<?php include("./headerdkk/template-head.php"); ?>
</head>

<body class="homepages-1" id="realcontainer">
	<?php include('headerdkk/header.php'); ?>
	<div class="page-content">
		<!-- My Account Section -->
		<section class="my-account-section section-box">
			<div class="woocommerce">
				<div class="container">
					<div class="content-area">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="entry-content">
									<h2 class="special-heading">Login account</h2>
									<form id="login-form-ma" class="woocommerce-form-register js-contact-form">
										<div class="input-container input-border">
											<i class=" fa fa-envelope icon icon"></i>
											<input type="email" class="input-field" required="" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" name="email" placeholder="E-mail">
										</div>
										<br>
										<div class="input-container input-border">
											<i class="fa fa-lock icon"></i>
											<input type="password" required="" id="password2" class="input-field " name="password" placeholder="Password">
											<i class="fa fa-eye toggle-visible" id="icon-toggle" onClick="toggleVisible(3)"></i>
										</div>
										<button style="cursor:pointer;background:#6c757d;color:white;border:0px solid white;padding:12px" id="login-button-ma" type="button" data-dismiss="modal" class="au-btn loginBtn">
											L O G I N
										</button>
									</form>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="novas-form-signup">
									<h2 class="special-heading">Register</h2>
									<form id="formRegister" class="woocommerce-form-register js-contact-form">
										<div class="input-container input-border">
											<i class=" fa fa-envelope icon icon"></i>
											<input type="email" class="input-field" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" id="email" name="email" placeholder="E-mail">
										</div>
										<br>
										<div class="input-container input-border">
											<i class="fa fa-lock icon"></i>
											<input type="password" required id="password1" class="input-field" name="password" placeholder="Password">
											<i class="fa fa-eye toggle-visible" id="icon-toggle" onClick="toggleVisible(2)"></i>
										</div>
										<br>
										<div class="row">
											<div class="input-container col-lg-6">
												<i class=" fa fa-user icon icon"></i>
												<input type="text" class="input-field input-border" required name="username" placeholder="Full Name">
											</div>
											<div class="input-container  col-lg-6">
												<i class=" fa fa-phone icon icon"></i>
												<input type="text" class="input-field input-border " required name="phone" placeholder="Phone/WhatsApp">
											</div>
										</div>
										<br>
										<div class="row">
											<div class="input-container  col-lg-6">
												<i class=" fa fa-map icon icon"></i>
												<input type="text" class="input-field input-border" required name="province" placeholder="Province">
											</div>
											<br>
											<div class="input-container  col-lg-6">
												<i class=" fa fa-city icon icon"></i>
												<input type="text" class="input-field input-border" required name="city" placeholder="City">
											</div>
										</div>
										<br>
										<div class="input-container input-border">
											<i class=" fa fa-address-book-o icon icon"></i>
											<input type="text" class="input-field" required name="alamat" id="alamat" placeholder="Address">
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
												<option values='none'>Prefer to not have sales person</option>
												<option values='rec'>Recommend me a sales person</option>
												<?php
												$query = $conn->query("SELECT username FROM login WHERE role = 'sales'");
												while ($row = mysqli_fetch_assoc($query)) {
													echo '<option values="' . $row['id'] . '">' . $row['username'] . '</option>';
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
		$.ajax({
			type: 'POST',
			url: 'ajaxHome.php',
			success: function(data) {
				document.getElementById("kontainerAnjay").innerHTML = data;
				$('.images-preloader').fadeOut();
			}
		});
		$('#register').on('click', function() {
			if ($('#email').val() != "" && $('#password1').val() != "" && $('#alamat').val() != "") {
				$.ajax({
					type: 'POST',
					url: 'ajaxRegister.php',
					data: $('#formRegister').serialize(),
					success: function(data) {
						console.log(data);
						if (data == 'berhasil') {
							Swal.fire(
								'Congratulation',
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
			} else {

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
		setInterval(function() {
			$.ajax({
				type: 'POST',
				url: 'ajaxCheckSession.php',
				success: function(data) {
					if (data != "") {
						window.location = "index.php";
					}
				}
			});
		}, 500)
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