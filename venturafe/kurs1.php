<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, 'http://www.adisurya.net/kurs-bca/get');
$kurs_bca = curl_exec($ch);
curl_close($ch);
echo $kurs_bca;
?>
