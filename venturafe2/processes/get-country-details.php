<?php
include("../db/config.php");

if (isset($_GET["ccode"])) {
    $code = $_GET["ccode"];

    $command = "SELECT pc FROM country WHERE countrycode='$code'";
    $query = mysqli_query($conn, $command);

    if ($query) {
        $result = mysqli_fetch_assoc($query);
        echo $result["pc"];
    }
    else{
        echo "QF";
    }
}
?>