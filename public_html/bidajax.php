<?php include "databaselogin.php"; session_start();
$username = $_SESSION['username'];

$id = $_GET['id'];
$toggle = $_GET['yn'];
$money = $_GET['money'];


$sql="SELECT * FROM users WHERE username = ('".$username."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$applicant = "$$".$username."-".$money."$$";
}



$sql="SELECT * FROM postings WHERE id = ('".$id."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$applicants = $row['applicants'];
}



if ($toggle == 'yes'){

if ($applicants != ''){
$applicants = ($applicants.",".$applicant);
} else {
$applicants = $applicant;
}



$sql="UPDATE postings SET applicants = '".$applicants."' WHERE id = ('".$id."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
}

echo "<scri"."pt>";
echo "document.getElementById('bidbutton').style.display = 'none'; document.getElementById('cbidbutton').style.display = 'block'; document.getElementById('textbid').style.display = 'none'; document.getElementById('moneysign').style.display = 'none';";
echo "</scri"."pt>";



} else {



$applicant = "$".$username."-";
if ($applicants != ''){

if (strpos($applicants, ",") === false){
$applicants2 = explode(",",$applicants);
foreach ($applicants2 as $key){
if (strpos($key, $applicant) !== false){
    $applicants = str_replace($key,"",$applicants);
}
}
} else {
$applicants2 = explode(",",$applicants);
foreach ($applicants2 as $key){
if (strpos($key, $applicant) !== false){
    $applicants = str_replace($key,"",$applicants);
}
}
}
$applicants = rtrim($applicants, ",");
$applicants = ltrim($applicants, ",");
}


$sql="UPDATE postings SET applicants = '".$applicants."' WHERE id = ('".$id."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
}

echo "<scri"."pt>";
echo "document.getElementById('cbidbutton').style.display = 'none'; document.getElementById('bidbutton').style.display = 'block'; document.getElementById('textbid').style.display = 'block'; document.getElementById('moneysign').style.display = 'block';";
echo "</scri"."pt>";




}



?>