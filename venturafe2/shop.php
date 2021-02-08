<?php
include("db/config.php");
include("rupiah.php");
$queryTotal = $conn->query("SELECT * FROM  master_sub_grup msg inner join detail_sub_grup dsg on UPPER(msg.nama) = UPPER(dsg.namagrup) inner join master_stok ms on UPPER(dsg.nama) = UPPER(ms.grupname) WHERE ms.status = 'Active' ORDER BY msg.namagrup");
$total = mysqli_num_rows($queryTotal);
?>
<!DOCTYPE html>
<html>

<head>
	<title>SMB | Shop</title>
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
								<button type="button" class="btn btn-link" id="clear-filter" style="color:gray;"><i class="fas fa-ban"></i> Clear Filter</button>
								<select name="orderby" id="sort" class="orderby">
									<option value="none">--Sort--</option>
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
								<input type="texts" id="search" name="search" class="search-field" placeholder="Type here to search">
								<i class="zmdi zmdi-search search-submit"></i>
							</form>
						</div>
						<div id="search-filters">
							<div id="search-header"><i class="fas fa-chevron-down"></i>Search by</div>
							<div id="search-options">
								<div class="search-item" value="type">
									<div class="search-checkbox filter-checked"></div>Type
								</div>
								<div class="search-item" value="code">
									<div class="search-checkbox"></div>Code
								</div>
								<div class="search-item" value="brand">
									<div class="search-checkbox"></div>Brand
								</div>
							</div>
						</div>
						<!-- Filter -->
						<div class="widget_price_filter">
							<h3 class="widget-title">Filter By Price</h3>
							<div id="price-filter">
								<div class="price-input">
									<span>Min</span>
									<input type="number" id="min">
								</div>
								<div class="price-input">
									<span>Max</span>
									<input type="number" id="max">
								</div>
							</div>
							<div id="price-apply">
								<button id="price-button" type="button" class="btn btn-outline-dark">Apply</button>
							</div>
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
	<?php include("floating-cart.php"); ?>
	<?php include('headerdkk/footer.php') ?>

	<script>
		let searchFilterOptionsVisible = false;
		let valArr = {
			"sortVal": "",
			"searchVal": "",
			"searchBy": "",
			"categoryType": "",
			"categoryCode": "",
			"min": 100000,
			"max": 250000000
		};
		let statesArr = {
			"isSorted": false,
			"isSearched": false,
			"isCategorized": false,
			"isFilteredByPrice": false
		};

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

		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}

		function callLoader() {
			// Ngambil Loader
			$("#kontainerAnjay").css({
				"display": "flex",
				"justify-content": "center",
				"padding-bottom": "48px"
			});
			$("#kontainerAnjay").html('<div id="shop-loader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>');
			$("#shop-loader").css("display", "inline-block");
		}

		function removeLoader() {
			$("#shop-loader").css("display", "none");
			$("#kontainerAnjay").css("display", "block");
			$("#kontainerAnjay").css("padding-bottom", "0");
		}

		$("#clear-filter").click(function() {
			statesArr["isSorted"] = false;
			statesArr["isSearched"] = false;
			statesArr["isCategorized"] = false;
			statesArr["isFilteredByPrice"] = false;
			sessionStorage.removeItem("isSorted");
			sessionStorage.removeItem("isSearched");
			sessionStorage.removeItem("isCategorized");
			sessionStorage.removeItem("isFilteredByPrice");

			sessionStorage.removeItem("sortVal");
			sessionStorage.removeItem("searchVal");
			sessionStorage.removeItem("searchBy");
			sessionStorage.removeItem("categoryType");
			sessionStorage.removeItem("categoryCode");
			sessionStorage.removeItem("min");
			sessionStorage.removeItem("max");

			sessionStorage.removeItem("page");

			$("#sort").val("none");
			$("#search").val("");
			// $("#slider-range").slider({
			// 	values: [0, 250000000]
			// });
			$("#amount").val("Rp 0 - Rp 250.000.000");
			$('.tombol-category span').removeClass("category-active");

			let jsonVal = JSON.stringify({});
			let jsonStates = JSON.stringify(statesArr);

			callLoader();

			$("#kontainerAnjay").load(`searchEngine.php?vals=${jsonVal}&states=${jsonStates}`, function() {
				removeLoader();
			});
		});

		$("#search-header").click(function() {
			if (!searchFilterOptionsVisible) {
				searchFilterOptionsVisible = true;
				$("#search-header i").addClass("filter-active");
				$("#search-options").css("height", "auto");
			} else {
				searchFilterOptionsVisible = false;
				$("#search-header i").removeClass("filter-active");
				$("#search-options").css("height", "0px");
			}
		});

		$(".search-item").click(function() {
			$(".search-item .search-checkbox").removeClass("filter-checked");
			$(this).find(".search-checkbox").addClass("filter-checked");

			valArr["searchBy"] = $(this).attr("value");
			sessionStorage.setItem("searchBy", $(this).attr("value"));

			if ($('#search').val() != "") {
				let jsonVal = JSON.stringify(valArr);
				let jsonStates = JSON.stringify(statesArr);

				callLoader();
				topFunction();
				$("#kontainerAnjay").load(`searchEngine.php?vals=${jsonVal}&states=${jsonStates}`, function() {
					removeLoader();
					$('.images-preloader').fadeOut();
				});
			}
		});

		$('#sort').on('change', function() {
			statesArr["isSorted"] = true;
			sessionStorage.setItem("isSorted", true);
			if ($(this).val() === "none") {
				statesArr["isSorted"] = false;
				sessionStorage.removeItem("isSorted");
			}

			let val = $('#sort').val();
			valArr["sortVal"] = val;
			sessionStorage.setItem("sortVal", val);

			let jsonVal = JSON.stringify(valArr);
			let jsonStates = JSON.stringify(statesArr);

			callLoader();

			$("#kontainerAnjay").load(`searchEngine.php?vals=${jsonVal}&states=${jsonStates}`, function() {
				removeLoader();
			});
		});

		$(document).on('click', '.tombol-category', function(e) {
			e.preventDefault();
			statesArr["isCategorized"] = true;
			sessionStorage.setItem("isCategorized", true);

			$('.tombol-category span').removeClass("category-active");
			$(this).children("span").addClass("category-active");

			valArr["categoryCode"] = this.id;
			valArr["categoryType"] = $(this).attr("stype");
			sessionStorage.setItem("categoryCode", this.id);
			sessionStorage.setItem("categoryType", $(this).attr("stype"));

			let jsonVal = JSON.stringify(valArr);
			let jsonStates = JSON.stringify(statesArr);

			callLoader();
			topFunction();

			$("#kontainerAnjay").load(`searchEngine.php?vals=${jsonVal}&states=${jsonStates}`, function() {
				removeLoader();
			});
		});

		// ===== Start to search after idling for 0.8 seconds ===== //
		function searchByKeyword() {
			let val = $('#search').val();
			statesArr["isSearched"] = true;
			sessionStorage.setItem("isSearched", true);
			if (val === "") {
				statesArr["isSearched"] = false;
				sessionStorage.removeItem("isSearched");
			}

			valArr["searchVal"] = encodeURIComponent(val);
			sessionStorage.setItem("searchVal", encodeURIComponent(val));

			let jsonVal = JSON.stringify(valArr);
			let jsonStates = JSON.stringify(statesArr);

			callLoader();
			topFunction();
			$("#kontainerAnjay").load(`searchEngine.php?vals=${jsonVal}&states=${jsonStates}`, function() {
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

		// Price Filter
		$("#min").click(function() {
			$("#min").attr("type", "number");
			$("#min").val(min);
			$("#min").select();
		});
		$("#max").click(function() {
			$("#max").attr("type", "number");
			$("#max").val(max);
			$("#max").select();
		});
		$("#price-button").click(function() {
			min = parseInt($("#min").val());
			max = parseInt($("#max").val());
			// max = 250000000;

			if (min) {
				$("#min").attr("type", "text");
				$("#min").val(new Intl.NumberFormat('id-ID').format(min));
			}
			if (max) {
				$("#max").attr("type", "text");
				$("#max").val(new Intl.NumberFormat('id-ID').format(max));
			}

			statesArr["isFilteredByPrice"] = true;
			sessionStorage.setItem("isFilteredByPrice", true);

			valArr["min"] = min;
			valArr["max"] = max;
			sessionStorage.setItem("min", min);
			sessionStorage.setItem("max", max);

			let jsonVal = JSON.stringify(valArr);
			let jsonStates = JSON.stringify(statesArr);

			console.log(`searchEngine.php?vals=${jsonVal}&states=${jsonStates}`);

			callLoader();
			$("#kontainerAnjay").load(`searchEngine.php?vals=${jsonVal}&states=${jsonStates}`, function() {
				removeLoader();
			});
		});
		// $(function() {
		// 	$("#slider-range").slider({
		// 		range: true,
		// 		step: 500000,
		// 		min: 0,
		// 		max: 250000000,
		// 		values: [0, 2500000000],
		// 		slide: function(event, ui) {
		// 			let num1 = new Intl.NumberFormat('id-ID').format(ui.values[0]);
		// 			let num2 = new Intl.NumberFormat('id-ID').format(ui.values[1]);
		// 			$("#amount").val("Rp " + num1 + " - Rp " + num2);
		// 		},
		// 		stop: function(event, ui) {
		// 			statesArr["isFilteredByPrice"] = true;
		// 			sessionStorage.setItem("isFilteredByPrice", true);

		// 			let num1 = new Intl.NumberFormat('id-ID').format(ui.values[0]);
		// 			let num2 = new Intl.NumberFormat('id-ID').format(ui.values[1]);
		// 			$("#amount").val("Rp " + num1 + " - Rp " + num2);

		// 			valArr["min"] = ui.values[0];
		// 			valArr["max"] = ui.values[1];
		// 			sessionStorage.setItem("min", ui.values[0]);
		// 			sessionStorage.setItem("max", ui.values[1]);

		// 			let jsonVal = JSON.stringify(valArr);
		// 			let jsonStates = JSON.stringify(statesArr);

		// 			callLoader();
		// 			$("#kontainerAnjay").load(`searchEngine.php?vals=${jsonVal}&states=${jsonStates}`, function() {
		// 				removeLoader();
		// 			});
		// 		}
		// 	});
		// 	$("#amount").val("Rp " + $("#slider-range").slider("values", 0) + " - Rp " + $("#slider-range").slider("values", 1));
		// });

		// ===== Codes for pager ===== //
		$(document).on('click', '.pager', function() {
			let id = this.innerHTML;
			sessionStorage.setItem("page", id);

			let jsonVal = JSON.stringify(valArr);
			let jsonStates = JSON.stringify(statesArr);

			callLoader();
			topFunction();
			$("#kontainerAnjay").load(`searchEngine.php?halaman=${id}&vals=${jsonVal}&states=${jsonStates}`, function() {
				removeLoader();
				$('.images-preloader').fadeOut();
			});
		});
		// ===== End of codes for pager ===== //

		// "sortVal": "",
		// "searchVal": "",
		// "searchBy": "",
		// "categoryType": "",
		// "categoryCode": "",
		// "min": 100000,
		// "max": 250000000

		// "isSorted": false,
		// "isSearched": false,
		// "isCategorized": false,
		// "isFilteredByPrice": false
		if (sessionStorage.getItem("isSorted") || sessionStorage.getItem("isSearched") || sessionStorage.getItem("isCategorized") || sessionStorage.getItem("isFilteredByPrice")) {
			if (valArr["sortVal"] = sessionStorage.getItem("sortVal")) {
				$("#sort").val(valArr["sortVal"]);
			}
			if (valArr["searchVal"] = sessionStorage.getItem("searchVal")) {
				$("#search").val(decodeURIComponent(valArr["searchVal"]));
			}
			if (valArr["searchBy"] = sessionStorage.getItem("searchBy")) {
				$(".search-item .search-checkbox").removeClass("filter-checked");
				$(`.search-item[value=${valArr['searchBy']}] .search-checkbox`).addClass("filter-checked");
			}
			if ((valArr["categoryType"] = sessionStorage.getItem("categoryType")) && (valArr["categoryCode"] = sessionStorage.getItem("categoryCode"))) {
				$('.tombol-category span').removeClass("category-active");
				$(`#${valArr["categoryCode"]} span`).addClass("category-active");
			}
			if (!isNaN(sessionStorage.getItem("min"))) {
				console.log("masuk min");
				valArr["min"] = sessionStorage.getItem("min");
				$("#min").attr("type", "text");
				$("#min").val(new Intl.NumberFormat('id-ID').format(valArr["min"]));
			}
			if (!isNaN(sessionStorage.getItem("max"))) {
				valArr["max"] = sessionStorage.getItem("max");
				$("#max").attr("type", "text");
				$("#max").val(new Intl.NumberFormat('id-ID').format(valArr["max"]));
				console.log("masuk max", valArr["max"], new Intl.NumberFormat('id-ID').format(valArr["max"]));
			}
			let current_page = 1;
			if (sessionStorage.getItem("page")) current_page = sessionStorage.getItem("page");

			statesArr["isSorted"] = sessionStorage.getItem("isSorted");
			statesArr["isSearched"] = sessionStorage.getItem("isSearched");
			statesArr["isCategorized"] = sessionStorage.getItem("isCategorized");
			statesArr["isFilteredByPrice"] = sessionStorage.getItem("isFilteredByPrice");

			let jsonVal = JSON.stringify(valArr);
			let jsonStates = JSON.stringify(statesArr);

			callLoader();
			$("#kontainerAnjay").load(`searchEngine.php?halaman=${current_page}&vals=${jsonVal}&states=${jsonStates}`, function() {
				removeLoader();
			});
		} else if (getUrlParameter("category")) {
			statesArr['isCategorized'] = true;
			sessionStorage.setItem("isCategorized", true);

			valArr['categoryType'] = "main";
			valArr['categoryCode'] = getUrlParameter("category");
			sessionStorage.setItem("categoryType", "main");
			sessionStorage.setItem("categoryCode", getUrlParameter("category"));

			let jsonVal = JSON.stringify(valArr);
			let jsonStates = JSON.stringify(statesArr);

			callLoader();
			$("#kontainerAnjay").load(`searchEngine.php?vals=${jsonVal}&states=${jsonStates}`, function() {
				removeLoader();
			});
		} else if (getUrlParameter("brand")) {
			statesArr['isCategorized'] = true;
			sessionStorage.setItem("isCategorized", true);

			valArr['categoryType'] = "merk";
			valArr['categoryCode'] = getUrlParameter("brand");
			sessionStorage.setItem("categoryType", "merk");
			sessionStorage.setItem("categoryCode", getUrlParameter("brand"));

			let jsonVal = JSON.stringify(valArr);
			let jsonStates = JSON.stringify(statesArr);

			callLoader();
			$("#kontainerAnjay").load(`searchEngine.php?vals=${jsonVal}&states=${jsonStates}`, function() {
				removeLoader();
			});
		} else {
			let jsonVal = JSON.stringify(valArr);
			let jsonStates = JSON.stringify(statesArr);

			callLoader();
			$("#kontainerAnjay").load(`searchEngine.php?vals=${jsonVal}&states=${jsonStates}`, function() {
				removeLoader();
			});
		}
	</script>
	</body>

</html>