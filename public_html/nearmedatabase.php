<?php

$dbhost = "localhost"; 
$dbname = "chocomilkdb"; 
$dbuser = "davidwaters2"; 
$dbpass = "Newlife4me!"; 

mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());


//this checks if the FBID is already in use, might want to use this for verification intermittently.
$result = mysql_result(mysql_query("select count(1) from GPS where fbid = ".$_GET['FBID'].""), 0);
//does something if FBID is not already in use.
if ($result==0){}


function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = $unit;

switch ($unit) {
    case "Kilo":
        return ($miles * 1.609344);
        break;
    case "Nautical":
        return ($miles * 0.8684);
        break;
    case "Meter":
        return ($miles * 1609.344);
        break;
    case "Feet":
        return $miles * 5280;
        break;
    case "Mile":
        return $miles;
        break;

    default:
        return $miles * 5280;
}

}





if(!empty($_GET['FBID'])){
$FBID = $_GET['FBID'];
}else{
$FBID = 'NULL';
}

if(!empty($_GET['FirstName'])){
$FirstName = $_GET['FirstName'];
}else{
$FirstName = 'NULL';
}

if(!empty($_GET['Latitude'])){
$Latitude = $_GET['Latitude'];
}else{
$Latitude = 'NULL';
}

if(!empty($_GET['Longitude'])){
$Longitude = $_GET['Longitude'];
}else{
$Longitude = 'NULL';
}

if(!empty($_GET['Info'])){
$Info = $_GET['Info'];
}else{
$Info = 'NULL';
}

if(!empty($_GET['Relationship'])){
$Relationship = $_GET['Relationship'];
}else{
$Relationship = 'NULL';
}





mysql_query("REPLACE INTO GPS (FBID, FirstName, Latitude, Longitude, Info, Relationship) VALUES ('".$FBID."', '".$FirstName."', '".$Latitude."', '".$Longitude."', '".$Info."', '".$Relationship."')");


$lat1 = $Latitude;
$lon1 = $Longitude;






	 $sql="SELECT * FROM GPS";
         $result = mysql_query($sql);
         while($row = mysql_fetch_array($result)) 
             {
                 $FBID = $row['FBID'];
                 $FirstName = $row['FirstName'];
                 $Latitude = $row['Latitude'];
                 $Longitude = $row['Longitude'];
                 $Info = $row['Info'];
                 $Relationship = $row['Relationship'];

                 //echo $FBID.'fishendsectionfish';
                 //echo $FirstName.'fishendsectionfish';
                 //echo $Latitude.'fishendsectionfish';
                 //echo $Longitude.'fishendsectionfish';
                 //echo $Info.'fishendsectionfish';
                 //echo $Relationship.'fishendsectionfish';


                 $lat2 = $Latitude;
                 $lon2 = $Longitude;

                 $feet = distance($lat1, $lon1, $lat2, $lon2, "Feet");

                 if ($feet > 50){} else {

                     echo $FBID.'<nl>';
                     echo $FirstName.'<nl>';
                     echo $Latitude.'<nl>';
                     echo $Longitude.'<nl>';
                     echo $Info.'<nl>';
                     echo $Relationship.'<nl>';
                     echo $feet.'<nl>';
                     echo '<fish>';

                 }




             }


	





/*
$latitudeTo = '28.8763467';
$longitudeTo = '-82.4344804';

function distance($latitudeTo, $longitudeTo){
$latitudeFrom = '28.8763486';
$longitudeFrom = '-82.4344804';
$theta = $longitudeFrom - $longitudeTo;
$dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
$dist = acos($dist);
$dist = rad2deg($dist);
$feet = $dist * 60 * 1.1515 * 5228;
return $feet;
}
*/

















?>




















































