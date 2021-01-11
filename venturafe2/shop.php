<?php
include("db/config.php");
include("rupiah.php");
$queryTotal = $conn->query("SELECT * FROM  master_sub_grup msg inner join detail_sub_grup dsg on UPPER(msg.nama) = UPPER(dsg.namagrup) inner join master_stok ms on UPPER(dsg.nama) = UPPER(ms.grupname) WHERE ms.status = 'Active' ORDER BY msg.namagrup");
$total = mysqli_num_rows($queryTotal);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Shop</title>
	<?php include("./headerdkk/template-head.php"); ?>
</head>
<style>
	html {
		scroll-behavior: smooth;
	}
</style>
<?php include('./headerdkk/header.php'); ?>

<!-- Shop Section -->
<section class="featured-hp-1 items-hp-6 shop-full-page shop-right-siderbar">
	<div class="container">
		<div class="featured-content woocommerce">
			<div class="row">
				<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
					<div class="content-area">
						<div class="storefront-sorting">
							<p class="woocommerce-result-count">Showing 1 – 12 of <?= $total ?> results</p>
							<form class="woocommerce-ordering" method="get">
								<select name="orderby" id="sort" class="orderby">
									<option value="low">--Sort--</option>
									<option value="low">Sort by price: low to high</option>
									<option value="high">Sort by price: high to low</option>
								</select>
								<span><i class="zmdi zmdi-chevron-down"></i></span>
							</form>
						</div>
						<div id="kontainerAnjay">

						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
					<div class="widget-area">
						<!-- Search -->
						<div class="widget widget_search">
							<form class="search-form" method="get" role="search">
								<input type="texts" id="search" name="search" class="search-field" placeholder="Search...">
								<i class="zmdi zmdi-search search-submit"></i>
							</form>
						</div>
						<!-- Filter -->
						<div class="widget_price_filter">
							<h3 class="widget-title">Filter By Price</h3>
							<form method="POST">
								<div class="price_slider_wrapper">
									<div id="slider-range"></div>
									<div class="">
										<br>
										<input type="text" id="amount" readonly style="border:0; margin-left:-15px;width:100%; color:#000000; ">


									</div>
								</div>
							</form>
						</div>
						<!-- Categories -->
						<div class="widget widget_product_categories">
							<h3 class="widget-title">Categories</h3>
							<ul class="product-categories">
								<?php
								$queryCategories = $conn->query("SELECT * FROM master_grup");
								while ($row = mysqli_fetch_assoc($queryCategories)) {
									$namagrup = $row['nama'];
									$queryMasterSubGrup = $conn->query("SELECT * FROM  master_sub_grup msg inner join detail_sub_grup dsg on msg.nama = dsg.namagrup inner join master_stok on dsg.nama = grupname WHERE msg.namagrup = '$namagrup'");
									$jml = mysqli_num_rows($queryMasterSubGrup);
									echo '<li class="cat-item cat-parent">
										<a href="" class="tombol-category" stype="main" id="' . $row['nama'] . '"><span>' . $row['nama'] . '</span></a>
										<span>(' . $jml . ')</span>
									</li>';
								}
								?>
							</ul>
						</div>

						<!-- Brands -->
						<div class="widget widget_product_categories">
							<h3 class="widget-title">Brands</h3>
							<ul class="product-categories">
								<?php
								$queryBrand = $conn->query("SELECT COUNT(ms.kodemerk) as qty, UPPER(mm.nama) as nama, UPPER(mm.kode) as kode FROM master_merk mm, master_stok ms WHERE mm.kode=ms.kodemerk GROUP BY ms.kodemerk");
								while ($row = mysqli_fetch_assoc($queryBrand)) {
									$jml = $row["qty"];
									echo '<li class="cat-item cat-parent">
										<a href="" class="tombol-category" stype="merk" id="' . $row['kode'] . '"><span>' . $row['nama'] . '</span></a>
										<span>(' . $jml . ')</span>
									</li>';
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('headerdkk/footer.php') ?>

	<script>
		let min = 0,
			max = 0;
		let stype = "";
		let sortVal = "",
			searchVal = "",
			kodeKategori = "";
		let statesArr = [
				["isSorted", false],
				["isSearched", false],
				["isCategorized", false],
				["isFilteredByPrice", false]
			];

		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}

		function callLoader() {
			// Ngambil Loader
			$("#kontainerAnjay").css({
				"display": "flex",
				"justify-content": "center"
			});
			$("#kontainerAnjay").html('<div id="shop-loader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>');
			$("#shop-loader").css("display", "inline-block");
		}

		function removeLoader() {
			$("#shop-loader").css("display", "none");
			$("#kontainerAnjay").css("display", "block");
		}

		$('#sort').on('change', function() {
			callLoader();
			let val = $('#sort').val();
			sortVal = val;
			$("#kontainerAnjay").load(`ajaxSort.php?kata=${val}`, function() {
				removeLoader();
			});
		});

		$(document).on('click', '.tombol-category', function(e) {
			e.preventDefault();
			kodeKategori = this.id;
			stype = $(this).attr("stype");
			callLoader();
			topFunction();
			$("#kontainerAnjay").load(`ajaxCategory.php?stype=${stype}&id=${kodeKategori}`, function() {
				removeLoader();
			});
		});

		// ===== Start to search after idling for 0.8 seconds ===== //
		function searchByKeyword() {
			let val = $('#search').val();
			searchVal = val;
			callLoader();
			topFunction();
			$("#kontainerAnjay").load(`ajaxSearch.php?kata=${val}`, function() {
				removeLoader();
				$('.images-preloader').fadeOut();
			});
		}
		let idleAfterTyping = null;
		$('#search').on('keyup', function() {
			clearTimeout(idleAfterTyping);
			idleAfterTyping = setTimeout(searchByKeyword, 800);
		});
		// ===== End of search section ===== //

		$(function() {
			$("#slider-range").slider({
				range: true,
				step: 1000000,
				min: 100000,
				max: 250000000,
				values: [100000, 250000000],
				slide: function(event, ui) {
					let num1 = new Intl.NumberFormat('id-ID').format(ui.values[0]);
					let num2 = new Intl.NumberFormat('id-ID').format(ui.values[1]);
					$("#amount").val("Rp " + num1 + " - Rp " + num2);
				},
				stop: function(event, ui) {
					let num1 = new Intl.NumberFormat('id-ID').format(ui.values[0]);
					let num2 = new Intl.NumberFormat('id-ID').format(ui.values[1]);
					$("#amount").val("Rp " + num1 + " - Rp " + num2);
					min = ui.values[0];
					max = ui.values[1];
					callLoader();
					$("#kontainerAnjay").load(`ajaxSlider.php?min=${ui.values[0]}&max=${ui.values[1]}`, function() {
						removeLoader();
					});
				}
			});
			$("#amount").val("Rp " + $("#slider-range").slider("values", 0) + " - Rp " + $("#slider-range").slider("values", 1));
		});

		// ===== Codes for pager ===== //
		$(document).on('click', '.pager', function() {
			let id = this.innerHTML;
			callLoader();
			topFunction();
			$("#kontainerAnjay").load(`ajaxShop.php?halaman=${id}`, function() {
				removeLoader();
				$('.images-preloader').fadeOut();
			});
		});
		$(document).on('click', '.sliderPager', function() {
			let id = this.innerHTML;
			callLoader();
			topFunction();
			$("#kontainerAnjay").load(`ajaxSlider.php?min=${min}&max=${max}&halaman=${id}`, function() {
				removeLoader();
				$('.images-preloader').fadeOut();
			});
		});
		$(document).on('click', '.searchPager', function() {
			let id = this.innerHTML;
			callLoader();
			topFunction();
			$("#kontainerAnjay").load(`ajaxSearch.php?halaman=${id}&kata=${searchVal}`, function() {
				removeLoader();
				$('.images-preloader').fadeOut();
			});
		});
		$(document).on('click', '.sortPager', function() {
			let id = this.innerHTML;
			callLoader();
			topFunction();
			$("#kontainerAnjay").load(`ajaxSort.php?halaman=${id}&kata=${sortVal}`, function() {
				removeLoader();
				$('.images-preloader').fadeOut();
			});
		});
		$(document).on('click', '.categorypager', function() {
			let id = this.innerHTML;
			callLoader();
			topFunction();
			$("#kontainerAnjay").load(`ajaxCategory.php?halaman=${id}&kata=${sortVal}&id=${kodeKategori}&stype=${stype}`, function() {
				removeLoader();
				$('.images-preloader').fadeOut();
			});
		});
		// ===== End of codes for pager ===== //

		<?php
		if (isset($_GET['category'])) {
			echo "
			kodeKategori = '" . $_GET['category'] . "';
			$.ajax({
				type: 'POST',
				url: 'ajaxCategory.php?id='+kodeKategori,
				success: function(data) {
					  document.getElementById('kontainerAnjay').innerHTML = data;
					}
				  });";
		} else {
			echo "	$.ajax({
				type: 'POST',
				url: 'ajaxShop.php',
				success: function(data) {
					document.getElementById('kontainerAnjay').innerHTML = data;
		
					$('.images-preloader').fadeOut();
				}
				
			});";
		}
		?>
	</script>
	</body>

</html>