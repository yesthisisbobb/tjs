<?php
session_start();
include("inc/config.php"); //include koneksi database
include("inc/header.php");
?>
<body>
<div class="wrapper">
    <header class="header-area sticky-bar">
        <div class="main-header-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo pt-20">
                            <a href="index.php">
                                <img src="assets/img/logo/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 ">
    <!-- top menu navigation start -->
<?php
include("inc/top_menu.php");
?>
     <!-- top menu navigation end -->

                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="header-right-wrap pt-40">
                            <div class="header-search">
                                <a class="search-active" href="#"><i class="sli sli-magnifier"></i></a>
                            </div>
                            <div class="cart-wrap">
                                <button class="icon-cart-active">
                                    <span class="icon-cart">
                                        <i class="sli sli-bag"></i>
                                        <span class="count-style">0</span>
                                    </span>
                                </button>
                                <button class="icon-cart-active">
                                    <span class="icon-login>
                                        <i class="sli sli-bag"></i>
                                
                                    </span>
                                </button>
                                <div class="shopping-cart-content">
                                    <div class="shopping-cart-top">
                                        <h4>Shoping Cart</h4>
                                        <a class="cart-close" href="#"><i class="sli sli-close"></i></a>
                                    </div>
                                    <ul>
                                        <li class="single-shopping-cart"></li>
                                    </ul>
                                    <div class="shopping-cart-bottom">
                                        <div class="shopping-cart-total">
                                            <h4>Total : <span class="shop-total"></span></h4>
                                        </div>
                                        <div class="shopping-cart-btn btn-hover text-center">
                                            <a class="default-btn" href="checkout.php">checkout</a>
                                            <a class="default-btn" href="cart-page.php">view cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-search start -->
            <div class="main-search-active">
                <div class="sidebar-search-icon">
                    <button class="search-close"><span class="sli sli-close"></span></button>
                </div>
                <div class="sidebar-search-input">
                    <form>
                        <div class="form-search">
                            <input id="search" class="input-text" value="" placeholder="Search Now" type="search">
                            <button>
                                <i class="sli sli-magnifier"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="header-small-mobile">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="mobile-logo">
                            <a href="index.php">
                                <img alt="" src="assets/img/logo/logo.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="header-right-wrap">
                            <div class="cart-wrap">
                                <button class="icon-cart-active">
                                    <span class="icon-cart">
                                        <i class="sli sli-bag"></i>
                                        <span class="count-style">0</span>
                                    </span>
                                </button>
                                <div class="shopping-cart-content">
                                    <div class="shopping-cart-top">
                                        <h4>Shoping Cart</h4>
                                        <a class="cart-close" href="#"><i class="sli sli-close"></i></a>
                                    </div>
                                    <ul>
                                        <li class="single-shopping-cart">
                                            <div class="shopping-cart-img">
                                                <a href="#"><img alt="" src=""></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#">Product Name </a></h4>
                                                <span></span>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-bottom">
                                        <div class="shopping-cart-total">
                                            <h4>Total : <span class="shop-total">$260.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-btn btn-hover text-center">
                                            <a class="default-btn" href="checkout.php">checkout</a>
                                            <a class="default-btn" href="cart-page.php">view cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mobile-off-canvas">
                                <a class="mobile-aside-button" href="#"><i class="sli sli-menu"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- mobile menu navigation start -->
<?php
include("inc/mobile_nav.php");
?>
     <!-- mobile menu navigation end -->
    <div class="breadcrumb-area pt-35 pb-35 bg-gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="active">Products</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="shop-area pt-95 pb-100">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12">
                    <div class="shop-top-bar">
                        <div class="select-shoing-wrap">
                            <div class="shop-select">
                                <select>
                                    <option value="">Sort by newness</option>
                                    <option value="">A to Z</option>
                                    <option value="">Z to A</option>
                                    <option value="">In stock</option>
                                </select>
                            </div>
                            <p></p>
                        </div>
                    </div>
                    <div class="shop-bottom-area mt-35">
                        <div class="tab-content jump">
                            <div id="shop-1" class="tab-pane active">
                                <div class="row ht-products">
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <!--Product Start-->
                                        <!--Product End-->
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <!--Product Start-->
                                        <!--Product End-->
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <!--Product Start-->
                                        <!--Product End-->
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <!--Product Start-->
                                        <!--Product End-->
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <!--Product Start-->
                                        <!--Product End-->
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <!--Product Start-->
                                        <!--Product End-->
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <!--Product Start-->
                                        <!--Product End-->
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <!--Product Start-->
                                        <!--Product End-->
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <!--Product Start-->
                                        <!--Product End-->
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <!--Product Start-->
                                        <!--Product End-->
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <!--Product Start-->
                                        <!--Product End-->
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <!--Product Start-->
                                        <!--Product End-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pro-pagination-style text-center mt-30">
                            <ul>
                                <li><a class="prev" href="#"><i class="sli sli-arrow-left"></i></a></li>
                                <li><a class="active" href="#">1</a></li>
                                <li><a class="next" href="#"><i class="sli sli-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-area bg-paleturquoise">
        <div class="container">
            <div class="footer-top text-center pt-45 pb-45">
                <nav>
                    <ul>
                        <li><a href="#">Home </a></li>
                        <li><a href="#">Sanitary </a></li>
                        <li><a href="#">Tiles </a></li>. 
                    </ul>
                </nav>
            </div>
        </div>
        <div class="footer-bottom border-top-1 pt-20">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="copyright text-center pb-20">
                            <p>Copyright © All Right Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="tab-content quickview-big-img"></div>
                            <!-- Thumbnail Large Image End -->
                            <!-- Thumbnail Image End -->
                            <div class="quickview-wrap mt-15">
                                <div class="quickview-slide-active owl-carousel nav nav-style-2" role="tablist"></div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="product-details-content quickview-content">
                                <h2>Products Name Here</h2>
                                <div class="product-details-price">
                                    <span></span>
                                    <span class="old"></span>
                                </div>
                                <p></p>
                                <div class="pro-details-list">
                                    <ul>
                                        <li>-</li>
                                    </ul>
                                </div>
                                <div class="pro-details-quality">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                    </div>
                                    <div class="pro-details-cart">
                                        <a href="#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
</div>
<?php
include("inc/footer.php");
?>
</body>
</php>