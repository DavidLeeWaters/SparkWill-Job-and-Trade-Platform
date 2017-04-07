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

$pbcontent = $_GET['p'];
$pbcontent = mysql_real_escape_string($pbcontent);
$sql="UPDATE users SET publicinfo = '".$pbcontent."' WHERE username = ('".$username."')";
mysql_query($sql);

$sql2="SELECT * FROM users WHERE username = ('".$username."')";
$result2 = mysql_query($sql2);
while($row2 = mysql_fetch_array($result2)) 
{

$publicinfo = htmlspecialchars($row2['publicinfo']);
$publicinfo = str_replace("&lt;br&gt;","<br>",$publicinfo);
$publicinfo = explode("<br>", $publicinfo);

$publicinfo2 = '';
foreach ($publicinfo as $be) {

$lines = explode("\n", wordwrap($be, 40));
$be = "";
foreach ($lines as $key) {
if (strlen($key) > 40) {$key = chunk_split($key, 40, "<br>");}
$be = $be.$key."<br>";
}
$publicinfo2 = $publicinfo2.$be;
}
$publicinfo = $publicinfo2;
if (endsWith($publicinfo, "<br>")){
$publicinfo = str_lreplace("<br>", "", $publicinfo);
}
echo "<scr"."ipt>";

echo 'pbtc = "'.$publicinfo.'";';

echo 'document.getElementById("pbediting").style.visibility = "hidden"; document.getElementById("pbeditbutton").style.display = "inline-block"; document.getElementById("pbeditbutton").style.visibility = "visible"; document.getElementById("pbcontent2").style.display = "none"; document.getElementById("pbcontent").innerHTML = pbtc;  document.getElementById("pbcontent").style.display = "block"; if (document.getElementById("pbbox").clientHeight < document.getElementById("pbbox").scrollHeight){ } else { }';

echo "</scr"."ipt>";

}
}?>



