<?php include "databaselogin.php"; session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<link rel="icon" type="image/png" href="images/Logo.png" sizes="16x16">

<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/background.css">
<link rel="stylesheet" type="text/css" href="css/list.css">
<link rel="stylesheet" type="text/css" href="css/search.css">

<div id="top"></div>
<script>
i=0;
function rinout(){
if (i==0){i=1; document.getElementById('micro').style.background = 'white';} else {i=0; document.getElementById('micro').style.background = 'linear-gradient(#333, #222)';}
}
</script>
<?php 
include "js/microphone.js"; 

if (isset($_GET['fromfront'])){
echo '<a class="newbutton" style="position: absolute; top: 1px; height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; float:left; color:white; cursor:pointer;" onclick="window.location.href = \'index.php?nofront=yes\';">Go Back</a>';
echo "
<script>
if (parent.window.location.href.includes('https') == false) {
   window.location.href = 'https://sparkwill.com/resumes.php'; 
}
window.parent.history.replaceState('Object', 'Title', 'https://sparkwill.com/resumes.php');
</script>
";
} else {
echo '<a class="newbutton" style="position: absolute; top: 1px; height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; float:left; color:white; cursor:pointer;" onclick="window.history.back();">Go Back</a>';
}
?>



<title>Resumes</title>   
<script>
 window.parent.document.title = "Resumes";
</script>	
    <header>
      <div class="wrapper">
          <nav style="">
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




  

<section class="webdesigntuts-workshop" style="display: inline-block;">
		    
		<input type="search" placeholder="Search..." id="search" onmouseover='this.focus();' onmouseout='' oninput="Search();" onfocus='glowme();' onfocusout="glowout();"></input>
<button id='micro' onmouseover="document.getElementById('searchnote').style.display='block';" onmouseout="document.getElementById('searchnote').style.display='none';" onclick="startDictation(event); rinout()" style="width:40px; border-radius: 0 0 0 0; border-left: none;"><label for="search"><img src="images/voice.png" alt="microphone" height="40px" width="40px"></label></button>	    	
		<button onclick="Search(); if (recognizing){rinout(); recognition.stop();return;};" style="border-left: none;" >Search</button>

<span class='toptimebubble' id='searchnote' style='margin-left: 45.5%; position: absolute; margin-top: 40px; opacity: 0.8; font-size: 20; display: none; background: black; color: white; border-radius: 3px;' onmouseover='this.style.display = "block";' onmouseout='this.style.display = "none";'>Voice Search</span>

</section>


<script>
if (!(window.frameElement)) {
  document.getElementById('searchnote').style.marginRight = '26%';
}
function glowme(){
document.getElementById('micro').style.borderColor = "forestgreen";
}
function glowout(){
document.getElementById('micro').style.borderColor = "#000";
}
</script>


          </nav>
      </div>
    </header>


	

    <section id="main">
	

	  <div id="leftCol"><font size='3' color='blue'>
          <br><br><br>


<?php 



echo "<font style=\"color:firebrick; font-size: 30; font-family: 'Times New Roman', Georgia, Serif; \"><center><b>Resum&eacutes</b></center></font>"; 

?>

<select name='state' id='state' style='height: 30px; font-size: 18;' onchange='Search();'>

        <option value='FL'>Florida</option>
	<option value='AL'>Alabama</option>
	<option value='AK'>Alaska</option>
	<option value='AZ'>Arizona</option>
	<option value='AR'>Arkansas</option>
	<option value='CA'>California</option>
	<option value='CO'>Colorado</option>
	<option value='CT'>Connecticut</option>
	<option value='DE'>Delaware</option>
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
	<option value='DC'>Washington D.C.</option>
	<option value='WV'>West Virginia</option>
	<option value='WI'>Wisconsin</option>
	<option value='WY'>Wyoming</option>
</select>

<br>
<br>

<style>
input::-webkit-input-placeholder { /* WebKit browsers */
    color: white;
}
input:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color: white;
}
input::-moz-placeholder { /* Mozilla Firefox 19+ */
    color: white;
}
input:-ms-input-placeholder { /* Internet Explorer 10+ */
    color: white;
}
</style>

<input type='text' onmouseover='this.focus(); this.placeholder=""; this.style.outline = "1px solid lime"; ' onmouseout='this.blur(); this.placeholder="Area"; this.style.outline = "none"; ' style='outline: 0 none; border-style: none; color: white; background: forestgreen; width: 135px; text-align:center; vertical-align:middle; padding: 2px;' name='area' id='area' placeholder='Area' oninput="Search();"/>

<script>
document.getElementById('state').value = '<?php echo $_SESSION['state']; ?>';
if (!(window.frameElement)) {
  document.getElementById('state').value = 'FL';
}
</script>

<br>
<br>

<span style="color: green; font-weight: bold;">
<br>Highest Level of Education: <br><br>
 <input type="checkbox" name="test" id="*1*" onchange="CheckBoxer(this.id);"/>Highschool<br>
 <input type="checkbox" name="test" id="*2*" onchange="CheckBoxer(this.id);"/>Associates<br>
 <input type="checkbox" name="test" id="*3*" onchange="CheckBoxer(this.id);"/>Bachelors<br>
 <input type="checkbox" name="test" id="*4*" onchange="CheckBoxer(this.id);"/>Masters<br>
 <input type="checkbox" name="test" id="*5*" onchange="CheckBoxer(this.id);"/>PHD<br>
 <input type="checkbox" name="test" id="*6*" onchange="CheckBoxer(this.id);"/>MD<br>
 <input type="checkbox" name="test" id="*7*" onchange="CheckBoxer(this.id);"/>JD<br>
</span>
          </font></div> 
        

	
	
      <div class="wrapper">
     
     <form> 
<input type="button" class="newbutton" name="Text" value="Text" onclick="Search(this.value)">
<input type="button" class="newbutton" name="Pictures" value="Pictures" onclick="Search(this.value)">
</select>
</form>



<br>


<div id="results"></div>



<script>
var assignedTos = '';
var assignedTo = '';

function CheckBoxer(pid){
if (document.getElementById(pid).checked == true){
assignedTo = assignedTo+pid;

} else {
assignedTo = assignedTo.replace(pid,'');

}

area = document.getElementById('area').value;
state = document.getElementById('state').value;

  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("results")
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }
searchvar = document.getElementById('search').value;
  xhttp.open("GET", "resumesajax.php?c="+assignedTo+"&t="+searchvar+"&s=undefined"+"&state="+state+"&area="+area, true);
  xhttp.send();

assignedTos = assignedTo;
};

function Search(str){
area = document.getElementById('area').value;
state = document.getElementById('state').value;

searchvar = document.getElementById('search').value;
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("results")
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }

  xhttp.open("GET", "resumesajax.php?c="+assignedTos+"&t="+searchvar+"&s="+str+"&state="+state+"&area="+area, true);
  xhttp.send();
}




window.onload=Search('<?php if (isset($_SESSION['resumestyle'])){echo($_SESSION['resumestyle']);}else{echo 'Text';} ?>');



</script>


<a onclick="gotop()" id="gotop" style="display: none;"><img height="75px" width="75px" src="images/top.png" class="fixedbutton"></a>
<script>
function gotop(){
document.getElementById("top").scrollIntoView(true);
}

window.onscroll = function() {showscroll()};

function showscroll() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById("gotop").style.display = "";
    } else {
        document.getElementById("gotop").style.display = "none";
    }
}
</script>


</div>
    </section>
</div>


<div id='fade' class='black_overlay' style='display: none;' onclick = "document.getElementById('lights').style.display='none';document.getElementById('fade').style.display='none'"></div> 

<?php
if (isset($_SESSION['username'])){
echo "<scrip"."t>";
echo "if (!(window.frameElement)) {window.location = 'blank.php?page=resumes.php';
;}";
echo "</scrip"."t>";
}
?>

<script>
if (window.frameElement) {
  window.parent.history.replaceState('Object', 'Title', '/blank.php?page=resumes.php'); 
}
</script>