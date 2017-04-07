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

$edcontent = $_GET['ed'];
$edcontent = mysql_real_escape_string($edcontent);
$sql="UPDATE users SET educationinfo = '".$edcontent."' WHERE username = ('".$username."')";
mysql_query($sql);

$sql2="SELECT * FROM users WHERE username = ('".$username."')";
$result2 = mysql_query($sql2);
while($row2 = mysql_fetch_array($result2)) 
{

$educationinfo = htmlspecialchars($row2['educationinfo']);
$educationinfo = str_replace("&lt;br&gt;","<br>",$educationinfo);
$educationinfo = explode("<br>", $educationinfo);

$educationinfo2 = '';
foreach ($educationinfo as $be) {

$lines = explode("\n", wordwrap($be, 40));
$be = "";
foreach ($lines as $key) {
if (strlen($key) > 40) {$key = chunk_split($key, 40, "<br>");}
$be = $be.$key."<br>";
}
$educationinfo2 = $educationinfo2.$be;
}
$educationinfo = $educationinfo2;
if (endsWith($educationinfo, "<br>")){
$educationinfo = str_lreplace("<br>", "", $educationinfo);
}
echo "<scr"."ipt>";

echo 'edtc = "'.$educationinfo.'";';

echo 'document.getElementById("edediting").style.visibility = "hidden"; document.getElementById("ededitbutton").style.display = "inline-block"; document.getElementById("ededitbutton").style.visibility = "visible"; document.getElementById("edcontent2").style.display = "none"; document.getElementById("edcontent").innerHTML = edtc;  document.getElementById("edcontent").style.display = "block"; if (document.getElementById("edbox").clientHeight < document.getElementById("edbox").scrollHeight){ } else { }';

echo "</scr"."ipt>";

}
}?>



