<?php
include("db/config.php");

$word = $_GET["term"];
$resultArr = array();
$command = "SELECT ms.kodetipe as result FROM master_stok ms WHERE ms.kodetipe LIKE '%$word%'
            UNION SELECT ms.kode_stok as result FROM master_stok ms WHERE ms.kode_stok LIKE '%$word%'
            UNION SELECT ms.grupname as result FROM master_stok ms WHERE ms.grupname LIKE '%$word%'
            UNION SELECT mm.nama as result FROM master_merk mm WHERE mm.nama LIKE '%$word%'
            LIMIT 12";
$query = mysqli_query($conn, $command);
while ($raw = mysqli_fetch_assoc($query)) {
    array_push($resultArr, $raw["result"]);
}
echo json_encode($resultArr);
