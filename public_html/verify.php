<?php include "databaselogin.php"; session_start();

if (isset($_GET['u']) && isset($_GET['v'])) {
$username = $_GET['u'];
$verify = $_GET['v'];
if ($verify != 'yes') {
     $checkusername = mysql_query("SELECT * FROM users WHERE (username = '".$username."' AND verify = '".$verify."') ");
      
     if(mysql_num_rows($checkusername) == 1)
     {
$sql2="UPDATE users SET verify = 'yes' WHERE username = '".$username."' AND verify = '".$verify."' ";
mysql_query($sql2);

$sql="SELECT * FROM users WHERE username = '".$username."'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
         $_SESSION['email'] = $row['email'];
         $_SESSION['dob'] = $row['dob'];
	 $_SESSION['username'] = $row['username'];
	 $_SESSION['password'] = $row['password'];
         $_SESSION['state'] = $row['state'];
     	 $_SESSION['loggedin'] = 1;
echo "<script>window.location = 'blank.php?page=index.php';</script>";
}
     } else {
echo "<script>window.location = 'index.php';</script>";
            }
                    }
                                                } else {
echo "<script>window.location = 'index.php';</script>";
                                                       }

?>