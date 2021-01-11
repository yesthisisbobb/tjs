<?php
include '../../config.php';
$kode=$_GET['q'];

$sql="SELECT * FROM master_buy where kode='$kode' ORDER BY tgl DESC LIMIT 1";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    echo $row['price'];
}
?>
