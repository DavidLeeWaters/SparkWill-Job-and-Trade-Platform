<?php include "databaselogin.php";

$name = $_GET['name'];
$latitude = $_GET['la'];
$longitude = $_GET['lo'];

$checkname = mysql_query("SELECT * FROM users WHERE name = '".$name."'");      
if(mysql_num_rows($checkname) == 1)
{
mysql_query("UPDATE users SET latitude='".$latitude."', longitude='".$longitude."' WHERE name='".$name."' ");
} else {
mysql_query("INSERT INTO users (name, latitude, longitude) VALUES('".$name."', '".$latitude."', '".$longitude."')");
}

?>