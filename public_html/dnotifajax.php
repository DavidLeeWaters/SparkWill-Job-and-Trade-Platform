<?php include "databaselogin.php"; session_start(); if (isset($_SESSION['username'])){

$username = $_SESSION['username'];
$id = $_GET['id'];

$sql="DELETE FROM notifications WHERE id = '".$id."'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
}

echo "<scr"."ipt>";
echo "getbello();";
echo "</scr"."ipt>";

}?>



