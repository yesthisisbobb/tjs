<?php
session_start();

include("db/config.php");
include("rupiah.php");

// $sess = "asdasdasdasdasd";
// $username = "ETSGESI";
// $_SESSION['username'] = "ETSGESI";

if(isset($_SESSION["username"]) && isset($_POST["kode"]) && isset($_POST["qty"]) && isset($_POST["total"])){
    $sess = session_id();
    $username = $_SESSION["username"];
    $kode = $_POST["kode"];
    $qty = intval($_POST["qty"]);
    $total = intval($_POST["total"]);
    $tipe = $_POST["tipe"];

    if ($tipe == "normal") {
        $sqlcek = "SELECT * FROM cart where user_id='$username'";
        $querycek = mysqli_query($conn, $sqlcek);
        $rowcount = mysqli_num_rows($querycek);

        if ($rowcount > 0) {
            $sql = "UPDATE cart SET kodep='$kode' WHERE user_id='$username'";
            $query = mysqli_query($conn, $sql);

            $sql = "UPDATE cartdtl SET total = $total, jumlah = $qty WHERE userid='$username' AND kode_stok='$kode'";
            $query = mysqli_query($conn, $sql);

            if (!$query) {
                echo "Error di query";
            }
        }
    } else if ($tipe == "indent") {
        $sqlcek = "SELECT * FROM icart where user_id='$username'";
        $querycek = mysqli_query($conn, $sqlcek);
        $rowcount = mysqli_num_rows($querycek);

        if ($rowcount > 0) {
            $sql = "UPDATE icart SET kodep='$kode' WHERE user_id='$username'";
            $query = mysqli_query($conn, $sql);

            $sql = "UPDATE icartdtl SET total = $total, jumlah = $qty WHERE userid='$username' AND kode_stok='$kode'";
            $query = mysqli_query($conn, $sql);

            if (!$query) {
                echo "Error di query";
            }
        }
    }

    echo "Berhasil update";
}
?>