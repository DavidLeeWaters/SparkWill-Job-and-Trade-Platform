<?php include "databaselogin.php"; session_start(); ?>
<link rel="stylesheet" type="text/css" href="css/gallery.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/background.css">
<link rel="stylesheet" type="text/css" href="css/list.css">
<link rel="icon" type="image/png" href="images/Logo.png" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />

<script>
var showhere = window.location.href;
showhere = showhere.replace("https://sparkwill.com/content.php?", "");
var picnum = '';
</script>


<?php
if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
echo "<scri"."pt>";
echo "if (!(window.frameElement)) {window.location = 'blank.php?page=listing.php&'+showhere;}";
echo "</scri"."pt>";
}
?>

<script>
if (window.frameElement) {
  window.parent.history.replaceState('Object', 'Title', 'blank.php?page=listing.php&'+showhere);
}
</script>


<?php
$title = ($_GET['title']);
?>

<title><?php echo urldecode($title); ?></title>   
	
<script>
 window.parent.document.title = "<?php echo urldecode($title); ?>";
</script>
    <header>
      <div class="wrapper" onclick="document.getElementById('showlight').style.visibility ='hidden'; document.getElementById('show').style.visibility ='hidden';">
          <nav style="">
<img src="images/Logo.png" alt="Logo" height="40px" width="40px"></img>
<a class='maintabs' href="index.php?clickedhere=true">Home</a>

			
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


		
      <div class="wrapper">

     




<br>



<div id="contentwrap">
 
 


<div style="clear: both;"> </div>

</div>





</div>
    </section>
</div>






<?php 
$title = ($_GET['title']);
$id = ($_GET['id']);
if (!empty($_GET['section'])){
$section = ($_GET['section']);
} else {
$section = ($_SESSION['section']);
}

$sql="SELECT * FROM postings WHERE title = ('$title') and id = ('$id') ORDER BY id asc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$state = ($row['state']);
$address = ($row['address']);
$section = ($row['section']);
$semail = ($row['semail']);
$temail = ($row['email']);
$type = ($row['type']);
$pay = ($row['pay']);
$showid = ($row['id']);
$picnames = ($row['picnames']);
$filename2 = explode(",",$picnames);
$other = $row['username'];


if ($_GET['justposted']=='yes'){
echo '<a class="newbutton" style="position: fixed; top: 1px; height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; float:left; color:white; cursor:pointer;" onclick="window.location = \'list.php?section='.$section.'\';">Go Back</a>';
} else {
echo '<a class="newbutton" style="position: fixed; top: 1px; height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; float:left; color:white; cursor:pointer;" onclick="window.history.back();">Go Back</a>';
}
echo "<center>";

if ($_SESSION['username']==($row['username'])){

}



if (isset($_SESSION['username'])){ 

echo "
<div id='showlight' class='bello_overlay' style=\"visibility:hidden;\"; onclick=\"showsearch.value = ''; document.getElementById('showresults').innerHTML = ''; document.getElementById('showlight').style.visibility ='hidden'; document.getElementById('show').style.visibility ='hidden';\"></div>
<span id=\"show\" style=\"text-align: center; border-radius: 5px; border: solid 2px green; height: 200px; width: 300px; background: white; visibility: hidden; position: fixed; z-index: 1060; top: 7%; right: 0.3%; opacity: 1.0; overflow-y: auto;\">
";

echo "
<style>
#showsearch {
    background: green;
    color: white;
    outline: none !important;
    border: 2px solid white;
}
#showsearch:focus {
    outline: none !important;
    border: 2px solid lime;
}
</style>
<span style='cursor: default;'>Person:</span><br><textarea id='showsearch' rows='1' cols='30' style='text-align: center; padding: 2px; resize: none;' onmouseover='this.focus();' onmouseout=''></textarea>
";

echo "<br><span id='showresults' style='overflow-y: auto;'>";

echo "</span></span>";

echo "<scr"."ipt>";
echo "var showsearch = document.getElementById('showsearch'); showsearch.oninput= function(){curshow = showsearch.value; showsearcher();}";
echo "</scr"."ipt>";
}

echo "</center>";










$content = $row['id'];
echo "<p id='contentbox' style=''>";
if (isset($_SESSION['username'])){echo "<scr"."ipt>document.getElementById('contentbox').style.paddingRight = '27%';</scr"."ipt>";}




echo '
<center>
';

echo '
<span style="margin-left: ';

if (isset($_SESSION['username']) && $other == $username){
echo '10px';
}
if (isset($_SESSION['username']) && $other != $username){
echo '-100px';
}
if (!isset($_SESSION['username'])){
echo '10px';
}

echo ';">
<div id="fb-root" style="display: none;"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1725123037768359";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>


<div id="fbshare" class="fb-share-button" data-href="https://sparkwill.com/content.php?title='.urlencode($title).'&id='.$id.'" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://sparkwill.com/content.php?title='.urlencode($title).'&id='.$id.'&amp;src=sdkpreparse"></a></div>
</span>
';

echo '
<img class="xrox" id="xrox1" src="images/start.png" onclick="if (speechSynthesis.speaking === false){window.speechSynthesis.speak(text);}">
<img class="xrox" id="xrox2" src="images/pause.png" onclick="window.speechSynthesis.pause();">
<img class="xrox" id="xrox3" src="images/play.png" onclick="window.speechSynthesis.resume();">
<img class="xrox" id="xrox4" src="images/stop.png" onclick="window.speechSynthesis.cancel();">

';


echo '
<div id="xnote" style="font-size: 150%; position: fixed; background: black; color: white; display: none; opacity: 0.8;"></div>
<script>
function xrox1on() {
document.getElementById("xnote").innerHTML = "Read Aloud";
document.getElementById("xnote").style.display = "block";
document.getElementById("xnote").style.top = (document.getElementById("xrox1").offsetTop + document.getElementById("xrox1").clientHeight);
document.getElementById("xnote").style.left = document.getElementById("xrox1").offsetLeft;
}
function xrox1off() {
document.getElementById("xnote").style.display = "none";
}
document.getElementById("xrox1").addEventListener("mouseover", xrox1on);
document.getElementById("xrox1").addEventListener("mouseout", xrox1off);

function xrox2on() {
document.getElementById("xnote").innerHTML = "Pause";
document.getElementById("xnote").style.display = "block";
document.getElementById("xnote").style.top = (document.getElementById("xrox2").offsetTop + document.getElementById("xrox2").clientHeight);
document.getElementById("xnote").style.left = document.getElementById("xrox2").offsetLeft;
}
function xrox2off() {
document.getElementById("xnote").style.display = "none";
}
document.getElementById("xrox2").addEventListener("mouseover", xrox2on);
document.getElementById("xrox2").addEventListener("mouseout", xrox2off);

function xrox3on() {
document.getElementById("xnote").innerHTML = "Play";
document.getElementById("xnote").style.display = "block";
document.getElementById("xnote").style.top = (document.getElementById("xrox3").offsetTop + document.getElementById("xrox3").clientHeight);
document.getElementById("xnote").style.left = document.getElementById("xrox3").offsetLeft;
}
function xrox3off() {
document.getElementById("xnote").style.display = "none";
}
document.getElementById("xrox3").addEventListener("mouseover", xrox3on);
document.getElementById("xrox3").addEventListener("mouseout", xrox3off);

function xrox4on() {
document.getElementById("xnote").innerHTML = "Stop";
document.getElementById("xnote").style.display = "block";
document.getElementById("xnote").style.top = (document.getElementById("xrox4").offsetTop + document.getElementById("xrox4").clientHeight);
document.getElementById("xnote").style.left = document.getElementById("xrox4").offsetLeft;
}
function xrox4off() {
document.getElementById("xnote").style.display = "none";
}
document.getElementById("xrox4").addEventListener("mouseover", xrox4on);
document.getElementById("xrox4").addEventListener("mouseout", xrox4off);
</script>

';


if ($type == 'job' && !isset($_SESSION['username'])){
echo '<button id="nappbutton" class="redbutton" style="margin-left: 5%; position: fixed; display: block;" onclick="window.location = \'https://sparkwill.com/index.php?ssignup=true\';">Apply</button>';
}

if (isset($_SESSION['username'])){ 
echo '<img class="xrox" id="xrox5" src="images/show.png" onclick="document.getElementById(\'showlight\').style.visibility =\'visible\'; document.getElementById(\'show\').style.visibility =\'visible\'; curshow = \'\'; showsearcher(); document.getElementById(\'showsearch\').focus();" style="margin-left: 0.5%;">';

echo '
<script>
function xrox5on() {
document.getElementById("xnote").innerHTML = "Show";
document.getElementById("xnote").style.display = "block";
document.getElementById("xnote").style.top = (document.getElementById("xrox5").offsetTop + document.getElementById("xrox5").clientHeight);
document.getElementById("xnote").style.left = document.getElementById("xrox5").offsetLeft;
}
function xrox5off() {
document.getElementById("xnote").style.display = "none";
}
document.getElementById("xrox5").addEventListener("mouseover", xrox5on);
document.getElementById("xrox5").addEventListener("mouseout", xrox5off);
</script>
';

$applicants = $row['applicants'];
if (strpos($applicants, "$".$username."$") !== false OR strpos($applicants, "$".$username."-") !== false) {
if ($type == 'job'){
echo '<button id="cappbutton" class="redbutton" style="margin-left: 5%; position: fixed; display: block;" onclick="apply(\''.$row['id'].'\',\'no\')">Cancel Application</button>';
echo '<button id="appbutton" class="newbutton" style="margin-left: 5%; position: fixed; display: none;" onclick="apply(\''.$row['id'].'\',\'yes\')">Apply</button>';
}
if ($type == 'trade' && $section != 'wanted'){
echo '<button id="cbidbutton" class="redbutton" style="margin-left: 15%; position: fixed; display: block;" onclick="bid(\''.$row['id'].'\',\'no\')">Cancel Bid</button>';
echo '<button id="bidbutton" class="newbutton" style="margin-left: 15%; position: fixed; display: none;" onclick="bid(\''.$row['id'].'\',\'yes\')">Bid</button>';
echo '<font id="moneysign" style="margin-left: 3%; position: fixed; color: green; font-size: 38; display: none;">$</font><input type="text" id="textbid" style="border: 1px solid lightgreen; color: green; font-size: 38; margin-left: 5%; height: 42px; width: 10%; float: left; position: fixed; display: none;" onmouseover="this.focus();" onmouseout="document.getElementById(\'textbid\').blur();">';
}
} else {
if ($type == 'job'){
if ($_SESSION['username']!=$other){
echo '<button id="cappbutton" class="redbutton" style="margin-left: 5%; position: fixed; display: none;" onclick="apply(\''.$row['id'].'\',\'no\')">Cancel Application</button>';
echo '<button id="appbutton" class="newbutton" style="margin-left: 5%; position: fixed; display: block;" onclick="apply(\''.$row['id'].'\',\'yes\')">Apply</button>';
}
}
if ($type == 'trade' && $section != 'wanted'){
if ($_SESSION['username']!=$other){
echo '<button id="cbidbutton" class="redbutton" style="margin-left: 15%; position: fixed; display: none;" onclick="bid(\''.$row['id'].'\',\'no\')">Cancel Bid</button>';
echo '<button id="bidbutton" class="newbutton" style="margin-left: 15%; position: fixed; display: block;" onclick="bid(\''.$row['id'].'\',\'yes\')">Bid</button>';
echo '<font id="moneysign" style="margin-left: 3%; position: fixed; color: green; font-size: 38; display: block;">$</font><input type="text" id="textbid" style="border: 1px solid lightgreen; color: green; font-size: 38; margin-left: 5%; height: 42px; width: 10%; float: left; position: fixed; display: block;" onmouseover="this.focus();" onmouseout="document.getElementById(\'textbid\').blur();">';
}
}


}



}

if (isset($username) && $other != $username){
echo "
<button class='newbutton' style='position: absolute;' onclick='if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); parent.reply(\"".$other."\", \"".ucfirst($other)."\");'>Message</button>
";
}

echo "<br><font color='red' size='6'>".urldecode($title)."</font><br>";
echo "<font color='green' size='4'>".urldecode($pay)."</font><br>";
echo "<a style='color: darkgreen; text-decoration: none; background: lightgreen;' href='other.php?other=".$other."'><b>".$other."</b></a><br>";
if ($semail != ''){
echo "<span id='temail' onclick='document.getElementById(\"mailback\").style.display = \"block\"; document.getElementById(\"mailbox\").style.display = \"block\"; document.getElementById(\"temailtxt\").focus(); document.getElementById(\"temailtxt\").select();' style='cursor: pointer;'><font color='green' size='3'>".$temail."</font></span><br>";
}
$realcontent = ($row['content']);
$realcontent = str_replace("&lt;br&gt;","<br>",$realcontent);
echo "<font size='4' id='speakme'>".urldecode($realcontent)."</font>";


echo "</p>";


$num = 0;

foreach ($filename2 as $file){
$num++;
if ($file == 'default.jpg'){ echo "
<img id='".$num."' src=\"images/post/default.jpg\" width='250' height='250' style='cursor: pointer; margin: 20px; border: 1px solid white;' onclick=\"picnum = ".$num."; document.getElementById('todisplay').src = this.src; document.getElementById('enlargedpicture').style.display=''; document.getElementById('picturefade').style.display='';\" onmouseover=\"this.style.border ='1px solid green';\" onmouseout=\"this.style.border ='1px solid white';\">
";
} else { echo "
<img id='".$num."' src=\"images/post/$showid/$file\" width='250' height='250' style='cursor: pointer; margin: 20px; border: 1px solid white;' onclick=\"picnum = ".$num."; document.getElementById('todisplay').src = this.src; document.getElementById('enlargedpicture').style.display=''; document.getElementById('picturefade').style.display='';\" onmouseover=\"this.style.border ='1px solid green';\" onmouseout=\"this.style.border ='1px solid white';\">
";
}
}

echo "<scr"."ipt>";
echo "var numcount = ".$num.";";
echo "</scr"."ipt>";








if ($address!=''){


echo '
<div id="amap">
<button id="amapbutton" class="newbutton">Show Map of Address</button>
</div>
';


echo '
<script>
document.getElementById("amapbutton").addEventListener("click", function(){
    
document.getElementById("amap").innerHTML = "<iframe id=\'map\' width=\'100%\' height=\'93.5%\' frameborder=\'0\' style=\'border:0%; margin-top: 42px;\' src=\'https://www.google.com/maps/embed/v1/search?q='.$address.'&key=AIzaSyAPLAWdGqx-mJhXcJyKUVdg0gG7PJfbdk4\' allowfullscreen></iframe>";

});
</script>
';



}





echo "</center>";



}

 ?>


















<div id='picturefade' class='newblack_overlay' style='display: none;' onclick = "document.getElementById('enlargedpicture').style.display='none';document.getElementById('picturefade').style.display='none';"></div> 

<div id="enlargedpicture" class="newwhite_content" style="background: none; border: none; position: fixed; text-align: center; width: 100%; height: 500px; top: 10%; left: 0%; display: none;" onclick = "document.getElementById('enlargedpicture').style.display='none';document.getElementById('picturefade').style.display='none';">

<?php
if ($num == 1){
} else {

echo "
<button id='backbutton' class='newbutton' style='display: inline; vertical-align: middle; top: 50%; width: 100px' onclick='if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); if (document.getElementById((picnum - 1))){picnum = (picnum - 1); document.getElementById(\"todisplay\").src = document.getElementById(picnum).src;} else {picnum = numcount; document.getElementById(\"todisplay\").src = document.getElementById(picnum).src;}'>Back</button>
";
}

?>

<img id='todisplay' src='' height='100%' width='500px' style='display: inline; vertical-align: middle; border-radius: 3%;' onclick='if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation();'></img>

<?php
if ($num == 1){
} else {

echo "
<button id='nextbutton' class='newbutton' style='display: inline; vertical-align: middle; top: 50%; width: 100px' onclick='if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); if (document.getElementById((picnum + 1))){picnum = (picnum + 1); document.getElementById(\"todisplay\").src = document.getElementById(picnum).src;} else {picnum = 1; document.getElementById(\"todisplay\").src = document.getElementById(picnum).src;}'>Next</button>
";
}

?>

</div>




<style>
.xrox {
 height: 40px;
 width: 40px;
}
</style>
<script>
var title = '<?php echo urlencode($title); ?>';
var content = '<?php echo $content; ?>';
</script>
<script>
window.speechSynthesis.cancel();
var person = document.getElementById('speakme').textContent;
var text = new SpeechSynthesisUtterance(person);
</script>

<script>
var title = '<?php echo urlencode($title); ?>';
var content = '<?php echo $content; ?>';


function showsearcher(){
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("showresults")
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }

  xhttp.open("GET", "showsearchajax.php?s="+curshow+"&t="+title+"&c="+content, true);
  xhttp.send();
                        }


function showsearcher2(searchuser){
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("showresults")
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }
  xhttp.open("GET", "showsearchajax.php?n="+searchuser+"&t="+title+"&c="+content, true);
  xhttp.send();
                                   }



function apply(id,yn){
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("appresults")
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }
xhttp.open("GET", "applyajax.php?id="+id+"&yn="+yn, true);
xhttp.send();
}

function bid(id,yn){
var money = document.getElementById("textbid").value;
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("appresults")
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }
xhttp.open("GET", "bidajax.php?id="+id+"&yn="+yn+"&money="+money, true);
xhttp.send();
}


</script>
<div id="appresults" style="display: none;"></div>


<?php
if ($semail == 'yes'){

echo '<style>
#mailbox{
display: none;
position: fixed;
z-index: 1900;
border: 1px solid green; 
background: lightgreen; 
font-size: 200%;
width: 200px;
}
.mailboxlink{
color: darkgreen;
}
.mailboxlink:hover{
color: red;
}
.mailboxlink:visited{
text-decoration: none;
}
</style>';

echo '<div id="mailbox">';

echo '<a target="_blank" class="mailboxlink" href="https://mail.live.com/default.aspx?rru=compose&amp;to='.$temail.'&amp;subject='.urldecode($title).'" onclick="document.getElementById(\'mailbox\').style.display=\'none\'; document.getElementById(\'mailback\').style.display=\'none\'">Hotmail</a><br>';

echo '<a target="_blank" class="mailboxlink" href="http://compose.mail.yahoo.com/?to='.$temail.'&amp;subj='.urldecode($title).'" onclick="document.getElementById(\'mailbox\').style.display=\'none\'; document.getElementById(\'mailback\').style.display=\'none\'">Yahoo</a><br>';

echo '<a target="_blank" class="mailboxlink" href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to='.$temail.'&amp;su='.urldecode($title).'" onclick="document.getElementById(\'mailbox\').style.display=\'none\'; document.getElementById(\'mailback\').style.display=\'none\'">Gmail</a><br>';
        
echo '<a target="_blank" class="mailboxlink" href="https://mail.live.com/default.aspx?rru=compose&amp;to='.$temail.'&amp;subject='.urldecode($title).'" onclick="document.getElementById(\'mailbox\').style.display=\'none\'; document.getElementById(\'mailback\').style.display=\'none\'">Outlook</a><br>';

echo '<a target="_blank" class="mailboxlink" href="https://mail.live.com/default.aspx?rru=compose&amp;to='.$temail.'&amp;subject='.urldecode($title).'" onclick="document.getElementById(\'mailbox\').style.display=\'none\'; document.getElementById(\'mailback\').style.display=\'none\'">Live</a><br>';

echo '<a target="_blank" class="mailboxlink" href="http://mail.aol.com/mail/compose-message.aspx?to='.$temail.'&amp;subject='.urldecode($title).'" onclick="document.getElementById(\'mailbox\').style.display=\'none\'; document.getElementById(\'mailback\').style.display=\'none\'">AOL</a><br>';

echo '
<span style="font-size: 20px; color: darkgreen;" onclick="document.getElementById(\'temailtxt\').select(); document.execCommand(\'copy\');">Copy and Paste</span><br>
<input type="text" id="temailtxt" value="'.$temail.'" style="font-size: 15px;" onfocus="this.select(); document.execCommand(\'copy\');">
';

echo '</div>';

echo '<script>
document.getElementById("mailbox").style.top = document.getElementById("temail").offsetTop;
document.getElementById("mailbox").style.left = document.getElementById("temail").offsetLeft;
</script>';
}
?>


<div id='mailback' class='newblack_overlay' style='display: none; z-index: 1800;' onclick = "document.getElementById('mailbox').style.display='none'; document.getElementById('mailback').style.display='none'"></div> 






<?php

if ($_GET['justposted']=='yes' && $section != 'wanted' && $type == 'trade'){

echo "

<div id='mbox' style='width:400px; border: 2px solid black; cursor: default; position:fixed; top: 100px; left: 60%; z-index: 1600;'>
<div style='width: 100%; height: 40px; background-color: lightgreen; text-align: center; color: green; font-weight: bold; cursor: move;'>
<span style='font-size: 200%;'>
Sale Matches
</span>
<a style='cursor: pointer; font-size: 20; color: white; float: right;' onMouseOver='this.style.color=\"black\";' onMouseOut='this.style.color=\"white\";' onclick='document.getElementById(\"mbox\").style.display = \"none\";'> &#10005;</a>
</div>
<div id='lowermboxcontextMenu' style='width: 100%; background-color: white; height: 370px; text-align: center; overflow: auto;'>
";

$c123 = 0;


$parts = explode('+',$title);
$nlist = '';

foreach($parts as $partkey) {    
if ($partkey != 'is' && $partkey != 'a' && $partkey != 'and' && $partkey != 'if' && $partkey != 'or' && $partkey != 'but' && $partkey != 'the'){

$sql="SELECT * FROM postings WHERE title LIKE '%".$partkey."%' AND title != '".$title."' AND section = 'wanted' AND username != '".$username."' AND state = '".$state."' ";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$ntitle = ($row['title']);

$nsearchme = (','.$ntitle);
if (strpos($nlist, $nsearchme) === false) {
$nlist = $nlist.$nsearchme;


$nid = ($row['id']);
$npicnames = ($row['picnames']);
$nfilename2 = explode(",",$npicnames);
$nfile = $nfilename2[0];

if ($nfile == 'default.jpg'){ echo "
<img src='images/post/default.jpg' width='50' height='50' style='vertical-align: middle; cursor: pointer; border: 1px solid white;' onclick='window.parent.document.getElementById(\"man\").src = \"content.php?title=".urlencode($ntitle)."&id=".$nid."\";' onmouseover='this.style.border =\"1px solid green\";' onmouseout='this.style.border =\"1px solid white\";'>
";
} else { echo "
<img src='images/post/".$nid."/".$nfile."' width='50' height='50' style='vertical-align: middle; cursor: pointer; border: 1px solid white;' onclick='window.parent.document.getElementById(\"man\").src = \"content.php?title=".urlencode($ntitle)."&id=".$nid."\";' onmouseover='this.style.border =\"1px solid green\";' onmouseout='this.style.border =\"1px solid white\";'>
";
}





echo "<span style='color: green; cursor: pointer;' onmouseover='this.style.color= \"red\";' onmouseout='this.style.color = \"green\";' onclick='window.parent.document.getElementById(\"man\").src = \"content.php?title=".urlencode($ntitle)."&id=".$nid."\";'>".$ntitle."</span><br>";
$c123 = ($c123 + 1);

}



}
}


}





echo "</div></div>

<script>

var mboxcontextmenu = document.getElementById('mbox');
var lowermboxcontextmenu = document.getElementById('lowermboxcontextMenu');
var initX, initY, mousePressX, mousePressY;

lowermboxcontextmenu.addEventListener('mousedown', function(event) {
event.stopPropagation();
}, false);
mboxcontextmenu.addEventListener('mousedown', function(event) {

	initX = this.offsetLeft;
	initY = this.offsetTop;
	mousePressX = event.clientX;
	mousePressY = event.clientY;

	this.addEventListener('mousemove', repositionElement, false);

	window.addEventListener('mouseup', function() {
	  mboxcontextmenu.removeEventListener('mousemove', repositionElement, false);
	}, false);

}, false);

function repositionElement(event) {
	this.style.left = initX + event.clientX - mousePressX + 'px';
	this.style.top = initY + event.clientY - mousePressY + 'px';
}

";




if ($c123 == 0){
echo "document.getElementById('mbox').style.display = 'none';";
} else {
echo "document.getElementById('mbox').style.display = 'block';";
}




echo "</script>";







}









?>