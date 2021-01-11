<?php
include '../../config.php';
$q=$_GET['q'];
$s=$_GET['s'];
$r=$_GET['r'];
$t=$_GET['t'];

$sql="SELECT * FROM master_freight where pod='$q' and tujuan='$t' and conttype='$s' and shiptype='$r'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    echo $row['biaya'];
}

?>
