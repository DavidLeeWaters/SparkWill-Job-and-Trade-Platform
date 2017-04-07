<?php include "databaselogin.php"; session_start();
if (isset($_SESSION['username'])){

$username = $_SESSION['username'];
$person = $_GET['id'];



mysql_query("UPDATE messages SET hidefrom= concat('$".$username."$',hidefrom) WHERE (susername = '".$person."' OR rusername = '".$person."') AND hidefrom NOT LIKE '%$".$username."$%' ");


}
?>