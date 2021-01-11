<?php
include '../../config.php';
$kode=$_GET['q'];


$sql1="SELECT * FROM master_stok where kode_stok='$kode'";
$result1 = mysqli_query($conn,$sql1);
while($row1 = mysqli_fetch_array($result1)) {
  $kodetipe=$row1["kodetipe"];

}
$sql="SELECT * FROM master_tipe where kode='$kodetipe'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
     $bu=$row['selling'];
     $sql2="SELECT * FROM master_unit where id='$bu'";
     $result2 = mysqli_query($conn,$sql2);
     while($row2 = mysqli_fetch_array($result2)) {
       echo $row2["nama"];
}
}
?>
