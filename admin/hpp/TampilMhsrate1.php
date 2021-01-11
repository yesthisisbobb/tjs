<?php
include '../../config.php';
$kode=$_GET['q'];

$sql="SELECT * FROM master_stok where kodetipe='$kode'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    $kodedivisi=$row['kodedivisi'];
}

$sql1="SELECT * FROM master_rate where bd='$kodedivisi'";
$result1 = mysqli_query($conn,$sql1);
while($row1 = mysqli_fetch_array($result1)) {
    echo $row1['nama'];
}
?>
