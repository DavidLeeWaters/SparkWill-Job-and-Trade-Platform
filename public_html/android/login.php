<?php include "../databaselogin.php"; session_start();



   if(!empty($_GET['username']) && !empty($_GET['password']))
{
    $username = mysql_real_escape_string($_GET['username']);
    $password = mysql_real_escape_string($_GET['password']);

    $checklogin = mysql_query("SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."' ");
	$checklogin2 = mysql_num_rows($checklogin);	 
	 if($checklogin2!=0)
	 {

$sql4="SELECT * FROM users WHERE username = '".$username."'";
$result4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($result4)) 
{
if ($row4['verify']!='yes'){exit();}
	$email = $row4['email'];
        $state = $row4['state'];
        $area = $row4['area'];
}
         $_SESSION['state'] = $state;
         $_SESSION['area'] = $area;
	 $_SESSION['email'] = $email;
	 $_SESSION['username'] = $username;
	 $_SESSION['password'] = $password;
     	 $_SESSION['loggedin'] = 1;
echo 'Logged In';   
	 } else {
echo 'Wrong username or password';
}

        }

?>