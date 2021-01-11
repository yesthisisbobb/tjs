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
                        <div class="logo pt-40">
                            <a href="index.php">
                                <img src="assets/img/logo/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 ">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li class="angle-shape"><a href="index.php">Home </a>
                                        <ul class="submenu">
                                            <li><a href="index.php">Home version 1 </a></li>
                                            <li><a href="index-2.php">Home version 2 </a></li>
                                            <li><a href="index-3.php">Home version 3 </a></li>
                                        </ul>
                                    </li>
                                    <li class="angle-shape"><a href="shop.php"> Shop <span>new</span> </a>
                                        <ul class="mega-menu">
                                            <li><a class="menu-title" href="#">Shop Layout</a>
                                                <ul>
                                                    <li><a href="shop.php">standard style</a></li>
                                                    <li><a href="shop-grid-2-column.php">grid 2 column</a></li>
                                                    <li><a href="shop-grid-4-column.php">grid 4 column</a></li>
                                                    <li><a href="shop-grid-fullwide.php">grid full wide</a></li>
                                                    <li><a href="shop-right-sidebar.php">grid right sidebar </a></li>
                                                </ul>
                                            </li>
                                            <li><a class="menu-title" href="#">Shop Layout</a>
                                                <ul>
                                                    <li><a href="shop-list-style1.php">list style 1</a></li>
                                                    <li><a href="shop-list-style2.php">list style 2</a></li>
                                                    <li><a href="shop-list-style3.php">list style 3</a></li>
                                                    <li><a href="shop-list-fullwide.php">list full wide</a></li>
                                                    <li><a href="shop-list-sidebar.php">list with sidebar </a></li>
                                                </ul>
                                            </li>
                                            <li><a class="menu-title" href="#">Product Details</a>
                                                <ul>
                                                    <li><a href="product-details.php">tab style 1</a></li>
                                                    <li><a href="product-details-tab-2.php">tab style 2</a></li>
                                                    <li><a href="product-details-tab-3.php">tab style 3</a></li>
                                                    <li><a href="product-details-gallery.php">gallery style  </a></li>
                                                    <li><a href="product-details-gallery-right.php">gallery right</a></li>
                                                </ul>
                                            </li>
                                            <li><a class="menu-title" href="#">Product Details</a>
                                                <ul>
                                                    <li><a href="product-details-sticky.php">sticky style</a></li>
                                                    <li><a href="product-details-sticky-right.php">sticky right</a></li>
                                                    <li><a href="product-details-slider-box.php">slider style</a></li>
                                                    <li><a href="product-details-affiliate.php">Affiliate style</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="shop.php">Accessories <span>hot</span> </a></li>
                                    <li><a href="contact-us.php"> Contact </a></li>
                                    <li class="angle-shape"><a href="#">Pages </a>
                                        <ul class="submenu">
                                            <li><a href="about-us.php">about us </a></li>
                                            <li><a href="cart-page.php">cart page </a></li>
                                            <li><a href="checkout.php">checkout </a></li>
                                            <li><a href="compare-page.php">compare </a></li>
                                            <li><a href="wishlist.php">wishlist </a></li>
                                            <li><a href="my-account.php">my account </a></li>
                                            <li><a href="contact-us.php">contact us </a></li>
                                            <li><a href="login-register.php">login/register </a></li>
                                        </ul>
                                    </li>
                                    <li class="angle-shape"><a href="blog.php"> Blog </a>
                                        <ul class="submenu">
                                            <li><a href="blog.php">standard style </a></li>
                                            <li><a href="blog-2-col.php">blog 2 column </a></li>
                                            <li><a href="blog-3-col.php">blog 3 column </a></li>
                                            <li><a href="blog-right-sidebar.php">blog right sidebar </a></li>
                                            <li><a href="blog-details.php">blog details </a></li>
                                            <li><a href="blog-details-right-sidebar.php">blog details right sidebar </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
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
                                        <span class="count-style">02</span>
                                    </span>
                                    <span class="cart-price">
                                        $320.00
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
                                                <a href="#"><img alt="" src="assets/img/cart/cart-1.svg"></a>
                                                <div class="item-close">
                                                    <a href="#"><i class="sli sli-close"></i></a>
                                                </div>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#">Product Name </a></h4>
                                                <span>1 x 90.00</span>
                                            </div>
                                        </li>
                                        <li class="single-shopping-cart">
                                            <div class="shopping-cart-img">
                                                <a href="#"><img alt="" src="assets/img/cart/cart-2.svg"></a>
                                                <div class="item-close">
                                                    <a href="#"><i class="sli sli-close"></i></a>
                                                </div>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#">Product Name</a></h4>
                                                <span>1 x 90.00</span>
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
                            <div class="setting-wrap">
                                <button class="setting-active">
                                    <i class="sli sli-settings"></i>
                                </button>
                                <div class="setting-content">
                                    <ul>
                                        <li>
                                            <h4>Currency</h4>
                                            <ul>
                                                <li><a href="#">USD</a></li>
                                                <li><a href="#">Euro</a></li>
                                                <li><a href="#">Real</a></li>
                                                <li><a href="#">BDT</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <h4>Language</h4>
                                            <ul>
                                                <li><a href="#">English (US)</a></li>
                                                <li><a href="#">English (UK)</a></li>
                                                <li><a href="#">Spanish</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <h4>Account</h4>
                                            <ul>
                                                <li><a href="login-register.php">Login</a></li>
                                                <li><a href="login-register.php">Creat Account</a></li>
                                                <li><a href="my-account.php">My Account</a></li>
                                            </ul>
                                        </li>
                                    </ul>
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
    <div class="mobile-off-canvas-active">
        <a class="mobile-aside-close"><i class="sli sli-close"></i></a>
        <div class="header-mobile-aside-wrap">
            <div class="mobile-search">
                <form class="search-form" action="#">
                    <input type="text" placeholder="Search entire store…">
                    <button class="button-search"><i class="sli sli-magnifier"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap">
                <!-- mobile menu start -->
                <div class="mobile-navigation">
                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><a href="index.php">Home</a>
                                <ul class="dropdown">
                                    <li><a href="index.php">Home version 1 </a></li>
                                    <li><a href="index-2.php">Home version 2 </a></li>
                                    <li><a href="index-3.php">Home version 3 </a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children "><a href="shop.php">shop</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children"><a href="#">Shop Layout</a>
                                        <ul class="dropdown">
                                            <li><a href="shop.php">standard style</a></li>
                                            <li><a href="shop-grid-2-column.php">grid 2 column</a></li>
                                            <li><a href="shop-grid-4-column.php">grid 4 column</a></li>
                                            <li><a href="shop-grid-fullwide.php">grid full wide</a></li>
                                            <li><a href="shop-right-sidebar.php">grid right sidebar </a></li>
                                            <li><a href="shop-list-style1.php">list style 1</a></li>
                                            <li><a href="shop-list-style2.php">list style 2</a></li>
                                            <li><a href="shop-list-style3.php">list style 3</a></li>
                                            <li><a href="shop-list-fullwide.php">list full wide</a></li>
                                            <li><a href="shop-list-sidebar.php">list with sidebar </a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">products details</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.php">tab style 1</a></li>
                                            <li><a href="product-details-tab-2.php">tab style 2</a></li>
                                            <li><a href="product-details-tab-3.php">tab style 3</a></li>
                                            <li><a href="product-details-gallery.php">gallery style  </a></li>
                                            <li><a href="product-details-gallery-right.php">gallery right</a></li>
                                            <li><a href="product-details-sticky.php">sticky style</a></li>
                                            <li><a href="product-details-sticky-right.php">sticky right</a></li>
                                            <li><a href="product-details-slider-box.php">slider style</a></li>
                                            <li><a href="product-details-affiliate.php">Affiliate style</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="shop.php">Accessories </a></li>
                            <li class="menu-item-has-children"><a href="#">pages</a>
                                <ul class="dropdown">
                                    <li><a href="about-us.php">about us </a></li>
                                    <li><a href="cart-page.php">cart page </a></li>
                                    <li><a href="checkout.php">checkout </a></li>
                                    <li><a href="compare-page.php">compare </a></li>
                                    <li><a href="wishlist.php">wishlist </a></li>
                                    <li><a href="my-account.php">my account </a></li>
                                    <li><a href="contact-us.php">contact us </a></li>
                                    <li><a href="login-register.php">login/register </a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children "><a href="blog.php">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog.php">standard style </a></li>
                                    <li><a href="blog-2-col.php">blog 2 column </a></li>
                                    <li><a href="blog-3-col.php">blog 3 column </a></li>
                                    <li><a href="blog-right-sidebar.php">blog right sidebar </a></li>
                                    <li><a href="blog-details.php">blog details </a></li>
                                    <li><a href="blog-details-right-sidebar.php">blog details right sidebar </a></li>
                                </ul>
                            </li>
                            <li><a href="contact-us.php">Contact us</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-curr-lang-wrap">
                <div class="single-mobile-curr-lang">
                    <a class="mobile-language-active" href="#">Language <i class="sli sli-arrow-down"></i></a>
                    <div class="lang-curr-dropdown lang-dropdown-active">
                        <ul>
                            <li><a href="#">English (US)</a></li>
                            <li><a href="#">English (UK)</a></li>
                            <li><a href="#">Spanish</a></li>
                        </ul>
                    </div>
                </div>
                <div class="single-mobile-curr-lang">
                    <a class="mobile-currency-active" href="#">Currency <i class="sli sli-arrow-down"></i></a>
                    <div class="lang-curr-dropdown curr-dropdown-active">
                        <ul>
                            <li><a href="#">USD</a></li>
                            <li><a href="#">EUR</a></li>
                            <li><a href="#">Real</a></li>
                            <li><a href="#">BDT</a></li>
                        </ul>
                    </div>
                </div>
                <div class="single-mobile-curr-lang">
                    <a class="mobile-account-active" href="#">My Account <i class="sli sli-arrow-down"></i></a>
                    <div class="lang-curr-dropdown account-dropdown-active">
                        <ul>
                            <li><a href="login-register.php">Login</a></li>
                            <li><a href="login-register.php">Creat Account</a></li>
                            <li><a href="my-account.php">My Account</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mobile-social-wrap">
                <a class="facebook" href="#"><i class="sli sli-social-facebook"></i></a>
                <a class="twitter" href="#"><i class="sli sli-social-twitter"></i></a>
                <a class="pinterest" href="#"><i class="sli sli-social-pinterest"></i></a>
                <a class="instagram" href="#"><i class="sli sli-social-instagram"></i></a>
                <a class="google" href="#"><i class="sli sli-social-google"></i></a>
            </div>
        </div>
    </div>
    <div class="breadcrumb-area pt-35 pb-35 bg-gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="active">Cart page </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <h3 class="cart-page-title">Your cart items</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="#">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Until Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="assets/img/cart/cart-3.svg" alt=""></a>
                                        </td>
                                        <td class="product-name"><a href="#">Product Name</a></td>
                                        <td class="product-price-cart"><span class="amount">$260.00</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                            </div>
                                        </td>
                                        <td class="product-subtotal">$110.00</td>
                                        <td class="product-remove">
                                            <a href="#"><i class="sli sli-pencil"></i></a>
                                            <a href="#"><i class="sli sli-close"></i></a>
                                       </td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="assets/img/cart/cart-4.svg" alt=""></a>
                                        </td>
                                        <td class="product-name"><a href="#">Product Name</a></td>
                                        <td class="product-price-cart"><span class="amount">$150.00</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                            </div>
                                        </td>
                                        <td class="product-subtotal">$150.00</td>
                                        <td class="product-remove">
                                            <a href="#"><i class="sli sli-pencil"></i></a>
                                            <a href="#"><i class="sli sli-close"></i></a>
                                       </td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="assets/img/cart/cart-5.svg" alt=""></a>
                                        </td>
                                        <td class="product-name"><a href="#">Product Name </a></td>
                                        <td class="product-price-cart"><span class="amount">$170.00</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                            </div>
                                        </td>
                                        <td class="product-subtotal">$170.00</td>
                                        <td class="product-remove">
                                            <a href="#"><i class="sli sli-pencil"></i></a>
                                            <a href="#"><i class="sli sli-close"></i></a>
                                       </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="#">Continue Shopping</a>
                                    </div>
                                    <div class="cart-clear">
                                        <button>Update Shopping Cart</button>
                                        <a href="#">Clear Shopping Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="cart-tax">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                                </div>
                                <div class="tax-wrapper">
                                    <p>Enter your destination to get a shipping estimate.</p>
                                    <div class="tax-select-wrapper">
                                        <div class="tax-select">
                                            <label>
                                                * Country
                                            </label>
                                            <select class="email s-email s-wid">
                                                <option>Bangladesh</option>
                                                <option>Albania</option>
                                                <option>Åland Islands</option>
                                                <option>Afghanistan</option>
                                                <option>Belgium</option>
                                            </select>
                                        </div>
                                        <div class="tax-select">
                                            <label>
                                                * Region / State
                                            </label>
                                            <select class="email s-email s-wid">
                                                <option>Bangladesh</option>
                                                <option>Albania</option>
                                                <option>Åland Islands</option>
                                                <option>Afghanistan</option>
                                                <option>Belgium</option>
                                            </select>
                                        </div>
                                        <div class="tax-select">
                                            <label>
                                                * Zip/Postal Code
                                            </label>
                                            <input type="text">
                                        </div>
                                        <button class="cart-btn-2" type="submit">Get A Quote</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="discount-code-wrapper">
                                <div class="title-wrap">
                                   <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4> 
                                </div>
                                <div class="discount-code">
                                    <p>Enter your coupon code if you have one.</p>
                                    <form>
                                        <input type="text" required="" name="name">
                                        <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                </div>
                                <h5>Total products <span>$260.00</span></h5>
                                <div class="total-shipping">
                                    <h5>Total shipping</h5>
                                    <ul>
                                        <li><input type="checkbox"> Standard <span>$20.00</span></li>
                                        <li><input type="checkbox"> Express <span>$30.00</span></li>
                                    </ul>
                                </div>
                                <h4 class="grand-totall-title">Grand Total  <span>$260.00</span></h4>
                                <a href="#">Proceed to Checkout</a>
                            </div>
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
</div>
<?php
include("inc/footer.php");
?>
</body>
</php>

</php>