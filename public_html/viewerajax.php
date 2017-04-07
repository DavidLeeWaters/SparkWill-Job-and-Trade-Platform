<?php include "databaselogin.php"; session_start();

$username = ($_SESSION['username']);
$timezone = -5;
$time = gmdate("Y/m/j ".','." H:i", time() + 3600*($timezone));
$id = $_GET['id'];
$toggle = $_GET['toggle'];

$ar1 = [];
$ar2 = [];
$num = 1;
$sql="SELECT * FROM postings WHERE id = ('".$id."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$skillrequirements = $row['requirements'];
$skillrequirementcount = count(explode(",",$skillrequirements));
$educationrequirements = $row['edrequirements'];
$educationrequirementcount = count(explode(",",$educationrequirements));
$applicants = $row['applicants'];
$type = $row['type'];
if ($type=='trade'){
$applicants2 = explode(",",$applicants);
} else {
$applicants2 = explode(",",$applicants);
}
echo "<div style='display: inline-block;'>";





foreach ($applicants2 as $key){

if ($type=='trade'){
$key6 = explode("-",$applicants); 
$tradename = ltrim($key6[0], "$$");
$tradebid = rtrim($key6[1], "$$");
}
$key = ltrim($key, "$$");
$key = rtrim($key, "$$");

if ($type=='trade'){
$sql="SELECT * FROM users WHERE username = ('".$tradename."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$profpic = $row['profpic'];
if ($profpic != ''){
$key2 = "users/".$tradename."/images/".$profpic; 
} else {
$key2 = "images/post/default.jpg"; 
}
}
} else {
$sql="SELECT * FROM users WHERE username = ('".$key."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$profpic = $row['profpic'];
if ($profpic != ''){
$key2 = "users/".$key."/images/".$profpic; 
} else {
$key2 = "images/post/default.jpg"; 
}
}
}
$skills = '';
$skillcount = '';
$match = '';
$sql2="SELECT * FROM skills WHERE username = ('".$key."')";
$result2 = mysql_query($sql2);
while($row2 = mysql_fetch_array($result2)) 
{
if ($skillrequirements != ''){
$skills = $row2['skills'];
$skills2 = explode(",",$skills);
foreach ($skills2 as $tempskill){
$skillcount = ($skillcount + substr_count($skillrequirements, $tempskill));
}
$match = "<font style='color: green; font-weight: bold;'>".round(($skillcount / $skillrequirementcount * 100),1)."%</font>";
}
}


$education = '';
$educationcount = '';
$edmatch = '';
$sql3="SELECT * FROM resumes WHERE username = ('".$key."')";
$result3 = mysql_query($sql3);
while($row3 = mysql_fetch_array($result3)) 
{
if ($educationrequirements != ''){
$education = $row3['degrees'];
$education2 = explode(",",$education);
foreach ($education2 as $tempeducation){
$educationcount = ($educationcount + substr_count($educationrequirements, $tempeducation));
}
$edmatch = "<font style='color: white; font-weight: bold;'>".round(($educationcount / $educationrequirementcount * 100),1)."%</font>";
}
}





















if ($key!=''){

if ($type == 'trade'){
$stick1 = "<div id='".$tradename."' style='color: white; cursor: pointer; font-size: 24; display: inline-block; border: 1px solid limegreen; border-radius: 3px;' onmouseover='this.style.border = \"1px solid green\";' onmouseout='this.style.border = \"1px solid limegreen\";' onclick='window.location = \"showresume.php?other=".$tradename."\";' >".$tradename."<span style='float: right; color: red; font-size: 20; cursor: pointer; ' onclick='if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); document.getElementById(\"".$tradename."\").style.display = \"none\";'>✕</span><br><span id='count".$id."'></span>";
} else {
$stick1 = "<div id='".$key."' style='color: white; cursor: pointer; font-size: 24; display: inline-block; border: 1px solid limegreen; border-radius: 3px;' onmouseover='this.style.border = \"1px solid green\";' onmouseout='this.style.border = \"1px solid limegreen\";' onclick='window.location = \"showresume.php?other=".$key."\";' >".$key."<span style='float: right; color: red; font-size: 20; cursor: pointer; ' onclick='if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); document.getElementById(\"".$key."\").style.display = \"none\";'>✕</span><br><span id='count".$id."'></span>";
}





if ($type=='trade'){
$stick1 = $stick1."<img src='".$key2."' style='height: 150px; width: 150px;'></img><br><div style='width: 100%; display: inline-block; background:white; color:green;'>";
$stick1 = $stick1."Bid<br><span style='color: green;'>$".$tradebid."</span></div>";
} else {
$stick1 = $stick1."<img src='".$key2."' style='height: 150px; width: 150px;'></img><br><div id='".$key."skills' style='display: inline-block; background:white; color:green;'>";
if ($match!=''){
$stick1 = $stick1."Skills<br>".$match."</div>";
} else {
$stick1 = $stick1."Skills<br>N/A</div>";
}
} 


if ($type=='trade'){
$stick1 = $stick1."<br><button class='newbutton' style='width: 100%;' onclick='if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); parent.reply(\"".$tradename."\", \"".ucfirst($tradename)."\");'>Message</button></div>";
} else {
if ($edmatch!=''){
$stick1 = $stick1."<div id='".$key."degrees' style='display: inline-block; background:green;'>Degrees<br>".$edmatch."</div>";
$stick1 = $stick1."<br><button class='newbutton' style='width: 100%;' onclick='if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); parent.reply(\"".$key."\", \"".ucfirst($key)."\");'>Message</button></div><script>document.getElementById('".$key."degrees').style.width = ((document.getElementById('".$key."').offsetWidth - document.getElementById('".$key."skills').offsetWidth ) - '2');</script>";
} else {
$stick1 = $stick1."<div id='".$key."degrees' style='display: inline-block; background:green;'>Degrees<br>N/A</div><script>document.getElementById('".$key."degrees').style.width = ((document.getElementById('".$key."').offsetWidth - document.getElementById('".$key."skills').offsetWidth ) - '2');</script>";
$stick1 = $stick1."<br><button class='newbutton' style='width: 100%;' onclick='if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); parent.reply(\"".$key."\", \"".ucfirst($key)."\");'>Message</button></div>";
}
}

if ($num == 5){
$num = 1;
$stick1 = $stick1."<br>";
} else {
$num++;
}

if ($skillcount / $requirementcount * 100){$match1 = ($skillcount / $requirementcount * 100);}

//echo $match1;
//echo $stick1;


array_push($ar1,$match1);
array_push($ar2,$stick1);

              }


echo "</div>";
}

if ($toggle == 'yes'){
echo "
<script>
if (last1!='new'){
document.getElementById('id'+last1).innerHTML = 'Show';    
eval('show' + last1 + ' = \"no\"'); 
eval('toggle' + last1 + ' = \"yes\"');
} 
document.getElementById('viewerresults').style.display = 'block'; 
last1 = '".$id."';
</script>
";
} else {
echo "
<script>
document.getElementById('viewerresults').style.display = 'none';   
last1 = 'new';
</script>
";
}






array_multisort($ar1, SORT_DESC,
                  $ar2);

foreach($ar2 as $key=>$value) {
    echo $value;
}





}



?>