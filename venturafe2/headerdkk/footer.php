<footer class="footer-section section-box">
	<div class="footer-content">
		<div class="container">
			<div class="row">
				<div class="col-xl col-lg col-md-4 col-sm-12 col">
					<div class="footer-items">
						<div class="logo">
							<a href="index1.html"><img src="../venturafe1/img/logo/smbwh.png" alt="logo"></a>
						</div>
						<p>Smart Marble & Bath(SMB)
							is a subsidiary company of Karya Modern Group.
							Karya Modern Group has been in tile and
							sanitary business for more than 42 Years. Karya Modern Group
							started as a building material store back in 1976.
							Our main office is located in Surabaya, East Java</p>
						<div class="socials">
							<a href="#"><i class="zmdi zmdi-facebook"></i></a>
							<a href="#"><i class="zmdi zmdi-twitter"></i></a>
							<a href="#"><i class="zmdi zmdi-tumblr"></i></a>
							<a href="#"><i class="zmdi zmdi-instagram"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl col-lg col-md-4 col-sm-12 col">
					<div class="footer-items footer-items-1">
						<h4>Contact</h4>
						<div class="contact-location">Surabaya</div>
						<div class="contact">
							<i class="zmdi zmdi-map"></i>
							<span>Baliwerti 119-121 Kav. 10</span>
						</div>
						<div class="contact">
							<i class="zmdi zmdi-phone"></i>
							<span><a href="tel:+62811332642">(+62) 811332642</a></span>
						</div>
						<div class="contact-location">Jakarta</div>
						<div class="contact">
							<i class="zmdi zmdi-map"></i>
							<span>Tomang Raya No. 28-30</span>
						</div>
						<div class="contact">
							<i class="zmdi zmdi-phone"></i>
							<span><a href="tel:+62811332642">(+62) 811257180</a></span>
						</div>
					</div>
				</div>
				<div class="col-xl col-lg col-md-4 col-sm-12 col">
					<div class="footer-items footer-items-2">
						<h4>Profile</h4>
						<div class="profile">
							<i class="zmdi zmdi-account"></i>
							<span><a href="my-account.html">Log Out</a></span>
						</div>
						<div class="profile">
							<i class="zmdi zmdi-shopping-cart"></i>
							<span><a href="check-out.html">Checkout</a></span>
						</div>
						<div class="profile">
							<i class="zmdi zmdi-pin-help"></i>
							<span><a href="#">Help & Support</a></span>
						</div>
					</div>
					<div class="footer-items footer-items-2">
						<h4 class="footer-additional-section">Get Latest Info</h4>
						<div class="contact">
							<i class="zmdi zmdi-email"></i>
							<span>info@smartmarbleandbath.com</span>
						</div>
						<div class="email">
							<div class="send">
								<i class="zmdi zmdi-mail-send"></i>
							</div>
							<input type="email" required="" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" name="email" placeholder="Your e-mail...">
						</div>
						<div id="hirosolution-tm">
							<span>&#169&nbsp2021 Hiro Solution</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<a href="#" id="back-to-top"></a>
<!--  JS  -->
<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="../vendor/jquery/jquery-3.5.1.min.js"></script> -->
<!-- Bootstrap -->
<script src="vendor/bootrap/js/bootstrap.min.js"></script>
<!-- Waypoints Library -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Owl Carousel 2 -->
<script src="vendor/owl/js/owl.carousel.min.js"></script>
<script src="vendor/owl/js/OwlCarousel2Thumbs.min.js"></script>
<!-- Slider Revolution core JavaScript files -->
<script src="vendor/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="vendor/revolution/js/jquery.themepunch.revolution.min.js"></script>
<!-- Isotope Library-->
<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<!-- Masonry Library -->
<script type="text/javascript" src="js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<!-- fancybox-master Library -->
<script type="text/javascript" src="vendor/fancybox-master/js/jquery.fancybox.min.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEmXgQ65zpsjsEAfNPP9mBAz-5zjnIZBw"></script>
<script src="js/theme-map.js"></script>
<!-- Countdown Library -->
<script src="vendor/countdown/jquery.countdown.min.js"></script>
<!-- Audio Library-->
<script src="vendor/mejs/mediaelement-and-player.min.js"></script>
<!-- noUiSlider Library -->
<script type="text/javascript" src="vendor/nouislider/js/nouislider.js"></script>
<!-- Form -->
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<script src="js/config-contact.js"></script>
<!-- Main Js -->
<script src="js/custom.js"></script>
<!-- Prevent Body Scroll (Custom) -->
<script type="text/javascript" src="js/preventBodyScroll.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$(document).on('click', '#loginBtn', function() {
		$.ajax({
			type: 'POST',
			url: 'ajaxLogin.php',
			data: $('#formLogin').serialize(),
			success: function(data) {
				if (data == "Success!") {
					$('#canvasModal').fadeOut();
					swal("Congratulation", "Now You Can Shop", "success");
					// $('body').css('overflow-y', 'auto');
				} else {
					swal("Error", "Password atau Email anda salah!", "error");
				}
				modalLog();
				// Ngambil function dari header.php
				refreshCart();
				// document.location.reload();
			}
		});
	});
	$("#login-button-ma").click(function() {
		console.log($('#login-form-ma').serialize());
		$.ajax({
			type: 'POST',
			url: 'ajaxLogin.php',
			data: $('#login-form-ma').serialize(),
			success: function(data) {
				if (data == "Success!") {
					$('#canvasModal').fadeOut();
					swal("Congratulation", "Now You Can Shop", "success");
					// $('body').css('overflow-y', 'auto');
				} else {
					swal("Error", "Password atau Email anda salah!", "error");
				}
				modalLog();
				// Ngambil function dari header.php
				refreshCart();
				// document.location.reload();
			},
			error: function(error) {
				console.log(error.responseText);
			}
		});
	});
	$(document).on('click', '.logoutBtn', function() {
		$('#canvasModal').fadeOut();
		Swal.fire({
			title: 'Are you sure?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			cancelButtonColor: '#3085d6',
			confirmButtonText: 'Log Out!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: 'POST',
					url: 'ajaxLogout.php',
					success: function(data) {
						console.log("asdasdasd");
						$('body').removeClass('modal-open');
						refreshCart();
						modalLog();
						// document.location.reload();
					}
				});
				swal(
					'Logged Out!',
					'Logged Out Successfully',
					'success'
				)
				$('body').removeClass('modal-open');
				$('body').css('overflow-y', 'auto');
			}
		});
	});
	$(document).on('click', '.tombol-favorite', function(e) {
		let kode = this.id;
		$.ajax({
			type: 'POST',
			url: 'ajaxFavorite.php',
			data: {
				'kode': kode
			},
			success: function(data) {
				document.getElementById(kode).innerHTML = data;
				console.log("success");
			}
		});
	});
</script>