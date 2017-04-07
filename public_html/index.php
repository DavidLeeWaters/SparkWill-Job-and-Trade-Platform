<?php include "databaselogin.php"; session_start(); 

if (!isset($_SESSION['loggedin'])){
echo "
<script>
    if (parent.window.location.href.includes('https') == false) {
   window.location.href = 'https://sparkwill.com/'; 
}
window.parent.history.replaceState('Object', 'Title', 'https://sparkwill.com/');
</script>
";
} else {
echo "
<script>
    if (parent.window.location.href.includes('https') == false) {
   parent.window.location.href = 'https://sparkwill.com/blank.php?page=index.php'; 
}
</script>
";
}

if (isset($_GET['loggingout'])) {
 echo "<script>";
 echo "window.parent.history.replaceState('Object', 'Title', 'https://sparkwill.com/index.php');";
 echo "</script>";
}


if (isset($_SESSION['loggedin'])){
echo "<script>";
echo "if (!(window.frameElement)){window.location = 'https://sparkwill.com/blank.php?page=index.php';}";
echo "</script>";
}


if(!empty($_POST['signupusername']) && !empty($_POST['signuppassword']) && !empty($_POST['signupemail']))
{
    $_SESSION['newkid']='1';
    $signupusername = mysql_real_escape_string($_POST['signupusername']);

if (strpos($signupusername, '$') === false) {

    $signupstate = mysql_real_escape_string($_POST['signupstate']);
    $signuppassword = mysql_real_escape_string($_POST['signuppassword']);
    $signupemail = mysql_real_escape_string($_POST['signupemail']);
    $signuparea = mysql_real_escape_string($_POST['signuparea']);
    $newfbtoken = ($_POST['fbse']);
    $checkusername = mysql_query("SELECT * FROM users WHERE username = '".$signupusername."'");
      
     if(mysql_num_rows($checkusername) == 1)
     {
echo "

<div id='wcbox' class='newwhite_content' style='z-index: 2000; cursor: default; color: white; font-size: 25; font-weight: bold; text-align: center;'>
<span id='wccontent'>Sorry that Username is Taken</span><br><br>
<a class='newbutton' style='text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;' onclick=\"document.getElementById('wcbox').style.display='none'; document.getElementById('wcback').style.display='none'\">Ok</a>
</div>
<div id='wcback' class='newblack_overlay' style='z-index: 1800;' onclick = \"document.getElementById('wcbox').style.display='none'; document.getElementById('wcback').style.display='none'\"></div> 

";
     }
     else
     {
      

if ($newfbtoken == 'no'){
$registerquery = mysql_query("INSERT INTO users (username, password, email, state, verify, area, friends) VALUES('".$signupusername."', '".$signuppassword."', '".$signupemail."', '".$signupstate."', 'yes', '".$signuparea."', 'david')");
} else {
$registerquery = mysql_query("INSERT INTO users (username, password, email, state, verify, area, token, friends) VALUES('".$signupusername."', '".$signuppassword."', '".$signupemail."', '".$signupstate."', 'yes', '".$signuparea."', '".$newfbtoken."', 'david')");
}
        if($registerquery =1)
        {
	 mkdir('users/'.$signupusername, 0777, true);
	 mkdir('users/'.$signupusername.'/images', 0777, true);


if ($newfbtoken != 'no'){
  $url = "https://graph.facebook.com/".$newfbtoken."/picture?width=400&height=400";
  $data = file_get_contents($url);
  $fp = fopen("users/".$signupusername."/images/profpic.jpg","wb");
  if (!$fp) exit;
  fwrite($fp, $data);
  fclose($fp);
mysql_query("UPDATE users SET profpic = 'profpic.jpg' WHERE username = '".$signupusername."'");
}


	 mkdir('users/'.$signupusername.'/resumefile', 0777, true);

echo "
<script>
  window.parent.history.replaceState('Object', 'Title', 'https://sparkwill.com/');
</script>
";


        $checklogin = mysql_query("SELECT * FROM users WHERE username = '".$signupusername."' AND password = '".$signuppassword."' ");
	$checklogin2 = mysql_num_rows($checklogin);	 
	 if($checklogin2!=0)
	 {
	 $sql4="SELECT * FROM users WHERE username = '".$signupusername."'";
         $result4 = mysql_query($sql4);
         while($row4 = mysql_fetch_array($result4)) 
             {
	         $email = $row4['email'];
                 $state = $row4['state'];
                 $area = $row4['area'];
             }
         $_SESSION['state'] = $state;
         $_SESSION['area'] = $area;
	 $_SESSION['email'] = $email;
	 $_SESSION['username'] = $signupusername;
	 $_SESSION['password'] = $signuppassword;
     	 $_SESSION['loggedin'] = 1;
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=blank.php?page=index.php">';
         }






}
}
}
}




?>


<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/background.css" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/list.css">
<link rel="stylesheet" type="text/css" href="css/login.css">

<link rel="icon" type="image/png" href="images/Logo.png" sizes="16x16">



<title>SparkWill</title>
<script>
 window.parent.document.title = "SparkWill";
</script>
<body>
    <header>
          <nav style="">
<img src="images/Logo.png" alt="Logo" height="40px" width="40px"></img>
<a class='maintabs' href="index.php">Home</a>

			
<?php 

if (!empty($_SESSION['loggedin'])){

include 'loggedinmenu.php';

} else {

echo "<a class='maintabs' style='cursor: pointer;' onclick='document.getElementById(\"titlethis\").style.zIndex = \"9999\"; document.getElementById(\"centertitle\").src = \"images/logobefore.png\"; document.getElementById(\"fade\").style.display=\"block\"; document.getElementById(\"wade\").style.display=\"block\"; document.getElementById(\"shade\").style.display=\"block\"; document.getElementById(\"light\").style.display=\"block\"; document.getElementById(\"signup_content\").style.display=\"none\"; document.getElementById(\"mainbuttons\").style.display=\"block\"; document.getElementById(\"username\").focus(); document.getElementById(\"username\").placeholder=\"\";'>Log In</a>";

}




?>




          </nav>
      </div>
    </header>
	


	


      <div class="wrapper">

<div id="contentwrap">
<div style="clear: both;"> </div>
<br>
</div>
</div>
</div>

<?php

if (isset($_SESSION['username'])){
echo "
<script>
function diffwidth(){
var windowwidth = window.innerWidth;
if (windowwidth < 880){
 document.getElementById('biglogoimg').style.display = 'none';
} else {
 document.getElementById('biglogoimg').style.display = 'inline-block';
}
}
window.addEventListener('load', diffwidth);
window.addEventListener('resize', diffwidth);
</script>
";
} else {
echo "<span id='m1' style='cursor: default; text-align: center; color: #009900; position: fixed; top: 8%; left: 4%; font-size: 25; font-style: italic; font-weight: bold; z-index: 1200;' onclick='document.getElementById(\"centertitle\").src = \"images/logoafter.png\"; document.getElementById(\"titlethis\").style.zIndex = \"0\"; document.getElementById(\"mainbuttons\").style.display=\"none\"; document.getElementById(\"wade\").style.display=\"none\"; document.getElementById(\"shade\").style.display=\"none\"; document.getElementById(\"fade\").style.display=\"none\"; document.getElementById(\"light\").style.display=\"none\"; document.getElementById(\"signup_content\").style.display=\"none\"; document.getElementById(\"curpeople\").style.display=\"none\"; document.getElementById(\"jobsearch\").focus();'>&nbsp;&nbsp;<span style='font-size: 30; color: #009900;'>Make</span> a <span style='font-size: 32; color: darkgreen;'>Spark</span> <br>in<br> <span style='font-size: 30; color: #009900;'>Your Life!</span></span>
<script>
function diffwidth(){
var windowwidth = window.innerWidth;
if (windowwidth < 880){
 document.getElementById('biglogoimg').style.display = 'none';
} else {
 document.getElementById('biglogoimg').style.display = 'inline-block';
}

if (windowwidth < 1270){
 document.getElementById('m1').style.display = 'none';
} else {
 document.getElementById('m1').style.display = 'block';
}
}
window.addEventListener('load', diffwidth);
window.addEventListener('resize', diffwidth);
</script>
";
}
?>

<center>

<span id="titlethis" onclick="<?php if (empty($_SESSION['loggedin'])){echo "document.getElementById('light').style.display='none'; document.getElementById('signup_content').style.display='none'; document.getElementById('fade').style.display='none'; document.getElementById('wade').style.display='none'; document.getElementById('shade').style.display='none';";} ?> document.getElementById('jobsearch').focus(); document.getElementById('curpeople').style.display='none';" style='cursor: default; position: relative; z-index: 1999;'>


<br>
<img id='centertitle' src='images/logobefore.png' onclick='this.src = "images/logoafter.png"; document.getElementById("titlethis").style.zIndex = "0"; document.getElementById("mainbuttons").style.display="none";' style='margin-left: 7%;' ></img><img id='biglogoimg' src='images/Logo.png' alt='Logo' height='90px' width='90px' onclick='document.getElementById("centertitle").src = "images/logoafter.png"; document.getElementById("titlethis").style.zIndex = "0"; document.getElementById("mainbuttons").style.display="none";' ></img>

</span>

<?php
if (isset($_SESSION['username']) || isset($_GET['nofront'])){
echo "<script>document.getElementById('titlethis').style.zIndex = '0'; document.getElementById('centertitle').src = 'images/logoafter.png'; document.getElementById('centertitle').style.paddingLeft = '0%';</script>";
}
?>

<br>

<span style='cursor: default;'>

<button class='newbutton' style='background: green;' onclick='document.getElementById("services").style.display="none"; document.getElementById("forsale").style.display="none"; document.getElementById("housing").style.display="none"; document.getElementById("community").style.display="none"; document.getElementById("jobs").style.display="block"; blueme(); this.style.backgroundColor = "green"; typevar="job";'>Jobs</button>

<button class='newbutton' onclick='document.getElementById("services").style.display="none"; document.getElementById("forsale").style.display="block"; document.getElementById("housing").style.display="none"; document.getElementById("community").style.display="none"; document.getElementById("jobs").style.display="none"; blueme(); this.style.backgroundColor = "green"; typevar="trade";'>For Sale</button>

<button class='newbutton' onclick='document.getElementById("services").style.display="block"; document.getElementById("forsale").style.display="none"; document.getElementById("housing").style.display="none"; document.getElementById("community").style.display="none"; document.getElementById("jobs").style.display="none"; blueme(); this.style.backgroundColor = "green"; typevar="services";'>Services</button>

<button class='newbutton' onclick='document.getElementById("services").style.display="none"; document.getElementById("forsale").style.display="none"; document.getElementById("housing").style.display="block"; document.getElementById("community").style.display="none"; document.getElementById("jobs").style.display="none"; blueme(); this.style.backgroundColor = "green"; typevar="place";'>Housing</button>

<button class='newbutton' onclick='location.href="resumes.php?fromfront=yes";'><font color="white">Resum&eacutes</font></button>

<button class='newbutton' onclick='document.getElementById("services").style.display="none"; document.getElementById("forsale").style.display="none"; document.getElementById("housing").style.display="none"; document.getElementById("community").style.display="block"; document.getElementById("jobs").style.display="none"; blueme(); this.style.backgroundColor = "green"; typevar="activities";'>Community</button>

<button class='newbutton' onclick='location.href="map.php";'><font color="white">Map</font></button>

</span>

<script>
    function blueme() {
        elements = document.getElementsByClassName("newbutton");
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.backgroundColor="#00b33c";
        }
        document.getElementById('jobsearch').focus();
    }

typevar = 'job';
</script>

<br>
<br>

<style>
#jobsearch:focus{
outline: 3px solid limegreen;
}
.bold_titles{
color: green;
font-weight: bold;
font-size: x-large;
}
</style>

<input type="text" id="jobsearch" style="border: 2px solid limegreen; color: red; font-size: 28; text-align: center; padding: 8px; height: 42px; width: 50%;" onmouseover="this.focus(); document.getElementById('jobsubmit').style.visibility = 'visible';" onkeyup="if (event.keyCode == 13 && event.shiftKey !== true){if (document.getElementById('jobsearch').value !=''){window.location.href = 'list.php?section='+document.getElementById('jobsearch').value+'&type='+typevar;}}"></input>
<button id="jobsubmit" class="newbutton" style="position: absolute; visibility: hidden; margin-left: -5px;" onclick="if (document.getElementById('jobsearch').value !=''){window.location.href = 'list.php?section='+document.getElementById('jobsearch').value+'&type='+typevar;} else {document.getElementById('jobsearch').focus();}">Submit</button>
<br>

<?php
if (isset($_SESSION['username'])){
echo "<script>document.getElementById('jobsearch').focus();</script>";
}


?>

<span id="jobs" style="display: block;">
<span class="bold_titles">Jobs</span><br>
<img id="physicalicon" src="images/physical.png" style="cursor: pointer;" onclick="document.getElementById('physicalicon').style.display = 'none'; document.getElementById('mentalicon').style.display = 'none'; document.getElementById('physicaljobs').style.display = 'block';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img id="mentalicon" src="images/mental.png" style="cursor: pointer;" onclick="document.getElementById('physicalicon').style.display = 'none'; document.getElementById('mentalicon').style.display = 'none'; document.getElementById('mentaljobs').style.display = 'block';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>


<style>
.iconimg {
cursor: pointer; 
height: 175px; 
width: 175px;
}
</style>

<span id="physicaljobs" style="display: none;">
<ul style="list-style: none; display: inline-block;">
<img src="images/physicalsquares/automotives.png" class="iconimg" onclick="window.location = 'list.php?section=automotives&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/physicalsquares/food.png" class="iconimg" onclick="window.location = 'list.php?section=food service&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/physicalsquares/barbering.png" class="iconimg" onclick="window.location = 'list.php?section=hair styling&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/physicalsquares/labor.png" class="iconimg" onclick="window.location = 'list.php?section=labor&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/physicalsquares/manufacturing.png" class="iconimg" onclick="window.location = 'list.php?section=manufacturing&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/physicalsquares/nonprofit.png" class="iconimg" onclick="window.location = 'list.php?section=nonprofit&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
</ul>

<ul style="list-style: none; display: inline-block;">
<img src="images/physicalsquares/part-time.png" class="iconimg" onclick="window.location = 'list.php?section=part time&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/physicalsquares/real estate.png" class="iconimg" onclick="window.location = 'list.php?section=real estate&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/physicalsquares/retail.png" class="iconimg" onclick="window.location = 'list.php?section=retail&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/physicalsquares/security.png" class="iconimg" onclick="window.location = 'list.php?section=security&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/physicalsquares/skilled trade.png" class="iconimg" onclick="window.location = 'list.php?section=skilled trade&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/physicalsquares/transport.png" class="iconimg" onclick="window.location = 'list.php?section=transport&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
</ul>

<a id='me1' class="newbutton" style="left: 100px; position: absolute; height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; color:white; cursor:pointer;" onclick="document.getElementById('physicaljobs').style.display = 'none'; document.getElementById('physicalicon').style.display = 'inline-block'; document.getElementById('mentalicon').style.display = 'inline-block';">Go Back</a>

<script>
document.getElementById('me1').style.top = document.getElementById('jobsearch').offsetTop;
</script>

</span>

<span id="mentaljobs" style="display: none;">
<ul style="list-style: none; display: inline-block;">
<img src="images/mentalsquares/accounting.png" class="iconimg" onclick="window.location = 'list.php?section=accounting&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/mentalsquares/education.png" class="iconimg" onclick="window.location = 'list.php?section=education&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/mentalsquares/engineering.png" class="iconimg" onclick="window.location = 'list.php?section=engineering&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/mentalsquares/finance.png" class="iconimg" onclick="window.location = 'list.php?section=finance&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/mentalsquares/hardware.png" class="iconimg" onclick="window.location = 'list.php?section=hardware&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/mentalsquares/software.png" class="iconimg" onclick="window.location = 'list.php?section=software&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
</ul>
<ul style="list-style: none; display: inline-block;">
<img src="images/mentalsquares/legal.png" class="iconimg" onclick="window.location = 'list.php?section=legal&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/mentalsquares/management.png" class="iconimg" onclick="window.location = 'list.php?section=management&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/mentalsquares/office.png" class="iconimg" onclick="window.location = 'list.php?section=office&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/mentalsquares/science.png" class="iconimg" onclick="window.location = 'list.php?section=science&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/mentalsquares/marketing.png" class="iconimg" onclick="window.location = 'list.php?section=marketing&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/mentalsquares/sales.png" class="iconimg" onclick="window.location = 'list.php?section=sales&type=job&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
</ul>

<a id='me2' class="newbutton" style="left: 100px; position: absolute; height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; color:white; cursor:pointer;" onclick="document.getElementById('mentaljobs').style.display = 'none'; document.getElementById('physicalicon').style.display = 'inline-block'; document.getElementById('mentalicon').style.display = 'inline-block';">Go Back</a>

<script>
document.getElementById('me2').style.top = document.getElementById('jobsearch').offsetTop;
</script>

</span>

</span>

<span id="housing" style="display: none;">
<span class="bold_titles">Housing</span><br>
<img id="houserenticon" src="images/forrent.png" style="cursor: pointer;" onclick="document.getElementById('houserenticon').style.display = 'none'; document.getElementById('housesaleicon').style.display = 'none'; document.getElementById('houserent').style.display = 'block';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img id="housesaleicon" src="images/forsale.png" style="cursor: pointer;" onclick="document.getElementById('houserenticon').style.display = 'none'; document.getElementById('housesaleicon').style.display = 'none'; document.getElementById('housesale').style.display = 'block';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>

<span id="houserent" style="display: none;">

<ul style="list-style: none; display: inline-block;">
<img src="images/forrentsquares/apartments.png" class="iconimg" onclick="window.location = 'list.php?section=apartments&type=place&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/forrentsquares/office.png" class="iconimg" onclick="window.location = 'list.php?section=office&type=place&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/forrentsquares/business.png" class="iconimg" onclick="window.location = 'list.php?section=business&type=place&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/forrentsquares/storage.png" class="iconimg" onclick="window.location = 'list.php?section=storage&type=place&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
</ul>
<ul style="list-style: none; display: inline-block;">
<img src="images/forrentsquares/rooms.png" class="iconimg" onclick="window.location = 'list.php?section=rooms&type=place&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/forrentsquares/rooms wanted.png" class="iconimg" onclick="window.location = 'list.php?section=rooms wanted&type=place&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/forrentsquares/temporary.png" class="iconimg" onclick="window.location = 'list.php?section=temporary&type=place&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/forrentsquares/vacation rentals.png" class="iconimg" onclick="window.location = 'list.php?section=vacation rentals&type=place&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
</ul>
<a id="me3" class="newbutton" style="left: 100px; position: absolute; height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; color:white; cursor:pointer;" onclick="document.getElementById('houserent').style.display = 'none'; document.getElementById('houserenticon').style.display = 'inline-block'; document.getElementById('housesaleicon').style.display = 'inline-block';">Go Back</a>

<script>
document.getElementById('me3').style.top = document.getElementById('jobsearch').offsetTop;
</script>

</span>

<span id="housesale" style="display: none;">
<ul style="list-style: none; display: inline-block;">
<img src="images/forsalesquares/homes.png" class="iconimg" onclick="window.location = 'list.php?section=homes&type=place&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/forsalesquares/land.png" class="iconimg" onclick="window.location = 'list.php?section=land&type=place&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/forsalesquares/apartment complex.png" class="iconimg" onclick="window.location = 'list.php?section=apartment complex&type=place&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/forsalesquares/business.png" class="iconimg" onclick="window.location = 'list.php?section=business&type=place&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
</ul>
<a id="me4" class="newbutton" style="left: 100px; position: absolute; height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; color:white; cursor:pointer;" onclick="document.getElementById('housesale').style.display = 'none'; document.getElementById('houserenticon').style.display = 'inline-block'; document.getElementById('housesaleicon').style.display = 'inline-block';">Go Back</a>

<script>
document.getElementById('me4').style.top = document.getElementById('jobsearch').offsetTop;
</script>

</span>

</span>




<span id="community" style="display: none;">
<span class="bold_titles">Community</span><br>
<ul style="list-style: none; display: inline-block;">
<img src="images/communitysquares/Restaurants.png" class="iconimg" onclick="window.location = 'map.php?search=restaurants&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/communitysquares/activities.png" class="iconimg" onclick="window.location = 'list.php?section=activities&type=activities&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/communitysquares/classes.png" class="iconimg" onclick="window.location = 'list.php?section=classes&type=activities&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/communitysquares/events.png" class="iconimg" onclick="window.location = 'list.php?section=events&type=activities&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>

<img src="images/communitysquares/concerts.png" class="iconimg" onclick="window.location = 'list.php?section=concerts&type=activities&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/communitysquares/general.png" class="iconimg" onclick="window.location = 'list.php?section=general&type=activities&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
</ul>
<ul style="list-style: none; display: inline-block;">
<img src="images/communitysquares/lost and found.png" class="iconimg" onclick="window.location = 'list.php?section=lost and found&type=activities&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/communitysquares/music.png" class="iconimg" onclick="window.location = 'list.php?section=music&type=activities&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>

<img src="images/communitysquares/art.png" class="iconimg" onclick="window.location = 'list.php?section=art&type=activities&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/communitysquares/pets.png" class="iconimg" onclick="window.location = 'list.php?section=pets&type=activities&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/communitysquares/political events.png" class="iconimg" onclick="window.location = 'list.php?section=political events&type=activities&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/communitysquares/volunteering.png" class="iconimg" onclick="window.location = 'list.php?section=volunteering&type=activities&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
</ul>
</span>



<span id="forsale" style="display: none;">
<span class="bold_titles">For Sale</span><br>
<ul style="list-style: none; display: inline-block;">
<img src="images/salesquares/appliances.png" class="iconimg" onclick="window.location = 'list.php?section=appliances&type=trade&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/salesquares/electronics.png" class="iconimg" onclick="window.location = 'list.php?section=electronics&type=trade&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/salesquares/clothes.png" class="iconimg" onclick="window.location = 'list.php?section=clothes&type=trade&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/salesquares/barter.png" class="iconimg" onclick="window.location = 'list.php?section=barter&type=trade&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/salesquares/free.png" class="iconimg" onclick="window.location = 'list.php?section=free&type=trade&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/salesquares/baby or child.png" class="iconimg" onclick="window.location = 'list.php?section=baby or child&type=trade&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
</ul>
<ul style="list-style: none; display: inline-block;">
<img src="images/salesquares/wanted.png" class="iconimg" onclick="window.location = 'list.php?section=wanted&type=trade&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/salesquares/business.png" class="iconimg" onclick="window.location = 'list.php?section=business&type=trade&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/salesquares/small auto.png" class="iconimg" onclick="window.location = 'list.php?section=small auto&type=trade&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/salesquares/auto.png" class="iconimg" onclick="window.location = 'list.php?section=auto&type=trade&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/salesquares/auto parts.png" class="iconimg" onclick="window.location = 'list.php?section=auto parts&type=trade&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/salesquares/boats.png" class="iconimg" onclick="window.location = 'list.php?section=boats&type=trade&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
</ul>
</span>



<span id="services" style="display: none;">
<span class="bold_titles">Services</span><br>
<ul style="list-style: none; display: inline-block;">
<img src="images/servicesquares/babysitting.png" class="iconimg" onclick="window.location = 'list.php?section=babysitting&type=services&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/servicesquares/automotive.png" class="iconimg" onclick="window.location = 'list.php?section=automotive&type=services&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/servicesquares/beauty.png" class="iconimg" onclick="window.location = 'list.php?section=beauty&type=services&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/servicesquares/computer.png" class="iconimg" onclick="window.location = 'list.php?section=computer&type=services&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>

<img src="images/servicesquares/event.png" class="iconimg" onclick="window.location = 'list.php?section=event&type=services&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/servicesquares/farm or garden.png" class="iconimg" onclick="window.location = 'list.php?section=farm or garden&type=services&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
</ul>
<ul style="list-style: none; display: inline-block;">
<img src="images/servicesquares/financial.png" class="iconimg" onclick="window.location = 'list.php?section=financial&type=services&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/servicesquares/household.png" class="iconimg" onclick="window.location = 'list.php?section=household&type=services&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>

<img src="images/servicesquares/labor or moving.png" class="iconimg" onclick="window.location = 'list.php?section=labor or moving&type=services&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/servicesquares/legal.png" class="iconimg" onclick="window.location = 'list.php?section=legal&type=services&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/servicesquares/lessons.png" class="iconimg" onclick="window.location = 'list.php?section=lessons&type=services&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
<img src="images/servicesquares/skilled trade.png" class="iconimg" onclick="window.location = 'list.php?section=skilled trade&type=services&fromfront=yes';" onmouseover="this.style.opacity = '0.8';" onmouseout="this.style.opacity = '1.0';"></img>
</ul>
</span>



</center>
</body>































<?php
//JUST LOGGED IN
if(!empty($_POST['username']) && !empty($_POST['password']))
{
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);

    $checklogin = mysql_query("SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."' ");
	$checklogin2 = mysql_num_rows($checklogin);	 
	 if($checklogin2!=0)
	 {
		 $sql4="SELECT * FROM users WHERE username = '".$username."'";
$result4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($result4)) 
{
	$email = $row4['email'];
        $state = $row4['state'];
        $area = $row4['area'];
}
         $_SESSION['state'] = $state;
         $_SESSION['area'] = $area;
	 $_SESSION['email'] = $email;
	 $_SESSION['username'] = $username;
	 $_SESSION['password'] = $password;
     	 $_SESSION['loggedin'] = 1;
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=blank.php?page=index.php">';   
	 } else {
echo "

<div id='wcbox' class='newwhite_content' style='z-index: 3000; cursor: default; color: white; font-size: 25; font-weight: bold; text-align: center;'>
<span id='wccontent'>Wrong Username or Password</span><br><br>
<a class='newbutton' style='text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;' onclick=\"document.getElementById('wcbox').style.display='none'; document.getElementById('wcback').style.display='none'\">Ok</a>
</div>
<div id='wcback' class='newblack_overlay' style='z-index: 1800;' onclick = \"document.getElementById('wcbox').style.display='none'; document.getElementById('wcback').style.display='none';\"></div> 

";

	 }
}







 
    



if (empty($_SESSION['loggedin']) && !isset($_GET['nofront'])){

$timezone = -4;
$time = gmdate("Hi", time() + 3600*($timezone));
$time = ($time / 2);
if ($time > 312 && $time < 512){
$pcb = ceil($time / 4.8);
}
if ($time > 512){
$pcb = ceil($time / 4.6);
}
if ($time > 612){
$pcb = ceil($time / 4.4);
}
if ($time > 712){
$pcb = ceil($time / 4.2);
}
if ($time > 812){
$pcb = ceil($time / 4.5);
}
if ($time > 912){
$pcb = ceil($time / 5);
}
if ($time > 1012){
$pcb = ceil($time / 6);
}
if ($time > 1112){
$pcb = ceil(($time / 7) + 80);
}
if ($time < 312){
$pcb = ceil(($time / 6) + 80);
}

$pcb = (ceil($pcb) * 11);

echo '
<div id="curpeople" style="z-index: 1160; position: fixed; top: 18%; left: 41%; color: green; cursor: default; font-size: larger;" onclick="document.getElementById(\'titlethis\').style.zIndex = \'0\'; document.getElementById(\'centertitle\').src = \'images/logoafter.png\'; this.style.display=\'none\'; document.getElementById(\'mainbuttons\').style.display=\'none\'; document.getElementById(\'light\').style.display=\'none\'; document.getElementById(\'signup_content\').style.display=\'none\'; document.getElementById(\'fade\').style.display=\'none\'; document.getElementById(\'wade\').style.display=\'none\'; document.getElementById(\'shade\').style.display=\'none\'; document.getElementById(\'jobsearch\').focus();">'.$pcb.' people currently browsing<div style="position: fixed; top: 21%; left: 32%; color: black; cursor: default; font-size: larger;">See why over 90,000 businesses choose SparkWill</div><div style="position: fixed; top: 25%; left: 43%; color: darkgreen; cursor: default; font-size: larger;">Results Guaranteed</div></div>
<div id="mainbuttons" style="z-index: 1999; position: relative;">
<input type="button" class="mainnewbutton" value="LOG IN" style="position: fixed; top: 30%; left: 36%; cursor: pointer; font-weight: bold;" onclick="document.getElementById(\'light\').style.display=\'block\'; document.getElementById(\'signup_content\').style.display=\'none\'; document.getElementById(\'username\').focus();" />

<input type="button" class="mainredbutton" value="BROWSE" style="position: fixed; top: 30%; left: 46%; cursor: pointer; font-weight: bold;" onclick="document.getElementById(\'titlethis\').style.zIndex = \'0\'; document.getElementById(\'centertitle\').src = \'images/logoafter.png\'; document.getElementById(\'light\').style.display=\'none\'; document.getElementById(\'mainbuttons\').style.display=\'none\'; document.getElementById(\'signup_content\').style.display=\'none\'; document.getElementById(\'fade\').style.display=\'none\'; document.getElementById(\'wade\').style.display=\'none\'; document.getElementById(\'curpeople\').style.display=\'none\'; document.getElementById(\'shade\').style.display=\'none\';document.getElementById(\'jobsearch\').focus();" />

<input type="button" class="mainnewbutton" value="SIGN UP" style="position: fixed; top: 30%; left: 57.1%; cursor: pointer; font-weight: bold;" onclick="document.getElementById(\'light\').style.display=\'none\'; document.getElementById(\'signup_content\').style.display=\'block\';  document.getElementById(\'signupusername\').focus();" />
</div>

';


echo "
<center>
<div id='light' class='white_content' style='height: 72%; top: 20%; left: 0%; display: none;'>
";


echo '


	<form method="post" action="index.php" name="loginform" id="loginform">

<label for="username" style="color: green; font-size: 24px;">Username</label>
<input name="username" type="text" placeholder="" id="username" onmouseover=\'this.focus(); this.placeholder = "";\' onblur=\'this.placeholder = "Username";\'  autofocus/>
<label for="password" style="font-size: 24px;">Password</label>
<input name="password" type="password" placeholder="Password" id="password" onmouseover=\'this.focus(); this.placeholder = "";\' onmouseout=\'this.blur(); this.placeholder = "Password";\' />	
		
<input type="button" class="newbutton" value="LOG IN" style="cursor: pointer;" onclick="checklogin()"/>
	</form>
';
?>

<button id="fbloginbutton" class="fbbutton" style="display: none; width: 85%; margin-left: 1.5%;">LOG IN WITH FACEBOOK</button>
<script>
var fbtoken = '';
document.getElementById("fbloginbutton").addEventListener("click", function() {
    fblogincall(fbtoken);
}, false);

var justloggedin='no';
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected' && justloggedin == 'yes') {
      loginAPI();
    } else if (response.status === 'connected' && justloggedin == 'no') {
      // The person is logged into Facebook, but not your app.
      loadAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      logoutAPI();
    } else {
      logoutAPI();
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1725123037768359',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.5' // use graph api version 2.5
  });



  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));


  function loadAPI() {
    FB.api('/me?fields=name,email', function(response) {
fbtoken = response.id;
    });
  }

  function loginAPI() {
    FB.api('/me?fields=name,email', function(response) {
        fblogincall(response.id);
    });
  }


  function logoutAPI() {
      document.getElementById('status').innerHTML = "";
  }




function fblogincall(fbtoken){
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("fblogincall")
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }

  xhttp.open("GET", "fbloginajax.php?fbtoken="+fbtoken+"&action=login", true);
  xhttp.send();
}




</script>

<div id="fb-login-button">
<div id="fblogincall" style="display: none;"></div>

<div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-auto-logout-link="false" onlogin="justloggedin='yes'; checkLoginState();"></div>

<div id="status"></div>
</div>

<?php
echo "

<font size='4'>


<script>var fbox = 'no';</script>
<style>
#ftest {
-webkit-user-select: none;  /* Chrome all / Safari all */
  -moz-user-select: none;     /* Firefox all */
  -ms-user-select: none;      /* IE 10+ */
  user-select: none; 
}
</style>
<div id='ftest' onclick='openclosefbox(); if (fbox == \"no\"){fbox = \"yes\"; this.innerHTML = \"<b>Nevermind</b>\";}else{fbox = \"no\"; this.innerHTML = \"<b>Forgot your Password?</b>\";}' style='color: green; cursor: pointer;'><b>Forgot your Password?</b></div>

<div id='ftest2' style='display:none; text-align: center;'>
<center>
    <form method='post' action='index.php' name='emailform' id='emailform'>
        <label for='forgotemail' style='padding-left: 1.7%;'><b>E-mail</b></label>
        <input type='text' name='forgotemail' id='forgotemail' placeholder='Email' onmouseover='this.focus(); this.placeholder = \"\";' onmouseout='this.blur(); this.placeholder = \"Email\";'/>
        <input type='submit' name='Send' id='Send' value='Submit' class='newbutton'/>
    </form>
</center>
</div>
</div>


<div id='signup_content' class='signup_content' style='text-align: center; display: none;'>

<font color='green' style='cursor: default; font-size: 24;'><b>Sign Up</font>
     
   
    <form method='post' action='index.php' name='registerform' id='registerform'>
        <center><span style='color:green;'>
        <input type='text' placeholder=\"Username\" name='signupusername' id='signupusername' onmouseover='this.focus(); this.placeholder = \"\";' onmouseout='this.blur(); this.placeholder = \"Username\";'/>

<span id ='signupusernamespaces' style='cursor: default; display: none;'>No Spaces in Username Allowed!</span>
<br>
        <input type='text' placeholder='Password' name='signuppassword' id='signuppassword' onmouseover='this.focus(); this.placeholder = \"\";' onmouseout='this.blur(); this.placeholder = \"Password\";'/><br />
        <input type='text' placeholder='Email' name='signupemail' id='signupemail' onmouseover='this.focus(); this.placeholder = \"\";' onmouseout='this.blur(); this.placeholder = \"Email\";'/>











<br>
<select name='signupstate' id='signupstate' style='color: forestgreen;  font-size: 150%;'>

        <option value='FL'>Florida</option>
	<option value='AL'>Alabama</option>
	<option value='AK'>Alaska</option>
	<option value='AZ'>Arizona</option>
	<option value='AR'>Arkansas</option>
	<option value='CA'>California</option>
	<option value='CO'>Colorado</option>
	<option value='CT'>Connecticut</option>
	<option value='DE'>Delaware</option>
	<option value='DC'>District Of Columbia</option>
	<option value='GA'>Georgia</option>
	<option value='HI'>Hawaii</option>
	<option value='ID'>Idaho</option>
	<option value='IL'>Illinois</option>
	<option value='IN'>Indiana</option>
	<option value='IA'>Iowa</option>
	<option value='KS'>Kansas</option>
	<option value='KY'>Kentucky</option>
	<option value='LA'>Louisiana</option>
	<option value='ME'>Maine</option>
	<option value='MD'>Maryland</option>
	<option value='MA'>Massachusetts</option>
	<option value='MI'>Michigan</option>
	<option value='MN'>Minnesota</option>
	<option value='MS'>Mississippi</option>
	<option value='MO'>Missouri</option>
	<option value='MT'>Montana</option>
	<option value='NE'>Nebraska</option>
	<option value='NV'>Nevada</option>
	<option value='NH'>New Hampshire</option>
	<option value='NJ'>New Jersey</option>
	<option value='NM'>New Mexico</option>
	<option value='NY'>New York</option>
	<option value='NC'>North Carolina</option>
	<option value='ND'>North Dakota</option>
	<option value='OH'>Ohio</option>
	<option value='OK'>Oklahoma</option>
	<option value='OR'>Oregon</option>
	<option value='PA'>Pennsylvania</option>
	<option value='RI'>Rhode Island</option>
	<option value='SC'>South Carolina</option>
	<option value='SD'>South Dakota</option>
	<option value='TN'>Tennessee</option>
	<option value='TX'>Texas</option>
	<option value='UT'>Utah</option>
	<option value='VT'>Vermont</option>
	<option value='VA'>Virginia</option>
	<option value='WA'>Washington</option>
	<option value='WV'>West Virginia</option>
	<option value='WI'>Wisconsin</option>
	<option value='WY'>Wyoming</option>
</select>
        </span></center>
<br>
<center>
<input type='text' placeholder='Area' name='signuparea' id='signuparea' onmouseover='this.focus(); this.placeholder = \"\";' onmouseout='this.blur(); this.placeholder = \"Area\";'/>


<script>
function checklogin() {
if (document.getElementById('username').value == ''){
	document.getElementById('username').style.borderColor = 'red';
    document.getElementById('username').style.outline = 'none';
     } else {
	document.getElementById('username').style.borderColor = 'transparent';
    document.getElementById('username').style.outline = 'initial';
}
if (document.getElementById('password').value == ''){
	document.getElementById('password').style.borderColor = 'red';
    document.getElementById('password').style.outline = 'none';
     } else {
	document.getElementById('password').style.borderColor = 'transparent';
    document.getElementById('password').style.outline = 'initial';
}
if (document.getElementById('username').value != '' && document.getElementById('password').value != ''){	 
document.getElementById('loginform').submit();
}
}

document.getElementById('password').onkeyup= function(event) { 
if (event.which == 13 && event.shiftKey === false){
checklogin();
}
}

function checksignup() {
if (document.getElementById('signupusername').value == ''){
	document.getElementById('signupusername').style.borderColor = 'red';
    document.getElementById('signupusername').style.outline = 'none';
     } else {
	document.getElementById('signupusername').style.borderColor = 'transparent';
    document.getElementById('signupusername').style.outline = 'initial';
}
if (document.getElementById('signupusername').value.includes(' ')) {
    	document.getElementById('signupusername').style.borderColor = 'red';
    document.getElementById('signupusername').style.outline = 'none';
    document.getElementById('signupusernamespaces').style.display = 'inline-block';
} else {
    document.getElementById('signupusernamespaces').style.display = 'none';
}
if (document.getElementById('signuppassword').value == ''){
	document.getElementById('signuppassword').style.borderColor = 'red';
    document.getElementById('signuppassword').style.outline = 'none';
     } else {
	document.getElementById('signuppassword').style.borderColor = 'transparent';
    document.getElementById('signuppassword').style.outline = 'initial';
}
if (document.getElementById('signupemail').value == ''){
	document.getElementById('signupemail').style.borderColor = 'red';
    document.getElementById('signupemail').style.outline = 'none';
     } else {
	document.getElementById('signupemail').style.borderColor = 'transparent';
    document.getElementById('signupemail').style.outline = 'initial';
}
if (document.getElementById('signuparea').value == ''){
	document.getElementById('signuparea').style.borderColor = 'red';
    document.getElementById('signuparea').style.outline = 'none';
     } else {
	document.getElementById('signuparea').style.borderColor = 'transparent';
    document.getElementById('signuparea').style.outline = 'initial';
}
	 
if (document.getElementById('signupusername').value != '' && document.getElementById('signuppassword').value != '' && document.getElementById('signupemail').value != '' && document.getElementById('signuparea').value != '' && document.getElementById('signupusername').value.includes(' ') != true){	 
document.getElementById('registerform').submit();
}
}

document.getElementById('signuparea').onkeyup= function(event) { 
if (event.which == 13 && event.shiftKey === false){
checksignup();
}
}

</script>


<input type='button' name='register' id='register' value='Register' class='newbutton' onclick='checksignup()'/> 
<input type='text' name='fbse' id='fbse' style='display: none;' value='no'/>
<input type='button' name='fbsignup' id='fbsignup' class='fbbutton' value='Sign Up with facebook' onclick='document.getElementById(\"fbse\").value = fbtoken; checksignup();'/>    
</center>
</form>


</div>			
		
 

<div id='fade' class='black_overlay' onclick = \"document.getElementById('titlethis').style.zIndex = '0'; document.getElementById('centertitle').src = 'images/logoafter.png'; document.getElementById('mainbuttons').style.display='none'; document.getElementById('light').style.display='none'; document.getElementById('signup_content').style.display='none'; document.getElementById('fade').style.display='none'; document.getElementById('wade').style.display='none'; document.getElementById('shade').style.display='none'; document.getElementById('jobsearch').focus(); document.getElementById('curpeople').style.display='none';\"></div> 
</center>       

</font>
         
      ";
         
         
         
}




//FORGOT PASSWORD SCRIPT
if (!empty($_POST['forgotemail'])){

$femail = ($_POST['forgotemail']);
$fsql="SELECT DISTINCT password FROM users WHERE email = '".$femail."'";
$fresult = mysql_query($fsql);
while($frow = mysql_fetch_array($fresult)) 
{
$fpass = $frow['password'];
$fuser = $frow['username'];
}

$message = $fuser." Your password is ".$fpass;
$message = wordwrap($message, 70, "\r\n");
mail($femail, 'Password Reminder', $message);

echo "

<div id='fpbox' class='newwhite_content' style='z-index: 1900; cursor: default; color: white; font-size: 25; font-weight: bold; text-align: center;'>
<span id='fpcontent'>Your Password was sent to your Email</span><br><br>
<a class='newbutton' style='text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;' onclick=\"document.getElementById('fpbox').style.display='none'; document.getElementById('fpback').style.display='none'\">Ok</a>
</div>
<div id='fpback' class='newblack_overlay' style='z-index: 1800;' onclick = \"document.getElementById('fpbox').style.display='none'; document.getElementById('fpback').style.display='none';\"></div> 

";

if (empty($fpass)){
echo "<script type='text/javascript'>alert('Invalid E-mail')</script>";
}

}


if (isset($_GET['clickedhere'])) {
echo "<script>";
echo "document.getElementById('titlethis').style.zIndex = '9999'; document.getElementById('centertitle').src = 'images/logobefore.png'; document.getElementById('fade').style.display='block'; document.getElementById('wade').style.display='block'; document.getElementById('shade').style.display='block'; document.getElementById('light').style.display='block'; document.getElementById('signup_content').style.display='none'; document.getElementById('mainbuttons').style.display='block'; document.getElementById('username').focus(); document.getElementById('username').placeholder='';";
echo "</script>";
}

if (isset($_GET['slogin'])){
echo "
<script>
document.getElementById('light').style.display='block'; 
document.getElementById('username').focus(); 
document.getElementById('username').placeholder='';
</script>
";
}
if (isset($_GET['ssignup'])){
echo "
<script>
document.getElementById('signup_content').style.display='block'; 
document.getElementById('signupusername').focus(); 
document.getElementById('signupusername').placeholder='';
</script>
";
}

    ?>
    
<?php

if (!empty($_SESSION['username']) || isset($_GET['nofront'])){} else {    
echo "    
    <img id='shade' src='images/frontpage.png' alt='people' height='' width='100%' style='position: fixed; top: 35%; z-index: 1150;'></img>   
<div id='wade' class='sblack_overlay' onclick=\"document.getElementById('titlethis').style.zIndex = '0'; document.getElementById('centertitle').src = 'images/logoafter.png'; document.getElementById('mainbuttons').style.display='none'; document.getElementById('light').style.display='none'; document.getElementById('signup_content').style.display='none'; document.getElementById('fade').style.display='none'; document.getElementById('wade').style.display='none'; document.getElementById('shade').style.display='none'; document.getElementById('jobsearch').focus();  document.getElementById('curpeople').style.display='none'; \"></div> 
";

}

?>

<script type="text/javascript">
function openclosefbox() {
if (document.getElementById("ftest2").style.display=='none'){
    document.getElementById("ftest2").style.display = "";}
    else{document.getElementById("ftest2").style.display = "none";}
}
</script>


<?php
if (isset($_GET['nofront'])) {

}
?>

<script>
if (window.frameElement) {
  window.parent.history.replaceState('Object', 'Title', '/blank.php?page=index.php');
}
</script>

