<?php
include('db/config.php');
include('rupiah.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>SMB | Company Profile</title>
    <?php include("./headerdkk/template-head.php"); ?>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
</head>

<body id="realcontainer">
    <?php include('headerdkk/header.php'); ?>
    <div id="cp-base-container">
        <div id="cp-main-container">
            <div id="cp-header">
                <img src="resource/smboutline_logo_only.svg" alt="Smart Marble & Bath Logo" class="not-selectable">
            </div>
            <div class="cp-section" id="cp-about">
                <div class="cp-section-header">
                    About Us
                </div>
                <div class="cp-section-desc-1">
                    <div class="cp-image">
                        <img src="../img/company-profile/2Â¥´ÉÆ¬Çø02-1.jpg" alt="">
                    </div>
                    <div class="cp-text">
                        <h3>Our <span class="cp-bolden">Company</span></h3>
                        <br>
                        <p>
                            Smart Marble & Bath (SMB) was founded in 2018, in Jakarta, the business central in Indonesia. SMB offers top quality line of tile, bathroom fitting, and sanitary products. Our showroom located in the Jagat Building Jl. Tomang Raya No. 28-30 West Jakarta 11430
                        </p>
                        <br>
                        <p>
                            Smart Marble & Bath (SMB) is a branch of Karya Modern Group is located in Surabaya and has been already in tile and bathroom ﬁtting business for more than 42 years. Karya Modern Group was founded in 1976 in Surabaya and was a material store when it was ﬁrst started. Karya Modern Group located in Surabaya, East Java Province. It was built since 1976 as a material store located at Jl. Baliwerti No. 119-121 Kav 10, Surabaya.

                        </p>
                    </div>
                </div>
                <div class="cp-section-desc-2">
                    <div class="cp-text">
                        <h3>Our <span class="cp-bolden">Values</span></h3>
                        <br>
                        <p>
                            Perfection in any architectural design needs perfect planning, perfect management system, and perfect execution. But the most important thing is the material used to build; that has to be perfect to create the impression of perfection itself.
                        </p>
                        <br>
                        <p>
                            Smart Marble & Bath (SMB) introduces smart tile to make your space look spectacular. With more than 42 years of experience in supplying building material, we make sure that we provide only best quality of tile with hundreds of designs/pattern, different ﬁnishes, variety in functions ( indoor and outdoor) and its strenghts.
                        </p>
                        <br>
                        <p>
                            A one stop solution for your tile needs that provide <span class="cp-bolden-heavy">Perfect Goods to Perfect You!</span>
                        </p>
                    </div>
                    <div class="cp-image">
                        <img src="../img/company-profile/印尼泗水店-3F-公共区3.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="cp-section" id="cp-cert">
                <div class="cp-section-header">
                    Certifications
                </div>
            </div>
            <div class="cp-section" id="cp-projects">
                <div class="cp-section-header">
                    Project Portfolio
                </div>
            </div>
        </div>
    </div>
    <?php include("floating-cart.php"); ?>
    <?php include("headerdkk/footer.php"); ?>
</body>

</html>