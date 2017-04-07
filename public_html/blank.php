<?php include "databaselogin.php"; session_start(); if(!isset($_SESSION['loggedin'])){header("Location: index.php");} ?>

<link rel="icon" type="image/png" href="images/Logo.png" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />

<?php 
$page = '';
if (isset($_GET['page'])){
$page = "?page=".($_GET['page']);
}
if (isset($_GET['other'])){
$page = "?page=".($_GET['page'])."&other=".($_GET['other']);
}
if (isset($_GET['section']) && isset($_GET['type'])){
$page = "?page=".($_GET['page'])."&section=".($_GET['section'])."&type=".($_GET['type']);
}


if (isset($_GET['title']) && isset($_GET['id'])){
$title = urlencode(urlencode($_GET['title']));
$page = "?page=".($_GET['page'])."&title=".$title."&id=".($_GET['id']);
}








include "css/newchat.css";
include 'js/newchat.php';
include "newchat.php";
echo "
<style>
body {
    margin: 0;
}
</style>
<iframe id='man' src='blankscript.php".$page."' style='width: 85%; height: 100%' frameBorder='0'></iframe>
<fish>
</fish>
";

if ($page == "?page=postjob.php"){echo "<scri"."pt>"; echo "document.getElementById('man').src = 'postjob.php'"; echo "</scri"."pt>";}
if ($page == "?page=createskills.php"){echo "<scri"."pt>"; echo "document.getElementById('man').src = 'createskills.php'"; echo "</scri"."pt>";}
if ($page == "?page=createresume.php"){echo "<scri"."pt>"; echo "document.getElementById('man').src = 'createresume.php'"; echo "</scri"."pt>";}
if ($page == "?page=new.php"){echo "<scri"."pt>"; echo "document.getElementById('man').src = 'new.php'"; echo "</scri"."pt>";}
if ($page == "?page=resumes.php"){echo "<scri"."pt>"; echo "document.getElementById('man').src = 'resumes.php'"; echo "</scri"."pt>";}
if ($page == "?page=localrestaurants.php"){echo "<scri"."pt>"; echo "document.getElementById('man').src = 'localrestaurants.php'"; echo "</scri"."pt>";}
if ($page == "?page=index.php"){echo "<scri"."pt>"; echo "document.getElementById('man').src = 'index.php'"; echo "</scri"."pt>";}



?>













<?php

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



$sql="SELECT * FROM messages WHERE (rusername = '".$username."' AND seen != 'yes') order by ID asc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$friend=($row['susername']);

$sql="SELECT blocklist FROM users WHERE (username = '".$username."') order by ID asc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$yourblocklist = $row['blocklist'];
}

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

















<div id="mime" style="display: none;"></div>
<div id="checkonline" style="display: none;"></div>
<div id="nmstay" style="display: none;"></div>

<?php
$_SESSION['curfriends'] = $friends;
?>


<script>
function mimecall(){
var xhttp; 
xhttp = new XMLHttpRequest();
xhttp.open("GET", "newmessageajax.php", true);
xhttp.send();
xhttp.onreadystatechange = function() { if (xhttp.readyState == 4 && xhttp.status == 200) {
 var div = document.getElementById("mime");
 div.innerHTML = xhttp.responseText;

if (div.innerHTML != ''){document.getElementById("nmstay").innerHTML = document.getElementById("nmstay").innerHTML + div.innerHTML;}

 var x = div.getElementsByTagName("script");
 for(var i = 0; i<x.length; i++){ eval(x[i].text); }
}
}
}
setInterval(function(){ mimecall(); }, 3000);

function contactcall(){
var xhttp; 
xhttp = new XMLHttpRequest();
xhttp.open("GET", "updatecontactajax.php", true);
xhttp.send();
xhttp.onreadystatechange = function() { if (xhttp.readyState == 4 && xhttp.status == 200) {
   
   if (xhttp.responseText != 'undefined'){document.getElementById("chat-sidebar").innerHTML = xhttp.responseText;}
   
var x = document.getElementById("chat-sidebar").getElementsByTagName("script");
 for(var i = 0; i<x.length; i++){ eval(x[i].text); }

}
}
}
setInterval(function(){ contactcall(); }, 5000);

function onlinecall(){
var xhttp; 
xhttp = new XMLHttpRequest();
xhttp.open("GET", "checkonlineajax.php", true);
xhttp.send();
xhttp.onreadystatechange = function() { if (xhttp.readyState == 4 && xhttp.status == 200) {
   
   if (xhttp.responseText != 'undefined'){document.getElementById("checkonline").innerHTML = xhttp.responseText;}
   
 var div = document.getElementById("checkonline");
 div.innerHTML = xhttp.responseText;
 var x = div.getElementsByTagName("script");
 for(var i = 0; i<x.length; i++){ eval(x[i].text); }

}}
}
setInterval(function(){ onlinecall(); }, 5000);
</script>