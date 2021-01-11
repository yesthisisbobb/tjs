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
    </header>


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
