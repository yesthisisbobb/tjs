<?php
session_start();
include("db/config.php");
include("vendor/phpqrcode/qrlib.php"); 

if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
    $tipe = $_POST["tipe"];

    $status_selection = "";
    if (isset($_POST["status_selection"])) {
        // $status_selection = "AND LOWER(status_payment)='$status_selection'";
        $status_selection = $_POST["status_selection"];
    }

    // Query command settings
    $getcommand = "";

    $stockFilter = "";
    if($tipe == "ready") $stockFilter = "AND tipe='RDY'";
    else if ($tipe == "indent") $stockFilter = "AND tipe='IDT'";

    if($tipe != "all"){
        if($status_selection == "paid"){
            $getcommand = "SELECT * FROM inv WHERE user_id='$username' AND LOWER(status_payment) = 'paid' $stockFilter ORDER BY tgl DESC";
            // echo "ANY PAID masuk i1i1 - " . "SELECT * FROM inv WHERE user_id='$username' AND LOWER(status_payment) = 'paid' $stockFilter ORDER BY tgl DESC";
        } else if($status_selection == "unpaid"){
            $getcommand = "SELECT * FROM inv WHERE user_id='$username' AND LOWER(status_payment) = 'unpaid' $stockFilter ORDER BY tgl DESC";
            // echo "ANY UNPAID masuk i1i2 - " . "SELECT * FROM inv WHERE user_id='$username' AND LOWER(status_payment) = 'unpaid' $stockFilter ORDER BY tgl DESC";
        } else{
            $getcommand = "SELECT * FROM inv WHERE user_id='$username' $stockFilter ORDER BY tgl DESC";
            // echo "ANY ALL masuk i1i3 - " . "SELECT * FROM inv WHERE user_id='$username' $stockFilter ORDER BY tgl DESC";
        }
    } else {
        if ($status_selection == "paid") {
            $getcommand = "SELECT no, tgl, noinv, noso, user_id, status, status_payment, tipe from inv WHERE user_id='$username' AND LOWER(status_payment) = 'paid' ORDER BY 2 DESC";
            // echo "ALL PAID masuk i2i1 - " . "SELECT no, tgl, noinv, noso, user_id, status, status_payment, tipe from inv WHERE user_id='$username' AND LOWER(status_payment) = 'paid' ORDER BY 2 DESC";;
        }
        else if($status_selection == "unpaid"){
            $getcommand = "SELECT no, tgl, noinv, noso, user_id, status, status_payment, tipe from inv WHERE user_id='$username' AND LOWER(status_payment) = 'unpaid' ORDER BY 2 DESC";
            // echo "ALL UNPAID masuk i2i2 - " . "SELECT no, tgl, noinv, noso, user_id, status, status_payment, tipe from inv WHERE user_id='$username' AND LOWER(status_payment) = 'unpaid' ORDER BY 2 DESC";
        }
        else{
            $getcommand = "SELECT no, tgl, noinv, noso, user_id, status, status_payment, tipe from inv WHERE user_id='$username' ORDER BY 2 DESC";
            // echo "ALL ALL masuk i2i3 - " . "SELECT no, tgl, noinv, noso, user_id, status, status_payment, tipe from inv WHERE user_id='$username' ORDER BY 2 DESC";
        }
    }
    $getquery = mysqli_query($conn, $getcommand);
    $resultQty = mysqli_num_rows($getquery);

    if ($resultQty > 0) {
        echo    '<form id="table-container" class="woocommerce-cart-form" method="POST">
                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents wishlist_table">
                <thead>
                    <tr class="justify-content-center">
                        <th class="text-center">Date</th>
                        <th class="text-center">No. SO.</th>
                        <th class="text-center">No. Invoice</th>
                        <th class="text-center">Payment Status</th>
                        <th class="text-center">Stock</th>
                    </tr>
                </thead>
                <tbody>';

        $ctr = 0;
        while ($row = mysqli_fetch_array($getquery)) {
            $paymentstatus = $row["status_payment"] == "Unpaid" ? "unpaid" : "paid";
            $ctr++;

            // Link-link
            $linkToSO = 'http://localhost/tjs/tjs/venturafe2/sales-order.php?no=' . $row["noso"];
            $linkToINV = 'http://localhost/tjs/tjs/venturafe2/invoice.php?no=' . $row["noso"];

            // Get amount of invoice of the SO
            $invoiceQty = 0;
            $noso = $row['noso'];
            $command = "SELECT COUNT(noinv) as qty FROM inv WHERE noso='$noso' AND user_id='$username'";
            $query = mysqli_query($conn, $command);
            if (mysqli_num_rows($query) > 0) {
                $data = mysqli_fetch_assoc($query);
                $invoiceQty = $data["qty"];
            }

            if ($invoiceQty < 1) {
                $displayInvoiceQty = "";
            }
            else{
                $displayInvoiceQty = "($invoiceQty)";
            }

            // Checking Tipe
            $transtipe = "";
            if ($row["tipe"] == "RDY") {
                $transtipe = "READY";
            }
            else if($row["tipe"] == "IDT"){
                $transtipe = "INDENT";
            }

            echo        '<tr class="woocommerce-cart-form__cart-item cart_item">
                        <td>
                            <div class="text-center">
                                ' . $row["tgl"] . '
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                ' . $row["noso"] . '
                                <br><button type="button" class="btn btn-link btn-md" onclick="toSO(`' . $linkToSO . '`)"><i class="far fa-file-alt"></i>View</button>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                ' . $row["noinv"] . '
                                <br><button type="button" class="btn btn-link btn-md" onclick="toSO(`' . $linkToINV . '`)"><i class="far fa-file-alt"></i>View</button>
                            </div>
                        </td>
                        <td>
                            <div class="text-center ' . $paymentstatus . '">
                                ' . $row["status_payment"] . '
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                ' . $transtipe . '
                            </div>
                        </td>
                    </tr>';
        }

        echo        '</tbody>
            </table>
            </form>';
    }
    else{
        if($status_selection == "paid"){
            $word = "Looks like you don't have any paid transaction...";
        } else if ($status_selection == "unpaid") {
            $word = "Looks like you have't made any transaction...";
        }else{
            $word = "Looks like you don't have any transaction...";
        }
        echo    "<div class='empty-message-container'>
                    <h2>Oops! $word</h2>
                    <img src='resource/empty-transaction.png'>
                    <span>Start making transactions to view it here!</span>
                </div>";
    }
}
else{
    echo "<div>m-ty :(</div>";
}
