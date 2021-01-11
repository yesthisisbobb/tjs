<?php
session_start();
include("inc/config.php"); //include koneksi database
include("inc/header.php");

?>
<script src="https://kit.fontawesome.com/f0ec2f5d0b.js" crossorigin="anonymous"></script>
<head>
<style>
.table,tr,td{
font-size: 18px;

}
</style>
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
$nomer=$_GET['no'];
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
     $sql11 = "SELECT * FROM jual where noso='$nomer'";
        $query11 = mysqli_query($conn, $sql11);
        while($amku11 = mysqli_fetch_array($query11)){
           $tanggal=$amku11['tgl'];
           $status11=$amku11['status_payment'];
         }
   ?>
            <div class="container pl-20 ml-30 mt-10">
                <div class="row">
                    <div class="border col-xl-3">
                        <div class="logo pt-2">
                            <a href="index.php">
                                <img class="mb-0 ml-0" src="img/gambar/smblogo.png" height="100" width="250" alt="">
                            </a>
                            <br>
                            <p style="font-size:16px;font-family:roboto;" class="ml-2">Baliwerti 119-121 Kav 10<br> Surabaya(60174), Jawa Timur
                            <br><i class="fas fa-phone"></i> (+6231)5324505<br>
                            <i class="far fa-envelope"></i> info@smartmarbleandbath.com<br>www.smartmarbleandbath.com<p>


                        </div>
                    </div>
                    <div class="border col-xl-3">
                        <div class="logo pt-2">
                          <h3>MASTER SO</h3><H6><b><?php echo $nomer; ?></b></H6><hr>
                          <?php
                          $nosor=str_replace("/","",$nomer);

                           ?>
                           <img src="<?php echo $nosor;?>.png" width="75" height="75">

                          <p style="font-size:16px;font-family:roboto;">SO.Date : </b><?php echo $tanggal; ?><BR>
                          <b>SO.Type : </b>Ready Stock<br>
                          <b>Sales : </b><?php echo $nama13; ?><br>
                          <b>Status :</b><b style="color:red;font-weight: 900;font-size:28px;padding-left:110px"><?php echo strtoupper($status11); ?></b>

                        </div>

                    </div>


                    <div class="border col-xl-3">
                        <div class="logo pt-2">
                          <h2>CUSTOMER</h2>
                          <h6><b><?php echo strtoupper($nama12); ?></b></h6><hr>
                          <b style="font-size:20px;font-family:roboto;">Mr.Budi Raharjo</b><p style="font-size:15px;font-family:roboto;">
                          <p style="font-size:20px;font-family:roboto;"><?php echo $alamat12; ?></p>

                          <p style="font-size:20px;font-family:roboto;">Telp/Fax      : <?php echo $telp12; ?> </p>

                        </div>
                        </div>
                        <div class="border col-xl-3 pt-2">
                        <div class="logo pt-0 mt-0 mb-2">
                          <h2>SHIP ADDRESS</h2><h6><b><?php echo strtoupper($nama12); ?></b></h6><hr>
                        <b style="font-size:20px;font-family:roboto;"> Mr.Budi Raharjo</b><p style="font-size:15px;font-family:roboto;">
                          <p style="font-size:20px;font-family:roboto;"><?php echo $alamat12; ?></p>

                          <p style="font-size:20px;font-family:roboto;">Telp/Fax        : (081)1123456</p>
                        </div>
                      </div>
                      <div class="col-xl-2">

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
      $sql = "SELECT * FROM jualdtl where noso='$nomer'";
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

           $sqltipe1 = "SELECT * FROM master_stok where kode_stok='$kodestok'";
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
                  $sql2 = "SELECT * FROM master_stok where kode_stok='$kodestok'";
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
    <td><img width="70" height="70" alt="" src="img/gambar/<?php echo $kodetipeku.".jpg"; ?>"></td>
    <td><?=$kodetipeku;?></td>


    <td><?=$grup; ?></td>
    <td><?=$namamerk; ?></td>
    <td><?=$panjang; ?>x<?=$lebar; ?>x<?=$tebal; ?></td>

    <td><?=rupiah($pl1);?></td>

    <td><?=$amku["jumlah"];?> <br></td>

    <td><?=rupiah($pl1*$sqm*$amku["jumlah"]);?></td>

        </td>
 <?php } ?>
  </tr>
</tbody>
<?php
    $sql1 = "SELECT * FROM jual where cart_id='$nomer'";
       $query1 = mysqli_query($conn, $sql1);
       while($amku1 = mysqli_fetch_array($query1)){
          $totalku=$amku1['total'];
          $disku=$amku1['dis'];
          $gtku=$amku1['grand_total'];
          $bayarku=$amku1['bayar'];
          $kembaliku=$amku1['kembali'];
        }
  ?>
<tfoot  >
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
  <!-- <tr align="center">
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
    </tr> -->
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
<br>

    <div class="row">
      <div class=" col-xl-8">
          <div class="logo pt-0 pl-20">
            <b><p style="font-size:18px;font-family:roboto;" class="mb-0"><u>TERM & CONDITION</u></b>
            <p style="font-size:18px;font-family:roboto;">1. Tax not included. FOT Surabaya (On Truck)
            <br>  2. Prices apply in accordance with the package offered & exclude installation costs
              <br>3. Payment__days before/after delivery is considered valid once recorded in the PTA account
              <br>4. Delivery schedule must be agreed and signed by both parties
              <br>5. Please read the warranty policy in the <u><a href="">warranty page</a></u>. Free supervision for ​​Surabaya/Jakarta
              <br>6. Offer is valid for ... days. Stock is determined by availability of the goods

              <br>7. The Price does not apply if the local exchange rate is above IDR 14,7500</p>

          </div>
      </div>
        <div class=" col-xl-2">
            <div class="logo pt-40 pr-100">

              <p style="text-align: right; font-size:18px;font-family:roboto;">Created By<br></p>
              <!-- <img src="assets/img/bg/tt.png" width="100" height="50"> -->
              <p style="text-align: right;font-size:18px;font-family:roboto;"><br><br><br><br>Marketing</p>

            </div>
        </div>
        <div class="col-xl-2">
            <div class="logo pt-40 pr-100">

                <p style="text-align: right;font-size:18px; padding-right: 30px; font-family:roboto;">Approved By<br></p>
                <!-- <img src="assets/img/bg/tt.png" width="100" height="50"> -->
                <p style="text-align: right;font-size:18px;font-family:roboto;padding-right:70px;"><br><br><br><br>Cashier</p>

            </div>
        </div>

<!-- <div class="row">
        <div class="col-xl-4">


                <p style="font-size:14px;font-family:roboto;" class="small"><b><U>TRANSFER TO:</u><b><BR>
              <b style="font-size:14px;font-family:roboto;">BCA</b> <BR>PT. PERWIRA  TAMARAYA  ABADI
                <p style="font-size:14px;font-family:roboto;">ACC No.468-343-4178 </p>

            </div>
              <div class="col-xl-4">
                 <p style="font-size:14px;font-family:roboto;" class="small"><b>MANDIRI</b> <BR>PT.  PERWIRA  TAMARAYA  ABADI
                <p style="font-size:14px;font-family:roboto;">ACC No.468-343-4178 </p>

            </div>
        </div>
      </div>
    </div> -->
<?php
include("inc/footer.php");
?>

</body>
</php>
