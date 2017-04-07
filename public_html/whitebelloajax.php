<?php include "databaselogin.php"; session_start();

$username = $_SESSION['username'];

if (isset($username)){
$sql="SELECT * FROM notifications WHERE rusername = ('".$username."') AND seen = ('0') limit 1";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
echo "images/onbello.png";
}
                     }