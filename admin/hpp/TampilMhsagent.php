<?php
include '../../config.php';
$q=$_GET['q'];
$s=$_GET['s'];
$r=$_GET['r'];
$j=7;

$sql="SELECT * FROM master_agent where grup='$q' and coo='$s' and '$r'>min and '$r'<max";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    echo $row['price'];
}

?>
