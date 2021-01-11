<?php
session_start();
include("db/config.php");

$username = $_POST['email'];
$password = $_POST['password'];
$user_id = 0;
$status = "";

$stmt = $conn->prepare("SELECT username,email, password FROM login WHERE email=? AND password=? LIMIT 1");
$stmt->bind_param('ss', $username, $password);
$stmt->execute();
$stmt->bind_result($usernames, $email, $password);
$stmt->store_result();
if($stmt->num_rows == 1)  //To check if the row exists
{
    if($stmt->fetch()) //fetching the contents of the row
    {
        $_SESSION['loginId'] = 1;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        echo 'Success!';
        exit();
    }

}
else {
    echo "Gagal!";
}
$stmt->close();

?>