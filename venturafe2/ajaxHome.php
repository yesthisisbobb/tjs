<?php
include("db/config.php");
include("rupiah.php");
include("get-picture.php");
include("containers.php");
session_start();
		$query = $conn->query("SELECT * FROM master_grup");

		while ($row = mysqli_fetch_assoc($query)) {

			$namaGrup = $row["nama"];
			echo '<section class="featured-hp-1">
						<div class="container" id="'.$namaGrup.'">
							<div class="featured-content woocommerce">
								<h2 class="special-heading">' . $namaGrup . '</h2>
								<div class="content-area">
									';
			$i = 0;
			$queryMasterSubGrup = $conn->query("SELECT *,dsg.nama as jeneng FROM  master_sub_grup msg inner join detail_sub_grup dsg on msg.nama = dsg.namagrup inner join master_stok on dsg.nama = grupname WHERE msg.namagrup = '$namaGrup' ORDER BY RAND() DESC LIMIT 10");
			while ($rowMasterSubGrup = mysqli_fetch_assoc($queryMasterSubGrup)) {
				$i++;
				$merk = $rowMasterSubGrup['kodemerk'];
				$jum = 0;
				$namaKategori = $rowMasterSubGrup['jeneng'];
				$kodeProduk = $rowMasterSubGrup['kodetipe'];
				$kodeStok = $rowMasterSubGrup['kode_stok'];

				$file = getProductPicture($kodeProduk);

				$queryMerk = $conn->query("SELECT * FROM master_merk WHERE kode ='$merk'");
				$dataMerk = mysqli_fetch_assoc($queryMerk);
				$showPrice = $dataMerk['publish'];
				// $showPrice = 0;

				$queryHarga = $conn->query("SELECT * FROM master_price WHERE kode ='$kodeStok'");
				$harga = 0;
				while ($rowHarga = mysqli_fetch_assoc($queryHarga)) {
					$harga = $rowHarga['pls'];
				}

				$queryStok = $conn->query("SELECT * FROM master_shading where kode_stok='$kodeStok' AND (gudang = '1G.PROYEK' OR gudang = '1G DISPLAY SALE' OR gudang = '1G SHOWROOM BRAVAT' OR gudang='1G.DISPLAY KMJ-1' OR gudang = '1G.DISPLAY KMJ-2' OR gudang = '1G.DISTRIBUSI' OR gudang = '1G.RETAILjkt' OR gudang = '1G.TOKO1' OR gudang = '1G.TOKO2' OR gudang = '4G.JAKARTA')");
				while ($rowStok = mysqli_fetch_assoc($queryStok)) {
					$jum += $rowStok["jum"];
				}

				$isFavorite = 0;
				// Favorite
				if (isset($_SESSION['username'])) {
					$queryFavorite = $conn->query("SELECT * FROM fav where user='" . $_SESSION['username'] . "' AND kode='$kodeStok'");
					$isFavorite = mysqli_num_rows($queryFavorite);
				}

				if ($i == 1 || $i == 6 || $i == 11) {
					echo '<div class="row">';
				}

				// echo homeContainer($kodeProduk, $kodeStok, $namaGrup, $namaKategori, $file, $harga, $jum, $isFavorite);
				echo homeContainerv2($kodeProduk, $kodeStok, $namaGrup, $namaKategori, $file, $harga, $jum, $showPrice);

				if ($i == 5 || $i == 10 || $i == 15) {
					echo '</div>';
				}
			}

					echo'</div>
							<div class="view-all">
								<a href="shop.php?category='.$namaGrup.'" class="au-btn btn-small">View All<i class="zmdi zmdi-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</section>
			<!-- End Featured Sale Section -->';
		}
		?>