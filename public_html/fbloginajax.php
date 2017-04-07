<?php include "databaselogin.php"; session_start();


$timezone = -5;
$time = gmdate("Y/m/j ".','." H:i", time() + 3600*($timezone));
$action = $_GET['action'];

if (isset($_GET['fbtoken'])){
$fbtoken = $_GET['fbtoken'];
}


if ($action == 'login'){

$checklogin = mysql_query("SELECT * FROM users WHERE token = '".$fbtoken."' ");
	$checklogin2 = mysql_num_rows($checklogin);	 
	 if($checklogin2!=0)
	 {
        $sql4="SELECT * FROM users WHERE token = '".$fbtoken."'";
        $result4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($result4)) 
{
        $username = $row4['username'];
        $password = $row4['password'];
        $token = $row4['token'];
	$email = $row4['email'];
        $state = $row4['state'];
        $area = $row4['area'];
}
         $_SESSION['token'] = $token;
         $_SESSION['area'] = $area;
         $_SESSION['state'] = $state;
	 $_SESSION['email'] = $email;
	 $_SESSION['username'] = $username;
	 $_SESSION['password'] = $password;
     	 $_SESSION['loggedin'] = 1;
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=blank.php?page=index.php">';   


}

}






if ($action == 'merge'){
$username = $_SESSION['username'];

mysql_query("UPDATE users SET token = '".$fbtoken."' WHERE username = '".$username."' ");

    echo 'successfully merged';

}








if ($action == 'newfbpic'){
$username = $_SESSION['username'];
if ($fbtoken != 'no'){

$files = glob('users/'.$username.'/images/*');
foreach($files as $file){ 
  if(is_file($file))
    unlink($file);
}



  $url = "https://graph.facebook.com/".$fbtoken."/picture?width=400&height=400";
  $data = file_get_contents($url);
  $fp = fopen("users/".$username."/images/profpic.jpg","wb");
  if (!$fp) exit;
  fwrite($fp, $data);
  fclose($fp);
mysql_query("UPDATE users SET profpic = 'profpic.jpg' WHERE username = '".$username."'");
    echo '<script>location.reload();</script>'; 
}

}





?>
