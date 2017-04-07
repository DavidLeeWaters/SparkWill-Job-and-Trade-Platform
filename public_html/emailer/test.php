<?php

$message = "You should post to SparkWill.com \r\n You can get your job/hiring ad seen by 1000's of applicants/job seekers for FREE. \r\n this month only click here SparkWill.com";
$message = wordwrap($message, 70, "\r\n");

mail("davidwaters401@yahoo.com", "FREE Job/Hiring Ad Posting20", $message);

echo "done20";


$to = 'davidwaters401@yahoo.com';
$subject = 'FREE Job/Hiring Ad Posting21';
$message = 'You should post to SparkWill.com \r\n You can get your job/hiring ad seen by 1000\'s of applicants/job seekers for FREE. \r\n this month only click here SparkWill.com';
$headers = 'From: marketing@sparkwill.com' . "\r\n" . 'Reply-To: marketing@sparkwill.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

echo "done21";


?>