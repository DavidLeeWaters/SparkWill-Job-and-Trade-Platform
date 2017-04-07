<?php include "databaselogin.php"; session_start(); 
$username = $_SESSION['username'];


$sql="SELECT * FROM users WHERE username = ('$username') ORDER BY id asc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$friends=($row['friends']);
if ($friends != '') {
$friends2 = explode(",",$friends);
}
}







$sql="SELECT blocklist FROM users WHERE (username = '".$username."') order by ID asc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$yourblocklist = $row['blocklist'];
}





$sql="SELECT susername FROM messages WHERE (rusername = '".$username."' AND seen != 'yes') order by ID asc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{

$sender = $row['susername'];
$afriend = 'no';

$sql="SELECT blocklist FROM users WHERE (username = '".$sender."') order by ID asc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$theirblocklist = $row['blocklist'];
}


if (strpos($yourblocklist, "$".$sender."$") !== false || strpos($theirblocklist, "$".$username."$") !== false) { } else {

foreach ($friends2 as $friend){
if ($sender == $friend){$afriend = 'yes';}
}


if ($afriend == 'no'){
echo '
                                <div id="test'.$sender.'" style="display: none;"></div>	
				<div id="best'.$sender.'" style="display: none;"></div>	
                                <div id="info'.$sender.'" style="display: none;"></div>
                                <div id="scrollinfo'.$sender.'" style="display: none;"></div>
                                <div id="beforemini'.$sender.'" style="display: none;"></div>
';
}

}

}



$sql="SELECT * FROM users WHERE username = ('$username') ORDER BY id asc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$friends=($row['friends']);
if ($friends != '') {
$friends2 = explode(",",$friends);
}
}


echo "<scri"."pt>";

$sql="SELECT blocklist FROM users WHERE (username = '".$username."') order by ID asc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$yourblocklist = $row['blocklist'];
}

$sql="SELECT * FROM messages WHERE (rusername = '".$username."' AND seen != 'yes') order by ID asc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$friend = $row['susername'];

$sql="SELECT blocklist FROM users WHERE (username = '".$friend."') order by ID asc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$theirblocklist = $row['blocklist'];
}

if (strpos($yourblocklist, "$".$friend."$") !== false || strpos($theirblocklist, "$".$username."$") !== false) { } else {

echo "register_popup('".$friend."', '".ucfirst($friend)."');";

}

}



echo "</scri"."pt>";




?>