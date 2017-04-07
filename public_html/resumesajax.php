<?php include "databaselogin.php"; session_start();
$timezone = -5;
$curday = gmdate("Y/m/j", time() + 3600*($timezone));

if ($_GET['s'] != 'undefined'){$_SESSION['resumestyle'] = $_GET['s'];}

$term = $_GET['t'];
$area = $_GET['area'];
$state = $_GET['state'];
$_SESSION['state'] = $state;

$variables = $_GET['c'];

$variables = str_replace(",","",$variables);

$variables = str_replace("*1*"," AND degrees LIKE '%highschool%' ",$variables);
$variables = str_replace("*2*"," AND degrees LIKE '%associates%' ",$variables);
$variables = str_replace("*3*"," AND degrees LIKE '%bachelors%' ",$variables);
$variables = str_replace("*4*"," AND degrees LIKE '%masters%' ",$variables);
$variables = str_replace("*5*"," AND degrees LIKE '%phd%' ",$variables);
$variables = str_replace("*6*"," AND degrees LIKE '%md%' ",$variables);
$variables = str_replace("*7*"," AND degrees LIKE '%jd%' ",$variables);

$start = "SELECT * from resumes WHERE id >= 1";
if (!empty($variables)){$start = $start;}


$middle = $start.$variables." AND state = ('".$state."') AND area LIKE ('%".$area."%') ";

if (isset($term)){
$end = $middle." AND position LIKE ('%".$term."%') order by id desc";
} else {
$end = $middle." order by id desc";
}



echo "
<script>
var rusername = '';
function rboxsearch(){

  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById(rusername+'rbox')
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName('script'); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }

  xhttp.open('GET', 'rboxajax.php?r='+rusername, true);
  xhttp.send();
}

</script>
";


echo "<div class='dive'><ul class='ule'>";

//Text
if ($_SESSION['resumestyle'] == "Text") {
$result = mysql_query($end);
while($row = mysql_fetch_array($result)) 
{
echo "<li class='lie' style='opacity: 1.0;'><h3 class='h3e'><span style='float: left;'><a style='text-decoration:none; color:green;' href='https://sparkwill.com/showresume.php?other=".$row['username']."'>".$row['username']."</a><font color='darkgreen' size='3'> <b>[".$row['position']."]  [".$row['degrees']."]</b></font></span></h3>
"; 

$sql4="SELECT * FROM resumes WHERE username = ('".$row['username']."')";
$result4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($result4)) 
{
if ($row4['filename'] != null){
echo "<img id='".$row['username']."noteme' src='images/notepad.png' style='height: 30px; width: 30px; cursor: pointer;'></img>";

echo "
<div id='".$row['username'].'rbox'."' style='display: none;'></div>
<script>

document.getElementById('".$row['username']."noteme').addEventListener('click', function(){
rusername = '".$row['username']."';
rboxsearch();
});

</script>
";
}
}

echo "</li>";
}
}






//Pictures
if ($_SESSION['resumestyle'] == "Pictures") {
$result = mysql_query($end);
while($row = mysql_fetch_array($result)) 
{
$showid=($row['id']);

echo "    <li class='lie' style='opacity: 1.0;'>
<h3 class='h3e'><a style='text-decoration:none; color:green;' href='https://sparkwill.com/showresume.php?other=".$row['username']."'>".$row['username']."</a></h3>
      <a class='tooltip' href='https://sparkwill.com/showresume.php?other=".$row['username']."'>
";

$result5 = mysql_query("SELECT * FROM users WHERE username = '".$row['username']."'");
while($row5 = mysql_fetch_array($result5)) 
{

if (!empty($row5['profpic'])){
echo "
<img src=\"users/".$row5['username']."/images/".$row5['profpic']."\" height=\"50px\" width=\"50px\" class=\"bpic\"/>
<span><img src=\"users/".$row5['username']."/images/".$row5['profpic']."\" height=\"150px\" width=\"150px\"/></span>
";
} else {
echo "
<img src=\"images/post/default.jpg\" height=\"50px\" width=\"50px\" class=\"bpic\"/>
<span><img src=\"images/post/default.jpg\" height=\"150px\" width=\"150px\"/></span>
";
}

}


echo "
</a>
<font color='darkgreen' size='3'>   
Position| <b>".$row['position']."</b><br>
Education| <b>".$row['degrees']."</b><br>
</font>
";

$sql4="SELECT * FROM resumes WHERE username = ('".$row['username']."')";
$result4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($result4)) 
{
if ($row4['filename'] != null){
echo "<img id='".$row['username']."noteme' src='images/notepad.png' style='height: 30px; width: 30px; cursor: pointer;'></img>";

echo '
<div id="'.$row['username'].'xnote" style="font-size: 150%; position: fixed; background: black; color: white; display: none; opacity: 0.8;"></div>
<script>
function '.$row['username'].'notemeon() {
document.getElementById("'.$row['username'].'xnote").innerHTML = "Show Resume";
document.getElementById("'.$row['username'].'xnote").style.display = "block";
document.getElementById("'.$row['username'].'xnote").style.top = (document.getElementById("'.$row['username'].'noteme").offsetTop + document.getElementById("'.$row['username'].'noteme").clientHeight + 72);
document.getElementById("'.$row['username'].'xnote").style.left = (document.getElementById("'.$row['username'].'noteme").offsetLeft + 150);
}
document.getElementById("'.$row['username'].'noteme").addEventListener("mouseover", function(){
'.$row['username'].'notemeon();
});
document.getElementById("'.$row['username'].'noteme").addEventListener("mouseout", function(){
document.getElementById("'.$row['username'].'xnote").style.display = "none";
});
</script>
';

echo "
<div id='".$row['username'].'rbox'."' style='display: none;'></div>
<script>

document.getElementById('".$row['username']."noteme').addEventListener('click', function(){
rusername = '".$row['username']."';
rboxsearch();
});

</script>
";





}
}

echo "</li> ";









}


echo "<script>";

echo "
var tooltips = document.querySelectorAll('.tooltip span');

window.onmousemove = function (e) {
    var x = (e.clientX + 20) + 'px',
        y = (e.clientY + 20) + 'px';
    for (var i = 0; i < tooltips.length; i++) {
        tooltips[i].style.top = y;
        tooltips[i].style.left = x;
    }
};
";

echo "</script>";
}








echo "</ul></div>";



?>