<?php
include '../../config.php';
$kode=$_GET['q'];
$sql1="SELECT * FROM master_vtruk where nopol='$kode'";
$result1 = mysqli_query($conn,$sql1);
while($row1 = mysqli_fetch_array($result1)) {
    $tonage=$row1['berat'];
}
$total=0;
$sql="SELECT * FROM dtl_vtruk where nopol='$kode'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    $total=$total+$row['tonage'];
}
$p=($total/$tonage)*100;
$hasilp=round($p);
echo $total."kg/".$tonage."kg(".$hasilp."%)";
?>
