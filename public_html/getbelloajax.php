<?php include "databaselogin.php"; session_start();

$username = $_SESSION['username'];

if (isset($username)){
echo "<center><b style='cursor: default;'>notifications</b></center><hr style='margin: 0px; border-color: lightgreen; border-width: 1px;'>";
$sql="SELECT * FROM notifications WHERE rusername = ('".$username."') order by id desc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$id = $row['id'];
$title = urlencode($row['title']);
$content = $row['content'];
$susername = $row['susername'];
$time = $row['time'];


echo "<div onclick='document.getElementById(\"man\").src = \"content.php?title=".$title."&id=".$content."\";' style='cursor: pointer;' onmouseover=\"this.style.backgroundColor='lightgreen'\" onmouseout=\"this.style.backgroundColor='white'\" >";




$sql2="SELECT * FROM users WHERE username = ('".$susername."')";
$result2 = mysql_query($sql2);
while($row2 = mysql_fetch_array($result2)) 
{
$profpic = $row2['profpic'];
if (!empty($profpic)){
echo '<img style="float: left; height: 76px; width: 76px;" src="https://sparkwill.com/users/'.$susername.'/images/'.$profpic.'" onclick="if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); document.getElementById(\'man\').src = \'other.php?other='.$susername.'\';">';
} else {
echo '<img style="float: left; height: 76px; width: 76px;" src="https://sparkwill.com/images/post/default.jpg" onclick="if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); document.getElementById(\'man\').src = \'other.php?other='.$susername.'\';">';
}
}




echo "<span style='color: green; font-size: 120%;' onclick='if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); document.getElementById(\"man\").src = \"other.php?other=".$susername."\";'>".$susername."</span><b style='float: right;'>".$time."</b><br>".urldecode(urldecode($title))."<br><br>";
echo "<span style='float: right; color: red; font-size: 15; font-weight: bold;' onclick='if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); dnotif(\"".$id."\");'>Delete</span><br>";
echo "</div>";
echo "<hr style='margin: 0px; border-color: lightgreen; border-width: 1px;'>";


}
mysql_query("UPDATE notifications SET seen = '1' WHERE rusername = ('".$username."')");
                     }




?>




