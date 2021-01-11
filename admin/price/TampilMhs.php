<?php
include '../../config.php';
$kode=$_GET['q'];
//
$sql="SELECT * FROM master_stok where kode_stok='$kode'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    $a=$row['kodetipe'];

}

$sql1="SELECT * FROM master_tipe where kode='$a'";
$result1 = mysqli_query($conn,$sql1);
while($row1 = mysqli_fetch_array($result1)) {
    echo $row1['bc1'];
}
?>
