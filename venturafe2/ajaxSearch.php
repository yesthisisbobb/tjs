<?php
include("db/config.php");
include("rupiah.php");
include("get-picture.php");
include("containers.php");
session_start();

	$kataKunci = $_GET['kata'];
	$halaman = 12;
	$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
	$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
	$i = 0;
	$queryTotal = $conn->query("SELECT * FROM  master_sub_grup msg inner join detail_sub_grup dsg on msg.nama = dsg.namagrup inner join master_stok ms on dsg.nama = ms.grupname WHERE msg.namagrup LIKE '%$kataKunci%' OR msg.nama LIKE '%$kataKunci%' OR ms.kodeperusahaan LIKE '%$kataKunci%' OR ms.kodemerk LIKE '%$kataKunci%' OR ms.kode_stok LIKE '%$kataKunci%' OR ms.panjang LIKE '%$kataKunci%' OR ms.lebar LIKE '%$kataKunci%' OR ms.tinggi LIKE '%$kataKunci%'  AND ms.status = 'Active'");
	$total = mysqli_num_rows($queryTotal);
	$pages = ceil($total/$halaman);
	echo "Search Keywords : " .$kataKunci."<br><br>";
	$queryMasterSubGrup = $conn->query("SELECT *, msg.namagrup as jeneng FROM  master_sub_grup msg inner join detail_sub_grup dsg on msg.nama = dsg.namagrup inner join master_stok ms on dsg.nama = ms.grupname WHERE msg.namagrup LIKE '%$kataKunci%' OR msg.nama LIKE '%$kataKunci%' OR ms.kodeperusahaan LIKE '%$kataKunci%' OR ms.kodemerk LIKE '%$kataKunci%' OR ms.kode_stok LIKE '%$kataKunci%' OR ms.panjang LIKE '%$kataKunci%' OR ms.lebar LIKE '%$kataKunci%' OR ms.tinggi LIKE '%$kataKunci%'  AND ms.status = 'Active' ORDER BY msg.namagrup DESC LIMIT $mulai,$halaman");  
	while ($rowMasterSubGrup = mysqli_fetch_assoc($queryMasterSubGrup)) {
		$i++;
		$merk = $rowMasterSubGrup['kodemerk'];
		$jum = 0;
		$namaGrup = $rowMasterSubGrup['jeneng'];
		$kodeProduk = $rowMasterSubGrup['kodetipe'];
		$kodeStok = $rowMasterSubGrup['kode_stok'];

		$file = getProductPicture($kodeProduk);

		$queryMerk = $conn->query("SELECT * FROM master_merk WHERE kode ='$$merk'");
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

		if ($i == 1 || $i == 4 || $i == 7|| $i == 10) {
			echo '<div class="row">';
		}

		echo productContainerv2($kodeProduk, $kodeStok, $namaGrup, getSmallBrandLogo($merk), $file, $harga, $jum, $isFavorite, $showPrice);

		if ($i == 3 || $i == 6 || $i == 9|| $i == 12) {
			echo '</div>';
		}
	}
	if($i<12){
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
			if ($i == $page) echo '<button class="searchPager" id="paging" style = "background:#1ABC9C;border:1px solid #1ABC9C;color:white;border-radius :1px;margin-left:5px;width:45px;height:45px;" class="page-numbers current">'.$i.'</button>';
			else echo '<button class="searchPager" id="paging" style = "background:white;border:1px solid #1ABC9C;color:#1ABC9C;border-radius :1px;width:45px;height:45px;margin-left:5px" class="page-numbers current">'.$i.'</button>';
			$showPage = $i;          
		}
	}
		echo '
	</div>
</div>';
