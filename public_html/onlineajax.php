<?php include "databaselogin.php"; session_start();

$timezone = -4;
$time = gmdate("Y/m/j ".','." H:i", time() + 3600*($timezone));

if (isset($_SESSION['username']) && isset($_GET['status'])){
$username = ($_SESSION['username']);
$status = ($_GET['status']);
mysql_query("UPDATE users SET online = '$status' WHERE username = '$username'");

if ($status == 'yes'){
mysql_query("UPDATE users SET lastlogin = '$time' WHERE username = '$username'");
}

if ($status == 'no'){
if (isset($_SESSION['loggedin'])){unset($_SESSION['loggedin']);} 
if (isset($_SESSION['username'])){unset($_SESSION['username']);}
if (isset($_SESSION['password'])){unset($_SESSION['password']);}
if (isset($_SESSION['email'])){unset($_SESSION['email']);}   
session_destroy();
echo "<script>window.parent.location = 'index.php?loggingout=true';</script>";
}

}
?>