<?php include "databaselogin.php"; session_start();
$timezone = -5;
$curday = gmdate("Y/m/j", time() + 3600*($timezone));

if ($_GET['s'] != 'undefined'){$_SESSION['style'] = $_GET['s'];}

$page = $_GET['page'];
$term = $_GET['t'];
$area = urlencode($_GET['area']);
$state = $_GET['state'];
$minprice = mysql_real_escape_string($_GET['minprice']);
$maxprice = mysql_real_escape_string($_GET['maxprice']);
$_SESSION['state'] = $state;

$variables = $_GET['c'];

$variables = str_replace(",","",$variables);

$variables = str_replace("*1*"," AND time LIKE ('%".$curday."%') ",$variables);
$variables = str_replace("*2*"," AND picnames <> ('default.jpg') ",$variables);

$start = "SELECT * from postings WHERE section LIKE ('%".$_SESSION['section']."%') AND type = ('".$_SESSION['type']."')";
if (!empty($variables)){$start = $start;}

$middle = $start.$variables." AND state = ('".$state."') AND area LIKE ('%".$area."%') ";

if ($minprice != '' && $maxprice != ''){
$middle = $middle." AND pay BETWEEN '".$minprice."' AND '".$maxprice."' ";
}

if (isset($term)){
$end = $middle." AND title LIKE ('%".$term."%') order by id desc";
} else {
$end = $middle." order by id desc";
}

$nextend = $end." limit ".($page * 20).",".(($page + 1) * 20);

$end = $end." limit ".(($page - 1) * 20).",20";

if (mysql_num_rows(mysql_query($nextend)) > 0) {$next = 'true';} else {$next = 'false';}








echo "<div class=\"dive\"><ul class=\"ule\">";
echo "<br>";


//List
if ($_SESSION['style'] == "List") {
$result = mysql_query($end);
while($row = mysql_fetch_array($result)) 
{
$title = urlencode($row['title']);
$showid=($row['id']);
$picnames=($row['picnames']);
$filename2 = explode(",",$picnames);

if (!empty($row['title'])){
echo "    <li class=\"lie\">
      <h3 class=\"h3e\"><a style='color: green;' href='content.php?title=".$title."&id=".$row['id']."'>".urldecode($row['title'])."</a></h3>
      ".$row['time']."
    </li> ";
}
}
}


//Thumb
if ($_SESSION['style'] == "Thumb") {
$result = mysql_query($end);
while($row = mysql_fetch_array($result)) 
{
$title = urlencode($row['title']);
$showid=($row['id']);
$picnames=($row['picnames']);
$filename2 = explode(",",$picnames);
if (!empty($row['title'])){
echo "
<li class=\"lie\" style=\"opacity: 1.0;\">
<a class='tooltip' href='content.php?title=".$title."&id=".$row['id']."'>
";

if ($picnames=='default.jpg'){
 echo "<img src=\"images/post/default.jpg\" height=\"50px\" width=\"50px\" class=\"bpic\"/>";
} else {
 echo "<img src=\"images/post/$showid/$filename2[0]\" height=\"50px\" width=\"50px\" class=\"bpic\"/>";
}

echo "
<span>
";

if ($picnames=='default.jpg'){
 echo "<img src=\"images/post/default.jpg\" height=\"150px\" width=\"150px\"/>";
} else {
 echo "<img src=\"images/post/$showid/$filename2[0]\" height=\"150px\" width=\"150px\"/>";
}

echo "
</span>
</a>
      <h3 class=\"h3e\"><a style='color: green;' href='content.php?title=".$title."&id=".$row['id']."'>".urldecode($row['title'])."</a></h3>
      ".$row['time']."
    </li> 
";
}

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


//Gallery
if ($_SESSION['style'] == "Gallery") {
$num = 1;
$result = mysql_query($end);
echo "<div class=\"container\">";
while($row = mysql_fetch_array($result)) {
$title = urlencode($row['title']);
$showid=($row['id']);
$picnames=($row['picnames']);
$filename2 = explode(",",$picnames);
if (!empty($row['title'])){
echo "<li class=\"lie\" style='text-align: center; color: darkgreen;'>
      <div class=\"imgwrapper\">
<a href='content.php?title=".$title."&id=".$row['id']."'>
";

if ($picnames=='default.jpg'){
 echo "<img id='abc".$num."' class='gimg' src=\"images/post/default.jpg\">";
} else {
 echo "<img id='abc".$num."' class='gimg' src=\"images/post/$showid/$filename2[0]\">";
}

echo "
</a></div>
      <h3 class=\"h3e\"><a style='color: green;' href='content.php?title=".$title."&id=".$row['id']."'>".urldecode($row['title'])."</a></h3>
      ".$row['time']."<br>";

if (count($filename2) > 1){
 echo "<a href= '' id='left".$num."' style='float:left; color: green;'>back</a> <a href='' id='right".$num."' style='float:right; color: green;'>next</a>"; 
}

echo "</li>";

if (count($filename2) > 1){
echo "<script>";
echo "pics".$num." = []; ";
foreach ($filename2 as $key=>$value){
echo "pics".$num.".push (\"".$value."\"); ";
};
echo "
picturenumber".$num." = 0;
  document.getElementById('left".$num."').onclick = function() {
if (picturenumber".$num." != 0) { picturenumber".$num." = picturenumber".$num." - 1; };
    document.getElementById('abc".$num."').src=\"images/post/".$showid."/\"+pics".$num."[picturenumber".$num."];
    return false;
  };
  
  document.getElementById('right".$num."').onclick = function() {
if (picturenumber".$num." != ".(count($filename2)-1).") { picturenumber".$num." = picturenumber".$num." + 1; };
    document.getElementById('abc".$num."').src=\"images/post/".$showid."/\"+pics".$num."[picturenumber".$num."];
    return false;
  };
";

echo "</script>";
}
$num++;
}
}

echo "</div>";
}


echo "</ul></div>";

echo '<div style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;" unselectable="on" onselectstart="return false;" onmousedown="return false;">';

if ($page == 1){
if ($next == 'true'){
echo '<center><a class="mainnewbutton" style="height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; color:white; cursor:pointer;" onclick="page = (page + 1); Search();">Next ('.($page + 1).')</a></center>';
}
} else {


echo '<center><a class="mainnewbutton" style="height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; color:white; cursor:pointer;" onclick="page = (page - 1); Search();">Back ('.($page - 1).')</a>';


if ($next == 'true'){
echo '<a class="mainnewbutton" style="height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; color:white; cursor:pointer;" onclick="page = (page + 1); Search();">Next ('.($page + 1).')</a></center>';
} else {echo '</center>';}


}

echo '</div>';

?>