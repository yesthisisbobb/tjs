<?php
include '../../config.php';
$kode=$_GET['q1'];
echo $kode."-";
$sql="SELECT * FROM master_tipe where Kode='$kode'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
  $grup=$row['grup'];
}

$sql="SELECT * FROM detail_sub_grup where nama='$grup'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    $grup1=$row['nama'];
    $grup2=$row['namagrup'];
}

$sql="SELECT * FROM master_sub_grup where nama='$grup2'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    $grup3=$row['namagrup'];
    echo "<b>".$grup1."-";
    echo "<b>".$grup2."-";
    echo "<b>".$grup3;

}
?>
