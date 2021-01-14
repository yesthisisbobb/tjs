<?php
    session_start();
    include("db/config.php");
    include("rupiah.php");

    if(isset($_SESSION['username'])){
        $userid = $_SESSION['username'];
        // $userid = "ETSGESI";

        $result = 0.0;

        $tipe = $_POST["tipe"];

        if ($tipe === "indent") {
            $sumcommand = "SELECT kode_stok, sum(total) as harga FROM icartdtl WHERE userid='$userid' GROUP BY kode_stok";
        } else if ($tipe === "normal") {
            $sumcommand = "SELECT kode_stok, sum(total) as harga FROM cartdtl WHERE userid='$userid' GROUP BY kode_stok";
        }

        $total = 0;
        $query = mysqli_query($conn, $sumcommand);
        while ($row = mysqli_fetch_array($query)) {
            $total += intval($row["harga"]);
        }

        if ($query) {
            echo rupiah($total);
        } else {
            echo "Rp 0";
        }
    }
    else{
        echo "Rp 0";
    }
?>
