<?php
include '../../config.php';
$kode=$_GET['q'];
$sql="SELECT * FROM detail_sub_grup  where nama='$kode' LIMIT 1";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    echo $row['alias'];
}
?>
