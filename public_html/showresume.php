<?php include "databaselogin.php"; session_start(); ?>

<script>
var showhere = window.location.href
showhere = showhere.replace("https://sparkwill.com/showresume.php?", "");
</script>

<?php
if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
echo "<scrip"."t>";
echo "if (!(window.frameElement)) {window.location = 'blank.php?page=showresume.php'+showhere;}";
echo "</scrip"."t>";
}

if (!empty($_GET['other'])){
$person=($_GET['other']);
$sql="SELECT * FROM resumes WHERE username = ('$person')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$position = $row['position'];
$experience = $row['experience'];
$education = $row['education'];
$certlic = $row['certlic'];
$degrees = $row['degrees'];
$state = $row['state'];
$area = $row['area'];
}
$sql2="SELECT * FROM users WHERE username = ('$person')";
$result2 = mysql_query($sql2);
while($row2 = mysql_fetch_array($result2)) 
{
$profpic = $row2['profpic'];
}


     $checkusername = mysql_query("SELECT * FROM resumes WHERE username = '".$person."'");
      
     if(mysql_num_rows($checkusername) == 1)
     {} else { echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">'; }


} else {
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
}

?>

<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/background.css">
<link rel="stylesheet" type="text/css" href="css/list.css">
<link rel="icon" type="image/png" href="images/Logo.png" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />

<a class="newbutton" style="position: fixed; top: 1px; height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; float:left; color:white; cursor:pointer;" onclick="window.history.back();">Go Back</a>



<script>
if (window.frameElement) {
  window.parent.history.replaceState('Object', 'Title', '/blank.php?page=showresume.php&other=<?php echo $person; ?>');
}
</script>



<title>Resume</title>   
<script>
 window.parent.document.title = "Resume";
</script>
    <header>
      <div class="wrapper" onclick="document.getElementById('showlight').style.visibility ='hidden'; document.getElementById('show').style.visibility ='hidden';">
          <nav style="">
<img src="images/Logo.png" alt="Logo" height="40px" width="40px"></img>
<a class='maintabs' href="index.php">Home</a>

			
<?php 
if (!empty($_SESSION['loggedin'])){
include 'loggedinmenu.php';
} else {
echo "<a class='maintabs' href='index.php?clickedhere=true'>Log In</a>";
}
?>

          </nav>
      </div>
    </header>

<script>
function srf(){
var person = <?php echo "'".$person."'"; ?>;

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

  xhttp.open("GET", "srfajax.php?p="+person, true);
  xhttp.send();
}
</script>
		
      <div class="wrapper">

     
<br>
<br>
<div id='results' style='position: absolute; z-index: 600; right: 0.5%; margin-top: 1.15%;'></div>
<br>
<br>

<div style='float: left; margin-left: 10%; padding-right: 20px;'>

<?php

echo "<center><span style='font-size: 45; color: green; cursor: pointer;' onclick='window.location = \"other.php?other=".$person."\";' onmouseover='this.style.color = \"white\";' onmouseout='this.style.color = \"green\";'>".$person."</span>";

$sql4="SELECT * FROM resumes WHERE username = ('$person')";
$result4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($result4)) 
{
if ($row4['filename'] != null){
echo "<img id='noteme' src='images/notepad.png' style='margin-top: 10px; float: right; height: 40px; width: 40px; cursor: pointer;' onmouseover='document.getElementById(\"note\").style.display=\"block\";' onmouseout='document.getElementById(\"note\").style.display=\"none\";'></img>
<span id='note' style='cursor: default; margin-left: 266px; margin-top: -10px; position: fixed; opacity: 0.8; font-size: 20; display: none; background: black; color: white; border-radius: 3px;' onmouseover='this.style.display=\"block\";' onmouseout='this.style.display=\"none\";'>Show Uploaded Resume</span>
";


echo "
<script>
document.getElementById('noteme').addEventListener('click', function(){
   srf();
});
document.getElementById('note').addEventListener('click', function(){
   srf();
});
</script>
";

}
}

echo "</center>";



if ($profpic!=''){
echo "<img id='displayedimage' src='users/".$person."/images/".$profpic."' style='border: 3px ridge white; height: 300px; width: 300px; cursor: pointer;' onclick=\"document.getElementById('enlargedpicture').style.display=''; document.getElementById('picturefade').style.display='';\" onmouseover=\"this.style.border ='3px ridge green';\" onmouseout=\"this.style.border ='3px ridge white';\"></img>";
} else {
echo "<img id='displayedimage' src='images/post/default.jpg' style='border: 3px ridge white; height: 300px; width: 300px; cursor: pointer;' onclick=\"document.getElementById('enlargedpicture').style.display=''; document.getElementById('picturefade').style.display='';\" onmouseover=\"this.style.border ='3px ridge green';\" onmouseout=\"this.style.border ='3px ridge white';\"></img>";
}
?>
</div>
<br>
<br>
<br>
<div style='font-size: 18;'>
<?php

if (isset($username) && $person != $username){
echo "
<button class='newbutton' style='position: absolute; z-index: 500; margin-top: -57px; ' onclick='if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); parent.reply(\"".$person."\", \"".ucfirst($person)."\");'>Message</button>
";
}

echo "<span id='po' style='background: white;'>".$position."</span><br><br>";
echo "<span id='ex' style='background: white;'>".$experience."</span><br><br>";
echo "<span id='ed' style='background: white;'>".$education."</span><br><br>";
echo "<span id='ce' style='background: white;'>".$certlic."</span><br><br>";
echo "<span id='de' style='background: white;'>".$degrees."</span><br><br>";
echo "<span id='st' style='background: white;'>".$state."</span><br><br>";
echo "<span id='ar' style='background: white;'>".$area."</span><br><br>";

echo "<scr"."ipt>";
echo "if (document.getElementById('po').innerHTML == '<br>'){ document.getElementById('po').style.backgroundColor = 'transparent';}";
echo "if (document.getElementById('ex').innerHTML == '<br>'){ document.getElementById('ex').style.backgroundColor = 'transparent';}";
echo "if (document.getElementById('ed').innerHTML == '<br>'){ document.getElementById('ed').style.backgroundColor = 'transparent';}";
echo "if (document.getElementById('ce').innerHTML == '<br>'){ document.getElementById('ce').style.backgroundColor = 'transparent';}";
echo "if (document.getElementById('de').innerHTML == '<br>'){ document.getElementById('de').style.backgroundColor = 'transparent';}";
echo "if (document.getElementById('st').innerHTML == '<br>'){ document.getElementById('st').style.backgroundColor = 'transparent';}";
echo "if (document.getElementById('ar').innerHTML == '<br>'){ document.getElementById('ar').style.backgroundColor = 'transparent';}";
echo "</scr"."ipt>";

?>
</div>


<div id='picturefade' class='newblack_overlay' style='display: none;' onclick = "document.getElementById('enlargedpicture').style.display='none';document.getElementById('picturefade').style.display='none';"></div> 

<div id="enlargedpicture" class="newwhite_content" style="background: none; border: none; position: fixed; text-align: center; width: 400px; height: 400px; top: 10%; left: 33%; display: none;">
<img id='todisplay' src='' height='100%' width='100%' style='border-radius: 3%;'></img>

<script>
document.getElementById('todisplay').src = document.getElementById('displayedimage').src;
</script>

</div>

<br>
<div id="contentwrap">
<div style="clear: both;"> </div>
</div>
</div>
    </section>
</div>

<script>
window.onload = document.body.style.background = 'lightgreen';
</script>