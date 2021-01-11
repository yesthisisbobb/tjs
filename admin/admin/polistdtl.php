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
     $sql11 = "SELECT * FROM jual where cart_id='$nomer'";
        $query11 = mysqli_query($conn, $sql11);
        while($amku11 = mysqli_fetch_array($query11)){
           $tanggal=$amku11['tgl'];
           $status11=$amku11['status_payment'];
         }
   ?>
            <div class="container mt-10">
                <div class="row">
                    <div class="border col-xl-4">
                        <div class="logo pt-40">
                            <a href="index.php">
                                <img class="mb-10" src="assets/img/logo/smblogo.png" height="50" width="175" alt="">
                            </a>
                            <p>Jl. Pahlawan No.07
                            <br>Telp. 031-5477501
                            <br>Surabaya</p>

                        </div>
                    </div>
                    <div class="border col-xl-4">
                        <div class="logo pt-40">
                          <h4>INVOICE (<?php echo $status11; ?>)</h4>
                          <p>No. SO   : <?php echo $nomer; ?>
                          <br>Tgl SO  : <?php echo $tanggal; ?>
                          <br>No. FJ  : -
                          <br>Tgl.FJ  : - </p>
                        </div>
                    </div>


                    <div class="border col-xl-4">
                        <div class="logo pt-40">

                          <p>Customer Name  : <?php echo $nama12; ?>
                          <br>Address       : <?php echo $alamat12; ?>
                          <br>Sales         : <?php echo $nama13; ?>
                          <br>Telp/Fax      : <?php echo $telp12; ?> </p>
                        </div>
                        </div>
                    </div>


                </div>


<div class="container-fluid pt-35">


<!-- end page-header -->
<table class="table table-borderless">
<thead>
  <tr>
    <!-- <th width="1%">No</th> -->
      <th class="text-nowrap">No</th>
      <th class="text-nowrap">Picture</th>
    <th class="text-nowrap">Name</th>
    <th class="text-nowrap">Group</th>
    <th class="text-nowrap">Dimension</th>
    <th class="text-nowrap">Qty</th>
    <th class="text-nowrap">Price</th>
      <th class="text-nowrap">Total Purchase</th>

  </tr>
</thead>
<tbody>

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
      $sql = "SELECT * FROM jualdtl where no_cart='$nomer'";
         $query = mysqli_query($conn, $sql);
         while($amku = mysqli_fetch_array($query)){
           $kodestok=$amku["kode_stok"];
           $cartidku=$amku['cart_id'];
           $noku=$amku['no'];
           $no=$no+1;
               $sql1 = "SELECT * FROM master_tipe where kode='$kodestok'";
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
                       $gam=$amku2['gam1'];

                     }

    ?>

  <tr>

    <td><?=$no; ?></td>
    <td><img src="assets/img/produk/<?php echo $gam; ?>" width="75" height="75"></td>
    <td><?=$amku["kode_stok"];?></td>
    <td><?=$grup; ?></td>
    <td><?=$panjang; ?>x<?=$lebar; ?>x<?=$tebal; ?></td>
    <td><?=$amku["jumlah"];?> Dos</td>
    <td><?=rupiah($amku["harga"]);?></td>
    <td><?=rupiah($amku["total"]);?></td>

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
  <tr>

  <td></td><td></td><td></td><td></td><td></td><td></td><td>Total</td><td><?php echo rupiah($totalku); ?></td>

  </tr>

  <tr>
    <?php
    if (($disku=='0') or ($disku==''))
    {

    }else {
     ?>

    <td></td><td></td><td></td><td></td><td></td><td></td><td>Disc</td><td><?php echo rupiah($disku); ?></td>
  <?php } ?>
  </tr>
  <tr>
    <td></td><td></td><td></td><td></td><td></td><td></td><td>Grand Total</td><td><?php echo rupiah($gtku); ?></td>
  </tr>
  <tr>
      <td></td><td></td><td></td><td></td><td></td><td></td><td>Payment</td><td><?php echo rupiah($bayarku); ?></td>
    </tr>
    <tr>
      <?php
      if (($dkembaliku=='0') or ($kembaliku==''))
      {

      }else {
       ?>
      <td></td><td></td><td></td><td></td><td></td><td></td><td>Change</td><td><?php echo rupiah($kembaliku); ?></td>
    <?php } ?>
      </tr>


</tfooter>




</table>
</div>
</div>
<hr>
<div class="container mt-10">
    <div class="row">
        <div class="border col-xl-3">
            <div class="logo pt-40">

                <p>Known By
                <br><br><br>
                <br>(____________)</p>

            </div>
        </div>
        <div class="border col-xl-3">
            <div class="logo pt-40">

                <p>Created By
                <br><br><br>
                <br>(____________)</p>

            </div>
        </div>
        <div class="border col-xl-3">
            <div class="logo pt-40">

                <p>Marketing
                <br><br><br>
                <br>(____________)</p>

            </div>
        </div>
        <div class="border col-xl-3">
            <div class="logo pt-40">

                <p>TRANSFER   : BCA
                <br>ATAS NAMA : PT. PERWIRA TAMARAYA ABADI
                <br>ACC.NO    : 468-343-4178 </p>

            </div>
        </div>
      </div>
    </div>
<?php
include("inc/footer.php");
?>
</body>
</php>
