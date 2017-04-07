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

if ($exists == 'false'){
if ($curfriends != ''){
$curfriends = $curfriends.",".$other;
} else { 
$curfriends = $curfriends.$other;
}
    
    mysql_query("UPDATE users SET friends = '$curfriends' WHERE username = '$username'");
echo "<scri"."pt>";
echo "document.getElementById(\"addcontact\").style.display = 'none'; document.getElementById(\"deletecontact\").style.display = '';";
echo "</scri"."pt>";
}


}



?>