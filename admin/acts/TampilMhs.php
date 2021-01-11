<html>

<body>
  <?php
    function rupiah($angka){

  	$hasil_rupiah = number_format($angka,0,',','.');
  	return $hasil_rupiah;

  }
  ?>
  <?php
include '../../config.php';
   ?>
  <?php
  $kode1=$_GET['q'];

  $sqlc="SELECT * FROM tbl_cust_acts where UCode_Cust='$kode1'";
  $resultc= mysqli_query($conn,$sqlc);
  while($rowc = mysqli_fetch_array($resultc)) {
      $kodecust=$rowc['Nama_Cust'];
}
  echo $kodecust;
  ?>

<table id="zero-config1" class="table table-hover" style="width:100%">

  <tr>
    <th>
      FJ
    </th>
    <!-- <th>
      Stock Code Internal
    </th> -->
    <th>
      Stock Code
    </th>
    <th>Stock Name
    </th>
    <th>Qty
    </th>
    <th>Unit Price
    </th>
    <th>Dis(%)
    </th>
    <th>Total
    </th>
<?php

$kode=$_GET['q'];
$sql="SELECT * FROM tbl_fj_acts where UCode_Cust='$kode'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    $nofj=$row['UCode_FJ'];

    $sql1="SELECT * FROM tbl_dtl_fj_acts where UCode_FJ='$nofj'";
    $result1 = mysqli_query($conn,$sql1);
    while($row1 = mysqli_fetch_array($result1)) {
      $kodebrg=$row1['UCode_Brg'];
      $qty=$row1['Qty'];
      $harga=$row1['Hrg_Unit_MU'];
      $dis=$row1['Disc_Psn'];
      $total=$row1['Sub_Tot_Rp'];
      $total1=$total1+$total;
      }
      $sql2="SELECT * FROM tbl_barang_acts where UCode_Brg='$kodebrg'";
      $result2 = mysqli_query($conn,$sql2);
      while($row2 = mysqli_fetch_array($result2)) {
        $kodebrg=$row2['UCode_Brg'];
        $kodebrg1=$row2['Kode_Brg'];
        $nbarang=$row2['Nama_Brg'];
        }
        ?>
        <tr>
        <td>
          <?php echo $nofj;?>
        </td>

        <td>
          <?php echo $kodebrg1;?>
        </td>
        <td>
          <?php echo $nbarang;?>
        </td>
        <td>
          <?php echo $qty;?>
        </td>
        <td>
          <?php echo rupiah($harga);?>
        </td>
        <td>
          <?php echo $dis;?>
        </td>
        <td>
          <?php echo rupiah($total);?>
        </td>
      </tr>
      <?php
}

?>
<tr><td></td><td></td><td></td><td></td><td></td><td></td><td><?php echo rupiah($total1); ?></td></tr>
</table>

</body>
</html>
