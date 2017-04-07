<?php include "../databaselogin.php"; session_start();


   
if(!empty($_SESSION['username']) && !empty($_SESSION['password'])){

$username = $_SESSION['username'];
$password = $_SESSION['password']; 

echo "you're logged in ".$username; 

}



?>