<?php include "databaselogin.php"; session_start(); if (isset($_SESSION['username'])){
$username = $_SESSION['username'];

function str_lreplace($search, $replace, $subject)
{   
    $pos = strrpos($subject, $search);
    if($pos !== false){ $subject = substr_replace($subject, $replace, $pos, strlen($search)); }
    return $subject;
}

function endsWith($str, $sub) {
   return ( substr( $str, strlen( $str ) - strlen( $sub ) ) === $sub );
}

$excontent = $_GET['ex'];
$excontent = mysql_real_escape_string($excontent);
$sql="UPDATE users SET experienceinfo = '".$excontent."' WHERE username = ('".$username."')";
mysql_query($sql);

$sql2="SELECT * FROM users WHERE username = ('".$username."')";
$result2 = mysql_query($sql2);
while($row2 = mysql_fetch_array($result2)) 
{

$experienceinfo = htmlspecialchars($row2['experienceinfo']);
$experienceinfo = str_replace("&lt;br&gt;","<br>",$experienceinfo);
$experienceinfo = explode("<br>", $experienceinfo);

$experienceinfo2 = '';
foreach ($experienceinfo as $be) {

$lines = explode("\n", wordwrap($be, 40));
$be = "";
foreach ($lines as $key) {
if (strlen($key) > 40) {$key = chunk_split($key, 40, "<br>");}
$be = $be.$key."<br>";
}
$experienceinfo2 = $experienceinfo2.$be;
}
$experienceinfo = $experienceinfo2;
if (endsWith($experienceinfo, "<br>")){
$experienceinfo = str_lreplace("<br>", "", $experienceinfo);
}
echo "<scr"."ipt>";

echo 'extc = "'.$experienceinfo.'";';

echo 'document.getElementById("exediting").style.visibility = "hidden"; document.getElementById("exeditbutton").style.display = "inline-block"; document.getElementById("exeditbutton").style.visibility = "visible"; document.getElementById("excontent2").style.display = "none"; document.getElementById("excontent").innerHTML = extc;  document.getElementById("excontent").style.display = "block"; if (document.getElementById("exbox").clientHeight < document.getElementById("exbox").scrollHeight){ } else { }';

echo "</scr"."ipt>";

}
}?>



