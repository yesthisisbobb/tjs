<?php

use vakata\database\Query;

session_start();

include("db/config.php");
include("api/bridge.php");

if(isset($_SESSION["username"])){
    $resp = array();
    $READY_TABLE = "cart";
    $READY_DETAIL = "cartdtl";
    $INDENT_TABLE = "icart";
    $INDENT_DETAIL = "icartdtl";

    $sess = session_id();
    $username = $_SESSION["username"];
    // $username=$_POST['username']; // Testing Variable
    $qty = intval($_POST['quantity']);
    $kodep = $_POST['kode'];
    $hrg = 0;
    $tipe = $_POST["tipe"];
    $jmlprod = 0;

    $tileDetails = "none";
    if (isset($_POST["tileDetails"])) {
        $tileDetails = $_POST["tileDetails"];
    }

    // Nyari kodetipe
    $scommand = "SELECT kodetipe FROM master_stok WHERE kode_stok='$kodep'";
    $squery =  mysqli_query($conn, $scommand);
    $sraw = mysqli_fetch_assoc($squery);
    $kodetipe = $sraw["kodetipe"];

    // Ngambil harga
    $sqlgetharga = "SELECT pls FROM master_price WHERE kode='$kodep'";
    $queryget = mysqli_query($conn, $sqlgetharga);
    $dataget = mysqli_fetch_array($queryget);
    $hrg = $dataget["pls"];
    if(!isset($hrg)) $hrg = 0;

    // Get Stock Availability
    // $queryStok = mysqli_query($conn, "SELECT * FROM master_shading where kode_stok='$kodep'");
    // while ($rowStok = mysqli_fetch_assoc($queryStok)) {
    //     $jmlprod += $rowStok["jum"];
    // }
    $apidata = ventura('item/stock?page=1', ["kode" => "$kodetipe", 'merk' => null, 'gudang' => null], 'POST');
    $resp["api"] = $apidata;
    $apitotalpage = $apidata["result"]["total_page"];
    for ($i = 1; $i <= $apitotalpage; $i++) {
        $apidata = ventura('item/stock?page=' . $i, ["kode" => "$kodetipe", 'merk' => null, 'gudang' => null], 'POST');
        foreach ($apidata["result"]["data"] as $d) {
            $jmlprod += $d["stok"];
        }
    }

    $cart = $INDENT_TABLE;
    $cartdtl = $INDENT_DETAIL;
    if ($tipe == "normal") {
        $cart = $READY_TABLE;
        $cartdtl = $READY_DETAIL;
    }

    $sqlcek = "SELECT * FROM $cart where user_id='$username' and kodep='$kodep'";
    $querycek = mysqli_query($conn, $sqlcek);
    $rowcount = mysqli_num_rows($querycek);
    $total = $qty * $hrg;

    $resp["totalan"] = $total;

    if ($rowcount < 1) {
        // ===== If a cart with the specified code does NOT exist
        // If ordered qty exceeds available stock
        if ($qty > $jmlprod) {
            $sql = "INSERT INTO $INDENT_TABLE (user_id, sess_id, kodep)  VALUES ('$username','$sess','$kodep')";
            $query = mysqli_query($conn, $sql);

            $sql = "INSERT INTO $INDENT_DETAIL(sess_id, userid, kode_stok, jumlah, harga, total)  VALUES ('$sess','$username','$kodep', $qty, $hrg, $total)";
            $query = mysqli_query($conn, $sql);
        }
        else{
            $sql = "INSERT INTO $cart (user_id, sess_id, kodep)  VALUES ('$username','$sess','$kodep')";
            $query = mysqli_query($conn, $sql);

            $resp["rc1"] = $username . " & " . $sess . " & " . $kodep;

            if($tileDetails != "none"){
                $holder = json_decode($tileDetails);
                foreach ($holder as $n) {
                    $ks = $n->kode_shading;
                    $qs = $n->qty_shading;

                    if ($ks != "idt" && $qs > 0) {
                        $sql = "INSERT INTO $READY_DETAIL(sess_id, userid, kode_stok, shading, jumlah, harga, total)  VALUES ('$sess','$username','$kodep', '$ks', $qs, $hrg, $total)";
                        $query = mysqli_query($conn, $sql);
                    }
                    else if($ks == "idt" && $qs > 0){
                        $sql = "INSERT INTO $INDENT_TABLE (user_id, sess_id, kodep)  VALUES ('$username','$sess','$kodep')";
                        $query = mysqli_query($conn, $sql);

                        $sql = "INSERT INTO $INDENT_DETAIL(sess_id, userid, kode_stok, jumlah, harga, total)  VALUES ('$sess','$username','$kodep', $qs, $hrg, $total)";
                        $query = mysqli_query($conn, $sql);
                    }
                }
            }
            else{
                $sql = "INSERT INTO $cartdtl(sess_id, userid, kode_stok, jumlah, harga, total)  VALUES ('$sess','$username','$kodep', $qty, $hrg, $total)";
                $query = mysqli_query($conn, $sql);

                $resp["rc2"] = $sess . " & " . $username . " & " . $kodep . " & " . $qty . " & " . $hrg . " & " . $total;
            }
        }
        
    } else {
        // ===== If a cart with the specified code DOES exist
        $sql = "UPDATE $cart SET kodep='$kodep' WHERE user_id='$username' AND sess_id='$sess'";
        $query = mysqli_query($conn, $sql);

        $resp["rce1"] = $username . " & " . $sess . " & " . $kodep;

        if ($tileDetails != "none") {
            $holder = json_decode($tileDetails);
            foreach ($holder as $n) {
                $ks = $n->kode_shading;
                $qs = $n->qty_shading;

                if ($ks != "idt" && $qs > 0) {
                    $sql = "UPDATE $READY_DETAIL SET total = total + ($hrg*$qty), jumlah = jumlah + $qs WHERE userid='$username' AND kode_stok='$kodep' AND shading='$ks'";
                    $query = mysqli_query($conn, $sql);
                } else if ($ks == "idt" && $qs > 0) {
                    $sql = "INSERT INTO $INDENT_TABLE (user_id, sess_id, kodep)  VALUES ('$username','$sess','$kodep')";
                    $query = mysqli_query($conn, $sql);
                    
                    $sql = "UPDATE $INDENT_DETAIL SET total = total + ($hrg*$qty), jumlah = jumlah + $qs WHERE userid='$username' AND kode_stok='$kodep'";
                    $query = mysqli_query($conn, $sql);
                }
            }
        }
        else{
            $sql = "UPDATE $cartdtl SET total = total + ($hrg*$qty), jumlah = jumlah + $qty WHERE userid='$username' AND kode_stok='$kodep'";
            $query = mysqli_query($conn, $sql);

            $resp["rce2"] = $username . " & " . $hrg . " & " . $kodep . " & " . $qty;
        }      
    }

    $totals = 0;
    $sqlupdate = "SELECT count(no) as 'jml' FROM cartdtl where userid='$username'";
    $queryupdate = mysqli_query($conn, $sqlupdate);

    if (!$queryupdate) {
        echo "Error di query pertama";
    }

    $row = mysqli_fetch_array($queryupdate);
    $resp["jmlN"] = $row['jml'];

    $totals = 0;
    $sqlupdate = "SELECT count(no) as 'jml' FROM icartdtl where userid='$username'";
    $queryupdate = mysqli_query($conn, $sqlupdate);

    if (!$queryupdate) {
        echo "Error di query kedua";
    }

    $row = mysqli_fetch_array($queryupdate);
    $resp["jmlI"] = $row['jml'];

    echo json_encode($resp);
}
else{
    $resp["msg"] = "notLogged";
    echo json_encode($resp);
}

?>
