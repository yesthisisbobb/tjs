<?php
session_start();
include("inc/config.php"); //include koneksi database
include("inc/header.php");
include("proses.php");
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


                </div>
            </div>
            <!-- main-search start -->

        </div>
<!-- <div class="header-small-mobile">
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
        </div> -->
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
    <div class="breadcrumb-area pt-15 pb-15 bg-gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="active">login & register </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-register-area pt-40 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-toggle="tab" href="#lg1">
                                <h4> login </h4>
                            </a>
                            <a data-toggle="tab" href="#lg2">
                                <h4> register </h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="" method="post">
                                          <div class="form-group m-b-15">
                                            <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required />
                                          </div>
                                          <div class="form-group m-b-15">
                                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required />
                                          </div>
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox">
                                                    <label>Remember me</label>
                                                    <a href="#">Forgot Password?</a>
                                                </div>

                                            </div>
                                            <button type="submit" name="login" class="btn btn-primary btn-block btn-lg">LOG IN</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="proses-user.php" method="post">
                                          <div class="form-group m-b-2">
                                            <input type="text" name="nama" class="form-control form-control-sm" placeholder="Name" required />
                                          </div>
                                          <div class="form-group m-b-2">
                                            <input type="text" name="email" class="form-control form-control-sm" placeholder="Email" required />
                                          </div>
                                          <div class="form-group m-b-2">
                                            <input type="text" name="username" class="form-control form-control-sm" placeholder="Username" required />
                                          </div>
                                          <div class="form-group m-b-2">
                                            <input type="password" name="password" class="form-control form-control-sm" placeholder="Password" required />
                                          </div>

                                          <select name="sales" id="sales" class="form-control form-control-sm">
                                            <option>Select Your Sales</option>
                                          <?php
                                          $sql = "SELECT * FROM master_sales";
                                          $query = mysqli_query($conn, $sql);
                                          while($amku = mysqli_fetch_array($query)){
                                          echo "<option value=".$amku['no'].">".$amku['nama']."</option>";
                                          }
                                          ?>
                                          </select>
                                          <br><br>
                                            <div class="button-box">
                                                <button type="submit" name="daftar" value="daftar" class="btn btn-primary btn-block btn-lg">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <footer class="footer-area bg-paleturquoise">

        <div class="footer-bottom border-top-1 pt-10">
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
