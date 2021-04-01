<?php
include("db/config.php");
session_start();

$lEmail = $_SESSION["username"];
$command = "SELECT * FROM customer WHERE email='$lEmail'";
$query = mysqli_query($conn, $command);
$userData = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Check Out</title>
    <?php include("./headerdkk/template-head.php"); ?>
</head>

<body class="check-out">
    <!-- Header -->
    <?php include("./headerdkk/header.php"); ?>

    <div class="page-content">
        <!-- Breadcrumb Section -->
        <!--TODO: mbenakno margin e cekno ga dimanual-->
        <section class="breadcrumb-contact-us breadcrumb-section section-box" style="margin-top:130px;background-image: url(resource/banner.jpg);">
            <div class="container">
                <div class="breadcrumb-inner">
                    <h1 style="color:white;">Checkout</h1>
                    <ul class="breadcrumbs">
                        <li><a class="breadcrumbs-1" style="color:white;" href="index.php">Home</a></li>
                        <li><a class="breadcrumbs-1" style="color:white;" href="cart.php">Sales Order (SO Ready) Cart</a></li>
                        <li>
                            <p class="breadcrumbs-2" style="color:white;">Check Out</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Section -->

        <!-- Check Out Section -->
        <section class="checkout-section section-box">
            <div class="woocommerce">
                <div class="container">
                    <div class="entry-content">
                        <form class="woocommerce-form woocommerce-form-login" method="POST">
                            <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing & Shipping section.</p>
                            <p class="form-row-first">
                                <input type="text" class="input-text" name="username" id="username" placeholder="Username or email*">
                            </p>
                            <p class="form-row-last">
                                <input class="input-text" type="password" name="password" id="password" placeholder="Password*">
                            </p>
                            <p class="form-button">
                                <label>
                                    <input type="submit" class="woocommerce-Button au-btn btn-small" name="login" value="Login">
                                    <span class="arrow-right"><i class="zmdi zmdi-arrow-right"></i></span>
                                </label>
                                <label class="woocommerce-form__label">
                                    <input class="woocommerce-form__input" name="rememberme" type="checkbox" id="rememberme" value="forever">
                                    <span>Create an account?</span>
                                </label>
                            </p>
                            <p class="woocommerce-LostPassword">
                                <a href="lost-password.html">Lost your password?</a>
                            </p>
                        </form>
                        <form class="checkout_coupon" method="post">
                            <p class="form-row-first">
                                <input type="text" name="coupon_code" class="input-text" placeholder="Coupon code" id="coupon_code" value="">
                            </p>
                            <p class="form-row-last">
                                <input type="submit" class="button au-btn btn-small" name="apply_coupon" value="Apply Coupon">
                                <span class="arrow-right"><i class="zmdi zmdi-arrow-right"></i></span>
                            </p>
                        </form>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <form class="checkout woocommerce-checkout" method="POST">
                                    <div class="woocommerce-billing-fields">
                                        <h2>Billing details</h2>
                                        <div class="woocommerce-billing-fields__field-wrapper">
                                            <p class="form-row-first">
                                                <input type="text" class="input-text " id="billing_full_name" placeholder="Full Name *" value="<?= $userData["nama"] ?>">
                                            </p>
                                            <p class="form-row-wide">
                                                <input type="text" class="input-text " name="billing_company" id="billing_company" placeholder="Company Name">
                                            </p>
                                            <p class="form-row-wide">
                                                <label for="billing_country">Country <abbr class="required" title="required">*</abbr></label>
                                                <select id="billing_country" class="country_select" name="billing_country">
                                                    <?php
                                                    $command = "SELECT * FROM country";
                                                    $query = mysqli_query($conn, $command);
                                                    if ($query) {
                                                        while ($cty = mysqli_fetch_assoc($query)) {
                                                            $cname = $cty['countryname'];
                                                            $ccode = $cty['countrycode'];

                                                            if ($ccode == $userData["negara"]) {
                                                                echo "<option selected='selected' value='$ccode'>$cname</option>";
                                                            } else {
                                                                echo "<option value='$ccode'>$cname</option>";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <span class="select-btn"><i class="zmdi zmdi-caret-down"></i></span>
                                            </p>
                                            <p class="form-row-wide">
                                                <input type="text" class="input-text " placeholder="Province *" name="billing_state" id="billing_state" value="<?= $userData["provinsi"] ?>">
                                            </p>
                                            <p class="form-row-wide">
                                                <input type="text" class="input-text " name="billing_city" id="billing_city" placeholder="Town/City *" value="<?= $userData["kota"] ?>">
                                            </p>
                                            <p class="form-row-wide">
                                                <label for="billing_address_1">Address <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="Street address" value="<?= $userData["alamat"] ?>">
                                            </p>
                                            <p class="form-row-wide">
                                                <input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="Apartment, suite, unit etc. (optional)">
                                            </p>
                                            <p class="form-row-wide form-row-wide-1">
                                                <input type="text" class="input-text" name="billing_postcode" id="billing_postcode" placeholder="Postal code/Zipcode *">
                                            </p>
                                            <p class="form-row-first">
                                                <input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="Phone *" value="<?= $userData["telp"] ?>" readonly>
                                            </p>
                                            <p class="form-row-last">
                                                <input type="email" class="input-text " name="billing_email" id="billing_email" placeholder="Email Address *" value="<?= $userData["email"] ?>" readonly>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="woocommerce-checkout-review-order">
                                    <h2 id="order_review_heading">Your order</h2>
                                    <table class="shop_table">
                                        <tbody>
                                            <!-- Cart Items -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>
                                                    <ul>
                                                        <li class="cart-subtotal">
                                                            <span class="review-total-title">Subtotal</span>
                                                            <p>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>
                                                                    364
                                                                </span>
                                                            </p>
                                                        </li>
                                                        <li class="shipping">
                                                            <span class="review-total-title">Shipping</span>
                                                            <p>there are no shipping methods available. please double check your address, or contact us if you need any help.</p>
                                                        </li>
                                                        <li class="order-total">
                                                            <span class="review-total-title">Total</span>
                                                            <p>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">$</span>
                                                                    364
                                                                </span>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="woocommerce-checkout-payment">
                                        <ul class="payment_methods">
                                            <li class="wc_payment_method">
                                                <input type="radio" id="payment_method_bacs" class="input-radio" name="payment_method" checked="checked" value="bacs">
                                                <label for="payment_method_bacs">Direct bank transfer</label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </li>
                                            <li class="wc_payment_method">
                                                <input type="radio" name="payment_method" id="payment_method_cheque" class="input-radio" value="cheque">
                                                <label for="payment_method_cheque">Check payments</label>
                                                <div class="payment_box payment_method_cheque">
                                                    <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                </div>
                                            </li>
                                            <li class="wc_payment_method">
                                                <input type="radio" name="payment_method" id="payment_method_cod" class="input-radio" value="cod">
                                                <label for="payment_method_cod">Cash on delivery</label>
                                                <div class="payment_box payment_method_cod">
                                                    <p>Pay with cash upon delivery.</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="place-order">
                                            <input type="submit" class="button alt au-btn btn-small" name="woocommerce_checkout_place_order" id="place_order" value="Place Order">
                                            <span><i class="zmdi zmdi-arrow-right"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Check Out Section -->

    </div>

    <a href="#" id="back-to-top"></a>

    <?php include('headerdkk/footer.php') ?>
</body>

</html>
<script>
    function checkout() {
        Swal.fire({
                icon: "info",
                title: "Proceed to Checkout?",
                text: "Please make sure to check items in your order before checking out",
                showCancelButton: true,
                confirmButtonText: "Yes, Proceed to Checkout"
            })
            .then((value) => {
                if (value.isConfirmed) {
                    $.ajax({
                        url: "checkout-process.php",
                        method: "POST",
                        data: {
                            "tipe": "normal"
                        },
                        success: function() {
                            Swal.fire({
                                title: "Success",
                                text: "Your order is successfully processed! Proceed to Transactions tab to view your order",
                                icon: "success"
                            });
                            refreshCart();
                            refreshCartList();
                            window.location.hash = "top-anchor";
                        },
                        error: function(error) {
                            Swal.fire({
                                title: "Error",
                                text: JSON.parse(error).responseText,
                                icon: "warning"
                            });
                        }
                    });
                }
            });
    };

    $("#billing_country").change(function() {
        $.ajax({
            url: "processes/get-country-details.php",
            method: "GET",
            data: {
                "ccode": $("#billing_country").val()
            },
            success: function(res) {
                console.log(res);
                $("#billing_phone").val("+" + res);
            }
        });
    });

    function loadItems() {
        $.ajax({
            url: "ajaxCheckoutItems.php",
            method: "POST",
            data: {
                "tipe": "normal"
            },
            success: function (data) {
                $(".shop-table").html(data);
            }
        });
    }
    loadItems();
</script>