<?php
$number = $_POST['number'];
$code = $_POST['code'];

include('database.php');

$code = mysqli_real_escape_string($conn, stripslashes($code));

if (! ctype_digit($number)) {
	echo "input value not valid";
	return;
}

$sql = "UPDATE users SET uactive=1 WHERE unumber='$number' AND ucode='$code'";

$result = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn) == 1) {
	echo "success";
} else {
	echo "fail";
}
mysqli_close($conn);
?>