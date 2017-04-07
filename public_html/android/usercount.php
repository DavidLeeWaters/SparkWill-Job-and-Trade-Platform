<?php include "../databaselogin.php";

$sql="SELECT COUNT(*) FROM users WHERE verify = 'yes'";
$result = mysql_fetch_array(mysql_query($sql));


   $res = json_encode($result[0]-4);
   echo $res;


?>