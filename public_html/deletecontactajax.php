<?php include "databaselogin.php"; session_start();

$username = ($_SESSION['username']);
$timezone = -5;
$time = gmdate("Y/m/j ".','." H:i", time() + 3600*($timezone));
$other = $_GET['other'];




$sql="SELECT * FROM users WHERE username = ('".$username."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$curfriends = $row['friends'];
$exists = 'false';
$curfriends2 = explode(",",$curfriends);
foreach ($curfriends2 as $key=>$value){

if ($value == $other or $other == $username){
$exists = 'true';
}

                                      }

if ($exists == 'true'){
echo $curfriends . "<br>";
$trimmed = str_replace($other, '', $curfriends);
$trimmed = ltrim($trimmed, ',');
$trimmed = rtrim($trimmed, ',');
$trimmed = str_replace(",,", ',', $trimmed);
echo $trimmed;
mysql_query("UPDATE users SET friends = '$trimmed' WHERE username = '$username'");
echo "<scri"."pt>";
echo "document.getElementById(\"deletecontact\").style.display = 'none'; document.getElementById(\"addcontact\").style.display = '';";
echo "</scri"."pt>";
}




}



?>