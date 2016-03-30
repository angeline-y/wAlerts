<?php
 
 require('twilio-php-master/Services/Twilio.php'); 
 
/* Controller: Match the keyword with the customized SMS reply. */
function index(){
    $response = new Services_Twilio_Twiml();
    $response->sms("Reply 'unsubscribe' to abandon our services");
    echo $response;
}
 
/* Read the contents of the 'Body' field of the Request. */
$body = $_REQUEST['Body'];
$number = $_REQUEST['From'];
$number = substr($number, 1); 

/* Remove formatting from $body until it is just lowercase
characters without punctuation or spaces. */
$result = preg_replace("/[^A-Za-z0-9]/u", " ", $body);
$result = trim($result);
$result = strtolower($result);
 
/* Router: Match the ‘Body’ field with index of keywords */
switch ($result) {
    case 'testcase':
        include('database.php');
        $sql="UPDATE users SET uactive=0 WHERE unumber='$number'";
        mysqli_query($conn, $sql);
        if(mysqli_affected_rows($conn) == 1) {
            $response = new Services_Twilio_Twiml();
	    $textstuff = "hello and your number is".$number;
            $response->message($textstuff);
            echo $response;
        }
	mysqli_close($conn);
        break;
    default:
        index();
}
