<?php

session_start();
include("db/config.php");
include("rupiah.php");
include("get-picture.php");

// $username = "ETSGESI";
// $tipe="normal";

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $tipe = $_POST["tipe"];

    $raw_cart_total = 0.0;

    $getcommand = "";
    $sumcommand = "";
    if ($tipe === "normal") {
        $getcommand = "SELECT ms.kodetipe as nama, c.kode_stok as kode, c.harga as hrg, c.jumlah as jml, ms.sellunit as unit from cartdtl c, master_stok ms WHERE userid='$username' AND c.kode_stok = ms.kode_stok";
        $sumcommand = "SELECT SUM(total) as total from cartdtl WHERE userid='$username'";
    } else if ($tipe === "indent") {
        $getcommand = "SELECT ms.kodetipe as nama, c.kode_stok as kode, c.harga as hrg, c.jumlah as jml, ms.sellunit as unit from icartdtl c, master_stok ms WHERE userid='$username' AND c.kode_stok = ms.kode_stok";
        $sumcommand = "SELECT SUM(total) as total from icartdtl WHERE userid='$username'";
    }
    $query = mysqli_query($conn, $getcommand);

    // Ngehitung total
    $sumquery = mysqli_query($conn, $sumcommand);
    $row = mysqli_fetch_array($sumquery);
    $raw_cart_total = $row["total"];

    if ($sumquery) {
        $cart_total = rupiah($raw_cart_total);
    } else {
        $cart_total = "Rp 0";
    }

    if (mysqli_num_rows($query) > 0) {
        while ($data = mysqli_fetch_array($query)) {
            $path = getProductPicture($data["nama"]);

            echo    '<tr class="cart_item">
                        <td class="product-name">
                            <img src="' . $path . '" alt="product">
                            <div class="review-wrap">
                                <span class="cart_item_title">' . $data["nama"] . '</span>
                                <span class="product-quantity">x' . $data["jml"] . '</span>
                            </div>
                        </td>
                        <td class="product-total">
                            <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">Rp.</span>
                                ' . $data["hrg"] . '
                            </span>
                        </td>
                    </tr>';
        }
    }
} else {
    echo "loginfirst";
}
?>