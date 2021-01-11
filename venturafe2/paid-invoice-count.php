<?php
// THIS FILE IS UNUSED

include('db/config.php');

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    // $user = $_POST['username']; // Testing var
    $noso = $_POST['noso'];

    $command = "SELECT COUNT(noinv) as qty FROM inv WHERE noso='$noso' AND user_id='$user'";
    $query = mysqli_query($conn, $command);
    if(mysqli_num_rows($query) > 0){
        $data = mysqli_fetch_assoc($query);
        echo "(" . $data["qty"] . ")";
    }
    else{
        echo "z";
    }
}

?>