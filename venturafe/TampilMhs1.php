
<?php
session_start();
include("inc/config.php"); //include koneksi database
include("inc/header.php");
$kode=$_GET['q'];//required quantiy
$kode1=$_GET['y'];

$as=0;
?>


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


 <div class="cart-plus-minus">

     <span class="badge-pill badge-info"><?php echo $kd1."(".$jumlah1."dos)"; ?>
    <input class="cart-plus-minus-box" type="text" name="qtys2[]" id="qtys2[]" value="<?php echo $sisa[$as]; ?>">
 </span>
</div>
<input type="hidden" name="kd1" id="kd1" value="<?php echo $kd1; ?>">
<input type="hidden" name="gd1" id="gd1" value="<?php echo $gd1; ?>">
<?php
// $kode=$kode-$sisa[$as];
}
?><BR>
<?php
$sql38 = "SELECT * FROM master_shading where kode_stok='$kode1' and katgd='RETAIL' order by jum DESC ";
     $query38 = mysqli_query($conn, $sql38);
     while($amku38 = mysqli_fetch_array($query38)){
       $kd1=$amku38['kd_shading'];
       $gd2=$amku38['gudang'];
       $as=$as+1;
       //$jum11=$amku38['awal'];
       $jumlah2=$amku38['jum'];//jumlah stok yang ada
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
 <div class="cart-plus-minus">

     <span class="badge-pill badge-danger"><font size="1"><?php echo $kd1."(".$jumlah2."dos)"; ?>
    <input class="cart-plus-minus-box" type="text" name="qtys2[]" id="qtys2[]" value="<?php echo $sisa[$as]; ?>">
 </span>
</div>
<input type="hidden" name="kd1" id="kd1" value="<?php echo $kd1; ?>">
<input type="hidden" name="gd1" id="gd1" value="<?php echo $gd2; ?>">
<?php
// $kode=$kode-$sisa[$as];
}
?>
<br>
  <div class="cart-plus-minus">
    <span class="badge-pill badge-warning">Indent </span><input class="cart-plus-minus-box" type="text" name="qtysi" id="qtysi" value="<?php echo $kode; ?>">
  </div>

  <table>
    <tr>
      <td>
          Distribution
      </td>
    </tr>
  </table>
