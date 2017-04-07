<?php 

$dbhost = "localhost"; 
$dbname = "sparkwill"; 
$dbuser = "davidwaters2"; 
$dbpass = "Newlife4me!"; 

mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());

?>