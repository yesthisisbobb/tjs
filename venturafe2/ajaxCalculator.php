<?php
    include("db/config.php");
    include("api/bridge.php");

    $kode = $_POST["kode"];
    $kodetipe = $_POST["kodetipe"];

    $command = "SELECT pcsctn as ppc, sqmctn as spc FROM master_stok WHERE kode_stok='$kode'";
    $query = mysqli_query($conn, $command);

    if($query){
        $rawdata = mysqli_fetch_array($query);

        $dataArray = array();
        $dataArray["ppc"] = $rawdata["ppc"];
        $dataArray["spc"] = $rawdata["spc"];

        $jmlprod = 0;
        $apidata = ventura('item/stock', ["kode" => "$kodetipe", 'status' => null], 'POST');
        if ($apidata["result"]["result"] != null) $jmlprod = $apidata["result"]["result"][0]["stok"];

        $dataArray["stok"] = $jmlprod;
    }
    else{
        $dataArray["ppc"] = 0;
        $dataArray["spc"] = 0;
        $dataArray["stok"] = 0;
    }

    echo json_encode($dataArray);
?>