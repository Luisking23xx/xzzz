<?php
if(strpos($message, "/gen") === 0 || strpos($message, ".gen") === 0){
$lista = substr($message, 5);
$bin = substr($lista, 0,6);
if(empty($bin)){
sendMessage($chatId,"<b><code>Los formatos válidos son ex: 123456xxxxxxxx|xx|xxxx|xxx</code></b>",$message_id);
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
  $msg = "<b>Invalid bin or extra</b> ⚠️";
  sendMessage($chatId,$msg,$message_id);
      exit();
}

$response = file_get_contents("https://alvcarr230.alwaysdata.net/genDevilsx.php?lista=$lista");

$response = urlencode("<b>
𝙲𝙲 𝙶𝚎𝚗𝚎𝚛𝚊𝚝𝚘𝚛 💳</b>
------------------------------------------------
$response
-----------------[INFO]----------------------
[✮] 𝚃𝚢𝚙𝚎: $type
[✮] 𝙱𝚊𝚗𝚔: $bank
[✮] 𝙲𝚘𝚞𝚗𝚝𝚛𝚢: $country [$emoji]
------------------------------------------------
•𝙲𝚑𝚎𝚌𝚔𝚎𝚍 𝚋𝚢: @$username
•𝙱𝚘𝚝: $owner

");
sendMessage($chatId,$response,$message_id);
}
?>