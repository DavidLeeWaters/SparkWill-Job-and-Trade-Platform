<?php include "databaselogin.php"; session_start();?>


<script>
var showhere = window.location.href
showhere = showhere.replace("https://sparkwill.com/other.php?", "");
</script>

<?php
if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
echo "<scrip"."t>";
echo "if (!(window.frameElement)) {window.location = 'blank.php?page=other.php&'+showhere;}";
echo "</scrip"."t>";
}

if (isset($_GET['other'])){
$other = ($_GET['other']);



     $checkusername = mysql_query("SELECT * FROM users WHERE username = '".$other."'");
      
     if(mysql_num_rows($checkusername) == 1)
     { } else { echo '<script>window.location = "index.php";</script>'; }


} else { echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">'; }

?>

<link rel="icon" type="image/png" href="images/Logo.png" sizes="16x16">

<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/background.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/list.css">



<meta http-equiv="Content-Type" content="text/html; charset=utf8" />


<script>
 window.parent.document.title = "<?php echo ucfirst($other); ?>";
</script>
<body>
    <header>
      <div class="wrapper" style="padding-left: 0.2%;">
          <nav>
<img src="images/Logo.png" alt="Logo" height="40px" width="40px"></img>
<a class='maintabs' href="index.php">Home</a>

			
<?php 

if (!empty($_SESSION['loggedin'])){
include 'loggedinmenu.php';

} else {
echo "
<a class='maintabs' href='index.php?clickedhere=true&slogin=true'>Log In</a>
";
}

?>




          </nav>
      </div>
    </header>
<br><br>
<div>




<a class="newbutton" style="position: fixed; top: 1px; height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; float:left; color:white; cursor:pointer;" onclick="window.history.back();">Go Back</a>


<br><span id='maintitle' style='cursor: default; color: green; font-size: 25; ' onmouseover='this.style.color="white";' onmouseout='this.style.color="green";'><?php echo $other; ?></span>


<br>

<div style='margin-left: 15%; display: inline-block; '>

<button id='pbbutton' class='newbutton' style='background: green;' onclick='document.getElementById("displayarea").innerHTML = document.getElementById("pbinfo").innerHTML; this.style.backgroundColor = "green"; document.getElementById("exbutton").style.backgroundColor = "#00b33c"; document.getElementById("edbutton").style.backgroundColor = "#00b33c";'>Info</button>

<button id='exbutton' class='newbutton' onclick='document.getElementById("displayarea").innerHTML = document.getElementById("exinfo").innerHTML; this.style.backgroundColor = "green"; document.getElementById("pbbutton").style.backgroundColor = "#00b33c"; document.getElementById("edbutton").style.backgroundColor = "#00b33c";'>Experience</button>

<button id='edbutton' class='newbutton' onclick='document.getElementById("displayarea").innerHTML = document.getElementById("edinfo").innerHTML; this.style.backgroundColor = "green"; document.getElementById("pbbutton").style.backgroundColor = "#00b33c"; document.getElementById("exbutton").style.backgroundColor = "#00b33c";'>Education</button>


<?php

if ($username != $other && isset($username)){

$sql="SELECT * FROM users WHERE username = ('".$username."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$blocklist = $row['blocklist'];
}

}


$files = glob('users/'.$other.'/images/*');
foreach($files as $file){ 
  if(is_file($file))
    echo "<img id='displayedimage' src='".$file."' height='200px' width='200px' style='float: left; border: 3px ridge white; cursor: pointer;' onclick=\"document.getElementById('enlargedpicture').style.display=''; document.getElementById('picturefade').style.display='';\" onmouseover=\"this.style.border ='3px ridge green';\" onmouseout=\"this.style.border ='3px ridge white';\"></img><br><br><span id=\"displayarea\" style=\"background: white;\"></span></div>";
} 
if (!($file)) {
    echo "<img id='displayedimage' src='images/post/default.jpg' height='200px' width='200px' style='float: left; border: 3px ridge white; cursor: pointer; display: inline-block;' onclick=\"document.getElementById('enlargedpicture').style.display='';document.getElementById('picturefade').style.display='';\" onmouseover=\"this.style.border ='3px ridge green';\" onmouseout=\"this.style.border ='3px ridge white';\"></img><br><br><span id=\"displayarea\"></span></div>";
}




if ($username != $other && isset($username)){

$sql="SELECT * FROM users WHERE username = ('".$username."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$curfriends = $row['friends'];
$exists = 'false';
$blocked = 'false';
$curfriends2 = explode(",",$curfriends);
foreach ($curfriends2 as $key=>$value){

if ($value == $other or $other == $username){
$exists = 'true';
}

if (strpos($blocklist, "$".$other."$") !== false) {
$blocked = 'true';
}



}





echo "<div style='width: 200px; display: inline; float: right;'>";

echo "<a id='addcontact' class='newbutton' style='width: 100%; text-align: center; display: none; font-size: 14; font-weight: bold; float: right; color:white; cursor: pointer;' onclick='var xhttp; xhttp = new XMLHttpRequest(); xhttp.open(\"GET\", \"addcontactajax.php?other=".$other."\", true); xhttp.send(); xhttp.onreadystatechange = function() {if (xhttp.readyState == 4 && xhttp.status == 200) { var div = document.getElementById(\"bing\"); div.innerHTML = xhttp.responseText; var x = div.getElementsByTagName(\"script\"); for(var i=0;i<x.length;i++){eval(x[i].text);}}}'>Add Contact ".$other."</a>";
if ($exists != 'true'){echo "<scri"."pt>"."document.getElementById(\"addcontact\").style.display = '';"."</scri"."pt>";}

echo "<a id='deletecontact' class='newbutton' style='width: 100%; text-align: center; display: none; font-size: 14; font-weight: bold; float: right; color:white; cursor: pointer;' onclick='parent.close_popup(\"".$other."\"); var xhttp; xhttp = new XMLHttpRequest(); xhttp.open(\"GET\", \"deletecontactajax.php?other=".$other."\", true); xhttp.send(); xhttp.onreadystatechange = function() {if (xhttp.readyState == 4 && xhttp.status == 200) { var div = document.getElementById(\"bing\"); div.innerHTML = xhttp.responseText; var x = div.getElementsByTagName(\"script\"); for(var i=0;i<x.length;i++){eval(x[i].text);}}}'>Delete Contact ".$other."</a><br><br><br>";
if ($exists == 'true'){echo "<scri"."pt>"."document.getElementById(\"deletecontact\").style.display = '';"."</scri"."pt>";}


}

echo "<a id='blockcontact' class='newbutton' style='width: 100%; text-align: center; display: none; float: right; font-size: 14; font-weight: bold; color:white; cursor: pointer;' onclick='var xhttp; xhttp = new XMLHttpRequest(); xhttp.open(\"GET\", \"addblockajax.php?other=".$other."\", true); xhttp.send(); xhttp.onreadystatechange = function() {if (xhttp.readyState == 4 && xhttp.status == 200) { var div = document.getElementById(\"bing\"); div.innerHTML = xhttp.responseText; var x = div.getElementsByTagName(\"script\"); for(var i=0;i<x.length;i++){eval(x[i].text);}}}'>Block ".$other."</a>";
if ($blocked != 'true'){echo "<scri"."pt>"."document.getElementById(\"blockcontact\").style.display = '';"."</scri"."pt>";}


echo "<a id='unblockcontact' class='newbutton' style='width: 100%; text-align: center; display: none; float: right; font-size: 14; font-weight: bold; color:white; cursor: pointer;' onclick='var xhttp; xhttp = new XMLHttpRequest(); xhttp.open(\"GET\", \"unblockajax.php?other=".$other."\", true); xhttp.send(); xhttp.onreadystatechange = function() {if (xhttp.readyState == 4 && xhttp.status == 200) { var div = document.getElementById(\"bing\"); div.innerHTML = xhttp.responseText; var x = div.getElementsByTagName(\"script\"); for(var i=0;i<x.length;i++){eval(x[i].text);}}}'>UnBlock ".$other."</a>";
if ($blocked == 'true'){echo "<scri"."pt>"."document.getElementById(\"unblockcontact\").style.display = '';"."</scri"."pt>";}

}

echo "</div>";

if (isset($username) && $other != $username){
echo "
<br><button class='newbutton' style='position: fixed; margin-left: 15%; margin-top: 2px;' onclick='if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); parent.reply(\"".$other."\", \"".ucfirst($other)."\");'>Message</button>
";
}

$sql="SELECT * FROM users WHERE username = ('".$other."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$publicinfo = htmlspecialchars($row['publicinfo'], ENT_QUOTES);
$publicinfo = str_replace("&lt;br&gt;","<br>",$publicinfo);
$lines = explode("\n", wordwrap($publicinfo, 30));
$publicinfo = "";
foreach ($lines as $key) {
if (strlen($key) > 30) {$key = chunk_split($key, 30, "<br>");}
$publicinfo = $publicinfo.$key."<br>";
}
$experienceinfo = htmlspecialchars($row['experienceinfo'], ENT_QUOTES);
$experienceinfo = str_replace("&lt;br&gt;","<br>",$experienceinfo);
$lines = explode("\n", wordwrap($experienceinfo, 30));
$experienceinfo = "";
foreach ($lines as $key) {
if (strlen($key) > 30) {$key = chunk_split($key, 30, "<br>");}
$experienceinfo = $experienceinfo.$key."<br>";
}
$educationinfo = htmlspecialchars($row['educationinfo'], ENT_QUOTES);
$educationinfo = str_replace("&lt;br&gt;","<br>",$educationinfo);
$lines = explode("\n", wordwrap($educationinfo, 30));
$educationinfo = "";
foreach ($lines as $key) {
if (strlen($key) > 30) {$key = chunk_split($key, 30, "<br>");}
$educationinfo = $educationinfo.$key."<br>";
}
echo "<center style='padding-top: 10px;'><div id='pbinfo' style='display: none; border-radius: 5px; background: white; width: 300px;'>".$publicinfo."</div><br><div id='exinfo' style='display: none; border-radius: 5px; background: white; background: white; width: 300px;'>".$experienceinfo."</div><br><div id='edinfo' style='display: none; border-radius: 5px; background: white; background: white; width: 300px;'>".$educationinfo."</div></center>";

}



echo "<scr"."ipt>";
echo "if (document.getElementById('pbinfo').innerHTML == '<br>'){ document.getElementById('pbinfo').style.backgroundColor = 'transparent';}";
echo "if (document.getElementById('exinfo').innerHTML == '<br>'){ document.getElementById('exinfo').style.backgroundColor = 'transparent';}";
echo "if (document.getElementById('edinfo').innerHTML == '<br>'){ document.getElementById('edinfo').style.backgroundColor = 'transparent';}";
echo "window.onload = document.getElementById('displayarea').innerHTML = document.getElementById('pbinfo').innerHTML;";
echo "</scr"."ipt>";




echo "<br><div id='bing' style='display: none;'></div>";



?>


<div id='picturefade' class='newblack_overlay' style='display: none;' onclick = "document.getElementById('enlargedpicture').style.display='none';document.getElementById('picturefade').style.display='none';"></div> 

<div id="enlargedpicture" class="newwhite_content" style="background: none; border: none; position: fixed; text-align: center; width: 400px; height: 400px; top: 10%; left: 33%; display: none;">

<img id='todisplay' src='' height='100%' width='100%' style='border-radius: 3%;'></img>

<script>
document.getElementById('todisplay').src = document.getElementById('displayedimage').src;
</script>

</div>




<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>



<div style="clear: both;"> </div>

</div>



</div>

</body>
</html>






<script>
if (window.frameElement) {
  window.parent.history.replaceState('Object', 'Title', '/blank.php?page=other.php&other=<?php echo $other; ?>');
document.getElementById('pbinfo').style.marginLeft = '2.5%';
document.getElementById('exinfo').style.marginLeft = '2.5%';
document.getElementById('edinfo').style.marginLeft = '2.5%';
}
document.getElementById('maintitle').style.marginLeft = '15.1%';
window.onload = document.body.style.background = 'lightgreen';
</script>