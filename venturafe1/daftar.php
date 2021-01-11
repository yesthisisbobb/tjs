<?php
session_start();
include("inc/config.php");
$nama=$_POST['nama'];
$email=$_POST['email'];
$uname=$_POST['uname'];
$phone=$_POST['phone'];
$password=$_POST['password'];


$sql = "INSERT INTO customer(username,nama,email,telp,password)  VALUES ('$uname','$nama','$email','$phone','$password')";
$query = mysqli_query($conn, $sql);
$sql1 = "INSERT INTO login(username,nama,email,level,role,divisi,divisi2,cabang,password)  VALUES
('$uname','$nama','$email','user','user','retail','PTA LOW', 'surabaya','$password')";
$query1 = mysqli_query($conn, $sql1);

if( $query1 )
{
		header('Location: register.php?status=sukses');
}
else
{
	header('Location: register.php?status=gagal');
}

?>
