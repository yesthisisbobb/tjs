<?php
include("venturafe2/db/config.php");

function syncWithAPI($kode)
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, "http://203.161.31.109/hiro?kode=$kode");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}

$command = "SELECT kodetipe FROM master_stok";
$query = mysqli_query($conn, $command);

$i = 0;
$apiDatas = array();
while($d = mysqli_fetch_assoc($query)) {
    set_time_limit(45);
    $i++; echo "<br>" . $i . ":" . $d["kodetipe"] . " ---<br>";
    $raw = json_decode(syncWithAPI($d["kodetipe"]), true);
    if($raw["data"] != null){
        for ($j=0; $j < sizeof($raw["data"]); $j++) {
            $temparr = array();
            $temparr["tempcode"] = $raw["data"][$j]["kode_item"];
            $temparr["kd_shading"] = $raw["data"][$j]["shading"];
            $temparr["jum"] = $raw["data"][$j]["qty_ready"];
            $temparr["gudang"] = $raw["data"][$j]["nama_gudang"];
            $temparr["status"] = $raw["data"][$j]["status"];

            array_push($apiDatas, $temparr);
        }
    }
    else{
        echo "No data in ventura";
    }
}
var_dump($apiDatas);
?>