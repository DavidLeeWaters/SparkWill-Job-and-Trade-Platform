<?php include "../databaselogin.php"; session_start();


$sql="SELECT COUNT(*) FROM users WHERE password != 'robinhood'";
$result = mysql_fetch_array(mysql_query($sql));

echo "<span style='font-size: 200px; font-weight: bold; position: fixed; left: 45%; top: 30%;'>".($result[0] - 13)."</span>";

?>

<title>User Count</title>