<?php include "databaselogin.php"; session_start();

$username = $_SESSION['username'];
$timezone = -5;
$time = gmdate("Y/m/j ".','." H:i", time() + 3600*($timezone));


if (isset($_GET['test'])){
$address = $_GET['test'];



if (isset($_GET['other'])){$tempother = $_GET['other']; $_GET['other'] = $tempother;}


if (strpos($address, 'list.php') === 0){}


include $address;


}


?>
