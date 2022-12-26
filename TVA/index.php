<?php

$botToken =  "5812695874:AAF13O1TTuLit3KxC26Ux1_G12j_CT2vYRs";
$website = "https://api.telegram.org/bot".$botToken;
$update = file_get_contents('php://input');
echo $update;
$update = json_decode($update, TRUE);
global $website;
$e = print_r($update);
$cchatid2 = $update["callback_query"]["message"]["chat"]["id"];
$cmessage_id2 = $update["callback_query"]["message"]["message_id"];
$cdata2 = $update["callback_query"]["data"];
$username = $update["message"]["from"]["username"];
$chatId = $update["message"]["chat"]["id"]; 
$chatusername = $update["message"]["chat"]["username"]; 
$chatname = $update["message"]["chat"]["title"]; 
$gId = $update["message"]["from"]["id"];
$userId = $update["message"]["from"]["id"]; 
$firstname = $update["message"]["from"]["first_name"]; 
$username = $update["message"]["from"]["username"]; 
$message = $update["message"]["text"]; 
$new_chat_member = $update["message"]["new_chat_member"];
$newusername = $update["message"]["new_chat_member"]["username"];
$newgId = $update["message"]["new_chat_member"]["id"];
$newfirstname = $update["message"]["new_chat_member"]["first_name"];
$message_id = $update["message"]["message_id"]; 
$r_id = $update["message"]["reply_to_message"];
$r_userId = $update["message"]["reply_to_message"]["from"]["id"];  
$r_firstname = $update["message"]["reply_to_message"]["from"]["first_name"];  
$r_username = $update["message"]["reply_to_message"]["from"]["username"]; 
$r_msg_id = $update["message"]["reply_to_message"]["message_id"]; 
$r_msg = $update["message"]["reply_to_message"]["text"]; 
$sender_chat = $update["message"]["sender_chat"]["type"]; 
$bot_name = "MI BOT USERNAME";
$owner = "@TVA_XZZ";
$keyboard = json_encode([
    'inline_keyboard' => [
    [['text' => "Propietario 🧑‍💻", 'url' => "https://t.me/TVA_XZZ "],],
    ]]);


    if ($cdata2 == "gates"){

        $keyboard = [
        'inline_keyboard' => [
             [
             ['text' => 'TOOLS🛠', 'callback_data' => 'herr']
             ],
             [
             ['text' => 'Exit 🔄️', 'callback_data' => 'exit']
             ],
       ]
    ];
    $freecmands = urlencode("<b>$bot_name

    _> /stp: STRIPE(€1)
    ↳ Status:『OFF』❌
    ↳ Reason: null
    ↳ Review: 2022-12-21 
    ↳ Use: /stp cc|mm|yyyy|cvc
    </b>");
    $free = json_encode($keyboard);
            file_get_contents("https://api.telegram.org/bot$botToken/editMessageText?chat_id=$cchatid2&text=$freecmands&message_id=$cmessage_id2&parse_mode=HTML&reply_markup=$free");
    
    }
    



if ($cdata2 == "herr"){

        $keyboard = [
        'inline_keyboard' => [
             [
             ['text' => 'GATES💎', 'callback_data' => 'gates']
             ],
             [
             ['text' => 'Exit 🔄️', 'callback_data' => 'exit']
             ],
       ]
    ];
    $freecmands = urlencode("[🎃] [ 🝂 ] las Tools [🎃] 
------------------------------------------

ϟ Tool Gen Card 
Formato  » /gen cc|m|y|cvv
[ 🏏 ] ϟ Status: [ONLINE ✅ ] 
Comment » None | Review : 12-05-2022
   
ϟ Tool Sk Key
Formato  » /key sk_livexxxxx
[ 🏏 ] ϟ Status: [ONLINE ✅ ] 
Comment » None | Review : 12-05-2022

ϟ Bin Loockup
Formato  » /bin cc
[ 🏏 ] ϟ Status: [ONLINE ✅ ] 
Comment » None | Review : 12-05-2022  

ϟ Fake Address
Formato  » /rand US la mx etc..
[ 🏏 ] ϟ Status: [ONLINE ✅ ] 
Comment » None | Review : 12-05-2022");
    $free = json_encode($keyboard);
            file_get_contents("https://api.telegram.org/bot$botToken/editMessageText?chat_id=$cchatid2&text=$freecmands&message_id=$cmessage_id2&parse_mode=HTML&reply_markup=$free");
    
}


if ($cdata2 == "exit"){

    $keyboard = [
    'inline_keyboard' => [
         [
         ['text' => 'Finalizado ✅', 'callback_data' => 'Close']
         ],
   ]
];
$freecmands = urlencode("<b>Su seccion ah finalizado con exito ✅</b>");
$free = json_encode($keyboard);
        file_get_contents("https://api.telegram.org/bot$botToken/editMessageText?chat_id=$cchatid2&text=$freecmands&message_id=$cmessage_id2&parse_mode=HTML&reply_markup=$free");

}


if ($cdata2 == "Close"){

}

if(strpos($message, "/start") ===0){ 
    $keyboard2 = json_encode([
        'inline_keyboard' => [
        [['text' => "TOOLS 🛠", 'callback_data' => "herr"],['text' => "GATES💎", 'callback_data' => "gates"]],
        ]]);
reply_to($chatId,$message_id,$keyboard2,"<b>hola, amo estas en la seccion de mis comandos oprime el boton que desees para mi uso</b>");
}


function reply_to($chatId,$message_id,$keyboard,$message) {
    $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML&reply_markup=".$keyboard."";
    return file_get_contents($url);
}

function deleteM($chatId,$message_id){

    $url = $GLOBALS[website]."/deleteMessage?chat_id=".$chatId."&message_id=".$message_id."";
    file_get_contents($url);
}


function sendMessage($chatId,$message,$message_id) {

    $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
    file_get_contents($url);

}


foreach (glob("tools/*.php") as $filename)
{
    include $filename;
}

foreach (glob("Plugins/*.php") as $filename)
{
    include $filename;
}

?>