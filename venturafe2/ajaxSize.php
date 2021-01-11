<?php
session_start();
include("db/config.php");

$namatile = $_POST["nama"];
// $namatile = "6100D";

// Ambil semua sizes
$getallsizescommand = "SELECT DISTINCT panjang, lebar FROM `master_stok` WHERE grupname LIKE '%TILE%' ORDER BY `lebar`";
$getquery = mysqli_query($conn, $getallsizescommand);

$arrsize = array();
$ctr = 0;
while($rawsizes = mysqli_fetch_array($getquery)){
    $num1 = intval($rawsizes["panjang"]);
    $num2 = intval($rawsizes["lebar"]);

    if($num2 > $num1){
        $arrsize[$ctr][0] = $num1;
        $arrsize[$ctr][1] = $num2;
    }
    else{
        $arrsize[$ctr][0] = $num2;
        $arrsize[$ctr][1] = $num1;
    }

    $ctr++;
}

// Ambil size nya tile itu
$gettilesizes = "SELECT DISTINCT panjang, lebar FROM `master_stok` WHERE grupname LIKE '%TILE%' AND kodetipe='$namatile' ORDER BY `panjang`";
$tilequery = mysqli_query($conn, $gettilesizes);

$arrtilesize = array();
$ctr = 0;
while($tilesizes = mysqli_fetch_array($tilequery)){
    $num1 = intval($tilesizes["panjang"]);
    $num2 = intval($tilesizes["lebar"]);
    $temp = 0;
    if($num1 > $num2){
        $temp = $num1;
        $num2 = $num1;
        $num1 = $temp;
    }

    $arrtilesize[$ctr][0] = $num1;
    $arrtilesize[$ctr][1] = $num2;
}

for ($i=0; $i < count($arrsize); $i++) { 
    for ($j=0; $j < count($arrtilesize); $j++) { 
        if($arrsize[$i][0] == $arrtilesize[$j][0] && $arrsize[$i][1] == $arrtilesize[$j][1]){
            echo    '<div class="sizes-boundary">
                        <div class="sizes-selection size-available">' . $arrsize[$i][0] . ' x ' . $arrsize[$i][1] . '</div>
                    </div>';
        }
        else{
            echo    '<div class="sizes-boundary">
                        <div class="sizes-selection">' . $arrsize[$i][0] . ' x ' . $arrsize[$i][1] . '</div>
                    </div>';
        }
    }
}

?>