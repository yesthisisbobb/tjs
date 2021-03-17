<?php
include("processes/stock-classification.php");

function homeContainer($kodeProduk, $kodeStok, $namaGrup, $namaKategori, $productimg, $harga, $jum,$isFavorite){
    echo    '<div class="col" >
                <div class="product type-product" >
                    <div class="woocommerce-LoopProduct-link">
                        <div class="product-image" style = "height:400px">
                            <a href="shop-detail.php?id=' . $kodeProduk . '&namaGrup=' . $namaGrup . '" class="wp-post-image">
                                <img height=238 class="image-cover" src="' . $productimg . '" alt="product"';

                                if ($namaGrup == "TILE") {
                                    echo "style='padding:40px'";
                                }
                                echo '>
                                <!--<img class="image-secondary" src="PENDING" alt="product">-->
                            </a>';

                            if ($jum <= 18 && $jum > 0) {
                                echo '<a href="#" class="onnew" style="background:#ffc107">Limited</a>';
                            } else if ($jum == 0) {
                                echo '<a href="#" class="onsale">Indent</a>';
                            } else if ($jum > 18) {
                                echo '<a href="#" class="onnew">Ready</a>';
                            }

                            echo '<div class="yith-wcwl-add-button show">
                            <a href="" class="add_to_wishlist tombol-favorite" id="' . $kodeStok . '">';

                                if (isset($_SESSION['username'])) {
                                    if ($isFavorite == 0) {
                                        echo '<img class="favorite" src="resource/pecah.png" class = "zmdi">';
                                    } else {
                                        echo '<img class="favorite" src="resource/nyatu.png" class = "zmdi">';
                                    }
                                } else {
                                    echo '<img class="favorite" src="resource/pecah.png" class = "zmdi">';
                                }

                            echo '</a>
                        </div>
                        <div class="button add_to_cart_button">
                            <a href="shop-detail.php?id=' . $kodeProduk . '&namaGrup=' . $namaGrup . '">
                                <img src="images/icons/shopping-cart-black-icon.png" alt="cart">
                            </a>
                        </div>
                        <h6 class="woocommerce-loop-product__title"><a href="#" style="width:160px">' . $kodeProduk . '</a></h6>
                        <label><a href="#" style="width:160px" class="kategori">' . $namaKategori . '</a></label>
                        <span class="price">
                            <ins>
                                <span class="woocommerce-Price-amount amount">
                                    ' . rupiah($harga) . '
                                </span>
                            </ins>
                        </span>
                        </div>
                    </div>
                </div>
            </div>';
}

function productContainer ($kodeProduk, $kodeStok, $namaGrup, $merkimg, $productimg, $harga, $jum, $isFavorite){
    echo    '<div class="col" >
                <div class="product type-product" >
                    <div class="woocommerce-LoopProduct-link">
                        <div class="product-image" style = "height:400px">
                            <a href="shop-detail.php?id='.$kodeProduk.'&namaGrup='.$namaGrup.'" class="wp-post-image">
                                <img height=238 class="image-cover" src="' . $productimg . '" alt="product">
                                <!--<img class="image-secondary" src="' . $productimg . '" alt="product">-->
                            </a>';

                            if ($jum <= 18 && $jum > 0) {
                                echo '<a href="#" class="onnew" style="background:#ffc107">Limited</a>';
                            } else if ($jum == 0) {
                                echo '<a href="#" class="onsale">Indent</a>';
                            } else if ($jum > 18) {
                                echo '<a href="#" class="onnew">Ready</a>';
                            }

                        echo'<div class="button add_to_cart_button">
                                <a href="shop-detail.php?id="'.$kodeStok.'&namaGrup='.$namaGrup.'">
                                        <img src="images/icons/shopping-cart-black-icon.png" alt="cart">
                                    </a>
                                </div>';
                                echo'<div class="yith-wcwl-add-button show">
                            <a href="" class="add_to_wishlist tombol-favorite" id="'.$kodeStok.'">';
                            if(isset($_SESSION['username'])){
                                if($isFavorite == 0){
                                    echo'<img class="favorite" src="resource/pecah.png">';
                                }
                                else{
                                    echo'<img class="favorite" src="resource/nyatu.png">';
                                }
                            }
                            else{
                                echo'<img class="favorite" src="resource/pecah.png">';
                            }
                                echo ' </a>
                                </div>
                                <div class="div-test"><img src="' . $merkimg . '"></div>
                            <h6 class="woocommerce-loop-product__title"><a href="#" style="width:160px">' . $kodeProduk . '</a></h6>
                            <span class="price">
                                
                                <ins>
                                    <span class="woocommerce-Price-amount amount">
                                        ' . rupiah($harga) . '
                                    </span>
                                </ins>
                            </span>
                        </div>
                    </div>
                </div>
            </div>';
}

function homeContainerv2($kodeProduk, $kodeStok, $namaGrup, $namaKategori, $productimg, $harga,$jum, $showPrice)
{
    // Defines
    $stockType = "";
    $priceDisplay = "";
    $linkToShopDetail = "window.location.href = 'shop-detail.php?id=$kodeProduk&group=$namaGrup'";

    // Price Settings
    // if ($showPrice == 0) {
    //     $priceDisplay = "<span class='orange-yellow'>Ask for Price</span>";
    // }
    // else{
    //     $priceDisplay = rupiah($harga);
    // }
    $priceDisplay = rupiah($harga);

    // Stock Settings
    $stockType = stockLevel($namaGrup, $jum);
    $stockClass = " stock-" . strtolower($stockType);

    echo    '<div class="col">
                <div class="home-product-base-container">
                    <div class="home-product-base" onclick="' . $linkToShopDetail . '">
                        <div class="home-product-top">'
                            // '<div class="home-product-stock' . $stockClass . '">' . $stockType . '</div>'
                            . '<div class="home-product-image"  onclick="' . $linkToShopDetail . '"><img class="not-selectable" src="' . $productimg . '"></div>
                        </div>
                        <div class="home-product-bottom">
                            <div class="home-product-interaction">
                                <div class="home-product-desc">
                                    <span class="home-product-group">' . $namaKategori . '</span>
                                    <span class="home-product-name">' . $kodeProduk . '</span>
                                    <span class="home-product-price">' . $priceDisplay . '</span>
                                </div>
                                <div class="home-product-buy" onclick="' . $linkToShopDetail . '">
                                    <img src="resource/cart.svg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
}

function productContainerv2($kodeProduk, $kodeStok, $namaGrup, $merkimg, $productimg, $harga, $jum, $isFavorite, $showPrice){
    // Defines
    $productNameType = "";
    $stockType = "";
    $priceDisplay = "";
    $favoriteType = "resource/LVWB.png";
    $linkToShopDetail = "window.location.href = 'shop-detail.php?id=$kodeProduk&group=$namaGrup'";

    // If text is longer than 15 characters
    if(strlen($kodeProduk) > 15) $productNameType = " long-text";

    // Price Settings
    if ($showPrice == 0 ) {
        $priceDisplay = "Rp -";
    } else {
        $priceDisplay = rupiah($harga);
    }
    // $priceDisplay = rupiah($harga);

    // Stock Settings
    $stockType = stockLevel($namaGrup, $jum);
    $stockClass = " stock-" . strtolower($stockType);

    // Favorites Settings
    if ($isFavorite > 0) {
        $favoriteType = "resource/LVRB.png";
    } 

    echo    '<div class="col">
                <div class="shop-product-base-container">
                    <div class="shop-product-brand-container">
                        <div class="shop-product-brand"><img class="not-selectable" src="' . $merkimg . '"></div>
                    </div>
                    <div class="shop-product-base">
                        <div class="shop-product-top">
                            <div class="shop-product-stock' . $stockClass . '">' . $stockType . '</div>
                            <div class="shop-product-fave tombol-favorite" id="' . $kodeStok . '"><img class="not-selectable" src="' . $favoriteType . '"></div>
                            <div class="shop-product-image" onclick="' . $linkToShopDetail . '"><img class="not-selectable" src="' . $productimg . '"></div>
                        </div>
                        <div class="shop-product-bottom">
                            <div class="shop-product-interaction">
                                <div class="shop-product-desc">
                                    <span class="shop-product-name' . $productNameType . '" onclick="' . $linkToShopDetail . '">' . $kodeProduk . '</span>
                                    <span class="shop-product-price">' . $priceDisplay . '</span>
                                </div>
                                <div class="shop-product-buy">
                                    <img onclick="' . $linkToShopDetail . '" src="resource/cart.svg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
}
?>