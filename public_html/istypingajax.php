<?php include "databaselogin.php"; session_start();
$username = $_SESSION['username'];
$value = $_GET['v'];
if (isset($username) && isset($value)){
mysql_query("UPDATE users SET istyping = '".$value."' WHERE username = '".$username."'");
}
?>