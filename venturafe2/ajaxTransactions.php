<?php
session_start();
include("db/config.php");
include("vendor/phpqrcode/qrlib.php"); 

if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
    $tipe = $_POST["tipe"];
    $status_selection = $_POST["status_selection"];

    $getcommand = "";
    if($tipe == "ready"){
        if($status_selection == "paid"){
            $getcommand = "SELECT * FROM jual WHERE user_id='$username' AND status_payment = 'Paid' ORDER BY tgl DESC";
        } else {
            $getcommand = "SELECT * FROM jual WHERE user_id='$username' AND status_payment = 'Unpaid' ORDER BY tgl DESC";
        }
    } else if ($tipe == "indent") {
        if ($status_selection == "paid") {
            $getcommand = "SELECT * FROM ijual WHERE user_id='$username' AND status_payment = 'Paid' ORDER BY tgl DESC";
        } else {
            $getcommand = "SELECT * FROM ijual WHERE user_id='$username' AND status_payment = 'Unpaid' ORDER BY tgl DESC";
        }
    } else {
        $getcommand = "SELECT no, tgl, cart_id, noso, user_id, status, status_payment, 'Ready' as transtype from jual WHERE user_id='$username' UNION SELECT no, tgl, cart_id, noso, user_id, status, status_payment, 'Indent' as transtype from ijual WHERE user_id='$username' ORDER BY 2 DESC";
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
                        <th class="text-center">Payment Status</th>
                        <th class="text-center">Stock</th>
                        <th class="text-center">QR Code</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>';

        $ctr = 0;
        while ($row = mysqli_fetch_array($getquery)) {
            $paymentstatus = $row["status_payment"] == "Unpaid" ? "unpaid" : "paid";
            $ctr++;

            $tempdir = "qr/"; //Nama folder tempat menyimpan file qrcode
            if (!file_exists($tempdir)) //Buat folder bername qr
            mkdir($tempdir);

            //isi qrcode jika di scan
            $linkToSO = 'https://localhost/tjs/tjs/venturafe2/sales-order.php?no=' . $row["noso"];

            //simpan file kedalam temp
            $tempName = "";
            $tempArr = explode("/",$row["noso"]);
            foreach ($tempArr as $a) {
                $tempName .= $a;
            }
            if(!file_exists($tempdir . $tempName . '.png')){
                QRcode::png($linkToSO, $tempdir . $tempName . '.png', QR_ECLEVEL_L, 3);
            }

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
            if (isset($row["transtype"])) {
                $transtipe = strtoupper($row["transtype"]);
            }
            else{
                $transtipe = strtoupper($tipe);
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
                                <br><button type="button" class="btn btn-link btn-md" onclick="toSO(`' . $linkToSO . '`)"><i class="far fa-file-alt"></i>View Order</button>
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
                        <td>
                            <div class="text-center">
                                <img src="' . $tempdir . $tempName . '.png">
                            </div>
                        </td>
                        <td>
                            <div class="text-center so-area" id="' . $ctr . '" so="' . $row["noso"] . '">
                                <button type="button" class="btn btn-outline-dark btn-md inv-btn"><i class="fas fa-file-invoice"></i>View Invoice
                                    <div class="inv-count">&nbsp'. $displayInvoiceQty .'</div>
                                </button>
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

?>