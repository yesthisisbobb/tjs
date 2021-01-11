<?php
include('db/config.php');
extract($_POST);
$tanggal = date("Y-m-d");
$sql = "INSERT INTO login(username,nama,email,level,role,password,date,sales) values('$username','$username','$email','user','user','$password',$tanggal,'$sales')";
$query = $conn->query($sql);
if($query){
    $query = $conn->query("INSERT INTO customer(username,nama,alamat,telp,email,password,date,sales) values('$username','$username','$alamat','$phone','$email','$password','$tanggal','$sales')");
    if($query){
        echo "berhasil";
    }
    else{
        echo "gagal";
    }
}   
else{
    echo "gagal";
}
?>