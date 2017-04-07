<?php include "databaselogin.php"; session_start();


function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}


$timezone = -4;
$time = gmdate("Y/m/j ".','." H:i", time() + 3600*($timezone));
$username = $_SESSION['username'];









if (isset($_GET['s'])){
$searchterm = mysql_real_escape_string($_GET['s']);
$title = mysql_real_escape_string($_GET['t']);
$content = mysql_real_escape_string($_GET['c']);

$sql="SELECT * FROM users WHERE username = ('".$username."')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$curfriends = $row['friends'];
}

$curfriends2 = explode(",",$curfriends);

foreach ($curfriends2 as $key=>$value){

if (startsWith($value , $searchterm)){

     $checkusername = mysql_query("SELECT * FROM notifications WHERE rusername = '".$value."' AND susername = '".$username."' AND title = '".$title."' AND content = '".$content."'");
      
     if(mysql_num_rows($checkusername) == 1)
     { } else { 

echo "<div id='test' onclick=\"showsearcher2('".$value."');\" style='cursor: default;' onmouseover=\"this.style.color = 'white'; this.style.backgroundColor = 'green';\" onmouseout=\"this.style.color = 'black'; this.style.backgroundColor = 'white';\">".$value."</div>"; 



              }

                                     }
                                      }

                      }














if (isset($_GET['n'])){
$searchuser = $_GET['n'];
$title = $_GET['t'];
$content = $_GET['c'];

     $checkusername = mysql_query("SELECT * FROM notifications WHERE rusername = '".$searchuser."' AND susername = '".$username."' AND title = '".$title."' AND content = '".$content."'");
      
     if(mysql_num_rows($checkusername) == 1)
     {
     } else {

$result = mysql_query("INSERT INTO notifications (susername, rusername, title, content, time, seen) VALUES('".$username."', '".$searchuser."', '".$title."', '".$content."', '".$time."', '0' )");

echo "<span style='cursor: default;' onclick='showsearcher();'>You showed <font color='green'>".$searchuser."</font></span>";
            }

                      }






?>