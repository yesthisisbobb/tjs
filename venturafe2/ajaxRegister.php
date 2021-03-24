<?php
include('db/config.php');

$res = array();

#email=a&fullname=&username=b&password=c&country=ARG&phone=112&city=d&province=e&alamat=f&tax=no&npwp=&sales=rec
if (isset($_POST["email"]) || isset($_POST["fullname"]) || isset($_POST["password"]) || isset($_POST["country"]) || isset($_POST["phone"]) || isset($_POST["city"]) || isset($_POST["province"]) || isset($_POST["alamat"]) || isset($_POST["tax"]) || isset($_POST["sales"])) {
    $email = $_POST["email"];
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $city = $_POST["city"];
    $province = $_POST["province"];
    $alamat = $_POST["alamat"];
    $tax = $_POST["tax"];
    $npwp = $_POST["npwp"];
    $sales = $_POST["sales"];

    $res[] = "CP1";

    // === Phone Number Processes
    // Get Phone Code
    $command = "SELECT pc FROM country WHERE countrycode='$country'";
    $query = mysqli_query($conn, $command);
    $result = mysqli_fetch_assoc($query);
    $phonecode = $result["pc"];

    $res[] = "CP2";

    // Phone number preprocessing
    $pTempArr = str_split($phone);
    $nonZeroFound = false;
    $idxToBeRemoved = array();

    $res[] = "CP3";

    // Get the indexes of wrongfully placed '0'
    for ($i=0; $i < sizeof($pTempArr); $i++) { 
        $item = $pTempArr[$i];

        if ($item != "0") $nonZeroFound = true;
        if (!$nonZeroFound){
            if ($item == "0") $idxToBeRemoved[] = $i;
        }
    }

    $res[] = "CP5";

    // Make new array without those '0's
    $newpTempArr = array();
    $removeCount = sizeof($idxToBeRemoved);
    for ($i=0; $i < sizeof($pTempArr); $i++) {
        $item = $pTempArr[$i];
        
        if (sizeof($idxToBeRemoved) < 1) {
            $newpTempArr[] = $item;
        }
        else{
            // Iterate through the wrong number indexes
            for ($j = 0; $j < sizeof($idxToBeRemoved); $j++) {
                $wrongNumIdx = $idxToBeRemoved[$j];

                // Add if item isn't in the wrong number index
                if ($i != $wrongNumIdx) {
                    if ($removeCount < 1) {
                        $newpTempArr[] = $item;
                        break;
                    }
                }
                else{
                    $removeCount--;
                    break;
                }
            }
        }
    }
    $cleanPhnNum = implode("", $newpTempArr);

    $res[] = "CP6";

    // Final Phone Number
    $finalphonenum = "($phonecode) $cleanPhnNum";

    $res[] = "CP7";

    // Get date of today
    $tanggal = "NOW()";

    $res[] = "CP8";

    $command = "INSERT INTO login(username, nama, email, level, role, password, date, sales) values('$username', '$fullname', '$email', 'user', 'user', '$password', $tanggal, '$sales')";
    $query = mysqli_query($conn, $command);
    if ($query) {
        $res[] = "QS1";

        $command = "INSERT INTO customer(email, nama, username, password, telp, negara, provinsi, kota, alamat, date, sales, tax, npwp, gam) values('$email', '$fullname', '$username', '$password', '$finalphonenum', '$country', '$province', '$city', '$alamat', $tanggal, '$sales', '$tax', '$npwp', '')";
        $query2 = mysqli_query($conn, $command);
        if ($query2) {
            $res[] = "QS2";
        } else {
            $res[] = "QF2";
        }
    } else {
       $res[] = "QF1";
    }

    $res[] = "CP9";
}
else{
    $res[] = "NDD";
}

echo json_encode($res);

?>