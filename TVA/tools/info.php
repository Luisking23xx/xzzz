<?php
if(strpos($message, "/info") === 0 || strpos($message, ".info") === 0){
    $m = "[🎃] 𝚄𝚜𝚎𝚛 𝚒𝚗𝚏𝚘𝚛𝚖𝚊𝚝𝚒𝚘𝚗 -%0A------------------------------------------%0A[✮] 𝚄𝚜𝚎𝚛𝚗𝚊𝚖𝚎 - @$username%0A[✮] 𝚄𝚜𝚎𝚛𝙸𝚍 - [$userId]%0A[✮] 𝙵𝚒𝚛𝚜𝚝𝙽𝚊𝚖𝚎 - $firstname%0A------------------------------------------%0A•𝙱𝚘𝚝: $owner";
    sendMessage($chatId,$m,$message_id);
}
?>