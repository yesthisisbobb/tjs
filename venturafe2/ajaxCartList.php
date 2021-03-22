<?php

session_start();
include("db/config.php");
include("rupiah.php");
include("get-picture.php");

// $username = "ETSGESI";
// $tipe="normal";

if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
    $tipe = $_POST["tipe"];

    $raw_cart_total = 0.0;

    $getcommand = "";
    $sumcommand = "";
    if ($tipe === "normal"){
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

    if(mysqli_num_rows($query) > 0){
        // SECTION AWAL ======
        echo '<form class="woocommerce-cart-form" method="POST">
            <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                <thead>
                    <tr>
                        <th class="product-remove"></th>
                        <th class="product-name">Product</th>
                        <th class="product-price">Price</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-quantity">Unit</th>
                        <th class="product-subtotal">Total</th>
                    </tr>
                </thead>
                <tbody id="cart-content">';

        while ($data = mysqli_fetch_array($query)) {
            $path = getProductPicture($data["nama"]);

            if ($tipe === "normal") {
                $tempRemove = "removeItemOnCart('" . strval($data["kode"]) . "')";
            } else if ($tipe === "indent") {
                $tempRemove = "removeItemIOnCart('" . strval($data["kode"]) . "')";
            }
            $tempIncrease = "increaseItem('" . $data["kode"] . "')";
            $tempDecrease = "decreaseItem('" . $data["kode"] . "')";
            $tempChange = "valueChanged('" . $data["kode"] . "')";

            echo    '<tr class="woocommerce-cart-form__cart-item cart_item">
                <td class="product-remove">
                    <a onclick="' . $tempRemove . '" class="remove"><i class="zmdi zmdi-close"></i></a>
                </td>
                <td class="product-name" data-title="Product">
                    <a href="#"><img src="' . $path . '" alt="product"></a>
                    <span>' . $data["nama"] . '</span>
                </td>
                <td class="product-price" data-title="Price">
                    <span class="woocommerce-Price-amount amount" id="h' . $data["kode"] . '" value="' . $data["hrg"] . '">' . rupiah($data["hrg"]) . '</span>
                </td>
                <td class="product-quantity" data-title="Quantity">
                    <div class="quantity">
                        <span class="modify-qty minus" onclick="' . $tempDecrease . '">-</span>
                        <input onkeyup="' . $tempChange . '" type="number" name="quantity" id="q' . $data["kode"] . '" value="' . $data["jml"] . '" min="1" class="input-text qty text">
                        <span class="modify-qty plus" onclick="' . $tempIncrease . '">+</span>
                    </div>
                </td>
                <td class="product-quantity">
                    <span>' . $data["unit"] . '</span>
                </td>
                <td class="product-subtotal" data-title="Total">
                    <span class="woocommerce-Price-amount amount" id="t' . $data["kode"] . '" value="' . (intval($data["jml"]) * intval($data["hrg"])) . '">' . rupiah(intval($data["jml"]) * intval($data["hrg"])) . '</span>
                </td>
            </tr>';
        }

        // SECTION BAWAH ======
        echo        '</tbody>
            </table>
        </form>
        <div class="cart-collaterals">
            <div class="cart_totals">
                <h2>Cart totals</h2>
                <table class="shop_table shop_table_responsive">
                    <tbody>
                        <tr class="order-subtotal">
                            <th>Subtotal</th>
                            <td data-title="Subtotal">
                                <span class="woocommerce-Price-amount amount" id="subtot">
                                    ' . $cart_total . '
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="wc-proceed-to-checkout">
                    <a id="checkout-button" onclick="toCheckout()" class="checkout-button button wc-forward au-btn btn-small ">Checkout<i class="zmdi zmdi-arrow-right"></i></a>
                </div>
            </div>
        </div>';
    }
    else{
        echo    "<div class='empty-message-container'>
                    <h2>Your cart is now empty!</h2>
                    <img src='resource/empty-cart-list.png'>
                    <div id='empty-message'>Start adding things to your cart by adding; or go to <b>Transactions</b> tab to check your orders!</div>
                </div>";
    }
}
else{
    echo "loginfirst";
}
