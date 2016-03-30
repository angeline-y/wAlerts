<?php
$servername = "127.0.0.1";
$username = "**REMOVED**";
$dbname = '**REMOVED**';

// Create connection
$conn = mysqli_connect($servername, $username, null, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
