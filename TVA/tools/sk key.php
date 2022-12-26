<?php



if ((strpos($message, "/claim") === 0)||(strpos($message, ".key") === 0)||(strpos($message, "/key") === 0)){
$sec = substr($message, 6);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=5278540001668044&card[exp_month]=10&card[exp_year]=2024&card[cvc]=252");
curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);


if (strpos($result, 'api_key_expired')){
sendMessage($chatId, "<b>🔴EXPIRED KEY</b>%0A<u>✦Key:</u> <code>$sec</code>%0A<b>✦Message: <b>Expired API key Provided%0A</b>✦Checked by:</b> @$username%0A<b>✦Bot Made by @TVA_XZZ</b>", $message_id);
}elseif (strpos($result, 'Invalid API Key provided')){
sendMessage($chatId, "<b>🔴INVALID KEY</b>%0A<b>✦Key:</b> <code>$sec</code>%0A<b>✦Message: <b>Invalid API Key provided.%0A</b>✦Checked by: </b>@$username%0A<b>✦Bot Made by @TVA_XZZ</b>", $message_id);
}
elseif ((strpos($result, 'You did not provide an API key.')) || (strpos($result, 'You need to provide your API key in the Authorization header,'))){
sendMessage($chatId, "<b>🔴NO KEY PROVIDED%0A✦Message:</b><b> You did not provide an API key.%0A</b><b>✦Checked by:</b> @$username%0A<b>✦Bot Made by: @TVA_XZZ</b>", $message_id);
}
elseif ((strpos($result, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
sendMessage($chatId, "<b>🔴DEAD KEY</b>%0A<b>✦Key:</b> <code>$sec</code>%0A<b>✦Message: <b>Testmode charges only.%0A</b>✦Checked by:</b> @$username%0A<b>✦Bot BY @TVA_XZZ</b>", $message_id);
}else{
sendMessage($chatId, "<b>🟢LIVE KEY</b>%0A<b>✦Key:</b><code>$sec</code>%0A<b>✦Message:<b> Live API key provided.%0A</b>✦Checked by:</b> @$username%0A<b>✦Bot BY  @TVA_XZZ</b>", $message_id);
}
}

//================[SK CHECK]===================/


?>