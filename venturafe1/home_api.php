<?php

    include '../config.php';

    $query = 'SELECT * FROM master_stok';
    $res = $conn->query($query);
    $array = array();
    
    while($row = mysqli_fetch_assoc($res)){
        $array[] = $row;
    }

    echo json_encode($array);


?>