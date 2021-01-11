
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
<html lang="en">

<?php

  $idku=$_GET["id"];
  $norev=$_GET["rev"];
 ?>

<?php
function rupiah($angka){

$hasil_rupiah = "" . number_format($angka,2,',','.');
return $hasil_rupiah;

}
 ?>
 Add Services
 <div class="col-lg-12 col-12 mx-auto"  style="overflow-x:auto;">
<table id="zero-config" class="table table-striped" style="width:100%">
    <tr>

      <th>Service Name</th>
      <th>Qty</th>
      <th>Price</th>
      <th>Total</th>
      <th>Action</th>
    </tr>
    <tr>
      <td>
        <select>
          <option>
            Service Name
          </option>
          <option>
            Packing
          </option>
          <option>
            Cutting
          </option>
          <option>
            Service Name
          </option>
        </select>
      </td>

      <td><input type="text" id="qty" name="qty"></td>
      <td>Price</td>
      <td>Total</td>
      <td><a href="revquote.php?id=<?php echo $amku["cart_id"];?>" class="btn-primary btn-rounded btn-sm" role="button">Add New</a></td>
    </tr>

<form action="proses-data-total.php" method="post">
<!-- <tr bgcolor="silver">
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Total Material Before TAX</td>
  <td><?php echo rupiah($a); ?><input type="hidden" id="totmat" name="totmat" value="<?php echo $a; ?>"></td>
</tr>
<tr bgcolor="silver">
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Tax(10%)</td>
  <td><?php echo rupiah($gt); ?><input type="hidden" id="netmat" name="netmat" value="<?php echo $gt; ?>"></td>
</tr>
<tr bgcolor="silver">
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Total Material After TAX</td>
  <td><?php echo rupiah($gtt); ?><input type="hidden" id="totkirim" name="totkirim" value="<?php echo $gtt; ?>"></td>
</tr>

<tr bgcolor="silver">
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Delivery Fee Before Taxt</td>
  <td><input type="text" id="kirim" name="kirim" value="<?php echo $kirim; ?>"> <input type="checkbox" id="pil" name="pil"> Zero Tax </td>
</tr>

<tr bgcolor="silver">
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Delivery Tax</td>
  <td><input type="text" id="taxdel" name="taxdel" value="<?php echo $taxkirim; ?>" onfocus="hitungtax()"> </td>

</tr>
<tr bgcolor="silver">
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Total Delivery After Tax</td>
  <td><input type="text" id="totaldel" name="totaldel" value="<?php echo $netkirim; ?>"> </td>

</tr>
<tr bgcolor="silver">
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Other Fee Before Tax</td>
  <td> <input type="text" id="other" name="other" value="<?php echo $other; ?>"> <input type="checkbox" id="pil1" name="pil1"> Zero Tax</td>
</tr>
<tr bgcolor="silver">
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Other Tax</td>
  <td><input type="text" id="taxotherdel" name="taxotherdel" value="<?php echo $taxother; ?>" onfocus="hitungtax1()"> </td>

</tr>
<tr bgcolor="silver">
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Total Other After Tax</td>
  <td><input type="text" id="totalotherdel" value="<?php echo $netother; ?>" name="totalotherdel"> </td>

</tr>
<tr bgcolor="silver">
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Grand Total</td>
  <td><input type="text" id="gtku" name="gtku" value="<?php echo $gtot; ?>" onfocus="hitunggt()">
  <button type="submit" name="daftar12" id="daftar12" value="daftar12" class="btn btn-primary btn-rounded btn-sm">Submit</button></td> -->

</tr>
</form>
</table>
</div>
