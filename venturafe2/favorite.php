<?php
session_start();
if (!isset($_SESSION["username"])) {
	header("Location:my-account.php?logged=false");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Favorites</title>
	<?php include("headerdkk/template-head.php"); ?>
</head>

<body class="wish-list">
	<!-- Images Loader -->
	<div class="images-preloader">
		<div id="preloader_1" class="rectangle-bounce">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<?php include("headerdkk/header.php"); ?>
	<div class="page-content" style="margin-top:100px;">
		<!-- Breadcrumb Section -->
		<section class="breadcrumb-contact-us breadcrumb-section section-box" style="background-image: url(resource/banner.jpg)">
			<div class="container">
				<div class="breadcrumb-inner" style="color:white">
					<h1 style="color:white">My Favorites</h1>
					<ul class="breadcrumbs" style="color:white">
						<li><a class="breadcrumbs-1" style="color:white" href="index.php">Home</a></li>
						<li>
							<p class="breadcrumbs-2">Favorite</p>
						</li>
					</ul>
				</div>
			</div>
		</section>
		<!-- End Breadcrumb Section -->

		<!-- Wishlist Section -->
		<section class="shop-cart-section wishlist-section section-box">
			<div class="woocommerce">
				<div class="container">
					<div class="entry-content" id="favoriteTable">
						
					</div>
				</div>
			</div>
		</section>
		<!-- End Wishlist Section -->

	</div>
	<?php include("headerdkk/footer.php"); ?>
	<script>
		function refreshFavorite() {
			$.ajax({
				type: 'POST',
				url: 'ajaxFavoriteTable.php',
				success: function(data) {
					document.getElementById("favoriteTable").innerHTML = data;
				}
			});
		}
		$(document).on('click', '.removeFav', function(e) {
			e.preventDefault();
			let kode = this.id;
			$.ajax({
				type: 'POST',
				url: 'ajaxDeleteFavorite.php',
				data: {
					'kode': kode
				},
				success: function(data) {
					if (data == "Berhasil") {
						Swal.fire(
							kode + ' removed',
							'',
							'success'
						)
					} else {
						Swal.fire(
							'Process failed!',
							'',
							'error'
						)
					}
					refreshFavorite();
				}
			});
		});
		refreshFavorite();
	</script>
</body>

</html>