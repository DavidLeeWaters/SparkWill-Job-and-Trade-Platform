<?php include "databaselogin.php"; session_start();

function str_lreplace($search, $replace, $subject)
{   
    $pos = strrpos($subject, $search);
    if($pos !== false){ $subject = substr_replace($subject, $replace, $pos, strlen($search)); }
    return $subject;
}

function endsWith($str, $sub) {
   return ( substr( $str, strlen( $str ) - strlen( $sub ) ) === $sub );
}

$username = $_SESSION['username'];
$timezone = -4;
$time = gmdate("Y/m/j ".','." H:i", time() + 3600*($timezone));


if (isset($_GET['test'])){
$test = $_GET['test'];

$test2 = explode(",",$test);

echo "<script>";
foreach ($test2 as $key=>$value){


echo 'document.getElementById("info'.$value.'").innerHTML = document.getElementById("textarea'.$value.'").value;';

echo "newoldvar = document.getElementById('".ucfirst($value)."this2').innerHTML ; ";
echo "newthisvar = '";

$sql="SELECT COUNT(*) AS total FROM messages WHERE ((susername = '".$value."' AND rusername = '".$username."') OR (susername = '".$username."' AND rusername = '".$value."')) AND hidefrom NOT LIKE ('%$".$username."$%') order by ID asc";
$result = mysql_query($sql);
$pop = "";
while($row = mysql_fetch_array($result)) {
 echo $row['total'];
}

echo "';";
echo "oldvar = document.getElementById('".ucfirst($value)."this').innerHTML ; ";
echo "thisvar = '";



mysql_query("UPDATE messages SET seen='yes' WHERE (susername = '".$value."' AND rusername = '".$username."')");



$sql="SELECT * FROM messages WHERE ((susername = '".$value."' AND rusername = '".$username."') OR (susername = '".$username."' AND rusername = '".$value."')) AND hidefrom NOT LIKE ('%$".$username."$%') order by ID asc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
if ($username != $row['susername']){
echo "<div style=\'float: left;\'>";
}
if ($username == $row['susername']){
echo "<div style=\'float: right; padding-bottom: 17px;\'>";
}


$tid = $row['id'];
if ($username == $row['susername']){echo "<font color=\'white\' style=\'float: right;\'> <span id=\'".$tid."\' class=\'righttimebubble\' style=\'visibility: hidden;\' onmouseover=\'document.getElementById(\"".$tid."\").style.visibility = \"visible\";\' onmouseout=\'document.getElementById(\"".$tid."\").style.visibility = \"hidden\";\'><font>".$row['time']."&nbsp;</font></span>"; } else { echo "<font color=\'darkgreen\'>"; }

echo "<b style=\'cursor: default;\' onmouseover=\'document.getElementById(\"".$tid."\").style.visibility = \"visible\";\' onmouseout=\'document.getElementById(\"".$tid."\").style.visibility = \"hidden\";\' >".$row['susername']."</b></font>";

if ($username != $row['susername']){echo "<span id=\'".$tid."\' class=\'lefttimebubble\' style=\'visibility: hidden;\' onmouseover=\'document.getElementById(\"".$tid."\").style.visibility = \"visible\";\' onmouseout=\'document.getElementById(\"".$tid."\").style.visibility = \"hidden\";\'><font>&nbsp;".$row['time']."</font></span>"; }

echo "<br>";
$message = htmlspecialchars($row['message'], ENT_QUOTES);
$message = str_replace("&lt;bra&gt;","<br>",$message);
$message = explode("<br>", $message);

$message2 = '';
foreach ($message as $be) {

$lines = explode("\n", wordwrap($be, 30));
$be = "";
foreach ($lines as $key) {
if (strlen($key) > 30) {$key = chunk_split($key, 30, "<br>");}
$be = $be.$key."<br>";
}
$message2 = $message2.$be;
}
$message = $message2;
if (endsWith($message, "<br>")){
$message = str_lreplace("<br>", "", $message);
}



if ($username == $row['susername']){echo "<span style=\'display: inline-block; border: solid green 2px; padding: 4px; border-radius: 3px; background: green; color: white; float: right;\' onmouseover=\'document.getElementById(\"".$tid."\").style.visibility = \"visible\"; this.style.borderColor = \"white\";\' onmouseout=\'document.getElementById(\"".$tid."\").style.visibility = \"hidden\"; this.style.borderColor = \"green\";\'>".$message."</span><br></div>"; } else {echo "<span style=\'display: inline-block; border: solid white 2px; padding: 4px; border-radius: 3px; background: white; color: green;\' onmouseover=\'document.getElementById(\"".$tid."\").style.visibility = \"visible\"; this.style.borderColor = \"green\";\' onmouseout=\'document.getElementById(\"".$tid."\").style.visibility = \"hidden\"; this.style.borderColor = \"white\";\'>".$message."</span><br><br></div>";


 }


}

$sql="SELECT * FROM users WHERE username = ('".$value."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$blocklist = $row['blocklist'];
$istyping = $row['istyping'];
$profpic = $row['profpic'];




$publicinfo = htmlspecialchars($row['publicinfo'], ENT_QUOTES);
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






}


if (strpos($blocklist, "$".$username."$") !== false) {
echo "You are currently blocked by <font color=\'green\'>".ucfirst($value)."</font>";
}


echo "';";

if (!empty($publicinfo)){
echo "document.getElementById(\"topinfo".$value."\").innerHTML = \"".$publicinfo."\"; ";
}
if (!empty($profpic)){
echo "document.getElementById(\"topimg".$value."\").src = \"users/".$value."/images/".$profpic."\"; ";
}
echo "document.getElementById(\"topimg".$value."\").style.visibility = \"visible\";";

if ($istyping == 'yes'){
echo "document.getElementById('istyping".$value."').innerHTML = 'is typing..';";
} else {
echo "document.getElementById('istyping".$value."').innerHTML = '';";
}

echo "document.getElementById('".ucfirst($value)."this2').innerHTML = newthisvar;";
echo "newthisvar = document.getElementById('".ucfirst($value)."this2').innerHTML;";


echo "if (newoldvar != newthisvar){document.getElementById(\"zest\").innerHTML =  eval('var elem = document.getElementById(\"heightme".$value."\"); document.getElementById(\"".ucfirst($value)."this\").innerHTML = thisvar; thisvar = document.getElementById(\"".ucfirst($value)."this\").innerHTML; elem.scrollTop = elem.scrollHeight;'); }";

}
echo "</script>";

}


if (isset($_GET['m'])){
$name = $_GET['n'];

$curmessage = mysql_escape_string($_GET['m']);
mysql_query("INSERT INTO messages (susername, rusername, message, time) VALUES ('".$username."', '".$name."', '".$curmessage."', '".$time."' )");
}

if (isset($_GET['n'])){
$name = $_GET['n'];

$sql="SELECT * FROM messages WHERE ((susername = '".$name."' AND rusername = '".$username."') or (susername = '".$username."' AND rusername = '".$name."')) AND hidefrom NOT LIKE ('%$".$username."$%') order by ID asc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
if ($username != $row['susername']){
echo "<div style='float: left;'>";
}
if ($username == $row['susername']){
echo "<div style='float: right; padding-bottom: 17px;'>";
}

$tid = $row['id'];
if ($username == $row['susername']){echo "<font color='white' style='float: right;'> <span id='".$tid."' class='righttimebubble' style='visibility: hidden;' onmouseover='document.getElementById(\"".$tid."\").style.visibility = \"visible\";' onmouseout='document.getElementById(\"".$tid."\").style.visibility = \"hidden\";'><font>".$row['time']."&nbsp;</font></span>"; } else { echo "<font color='darkgreen'>"; }

echo "<b style='cursor: default;' onmouseover='document.getElementById(\"".$tid."\").style.visibility = \"visible\";' onmouseout='document.getElementById(\"".$tid."\").style.visibility = \"hidden\";'>".$row['susername']."</b></font>";

if ($username != $row['susername']){echo "<span id='".$tid."' class='lefttimebubble' style='visibility: hidden;' onmouseover='document.getElementById(\"".$tid."\").style.visibility = \"visible\";' onmouseout='document.getElementById(\"".$tid."\").style.visibility = \"hidden\";'><font>&nbsp;".$row['time']."</font></span>"; }

echo "<br>";
$message = htmlspecialchars($row['message'], ENT_QUOTES);
$message = str_replace("&lt;bra&gt;","<br>",$message);
$message = explode("<br>", $message);

$message2 = '';
foreach ($message as $be) {

$lines = explode("\n", wordwrap($be, 30));
$be = "";
foreach ($lines as $key) {
if (strlen($key) > 30) {$key = chunk_split($key, 30, "<br>");}
$be = $be.$key."<br>";
}
$message2 = $message2.$be;
}
$message = $message2;
if (endsWith($message, "<br>")){
$message = str_lreplace("<br>", "", $message);
}

if ($username == $row['susername']){echo "<span style='display: inline-block; border: solid green 2px; padding: 4px; border-radius: 3px; background: green; color: white; float: right;' onmouseover='document.getElementById(\"".$tid."\").style.visibility = \"visible\"; this.style.borderColor = \"white\";' onmouseout='document.getElementById(\"".$tid."\").style.visibility = \"hidden\"; this.style.borderColor = \"green\";'>".$message."</span><br></div>"; } else {echo "<span style='display: inline-block; border: solid white 2px; padding: 4px; border-radius: 3px; background: white; color: green;' onmouseover='document.getElementById(\"".$tid."\").style.visibility = \"visible\"; this.style.borderColor = \"green\";' onmouseout='document.getElementById(\"".$tid."\").style.visibility = \"hidden\"; this.style.borderColor = \"white\";'>".$message."</span><br><br></div>"; }

}

$sql="SELECT * FROM users WHERE username = ('".$name."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$blocklist = $row['blocklist'];
}


if (strpos($blocklist, "$".$username."$") !== false) {
echo "You are currently blocked by <font color='green'>".$name."</font>";
}


}


?>