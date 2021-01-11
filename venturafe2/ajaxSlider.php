<?php
include("db/config.php");
include("rupiah.php");
include("get-picture.php");
include("containers.php");
session_start();

	$halaman = 12;
	$min = $_GET['min'];
	$max = $_GET['max'];
	$orderby = "ORDER BY mp.pls DESC";
	$sorting = "";
	if(isset($sorting) && $sorting == "low") {
		$sorting = $_POST["sort"];
		$orderby = "ORDER BY mp.pls ASC";
	}
	$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
	$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
	$i = 0;
	$queryTotal = $conn->query("SELECT msg.nama as grup, ms.grupname as grup_dtl, ms.alias as alias, ms.kodetipe as nama, ms.kode_stok as kode, ms.kodemerk as merk FROM master_sub_grup msg, detail_sub_grup dsg, master_stok ms, master_price mp WHERE msg.nama = dsg.namagrup AND dsg.nama = ms.grupname AND ms.kode_stok = mp.kode AND ms.status = 'Active' AND mp.pls BETWEEN $min AND $max");
	$total = mysqli_num_rows($queryTotal);
	$pages = ceil($total/$halaman);
	$queryMasterSubGrup = $conn->query("SELECT msg.nama as grup, ms.grupname as grup_dtl, ms.alias as alias, ms.kodetipe as nama, ms.kode_stok as kode, ms.kodemerk as merk FROM master_sub_grup msg, detail_sub_grup dsg, master_stok ms, master_price mp WHERE msg.nama = dsg.namagrup AND dsg.nama = ms.grupname AND ms.kode_stok = mp.kode AND ms.status = 'Active' AND mp.pls BETWEEN $min AND $max " . $orderby . " LIMIT $mulai, $halaman");
	while ($rowMasterSubGrup = mysqli_fetch_assoc($queryMasterSubGrup)) {
		$i++;
		$jum = 0;
		$merk = $rowMasterSubGrup['merk'];
		$namaGrup = $rowMasterSubGrup['grup'];
		$kodeProduk = $rowMasterSubGrup['nama'];
		$kodeStok = $rowMasterSubGrup['kode'];

		$file = getProductPicture($kodeProduk);

		$queryMerk = $conn->query("SELECT * FROM master_merk WHERE kode ='$merk'");
		$dataMerk = mysqli_fetch_assoc($queryMerk);
		$showPrice = $dataMerk['publish'];

		$queryHarga = $conn->query("SELECT * FROM master_price WHERE kode ='$kodeStok'");
		$harga = 0;
		while ($rowHarga = mysqli_fetch_assoc($queryHarga)) {
			$harga = $rowHarga['pls'];
		}

		$queryStok = $conn->query("SELECT * FROM master_shading where kode_stok='$kodeStok'");
		while ($rowStok = mysqli_fetch_assoc($queryStok)) {
			$jum += $rowStok["jum"];
		}

		// Favorite
		$isFavorite = 0;
		if (isset($_SESSION['username'])) {
			$queryFavorite = $conn->query("SELECT * FROM fav where user='" . $_SESSION['username'] . "' AND kode='$kodeStok'");
			$isFavorite = mysqli_num_rows($queryFavorite);
		}

		if ($i %3==1 && $rowMasterSubGrup['alias'] != "Big Slab") {
			echo '<div class="row">';
		}

		echo productContainerv2($kodeProduk, $kodeStok, $namaGrup, getSmallBrandLogo($merk), $file, $harga, $jum, $isFavorite, $showPrice);

		if ($i %3==0) {
			echo '</div>';
		}
	}
	if($i < 12) {
		echo "</div>";
	}
	echo '<div class="navigation pagination">
	<div class="page-numbers">';

	$showPage = 0;
	for($i=1;$i<=$pages;$i++){

		if ((($i >= $page - 3) && ($i <= $page + 3)) || ($i == 1) || ($i == $pages)) 
		{   
			if (($showPage == 1) && ($i != 2))  echo "<label style = 'margin-left :5px;font-weight:bold;color:#1ABC9C'> . . . </label>"; 
			if (($showPage != ($pages - 1)) && ($i == $pages))  echo "<label style = 'margin-left :5px;font-weight:bold;color:#1ABC9C'> . . . </label>";
			if ($i == $page) echo '<button class="sliderPager" id="paging" style = "background:#1ABC9C;border:1px solid #1ABC9C;color:white;border-radius :1px;margin-left:5px;width:45px;height:45px;" class="page-numbers current">'.$i.'</button>';
			else echo '<button class="sliderPager" id="paging" style = "background:white;border:1px solid #1ABC9C;color:#1ABC9C;border-radius :1px;width:45px;height:45px;margin-left:5px" class="page-numbers current">'.$i.'</button>';
			$showPage = $i;          
		}
	}

		echo '
	</div>
</div>';
