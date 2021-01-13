<?php
include("db/config.php");
include("rupiah.php");
session_start();

if (!isset($_SESSION["username"])) {
    header("Location:my-account.php?logged=false");
}

$getcommand = "SELECT * FROM cartdtl";
$query = mysqli_query($conn, $getcommand);
$result = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sales Order Cart</title>
    <?php include("./headerdkk/template-head.php"); ?>
</head>

<body class="shop-cart">
    <?php include("./headerdkk/header.php"); ?>

    <div class="page-content">
        <!-- Breadcrumb Section -->
        <section id="top-anchor" class="breadcrumb-contact-us breadcrumb-section section-box" style="margin-top:130px;background-image: url(resource/banner.jpg)">
            <div class="container">
                <div class="breadcrumb-inner">
                    <h1 style="color:white">Sales Order (SO Ready) Cart</h1>
                    <ul class="breadcrumbs">
                        <li><a class="breadcrumbs-1" href="index.php">Home</a></li>
                        <li>
                            <p class="breadcrumbs-2">Sales Order (SO Ready) Cart</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Section -->

        <!-- Shop Cart Section -->
        <section class="shop-cart-section section-box">
            <div class="woocommerce">
                <div class="container">
                    <div id="real-content" class="entry-content">
                    </div>
                </div>
            </div>
        </section>
        <!-- End Shop Cart Section -->

    </div>

    <?php include("floating-cart.php"); ?>
    <?php include('headerdkk/footer.php'); ?>

    <a href="#" id="back-to-top"></a>
</body>

</html>
<script>
    // Variable Declarations
    let selected_payment = "ownc";

    function refreshCartList() {
        // Ngisi item-item cart
        $.ajax({
            url: "ajaxCartList.php",
            method: "POST",
            dataType: "html",
            data: {
                "tipe": "normal"
            },
            success: function(data) {
                $("#real-content").html(data);
            }
        });

        // Ngisi subtotal
        $.ajax({
            url: "calculate-cart-total.php",
            method: "POST",
            data: {
                "tipe": "normal"
            },
            success: function(data) {
                console.log(data);
                $("#subtot").text(data);
            },
            error: function(error) {
                console.error(error.responseText);
            }
        });
    }

    refreshCartList();

    function valueChanged(kode) {
        let selectorH = "#h" + kode;
        let selectorT = "#t" + kode;
        let selectorQ = "#q" + kode;

        let qty = $(selectorQ).val();
        if (isNaN(parseInt(qty))) qty = 1;

        let result = parseInt($(selectorH).attr("value")) * parseInt(qty);

        updateItem(kode, qty, result, "normal");

        $(selectorT).text("Rp " + Number(result).toLocaleString("id-ID"));
        $(selectorT).attr("value", result);
    }

    function increaseItem(kode) {
        let selectorH = "#h" + kode;
        let selectorT = "#t" + kode;
        let selectorQ = "#q" + kode;

        $(selectorQ).val((isNaN(parseInt($(selectorQ).val())) ? 0 : parseInt($(selectorQ).val())) + 1);
        let qty = $(selectorQ).val();

        let result = parseInt($(selectorH).attr("value")) * parseInt(qty);

        updateItem(kode, qty, result, "normal");

        $(selectorT).text("Rp " + Number(result).toLocaleString("id-ID"));
        $(selectorT).attr("value", result);
    }

    function decreaseItem(kode) {
        let selectorH = "#h" + kode;
        let selectorT = "#t" + kode;
        let selectorQ = "#q" + kode;

        if (((parseInt($(selectorQ).val())) - 1) > 0) {
            $(selectorQ).val((isNaN(parseInt($(selectorQ).val())) ? 0 : parseInt($(selectorQ).val())) - 1);
            let qty = $(selectorQ).val();

            let result = parseInt($(selectorH).attr("value")) * parseInt(qty);

            updateItem(kode, qty, result, "normal");

            $(selectorT).text("Rp " + Number(result).toLocaleString("id-ID"));
            $(selectorT).attr("value", result);
        }
    }

    function updateItem(kode, qty, total, tipe) {
        $.ajax({
            url: "update-cart.php",
            method: "POST",
            data: {
                "kode": kode,
                "qty": qty,
                "total": total,
                "tipe": tipe
            },
            success: function(data) {
                $.ajax({
                    url: "calculate-cart-total.php",
                    method: "POST",
                    data: {
                        tipe: "normal"
                    },
                    success: function(data) {
                        $("#subtot").text(data);
                    }
                });
            },
            error: function(error) {
                console.error(error.responseText);
            }
        });
    }

    function removeItemOnCart(id) {
        $.ajax({
            url: "remove-from-cart.php",
            method: "POST",
            data: {
                "kodes": id,
                "tipe": "normal"
            },
            success: function(data) {
                refreshCart();
                refreshCartList();
            }
        });
    }

    function checkout() {
        swal({
                icon: "info",
                title: "Proceed to Checkout?",
                text: "Please make sure to check items in your order before checking out",
                buttons: {
                    cancel: true,
                    confirm: {
                        text: "Yes, Proceed to Checkout",
                        value: "checkout",
                        closeModal: false
                    }
                },
                closeOnClickOutside: false,
                closeOnEsc: false
            })
            .then((value) => {
                if (value === "checkout") {
                    $.ajax({
                        url: "checkout-process.php",
                        method: "POST",
                        data: {
                            "tipe": "normal"
                        },
                        success: function() {
                            swal({
                                title: "Success",
                                text: "Your order is successfully processed! Proceed to Transactions tab to view your order",
                                icon: "success"
                            });
                            refreshCart();
                            refreshCartList();
                            window.location.hash = "top-anchor";
                        },
                        error: function(error) {
                            swal({
                                title: "Error",
                                text: JSON.parse(error).responseText,
                                icon: "warning"
                            });
                        }
                    });
                }
            });
    };

    $(document).ready(function() {
        refreshCartList();

        $("#real-content").ready(function() {
            $("#real-content").on('click', '.payment-option', function() {
                $(".payment-radio").removeClass("selected-payment");
                $(`#${this.id} .payment-radio`).addClass("selected-payment");
                selected_payment = this.id;
            });
        });
    });
</script>