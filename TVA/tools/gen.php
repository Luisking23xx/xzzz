<?php
if(strpos($message, "/gen") === 0 || strpos($message, ".gen") === 0){
$lista = substr($message, 5);
$bin = substr($lista, 0,6);
if(empty($bin)){
sendMessage($chatId,"<b><code>Los formatos vรกlidos son ex: 123456xxxxxxxx|xx|xxxx|xxx</code></b>",$message_id);
die();
}

$fim = json_decode(file_get_contents('https://projectslost.xyz/bin/?bin='.$bin), true);
$status = $fim["status"];
$resultb = $fim["result"];
$level = $fim["level"];
$type = $fim["type"];
$brand = $fim["brand"];
$country = $fim["country"]["name"];
$currency = $fim["country"]["currency"];
$bank = $fim['bank']["name"];
$bankphone = $fim['bank']["phone"];
$emoji = $fim["country"]["flag"];
$pais = $fim["country"]["ISO2"];

if(empty($bank)){
  $msg = "<b>Invalid bin or extra</b> โ ๏ธ";
  sendMessage($chatId,$msg,$message_id);
      exit();
}

$response = file_get_contents("https://alvcarr230.alwaysdata.net/genDevilsx.php?lista=$lista");

$response = urlencode("<b>
๐ฒ๐ฒ ๐ถ๐๐๐๐๐๐๐๐ ๐ณ</b>
------------------------------------------------
$response
-----------------[INFO]----------------------
[โฎ] ๐๐ข๐๐: $type
[โฎ] ๐ฑ๐๐๐: $bank
[โฎ] ๐ฒ๐๐๐๐๐๐ข: $country [$emoji]
------------------------------------------------
โข๐ฒ๐๐๐๐๐๐ ๐๐ข: @$username
โข๐ฑ๐๐: $owner

");
sendMessage($chatId,$response,$message_id);
}
?>