<?php
    session_start();
    include("db/config.php");
    
    if(isset($_SESSION['username']) && isset($_POST['kodes']) && isset($_POST["tipe"])){
        $userid = $_SESSION['username'];
        // $userid = "ETSGESI";
        $kodes = $_POST['kodes'];
        $tipe = $_POST["tipe"];

        $removecommand = "DELETE FROM cartdtl WHERE userid='$userid' AND kode_stok='$kodes'";
        if ($tipe === "indent") $removecommand = "DELETE FROM icartdtl WHERE userid='$userid' AND kode_stok='$kodes'";
        $query = mysqli_query($conn, $removecommand);

        if (!$query) echo "Delete Unsuccessful!"; 

        $removecommand = "DELETE FROM cart WHERE user_id='$userid' AND kodep='$kodes'";
        if ($tipe === "indent") $removecommand = "DELETE FROM icart WHERE user_id='$userid' AND kodep='$kodes'";
        $query = mysqli_query($conn, $removecommand);

        if ($query) {
            echo "Delete Successful!";
        } else {
            echo "Delete Unsuccessful";
        }
    }
?>