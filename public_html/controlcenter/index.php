<?php include "../databaselogin.php"; session_start();
$username = $_SESSION['username'];

if ($username == 'david'){
mysql_query("DELETE FROM users WHERE verify != ('yes')");
}





?>