<?php
session_start();
include("inc/config.php"); //include koneksi database
include("inc/header.php");
include("phpqrcode/qrlib.php");

?>
<script src="https://kit.fontawesome.com/f0ec2f5d0b.js" crossorigin="anonymous"></script>
<head>
<style>
.table,tr,td{
font-size: 18px;

}

        input.defaultCheckbox {
            width: 10px;
            height: 10px;
        }

</style>
</head>
<body>
  <style>
  tfoot {
    font-weight: bold;
    border-top-style: solid;
    font-size:12px;
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

     }
     $sql13 = "SELECT * FROM sales where id='$sales12'";
        $query13 = mysqli_query($conn, $sql13);
         while($amku13 = mysqli_fetch_array($query13)){
           $nama13=$amku13['nama'];

         }

  ?>
 <?php
     $sql11 = "SELECT * FROM inv where noinv='$nomer'";
        $query11 = mysqli_query($conn, $sql11);
        while($amku11 = mysqli_fetch_array($query11)){
           $tanggal=$amku11['tgl'];
           $status11=$amku11['status_payment'];
           $uid=$amku11['user_id'];
            $sales12=$amku11['sales'];
            $delku=$amku11['del'];
            $other=$amku11['other'];
            $vat=$amku11['vat'];
            $grand=$amku11['grand_total'];
            $bayar=$amku11['bayar'];
            if ($status11=="")
            {
              $statusku="UNPAID";
            }
            else {
              $statusku="PAID";
            }
         }
   ?>
   <?php
       $sql111 = "SELECT * FROM login where email='$sales12'";
          $query111 = mysqli_query($conn, $sql111);
          while($amku111 = mysqli_fetch_array($query111)){

             $namasales=$amku111['nama'];
             // $status11=$amku11['status_payment'];
           }

     ?>
     <?php
     $telp12 = "";
     $sql12 = "SELECT * FROM customer where username='$uid'";
        $query12 = mysqli_query($conn, $sql12);
         while($amku12 = mysqli_fetch_array($query12)){
           $nama12=$amku12['nama'];
           $alamat12=$amku12['alamat'];
           $telp12=$amku12['telp'];

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
                          <h3 style="font-weight:900;">INVOICE</h3><P style="font-size:12px;"><b><?php echo $nomer; ?></b></p><hr>
                            <?php
                            $nosor1=str_replace("/","",$nomer);

    												QRCode::png("http://smartmarbleandbath.com/invlistdtl3.php?no='$nomer'",$nosor1.".png","L",1,1);


                             ?>
                             <img src="<?php echo $nosor1;?>.png" width="75" height="75">
                             <br>
                          <b style="font-size:16px;font-family:roboto;">Invoice Date : </b><?php echo date("Y-m-d"); ?><br>
                            <b style="font-size:16px;font-family:roboto;"> Delivery Date : </b><?php echo $tanggal; ?><br>
                          <b>Sales : </b><?php echo $namasales; ?><br>
                          <?php
                          if ($statusku=="UNPAID")
                          {
                          ?>
                          <b>Status :</b><b style="color:red;font-weight: 900;font-size:28px;padding-left:110px"><?php echo strtoupper($statusku); ?></b>
                        <?php } elseif ($statusku=="PAID") {
                        ?>
                        <b>Status :</b><b style="color:blue;font-weight: 900;font-size:28px;padding-left:110px"><?php echo strtoupper($statusku); ?></b>
                      <?php } ?>

                        </div>

                    </div>


                    <div class="border col-xl-3">
                        <div class="logo pt-2">
                          <h3  style="font-weight:900;">CUSTOMER</h3>
                          <h6><b><?php echo strtoupper($nama12); ?></b></h6><hr>
                          <b style="font-size:20px;font-family:roboto;">Mr.Budi Raharjo</b><p style="font-size:15px;font-family:roboto;">
                          <p style="font-size:20px;font-family:roboto;"><?php echo $alamat12; ?></p>

                          <p style="font-size:20px;font-family:roboto;">Telp/Fax      : <?php echo $telp12; ?> </p>

                        </div>
                        </div>
                        <div class="border col-xl-3 pt-2">
                        <div class="logo pt-0 mt-0 mb-2">
                          <h3  style="font-weight:900;">SHIP ADDRESS</h3><h6><b><?php echo strtoupper($nama12); ?></b></h6><hr>
                        <b style="font-size:20px;font-family:roboto;"> Mr.Budi Raharjo</b><p style="font-size:15px;font-family:roboto;">
                          <p style="font-size:20px;font-family:roboto;"><?php echo $alamat12; ?></p>

                          <p style="font-size:20px;font-family:roboto;">Telp/Fax        : (081)1123456</p>
                          <?php
                              $sqldo = "SELECT * FROM do where noinv='$nomer'";
                                 $querydo = mysqli_query($conn, $sqldo);
                                 while($amkudo = mysqli_fetch_array($querydo)){

                                    $statusdo=$amkudo['status1'];
}
                                    ?>
                                    <b style="border-style: solid;color:green;font-weight: 900;font-size:14px;padding-left:5px; padding-right:5px;">
                                    <?php
                                    if ($statusdo=="1"){
                                      echo " Pickup on ".$tanggal."</b><br>";
                                      ?>
                                      <!-- <button class="btn btn-info btn-sm"> Print DO </button>
                                        <button class="btn btn-info btn-sm"> Email DO </button>
                                          <button class="btn btn-info btn-sm"> Whatsapp DO </button> -->
                                      <?php
                                    } else if ($statusdo=="2") {
                                      echo " Delivery on ".$tanggal;
                                    }
                                    ?>
                                  </b>

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
  <tr  style="font-weight: bold;background-color:lightcyan;" align="center" class="success">
    <!-- <th width="1%">No</th> -->
    <th class="text-nowrap">No</th>
    <th class="text-nowrap">Picture</th>
    <th class="text-nowrap">Name</th>
    <th class="text-nowrap">Group</th>
    <th class="text-nowrap">Brand</th>
    <th class="text-nowrap">Dimension (mm)</th>

    <th class="text-nowrap">Price (pcs)</th>

    <th class="text-nowrap">Qty (pcs)</th>

      <th class="text-nowrap">Total Purchase (IDR)</th>

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
      $sql = "SELECT * FROM invdtl where noinv='$nomer'";
         $query = mysqli_query($conn, $sql);
         while($amku = mysqli_fetch_array($query)){
           $kodetipe=$amku["kode_stok"];
           $shading=$amku["shading"];
           $cartidku=$amku['cart_id'];
           $noku=$amku['no'];
           $har=$amku['harga'];
           $jumlahku=$amku['jumlah'];
           $totalku=$har*$jumlahku;
           $totalg=$totalg+$totalku;
           $no=$no+1;

           $sqltipe1 = "SELECT * FROM master_stok where kodetipe='$kodetipe '";
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
           $sqltipe = "SELECT * FROM master_stok where kodetipe='$kodetipe'";
              $querytipe = mysqli_query($conn, $sqltipe);
              while($amkutipe = mysqli_fetch_array($querytipe)){
                $kodetipeku=$amkutipe['kodetipe'];
                $kodeitemstok=$amkut￼ipe['kodeitem_stok'];
           }
               // $sql1 = "SELECT * FROM master_tipe where kode='$kodetipeku'";
               //    $query1 = mysqli_query($conn, $sql1);
               //    while($amku1 = mysqli_fetch_array($query1)){
               //      $grup=$amku1['kodegrup'];
               //    }
                  $sql2 = "SELECT * FROM master_stok where kodetipe='$kodetipe'";
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

  <tr >
<?php

$tot=$sqm*$amku["jumlah"];
?>
    <td><?=$no; ?></td>
    <td><img width="70" height="70" alt="" src="img/gambar/<?php echo $kodetipeku.".jpg"; ?>"></td>
    <td><?=$kodetipeku;?></td>


    <td><?=$grup; ?></td>
    <td><?=$namamerk; ?></td>
    <td><?=$panjang; ?>x<?=$lebar; ?>x<?=$tebal; ?></td>

    <td><?=rupiah($har);?></td>

    <td><?=$jumlahku;?> <br></td>

    <td><?=rupiah($totalku);?></td>

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
<tfoot>
  <tr align="center"  >
<form action="invupdate.php" method="POST">
  <input type="hidden" id="noin" name="noin" value="<?php echo $nomer; ?>">
<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Total</td><td><?php echo rupiah($totalg); ?><input type="hidden" id="tot" name="tot" value="<?php echo($totalg); ?>"</td>

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
      <tr align="left">
        <?php
        if ($statusku=="UNPAID")
        {

        ?>
        <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Delivery type</td><td><select style="font-size: 18px;color:teal;font-weight:bold;text-align:center;" type="text" id="delby" name="delby">
        <option value="1"> Bring Your Own Item</option>
        <option value="2"> Deliver By Us</option></td></select>
</tr>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Delivery Fee</td><td><input style="font-size: 24px;color:teal;font-weight:bold;text-align:center;" type="number" id="del" name="del" onkeyup="del1()"></td>

       </tr>
       <tr align="left">
         <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Other Fee</td><td><input style="font-size: 24px;color:teal;font-weight:bold;text-align:center;" type="number" id="other" name="other" onkeyup="del1()"></td>
        </tr>

      <tr align="left">
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>VAT</td><td><input style="font-size: 24px;color:teal;font-weight:bold;text-align:center;" type="number" id="vat1" name="vat1" onfocus="vat1()" disabled></td>
       </tr>
       <tr align="left">
         <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>GRAND TOTAL</td><td><input style="font-size: 24px;color:teal;font-weight:bold;text-align:center;" type="number" id="grand" name="grand" disabled></td>
        </tr>
        <tr align="left">

      <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Payment</td><td><input style="font-size: 24px;color:teal;font-weight:bold;text-align:center;" type="text" id="paid" name="paid" onkeyup="kembalian()"></td>
      </tr>
      <tr align="left">
         <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Change</td><td><input style="font-size: 24px;color:teal;font-weight:bold;text-align:center;" type="number" id="change" name="change" ></td>
       </tr>
       <script>
      
       </script>
       <script>
       
       </script>
       <tr align="center">
          <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><button  type="submit" name="daftar" value="daftar"class="btn btn-info btn-sm btn-block">Pay Now</button></td>

        </tr>
    <?php  } else if ($statusku="PAID") {?>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Delivery Fee</td><td><?php echo rupiah($delku); ?></td>
        <tr align="left">
          <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Other Fee</td><td><?php echo rupiah($other); ?></td>
         </tr>

       <tr align="left">
         <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>VAT</td><td><?php echo rupiah($vat); ?></td>
        </tr>
        <tr align="left">
          <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>GRAND TOTAL</td><td><?php echo rupiah($grand); ?></td>
         </tr>
         <tr align="left">

       <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Payment</td><td><?php echo rupiah($bayar); ?></td>
       </tr>
       <tr align="left">
          <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Outstanding</td><td><?php echo rupiah($kembali); ?></td>
        </tr>
        <!-- <tr align="center">
           <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><button  type="submit" name="daftar" value="daftar"class="btn btn-info btn-sm btn-block"  onclick="window.print()">Print Invoice Now</button></td>
         </tr><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><button  type="submit" name="daftar" value="daftar"class="btn btn-info btn-sm btn-block">Email Invoice Now</button></td>
         </tr><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><button  type="submit" name="daftar" value="daftar"class="btn btn-info btn-sm btn-block">Sent Invoice By WA</button></td> -->

         <!-- <tr>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>ACTION</td></tr>
           <tr> -->


      <?php }?>



      </form>
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

              <br>7. The Price does not apply if the local exchange rate is above IDR 14,750</p>

          </div>
      </div>
        <div class=" col-xl-2">
            <div class="logo pt-0 pr-100">

              <p style="text-align: right; font-size:18px;font-family:roboto;">Created By<br></p>
              <!-- <img src="assets/img/bg/tt.png" width="100" height="50"> -->

              <p style="text-align: right;font-size:18px;font-family:roboto;"><br><?php echo $namasales; ?></p>

            </div><br>
  <div class="row border"  style="font-weight: bold;background-color:lightcyan;">
<span>Invoice </span>
  </div>

            <div class="row border">
              <form id="formSO">
              <div class="col-sm-4 pl-0">
                <label class="container">Print
            <input type="checkbox" name="printSO" id = "printSO"  class="defaultCheckbox" checked="checked">
            </label>
              </div>
              <div class="col-sm-4 pl-0" >
                <label class="container">Email
            <input type="checkbox" name="emailSO" id = "emailSO" class="defaultCheckbox" checked="checked">
            </label></div>
              <div class="col-sm-4 pl-0 ">
                <label class="contai￼ner">WA
            <input type="checkbox" name="waSO" id = "waSO" class="defaultCheckbox" checked="checked">
            </label>
            </div>

            
       </form>
            <div class="col-sm-1">

            </div>
            </div>
            <div class="row border mt-0">
              <button class="btn btn-info btn-block btn-sm" id="okInvoice">Ok</button>
              
            </div>
          </div>
        <div class="col-xl-2">
            <div class="logo pt-0 pr-100 ">
                <p style="text-align: right;font-size:18px; padding-right: 30px; font-family:roboto;">Approved By<br></p>
                <!-- <img src="assets/img/bg/tt.png" width="100" height="50"> -->
                <p style="text-align: right;font-size:18px;font-family:roboto;padding-right:70px;"><br>Cashier</p>

            </div>
            <br>
            <div class="row border" style="font-weight: bold;background-color:lightcyan;">
       Delivery Order
            </div>
                      <div class="row border">
                        <div class="col-sm-3 pl-0 ">
                          <label class="container">Print
                      <input type="checkbox"  class="defaultCheckbox" checked="checked">
                      </label>
                        </div>
                        <div class="col-sm-3 pl-0">
                          <label class="container">Email
                      <input type="checkbox"  class="defaultCheckbox" checked="checked">
                      </label></div>
                        <div class="col-sm-3 pl-0">
                          <label class="container">WA
                      <input type="checkbox"   class="defaultCheckbox" checked="checked">
                      </label>
                      </div>



                      </div>
                      <div class="row border">
                        <button class="btn btn-info btn-block btn-sm" >Ok</button>
                      </div>
        </div><hr>


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
<script type="text/javascript">
$(document).ready(function() {
let biaya = <?=$totalg?>;
c2=biaya*(10/100);
document.getElementById("vat1").value=c2;
e2=c2+parseInt(document.getElementById("tot").value);
document.getElementById("grand").value=e2;
$('#okInvoice').on('click',function(){
document.getElementById('okInvoice').disabled = true;
  $.ajax({
        type: 'POST',
        url: 'ajaxSendWa.php?telp=<?=$telp12?>&link=<?=$nomer?>&uid=<?=$uid?>',
        data:$('#formSO').serialize(),
        success: function(data) {
          alert(data);
          window.location.assign(data);
        }
      });
});

});
function del1()
       {
         let total = e2 + parseInt(document.getElementById("del").value) + parseInt(document.getElementById("other").value);
         document.getElementById("grand").value=total;
       }
     
       function kembalian()
       {
         a=parseInt(document.getElementById("paid").value);
         b=parseInt(document.getElementById("grand").value);
         c=a-b;
         document.getElementById("change").value=c;
       }



</script>
</php>
