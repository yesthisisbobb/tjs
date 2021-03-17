<?php
function stockLevel($namaGrup, $jum){
    if (strcasecmp($namaGrup, "SANITARY") == 0) {
        if ($jum <= 0) {
            return "Indent";
        } else if ($jum == 1) {
            return "Limited";
        } else {
            return "Ready";
        }
    } else if (strcasecmp($namaGrup, "TILE") == 0) {
        if ($jum <= 2) {
            return "Indent";
        } else if ($jum > 2 && $jum <= 18) {
            return "Limited";
        } else {
            return "Ready";
        }
    }
    else{
        if ($jum <= 1) {
            return "Indent";
        } else if ($jum > 1 && $jum <= 18) {
            return "Limited";
        } else {
            return "Ready";
        }
    }
}
?>