<?php

$min = $_GET['min'];
$max = ($min + 5);

$message = "You should post to SparkWill.com \r\n You can get your job/hiring ad seen by 1000's of applicants/job seekers for FREE. \r\n this month only click here SparkWill.com";
$message = wordwrap($message, 70, "\r\n");
$headers = "From: marketing@sparkwill.com \r\n Reply-to: marketing@sparkwill.com";


$finalarray = [];



$files = scandir('files/');
foreach($files as $filename) {
  $lines = file('files/'.$filename, FILE_IGNORE_NEW_LINES);
  $lines = array_unique($lines);
  $finalarray = array_merge($finalarray, $lines);
}

$finalarray = array_unique($finalarray);
$end = count($finalarray);
$num = 0;
foreach ($finalarray as $printme){
if ($num >= $min){
$printme = str_replace("['","",$printme);
$printme = str_replace("']","",$printme);
mail($printme, "FREE Job/Hiring Ad Posting", $message, $headers);
echo $num."|".$printme."<br>";
}
if ($num == $end){
echo "<br><br><br>finished";
exit();
}
if ($num == ($max - 1)){
echo '<meta http-equiv="refresh" content="5;url=http://davidlwatersjr.com/emailer/mailajax.php?min='.$max.'" />';
exit();
}
$num++;
}














?>