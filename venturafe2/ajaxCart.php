<?php

session_start();
include("db/config.php");
include("rupiah.php");
include("get-picture.php");

// $username = "ETSGESI";
// $tipe="normal";

if(isset( $_SESSION["username"])){
    $username = $_SESSION["username"];
    $tipe = $_POST["tipe"];
    if ($tipe === "normal") {
        $getcommand = "SELECT ms.kodetipe as nama, c.kode_stok as kode, c.harga as hrg, sum(c.jumlah) as jml from cartdtl c, master_stok ms WHERE userid='$username' AND c.kode_stok = ms.kode_stok GROUP BY c.kode_stok";
        $query = mysqli_query($conn, $getcommand);

        if(mysqli_num_rows($query) > 0){
            while ($data = mysqli_fetch_array($query)) {
                $path = getProductPicture($data["nama"]);

                $tempRemove = "removeItem('" . strval($data["kode"]) . "')";

                echo    '<li class="woocommerce-mini-cart-item mini_cart_item clearfix">
                    <a class="product-image">
                        <img src="' . $path . '" alt="cart-2">
                    </a>
                    <a class="product-title">' . $data["nama"] . '</a>
                    <span class="quantity"> ' . $data["jml"] . ' ×
                        <span class="woocommerce-Price-amount amount">' . rupiah($data["hrg"]) . '</span>
                    </span>
                    <a class="remove">
                        <span onclick="' . $tempRemove . '" class="lnr lnr-cross"></span>
                    </a>
                </li>';
            }
        }
        else{
            echo "
                <img class='not-selectable' src='resource/emptyCart.png'>
                Uh oh! Looks like your cart is empty...
            ";
        }
    } else if ($tipe === "indent") {
        $getcommand = "SELECT ms.kodetipe as nama, c.kode_stok as kode, c.harga as hrg, sum(c.jumlah) as jml from icartdtl c, master_stok ms WHERE userid='$username' AND c.kode_stok = ms.kode_stok GROUP BY c.kode_stok";
        $query = mysqli_query($conn, $getcommand);

        if(mysqli_num_rows($query) > 0){
            while ($data = mysqli_fetch_array($query)) {
                $path = "../img/product/" . $data["nama"] . ".jpg";
                if (!file_exists($path)) {
                    $path = "../img/product/" . $data["nama"] . ".JPG";
                    if (!file_exists($path)) {
                        $path = "../img/product/noimg.jpg";
                    }
                }

                $tempRemove = "removeItemI('" . strval($data["kode"]) . "')";

                echo    '<li class="woocommerce-mini-cart-item mini_cart_item clearfix">
                    <a class="product-image">
                        <img src="' . $path . '" alt="cart-2">
                    </a>
                    <a class="product-title">' . $data["nama"] . '</a>
                    <span class="quantity"> ' . $data["jml"] . ' ×
                        <span class="woocommerce-Price-amount amount">' . rupiah($data["hrg"]) . '</span>
                    </span>
                    <a class="remove">
                        <span onclick="' . $tempRemove . '" class="lnr lnr-cross"></span>
                    </a>
                </li>';
            }
        }
        else{
            echo "
                <img class='not-selectable' src='resource/emptyCart.png'>
                Uh oh! Looks like your cart is empty...
            ";
        }
    }
}
else{
    echo "
        <img class='not-selectable' src='resource/emptyCart.png'>
        Uh oh! Looks like your cart is empty...
    ";
}
?>