<?php 
// Pull messages (for push messages please go to settings of the number)
$my_apikey = "JY53AFC55NW4GLXMDIZ7";
$number = "081918253202";
$type = "IN";
$markaspulled = "0";
$getnotpulledonly = "0";
$api_url  = "http://panel.apiwha.com/get_messages.php";
$api_url .= "?apikey=". urlencode ($my_apikey);
$api_url .=	"&number=". urlencode ($number);
$api_url .= "&type=". urlencode ($type);
$api_url .= "&markaspulled=". urlencode ($markaspulled);
$api_url .= "&getnotpulledonly=". urlencode ($getnotpulledonly);
$my_json_result = file_get_contents($api_url, false);
$my_php_arr = json_decode($my_json_result);
foreach($my_php_arr as $item)
{
  $from_temp = $item->from;
  $to_temp = $item->to;
  $text_temp = $item->text;
  $type_temp = $item->type;
   echo "Pengirim : ".$from_temp;
  echo "<br>Pesan :".$text_temp;
  echo "<hr>";
}
?>
