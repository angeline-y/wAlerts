<?php
date_default_timezone_set("America/Toronto");
 $txt = date('Y-m-d h:i:sa');
 $myfile = file_put_contents('/Users/SydnaAgnehs/Sites/alert/logs.txt', $txt.PHP_EOL , FILE_APPEND);

?>