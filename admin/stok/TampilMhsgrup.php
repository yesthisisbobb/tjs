<?php
include '../../config.php';
$kode=$_GET['q'];
$sql="SELECT * FROM master_tipe  where kode='$kode' LIMIT 1";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    $kg=$row['kodegrup'];
    // $sql1="SELECT * FROM detail_sub_grup where kode='$kg' LIMIT 1";
    // $result1 = mysqli_query($conn,$sql1);
    // while($row1 = mysqli_fetch_array($result1)) {
      echo $kg;

}
?>
