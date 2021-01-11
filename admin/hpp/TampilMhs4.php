<?php
include '../../config.php';
$kode=$_GET['q'];

$sql1="SELECT * FROM detail_sub_grup where nama='$kode'";
$result1 = mysqli_query($conn,$sql1);
while($row1 = mysqli_fetch_array($result1)) {
$kodepg=$row1['kode'];
}

$sql="SELECT * FROM master_cont_prod where kodeprd='$kodepg'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    echo $row['kode'];
}
?>
