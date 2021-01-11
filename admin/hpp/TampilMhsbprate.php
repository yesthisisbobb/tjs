<?php
include '../../config.php';
$kode=$_GET['q'];

$sql1="SELECT * FROM master_stok where kode_stok='$kode'";
$result1 = mysqli_query($conn,$sql1);
while($row1 = mysqli_fetch_array($result1)) {
  $kodetipe=$row1["kodetipe"];
}
$sql="SELECT * FROM master_tipe where kode='$kodetipe'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
     $bu=$row['bc1'];
   }
   // $sql2="SELECT * FROM master_perusahaan where kode='$bu'";
   // $result2 = mysqli_query($conn,$sql2);
   // while($row2 = mysqli_fetch_array($result2)) {
   //      $bu2=$row2['nm_perusahaan'];
   //
   //    }

$sql3="SELECT * FROM master_exrate where kode='$bu' ORDER BY tgl DESC LIMIT 1";
$result3 = mysqli_query($conn,$sql3);
while($row3 = mysqli_fetch_array($result3)) {
    echo $row3['price'];
}
?>
