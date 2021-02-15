<?php
include('db/config.php');
include('rupiah.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>SMB | Company Profile</title>
    <?php include("./headerdkk/template-head.php"); ?>
</head>

<body id="realcontainer">
    <?php include('headerdkk/header.php'); ?>
    <div id="cp-base-container">
        <div id="cp-main-container">
            <div id="cp-header">
                <img src="resource/smboutline_logo_only.svg" alt="Smart Marble & Bath Logo" class="not-selectable">
            </div>
            <div id="cp-projects">
                <div class="smb-serif cp-section">
                    About Us
                </div>
            </div>
            <div id="cp-projects">
                <div class="smb-serif cp-section">
                    Project Portfolio
                </div>
            </div>
        </div>
    </div>
    <?php include("floating-cart.php"); ?>
    <?php include("headerdkk/footer.php"); ?>
</body>

</html>