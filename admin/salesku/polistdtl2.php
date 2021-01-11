<?php
session_start();
include("../inc/config.php"); //include koneksi database
include("../inc/header.php");

?>
<script src="https://kit.fontawesome.com/f0ec2f5d0b.js" crossorigin="anonymous"></script>
<head>

</head>
<body>
  <style>
  tfoot {
    font-weight: bold;
    border-top-style: solid;
    font-size:14px;
    display: table-footer-group;
    vertical-align: middle;
    border-color: inherit;


  }
  .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 20%;
}
tr td{
  padding: 0 !important;
  margin: 0 !important;
}
</style>
<?php
  function rupiah($angka){

	$hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
	return $hasil_rupiah;

}
?>
<?php
$nomer=$_GET['noinv'];
 ?>
 <?php
 $un12=$_SESSION["username"];
 $sql12 = "SELECT * FROM customer where username='$un12'";
    $query12 = mysqli_query($conn, $sql12);
     while($amku12 = mysqli_fetch_array($query12)){
       $nama12=$amku12['nama'];
       $alamat12=$amku12['alamat'];
       $telp12=$amku12['telp'];
       $sales12=$amku12['sales'];
     }
     $sql13 = "SELECT * FROM sales where id='$sales12'";
        $query13 = mysqli_query($conn, $sql13);
         while($amku13 = mysqli_fetch_array($query13)){
           $nama13=$amku13['nama'];

         }

  ?>
 <?php
     $sql11 = "SELECT * FROM po where noinv='$nomer'";
        $query11 = mysqli_query($conn, $sql11);
        while($amku11 = mysqli_fetch_array($query11)){
           $tanggal=$amku11['tgl'];
           // $status11=$amku11['status_payment'];
         }
   ?>
            <div class="container pl-20 ml-30 mt-10">
                <div class="row">
                    <div class="border col-xl-4">
                        <div class="logo pt-2">
                            <a href="index.php">
                                <img class="mb-0 ml-0" src="img/gambar/smblogo.png" height="100" width="250" alt="">
                            </a>
                            <br>
                            <p class="ml-2">Baliwerti 119-121 Kav 10<br> Surabaya(60174), Jawa Timur
                            <br>Phone.(+6231)5324505<br>
                            Email. info@smartmarbleandbath.com<br>Website. www.smartmarbleandbath.com<p>


                        </div>
                    </div>
                    <div class="border col-xl-2">
                        <div class="logo pt-2">
                          <h3>Purchase Order</h3><b><?php echo $nomer; ?></b><hr>

                          <b>PO.Date : </b><?php echo $tanggal; ?><BR>
                          <b>Order Date : </b><?php echo $tanggal; ?><BR>
                          <b>Order by : </b><?php echo $nama13; ?><br>


                          <!-- <br>No. FJ  : -
                          <br>Tgl.FJ  : - </p> -->

                        </div>

                    </div>


                    <div class="border col-xl-3">
                        <div class="logo pt-2">
                          <h3>Supplier</h3>
                          <h6><b>Karya Modern</b></h6><hr>
                          <b>Ms. Liliana</b><br>
                          Baliwerti 119-121 Kav 10<br> Surabaya(60174), Jawa Timur
                          <br>Phone.(+6231)5324505<br>

                        </div>
                        </div>
                        <div class="border col-xl-3 pt-2">
                        <div class="logo pt-0 mt-0 mb-2">
                          <h3>SHIP ADDRESS</h3><h6><b>Smart Marble></b></h6><hr>
                          <p class="ml-2">Baliwerti 119-121 Kav 10<br> Surabaya(60174), Jawa Timur
                          <br>Phone.(+6231)5324505<br>
                          Email. info@smartmarbleandbath.com<br>Website. www.smartmarbleandbath.com<p>

                        </div>
                      </div>
                        <!-- <div class="col-xl-1 pt-5">
                          <?php
                            if($status11=="Paid")
                            {
                          ?><img src="assets/img/bg/paidnew.png" width="100" height="100">
                          <?php
                        }else {
                          ?>
                          <img src="assets/img/bg/unpaidnew.png" width="150" height="85">
                        <?php } ?>
                        </div> -->
                    </div>


                </div>


<div class="container-fluid pt-2 ml-0 mr-0">


<!-- end page-header -->
<table class="table table-bordered table-condensed" width="100%">
<thead>
  <tr align="center" class="success">
    <!-- <th width="1%">No</th> -->
    <th class="text-nowrap">No</th>
    <th class="text-nowrap">Picture</th>
    <th class="text-nowrap">Name</th>
    <th class="text-nowrap">Group</th>
    <th class="text-nowrap">Brand</th>
    <th class="text-nowrap">Dimension(mm)</th>

    <th class="text-nowrap">Price(pcs)</th>

    <th class="text-nowrap">Qty (pcs)</th>

      <th class="text-nowrap">Total Purchase (pcs)</th>

  </tr>
</thead>
<tbody align="center">

  <?php
  $un=$pengguna["username"];
  $sql1 = "SELECT * FROM login where username='$un'";
     $query1 = mysqli_query($conn, $sql1);
      while($amku1 = mysqli_fetch_array($query1)){
        $idsales=$amku1['id'];
      }


   ?>

  <?php
  $no=0;
  $totalg=0;
      $sql = "SELECT * FROM podtl where noinv='$nomer'";
         $query = mysqli_query($conn, $sql);
         while($amku = mysqli_fetch_array($query)){
           $kodestok=$amku["kode_stok"];
           $shading=$amku["shading"];
           $cartidku=$amku['cart_id'];
           $noku=$amku['no'];
           $har=$amku['harga'];
           $jumlahku=$amku['jumlah'];
           $totalku=$har*$jumlahku;
           $totalg=$totalg+$totalku;
           $no=$no+1;

           $sqltipe1 = "SELECT * FROM master_stok where kodetipe='$kodestok'";
              $querytipe1 = mysqli_query($conn, $sqltipe1);
              while($amkutipe1 = mysqli_fetch_array($querytipe1)){
                // $promoku=$amkutipe1['promo'];
                // $sqltipe11 = "SELECT * FROM promo where kode='$kodestok'";
                //    $querytipe11 = mysqli_query($conn, $sqltipe11);
                //    while($amkutipe11 = mysqli_fetch_array($querytipe11)){
                //      $nilai11=$amkutipe11['diskon'];
                // }
                $grup=$amkutipe1["grupname"];
                $merk=$amkutipe1["kodemerk"];
                $sqlm = "SELECT * FROM master_merk where kode='$merk'";
                   $querym = mysqli_query($conn, $sqlm);
                   while($amkum = mysqli_fetch_array($querym)){
                     $namamerk=$amkum['nama'];
                   }
           }


           $sqlpl = "SELECT * FROM master_price where kode='$kodestok'";
              $querypl = mysqli_query($conn, $sqlpl);
              while($amkupl = mysqli_fetch_array($querypl)){
              $pl1=$amkupl["pl"];
           }
           $sqltipe = "SELECT * FROM master_stok where kode_stok='$kodestok'";
              $querytipe = mysqli_query($conn, $sqltipe);
              while($amkutipe = mysqli_fetch_array($querytipe)){
                $kodetipeku=$amkutipe['kodetipe'];
                $kodeitemstok=$amkutipe['kodeitem_stok'];
           }
               // $sql1 = "SELECT * FROM master_tipe where kode='$kodetipeku'";
               //    $query1 = mysqli_query($conn, $sql1);
               //    while($amku1 = mysqli_fetch_array($query1)){
               //      $grup=$amku1['kodegrup'];
               //    }
                  $sql2 = "SELECT * FROM master_stok where kodetipe='$kodestok'";
                     $query2 = mysqli_query($conn, $sql2);
                     while($amku2 = mysqli_fetch_array($query2)){
                       $panjang=$amku2['panjang'];
                       $lebar=$amku2['lebar'];
                       $tebal=$amku2['tebal'];
                       $gam=$amku2['gam1'];
                       $pcsctn=$amku2['pcsctn'];
                       $sqm=$amku2['sqmctn'];
                       $pcsctn=$amku2['pcsctn'];

                     }

    ?>

  <tr>
<?php

$tot=$sqm*$amku["jumlah"];
?>
    <td><?=$no; ?></td>
    <td><img width="75" height="75" alt="" src="img/gambar/<?php echo $kodestok.".jpg"; ?>"></td>
    <td><?=$kodestok;?></td>


    <td><?=$grup; ?></td>
    <td><?=$namamerk; ?></td>
    <td><?=$panjang; ?>x<?=$lebar; ?>x<?=$tebal; ?></td>

    <td><?=rupiah($har);?></td>

    <td><?=$amku["jumlah"];?> <br></td>

    <td><?=rupiah($har*$amku["jumlah"]);?></td>

        </td>
 <?php } ?>
  </tr>
</tbody>
<?php
    $sql1 = "SELECT * FROM ijual where cart_id='$nomer'";
       $query1 = mysqli_query($conn, $sql1);
       while($amku1 = mysqli_fetch_array($query1)){
          $totalku=$amku1['total'];
          $disku=$amku1['dis'];
          $gtku=$amku1['grand_total'];
          $bayarku=$amku1['bayar'];
          $kembaliku=$amku1['kembali'];
        }
  ?>
<tfoot>
  <tr align="center">

<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Total</td><td><?php echo rupiah($totalg); ?></td>

  </tr>

  <tr align="center">
    <?php
    if (($disku=='0') or ($disku==''))
    {

    }else {
     ?>

  <td></td><td></td><td></td><td></td>  <td></td><td></td><td></td><td></td><td></td><td></td><td>Disc</td><td><?php echo rupiah($disku); ?></td>
  <?php } ?>
  </tr>
  <tr align="center">
    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Packing Cost</td><td><?php echo rupiah("0"); ?></td>
  </tr>
  <tr align="center">
<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Delivery Cost</td><td><?php echo rupiah("0"); ?></td>
  </tr>
  <tr align="center">
  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Grand Total</td><td><?php echo rupiah($gtku); ?></td>
  </tr>
  <tr align="center">
     <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Paid</td><td><?php echo rupiah($bayarku); ?></td>
    </tr>
    <!-- <tr>
      <?php
      if (($kembaliku=='0') or ($kembaliku==''))
      {

      }else {
       ?>
      <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Change</td><td><?php echo rupiah($kembaliku); ?></td>
    <?php } ?>
      </tr> -->


</tfoot>




</table>
</div>
</div>

<div class="container mt-10 ml-20 mr-10">
    <div class="row">
      <div class=" col-xl-6">
          <div class="logo pt-0">
            <b><p class="mb-0"><u>TERM & CONDITION</u></b>
            <p class="small">1. Tax not included. FOT Surabaya (On Truck)
            <br>  2. Prices apply in accordance with the package offered & exclude installation costs
              <br>3. Payment__days before/after delivery is considered valid once recorded in the PTA account
              <br>4. Delivery schedule must be agreed and signed by both parties
              <br>5. Please read the warranty policy in the <u><a href="">warranty page</a></u>. Free supervision for ​​Surabaya/Jakarta
              <br>6. Offer is valid for ... days. Stock is determined by availability of the goods

              <br>7. The Price does not apply if the local exchange rate is above IDR 14,7500</p>

          </div>
      </div>
        <div class=" col-xl-1.75">
            <div class="logo pt-40">

              <p>Created By<br></p>
              <img src="assets/img/bg/tt.png" width="100" height="50">
              <p><br>(Administration)</p>

            </div>
        </div>
        <div class="col-xl-1.75">
            <div class="logo pt-40 ml-40">

                <p>Approved By<br></p>
                <img src="assets/img/bg/tt.png" width="100" height="50">
                <p><br>(Director)</p>

            </div>
        </div>
        <div class="col-xl-1.75">
            <div class="logo pt-40 ml-40 mr-15">

              <p>Marketing<br></p>
              <img src="assets/img/bg/tt.png" width="100" height="50">
                <p><br><b><?php echo $nama13; ?></b></p>

            </div>
        </div>
<div class="row">
        <div class="col-xl-2.75">
            <div class="logo pt-0 ml-50 mr-0 pl-0">

                <p class="small"><b><U>TRANSFER TO:</u><b><BR>
              <b>BCA</b> <BR>PT. PERWIRA  TAMARAYA  ABADI
                <br>ACC No.468-343-4178 </p>
              </div>
            </div>
              <div class="col-xl-2.75 ml-50 mt-20">
                 <p class="small"><b>MANDIRI</b> <BR>PT.  PERWIRA  TAMARAYA  ABADI
                <br>ACC No.468-343-4178 </p>

            </div>
        </div>
      </div>
    </div>
<?php
include("inc/footer.php");
?>
</body>
</php>
