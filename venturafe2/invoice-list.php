<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location:my-account.php?logged=false");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Transactions</title>
    <?php include("headerdkk/template-head.php"); ?>
</head>

<body class="wish-list">
    <!-- HEADER -->
    <?php include("headerdkk/header.php"); ?>

    <div class="page-content">
        <!-- Breadcrumb Section -->
        <!--TODO: mbenakno margin e cekno ga dimanual-->
        <section class="breadcrumb-contact-us breadcrumb-section section-box" style="margin-top:130px;background-image: url(resource/banner.jpg)">
            <div class="container">
                <div class="breadcrumb-inner">
                    <h1 style="color:white">All Invoice</h1>
                    <ul class="breadcrumbs">
                        <li><a class="breadcrumbs-1" href="index.php">Home</a></li>
                        <li>
                            <p class="breadcrumbs-1">Transactions</p>
                        </li>
                        <li>
                            <p class="breadcrumbs-2">View Invoice</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Section -->

        <!-- Wishlist Section -->
        <section class="shop-cart-section wishlist-section section-box">
            <div class="woocommerce">
                <div class="container">
                    <button id="back-inv" type="button" class="btn btn-outline-dark"><i class="fas fa-arrow-left"></i>Back</button>
                    <div class="transaction-tab-container"><span id="all-payment" class="toggle-trans top-1 selected-trans">All</span>&nbsp&nbsp/&nbsp&nbsp<span id="paid-payment" class="toggle-trans top-1">Paid</span>&nbsp&nbsp/&nbsp&nbsp<span id="unpaid-payment" class="toggle-trans top-1">Unpaid</span></div>
                    <div class="transaction-tab-container"><span id="all-inv" class="toggle-trans top-2 selected-trans">All</span>&nbsp&nbsp/&nbsp&nbsp<span id="nor-inv" class="toggle-trans top-2">Buying Invoice</span>&nbsp&nbsp/&nbsp&nbsp<span id="ind-inv" class="toggle-trans top-2">Indent Invoice</span></div>
                    <div class="entry-content" id="real-content">
                        <div id="loader-transaction">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Wishlist Section -->

    </div>
    <!-- FOOTER -->
    <?php include("headerdkk/footer.php"); ?>

    <a href="#" id="back-to-top"></a>
</body>

</html>
<script>
    // Variables declares
    let payment_status = "all"; // or paid or unpaid
    let show_type = "all"; // or ready or indent
    let so = "";

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
    so = getUrlParameter("noso");

    function toSO(link) {
        window.location.href = `${link}`;
    }

    $("#back-inv").click(function() {
        window.location.href = "transaction.php?type=all";
    });

    $("#real-content").load("ajaxInvoiceList.php", {
        "noso": so,
        "tipe": show_type,
        "status_selection": payment_status
    }, function() {
        // $(".so-area").each(function() {
        //     let so = $(`#${this.id}`).attr("so");
        //     $(`#${this.id} .inv-count`).load("paid-invoice-count.php", {
        //         "noso": so
        //     });
        // });
    });

    $(".top-1").click(function() {
        $(".top-1").removeClass("selected-trans");

        let id = this.id;
        if (id == "all-payment") {
            payment_status = "all";
        } else if (id == "paid-payment") {
            payment_status = "paid";
        } else if (id == "unpaid-payment") {
            payment_status = "unpaid";
        }

        $(`#${id}`).addClass("selected-trans");
    });

    $(".top-2").click(function() {
        $(".top-2").removeClass("selected-trans");

        let id = this.id;
        if (id == "all-inv") {
            show_type = "all";
        } else if (id == "nor-inv") {
            show_type = "ready";
        } else if (id == "ind-inv") {
            show_type = "indent";
        }

        $(`#${id}`).addClass("selected-trans");
    });

    $(".toggle-trans").click(function() {
        $.ajax({
            url: "ajaxInvoiceList.php",
            method: "POST",
            dataType: "html",
            data: {
                "noso": so,
                "tipe": show_type,
                "status_selection": payment_status
            },
            success: function(data) {
                $("#table-container").html(data);
            },
            error: function(error) {
                console.error(error.responseText);
            }
        });
    });
</script>