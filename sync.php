<?php
include("venturafe2/db/config.php");

function ventura($endpoint, $data = [], $method = 'GET')
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL            => 'http://203.161.31.109/ventura/' . $endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => '',
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 0,
        CURLOPT_CUSTOMREQUEST  => $method,
        CURLOPT_POSTFIELDS     => $data,
        CURLOPT_HTTPHEADER     => [
            'Authorization: f59c6dfc05dc8f3614e73bab8ba9e7fd8482d3aa05f7d8ebdc66b9fc0bbf40f5a155f1a4f80d20507a27481d58c418671432e712e764e787af9acc1faebf2f05'
        ],
    ]);

    $response = curl_exec($curl);
    $err      = curl_error($curl);
    curl_close($curl);

    return json_decode($response, true);
}

function loopResults($incData){
    $datas = $incData["result"]["data"];
    if ($datas != null) {
        for ($j = 0; $j < sizeof($datas); $j++) {
            $temparr = array();
            $temparr["tempcode"] = $datas[$j]["kode_item"];
            $temparr["kd_shading"] = $datas[$j]["shading"];
            $temparr["jum"] = $datas[$j]["stok"];
            $temparr["gudang"] = $datas[$j]["nama_gudang"];

            array_push($GLOBALS["apiDatas"], $temparr);
        }
    } else {
        echo "No data in ventura";
    }
}

$command = "SELECT kodetipe FROM master_stok LIMIT 40";
$query = mysqli_query($conn, $command);

$i = 0;
$apiDatas = array();
while($d = mysqli_fetch_assoc($query)) {
    set_time_limit(45);

    $i++; echo "<br>" . $i . ":" . $d["kodetipe"] . " ---<br>";

    $request = [
        'kode'   => $d["kodetipe"],
        'merk'   => null,
        'gudang' => null
    ];
    $page = 1;

    $raw = ventura('item/stock?page=' . $page, $request, 'POST');
    $totalPage = $raw["result"]["total_page"];

    if ($totalPage > 0 && $totalPage < 2) {
        echo "masuk if 1";
        loopResults($raw);
    }
    else if($totalPage > 1){
        echo "masuk if 2";
        for ($k=1; $k < $totalPage; $k++) { 
            $raw = ventura('item/stock?page=' . $k, $request, 'POST');
            loopResults($raw);
        }
    }
    else{
        echo "No data";
    }
}
var_dump($apiDatas);
?>