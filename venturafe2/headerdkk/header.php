<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<header class="header">
    <!-- Show Desktop Header -->
    <div class="show-desktop-header header-hp-1 style-header-hp-1">
        <div id="js-navbar-fixed" class="menu-desktop" style="background:white">
            <div class="container-fluid">
                <div class="menu-desktop-inner">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.php"><img src="../venturafe1/img/logo/smblogo1.png" alt="logo"></a>
                    </div>
                    <!-- Main Menu -->
                    <nav class="main-menu" style="margin-top: 1.6%;">
                        <ul>
                            <li class="menu-item" style="color:#1ABC9C">
                                <a href="index.php">
                                    HOME
                                </a>
                                <ul class="sub-menu">
                                    <li class="home-nav">
                                        <a href="shop.php?category=TILE">
                                            TILE
                                        </a>
                                    </li>
                                    <li class="home-nav">
                                        <a href="shop.php?category=SANITARY">
                                            SANITARY
                                        </a>
                                    </li>
                                    <li class="home-nav">
                                        <a href="shop.php?category=FITTING">
                                            FITTING
                                        </a>
                                    </li>
                                    <li class="home-nav">
                                        <a href="shop.php?category=OTHER">
                                            OTHER
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="shop.php">
                                    PRODUCTS
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="favorite.php">
                                    FAVORITE
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="transaction.php?type=all">
                                    TRANSACTIONS
                                </a>
                                <ul class="sub-menu">
                                    <li class="">
                                        <a href="transaction.php?type=all">
                                            HISTORY
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="transaction.php?type=paid">
                                            PAID
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="transaction.php?type=unpaid">
                                            PENDING
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a href="company.php">
                                    ABOUT
                                </a>
                                <ul class="sub-menu">
                                    <li class="">
                                        <a href="company.php">
                                            COMPANY PROFILE
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <?php
                            if (isset($_SESSION['level'])) {
                                if ($_SESSION['level'] == "admin") {
                            ?>
                                    <li class="menu-item">
                                        <a href="#" style="color:#ec3923;">
                                            SMB ACADEMY
                                        </a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="#">
                                                    Courses
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                            <?php
                                }
                            }
                            ?>

                        </ul>
                    </nav>
                    <!-- Header Right -->
                    <div class="header-right">
                        <!-- Cart -->
                        <div class="site-header-cart">
                            <div class="cart-contents" id="normal-cart">
                                <img src="resource/cart.svg" alt="cart">
                                <span id="normal-count">0</span>
                            </div>
                            <div class="widget_shopping_cart">
                                <div class="widget_shopping_cart_content cart-bg">
                                    <ul class="woocommerce-mini-cart cart_list product_list_widget" id="normal-cart-list">
                                        <img class='not-selectable' src='resource/emptyCart.png'>
                                        Uh oh! Looks like your cart is empty...
                                    </ul>
                                    <p class="woocommerce-mini-cart__total total subtotal-text">
                                        <span>Subtotal:</span>
                                        <span class="woocommerce-Price-amount amount" id="normal-subtotal">
                                            Rp 0
                                        </span>
                                    </p>
                                    <p class="woocommerce-mini-cart__buttons buttons">
                                        <a id="normal-view-cart" class="button wc-forward au-btn btn-medium">View Cart</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Canvas -->
                        <!-- Cart -->
                        <div class="site-header-cart">
                            <div class="cart-contents" id="indent-cart">
                                <img src="resource/cart_indent.svg" alt="cart">
                                <span id="indent-count">0</span>
                            </div>
                            <div class="widget_shopping_cart">
                                <div class="widget_shopping_cart_content cart-bg">
                                    <ul class="woocommerce-mini-cart cart_list product_list_widget" id="indent-cart-list">
                                        <img class='not-selectable' src='resource/emptyCart.png'>
                                        Uh oh! Looks like your cart is empty...
                                    </ul>
                                    <p class="woocommerce-mini-cart__total total subtotal-text">
                                        <span>Subtotal:</span>
                                        <span class="woocommerce-Price-amount amount" id="indent-subtotal">
                                            Rp 0
                                        </span>
                                    </p>
                                    <p class="woocommerce-mini-cart__buttons buttons">
                                        <a id="indent-view-cart" class="button wc-forward au-btn btn-small">View Cart</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Canvas -->
                        <div class="canvas canvas-btn-wrap">
                            <button class="canvas-images canvas-btn" data-toggle="modal" data-target="#canvasModal">
                                <img src="resource/user.png" alt="canvas">
                            </button>

                        </div>
                    </div>
                </div>
                <!-- SEARCH MODAL-->
                <div class="modal fade" id="searchModal" role="dialog">
                    <button class="close" type="button" data-dismiss="modal">
                        <i class="zmdi zmdi-close"></i>
                    </button>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form id="searchModal__form" method="POST">
                                    <button id="searchModal__submit" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                    <input id="searchModal__input" type="text" name="search" placeholder="Search Here ..." />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SEARCH MODAL-->

                <!-- CANVAS MODAL-->
                <div class="modal fade" id="canvasModal" role="dialog">
                    <button class="close" type="button" data-dismiss="modal">
                        <i class="zmdi zmdi-close"></i>
                    </button>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="canvas-content" style="background-image:url('resource/backlogin.jpg');">
                                    <div class="contact" id="modalLog">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CANVAS MODAL-->
            </div>
        </div>
    </div>

    <!-- Show Mobile Header -->
    <div id="js-navbar-mb-fixed" class="show-mobile-header">
        <!-- Logo And Hamburger Button -->
        <div class="mobile-top-header">
            <div class="logo-mobile">
                <a href="index.php"><img src="../venturafe1/img/logo/smblogo.PNG" alt="logo"></a>
            </div>
            <button class="hamburger hamburger--spin hidden-tablet-landscape-up" id="toggle-icon">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
        <!-- Au Navbar Menu -->
        <div class="au-navbar-mobile navbar-mobile-1">
            <div class="au-navbar-menu">
                <ul>
                    <li class="drop">
                        <a class="drop-link" href="index.php">
                            HOME
                        </a>
                    </li>
                    <li class="drop">
                        <a class="drop-link" href="shop.php">
                            PRODUCTS
                        </a>
                    </li>
                    <li class="drop">
                        <a href="favorite.php">
                            FAVORITE
                        </a>
                    </li>
                    <li class="drop">
                        <a href="transaction.php?type=all">
                            TRANSACTION HISTORY
                        </a>
                    </li>
                    <li class="drop">
                        <a href="transaction.php?type=unpaid">
                            PENDING TRANSACTIONS
                        </a>
                    </li>
                    <li class="drop">
                        <a href="transaction.php?type=paid">
                            PAID TRANSACTIONS
                        </a>
                    </li>
                    <li class="drop">
                        <a class="drop-link" href="company.php">
                            ABOUT
                        </a>
                    </li>
                    <?php
                    if (isset($_SESSION['level'])) {
                        if ($_SESSION['level'] == "admin") {
                    ?>
                            <li class="drop">
                                <a href="#" style="color:#ec3923;">
                                    SMB ACADEMY
                                </a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                    <li class="drop">
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo '<a class="drop-link" href="ajaxLogout.php">Log Out</a>';
                        } else {
                            echo '<a class="drop-link" href="my-account.php">Log In</a>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<script>
    function toggleVisible(tipe) {
        var x = document.getElementById("password");
        if (tipe === 2) {
            x = document.getElementById("password1");
        } else if (tipe === 3) {
            x = document.getElementById("password2");
        }
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function modalLog() {
        $.ajax({
            type: 'POST',
            url: 'ajaxModalLog.php',
            success: function(data) {
                document.getElementById("modalLog").innerHTML = data;
            }
        });
    }
    modalLog();

    function refreshCart() {
        // Biar cart angkanya keisi
        $.ajax({
            url: "cart-count.php",
            dataType: "JSON",
            success: function(data) {
                if (data.jmlN > 0) {
                    $("#normal-cart img").addClass("blinking");
                } else {
                    $("#normal-cart img").removeClass("blinking");
                }
                if (data.jmlI > 0) {
                    $("#indent-cart img").addClass("blinking");
                } else {
                    $("#indent-cart img").removeClass("blinking");
                }

                $("#normal-count").text(data.jmlN);
                $("#indent-count").text(data.jmlI);

                if (data.jmlN < 1) $("#normal-cart-container .floating-cart-qty").css("display", "none");
                else $("#normal-cart-container .floating-cart-qty").css("display", "flex");
                if (data.jmlI < 1) $("#indent-cart-container .floating-cart-qty").css("display", "none");
                else $("#indent-cart-container .floating-cart-qty").css("display", "flex");

                $("#normal-cart-container .floating-cart-qty").text(data.jmlN);
                $("#indent-cart-container .floating-cart-qty").text(data.jmlI);
            },
            error: function(error) {
                console.error(error.responseText);
            }
        });

        // Ngisi item-item normal cart
        $.ajax({
            url: "ajaxCart.php",
            method: "POST",
            dataType: "json",
            data: {
                "tipe": "normal"
            },
            success: function(data) {
                if (data.isEmpty != "undefined" && data.isEmpty) {
                    $("#normal-cart-list").css({
                        "display": "flex",
                        "justify-content": "center",
                        "text-align": "center"
                    });
                } else {
                    $("#normal-cart-list").css("display", "block");
                }
                $("#normal-cart-list").html(data.header);
            },
            error: function(error) {
                console.error(error.responseText);
            }
        });

        // Ngisi item-item indent cart
        $.ajax({
            url: "ajaxCart.php",
            method: "POST",
            dataType: "json",
            data: {
                "tipe": "indent"
            },
            success: function(data) {
                if (data.isEmpty != "undefined" && data.isEmpty) {
                    $("#indent-cart-list").css({
                        "display": "flex",
                        "justify-content": "center",
                        "text-align": "center"
                    });
                } else {
                    $("#indent-cart-list").css("display", "block");
                }
                $("#indent-cart-list").html(data.header);
            },
            error: function(error) {
                console.error(error.responseText);
            }
        });

        // Ngisi subtotal cart normal
        $.ajax({
            url: "calculate-cart-total.php",
            method: "POST",
            data: {
                "tipe": "normal"
            },
            success: function(data) {
                $("#normal-subtotal").text(data);
            },
            error: function(error) {
                console.error(error.responseText);
            }
        });

        // Ngisi subtotal cart indent
        $.ajax({
            url: "calculate-cart-total.php",
            method: "POST",
            data: {
                "tipe": "indent"
            },
            success: function(data) {
                $("#indent-subtotal").text(data);
            },
            error: function(error) {
                console.error(error.responseText);
            }
        });
    }

    function mRefreshCart(type) {
        // Biar cart angkanya keisi
        $.ajax({
            url: "cart-count.php",
            dataType: "JSON",
            success: function(data) {
                if (data.jmlN > 0) {
                    $("#normal-cart img").addClass("blinking");
                } else {
                    $("#normal-cart img").removeClass("blinking");
                }
                if (data.jmlI > 0) {
                    $("#indent-cart img").addClass("blinking");
                } else {
                    $("#indent-cart img").removeClass("blinking");
                }

                $("#normal-count").text(data.jmlN);
                $("#indent-count").text(data.jmlI);

                if (data.jmlN < 1) $("#normal-cart-container .floating-cart-qty").css("display", "none");
                else $("#normal-cart-container .floating-cart-qty").css("display", "flex");
                if (data.jmlI < 1) $("#indent-cart-container .floating-cart-qty").css("display", "none");
                else $("#indent-cart-container .floating-cart-qty").css("display", "flex");

                $("#normal-cart-container .floating-cart-qty").text(data.jmlN);
                $("#indent-cart-container .floating-cart-qty").text(data.jmlI);
            },
            error: function(error) {
                console.error(error.responseText);
            }
        });

        // YANG HEADER
        // Ngisi item-item normal cart
        $.ajax({
            url: "ajaxCart.php",
            method: "POST",
            dataType: "json",
            data: {
                "tipe": "normal"
            },
            success: function(data) {
                if (data.isEmpty != "undefined" && data.isEmpty) {
                    $("#normal-cart-list").css({
                        "display": "flex",
                        "justify-content": "center",
                        "text-align": "center"
                    });
                } else {
                    $("#normal-cart-list").css("display", "block");
                }
                $("#normal-cart-list").html(data.header);
            },
            error: function(error) {
                console.error(error.responseText);
            }
        });

        // Ngisi item-item indent cart
        $.ajax({
            url: "ajaxCart.php",
            method: "POST",
            dataType: "json",
            data: {
                "tipe": "indent"
            },
            success: function(data) {
                if (data.isEmpty != "undefined" && data.isEmpty) {
                    $("#indent-cart-list").css({
                        "display": "flex",
                        "justify-content": "center",
                        "text-align": "center"
                    });
                } else {
                    $("#indent-cart-list").css("display", "block");
                }
                $("#indent-cart-list").html(data.header);
            },
            error: function(error) {
                console.error(error.responseText);
            }
        });

        // YANG FLOATING
        if (type === "normal") {
            // Ngisi item-item normal cart
            $.ajax({
                url: "ajaxCart.php",
                method: "POST",
                dataType: "json",
                data: {
                    "tipe": "normal"
                },
                success: function(data) {
                    $("#floating-cart-list").html(data.mobile);
                }
            });

            // Ngisi subtotal cart normal
            $.ajax({
                url: "calculate-cart-total.php",
                method: "POST",
                data: {
                    "tipe": "normal"
                },
                success: function(data) {
                    $("#normal-subtotal").text(data);
                },
                error: function(error) {
                    console.error(error.responseText);
                }
            });
        } else if (type === "indent") {
            // Ngisi item-item indent cart
            $.ajax({
                url: "ajaxCart.php",
                method: "POST",
                dataType: "json",
                data: {
                    "tipe": "indent"
                },
                success: function(data) {
                    $("#floating-cart-list").html(data.mobile);
                }
            });

            // Ngisi subtotal cart indent
            $.ajax({
                url: "calculate-cart-total.php",
                method: "POST",
                data: {
                    "tipe": "indent"
                },
                success: function(data) {
                    $("#indent-subtotal").text(data);
                },
                error: function(error) {
                    console.error(error.responseText);
                }
            });
        }
    }

    function removeItem(id) {
        $.ajax({
            url: "remove-from-cart.php",
            method: "POST",
            data: {
                "kodes": id,
                "tipe": "normal"
            },
            success: function(data) {
                refreshCart();
            }
        });
    }

    function removeItemI(id) {
        $.ajax({
            url: "remove-from-cart.php",
            method: "POST",
            data: {
                "kodes": id,
                "tipe": "indent"
            },
            success: function(data) {
                refreshCart();
            }
        });
    }

    function mRemoveItem(id) {
        $.ajax({
            url: "remove-from-cart.php",
            method: "POST",
            data: {
                "kodes": id,
                "tipe": "normal"
            },
            success: function(data) {
                mRefreshCart("normal");
            }
        });
    }

    function mRemoveItemI(id) {
        $.ajax({
            url: "remove-from-cart.php",
            method: "POST",
            data: {
                "kodes": id,
                "tipe": "indent"
            },
            success: function(data) {
                mRefreshCart("indent");
            }
        });
    }

    let sessionExists = '<?= (isset($_SESSION['username'])) ? "yes" : "no" ?>';
    if (sessionExists === "yes") {
        // Njalanin function diatas
        refreshCart();
    }

    // Pas neken cart normal ngganti subtotal
    $("#normal-cart").click(function() {
        if (sessionExists === "yes") {
            $.ajax({
                url: "calculate-cart-total.php",
                method: "POST",
                data: {
                    "tipe": "normal"
                },
                success: function(data) {
                    $("#normal-subtotal").text(data);
                },
                error: function(error) {
                    console.error(error.responseText);
                }
            });
            refreshCart();
        }
    });

    // Pas neken cart indent ngganti subtotal
    $("#indent-cart").click(function() {
        let sessionExists = '<?= (isset($_SESSION['username'])) ? "yes" : "no" ?>';
        if (sessionExists === "yes") {
            $.ajax({
                url: "calculate-cart-total.php",
                method: "POST",
                data: {
                    "tipe": "indent"
                },
                success: function(data) {
                    $("#indent-subtotal").text(data);
                },
                error: function(error) {
                    console.error(error.responseText);
                }
            });
            refreshCart();
        }
    });

    $("#normal-view-cart").click(function() {
        window.location.href = "cart.php";
    });
    $("#indent-view-cart").click(function() {
        window.location.href = "indent.php";
    });
</script>