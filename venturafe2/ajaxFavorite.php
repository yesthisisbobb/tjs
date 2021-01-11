<?php
session_start();
include("db/config.php");
$hasil = '<img src="resource/LVWB.png">';
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $kodestok = $_POST['kode'];
    $query = $conn->query("SELECT * FROM fav WHERE user = '$username' AND kode = '$kodestok' LIMIT 1");
    
    $jmlFav = 0;
    while ($row = mysqli_fetch_assoc($query)) {
        $jmlFav++;
    }

    if ($jmlFav <= 0) {
        $query = $conn->query("INSERT INTO fav(user,kode) VALUES('$username','$kodestok')");
        $hasil = '<img src="resource/LVRB.png"> ';
    } else if ($jmlFav > 0) {
        $query = $conn->query("DELETE FROM fav WHERE user = '$username' AND kode = '$kodestok'");
        $hasil = '<img src="resource/LVWB.png"> ';
    }
}

$conn->close();
echo $hasil;
?>