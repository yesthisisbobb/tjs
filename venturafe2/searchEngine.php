<?php
include("db/config.php");
include("rupiah.php");
include("get-picture.php");
include("containers.php");
session_start();

// Query related variables
$categoryType = $_GET[''];
$valRawData = $_GET[''];
$statesRawData = $_GET[''];

$contentPerPage = 12;
$itemsPerRow = 3;
$currentPage = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$firstItemIndex = ($currentPage > 1) ? ($currentPage * $contentPerPage) - $contentPerPage : 0;

$queryTotal = $conn->query("SELECT * FROM  master_sub_grup msg inner join detail_sub_grup dsg on msg.nama = dsg.namagrup inner join master_stok ms on dsg.nama = ms.grupname WHERE ms.status = 'Active' ORDER BY msg.namagrup");
$total = mysqli_num_rows($queryTotal);
$numOfPages = ceil($total / $halaman);

$i = 0;
$queryMasterSubGrup = $conn->query("SELECT *, msg.namagrup as jeneng FROM  master_sub_grup msg inner join detail_sub_grup dsg on msg.nama = dsg.namagrup inner join master_stok ms on dsg.nama = ms.grupname WHERE ms.status = 'Active' ORDER BY msg.namagrup DESC LIMIT $mulai,$halaman");
while($rowMasterSubGrup = mysqli_fetch_assoc($queryMasterSubGrup)){
    $i++;

    $merk = $rowMasterSubGrup['kodemerk'];
    $namaGrup = $rowMasterSubGrup['jeneng'];
    $jum = 0;
    $kodeProduk = $rowMasterSubGrup['kodetipe'];
    $kodeStok = $rowMasterSubGrup['kode_stok'];

    $file = getProductPicture($kodeProduk);

    $queryMerk = $conn->query("SELECT * FROM master_merk WHERE kode ='$merk'");
    $dataMerk = mysqli_fetch_assoc($queryMerk);
    $showPrice = $dataMerk['publish'];

    $harga = 0;
    $queryHarga = $conn->query("SELECT * FROM master_price WHERE kode ='$kodeStok'");
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
?>