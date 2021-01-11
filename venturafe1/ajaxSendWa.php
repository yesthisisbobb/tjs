<?php
include("inc/config.php");
$link = $_GET['link'];
$telp = $_GET['telp'];
if(isset($_POST['waSO'])){
    echo 'https://wa.me/'.$telp.'?text='.urlencode('http://localhost/ventura2erp/venturafe1/').'invlistdtl3.php?no='.$link;

}
if(isset($_POST['emailSO'])){
require_once('library-email/library-email/function.php');
$to       = $_GET['uid'];
$subject  = 'Link Invoice';
$message  = '<p>http://localhost/ventura2erp/venturafe1/invlistdtl3.php?no='.$link.'</p>';
smtp_mail($to, $subject, $message, '', '', 0, 0, true);
}


?>