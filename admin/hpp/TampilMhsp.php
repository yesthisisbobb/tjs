<?php
include '../../config.php';
$kode=$_GET['q'];
$s=$_GET['s'];


$sql="SELECT * FROM master_stok where kode_stok='$kode'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
  if($s=="1")
  {
    echo $row['panjang'];
  }
  else if($s=="2"){
    echo $row['lebar'];
  }// code...
  else if($s=="3"){
    echo $row['pcsctn'];
  }
  else if($s=="4"){
    echo $row['stokcont'];
  }
  else if($s=="5"){
    echo $row['contstan'];
  }
  else if($s=="6"){
    echo $row['tebal'];
  }
  else if($s=="7"){
    echo $row['kgsstok'];
  }
  }
?>
