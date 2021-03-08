<?php
include("../db/config.php");

// Sent Data
# valuesArray["email"]
# valuesArray["username"]
# valuesArray["opass"]
# valuesArray["npass"]
# valuesArray["address"]
# valuesArray["ophn"]
# valuesArray["nphn"]

$data = json_decode($_POST["sent-data"], true);
if (isset($data["email"]) && isset($data["username"]) && isset($data["opass"]) && isset($data["npass"]) && isset($data["address"]) && isset($data["ophn"]) && isset($data["nphn"])) {
    $email = $data["email"];
    $username = $data["username"];
    $opass = $data["opass"];
    $npass = $data["npass"];
    $address = $data["address"];
    $ophn = $data["ophn"];
    $nphn = $data["nphn"];
}

$allresponse = array();
$response = array();

if (isset($data["username"]) && !empty($data["username"])) {
    $command = "SELECT username FROM CUSTOMER WHERE email='$email' AND username='$username'";
    $query = mysqli_query($conn, $command);
    if ($query) {
        if (mysqli_num_rows($query) < 1) {
            $command = "UPDATE CUSTOMER SET username = '$username' WHERE email = '$email'";
            $query = mysqli_query($conn, $command);
            if ($query) {
                $response["code"] = 200;
                $response["dcode"] = 11;
                $response["msg"] = "Username update successful";
            }
            else{
                $response["code"] = 400;
                $response["dcode"] = 12;
                $response["msg"] = "Username update failed";
            }
        }
        else{
            $response["code"] = 404;
            $response["dcode"] = 13;
            $response["msg"] = "Customer not found - Code 1";
        }
    }
    else {
        $response["code"] = 400;
        $response["dcode"] = 14;
        $response["msg"] = "Query failed to be executed / No change in username - Code 1";
    }
}

array_push($allresponse, $response);

if ((isset($data["opass"]) && !empty($data["opass"])) && (isset($data["npass"]) && !empty($data["npass"]))) {
    $command = "SELECT username FROM CUSTOMER WHERE email='$email' AND password = '$opass'";
    $query = mysqli_query($conn, $command);
    if ($query) {
        if (mysqli_num_rows($query) > 0) {
            $command = "UPDATE CUSTOMER SET password = '$npass' WHERE email = '$email'";
            $query = mysqli_query($conn, $command);
            if ($query) {
                $response["code"] = 200;
                $response["dcode"] = 21;
                $response["msg"] = "Password update successful";
            } else {
                $response["code"] = 400;
                $response["dcode"] = 22;
                $response["msg"] = "Password update failed";
            }
        } else {
            $response["code"] = 404;
            $response["dcode"] = 23;
            $response["msg"] = "Customer not found - Code 2";
        }
    } else {
        $response["code"] = 400;
        $response["dcode"] = 24;
        $response["msg"] = "Query failed to be executed - Code 2";
    }
}

array_push($allresponse, $response);

if (isset($data["address"]) && !empty($data["address"])) {
    $command = "SELECT username FROM CUSTOMER WHERE email='$email' AND alamat = '$address'";
    $query = mysqli_query($conn, $command);
    if ($query) {
        if (mysqli_num_rows($query) < 1) {
            $command = "UPDATE CUSTOMER SET alamat = '$address' WHERE email = '$email'";
            $query = mysqli_query($conn, $command);
            if ($query) {
                $response["code"] = 200;
                $response["dcode"] = 31;
                $response["msg"] = "Address update successful";
            } else {
                $response["code"] = 400;
                $response["dcode"] = 32;
                $response["msg"] = "Address update failed";
            }
        } else {
            $response["code"] = 404;
            $response["dcode"] = 33;
            $response["msg"] = "Customer not found / No change in address - Code 3";
        }
    } else {
        $response["code"] = 400;
        $response["dcode"] = 34;
        $response["msg"] = "Query failed to be executed - Code 3";
    }
}

array_push($allresponse, $response);

if ((isset($data["ophn"]) && !empty($data["ophn"])) && (isset($data["nphn"]) && !empty($data["nphn"]))) {
    $command = "SELECT username FROM CUSTOMER WHERE email='$email' AND telp = '$ophn'";
    $query = mysqli_query($conn, $command);
    if ($query) {
        if (mysqli_num_rows($query) > 0) {
            $command = "UPDATE CUSTOMER SET telp = '$nphn' WHERE email = '$email'";
            $query = mysqli_query($conn, $command);
            if ($query) {
                $response["code"] = 200;
                $response["dcode"] = 41;
                $response["msg"] = "Phone number update successful";
            } else {
                $response["code"] = 400;
                $response["dcode"] = 42;
                $response["msg"] = "Phone number update failed";
            }
        } else {
            $response["code"] = 404;
            $response["dcode"] = 43;
            $response["msg"] = "Customer not found - Code 4";
        }
    } else {
        $response["code"] = 400;
        $response["dcode"] = 44;
        $response["msg"] = "Query failed to be executed - Code 4";
    }
}

array_push($allresponse, $response);

echo json_encode($allresponse);
?>