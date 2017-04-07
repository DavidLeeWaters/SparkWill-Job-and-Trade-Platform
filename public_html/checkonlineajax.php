<?php include "databaselogin.php"; session_start();

if (isset($_SESSION['username'])){

$username = $_SESSION['username'];
$sql="SELECT * FROM users WHERE username = ('$username')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$friends=($row['friends']);
if ($friends != '') {
$friends2 = explode(",",$friends);
}
}


foreach ($friends2 as $friend){

$sql="SELECT * FROM users WHERE username = ('".$friend."') ORDER BY id desc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
if ($row['online']=='yes'){ 
echo "<scr"."ipt>";
echo "document.getElementById('online".$friend."').style.display = 'inline'; document.getElementById('online".$friend."').style.paddingRight = '3px'; document.getElementById('online".$friend."2').style.paddingLeft = '0%'; ";
echo "</scr"."ipt>";
} else {
echo "<scr"."ipt>";
echo "document.getElementById('online".$friend."').style.display = 'none'; document.getElementById('online".$friend."').style.paddingRight = '0px'; document.getElementById('online".$friend."2').style.paddingLeft = '5%'; ";
echo "</scr"."ipt>";
}
}

}

}

?>