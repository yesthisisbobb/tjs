<?php
session_start();
include("db/config.php"); //include koneksi database
include("../venturafe1/phpqrcode/qrlib.php");
include("rupiah.php");
include("get-picture.php");

$user = $_SESSION["username"];
$noso = $_GET["no"];

$usercommand = "SELECT * FROM login WHERE email='$user'";
$userquery = mysqli_query($conn, $usercommand);
$userdata = mysqli_fetch_array($userquery);

$custcommand = "SELECT * FROM customer WHERE email='$user'";
$custquery = mysqli_query($conn, $custcommand);
$custdata = mysqli_fetch_array($custquery);

$salesid = $userdata["sales"];
$salescommand = "SELECT * FROM sales where id='$salesid'";
$salesquery = mysqli_query($conn, $salescommand);
$salesdata = mysqli_fetch_array($salesquery);

// Ready or Indent Detection
$tipe = "ready";
$socommand = "SELECT *, DATE_FORMAT(tgl, '%d %M %Y') as tanggal FROM jual WHERE noso='$noso'";
$soquery = mysqli_query($conn, $socommand);

# This bit is gonna slow the whole fuckin system down
$checkExistence = mysqli_num_rows($soquery);
if ($checkExistence < 1) {
  $tipe = "indent";
  $socommand = "SELECT *, DATE_FORMAT(tgl, '%d %M %Y') as tanggal FROM ijual WHERE noso='$noso'";
  $soquery = mysqli_query($conn, $socommand);
}

$sodata = mysqli_fetch_array($soquery);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sales Order</title>
  <?php include("./headerdkk/template-head.php"); ?>
</head>

<body id="so-body">
  <div id="so-directions-container">
    <div id="so-directions">This is your Invoice</div>
    <i id="so-close" class="fas fa-times"></i>
  </div>
  <div id="so-header-container">
    <div class="so-header-part-container" id="so-company">
      <div class="so-header-part">
        <img src="resource/smblogo.png" alt="Lambang Smart Marble & Bath">
        <span><b>PT Perwira Tamaraya Abadi</b></span>
        <span><b>Surabaya</b> (60174), Jawa Timur:</span>
        <span>Baliwerti 119-121 Kav 10</span>
        <span><i class="fas fa-phone" aria-hidden="true"></i>(+6231) 5324505</span>
        <span><b>Jakarta</b> (11530), Jakarta Barat:</span>
        <span>Tomang Raya No. 28-30</span>
        <span><i class="fas fa-phone" aria-hidden="true"></i>(+62) 811257180</span>
      </div>
    </div>
    <div class="so-header-part-container">
      <div class="so-header-part">
        <div class="so-inside-header">
          <h3>Sales Order</h3>
        </div>
        <div class="so-header-content">
          <span>No: <b><span id="so-no"><?php echo $noso; ?></span></b></span>
          <span>Date: <b><span id="so-date"><?php echo $sodata["tanggal"]; ?></span></b></span>
          <span>Type: <b><span id="so-type"><?php echo strtoupper($tipe); ?></span></b></span>
          <span>Sales: <b><span id="so-sales"><?php echo $sodata["sales"]; ?></span></b></span>
          <span>Status: <b><span id="so-status"><?php echo $sodata["status_payment"]; ?></span></b></span>
        </div>
      </div>
    </div>
    <div class="so-header-part-container">
      <div class="so-header-part">
        <div class="so-inside-header">
          <h3>Customer</h3>
        </div>
        <div class="so-header-content">
          <h4><span id="so-cust-name"><?php echo $custdata["nama"]; ?></span></h4>
          <h5><?php echo $custdata["alamat"]; ?></h5>
          <h5>Telp/Fax: <span id="so-cust-telp"><?php echo $custdata["telp"]; ?></span></h5>
        </div>
      </div>
    </div>
    <div class="so-header-part-container">
      <div class="so-header-part">
        <div class="so-inside-header">
          <h3>Deliver to</h3>
        </div>
        <div class="so-header-content">
          <h4><span id="so-cust-name">Agung</span></h4>
          <h5>Jl. Mawar No. 43</h5>
          <h5>Telp/Fax: <span id="so-cust-telp">082117339251</span></h5>
        </div>
      </div>
    </div>
    <div class="so-header-part-container">
      <div class="so-header-part">
        <?php
        $linkToSO = 'http://localhost/tjs/tjs/venturafe2/shipping-order.php?no=' . $_GET["no"];
        $qrdir = "qr/";
        $tempArr = explode("/", $_GET["no"]);
        foreach ($tempArr as $a) {
          $qrdir .= $a;
        }
        $qrdir .= '.png';
        if (!file_exists($qrdir)) {
          QRcode::png($linkToSO, $qrdir, QR_ECLEVEL_L, 3);
        }
        echo "<img src='$qrdir' width=280>";
        ?>
      </div>
    </div>
  </div>
  <div id="so-items-container">
    <table>
      <tr>
        <th>No.</th>
        <th>Picture</th>
        <th>Name</th>
        <th>Group</th>
        <th>Brand</th>
        <th>Dimension (L x W x H)</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Subtotal (pcs)</th>
      </tr>
      <?php
      $total = 0;
      $detailcommand = "SELECT j.no as no, j.kode_stok as kode, j.harga as harga, m.panjang as p, m.lebar as l, m.tinggi as t, j.jumlah as qty, m.sellunit as unit, j.total as tot, m.kodetipe as nama, m.grupname as grup, mm.nama as merk FROM jualdtl j, master_stok m, master_merk mm WHERE noso='$noso' AND j.kode_stok = m.kode_stok AND m.kodemerk = mm.kode";
      if ($tipe !== "ready") {
        $detailcommand = "SELECT j.no as no, j.kode_stok as kode, j.harga as harga, m.panjang as p, m.lebar as l, m.tinggi as t, j.jumlah as qty, m.sellunit as unit, j.total as tot, m.kodetipe as nama, m.grupname as grup, mm.nama as merk FROM ijualdtl j, master_stok m, master_merk mm WHERE noso='$noso' AND j.kode_stok = m.kode_stok AND m.kodemerk = mm.kode";
      }
      $detailquery = mysqli_query($conn, $detailcommand);
      $ctr = 1;
      while ($row = mysqli_fetch_array($detailquery)) {
        $file = getProductPicture($row["nama"]);

        $total += intval($row["tot"]);
        echo  "<tr>
                <td>" . $ctr . "</td>
                <td><img class='so-product-image' src='" . $file . "'></td>
                <td>" . $row['nama'] . "</td>
                <td>" . $row['grup'] . "</td>
                <td>" . $row['merk'] . "</td>
                <td>" . $row['p'] . " x " . $row['l'] . " x " . $row['t'] . "</td>
                <td>" . rupiah($row['harga']) . "</td>
                <td>" . $row['qty'] . " " . $row['unit'] . "</td>
                <td>" . rupiah($row['tot']) . "</td>
              </tr>";
        $ctr++;
      }
      ?>
      <tr>
        <td bgcolor="#cccccc" colspan="7"></td>
        <td>Total</td>
        <td><?php echo rupiah($total); ?></td>
      </tr>
    </table>
    <div id="so-info">
      <span><i class="far fa-envelope" aria-hidden="true"></i>info@smartmarbleandbath.com</span>
      <span><i class="fas fa-globe" aria-hidden="true"></i>www.smartmarbleandbath.com</span>
    </div>
  </div>
  <div id="so-footer-container">
    <div id="so-tc-container">
      <div id="so-tc">
        <h4>TERMS & CONDITIONS</h4>
        <ol>
          <li>Tax not included. FOT Surabaya (On Truck)</li>
          <li>Prices apply in accordance with the package offered & exclude installation costs</li>
          <li>Payment __ days before/after delivery is considered valid once recorded in the PTA account</li>
          <li>Delivery schedule must be agreed and signed by both parties</li>
          <li>Please read the warranty policy in the warranty page. Free supervision for ​​Surabaya/Jakarta</li>
          <li>Offer is valid for ... days. Stock is determined by availability of the goods</li>
          <li>The Price does not apply if the local exchange rate is above IDR 14,750</li>
        </ol>
      </div>
    </div>
    <div id="so-right">
      <div class="so-tt">
        <div class="so-tt-header">Created By</div>
        <div class="so-tt-signature"></div>
        <div class="so-tt-title">Marketing</div>
      </div>
      <div class="so-tt">
        <div class="so-tt-header">Approved By</div>
        <div class="so-tt-signature"></div>
        <div class="so-tt-title">Cashier</div>
      </div>
    </div>
  </div>
  <div id="so-button-container">
    <button type="button" class="btn btn-primary btn-bg" onclick="window.location='transaction.php?type=all'">Back</button>
    <button type="button" class="btn btn-outline-primary btn-bg" onclick="window.print()">Print</button>
  </div>
</body>

</html>
<script>
  // Ambil Size Window
  var browserWidth = 0,
    browserHeight = 0;
  if (typeof(window.innerWidth) == 'number') {
    //Non-IE
    browserWidth = window.innerWidth;
    browserHeight = window.innerHeight;
  } else if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
    //IE 6+ in 'standards compliant mode'
    browserWidth = document.documentElement.clientWidth;
    browserHeight = document.documentElement.clientHeight;
  } else if (document.body && (document.body.clientWidth || document.body.clientHeight)) {
    //IE 4 compatible
    browserWidth = document.body.clientWidth;
    browserHeight = document.body.clientHeight;
  }

  function calculatePercent(comp, percentage) {
    if (percentage > 0 && percentage <= 100) {
      return comp * percentage / 100;
    } else {
      // Lek percent nggak di range 1 - 100
      return -1;
    }
  }
  // $("#so-header-container").css({
  //   "height": calculatePercent(browserHeight, 38)
  // });
  // $("#so-footer-container").css({
  //   "height": calculatePercent(browserHeight, 40)
  // });
  $("#so-close").click(function() {
    $("#so-directions-container").css("display", "none");
  });
</script>