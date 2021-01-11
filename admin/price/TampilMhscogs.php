<?php
session_start();
include '../../config.php';
$kode=$_GET['q'];
$namae=$_SESSION["username"];


$sql1="SELECT * FROM login where email='$namae'";
$result1 = mysqli_query($conn,$sql1);
while($row1 = mysqli_fetch_array($result1)) {
  $divku=$row1['divisi2'];

}
$sql="SELECT * FROM master_hpp where tjsitemcode='$kode'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {

 if ($divku="PTA"){
    echo  $row['cogskupta'];
  }
}


?>
