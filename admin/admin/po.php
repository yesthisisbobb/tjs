
<?php
  session_start();
  include("../../config.php");
  include("../../proses.php");
  if(!isset($_SESSION["username"])){
      echo'<script>
                alert("Mohon login dahulu !");
                window.location="../index.php";
             </script>';
      return false;
  }
  if($_SESSION["level"] != "admin"){
        echo'<script>
                alert("Maaf Anda Tidak Berhak Ke Halaman ini !");
                window.location="../'.$_SESSION["level"].'/";
             </script>';
        return false;
  }
?>
<?php
  include("../../header.php");
?>
<?php
  function rupiah($angka){

	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}
?>
<style>
body {
  background-color: white;
}
</style>
<!DOCTYPE html>
<body>
<!-- begin #page-loader -->

    <!-- end #page-loader -->
    <!-- begin #page-container -->
    <br>
<div class="container">


        <!-- <ol class="breadcrumb pull-right">
          <li class="breadcrumb-item"><a href="so_in.php">Home</a></li>
          <li class="breadcrumb-item active">PO</li>

        </ol> -->
<br>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <?php
        $nomer=$_GET['nopo'];
         ?>

</div>
<br>

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
           <div class="container mt-0">
               <div class="row">
                   <div class="border col-xl-3">
                       <div class="logo pt-2">
                           <a href="index.php">
                               <img class="mb-0 ml-0" src="../../venturafe/assets/img/logo/smblogo.png" height="75" width="225" alt="">
                           </a>
                           <p>Gedung Jagat, Lobby Utama
                           <br>Jl. Tomang Raya No 28-30, Jakarta Barat 11430
                           <br>+62 31 5462428</p>

                       </div>
                   </div>
                   <div class="border col-xl-3">
                       <div class="logo pt-2">
                         <h4>PURCHASE ORDER <br></h4>
                         <p>PO Date : <?php echo date("d-M-Y") ?>
                         <br>PO.No : <?php echo $nomer; ?>/po/smb/IX/2019
                         <!-- <br>No. FJ  : -
                         <br>Tgl.FJ  : - </p> -->

                       </div>

                   </div>


                   <div class="border col-xl-3">
                       <div class="logo pt-2">
                         <B><p>SUPPLIER :</B>
                         <BR>PT. KARYA MODERN KERAMIK
                         <br>Jln Baliwerti 119-121 Kav 10
                         <br>Surabaya, Jawa timur 60274
                       </div>
                       </div>
                       <div class="border col-xl-3 pt-2">
                       <div class="logo pt-0 mt-0 mb-2">
                         <p><b>SHIP TO</b>
                         <br>SMART MARBLE AND BATH
                         <br>PT. PERWIRA TAMARAYA ABADI
                         <br>Gedung Jagat, Jalan Tomang Rya 28, Main Lobby Unit A
                         <br>CP: Bpk Anton.
                         <br>HP: (6281)12345678
                       </div>
                     </div>

                   </div>


               </div>

	    <!-- end page-header -->
      <div class="container mt-0">
      <table class="table table-striped">
        <thead>
          <tr align="center">
            <!-- <th width="1%">No</th> -->
              <th class="text-nowrap">No</th>
            <th class="text-nowrap">Name</th>
              <th class="text-nowrap">Group</th>
              <th class="text-nowrap">Dimension(mm)</th>


            <th class="text-nowrap">Pcs/box</th>
            <th class="text-nowrap">SQM</th>

            <th class="text-nowrap">Price/m2</th>
            <th class="text-nowrap">Price/box</th>

            <th class="text-nowrap">Qty</th>
              <th class="text-nowrap">Total</th>

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
          $gt=0;
              $sql = "SELECT * FROM podtl where nopo='$nomer'";
                 $query = mysqli_query($conn, $sql);
                 while($amku = mysqli_fetch_array($query)){
                   $kodes=$amku['kode'];
                   $cartidku=$amku['cart_id'];
                   $noku=$amku['no'];
                   $no=$no+1;

                   $gt=$gt+$total;
                   $sqlnama = "SELECT * FROM master_stok where kode_stok='$kodes'";
                      $querynama = mysqli_query($conn, $sqlnama);
                      while($amkunama = mysqli_fetch_array($querynama)){
                        $kodestok1=$amkunama['kodeitem_stok'];
                        $pcsctn=$amkunama['pcsctn'];
                        $p=$amkunama['panjang'];
                        $l=$amkunama['lebar'];
                        $t=$amkunama['tebal'];
                      }
                      $sqls = "SELECT * FROM master_hpp where tjscode='$kodes'";
                         $querys= mysqli_query($conn, $sqls);
                         while($amkus = mysqli_fetch_array($querys)){
                           $sqmctn=$amkus['sqmctn'];
                           $pg=$amkus['pg'];
                         }
                         $tot1=$amku['harga']*$sqmctn*$pcsctn;
                         $total=$amku['jumlah'] * $tot1;
            ?>

          <tr class="odd gradeX">

            <td align="center"><?=$no; ?></td>
            <td align="center"><?=$kodestok1;?></td>
            <td align="center"><?=$pg;?></td>
            <td align="center"><?php echo $p."x".$l."x".$t; ?></td>

            <td align="center"><?=$pcsctn; ?> Pcs</td>
            <td align="center"><?=$sqmctn; ?> m2</td>
            <td align="center"><?=rupiah($amku["harga"]);?></td>
            <td align="center"><?=rupiah($tot1);?></td>

            <td align="center"><?=$amku["jumlah"]; ?> Dos</td>



            <td align="center"><?=rupiah($total);?></td>

                </td>
         <?php } ?>
          </tr>
        </tbody>

        <tfooter>
        	<tr>

        					<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Sub Total</td><td><?php echo rupiah($gt); ?></td>

        	</tr>
          <tr>
		<td></td><td></td><td></td><td></td><td></td>
        		<td></td><td></td><td></td><td>Discount</td><td><?php echo rupiah("0"); ?></td>

        	</tr>
          <tr>
<td></td><td></td><td></td><td></td>	<td></td>
        		<td></td><td></td><td></td><td>Tax</td><td><?php echo rupiah("0"); ?></td>

        	</tr>


          <tr>
<td></td><td></td><td></td><td></td>	<td></td>
            <td></td><td></td><td></td><td><b>Grand Total</td><td><?php echo rupiah($gt); ?></b></td>

          </tr>



        </tfooter>




      </table>
    </div>
      <br>
      <div class="container mt-0">
          <div class="row">
            <div class=" col-xl-9">
                <div class="logo pt-0">
                  <b><p>TERM & CONDITION</b>
                  <br>1. Price Already Include tax
                  <br>2. No Return Policy

                </div>
            </div>
              <div class=" col-xl-1.75">
                  <div class="logo pt-60">

                    <p>Created By<br></p>
                     <img src="../../venturafe/assets/img/bg/tt.png" width="100" height="50">
                    <p><br>(Administration)</p>

                  </div>
              </div>
              <div class="col-xl-1.75">
                  <div class="logo pt-60 ml-70">

                      <p>Approved By<br></p>
                      <img src="../../venturafe/assets/img/bg/tt.png" width="100" height="50">
                      <p><br>(Director)</p>

                  </div>
              </div>

</div>

<?php
  include("../../footer.php");
?>
</div>
	</body>
    </html>
