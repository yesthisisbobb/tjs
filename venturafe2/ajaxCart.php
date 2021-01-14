<?php

session_start();
include("db/config.php");
include("rupiah.php");
include("get-picture.php");

// $username = "ETSGESI";
// $tipe="normal";
$headercart = "";
$mobilecart = "";

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
                $mRemove = "mRemoveItem('" . strval($data["kode"]) . "')";

                $headercart .= '<li class="woocommerce-mini-cart-item mini_cart_item clearfix">
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

                $mobilecart .= '<div class="floating-cart-item-container">
                                    <div class="floating-cart-item-img">
                                        <img src="' . $path . '">
                                    </div>
                                    <div class="floating-cart-item-desc">
                                        <div class="floating-cart-desc-top">' . $data["nama"] . '</div>
                                        <div class="floating-cart-desc-bot"><span id="fqty">' . $data["jml"] . '</span>&nbspx&nbsp<span id="fpri">' . rupiah($data["hrg"]) . '</span></div>
                                    </div>
                                    <div class="floating-cart-item-remove" onclick="' . $mRemove . '"><i class="fas fa-trash-alt"></i></div>
                                </div>';
            }
        }
        else{
            $headercart =   "<div class='empty-message-container'>
                                <img class='not-selectable' src='resource/emptyCart.png'>
                                Uh oh! Looks like your cart is empty...
                            </div>";
            $mobilecart =   "<div class='empty-message-container'>
                                <img class='not-selectable' src='resource/emptyCart.png'>
                                Uh oh! Looks like your cart is empty...
                            </div>";
        }
    } else if ($tipe === "indent") {
        $getcommand = "SELECT ms.kodetipe as nama, c.kode_stok as kode, c.harga as hrg, sum(c.jumlah) as jml from icartdtl c, master_stok ms WHERE userid='$username' AND c.kode_stok = ms.kode_stok GROUP BY c.kode_stok";
        $query = mysqli_query($conn, $getcommand);

        if(mysqli_num_rows($query) > 0){
            while ($data = mysqli_fetch_array($query)) {
                $path = getProductPicture($data["nama"]);

                $tempRemove = "removeItemI('" . strval($data["kode"]) . "')";
                $mRemove = "mRemoveItemI('" . strval($data["kode"]) . "')";

                $headercart .= '<li class="woocommerce-mini-cart-item mini_cart_item clearfix">
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

                $mobilecart .= '<div class="floating-cart-item-container">
                                    <div class="floating-cart-item-img">
                                        <img src="' . $path . '">
                                    </div>
                                    <div class="floating-cart-item-desc">
                                        <div class="floating-cart-desc-top">' . $data["nama"] . '</div>
                                        <div class="floating-cart-desc-bot"><span id="fqty">' . $data["jml"] . '</span>&nbspx&nbsp<span id="fpri">' . rupiah($data["hrg"]) . '</span></div>
                                    </div>
                                    <div class="floating-cart-item-remove" onclick="' . $mRemove . '"><i class="fas fa-trash-alt"></i></div>
                                </div>';
            }
        }
        else{
            $headercart =   "<div class='empty-message-container'>
                                <img class='not-selectable' src='resource/emptyCart.png'>
                                Uh oh! Looks like your cart is empty...
                            </div>";
            $mobilecart =   "<div class='empty-message-container'>
                                <img class='not-selectable' src='resource/emptyCart.png'>
                                Uh oh! Looks like your cart is empty...
                            </div>";
        }
    }
}
else{
    $headercart =   "<div class='empty-message-container'>
                        <img class='not-selectable' src='resource/emptyCart.png'>
                        Uh oh! Looks like your cart is empty...
                    </div>";
    $mobilecart =   "<div class='empty-message-container'>
                        <img class='not-selectable' src='resource/emptyCart.png'>
                        Uh oh! Looks like your cart is empty...
                    </div>";
}

$resp = array();
$resp["header"] = $headercart;
$resp["mobile"] = $mobilecart;
echo json_encode($resp);
?>