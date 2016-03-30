<?php
$number = $_POST['number'];

include('database.php');

if (! ctype_digit($number)) {
	echo "input value not valid";
	return;
}

$ucode = strtoupper(substr(md5(microtime()),rand(0,26),5));

$sql = "REPLACE INTO users (unumber, uregionid, ucode) VALUES('$number', 1, '$ucode')";
echo $sql;

if (mysqli_query($conn, $sql)) {
    $strToNumber="+".$number;
	$strMsg = "Hello from Safety Alerts! Enter $ucode on the sign up page to verify your account.";
	include('sendAlertMsg.php');
	echo "success";
}

mysqli_close($conn);
?>