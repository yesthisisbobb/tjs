<?php
    include("db/config.php");

    $kode = $_POST["kode"];

    $command = "SELECT pcsctn as ppc, sqmctn as spc FROM master_stok WHERE kode_stok='$kode'";
    $query = mysqli_query($conn, $command);

    if($query){
        $rawdata = mysqli_fetch_array($query);

        $dataArray = array();
        $dataArray["ppc"] = $rawdata["ppc"];
        $dataArray["spc"] = $rawdata["spc"];

        $jmlprod = 0;
        $queryStok = $conn->query("SELECT * FROM master_shading where kode_stok='$kode'");
        while ($rowStok = mysqli_fetch_assoc($queryStok)) {
            $jmlprod += $rowStok["jum"];
        }
        $dataArray["stok"] = $jmlprod;
    }
    else{
        $dataArray["ppc"] = 0;
        $dataArray["spc"] = 0;
        $dataArray["stok"] = 0;
    }

    echo json_encode($dataArray);
?>