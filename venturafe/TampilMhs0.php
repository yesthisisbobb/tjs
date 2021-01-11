<?php
include '../../config.php';
$kode=$_GET['q'];

$sql="SELECT * FROM master_tipe where kode='$kode'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    echo $row['kodegrup'];
}
?>
