<?php
include "databaselogin.php"; session_start();

$person = mysql_real_escape_string($_GET['searchuserp']);

if ($person != ''){

$sql="SELECT * FROM users WHERE username LIKE '%".$person."%' limit 0,20";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$showperson = $row['username']; 

if (!empty($row['profpic'])){
echo '<img id="'.$showperson.'imgid" src="users/'.$showperson.'/images/'.$row['profpic'].'" ';
} else {
echo '<img id="'.$showperson.'imgid" src="images/post/default.jpg" ';
}

echo '
height="50px" width="50px" style="vertical-align: middle; border: 1px solid white; cursor: pointer;" onclick="document.getElementById(\'man\').src = \'https://sparkwill.com/other.php?other='.$showperson.'\'; document.getElementById(\'wcbox\').style.display = \'none\'; searchuserp = \'\'; document.getElementById(\'searchuser\').value = \'\'; document.getElementById(\'searchuserresults\').innerHTML = \'\';" onmouseover="this.style.border =\'1px solid forestgreen\';" onmouseout="this.style.border =\'1px solid white\';"></img>
';

echo "<span onclick='document.getElementById(\"man\").src = \"https://sparkwill.com/other.php?other=".$showperson."\"; document.getElementById(\"wcbox\").style.display = \"none\"; searchuserp = \"\"; document.getElementById(\"searchuser\").value = \"\"; document.getElementById(\"searchuserresults\").innerHTML = \"\";' style='text-decoration: none; color: green; cursor: pointer;' onmouseover='this.style.color = \"red\";' onmouseout='this.style.color = \"green\";'>".$showperson."</span><br>";

}




}
?>