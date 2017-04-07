<?php include "databaselogin.php"; session_start();
$username = $_SESSION['username'];



$id = $_GET['id'];
$toggle = $_GET['yn'];


$sql="SELECT * FROM users WHERE username = ('".$username."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$applicant = "$$".$username."$$";
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
echo "document.getElementById('appbutton').style.display = 'none'; document.getElementById('cappbutton').style.display = 'block';";
echo "</scri"."pt>";



} else {



if ($applicants != ''){
if ($applicants != '$applicant'){
$applicants = str_replace(",".$applicant,"",$applicants);
}
$applicants = str_replace($applicant,"",$applicants);
$applicants = rtrim($applicants, ",");
$applicants = ltrim($applicants, ",");
}

$sql="UPDATE postings SET applicants = '".$applicants."' WHERE id = ('".$id."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
}

echo "<scri"."pt>";
echo "document.getElementById('cappbutton').style.display = 'none'; document.getElementById('appbutton').style.display = 'block';";
echo "</scri"."pt>";




}



?>