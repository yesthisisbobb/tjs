<?php
include("db/config.php");
include("api/bridge.php");
include("rupiah.php");
include("get-picture.php");

session_start();

if (!isset($_GET["id"])) {
    header("Location:index.php");
}

$kodeproduk = $_GET["id"];
$namaGrup = $_GET["group"];
$_SESSION["home_clicked"] = $_GET["group"];
$kodestok = "";

$getcommand = "SELECT ms.kode_stok, ms.kodetipe as namaproduk, ms.kodemerk as merk, ms.nm_stok shortdesc, ms.des as longdesc, ms.kgsstok as kg, ms.panjang as panjang, ms.lebar as lebar, ms.tinggi as tinggi, ms.pcsctn as pcc, ms.grupname as grup, mp.pls as harga, ms.sellunit as unit, ms.grade as grade FROM master_stok ms,master_price mp  WHERE ms.kodetipe='$kodeproduk' AND ms.kode_stok = mp.kode";
$query = mysqli_query($conn, $getcommand);
$result = mysqli_fetch_array($query);
$nurows = mysqli_num_rows($query);

if ($nurows == 0) {
    $getcommand = "SELECT ms.kode_stok, ms.kodetipe as namaproduk, ms.kodemerk as merk, ms.nm_stok shortdesc, ms.des as longdesc, ms.kgsstok as kg, ms.panjang as panjang, ms.lebar as lebar, ms.tinggi as tinggi, ms.pcsctn as pcc, ms.grupname as grup, ms.sellunit as unit, ms.grade as grade FROM master_stok ms WHERE ms.kodetipe='$kodeproduk'";
    $query = mysqli_query($conn, $getcommand);
    $result = mysqli_fetch_array($query);
}

$kodestok = $result['kode_stok'];

$file = getProductPicture($kodeproduk);
?>
<!DOCTYPE html>
<html>

<head>
    <title>SMB | Item Detail - <?php echo $kodeproduk; ?></title>
    <?php include("./headerdkk/template-head.php"); ?>
</head>

<body class="shop-single-v1">
    <div id="tile-calculator-base">
        <div id="tile-calculator-modal">
            <div id="tile-calculator-header"><span>Tile Calculator</span></div>
            <div id="tile-calculator-comp-base">
                <div id="tile-calculator-top">
                    <div id="tile-calculator-m2">
                        <input class="tile-calculator-input" type="number" name="tc-m2" id="tc-m2" value=0>
                        <div class="calc-info">M<span class="superscript">2</span></div>
                    </div>
                    <div id="tile-calculator-carton">
                        <input class="tile-calculator-input" type="number" name="tc-carton" id="tc-carton" value=0>
                        <div class="calc-info">Carton</div>
                    </div>
                    <div id="tile-calculator-pcs">
                        <input class="tile-calculator-input" type="number" name="tc-pcs" id="tc-pcs" value=0>
                        <div class="calc-info">Pcs</div>
                    </div>
                </div>
                <div id="tile-calculator-stock">
                    <div class="calc-info">Available Stock</div>
                    <span id="tc-stock"></span>
                    <div id="tile-calculator-unit">Carton</div>
                </div>
            </div>
            <div id="tile-calculator-button-container">
                <button type="button" class="btn-outline-danger" id="tc-cancel">Cancel</button>
                <button type="button" class="btn-success" id="tc-confirm">Confirm</button>
            </div>
        </div>
    </div>
    <!--IMPORT HEADER-->
    <?php include("./headerdkk/header.php"); ?>
    <div class="page-content">
        <!-- Breadcrumb Section -->
        <!--TODO: mbenakno margin e cekno ga dimanual-->
        <section class="breadcrumb-contact-us breadcrumb-section section-box" style="margin-top:120px;background-image: url(resource/banner.jpg);">
            <div class="container">
                <div class="breadcrumb-inner">
                    <h1 style="color:white">Item Detail</h1>
                    <ul class="breadcrumbs">
                        <li><a class="breadcrumbs-1" style="color:white" href="index.php">Home</a></li>
                        <li>
                            <p class="breadcrumbs-2" style="color:white">Item Detail</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Section -->
        <!-- Shop Section -->
        <section class="shop-single-v1-section section-box featured-hp-1 featured-hp-4">
            <div class="woocommerce">
                <div class="container">
                    <div class="content-area">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="woocommerce-product-gallery">
                                    <?php
                                    $jmlprod = 0;
                                    $stockres = [];

                                    // Koneksi ke API
                                    $page = 1;
                                    $apidata = ventura('item?page=' . $page, ["kode" => "$kodeproduk", 'merk' => null, 'gudang' => null], 'POST');

                                    $jmlprod = 0;
                                    $apitotalpage = $apidata["result"]["total_page"];
                                    for ($i=1; $i <= $apitotalpage; $i++) {
                                        $apidata = ventura('item?page=' . $i, ["kode" => "$kodeproduk", 'merk' => null, 'gudang' => null], 'POST');
                                        foreach ($apidata["result"]["data"] as $d) {
                                            $jmlprod += $d["Qty"];
                                        }
                                    }

                                    // $queryStok = $conn->query("SELECT * FROM master_shading where kode_stok='$kodestok' AND (gudang = '1G.PROYEK' OR gudang = '1G DISPLAY SALE' OR gudang = '1G SHOWROOM BRAVAT' OR gudang='1G.DISPLAY KMJ-1' OR gudang = '1G.DISPLAY KMJ-2' OR gudang = '1G.DISTRIBUSI' OR gudang = '1G.RETAILjkt' OR gudang = '1G.TOKO1' OR gudang = '1G.TOKO2' OR gudang = '4G.JAKARTA')");
                                    // while ($rowStok = mysqli_fetch_assoc($queryStok)) {
                                    //     $jmlprod += $rowStok["jum"];
                                    // }

                                    if ($jmlprod > 18) {
                                        echo "<a class='shop-product-stock stock-ready' style='color:white;'>Ready</a>";
                                    } else if ($jmlprod <= 18 && $jmlprod > 1) {
                                        echo "<a class='shop-product-stock stock-limited' style='color:white;'>Limited</a>";
                                    } else {
                                        echo "<a class='shop-product-stock stock-indent' style='color:white;'>Indent</a>";
                                    }
                                    ?>
                                    <div class="owl-carousel">
                                        <div class="item">
                                            <img src="<?= $file ?>" alt="product">
                                        </div>
                                        <div class="item">
                                            <img src="../img/product/noimg.jpg" alt="product">
                                        </div>
                                        <div class="item">
                                            <img src="../img/product/noimg.jpg" alt="product">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="summary entry-summary">
                                    <h1 class="product_title entry-title"><?php echo isset($result["namaproduk"]) ? $result["namaproduk"] : "Nama produk tidak tersedia"; ?></h1>
                                    <div id="product-code" class="product_code"><?php echo $kodestok; ?></div>
                                    <?php
                                    // get URL
                                    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                                    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

                                    $cpcommand = "SELECT color, pattern FROM master_tipe WHERE kode = '$kodeproduk'";
                                    $cpquery = mysqli_query($conn, $cpcommand);
                                    $cpresult = mysqli_fetch_assoc($cpquery);
                                    if ($namaGrup == "TILE") {
                                    ?>
                                        <span id="product_color">Color:&nbsp<?php echo ($cpresult["color"]) ? $cpresult["color"] : "-"; ?></span><br>
                                        <span id="product_pattern">Pattern:&nbsp<?php echo ($cpresult["pattern"]) ? $cpresult["pattern"] : "-"; ?></span><br>
                                    <?php } ?>
                                    <span id="grade">Grade:&nbsp<?php echo (isset($result["grade"])) ? $result["grade"] : "1"; ?></span>
                                    <br>
                                    <span id="product_stock">Stock:&nbsp<span style="font-weight:bold;"><?php echo $jmlprod . " " . $result["unit"]; ?></span></span>
                                    <p class="price">
                                        <ins>
                                            <span id="product-price" class="woocommerce-Price-amount amount" value=<?= ((isset($result["harga"]) ? rupiah($result["harga"]) : "0")) ?>>
                                                <?php echo ((isset($result["harga"]) ? rupiah($result["harga"]) : "Rp -")); ?>
                                            </span>
                                        </ins>
                                    </p>
                                    <div class="woocommerce-product-details__short-description">
                                        <p><?php echo $result["shortdesc"]; ?></p>
                                    </div>
                                    <form class="cart">
                                        <div class="quantity">
                                            <input type="number" name="quantity" id="quantity" value="1" min="1" class="nput-text qty text">
                                            <span class="modify-qty plus" onclick="Increase()">+</span>
                                            <span class="modify-qty minus" onclick="Decrease()">-</span>
                                        </div>
                                        <button id="tile-calc" class="single_add_to_cart_button button alt au-btn btn-small"><i class="fas fa-calculator"></i></button>
                                        <button id="add-to-cart" style="background:#20c997;color:white;border:0px solid white" class="single_add_to_cart_button button alt au-btn btn-small"><?php echo (intval($jmlprod) < 2) ? "Indent " : "Add " ?> to cart<i class="zmdi zmdi-arrow-right"></i></button>
                                    </form>
                                    <div id="sizes-base-container">
                                        <div id="sizes-header">Available Sizes</div>
                                        <div id="sizes-container">

                                        </div>
                                    </div>
                                    <div class="product_meta">
                                        <div id="product-spec">Other Specifications</div>
                                        <span class="posted_in">
                                            Category:
                                            <a id="category" href="#"><?php echo $result["grup"]; ?></a>
                                        </span>
                                        <!-- <?php if ($namaGrup == "TILE") { ?> -->
                                        <span class="posted_in">
                                            Pcs/Carton:
                                            <span id="pcc" href="#"><?php echo $result["pcc"]; ?></span>
                                        </span>
                                        <!-- <?php } ?> -->
                                        <span class="sku_wrapper">
                                            Weight:
                                            <span class="sku">
                                                <?php
                                                if ($namaGrup == "TILE") {
                                                    echo intval($result["kg"]) . "kg / carton";
                                                } else {
                                                    echo intval($result["kg"]) . "kg / pc";
                                                }
                                                ?>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="product-share">
                                        <span>Share:</span>
                                        <a href="https://www.facebook.com/sharer.php?u=<?= $url ?>"><i class="zmdi zmdi-facebook"></i></a>
                                        <a href="https://twitter.com/intent/tweet?url=<?= $url ?>&text=I really like this item! You should check it out too!"><i class="zmdi zmdi-twitter"></i></a>
                                        <a href="whatsapp://send?text=<?= $url ?>"><i class="zmdi zmdi-whatsapp"></i></a>
                                    </div>
                                    <button id="set-shading" class="single_add_to_cart_button button au-btn btn-small"><i class="far fa-eye"></i>View Shading</button>
                                    <div id="shading-base-container">
                                        <!-- <div id="shading-header">Shading</div> -->
                                        <div id="shading-container">
                                        </div>
                                    </div>
                                </div>
                                <div class="woocommerce-tabs">
                                    <ul class="nav nav-tabs wc-tabs" id="myTab" role="tablist">
                                        <li class="nav-item description_tab" id="tab-title-description" role="tab" aria-controls="tab-description" aria-selected="true">
                                            <a class="nav-link active" href="#tab-description" data-toggle="tab">Description</a>
                                        </li>
                                        <li class="nav-item additional_information_tab" id="tab-title-additional_information" role="tab" aria-controls="tab-additional_information" aria-selected="false">
                                            <a class="nav-link" href="#tab-additional_information" data-toggle="tab">Additional information</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="woocommerce-Tabs-panel tab-pane fade show active" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">
                                            <p><?php echo $result["longdesc"]; ?></p>
                                        </div>
                                        <div class="woocommerce-Tabs-panel tab-pane" id="tab-additional_information" role="tabpanel" aria-labelledby="tab-title-additional_information">
                                            <table class="shop_attributes">
                                                <tbody>
                                                    <tr>
                                                        <th>Dimensions (cm)</th>
                                                        <td class="product_dimensions"><?php echo "H: " . $result['tinggi'] .  " W: " . $result['panjang'] . " D: " . $result['lebar'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--RELATED PRODUCTS-->
                        <div class="related">
                            <h2 class="special-heading">Related Products</h2>
                            <div class="owl-carousel owl-theme" id="related-products">
                                <?php
                                $grup = $result["grup"];
                                $getcommand = "SELECT DISTINCT ms.kodetipe as namaproduk, ms.kode_stok as kodestok, ms.nm_stok shortdesc, ms.des as longdesc, ms.kgsstok as kg, ms.panjang as panjang, ms.lebar as lebar, ms.tinggi as tinggi, ms.grupname as grup, mp.pls as harga FROM master_stok ms, master_price mp WHERE ms.grupname='$grup' AND ms.kode_stok = mp.kode AND ms.kode_stok != '$kodeproduk' ORDER BY RAND() LIMIT 8";
                                $query = mysqli_query($conn, $getcommand);

                                if ($query) {
                                    while ($data = mysqli_fetch_array($query)) {
                                        $jmlprod1 = 0;
                                ?>

                                        <div class="item">
                                            <div class="product type-product">
                                                <div class="woocommerce-LoopProduct-link">
                                                    <div class="product-image" style="height:400px;">
                                                        <?php $linkTo = "shop-detail.php?id=" . $data["namaproduk"] . "&group=" . $namaGrup; ?>
                                                        <a href="<?= $linkTo ?>" class="wp-post-image">
                                                            <?php
                                                            $file = getProductPicture($data["namaproduk"]);
                                                            ?>
                                                            <img height=238 src="<?= $file ?>" alt="product">
                                                        </a>
                                                        <?php
                                                        $tempkode = $data["namaproduk"];
                                                        $page = 1;
                                                        $apidata = ventura('item?page=' . $page, ["kode" => "$tempkode", 'merk' => null, 'gudang' => null], 'POST');

                                                        $jmlprod = 0;
                                                        $apitotalpage = $apidata["result"]["total_page"];
                                                        for ($i = 1; $i <= $apitotalpage; $i++) {
                                                            $apidata = ventura('item?page=' . $i, ["kode" => "$tempkode", 'merk' => null, 'gudang' => null], 'POST');
                                                            foreach ($apidata["result"]["data"] as $d) {
                                                                $jmlprod += $d["Qty"];
                                                            }
                                                        }
                                                        if ($jmlprod > 18) {
                                                            echo "<a class='shop-product-stock stock-ready' style='color:white;'>Ready</a>";
                                                        } else if ($jmlprod <= 18 && $jmlprod > 1) {
                                                            echo "<a class='shop-product-stock stock-limited' style='color:white;'>Limited</a>";
                                                        } else {
                                                            echo "<a class='shop-product-stock stock-indent' style='color:white;'>Indent</a>";
                                                        }
                                                        // $stockcommand = "SELECT kode_stok, SUM(jum) as jumlah FROM master_shading WHERE kode_stok='$tempkode' AND (gudang = '1G.PROYEK' OR gudang = '1G DISPLAY SALE' OR gudang = '1G SHOWROOM BRAVAT' OR gudang='1G.DISPLAY KMJ-1' OR gudang = '1G.DISPLAY KMJ-2' OR gudang = '1G.DISTRIBUSI' OR gudang = '1G.RETAILjkt' OR gudang = '1G.TOKO1' OR gudang = '1G.TOKO2' OR gudang = '4G.JAKARTA') GROUP BY kode_stok";
                                                        // $stockquery = mysqli_query($conn, $stockcommand);
                                                        // if ($stockquery) {
                                                        //     $stockres = mysqli_fetch_array($stockquery);
                                                        //     if (!isset($stockres)) {
                                                        //         echo "<a class='shop-product-stock stock-indent' style='color:white;'>Indent</a>";
                                                        //     } else if ($stockres['jumlah'] > 18) {
                                                        //         echo "<a class='shop-product-stock stock-ready' style='color:white;'>Ready</a>";
                                                        //     } else if ($stockres['jumlah'] <= 18 && $stockres['jumlah'] > 1) {
                                                        //         echo "<a class='shop-product-stock stock-limited' style='color:white;'>Limited</a>";
                                                        //     } else {
                                                        //         echo "<a class='shop-product-stock stock-indent' style='color:white;'>Indent</a>";
                                                        //     }
                                                        // } else {
                                                        //     echo "<a class='shop-product-stock stock-indent' style='color:white;'>Indent</a>";
                                                        // }
                                                        ?>
                                                        <?php

                                                        echo '<div class="yith-wcwl-add-button show">
                                                            <a href="" class="add_to_wishlist tombol-favorite" id="' . $data["kodestok"] . '">';
                                                        if (isset($_SESSION['username'])) {
                                                            $query2 = $conn->query("SELECT * FROM fav where user='" . $_SESSION['username'] . "' AND kode='" . $data["kodestok"] . "'");
                                                            $numRows = mysqli_num_rows($query2);
                                                            if ($numRows == 0) {
                                                                echo '<img class="favorite" src="resource/LVWB.png">';
                                                            } else {
                                                                echo '<img class="favorite"  src="resource/LVRB.png">';
                                                            }
                                                        } else {
                                                            echo '<img class="favorite"  src="resource/LVWB.png">';
                                                        }

                                                        ?>
                                                        </a>
                                                    </div>
                                                    <div class="button add_to_cart_button">
                                                        <img class="cart-icon" onclick='shopDetail("<?= $data["namaproduk"] ?>","<?= $namaGrup ?>")' src="images/icons/shopping-cart-black-icon.png" alt="cart">
                                                    </div>
                                                    <h5 class="woocommerce-loop-product__title" style="width:160px"><a href="#"> <?php echo $data["namaproduk"]; ?> </a></h5>
                                                    <span class="price">
                                                        <ins>
                                                            <span class="woocommerce-Price-amount amount">
                                                                <?php echo rupiah($data["harga"]); ?>
                                                            </span>
                                                        </ins>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                    <?php
                                    }
                                }
                    ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- End Shop Section -->
    </div>

    <?php include("floating-cart.php"); ?>
    <?php include('headerdkk/footer.php') ?>
</body>

</html>
<script>
    let shadingState = false;
    let shadingLimit = 0;
    let ppc = 0,
        spc = 0.0,
        stock = 0;

    // Ngabil value dari URL
    function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName;

        for (let i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? false : decodeURIComponent(sParameterName[1]);
            }
        }
    }

    // Buat yang mau diakses pas document ready
    $(document).ready(function() {
        // Ngeload Related Products AJAX
        // let kodeproduk = $("#product-code").text();
        // let category = $("#category").text();
        // $.ajax({
        //     url: "ajaxRelatedProduct.php",
        //     method: "POST",
        //     dataType: "html",
        //     data: {
        //         "grup": category,
        //         "kodeproduk": kodeproduk
        //     },
        //     success: function(data){
        //         // $("#related-products").html(data);
        //         console.log(data);
        //     },
        //     error: function(error){
        //         console.log(error.responseText);
        //     }
        // });

        // Button Add to Cart besar
        $("#add-to-cart").click(function(e) {
            e.preventDefault();

            let grup = getUrlParameter("group");

            if (grup != "TILE") {
                // If item is not a tile
                addToCart($("#product-code").text());
            } else {
                // If item is a tile
                let objShading = [];
                let totalQty = 0;
                $("input[type=range]").each(function() {
                    let temp = $(this).attr("id").split('-');
                    let trueId = temp[1];
                    objShading = [...objShading, {
                        "kode_shading": trueId,
                        "qty_shading": $(this).val()
                    }];
                    totalQty += $(this).val();
                });

                // console.log(totalQty);
                if (totalQty > 1) {
                    addToCartShading($("#product-code").text(), objShading);
                } else {
                    addToCart($("#product-code").text());
                }
            }
        });

        $("#tile-calc").click(function(e) {
            e.preventDefault();
            $("#tc-stock").text(stock);
            $("#tile-calculator-modal").css({
                "transform": "translateY(0px)"
            });
            $("#tile-calculator-base").css({
                "background-color": "rgba(0, 0, 0, 0.4)",
                "visibility": "visible"
            });
        });
        $("#tc-pcs").keyup(function() {
            $("#tc-carton").val(Math.ceil($("#tc-pcs").val() / ppc));
            $("#tc-m2").val(Math.ceil($("#tc-pcs").val() / ppc) * spc);
        });
        $("#tc-carton").keyup(function() {
            $("#tc-pcs").val($("#tc-carton").val() * ppc);
            $("#tc-m2").val($("#tc-carton").val() * spc);
        });
        $("#tc-m2").keyup(function() {
            $("#tc-pcs").val(Math.ceil($("#tc-m2").val() / spc) * ppc);
            $("#tc-carton").val(Math.ceil($("#tc-m2").val() / spc));
        });
        $("#tc-cancel").click(function() {
            $("#tile-calculator-modal").css({
                "transform": "translateY(1400px)"
            });
            $("#tile-calculator-base").css({
                "background-color": "rgba(0, 0, 0, 0.0)",
                "visibility": "hidden"
            });
        });
        // $("#tile-calculator-base").click(function() {
        //     $("#tile-calculator-modal").css({
        //         "transform": "translateY(1400px)"
        //     });
        //     $("#tile-calculator-base").css({
        //         "background-color": "rgba(0, 0, 0, 0.0)",
        //         "visibility": "hidden"
        //     });
        // });
        $("#tc-confirm").click(function() {
            $("#quantity").val($("#tc-carton").val());
            $("#tile-calculator-modal").css({
                "transform": "translateY(1400px)"
            });
            $("#tile-calculator-base").css({
                "background-color": "rgba(0, 0, 0, 0.0)",
                "visibility": "hidden"
            });
        });

        $("#set-shading").click(function(e) {
            e.preventDefault();
            shadingLimit = $("#quantity").val();
            if (!shadingState) {
                let kode_stok = $("#product-code").text();
                $.ajax({
                    url: "ajaxShading.php",
                    method: "POST",
                    dataType: "html",
                    data: {
                        "kode": kode_stok,
                        "amount": $("#quantity").val()
                    },
                    success: function(data) {
                        $("#shading-container").html(data);
                    }
                });
                $("#shading-base-container").css("display", "flex");
                $("#shading-base-container").css("height", "auto");
                $("#set-shading i").removeClass("fa-eye");
                $("#set-shading i").addClass("fa-eye-slash");
                shadingState = true;
            } else {
                $("#shading-base-container").css({
                    "display": "none",
                    "height": "0px"
                });
                $("#set-shading i").removeClass("fa-eye-slash");
                $("#set-shading i").addClass("fa-eye");
                shadingState = false;
            }
        });
    });
</script>
<script>
    // Menyembunyikan sizes lek bukan tiles
    if (!getUrlParameter("group") || getUrlParameter("group") != "TILE") {
        $("#tile-calc").css("display", "none");
        $("#sizes-base-container").css("display", "none");
        $("#set-shading").css("display", "none");
        $(".pro-details-quality").css("display", "none");
    }
    // Default e tersembunyi
    $("#shading-base-container").css({
        "display": "none",
        "height": "0px"
    });

    function addToCart(kodestok) {
        let quantity = $("#quantity").val();
        let price = $("#product-price").attr("value");
        let stok = $("#stok-barang").text();
        let tipe = "";
        (stok.toLowerCase() === "indent") ? tipe = "indent": tipe = "normal";
        $.ajax({
            url: "add-to-cart.php",
            method: "POST",
            dataType: "json",
            data: {
                "quantity": quantity,
                "kode": kodestok,
                "hrg": price,
                "tipe": tipe
            },
            success: function(data) {
                if (data.msg !== "notLogged") {
                    // Update angka sebelah cart
                    $("#normal-count").text(data.jmlN + "");
                    $("#indent-count").text(data.jmlI + "");

                    // Refresh isi"
                    $("#quantity").val(1);

                    // Refresh cart
                    refreshCart();

                    tata.success("Item Added!", 'Item successfully added to cart!', {
                        position: 'bl',
                        duration: 2500,
                        animate: 'slide'
                    });
                } else {
                    window.location.href = "my-account.php?logged=false";
                }
            },
            error: function(error) {
                console.error(error.responseText);
            }
        });
    }

    function addToCartShading(kodestok, tileDetails) {
        let quantity = $("#quantity").val();
        let price = $("#product-price").attr("value");
        let stok = $("#stok-barang").text();
        let tipe = "";
        (stok.toLowerCase() === "indent") ? tipe = "indent": tipe = "normal";
        // console.log(JSON.stringify(tileDetails));

        $.ajax({
            url: "add-to-cart.php",
            method: "POST",
            dataType: "json",
            data: {
                "quantity": quantity,
                "kode": kodestok,
                "hrg": price,
                "tipe": tipe,
                "tileDetails": JSON.stringify(tileDetails)
            },
            success: function(data) {
                if (data.msg !== "notLogged") {
                    console.log(data);

                    // Update angka sebelah cart
                    $("#normal-count").text(data.jmlN + "");
                    $("#indent-count").text(data.jmlI + "");

                    // Refresh isi"
                    $("#quantity").val(1);

                    // Refresh cart
                    refreshCart();

                    tata.success("Item Added!", 'Item successfully added to cart!', {
                        position: 'bl',
                        duration: 2500,
                        animate: 'slide'
                    });
                } else {
                    window.location.href = "my-account.php?logged=false";
                }
            },
            error: function(error) {
                console.error(error.responseText);
            }
        });
    }

    function shopDetail(kode, namaGrup) {
        window.location.href = "shop-detail.php?id=" + kode + "&group=" + namaGrup;
    }

    //Ngeload sizes
    $.ajax({
        url: "ajaxSize.php",
        method: "POST",
        dataType: "html",
        data: {
            "nama": getUrlParameter("id")
        },
        success: function(data) {
            $("#sizes-container").html(data);
        }
    });

    // Ngambil buat calculator
    let kodestok_elemen = $("#product-code").text();
    $.ajax({
        url: "ajaxCalculator.php",
        method: "POST",
        dataType: "JSON",
        data: {
            "kode": kodestok_elemen
        },
        success: function(data) {
            // console.log(data, data.spc, data.ppc);
            spc = parseFloat(data.spc);
            ppc = parseInt(data.ppc);
            stock = data.stok;
        }
    });

    function sliderValueChanged(id) {
        $(`#${id}-qty`).val($(`#${id}`).val());
    }

    function qtyValueChanged(id, isi) {
        let temp = id;
        let arrTemp = temp.split("-");
        let rawId = arrTemp[0];

        if (typeof(isi) == "undefined" || isi == "") {
            $(`#${rawId}`).val(0);

        } else {
            $(`#${rawId}`).val(isi);
        }
    }
</script>