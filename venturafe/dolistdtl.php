<?php
session_start();
include("inc/config.php"); //include koneksi database
include("inc/header.php");
include("phpqrcode/qrlib.php")
?>
<script src="https://kit.fontawesome.com/f0ec2f5d0b.js" crossorigin="anonymous"></script>
<head>

</head>
<body>
  <style>
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

	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}
?>
<?php
$nomer=$_GET['no'];
$so=$_GET['so'];

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
     $sql11 = "SELECT * FROM do where nodo='$nomer'";
        $query11 = mysqli_query($conn, $sql11);
        while($amku11 = mysqli_fetch_array($query11)){
           $tanggal=$amku11['tgl'];
           $tglkirim=$amku11['tglkirim'];

           $nodo=$amku11['nodo'];
         }
   ?>
            <div class="container mt-10">
                <div class="row">
                    <div class="border col-xl-2">
                        <div class="logo mt-0 mr-0 ml-0">
                          <a href="index.php">
                              <img src="assets/img/logo/kmlogo.png" height="75" width="185" alt="">
                          </a>
                          <p>Gedung Jagat, Lobby Utama
                          <br>Jl. Tomang Raya No 28-30
                          <br>Jakarta Barat 11430
                          <br>+62 31 5462428</p>

                        </div>
                    </div>
                    <div class="border col-xl-3">
                        <div class="logo mt-0">
                          <h4>Delivery Order (DO)</H4>
                          <p>No. DO   : <?php echo $nodo; ?>
                          <br>No. SO   : <?php echo $so; ?>
                          <br>DO Print Date  : <?php echo $tanggal; ?>
                          <br>Delivery Request  : <?php echo $tglkirim; ?>
                          <br>Driver: Bpk. Nyoto
                          <br>Vehicle : L-12345-YX
                        </p>
                        </div>
                    </div>
                    <div class="border col-xl-3">
                        <div class="logo mt-0">
                          <B><p>CUSTOMER :</B>
                          <BR><?php echo $nama12; ?>
                          <br>Address       : <?php echo $alamat12; ?>
                          <br>Sales         : <?php echo $nama13; ?>
                          <br>Telp/Fax      : <?php echo $telp12; ?> </p>
                        </div>
                        </div>
                        <div class="border col-xl-2">
                        <div class="logo  mt-0 ">
                          <p><b>Deliver to :</b>
                          <br><?php echo $alamat12; ?>
                          <br>CP  : Mr.Budi Raharjo
                          <br>Telp/Fax        : (081)1123456</p>
                        </div>
                      </div>

                        <?php
                            $sql12 = "SELECT * FROM do where nodo='$nomer'";
                               $query12 = mysqli_query($conn, $sql12);
                               while($amku12 = mysqli_fetch_array($query12)){
                                  $status2=$amku12['status1'];
                                }
                          ?>
                      <?php
                      if ($status2=="")
                      { ?>
                          <div class="col-xl-1">
                          <form action="update-do1.php" method="post">
                            <input type="hidden" name="nodo1" id="nodo1" value="<?php echo $nodo; ?>"><br>
                            <input type="hidden" name="nodso1" id="noso1" value="<?php echo $nomer; ?>">
                          <button type="submit" name="daftar" value="daftar" class="btn btn-primary btn-block">Click to RECEIVE</button>
                        </form>
                        </div>
                      <?php }
                        else {

                         ?>

                        <div class="col-xl-2">

                          <h3>RECEIVED</H3>
                            <h6>Date :<?php echo $tanggal; ?>
                            <H6>Received By:_________</h6>
                            <H6>Name       :_____________</h6>
                            <H6>HP         :_____________</h6>
                            <H6>Position   :_____________</h6>

                          <?php
                        } ?>
                        </div>
                    </div>


                </div>


<div class="container-fluid pt-35 mr-0">


<!-- end page-header -->
<table class="table-striped table-bordered" width="100%">
<thead>
  <tr align="center">
    <!-- <th width="1%">No</th> -->
      <th class="text-nowrap">No</th>
    <th class="text-nowrap">Stock Name</th>
    <th class="text-nowrap">Group</th>
    <th class="text-nowrap">Dimension</th>
    <th class="text-nowrap">Weight</th>
    <th class="text-nowrap">Qty</th>

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
  $jumtot=0;
      $sql = "SELECT * FROM dodtl where nodo='$nomer'";
         $query = mysqli_query($conn, $sql);
         while($amku = mysqli_fetch_array($query)){
           $kodestok=$amku["kode_stok"];
           $shading=$amku["shading"];
           $cartidku=$amku['no_cart'];
           $noku=$amku['no'];
           $no=$no+1;

               $sqldo = "SELECT * FROM jualdtl where no_cart='$cartidku' AND kode_stok='$kodestok'";
                  $querydo = mysqli_query($conn, $sqldo);
                  while($amkudo = mysqli_fetch_array($querydo)){
                     $jum1=$amkudo['jumlah'];
                   }


               $sql1 = "SELECT * FROM master_tipe where nama='$kodestok'";
                  $query1 = mysqli_query($conn, $sql1);
                  while($amku1 = mysqli_fetch_array($query1)){
                    $grup=$amku1['kodegrup'];
                  }
                  $sql2 = "SELECT * FROM master_stok where kodeitem_stok='$kodestok'";
                     $query2 = mysqli_query($conn, $sql2);
                     while($amku2 = mysqli_fetch_array($query2)){
                       $panjang=$amku2['panjang'];
                       $lebar=$amku2['lebar'];
                       $tebal=$amku2['tebal'];
                       $kg=$amku2['kgctn'];

                     }

    ?>

  <tr>

    <td><?=$no; ?></td>
    <td><?=$kodestok;?>-<?php echo $shading;?></td>
    <td><?=$grup; ?></td>
    <td><?=$panjang; ?>x<?=$lebar; ?>x<?=$tebal; ?></td>

    <td><?=$kg;?> kg</td>

    <td><?=$amku["jumlah"];?> Dos</td>

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
<tfooter>
  <tr align="center">

  <td></td><td></td><td></td><td></td><td>Total</td><td><?php echo $no; ?> Item</td>

  </tr>



</tfooter>




</table>
</div>
</div>
<hr>
<div class="container mt-10 ml-0 mr-0">
    <div class="row">
      <div class=" col-xl-4">
          <div class="logo pt-0">
            <b><p>Note & Instruction</b>
            <br>1. Price Already Include tax
            <br>2. No Return Policy

          </div>
      </div>
        <div class=" col-xl-2">
            <div class="logo ml-80 pt-40">

              <p>Created By<br></p>
              <img src="assets/img/bg/tt.png" width="100" height="50">
              <p><b><br>(Administration)</b></p>

            </div>
        </div>
        <div class="col-xl-2">
            <div class="logo pt-40 ml-80">

                <p>Approved By<br></p>
                <img src="assets/img/bg/tt.png" width="100" height="50">
                <p><b><br>(Director)</b></p>

            </div>
        </div>
        <div class="col-xl-2">
            <div class="logo pt-40 ml-80">

              <p>Marketing<br></p>
              <img src="assets/img/bg/tt.png" width="100" height="50">
                <p><br><b><?php echo $nama13; ?></b></p>

            </div>
        </div>
        <div class="col-xl-2">
            <div class="logo pt-40 ml-80">

              <p>Driver<br></p>
              <img src="assets/img/bg/tt.png" width="100" height="50">
                <p><br><b>Driver</b></p>

            </div>
        </div>


      </div>
    </div>

<?php
include("inc/footer.php");
?>
</body>
</php>
