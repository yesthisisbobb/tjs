<?php
session_start();
include("db/config.php");

$sesi = session_id();
// $nama = $_SESSION["username"];
// $tipe = $_POST["tipe"];

use Xendit\Xendit;

require '../vendor/autoload.php';

Xendit::setApiKey('xnd_development_zVUuXXI9RydfnOuAmCRzxpwwqszIk78MD0PJ98Z0OOQKECNRz6n61d3x3Waglev');

$params = [
    'external_id' => 'demo_147580196270',
    'payer_email' => 'bobbyishak20@gmail.com',
    'description' => 'Trip to Bali',
    'amount' => 32000
];

// $createInvoice = \Xendit\Invoice::create($params);
// echo "=================CREATE INVOICE=================";
// var_dump($createInvoice);

// $id = $createInvoice['id'];

// $getInvoice = \Xendit\Invoice::retrieve($id);
// echo "=================GET INVOICE=================";
// var_dump($getInvoice);

// $expireInvoice = \Xendit\Invoice::expireInvoice($id);
// var_dump($expireInvoice);

// $getAllInvoice = \Xendit\Invoice::retrieveAll();
// echo "=================GET ALL INVOICE=================";
// var_dump(($getAllInvoice));

// Initialize
$gt = 0;
$noakhir1 = 0;
$sales = "";

$sqlsales = "SELECT * from login where email='$nama'";
$querysales = mysqli_query($conn, $sqlsales);
while ($rowsales = mysqli_fetch_array($querysales)) {
    $sales = $rowsales["sales"];
}

if($tipe == "normal"){
    $sqlcekid = "SELECT * from jual";
    $querycekid = mysqli_query($conn, $sqlcekid);
    $rowcekjum = mysqli_num_rows($querycekid);
    if ($rowcekjum == 0) {
        $noakhir1 = 1;
    } else {
        $sqlcekid1 = "SELECT cart_id from jual order by cart_id  DESC LIMIT 1";
        $querycekid1 = mysqli_query($conn, $sqlcekid1);
        while ($rowcekid1 = mysqli_fetch_array($querycekid1)) {
            $noakhir = $rowcekid1["cart_id"];
            $noakhir1 = $noakhir + 1;
        }
    }

    $sql2 = "SELECT * from cart where user_id='$nama'";
    $query2 = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_array($query2);
    $uid = $row['user_id'];
    $tgl = date("d/m/y");
    $d = date("d");
    $m = date("m");
    $y = date("y");
    $noso = "SO" . "/" . "SBYRTL" . "/" . $noakhir1 . "/" . $d . $m . $y;
    $sql1 = "INSERT INTO jual(tgl,cart_id,noso,sess_id,user_id,sales,status,status_payment)  VALUES (current_timestamp(),'$noakhir1','$noso','$sesi','$uid','$sales','OPEN','Unpaid')";
    $query1 = mysqli_query($conn, $sql1);

    $sql3 = "SELECT * from cartdtl where userid='$nama'";
    $query3 = mysqli_query($conn, $sql3);
    while ($row1 = mysqli_fetch_array($query3)) {
        // $uid=$row['user_id'];
        // $tgl=$row['tgl'];
        $kodestok = $row1['kode_stok'];
        $jumlah = $row1['jumlah'];
        $harga = $row1['harga'];

        $total = $jumlah * $harga;
        $gt = $gt + $total;
        $hargaakhir = intval($harga);

        $sql5 = "INSERT INTO jualdtl(no_cart,noso,sess_id,kode_stok,jumlah,harga,hargaakhir,total)  VALUES ('$noakhir1','$noso','$sesi','$kodestok', $jumlah, $harga, $hargaakhir, $total)";
        $query5 = mysqli_query($conn, $sql5);

        // $sql51 = "INSERT INTO ordertemp(no_cart,sess_id,kode_stok,shading,jumlah,harga,total)  VALUES ('$id','$sesi','$kodestok','$shading','$jumlah','$harga','$total')";
        // $query51 = mysqli_query($conn, $sql51);

        // $sql6 = "UPDATE jual set total='$gt',grand_total='$gt' where cart_id='$id'";
        // $query6 = mysqli_query($conn, $sql6);

    }

    $sql7 = "DELETE from cart where sess_id='$sesi' or user_id='$nama'";
    $query7 = mysqli_query($conn, $sql7);
    $sql8 = "DELETE from cartdtl where sess_id='$sesi' or userid='$nama'";
    $query8 = mysqli_query($conn, $sql8);
}
else if($tipe == "indent"){
    $sqlcekid = "SELECT * from ijual";
    $querycekid = mysqli_query($conn, $sqlcekid);
    $rowcekjum = mysqli_num_rows($querycekid);
    if ($rowcekjum == 0) {
        $noakhir1 = 1;
    } else {
        $sqlcekid1 = "SELECT cart_id from ijual order by cart_id  DESC LIMIT 1";
        $querycekid1 = mysqli_query($conn, $sqlcekid1);
        while ($rowcekid1 = mysqli_fetch_array($querycekid1)) {
            $noakhir = $rowcekid1["cart_id"];
            $noakhir1 = $noakhir + 1;
        }
    }


    $sql2 = "SELECT * from icart where user_id='$nama'";
    $query2 = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_array($query2);
    $uid = $row['user_id'];
    $tgl = date("d/m/y");
    $d = date("d");
    $m = date("m");
    $y = date("y");
    $noso = "SO" . "/" . "SBYRTL" . "/" . $noakhir1 . "/" . $d . $m . $y;

    // Buat ngecek isi. TODO dihapus atau dicomment abis debugging
    $arrTemp = array($tgl, $noakhir, $noso, $sesi, $uid, $sales);
    echo json_encode($arrTemp);

    $sql1 = "INSERT INTO ijual(tgl,cart_id,noso,sess_id,user_id,sales,status,status_payment)  VALUES (current_timestamp(),'$noakhir1','$noso','$sesi','$uid','$sales','OPEN','Unpaid')";
    $query1 = mysqli_query($conn, $sql1);

    $sql3 = "SELECT * from icartdtl where userid='$nama'";
    $query3 = mysqli_query($conn, $sql3);
    while ($row1 = mysqli_fetch_array($query3)) {
        // $uid=$row['user_id'];
        // $tgl=$row['tgl'];
        $kodestok = $row1['kode_stok'];
        $jumlah = $row1['jumlah'];
        $harga = $row1['harga'];

        $total = $jumlah * $harga;
        $gt = $gt + $total;
        $hargaakhir = intval($harga);

        $sql5 = "INSERT INTO ijualdtl(no_cart,noso,sess_id,kode_stok,jumlah,harga,total)  VALUES ('$noakhir1','$noso','$sesi','$kodestok', $jumlah, $harga, $total)";
        $query5 = mysqli_query($conn, $sql5);

        // $sql51 = "INSERT INTO ordertemp(no_cart,sess_id,kode_stok,shading,jumlah,harga,total)  VALUES ('$id','$sesi','$kodestok','$shading','$jumlah','$harga','$total')";
        // $query51 = mysqli_query($conn, $sql51);

        // $sql6 = "UPDATE jual set total='$gt',grand_total='$gt' where cart_id='$id'";
        // $query6 = mysqli_query($conn, $sql6);

    }

    $sql7 = "DELETE from icart where sess_id='$sesi' or user_id='$nama'";
    $query7 = mysqli_query($conn, $sql7);
    $sql8 = "DELETE from icartdtl where sess_id='$sesi' or userid='$nama'";
    $query8 = mysqli_query($conn, $sql8);
}

?>