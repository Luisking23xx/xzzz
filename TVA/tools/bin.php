<?php
if(strpos($message, "/bin") === 0 || strpos($message, ".bin") === 0){
    function getStr($string, $start, $end){
        $str = explode($start, $string);
        $str = explode($end, $str[1]);
        return $str[0];
    }
    
    $lista = substr($message, 5);
    $bin = substr($lista, 0,6);
    if(empty($bin)){
        sendMessage($chatId,"<b>Please enter a valid bin ex:</b><code> /bin 401658</code>",$message_id);
        exit();
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

if(empty($country)) {
       sendMessage($chatId,"<b>Bin not found ⚠️</b>",$message_id);
       exit();
    }

    $response = urlencode("𝙱𝚒𝚗 𝚒𝚗𝚏𝚘𝚛𝚖𝚊𝚝𝚒𝚘𝚗 [🔖]
------------------------------------------------
•𝙱𝚒𝚗 : $bin
-----------------[INFO]----------------------
[✮] 𝚃𝚢𝚙𝚎: $type
[✮] 𝙱𝚊𝚗𝚔: $bank    
[✮] 𝙲𝚘𝚞𝚗𝚝𝚛𝚢: $country [$emoji]
---------------------------------------------
•𝙲𝚑𝚎𝚌𝚔𝚎𝚍 𝚋𝚢: @$username
•𝙱𝚘𝚝: $owner");
        sendMessage($chatId,$response,$message_id);
    }
?>