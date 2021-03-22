<?php
include("../db/config.php");

if (isset($_GET["ccode"])) {
    $code = $_GET["ccode"];

    $command = "SELECT pc FROM country WHERE countrycode='$code'";
    $query = mysqli_query($conn, $command);
    $result = mysqli_fetch_assoc($query);

    echo $result["pc"];
}
?>