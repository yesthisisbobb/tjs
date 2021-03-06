<?php

use function PHPSTORM_META\type;

include("db/config.php");
include("api/bridge.php");
include("rupiah.php");
include("get-picture.php");
include("containers.php");
session_start();

// Variable Name Reference
// let valArr = {
// 			"sortVal": "",
// 			"searchVal": "",
//          "searchBy": "",
// 			"categoryType": "",
// 			"categoryCode": "",
// 			"min": 100000,
//           "max": 250000000
// };
// let statesArr = {
//     "isSorted": false,
//     "isSearched": false,
//     "isCategorized": false,
//     "isFilteredByPrice": false
// };

// Query related variables
$contentPerPage = 18;
$itemsPerRow = 3;
$currentPage = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$firstItemIndex = ($currentPage > 1) ? ($currentPage * $contentPerPage) - $contentPerPage : 0;

$valRawData = $_GET['vals'];
$statesRawData = $_GET['states'];

$valData = json_decode($valRawData, true);
$statesData = json_decode($statesRawData, true);

$masterQuery = "";
$selects = "SELECT ms.kodetipe AS tipe, ms.kode_stok AS kode, ms.kodemerk AS merk, ms.panjang AS p, ms.lebar AS l, ms.tinggi AS t, ms.tebal AS tebal, msg.namagrup AS grup";
$froms = "FROM master_sub_grup msg, detail_sub_grup dsg, master_stok ms";
$wheres = "WHERE ms.status='Active' AND msg.nama = dsg.namagrup AND dsg.nama = ms.grupname";
if ($statesData["isCategorized"]) {
    // echo "masuk kategori" . " ||";

    $catData = json_decode($valData["category"], true);
    foreach ($catData as $data) {
        $ctypeVal = $data["categoryType"];
        $catVal = $data["categoryCode"];
        
        if ($ctypeVal == "main") $wheres .= " AND msg.namagrup = '$catVal'";
        if ($ctypeVal == "merk") $wheres .= " AND ms.kodemerk = '$catVal'";
        if ($ctypeVal == "color") {
            $froms .= ", master_tipe mt";
            $wheres .= " AND mt.kode = ms.kodetipe AND mt.color = '$catVal'";
        }
        if ($ctypeVal == "pattern") {
            $froms .= ", master_tipe mt";
            $wheres .= " AND mt.kode = ms.kodetipe AND mt.pattern = '$catVal'";
        }
    }
}
if ($statesData["isSearched"]) {
    // echo "masuk search" . " ||";
    $searchVal = trim($valData["searchVal"]);
    echo $searchVal;
    // if ($searchBy == "type") {
    //     $wheres .= " AND ms.kodetipe LIKE '%$searchVal%'";
    // }
    // else if($searchBy == "code"){
    //     $wheres .= " AND ms.kode_stok LIKE '%$searchVal%'";
    // }
    // else if($searchBy == "brand"){
    //     $wheres .= " AND ms.kodemerk LIKE '%$searchVal%'";
    // }
    // else{
    //     $wheres .= " AND ms.kodetipe LIKE '%$searchVal%'";
    // }
}
if ($statesData["isFilteredByPrice"]){
    if ($max < 1) {
        echo "- Masuk max lebih kecil 0, ";
        $max = 250000000; // Max 250jt klo kosong
    }
    $wheres .= " AND mp.pls BETWEEN $min AND $max";
}
if (!$statesData["isFilteredByPrice"] && !$statesData["isSearched"] && !$statesData["isCategorized"]) {
    $wheres .= " ORDER BY RAND()";
}
$masterQuery = "$selects $froms $wheres";

// echo $masterQuery;
$queryTotal = $conn->query($masterQuery);
$total = 0;
if ($queryTotal) $total = mysqli_num_rows($queryTotal);

if ($total > 0) {
    $numOfPages = ceil($total / $contentPerPage);

    $shownindex1 = $firstItemIndex + 1;
    $shownindex2 = $firstItemIndex + 18;
    echo "<p class='woocommerce-result-count'>Showing $shownindex1 - $shownindex2 of $total total items</p>";

    $i = 0;
    $queryMasterSubGrup = $conn->query("$masterQuery LIMIT $firstItemIndex, $contentPerPage");
    while ($rowMasterSubGrup = mysqli_fetch_assoc($queryMasterSubGrup)) {
        $i++;

        $merk = $rowMasterSubGrup['merk'];
        $namaGrup = $rowMasterSubGrup['grup'];
        $jum = 0;
        $kodeProduk = $rowMasterSubGrup['tipe'];
        $kodeStok = $rowMasterSubGrup['kode'];

        $file = getProductPicture($kodeProduk);

        // $queryMerk = $conn->query("SELECT * FROM master_merk WHERE kode ='$merk'");
        // $dataMerk = mysqli_fetch_assoc($queryMerk);
        // $showPrice = $dataMerk['publish'];
        $showPrice = 1;

        $harga = 0;
        $queryHarga = $conn->query("SELECT * FROM master_price WHERE kode ='$kodeStok'");
        while ($rowHarga = mysqli_fetch_assoc($queryHarga)) {
            $harga = $rowHarga['pls'];
        }

        // Stok
        $Spage = 1;
        $apidata = ventura('item/stock?page=' . $Spage, ["kode" => "$kodeProduk", 'merk' => null, 'gudang' => null], 'POST');
        $apitotalpage = $apidata["result"]["total_page"];

        $jum = 0;
        for ($j = 1; $j <= $apitotalpage; $j++) {
            $apidata = ventura('item/stock?page=' . $j, ["kode" => "$kodeProduk", 'merk' => null, 'gudang' => null], 'POST');
            foreach ($apidata["result"]["data"] as $d) {
                $jum += $d["stok"];
            }
        }
        // $queryStok = $conn->query("SELECT * FROM master_shading where kode_stok='$kodeStok' AND (gudang = '1G.PROYEK' OR gudang = '1G DISPLAY SALE' OR gudang = '1G SHOWROOM BRAVAT' OR gudang='1G.DISPLAY KMJ-1' OR gudang = '1G.DISPLAY KMJ-2' OR gudang = '1G.DISTRIBUSI' OR gudang = '1G.RETAILjkt' OR gudang = '1G.TOKO1' OR gudang = '1G.TOKO2' OR gudang = '4G.JAKARTA')");
        // while ($rowStok = mysqli_fetch_assoc($queryStok)) {
        //     $jum += $rowStok["jum"];
        // }

        // Favorite
        $isFavorite = 0;
        if (isset($_SESSION['username'])) {
            $queryFavorite = $conn->query("SELECT * FROM fav where user='" . $_SESSION['username'] . "' AND kode='$kodeStok'");
            $isFavorite = mysqli_num_rows($queryFavorite);
        }

        if ($i % $itemsPerRow == 1) {
            echo '<div class="row">';
        }

        echo productContainerv2($kodeProduk, $kodeStok, $namaGrup, getSmallBrandLogo($merk), $file, $harga, $jum, $isFavorite, $showPrice);

        if ($i % $itemsPerRow == 0) {
            echo '</div>';
        }
    }
    if ($i < $contentPerPage) {
        echo "</div>";
    }

    echo    '<div class="navigation pagination">
                <div class="page-numbers">';

    $showPage = 0;
    $sidePagesQty = 3; // Number for how many pages will be shown on the sides of the active page
    for ($i = 1; $i <= $numOfPages; $i++) {
        if ((($i >= $currentPage - $sidePagesQty) && ($i <= $currentPage + $sidePagesQty)) || ($i == 1) || ($i == $numOfPages)) {
            if (($showPage == 1) && ($i != 2))  echo "<label style = 'margin-left :5px;font-weight:bold;color:#1ABC9C'> . . . </label>";
            if (($showPage != ($numOfPages - 1)) && ($i == $numOfPages))  echo "<label style = 'margin-left :5px;font-weight:bold;color:#1ABC9C'> . . . </label>";

            if ($i == $currentPage) echo '<button class="pager" id="paging" style = "background:#1ABC9C;border:1px solid #1ABC9C;color:white;border-radius :1px;margin-left:5px;width:45px;height:45px;" class="page-numbers current">' . $i . '</button>';
            else echo '<button class="pager" id="paging" style = "background:white;border:1px solid #1ABC9C;color:#1ABC9C;border-radius :1px;width:45px;height:45px;margin-left:5px" class="page-numbers current">' . $i . '</button>';

            $showPage = $i;
        }
    }

    echo        '</div>
            </div>';
} else {
    echo    "<div class='row' style='display:flex;'>
            <div class='col empty-message-container justify-content-center'>
                <h2>Oops!</h2>
                <img src='resource/no-result.png'>
                <span style='text-align:center;'>Looks like the product you're looking for doesn't exist!</span>
            </div>
            </div>";
}
