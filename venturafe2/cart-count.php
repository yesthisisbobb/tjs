<?php
    session_start();
    include("db/config.php");
    include("rupiah.php");

    if(isset($_SESSION['username'])){
        $usern = $_SESSION['username'];
        // $usern = "ETSGESI";

        $resp = array();
        $totals = 0;
        $sqlupdate = "SELECT count(DISTINCT kode_stok) as 'jml' FROM cartdtl where userid='$usern'";
        $queryupdate = mysqli_query($conn, $sqlupdate);

        if (!$queryupdate) {
            echo "error sqlupdate1";
        }

        $row = mysqli_fetch_array($queryupdate);
        $resp["jmlN"] = $row['jml'];



        $totals = 0;
        $sqlupdate = "SELECT count(DISTINCT kode_stok) as 'jml' FROM icartdtl where userid='$usern'";
        $queryupdate = mysqli_query($conn, $sqlupdate);

        if (!$queryupdate) {
            echo "error sqlupdate2";
        }

        $row = mysqli_fetch_array($queryupdate);
        $resp["jmlI"] = $row['jml'];

        echo json_encode($resp);
    }
    else{
        $resp["jmlI"] = 0;
        $resp["jmlN"] = 0;
        echo json_encode($resp);
    }
?>
