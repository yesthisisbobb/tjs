<?php
include('db/config.php');
include('rupiah.php');

session_start();
if (!isset($_SESSION["username"])) {
    header("Location:access.php?logged=false");
}

$username = $_SESSION["username"];
$result = array();

$command = "SELECT *, DATE_FORMAT(date, '%e %M %Y') as r_date FROM CUSTOMER WHERE email='$username'";
$query = mysqli_query($conn, $command);
if ($query) {
    $result = mysqli_fetch_assoc($query);
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
                    <img src="../img/user/default/<?= $result["gam"] ?>" alt="Profile Picture">
                </div>
                <div id="acc-name"><?php echo $result["nama"]; ?></div>
                <div id="acc-date">Member since&nbsp<?php echo $result["r_date"]; ?></div>
            </div>
            <div id="acc-bot">
                <table>
                    <tr id="acc-email">
                        <td>Email</td>
                        <td><?php echo $result["email"]; ?></td>
                    </tr>
                    <tr id="acc-username">
                        <td>Username</td>
                        <td><?php echo $result["username"]; ?></td>
                    </tr>
                    <tr id="acc-pass">
                        <td>Password</td>
                        <?php
                        $passtemp = "";
                        for ($i = 0; $i < strlen($result["password"]); $i++) {
                            $passtemp .= "*";
                        }
                        echo "<td>$passtemp</td>";
                        ?>
                    </tr>
                    <tr id="acc-opass">
                        <td>Old Password</td>
                        <td><input type="password"></td>
                    </tr>
                    <tr id="acc-npass">
                        <td>New Password</td>
                        <td><input type="password"></td>
                    </tr>
                    <tr id="acc-cpass">
                        <td>Confirm New Password</td>
                        <td>
                            <input type="password">
                            <span class="acc-validation">*Value has to match New Password</span>
                        </td>
                    </tr>
                    <tr id="acc-address">
                        <td>Address</td>
                        <td><?php echo $result["alamat"]; ?></td>
                    </tr>
                    <tr id="acc-phn-num">
                        <td>Phone Number</td>
                        <?php
                        $teltemp = "";
                        for ($i = 0; $i < strlen($result["telp"]); $i++) {
                            if ($i > (strlen($result["telp"]) - 1) - 4) {
                                $teltemp .= $result["telp"][$i];
                            } else {
                                $teltemp .= "*";
                            }
                        }
                        echo "<td>$teltemp</td>";
                        ?>
                    </tr>
                    <tr id="acc-ophn-num">
                        <td>Old Phone Number</td>
                        <td><input type="text" placeholder="+62000111222"></td>
                    </tr>
                    <tr id="acc-nphn-num">
                        <td>New Phone Number</td>
                        <td><input type="text" placeholder="+62111222333"></td>
                    </tr>
                    <tr>
                        <td><button type="button" class="btn btn-link" id="acc-edit"><i class="far fa-edit"></i>Edit Profile</button></td>
                        <td><button type="button" class="btn btn-link" id="acc-conf"><i class="fas fa-check"></i>Confirm</button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <?php include("floating-cart.php"); ?>
    <?php include("headerdkk/footer.php"); ?>
</body>

</html>
<script src="vendor/tata/dist/tata.js"></script>
<script>
    let email = $("#acc-email td:nth-child(2)").text();
    let usernametemp = "",
        passtemp = "",
        addresstemp = "",
        teltemp = "";
    let passwordFormVisible = false,
        confirmButtonVisible = false;

    function hideEditForm(type) {
        if (type === "old") {
            // Re-draw with old value
            $("#acc-username td:nth-child(2)").html(`${usernametemp}`);
            $("#acc-address td:nth-child(2)").html(`${addresstemp}`);
        }

        // Hide form
        $("#acc-opass, #acc-npass, #acc-cpass").css("display", "none");
        $("#acc-ophn-num, #acc-nphn-num").css("display", "none");
        $("#acc-conf").css("display", "none");

        // Clear input values
        $("#acc-username input").val("");
        $("#acc-opass input").val("");
        $("#acc-npass input").val("");
        $("#acc-cpass input").val("");
        $("#acc-address input").val("");
        $("#acc-ophn-num input").val("");
        $("#acc-nphn-num input").val("");

        // Confirm button hidden
        confirmButtonVisible = false;
    }

    $("#acc-edit").click(function() {
        if (!confirmButtonVisible) {
            usernametemp = $("#acc-username td:nth-child(2)").text();
            passtemp = $("#acc-pass td:nth-child(2)").text();
            addresstemp = $("#acc-address td:nth-child(2)").text();
            teltemp = $("#acc-phn-num td:nth-child(2)").text();

            $("#acc-opass, #acc-npass, #acc-cpass").css("display", "table-row");
            $("#acc-ophn-num, #acc-nphn-num").css("display", "table-row");
            $("#acc-conf").css("display", "inline-block");
            passwordFormVisible = true;
            confirmButtonVisible = true;

            console.log(usernametemp, passtemp, addresstemp, teltemp);

            $("#acc-username td:nth-child(2)").html(`<input type='text' value='${usernametemp}'>`);
            $("#acc-address td:nth-child(2)").html(`<input type='text' value='${addresstemp}'>`);
        } else {
            hideEditForm("old");
        }
    });

    $("#acc-cpass input").change(function() {
        if ($("#acc-npass input").val() != $("#acc-cpass input").val()) {
            $("#acc-cpass .acc-validation").css("visibility", "visible");
        } else {
            $("#acc-cpass .acc-validation").css("visibility", "hidden");
        }
    });

    $("#acc-conf").click(function() {
        let valuesArray = {
            "email": email,
            "username": $("#acc-username input").val(),
            "opass": $("#acc-opass input").val(),
            "npass": $("#acc-npass input").val(),
            "address": $("#acc-address input").val(),
            "ophn": $("#acc-ophn-num input").val(),
            "nphn": $("#acc-nphn-num input").val()
        };

        let dataToBeSent = JSON.stringify(valuesArray);

        $.ajax({
            url: "processes/update-user-data.php",
            method: "POST",
            dataType: "JSON",
            data: {
                "sent-data": dataToBeSent
            },
            beforeSend: function() {
                //
            },
            success: function(data) {
                // Check which has changed
                let usernameChanged = false,
                    passChanged = false,
                    addressChanged = false,
                    phnChanged = false;

                for (let i = 0; i < data.length; i++) {
                    const item = data[i];
                    if (item["dcode"] === 11) {
                        usernameChanged = true;
                    } else if (item["dcode"] === 21) {
                        passChanged = true;
                    } else if (item["dcode"] === 31) {
                        addressChanged = true;
                    } else if (item["dcode"] === 41) {
                        phnChanged = true;
                    }
                }

                // Change shown values
                if (usernameChanged) {
                    $("#acc-username td:nth-child(2)").html(`${valuesArray["username"]}`);
                } else {
                    $("#acc-username td:nth-child(2)").html(`${usernametemp}`);
                }

                if (addressChanged) {
                    $("#acc-address td:nth-child(2)").html(`${valuesArray["address"]}`);
                } else {
                    $("#acc-address td:nth-child(2)").html(`${addresstemp}`);
                }

                if (passChanged) {
                    let passtemp = "";
                    for (let i = 0; i < valuesArray["npass"].length; i++) {
                        passtemp += "*";
                    }
                    $("#acc-pass td:nth-child(2)").html(`${passtemp}`);
                } else {
                    $("#acc-pass td:nth-child(2)").html(`${passtemp}`);
                }

                if (phnChanged) {
                    let phntemp = "";
                    for (let i = 0; i < valuesArray["nphn"].length; i++) {
                        const item = valuesArray["nphn"][i];
                        if (i > (valuesArray["nphn"].length - 1) - 4) {
                            phntemp += item;
                        } else {
                            phntemp += "*";
                        }
                    }
                    $("#acc-phn-num td:nth-child(2)").html(`${phntemp}`);
                } else {
                    $("#acc-phn-num td:nth-child(2)").html(`${teltemp}`);
                }

                tata.success("Success!", "Profile update successful", {
                    position: 'mr'
                });
            },
            error: function(err) {
                console.error(err.responseText);
                $("#acc-username td:nth-child(2)").html(`${usernametemp}`);
                $("#acc-pass td:nth-child(2)").html(`${passtemp}`);
                $("#acc-address td:nth-child(2)").html(`${addresstemp}`);
                $("#acc-phn-num td:nth-child(2)").html(`${teltemp}`);

                tata.error("Error", "An error occured while updating profile", {
                    position: 'mr'
                });
            },
            complete: function() {}
        });

        hideEditForm();
    });
</script>