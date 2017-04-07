<?php  if(isset($_GET['type']) && ($_GET['type'] == 'jobs' || $_GET['type'] == 'trade' || $_GET['type'] == 'housing')){$type = $_GET['type']; if(isset($_GET['section'])){$section = $_GET['section'];}}else{header('Location: https://sparkwill.com/mobile/index.php'); exit();} include "../databaselogin.php"; include "background_loader.php"; session_start();


    if (isset($_SESSION['loggedin'])){
        echo 'logged in';
        } else {
        echo 'not logged in';
    }


?>

<link rel="icon" type="image/png" href="images/logo.png" sizes="16x16">



<!DOCTYPE html>
<html lang="en">
<head>
  <title>SparkWill <?php echo $type; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="main_font_color">
<h1><?php echo $type; ?></h1>
</div>


<?php 
if (isset($_SESSION['state'])){
$state = $_SESSION['state'];
} else {
$state ='FL';
}
if ($type == 'jobs'){
$sql="SELECT * FROM postings WHERE state='".$state."' AND type='job' AND section LIKE '%".$section."%' ORDER BY id DESC LIMIT 20";
}
if ($type == 'trade'){
$sql="SELECT * FROM postings WHERE state='".$state."' AND type='trade' AND section LIKE '%".$section."%' ORDER BY id DESC LIMIT 20";
}
if ($type == 'housing'){
$sql="SELECT * FROM postings WHERE state='".$state."' AND type='place' AND section LIKE '%".$section."%' ORDER BY id DESC LIMIT 20";
}

$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
    echo '<button type="button" class="btn btn-primary btn-block btn-lg" onclick="">'.urldecode($row["title"]).'</button><br>';
}


?>

</div>

</body>
</html>