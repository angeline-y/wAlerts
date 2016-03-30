<?php

include('simple_html_dom.php');
include('database.php');

$sql3 = "SELECT unumber FROM users WHERE uregionid=1 AND uactive=1";
$result = mysqli_query($conn, $sql3);
while($row = mysqli_fetch_assoc($result)) {
           $strToNumber="+".$row['unumber'];
           $strMsg = "1:30 PM ADT Tuesday 29 March 2016 \n \n Winter storm warning in effect for: City of Toronto";
           include('sendAlertMsg.php');
}

mysqli_close($conn);


/*
$url = "http://weather.gc.ca/warnings/report_e.html?on61";
// $url = "https://weather.gc.ca/warnings/report_e.html?nl18#20021960555104575201603280507ww1676cwhx";
$html = file_get_html($url);
$alert="";

//foreach($html->find('p') as $element) {
	// if ($alert != "") {
	// 	$alert.='%0a';
	// }
	$alert.=$element->plaintext;
	if( strpos($element->plaintext, "in effect for") !== false) {
		break;
	}

	// echo $element->plaintext . '<br>';
	// if( strpos($element->plaintext, "Please continue to monitor alerts and forecasts issued by Environment Canada.") !== false
	// 	|| strpos($element->plaintext, "Access Government of Canada activities and initiatives") !== false) {
	// 	break;
	// }
	
//}

if( strpos($alert, "No Alerts in effect.") !== false) {
	echo "No alerts";
	return;
}

$alertArray = explode("\n", $alert);

include('database.php');


$pos = strpos($alert, "2016");
$alert = substr_replace($alert, "\n", $pos+5,0);
$alert .= " City of Toronto";

$sql1="SELECT 1 FROM alerts WHERE aregionid=1 AND amsg='$alert'";
$result = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result)==1) {
	return;
}


$sql2="INSERT INTO alerts (aregionid, amsg) VALUES(1, '$alert')";
// echo $sql;


if (mysqli_query($conn, $sql2)) {
	$sql3 = "SELECT unumber FROM users WHERE uregionid=1";
	$result = mysqli_query($conn, $sql3);
	while($row = mysqli_fetch_assoc($result)) {
		$strToNumber="+".$row['unumber'];
		$strMsg = $alert;
		include('sendAlertMsg.php');
	}
}

mysqli_close($conn);
*/
?>
