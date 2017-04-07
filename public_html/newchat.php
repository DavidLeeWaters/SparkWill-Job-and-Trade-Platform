<?php session_start();


if (!isset($_SESSION['loggedin'])){
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
exit();
} else {
$username = $_SESSION['username'];
}



$sql="SELECT * FROM users WHERE username = ('$username') ORDER BY id asc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$friends=($row['friends']);
$state=($row['state']);
$area=($row['area']);
if ($friends != '') {
$friends2 = explode(",",$friends);
}
}
?>

<script>
  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

<div id="dnotif" style="display: none;"></div>
<div id="zest" style="display: none;"></div>
<div id="mgo" style="display: none;"></div>
<div id="mstop" style="display: none;"></div>
<header id="sideheaderid" style="cursor: default; color: white; font-size: 30; text-align: center;">

<img id='magnify' src='images/magnifying.png' style='padding-top: 2%; height:32px; width:32px; float: left;' onmouseover="this.src='images/onmagnifying.png'; document.getElementById('magnifynote').style.display='block';" onmouseout="this.src='images/magnifying.png'; document.getElementById('magnifynote').style.display='none';"></img>

<span class='lefttoptimebubble' id='magnifynote' style='position: fixed; margin-top: 45px; float: left; opacity: 0.8; font-size: 20; display: none; background: black; color: white; border-radius: 3px;' onmouseover='document.getElementById("magnify").src="images/onmagnifying.png"; this.style.display = "block";' onmouseout='document.getElementById("magnify").src="images/magnifying.png"; this.style.display = "none";' onclick="if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation();">Find People</span>

<img id='addperson' src='images/addperson.png' style='padding-top: 2%; height:32px; width:32px; float: left;' onmouseover="this.src='images/onaddperson.png'; document.getElementById('personnote').style.display='block';" onmouseout="this.src='images/addperson.png'; document.getElementById('personnote').style.display='none';"></img>

<span class='twolefttoptimebubble' id='personnote' style='position: fixed; margin-top: 45px; float: left; opacity: 0.8; font-size: 20; display: none; background: black; color: white; border-radius: 3px;' onmouseover='document.getElementById("addperson").src="images/onaddperson.png"; this.style.display = "block";' onmouseout='document.getElementById("addperson").src="images/addperson.png"; this.style.display = "none";' onclick="if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation();">Add a Person</span>


<div class="wrapper" style="padding-left: 0.2%;" onclick="document.getElementById('bellolight').style.visibility ='hidden'; document.getElementById('bello').style.visibility ='hidden';">
Contacts

<?php
if (isset($_SESSION['username'])){

echo "
<img id='getbello' onmouseover=\"this.src='images/onbello.png'; document.getElementById('bellonote').style.display='block';\" onmouseout=\"this.src='images/bello.png';  document.getElementById('bellonote').style.display='none';\" src=\"images/bello.png\" style=\"float:right; margin-right: 2%; padding-top: 3.5%; height:25px; width:25px;\" onclick=\"if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); document.getElementById('bellolight').style.visibility ='visible'; document.getElementById('bello').style.visibility ='visible';\">
";

echo "<span class='righttoptimebubble' id='bellonote' style='margin-top: 10px; margin-left: 100%; opacity: 0.8; font-size: 20; float: right; display: none; background: black; color: white; border-radius: 3px;' onmouseover='document.getElementById(\"getbello\").src=\"images/onbello.png\"; this.style.display = \"block\";' onmouseout='document.getElementById(\"getbello\").src=\"images/bello.png\"; this.style.display = \"none\";' onclick=\"if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); document.getElementById('bellolight').style.visibility ='visible'; document.getElementById('bello').style.visibility ='visible';\">Notifications</span>";

}
?>




</header>

<?php
if (isset($_SESSION['username'])){
echo "
<div id='bellolight' class='bello_overlay' style=\"visibility:hidden;\"; onclick=\"document.getElementById('bellolight').style.visibility ='hidden'; document.getElementById('bello').style.visibility ='hidden';\"></div>
<span id=\"bello\" style=\" border-radius: 5px; border: solid 2px darkgreen; height: 200px; width: 300px; background: white; visibility: hidden; position: fixed; z-index: 1060; top: 7%; right: 17%; opacity: 1.0; overflow-y: auto;\">
";

echo "</span>";

echo '<script>';

echo "
window.onload = function() {
  online('yes');
};
";

echo '</script>';

}
?>

<script>
function online(status){
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
if (xhttp.responseText != ''){ }
    }
  }

  xhttp.open("GET", "onlineajax.php?status="+status, true);
  xhttp.send();
                        }


function whitebello(){
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
if (xhttp.responseText != ''){
      document.getElementById('getbello').src = xhttp.responseText;
                         }
    }
  }

  xhttp.open("GET", "whitebelloajax.php", true);
  xhttp.send();
                        }

whitebello();
window.setInterval(function(){ whitebello(); }, 10000);

function dnotif(id){
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("dnotif");
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }

  xhttp.open("GET", "dnotifajax.php?id="+id, true);
  xhttp.send();
                        }

function getbello(){
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("bello")
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }

  xhttp.open("GET", "getbelloajax.php", true);
  xhttp.send();
                        }


document.getElementById("getbello").addEventListener("click", function(){
    getbello();
});
document.getElementById("bellonote").addEventListener("click", function(){
    getbello();
});

function addperson(){
  FB.init({
    appId      : '1725123037768359',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.5' // use graph api version 2.5
  });
  FB.ui({
  method: 'send',
  link: 'https://SparkWill.com/',
});
                        }

document.getElementById("addperson").addEventListener("click", function(){
    addperson();
});

document.getElementById("personnote").addEventListener("click", function(){
    addperson();
});

// request permission on page load
document.addEventListener('DOMContentLoaded', function () {
  if (Notification.permission !== "granted")
    Notification.requestPermission();
});

function notifyMe() {
  if (!Notification) {
    return;
  }

  if (Notification.permission !== "granted")
    Notification.requestPermission();
  else {
    var notification = new Notification('Add Your Friends', {
      icon: 'https://SparkWill.com/images/Logo.png',
      body: "Click Here!",
    });

    notification.onclick = function () {
      addperson();      
    };
    
  }

}

function magnify(){
document.getElementById('wcbox').style.top = '50px';
document.getElementById('wcbox').style.left = '55%';
document.getElementById('wcbox').style.display = 'block';
document.getElementById('searchuser').focus();
}

document.getElementById("magnify").addEventListener("click", function(){
    magnify();
});

document.getElementById("magnifynote").addEventListener("click", function(){
    magnify();
});

function searchusersajax(){
searchuserp = document.getElementById('searchuser').value;
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("searchuserresults")
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }

  xhttp.open("GET", "searchusersajax.php?searchuserp="+searchuserp, true);
  xhttp.send();

}

</script>
<body onload='notifyMe();'></body>
        <div class="chat-sidebar" id="chat-sidebar" style="padding-top: 3.18%; background: white;">
<script>
document.getElementById("chat-sidebar").style.paddingTop = document.getElementById("sideheaderid").offsetHeight;
</script>

   


<?php
$i = 1;
foreach ($friends2 as $friend){

$nsql="SELECT * FROM users WHERE username = ('$friend') ORDER BY id asc";
$nresult = mysql_query($nsql);
while($nrow = mysql_fetch_array($nresult)) 
{
$nstate=($nrow['state']);
$narea=($nrow['area']);
}

$topnum = $i * 5 + 1.5;

echo '
            <div id="'.$friend.'fsheight" class="sidebar-name">
                <a id="'.$friend.'pop" class="tooltip" style="cursor:pointer;" onclick="javascript:register_popup(\''.$friend.'\', \''.ucfirst($friend).'\');" onmouseover="document.getElementById(\''.$friend.'arrow\').style.visibility = \'visible\';" onmouseout="document.getElementById(\''.$friend.'arrow\').style.visibility = \'hidden\';">
                    
<span id="spanme'.$friend.'" style="background: white;" onclick="if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); document.getElementById(\'man\').src = \'other.php?other='.$friend.'\';"><span style="font-size: 25px;">'.ucfirst($friend).'</span><div style="float: right; font-size: smaller;"><br>'.$nstate.'<br>'.$narea.'</div><div id="'.$friend.'arrowright" class="arrow-right" style="top: '.$topnum.'%;"></div>
';

$sql="SELECT * FROM users WHERE username = ('".$friend."') ORDER BY id desc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
if (!empty($row['profpic'])){
echo '<img style="float: left;" width="120" height="120" src="users/'.$friend.'/images/'.$row['profpic'].'" /></span><div class="arrow-right" id="'.$friend.'arrow" style="cursor: default; visibility: hidden; top: '.$topnum.'%;"></div>'; 

if ($row['online']=='yes'){ 
echo '<font id="online'.$friend.'" style="padding-right: 3px; display: inline; color: darkgreen; cursor: default;">&#9679;</font>';
echo '<img id="online'.$friend.'2" style="padding-left: 0%;" class="sidebarpic" src="users/'.$friend.'/images/'.$row['profpic'].'" />'; 
} else {
echo '<font id="online'.$friend.'" style="padding-right: 0px; display: none; color: darkgreen; cursor: default;">&#9679;</font>';
echo '<img id="online'.$friend.'2" class="sidebarpic" src="users/'.$friend.'/images/'.$row['profpic'].'" />';
}
} else {
echo '<img style="float: left;" width="120" height="120" src="images/post/default.jpg" /></span><div class="arrow-right" id="'.$friend.'arrow" style="cursor: default; visibility: hidden; top: '.$topnum.'%;"></div>';

if ($row['online']=='yes'){ 
echo '<font id="online'.$friend.'" style="padding-right: 3px; display: inline; color: darkgreen; cursor: default;"> &#9679;</font>'; 
echo '<img id="online'.$friend.'2" style="padding-left: 0%;" class="sidebarpic" src="images/post/default.jpg" />';
} else {
echo '<font id="online'.$friend.'" style="padding-right: 0px; display: none; color: darkgreen; cursor: default;">&#9679;</font>';
echo '<img id="online'.$friend.'2" class="sidebarpic" src="images/post/default.jpg" />';
}
}
}


echo '      				  '.ucfirst($friend).'
                </a>

            </div>




                                <div id="test'.$friend.'" style="display: none;"></div>	
				<div id="best'.$friend.'" style="display: none;"></div>	
                                <div id="info'.$friend.'" style="display: none;"></div>
                                <div id="scrollinfo'.$friend.'" style="display: none;"></div>
                                <div id="beforemini'.$friend.'" style="display: none;"></div>

<script>
document.getElementById("online'.$friend.'2").style.width = document.getElementById("'.$friend.'fsheight").offsetHeight;
document.getElementById("online'.$friend.'2").style.height = document.getElementById("'.$friend.'fsheight").offsetHeight;

document.getElementById("'.$friend.'arrowright").style.top = document.getElementById("'.$friend.'pop").offsetTop;
document.getElementById("'.$friend.'arrow").style.top = document.getElementById("'.$friend.'pop").offsetTop;
thepx = (document.getElementById("'.$friend.'pop").offsetHeight / 2);
document.getElementById("'.$friend.'arrowright").style.borderTop =  thepx + "px solid transparent";
document.getElementById("'.$friend.'arrowright").style.borderBottom =  thepx + "px solid transparent";
document.getElementById("'.$friend.'arrowright").style.borderLeft =  thepx + "px solid green";
document.getElementById("'.$friend.'arrow").style.borderTop =  thepx + "px solid transparent";
document.getElementById("'.$friend.'arrow").style.borderBottom =  thepx + "px solid transparent";
document.getElementById("'.$friend.'arrow").style.borderLeft =  thepx + "px solid green";

document.getElementById("spanme'.$friend.'").style.right =  document.getElementById("chat-sidebar").offsetWidth + thepx;

</script>



';
$i++;






























}
?>
        </div>











<?php

echo "



<div id='wcbox' style='display: none; width:400px; border: 2px solid black; cursor: default; position:fixed; top: 50px; left: 55%; z-index: 500;'>
<div style='width: 100%; height: 40px; background-color: lightgreen; text-align: center; color: green; font-weight: bold; cursor: move;'>
<span style='font-size: 200%;'>Search for People</span>
<a style='cursor: pointer; font-size: 20; color: white; float: right;' onMouseOver='this.style.color=\"black\";' onMouseOut='this.style.color=\"white\";' onclick='document.getElementById(\"wcbox\").style.display = \"none\"; searchuserp = \"\"; document.getElementById(\"searchuser\").value = \"\"; document.getElementById(\"searchuserresults\").innerHTML = \"\";'> &#10005;</a>
</div>

<div id='lowerwcbox' style='width: 100%; background-color: white; height: 370px; text-align: center; overflow: auto;'>

<input type='text' id='searchuser' style='border: 2px solid limegreen; color: red; font-size: 28; text-align: center; padding: 8px; height: 42px; width: 100%;' onmouseover=\"this.focus();\" onkeyup=\"searchusersajax();\"></input>
<span id='searchuserresults'></span>

</div>
</div>






<script>

var wcbox = document.getElementById('wcbox');
var lowerwcbox = document.getElementById('lowerwcbox');
var initX, initY, mousePressX, mousePressY;

lowerwcbox.addEventListener('mousedown', function(event) {
event.stopPropagation();
}, false);
wcbox.addEventListener('mousedown', function(event) {


	initX = this.offsetLeft;
	initY = this.offsetTop;
	mousePressX = event.clientX;
	mousePressY = event.clientY;

	this.addEventListener('mousemove', repositionElement, false);

	window.addEventListener('mouseup', function() {
	  wcbox.removeEventListener('mousemove', repositionElement, false);
	}, false);

}, false);

function repositionElement(event) {
	this.style.left = initX + event.clientX - mousePressX + 'px';
	this.style.top = initY + event.clientY - mousePressY + 'px';
}


</script>



";
































$sql="SELECT blocklist FROM users WHERE (username = '".$username."') order by ID asc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$blocklist = $row['blocklist'];
}


$sql="SELECT susername FROM messages WHERE (rusername = '".$username."' AND seen != 'yes') order by ID asc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{

$sender = $row['susername'];
$afriend = 'no';

if (strpos($blocklist, "$".$sender."$") !== false) { } else {

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

?>

<style>
#searchuser:focus{
outline: 2px solid limegreen;
}
</style>

<div id="replyarea" style="display: none;">

</div>

