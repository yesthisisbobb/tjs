

<?php
session_start();
include("inc/config.php"); //include koneksi database
include("inc/header.php");
$kode=$_GET['q'];//required quantiy
$kode1=$_GET['y'];

$kode3=$kode;
$as=0;
?>

  <div class="pro-details-quality">
      <img src="assets/img/fav/legen.png">
<table class="table table-bordered table-striped table-hover" border="1"  width="75%">
  <tr align="center">
    <th>
      <span>SHADE</span>
    </th>
    <th>
      <span>QUANTITY</span>
    </th>
    <th>
      <span>CHANGE</span>
    </th>
  </tr>
  <form action="proses-cart.php" method="post">
  <button type="submit" name="daftar" value="daftar1" class="btn btn-info">Add to Cart</button>  
<?php

$nama=$_SESSION["username"];

$sql = "SELECT * FROM login where username='$nama'";
     $query = mysqli_query($conn, $sql);
     while($amku = mysqli_fetch_array($query)){
       $divisi=$amku['divisi'];
}

$sql38 = "SELECT * FROM master_shading where kode_stok='$kode1' and katgd='$divisi' order by jum DESC ";
     $query38 = mysqli_query($conn, $sql38);
     while($amku38 = mysqli_fetch_array($query38)){
       $kd1=$amku38['kd_shading'];
       $gd1=$amku38['gudang'];
       $as=$as+1;
       //$jum11=$amku38['awal'];
       $jumlah1=$amku38['jum'];//jumlah stok yang ada
       $jumlahku=$jumlahku+$jumlah1;
       if ($kode >= $jumlah1)
       {
         $sisa[$as]=$jumlah1;
         $kode=$kode-$jumlah1;
       }
       else  if ($kode < $jumlah1)
       {
         $sisa[$as]=$kode;
         $kode=$kode-$sisa[$as];
       }


 ?>

 <tr>
   <td bgcolor="#45B39D" align="center"><h3><?php echo $kd1; ?></h3></td>
   <td align="center"><h3><?php echo $sisa[$as]; ?></h3><input type="text" name="qtys2[]" id="qtys2[]" value="<?php echo $sisa[$as]; ?>"></td>
   <td><input type="range" min="1" max="10000"  value="<?php echo $sisa[$as]?>"id="myRange"></td>
 </tr>
<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>

<input type="hidden" name="kd1" id="kd1" value="<?php echo $kd1; ?>">
<input type="hidden" name="gd1" id="gd1" value="<?php echo $gd1; ?>">
<?php
// $kode=$kode-$sisa[$as];
}
?>

<?php
$sql38 = "SELECT * FROM master_shading where kode_stok='$kode1' and katgd='RETAIL' order by jum DESC ";
     $query38 = mysqli_query($conn, $sql38);
     while($amku38 = mysqli_fetch_array($query38)){
       $kd1=$amku38['kd_shading'];
       $gd2=$amku38['gudang'];
       $as=$as+1;
       //$jum11=$amku38['awal'];
       $jumlah2=$amku38['jum'];//jumlah stok yang ada
       $jumlahku=$jumlahku+$jumlah2;
       $kodesh=$amku38['kd_shading'];
       if ($kode >= $jumlah2)
       {
         $sisa[$as]=$jumlah2;
         $kode=$kode-$jumlah2;
       }
       else  if ($kode < $jumlah2)
       {
         $sisa[$as]=$kode;
         $kode=$kode-$sisa[$as];
       }
 ?>

   <td bgcolor="orange" align="center"><h3><?php echo $kd1; ?></h3></td>


   <td align="center"><h3><?php echo $sisa[$as]; ?></h3><input type="text" name="qtys2[]" id="qtys2[]" value="<?php echo $sisa[$as]; ?>"></td>

   <td><input type="range" min="1" max="100" value="50"></td>
 </tr>

<input type="hidden" name="kd1" id="kd1" value="<?php echo $kd1; ?>">
<input type="hidden" name="gd1" id="gd1" value="<?php echo $gd2; ?>">
<?php
// $kode=$kode-$sisa[$as];
}
?>
<br>
<tr>
  <td bgcolor="red"><h3>Indent</h3></td>

  <td align="center"><h3><?php echo $kode; ?></h3><input type="hidden" name="qtysi" id="qtysi" value="<?php echo $kode; ?>"></h2></td>
  <td><input type="range" min="1" max="100" value="50"></td>
</tr>
<tr>
  <td  style="vertical-align:center" colspan="2" align="center"><h3>TOTAL</h3></td>

  <td  style="vertical-align:center" align="center"><h3><?php echo $kode3; ?>/<?php echo $jumlahku; ?></h2></td>

</tr>
</table>

</div>
