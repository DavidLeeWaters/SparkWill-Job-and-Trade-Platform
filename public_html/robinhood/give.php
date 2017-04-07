<?php

//login to database
$dbhost = "localhost"; 
$dbname = "sparkwill"; 
$dbuser = "davidwaters2"; 
$dbpass = "Newlife4me!"; 

mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());


function str_lreplace($search, $replace, $subject)
{   
    $pos = strrpos($subject, $search);
    if($pos !== false){ $subject = substr_replace($subject, $replace, $pos, strlen($search)); }
    return $subject;
}

function endsWith($str, $sub) {
   return ( substr( $str, strlen( $str ) - strlen( $sub ) ) === $sub );
}

$sfn = 'PA';

$sectionarray = ['automotives','food-service','hair-styling','labor','manufacturing','nonprofit','part-time','real-estate','retail','security','skilled-trade','transport','accounting','education','engineering','finance','hardware','software','legal','management','office','science','marketing','sales'];

foreach ($sectionarray as $section) {

$file = file_get_contents("http://davidlwatersjr.com/robinhood/".$section.".txt");

$file = explode("-new-",$file);
unset($file[0]);

foreach ($file as $new){
$title = explode("-title-",$new);
$content = explode("-content-",$new);
$name = explode("-name-",$new);
$town = explode("-town-",$new);

$sql8="SELECT id FROM postings ORDER BY id DESC LIMIT 1";
$result8 = mysql_query($sql8);
while($row8 = mysql_fetch_array($result8)) 
{
$newid = ($row8['id'])+1;
}

//$time = gmdate("Y/m/j ".','." H:i", time() + 3600*($timezone));
$time = '';
$title[1] = nl2br($title[1]);
$title[1] = str_replace("<br />","",$title[1]);
$title = urlencode($title[1]);
$message = $content[1];
$name[1] = trim($name[1]);
$username = $name[1];
$town = urlencode($town[1]);
$town = str_replace("%0A","",$town);
$town = str_replace("\n","",$town);
$town = str_replace("+"," ",$town);
$section = str_replace("-"," ",$section);

$message = explode("<br>", $message);

$message2 = '';
foreach ($message as $be) {

$lines = explode("\n", wordwrap($be, 90));
$be = "";
$linenum = 0;
foreach ($lines as $key) {
if (strlen($key) > 90) {$key = chunk_split($key, 90, "<br>");}
$be = $be.$key."<br>";
$linenum++;
if ($linenum == 5){$be = $be."<br>"; $linenum = 0;}
}
$message2 = $message2.$be;
}
$message = $message2;
if (endsWith($message, "<br>")){
$message = str_lreplace("<br>", "", $message);
}



$content = urlencode($message);

mysql_query("INSERT INTO users (username, password, email, state, verify, area, friends) VALUES('".$username."', 'robinhood', 'blank', '".$sfn."', 'yes', '".urldecode($town)."', 'david')");

mysql_query("INSERT INTO postings (id, content, email, section, time, title, username, picnames, state, area, requirements, edrequirements, pay, type, semail, address) VALUES('".$newid."', '".$content."', 'blank', '".$section."', '".$time."', '".$title."',  '".$username."', 'default.jpg', '".$sfn."', '".$town."', '', '', '', 'job', '', '' )");


}

}

?>