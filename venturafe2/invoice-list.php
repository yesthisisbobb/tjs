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
                    <?php
                    if ($_GET["type"] == "unpaid") {
                        echo '<h1 style="color:white">Pending Transactions</h1>';
                    } else if ($_GET["type"] == "paid") {
                        echo '<h1 style="color:white">Paid Transactions</h1>';
                    } else {
                        echo '<h1 style="color:white">All Transactions</h1>';
                    }
                    ?>
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
                    <div id="transaction-tab-container"><span id="nor-trans" class="toggle-trans selected-trans">Buying Transactions</span>&nbsp&nbsp/&nbsp&nbsp<span id="ind-trans" class="toggle-trans">Indent Transactions</span></div>
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

    function toSO(link) {
        window.location.href = `${link}`;
    }

    let show_type = "ready";
    if (getUrlParameter("type") == "all") {
        show_type = "all";
        $("#transaction-tab-container").css("display", "none");
    }

    $("#real-content").load("ajaxTransactions.php", {
        "tipe": show_type,
        "status_selection": getUrlParameter("type")
    }, function() {
        // $(".so-area").each(function() {
        //     let so = $(`#${this.id}`).attr("so");
        //     $(`#${this.id} .inv-count`).load("paid-invoice-count.php", {
        //         "noso": so
        //     });
        // });
    });

    $("#real-content").on("click", ".inv-btn", function() {
        alert("bro u trippin fr");
    });

    // $.ajax({
    //     url: "ajaxTransactions.php",
    //     method: "POST",
    //     dataType: "html",
    //     data: {
    //         "tipe": show_type,
    //         "status_selection": getUrlParameter("type")
    //     },
    //     success: function(data) {
    //         $("#real-content").html(data);
    //     },
    //     error: function(error) {
    //         console.error(error.responseText);
    //     }
    // });

    $("#nor-trans").click(function() {
        $.ajax({
            url: "ajaxTransactions.php",
            method: "POST",
            dataType: "html",
            data: {
                "tipe": "ready",
                "status_selection": getUrlParameter("type")
            },
            success: function(data) {
                $("#table-container").html(data);
                $("#nor-trans").addClass("selected-trans");
                $("#ind-trans").removeClass("selected-trans");
            },
            error: function(error) {
                console.error(error.responseText);
            }
        });
    });

    $("#ind-trans").click(function() {
        $.ajax({
            url: "ajaxTransactions.php",
            method: "POST",
            dataType: "html",
            data: {
                "tipe": "indent",
                "status_selection": getUrlParameter("type")
            },
            success: function(data) {
                $("#table-container").html(data);
                $("#ind-trans").addClass("selected-trans");
                $("#nor-trans").removeClass("selected-trans");
            },
            error: function(error) {
                console.error(error.responseText);
            }
        });
    });
</script>