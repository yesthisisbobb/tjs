<?php
    session_start();
    function getSession($name) {
        if (isset($_SESSION["$name"])) {
            return $_SESSION["$name"];
        }
        else{
            return "nosess";
        }
    }
    
    if (isset($_GET["name"])) {
        echo getSession($_GET["name"]);
    }
?>