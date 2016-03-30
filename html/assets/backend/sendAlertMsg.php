<?php

$strFromNumber = '**REMOVED**'; //paid account
// $strFromNumber  = '**REMOVED**'; //trial account
// $strToNumber  = '**REMOVED**';
// $strMsg = "test sms";
$aryResponse = array();


// this line loads the library 
require('twilio-php-master/Services/Twilio.php'); 
 
$account_sid = '**REMOVED**'; 
$auth_token = '**REMOVED**'; 
$client = new Services_Twilio($account_sid, $auth_token);  

$bSuccess = $client->account->sms_messages->create(
    $strFromNumber, 
    $strToNumber, 
    $strMsg
);

$aryResponse["SentMsg"] = $strMsg;
$aryResponse["Success"] = true;

echo json_encode($aryResponse);

 ?>
