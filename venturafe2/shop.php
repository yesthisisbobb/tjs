<?php
include("db/config.php");
include("rupiah.php");
$queryTotal = $conn->query("SELECT ms.kodetipe FROM  master_sub_grup msg inner join detail_sub_grup dsg on UPPER(msg.nama) = UPPER(dsg.namagrup) inner join master_stok ms on UPPER(dsg.nama) = UPPER(ms.grupname) WHERE ms.status = 'Active' ORDER BY msg.namagrup");
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
						<div id="kontainerAnjay">

						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
					<div class="widget-area">
						<!-- Search -->
						<div class="widget widget_search">
							<div class="ui-widget">
								<input type="texts" id="search" name="search" class="search-field ui-autocomplete-input" placeholder="Type here to search" autocomplete="off">
							</div>
							<i class="zmdi zmdi-search search-submit"></i>
						</div>

						<!-- Filter -->
						<div class="widget_price_filter" id="pr">
							<div class="category-dropdown">
								<h3>Price</h3>
							</div>
							<select class="filters" id="prf">
								<option value="none">All</option>
								<option value="lth">Low to High</option>
								<option value="htl">High to Low</option>
								<option value="be1">Below 100k</option>
								<option value="ab1">Above 100k</option>
								<option value="be2">Below 1.000k</option>
								<option value="ab2">Above 1.000k</option>
							</select>
						</div>

						<!-- Stock -->
						<div class="widget widget_product_categories">
							<div class="category-dropdown">
								<h3>Availability</h3>
							</div>
							<select class="filters" id="avf">
								<option value="none">All</option>
								<option value="rdy">Ready</option>
								<option value="idt">Indent</option>
							</select>
						</div>

						<!-- Categories -->
						<div class="widget widget_product_categories" id="cg">
							<div class="category-dropdown">
								<h3>Category</h3>
							</div>
							<select stype="main" class="filters" id="caf">
								<option value="none">All</option>
								<?php
								$command = "SELECT DISTINCT msg.namagrup as nama FROM master_stok ms, master_sub_grup msg, detail_sub_grup dsg WHERE ms.grupname = dsg.nama AND dsg.namagrup = msg.nama";
								$query = mysqli_query($conn, $command);
								while ($row = mysqli_fetch_assoc($query)) {
									echo 	"<option value='" . $row["nama"] . "'>
												" . $row["nama"] . "
											</option>";
								}
								?>
							</select>
						</div>

						<!-- Brands -->
						<div class="widget widget_product_categories" id="cb">
							<div class="category-dropdown">
								<h3>Brands</h3>
							</div>
							<select stype="merk" class="filters" id="brf">
								<option value="none">All</option>
								<?php
								$command = "SELECT DISTINCT UPPER(mm.nama) as nama, UPPER(mm.kode) as kode FROM master_stok ms, master_merk mm WHERE ms.kodemerk = mm.kode";
								$query = mysqli_query($conn, $command);
								while ($row = mysqli_fetch_assoc($query)) {
									echo 	"<option value='" . $row["kode"] . "'>
												" . $row["nama"] . "
											</option>";
								}
								?>
							</select>
						</div>

						<!-- Color -->
						<div class="widget widget_product_categories" id="cc">
							<div class="category-dropdown">
								<h3>Color</h3>
							</div>
							<select stype="color" class="filters" id="cof">
								<option value="none">All</option>
								<?php
								$command = "SELECT DISTINCT mt.color as color FROM master_stok ms, master_tipe mt WHERE ms.kodetipe = mt.kode";
								$query = mysqli_query($conn, $command);
								while ($row = mysqli_fetch_assoc($query)) {
									echo 	"<option value='" . $row["color"] . "'>
												" . $row["color"] . "
											</option>";
								}
								?>
								<option value="BEIGE">
									BEIGE
								</option>
							</select>
						</div>

						<!-- Pattern -->
						<div class="widget widget_product_categories" id="cp">
							<div class="category-dropdown">
								<h3>Pattern</h3>
							</div>
							<select stype="pattern" class="filters" id="paf">
								<option value="none">All</option>
								<?php
								$command = "SELECT DISTINCT mt.pattern as pattern FROM master_stok ms, master_tipe mt WHERE ms.kodetipe = mt.kode";
								$query = mysqli_query($conn, $command);
								while ($row = mysqli_fetch_assoc($query)) {
									echo 	"<option value='" . $row["pattern"] . "'>
												" . $row["pattern"] . "
											</option>";
								}
								?>
							</select>
						</div>

						<!-- Clear filter -->
						<div style="display:flex;justify-content:space-around;margin-bottom:6px;">
							<button type="button" class="btn btn-link" id="clear-filter" style="color:gray;"><i class="fas fa-ban"></i> Clear Filter</button>
							<div id="filter-apply">
								<button type="button" class="btn btn-success waves-effect waves-light">Search</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("floating-cart.php"); ?>
	<?php include('headerdkk/footer.php') ?>

	<script>
		let autocompleteArr = [];
		let categoryArr = [];
		let valArr = {
			"searchVal": "",
			"priceVal": "",
			"availVal": "",
			"category": {}
		};
		let statesArr = {
			"isSearched": false,
			"isFilteredByPrice": false,
			"isFilteredByAvail": false,
			"isCategorized": false
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

		function loadShopContents(type, page) {
			// Debugging table contents
			console.table("valArr", valArr);
			console.table("statesArr", statesArr);

			if (type === "no-page") {
				let jsonVal = JSON.stringify(valArr);
				let jsonStates = JSON.stringify(statesArr);

				callLoader();
				topFunction();
				$("#kontainerAnjay").load(`searchEngine.php?vals=${jsonVal}&states=${jsonStates}`, function() {
					removeLoader();
				});
			} else if (type === "with-page") {
				let jsonVal = JSON.stringify(valArr);
				let jsonStates = JSON.stringify(statesArr);

				callLoader();
				topFunction();
				$("#kontainerAnjay").load(`searchEngine.php?halaman=${page}&vals=${jsonVal}&states=${jsonStates}`, function() {
					removeLoader();
				});
			} else if (type === "clear") {
				let jsonVal = JSON.stringify({});
				let jsonStates = JSON.stringify(statesArr);

				callLoader();
				topFunction();
				$("#kontainerAnjay").load(`searchEngine.php?vals=${jsonVal}&states=${jsonStates}`, function() {
					removeLoader();
				});
			}
		}

		function addToCategoryArr(code, stype) {
			if (categoryArr.length > 0) {
				let existsInCategoryArr = false;
				let toBeRemovedIdx = -1;

				for (let i = 0; i < categoryArr.length; i++) {
					const idx = categoryArr[i];
					if (idx["categoryType"] === encodeURIComponent(stype)) {
						if (idx["categoryCode"] === "none") {
							toBeRemovedIdx = i;
						} else {
							existsInCategoryArr = true;
							categoryArr[i]["categoryCode"] = encodeURIComponent(code);
						}
						break;
					}
				}

				if (!existsInCategoryArr) {
					categoryArr.push({
						"categoryCode": encodeURIComponent(code),
						"categoryType": encodeURIComponent(stype)
					});
				}

				console.table("before", categoryArr);
				if (toBeRemovedIdx > -1) {
					console.log("masuk splice");
					let rData = categoryArr.splice(toBeRemovedIdx, 1);
					console.log("rData", rData);
					categoryArr[rData["categoryType"]] = "";
				}
				console.table("after", categoryArr);
			} else {
				categoryArr.push({
					"categoryCode": encodeURIComponent(code),
					"categoryType": encodeURIComponent(stype)
				});
			}

			valArr["category"] = JSON.stringify(categoryArr);
			sessionStorage.setItem("category", JSON.stringify(categoryArr));
		}

		$(".filters").change(function() {
			// let valArr = {
			// 	"searchVal": "",
			// 	"priceVal": "",
			// 	"availVal": "",
			// 	"category": {}
			// };
			// let statesArr = {
			// 	"isSearched": false,
			// 	"isFilteredByPrice": false,
			// 	"isFilteredByAvail": false,
			// 	"isCategorized": false
			// };
			let id = this.id;
			let value = $(`#${this.id}`).val();
			console.log(id, value);

			if (id === "prf") {
				if (value != "none") {
					statesArr["isFilteredByPrice"] = true;
					sessionStorage.setItem("isFilteredByPrice", true);

					valArr["priceVal"] = value;
					sessionStorage.setItem("priceVal", value);
				} else {
					statesArr["isFilteredByPrice"] = false;
					sessionStorage.removeItem("isFilteredByPrice");

					valArr["priceVal"] = "";
					sessionStorage.removeItem("priceVal");
				}
			} else if (id === "avf") {
				if (value != "none") {
					statesArr["isFilteredByAvail"] = true;
					sessionStorage.setItem("isFilteredByAvail", true);

					valArr["availVal"] = value;
					sessionStorage.setItem("availVal", value);
				} else {
					statesArr["isFilteredByAvail"] = false;
					sessionStorage.removeItem("isFilteredByAvail");

					valArr["availVal"] = "";
					sessionStorage.removeItem("availVal");
				}
			} else if (id === "caf" || id === "brf" || id === "cof" || id === "paf") {
				if (value === "none") {
					statesArr["isCategorized"] = false;
					sessionStorage.removeItem("isCategorized");

					addToCategoryArr(value, $(`#${id}`).attr("stype"));
				} else {
					statesArr["isCategorized"] = true;
					sessionStorage.setItem("isCategorized", true);

					addToCategoryArr(value, $(`#${id}`).attr("stype"));
				}
			}
		});

		$("#clear-filter").click(function() {
			statesArr["isSearched"] = false;
			statesArr["isFilteredByPrice"] = false;
			statesArr["isFilteredByAvail"] = false;
			statesArr["isCategorized"] = false;
			sessionStorage.removeItem("isSearched");
			sessionStorage.removeItem("isFilteredByPrice");
			sessionStorage.removeItem("isFilteredByAvail");
			sessionStorage.removeItem("isCategorized");

			sessionStorage.removeItem("searchVal");
			sessionStorage.removeItem("priceVal");
			sessionStorage.removeItem("availVal");
			sessionStorage.removeItem("category");

			sessionStorage.removeItem("page");

			$("#search").val("");
			$("#prf").val("none");
			$("#avf").val("none");
			$("#caf").val("none");
			$("#brf").val("none");
			$("#cof").val("none");
			$("#paf").val("none");

			loadShopContents("clear", 0)
		});

		// ===== Search & Autocomplete ===== //
		// Search baru
		$("#search").change(function() {
			let val = $('#search').val();
			statesArr["isSearched"] = true;
			sessionStorage.setItem("isSearched", true);
			if (val === "") {
				valArr["searchVal"] = "";
				statesArr["isSearched"] = false;
				sessionStorage.removeItem("isSearched");
				sessionStorage.removeItem("searchVal");
			}

			valArr["searchVal"] = encodeURIComponent(val);
			sessionStorage.setItem("searchVal", encodeURIComponent(val));

			loadShopContents("no-page", 0);
		});
		$(function() {
			$("#search").autocomplete({
				delay: 800,
				source: "autocompleteData.php",
				change: function() {
					console.log($("#search").val());
				}
			});
		});
		// ===== End of search section ===== //

		// ===== Codes for pager ===== //
		$(document).on('click', '.pager', function() {
			let id = this.innerHTML;
			sessionStorage.setItem("page", id);

			loadShopContents("with-page", id);
		});
		// ===== End of codes for pager ===== //

		// let valArr = {
		// 	"searchVal": "",
		// 	"priceVal": "",
		// 	"availVal": "",
		// 	"category": {}
		// };
		// let statesArr = {
		// 	"isSearched": false,
		// 	"isFilteredByPrice": false,
		// 	"isFilteredByAvail": false,
		// 	"isCategorized": false
		// };
		if (sessionStorage.getItem("isSearched") || sessionStorage.getItem("isCategorized") || sessionStorage.getItem("isFilteredByPrice") || sessionStorage.getItem("isFilteredByAvail")) {
			if (valArr["searchVal"] = sessionStorage.getItem("searchVal")) {
				$("#search").val(decodeURIComponent(valArr["searchVal"]));
			}
			if (valArr["priceVal"] = sessionStorage.getItem("priceVal")) {
				$("#prf").val(valArr["priceVal"]);
			}
			if (valArr["availVal"] = sessionStorage.getItem("availVal")) {
				$("#avf").val(valArr["availVal"]);
			}
			if ((valArr["category"] = sessionStorage.getItem("category"))) {
				let firstParse = JSON.parse(valArr["category"]);
				firstParse.forEach(item => {
					categoryArr.push({
						"categoryCode": item["categoryCode"],
						"categoryType": item["categoryType"]
					});
					$(`select[stype=${item["categoryType"]}]`).val(`${decodeURIComponent(item["categoryCode"])}`);
				});
			}
			let current_page = 1;
			if (sessionStorage.getItem("page")) current_page = sessionStorage.getItem("page");

			statesArr["isSearched"] = sessionStorage.getItem("isSearched");
			statesArr["isCategorized"] = sessionStorage.getItem("isCategorized");
			statesArr["isFilteredByPrice"] = sessionStorage.getItem("isFilteredByPrice");
			statesArr["isFilteredByAvail"] = sessionStorage.getItem("isFilteredByAvail");

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

			loadShopContents("no-page", 0);
		} else if (getUrlParameter("brand")) {
			statesArr['isCategorized'] = true;
			sessionStorage.setItem("isCategorized", true);

			valArr['categoryType'] = "merk";
			valArr['categoryCode'] = getUrlParameter("brand");
			sessionStorage.setItem("categoryType", "merk");
			sessionStorage.setItem("categoryCode", getUrlParameter("brand"));

			loadShopContents("no-page", 0);
		} else {
			loadShopContents("no-page", 0);
		}
		$(document).ready(function() {
			// Apply filter on click for category
			$("#filter-apply button").click(function() {
				loadShopContents("no-page", 0);
			});
		});
	</script>
	</body>

</html>