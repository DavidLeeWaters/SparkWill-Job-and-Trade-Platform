<?php include "databaselogin.php"; session_start();
$username = $_SESSION['username'];
$other = $_GET['other'];
$other = "$".$other."$";

$sql="SELECT * FROM users WHERE username = ('".$username."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$blocklist = $row['blocklist'];
}

$trimmed = str_replace($other, '', $blocklist);
$trimmed = ltrim($trimmed, ',');
$trimmed = rtrim($trimmed, ',');
$trimmed = str_replace(",,", ',', $trimmed);
$blocklist = $trimmed;


$sql="UPDATE users SET blocklist = '".$blocklist."' WHERE username = ('".$username."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
}

echo "<scri"."pt>";
echo "document.getElementById('unblockcontact').style.display = 'none'; document.getElementById(\"blockcontact\").style.display = '';";
echo "</scri"."pt>";

?>