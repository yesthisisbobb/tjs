<?php
include('db/config.php');
include('rupiah.php');

session_start();
if (!isset($_SESSION["username"])) {
    header("Location:access.php?logged=false");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>SMB | My Account</title>
    <?php include("./headerdkk/template-head.php"); ?>
</head>

<body class="content-container">
    <?php include('headerdkk/header.php'); ?>

    <div id="acc-base">
        <div id="acc-main">
            <div id="acc-top">
                <div id="acc-img">
                    <img src="../img/user/default/pp3.png" alt="Profile Picture">
                </div>
                <div id="acc-name">Bobby Ishak</div>
                <div id="acc-date">Member since 12 January 2021</div>
            </div>
            <div id="acc-bot">
                <table>
                    <tr id="acc-email">
                        <td>Email</td>
                        <td>bobbyishak20@gmail.com</td>
                    </tr>
                    <tr id="acc-username">
                        <td>Username</td>
                        <td>yofucc</td>
                    </tr>
                    <tr id="acc-pass">
                        <td>Password</td>
                        <td>*****</td>
                    </tr>
                    <tr id="acc-cpass">
                        <td>Confirm Password</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr id="acc-address">
                        <td>Address</td>
                        <td>Jl. Jagaraga No. 34</td>
                    </tr>
                    <tr id="acc-phn-num">
                        <td>Phone Number</td>
                        <td>082133847221</td>
                    </tr>
                    <tr id="acc-sales">
                        <td>Salesperson</td>
                        <td>Honey</td>
                    </tr>
                    <tr>
                        <td><button type="button" class="btn btn-link"><i class="far fa-edit"></i>Edit Profile</button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <?php include("floating-cart.php"); ?>
    <?php include("headerdkk/footer.php"); ?>
</body>

</html>