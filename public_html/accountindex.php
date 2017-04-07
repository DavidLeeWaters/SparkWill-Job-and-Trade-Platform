<script>
window.onbeforeunload = function () { };
</script>
<?php include "databaselogin.php"; session_start();
$state = $_SESSION['state'];

if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
    echo "<scrip"."t>";
    echo "if (!(window.frameElement)) {window.location = 'blank.php?page=accountindex.php';}";
    echo "</scrip"."t>"; 
} else {
   	 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';  
exit();   
}


function str_lreplace($search, $replace, $subject)
{   
    $pos = strrpos($subject, $search);
    if($pos !== false){ $subject = substr_replace($subject, $replace, $pos, strlen($search)); }
    return $subject;
}

function endsWith($str, $sub) {
   return ( substr( $str, strlen( $str ) - strlen( $sub ) ) === $sub );
}

?>



<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/background.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/accountbox.css" />
<link rel="stylesheet" type="text/css" href="css/list.css">

<link rel="icon" type="image/png" href="images/Logo.png" sizes="16x16">

<meta http-equiv="Content-Type" content="text/html; charset=utf8" />

<title>Account</title>
<script>
 window.parent.document.title = "Account";
</script>
<div id="onlineresults" style="display: none;"></div>
<body style="background: 'lightgreen';">
<script>
window.onload = document.body.style.background = 'lightgreen';
</script>
<html>
<header>
      <div class="wrapper">
          <nav style="">
<img src="images/Logo.png" alt="Logo" height="40px" width="40px"></img>


<?php 

if (!empty($_SESSION['loggedin'])){	

if (isset($_SERVER['HTTPS'])){
echo "
<a class='maintabs' href='index.php'>Home</a>
";
include 'loggedinmenu.php';
} else {
echo "
<a class='maintabs' target='_parent' href='https://sparkwill.com/blank.php?page=index.php'>Home</a>
";
include 'loggedinmenu.php';
}

} else {
echo "
<a class='maintabs' href='https://sparkwill.com/index.php'>Log In</a>
";
}

?>




          </nav>
      </div>
</header>
<br>
<div>
<br>
<a class="newbutton" style="position: absolute; top: 1px; height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; float:left; color:white; cursor:pointer;" onclick="window.history.back();">Go Back</a>
<?php
$sql="SELECT * FROM users WHERE username = '".$username."' ORDER BY id desc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$token = $row['token'];
$state = $row['state'];
$_SESSION['state'] = $state;
}
if ($token==''){
echo '<button id="fbmergebutton" class="fbbutton" style="position: absolute; top: 1px; height: 40px; z-index: 1100; right: 20%; width: 15%; text-align: center; font-size: 15; font-weight: bold; color:white; cursor:pointer;">FB Merge</button>';
}
?>
<button id="logoutbutton" class="newbutton" style="position: absolute; top: 1px; height: 40px; z-index: 1100; right: 0%; width: 15%; text-align: center; font-size: 15; font-weight: bold; color:white; cursor:pointer;">Log Out</button>

<br>

<?php
if ($token==''){
echo "
<div id='fbmergecall' style='display: none;'></div>

<script>

";








echo '
document.getElementById("fbmergebutton").addEventListener("click", function() {
    document.getElementById("fade").style.display = "block";
    document.getElementById("lightmerge").style.display = "block";
}, false);
';
}

?>

</script>

<?php
if(isset($_FILES['resumefile'])){
    $file_name = $_FILES['resumefile']['name'];
    $file_tmp =$_FILES['resumefile']['tmp_name'];

$extensions = array("txt","doc","docx");
$file_ext=explode('.',$_FILES['resumefile']['name'])	;
$file_ext=end($file_ext); 
$file_ext=strtolower(end(explode('.',$_FILES['resumefile']['name']))); 
if(in_array($file_ext,$extensions ) === false){
	$errors[]="extension not allowed";
}   

if(empty($errors)==true){
$files = glob('users/'.$username.'/resumefile/*');
foreach($files as $file){ 
  if(is_file($file))
    unlink($file);
}
    move_uploaded_file($file_tmp,"users/".$username."/resumefile/".$file_name);
    
    $checkrusername = mysql_query("SELECT * FROM resumes WHERE username = '".$username."'");
      
if(mysql_num_rows($checkrusername) == 1)
{
mysql_query("UPDATE resumes SET filename = '".$file_name."' WHERE username = '".$username."'");
} else {
mysql_query("INSERT INTO resumes (username, filename, state) VALUES ('".$username."', '".$file_name."', '".$state."')");
}

} else { echo $errors[0]; }

	
}     




if(isset($_GET['deleteresumefile'])){

$files = glob('users/'.$username.'/resumefile/*');
foreach($files as $file){ 
  if(is_file($file))
    unlink($file);
}
mysql_query("UPDATE resumes SET filename = '' WHERE username = '".$username."'");


$sql7="SELECT * FROM users WHERE username = '".$username."' ";
$result7 = mysql_query($sql7);
while($row7 = mysql_fetch_array($result7)) 
{
$tcurvar = $row7['position'];
if ($tcurvar === ''){
mysql_query("DELETE FROM resumes WHERE username = '".$username."'");
}
}





}


?>

<?php
if(isset($_FILES['image'])){
    $file_name = $_FILES['image']['name'];
    $file_tmp =$_FILES['image']['tmp_name'];

$extensions = array("jpeg","jpg","png","bmp","gif");
$file_ext=explode('.',$_FILES['image']['name'])	;
$file_ext=end($file_ext); 
$file_ext=strtolower(end(explode('.',$_FILES['image']['name']))); 
if(in_array($file_ext,$extensions ) === false){
	$errors[]="extension not allowed";
}   

if(empty($errors)==true){
$files = glob('users/'.$username.'/images/*');
foreach($files as $file){ 
  if(is_file($file))
    unlink($file);
}
    move_uploaded_file($file_tmp,"users/".$username."/images/".$file_name);
    mysql_query("UPDATE users SET profpic = '".$file_name."' WHERE username = '".$username."'");
} else { echo $errors[0]; }

	
}     




if(isset($_GET['deleteprofpic'])){

$files = glob('users/'.$username.'/images/*');
foreach($files as $file){ 
  if(is_file($file))
    unlink($file);
}
mysql_query("UPDATE users SET profpic = '' WHERE username = '".$username."'");
}


if(isset($_GET['deleteresume'])){

mysql_query("UPDATE resumes SET position = '', experience = '', education = '', certlic = '', degrees = '', area = '' WHERE username = '".$username."'");


$sql9="SELECT * FROM resumes WHERE username = '".$username."' ";
$result9 = mysql_query($sql9);
while($row9 = mysql_fetch_array($result9)) 
{
$tfilevar = $row9['filename'];
if ($tfilevar === ''){
mysql_query("DELETE FROM resumes WHERE username = '".$username."'");
}
}

}


if(isset($_GET['deleteskills'])){
mysql_query("DELETE FROM skills WHERE username = '".$username."'");
}

if(isset($_GET['deletequestions'])){
mysql_query("DELETE FROM questions WHERE username = '".$username."'");
}

?>

<form method="post" action="accountindex.php" enctype="multipart/form-data" id="resumefileupload">
<input id="resumefile" type="file" name="resumefile" style="display: none;"/>
</form>

<script>
document.getElementById("resumefile").onchange = function() {
    document.getElementById("resumefileupload").submit();
};
</script>

<br>
<div style="float: left; margin-left: 10%; width: 80%;">


<form method="post" action="accountindex.php" enctype="multipart/form-data" id="profpicupload">
<input id="profpic" type="file" name="image" style="display: none;"/>
</form>

<div id="fbnewpicspot" style="display: none;"></div>

<script>
document.getElementById("profpic").onchange = function() {
    document.getElementById("profpicupload").submit();
};

</script>

<?php

if (!empty($_POST['position']) && !empty($_POST['experience'])){
$sql="SELECT * FROM users WHERE username = ('$username') ORDER BY id desc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$resumestate = $row['state'];
}
$username = $_SESSION['username'];
$position = mysql_real_escape_string($_POST['position']);
$area = mysql_real_escape_string($_POST['area']);
$experience = mysql_real_escape_string($_POST['experience']);
$education = mysql_real_escape_string($_POST['education']);
$certlic = mysql_real_escape_string($_POST['certlic']);
$degrees = ($_POST['highschool'].$_POST['associates'].$_POST['bachelors'].$_POST['masters'].$_POST['phd'].$_POST['md'].$_POST['jd']);
$degrees = rtrim($degrees, ',');

     $checkresume = mysql_query("SELECT * FROM resumes WHERE username = '".$username."'");
      
     if(mysql_num_rows($checkresume) == 1)
     {
$sql = "UPDATE resumes SET position='".$position."', experience='".$experience."', education='".$education."', certlic='".$certlic."', degrees='".$degrees."', state='".$resumestate."', area='".$area."' WHERE username='".$username."' ";
$result = mysql_query($sql);
     } else {
$sql="INSERT INTO resumes (position, experience, education, certlic, degrees, state, area, username) VALUES ('".$position."', '".$experience."', '".$education."', '".$certlic."', '".$degrees."', '".$resumestate."', '".$area."', '".$username."') ";
$result = mysql_query($sql);
}
	
}


?>


<?php

if (isset($_POST['skills'])){

$username = $_SESSION['username'];

$skills = ($_POST['advise_clients_or_customers'].$_POST['answer_customer_or_public_inquiries'].$_POST['call_on_customers_to_solicit_new_business'].$_POST['climb_ladders_and_scaffolding_and_or_utility_or_telephone_poles'].$_POST['collect_payment'].$_POST['communicate_technical_information'].$_POST['communicate_visually_or_verbally'].$_POST['conduct_or_attend_staff_meetings'].$_POST['confer_with_engineering_and_technical_or_manufacturing_personnel'].$_POST['consult_with_customers_concerning_needs'].$_POST['develop_budgets'].$_POST['develop_or_maintain_databases'].$_POST['develop_plans_for_programs_or_projects'].$_POST['examine_files_or_documents_to_obtain_information'].$_POST['file_or_retrieve_paper_documents_and_related_materials'].$_POST['fill_out_business_or_government_forms'].$_POST['follow_safe_waste_disposal_procedures'].$_POST['follow_tax_laws_or_regulations'].$_POST['greet_customers_and_guests_and_visitors_and_or_passengers'].$_POST['maintain_records_and_reports_and_or_files'].$_POST['maintain_relationships_with_clients'].$_POST['make_decisions'].$_POST['make_presentations'].$_POST['modify_work_procedures_or_processes_to_meet_deadlines'].$_POST['move_or_fit_heavy_objects'].$_POST['obtain_information_from_clients_and_customers_and_or_patients'].$_POST['package_goods_for_shipment_or_storage'].$_POST['prepare_reports_for_management'].$_POST['provide_customer_service'].$_POST['read_technical_drawings'].$_POST['receive_customer_orders'].$_POST['record_clients_personal_data'].$_POST['retrieve_files_or_charts'].$_POST['schedule_meetings_or_appointments'].$_POST['stock_or_organize_goods'].$_POST['take_messages'].$_POST['understand_second_language'].$_POST['understand_technical_operating_and_service_or_repair_manuals'].$_POST['use_cash_registers'].$_POST['use_computers_to_enter_and_access_or_retrieve_data'].$_POST['use_conflict_resolution_techniques'].$_POST['use_government_regulations'].$_POST['use_health_or_sanitation_standards'].$_POST['use_interpersonal_communication_techniques'].$_POST['use_interviewing_procedures'].$_POST['use_inventory_control_procedures'].$_POST['use_negotiation_techniques'].$_POST['use_oral_or_written_communication_techniques'].$_POST['use_project_management_techniques'].$_POST['use_public_speaking_techniques'].$_POST['use_secretarial_procedures'].$_POST['use_time_management_techniques'].$_POST['work_as_a_team_member']);

$skills = rtrim($skills, ',');


     $checkskills = mysql_query("SELECT * FROM skills WHERE username = '".$username."'");
      
     if(mysql_num_rows($checkskills) == 1){
if ($skills != ''){
$sql = "UPDATE skills SET skills='".$skills."' WHERE username='".$username."' ";
$result = mysql_query($sql);
} else {
mysql_query("DELETE FROM skills WHERE username = '".$username."'");
}
     } else {
if ($skills != ''){
$sql="INSERT INTO skills (skills, username) VALUES ('".$skills."', '".$username."') ";
$result = mysql_query($sql);
}
}


	
}

?>



<?php


$sql="SELECT * FROM users WHERE username = ('$username') ORDER BY id desc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
if (!empty($row['profpic'])){

if (!empty($token)){

echo '<label for="profpic" id="changepic" class="newbutton" style="visibility: hidden; position: absolute; left: 10%;" onmouseover="this.style.visibility = \'visible\'; document.getElementById(\'newfbpic\').style.visibility = \'visible\'; document.getElementById(\'deletepic\').style.visibility = \'visible\'; document.getElementById(\'imgid\').style.border =\'1px solid forestgreen\';" onmouseout="this.style.visibility = \'hidden\'; document.getElementById(\'deletepic\').style.visibility = \'hidden\'; document.getElementById(\'newfbpic\').style.visibility = \'hidden\'; document.getElementById(\'imgid\').style.border =\'1px solid white\';">Change</label>';

echo '<a id="deletepic" class="redbutton" style="visibility: hidden; position: absolute; left: 10%; margin-left: 107px; padding-left: 29px; padding-right: 29px;" onmouseover="this.style.visibility = \'visible\'; document.getElementById(\'newfbpic\').style.visibility = \'visible\'; document.getElementById(\'changepic\').style.visibility = \'visible\'; document.getElementById(\'imgid\').style.border =\'1px solid forestgreen\';" onmouseout="this.style.visibility = \'hidden\'; document.getElementById(\'changepic\').style.visibility = \'hidden\'; document.getElementById(\'newfbpic\').style.visibility = \'hidden\'; document.getElementById(\'imgid\').style.border =\'1px solid white\';" onclick="document.getElementById(\'lightpic\').style.display = \'block\'; document.getElementById(\'fade\').style.display = \'block\';">Delete</a>';

echo '<label id="newfbpic" class="fbbutton" style="visibility: hidden; position: absolute; left: 10%; margin-top: 169px;" onmouseover="this.style.visibility = \'visible\'; document.getElementById(\'deletepic\').style.visibility = \'visible\'; document.getElementById(\'changepic\').style.visibility = \'visible\'; document.getElementById(\'imgid\').style.border =\'1px solid forestgreen\';" onmouseout="this.style.visibility = \'hidden\'; document.getElementById(\'changepic\').style.visibility = \'hidden\'; document.getElementById(\'deletepic\').style.visibility = \'hidden\'; document.getElementById(\'imgid\').style.border =\'1px solid white\';">Change to fb picture</label>';

echo '
<img id="imgid" src="users/'.$username.'/images/'.$row['profpic'].'" height="209px" width="209px" style="float: left; border: 1px solid white;" onmouseover="this.style.border =\'1px solid forestgreen\'; document.getElementById(\'newfbpic\').style.visibility = \'visible\'; document.getElementById(\'changepic\').style.visibility = \'visible\'; document.getElementById(\'deletepic\').style.visibility = \'visible\';" onmouseout="this.style.border =\'1px solid white\'; document.getElementById(\'newfbpic\').style.visibility = \'hidden\'; document.getElementById(\'changepic\').style.visibility = \'hidden\'; document.getElementById(\'deletepic\').style.visibility = \'hidden\';"></img>
';

} else {

echo '<label for="profpic" id="changepic" class="newbutton" style="visibility: hidden; position: absolute; left: 10%;" onmouseover="this.style.visibility = \'visible\'; document.getElementById(\'deletepic\').style.visibility = \'visible\'; document.getElementById(\'imgid\').style.border =\'1px solid forestgreen\';" onmouseout="this.style.visibility = \'hidden\'; document.getElementById(\'deletepic\').style.visibility = \'hidden\'; document.getElementById(\'imgid\').style.border =\'1px solid white\';">Change</label>';

echo '<a id="deletepic" class="redbutton" style="visibility: hidden; position: absolute; left: 10%; margin-left: 107px; padding-left: 29px; padding-right: 29px;" onmouseover="this.style.visibility = \'visible\'; document.getElementById(\'changepic\').style.visibility = \'visible\'; document.getElementById(\'imgid\').style.border =\'1px solid forestgreen\';" onmouseout="this.style.visibility = \'hidden\'; document.getElementById(\'changepic\').style.visibility = \'hidden\'; document.getElementById(\'imgid\').style.border =\'1px solid whiteimg\';" onclick="document.getElementById(\'lightpic\').style.display = \'block\'; document.getElementById(\'fade\').style.display = \'block\';">Delete</a>';

echo '
<img id="imgid" src="users/'.$username.'/images/'.$row['profpic'].'" height="209px" width="209px" style="float: left; border: 1px solid white;" onmouseover="this.style.border =\'1px solid forestgreen\'; document.getElementById(\'changepic\').style.visibility = \'visible\'; document.getElementById(\'deletepic\').style.visibility = \'visible\';" onmouseout="this.style.border =\'1px solid white\'; document.getElementById(\'changepic\').style.visibility = \'hidden\'; document.getElementById(\'deletepic\').style.visibility = \'hidden\';"></img>
';

}

} else {
echo '<label for="profpic" id="changepic" class="newbutton" style="visibility: hidden; position: absolute; left: 10%;" onmouseover="this.style.visibility = \'visible\';" onmouseout="this.style.visibility = \'hidden\';">Upload</label>';

if (!empty($token)){
echo '<label id="newfbpic" class="fbbutton" style="visibility: hidden; position: absolute; left: 10%; margin-top: 169px;" onmouseover="this.style.visibility = \'visible\'; document.getElementById(\'changepic\').style.visibility = \'visible\';" onmouseout="this.style.visibility = \'hidden\'; document.getElementById(\'changepic\').style.visibility = \'hidden\';">Change to fb picture</label>';

echo '<img src="images/post/default.jpg" height="210px" width="210px" style="float: left; border: 1px solid lightgreen; display: inline-block;" onmouseover="this.style.border =\'1px solid forestgreen\'; document.getElementById(\'newfbpic\').style.visibility = \'visible\'; document.getElementById(\'changepic\').style.visibility = \'visible\';" onmouseout="this.style.border =\'1px solid lightgreen\';  document.getElementById(\'changepic\').style.visibility = \'hidden\'; document.getElementById(\'newfbpic\').style.visibility = \'hidden\';"></img>';
} else {

echo '<img src="images/post/default.jpg" height="210px" width="210px" style="float: left; border: 1px solid lightgreen; display: inline-block;" onmouseover="this.style.border =\'1px solid forestgreen\'; document.getElementById(\'changepic\').style.visibility = \'visible\';" onmouseout="this.style.border =\'1px solid lightgreen\';  document.getElementById(\'changepic\').style.visibility = \'hidden\';"></img>';

}


}












}

?>




<button id='pbbutton' class='newbutton' style='background: green;' onmouseover='document.getElementById("infomenu").style.display= "block";' onmouseout='document.getElementById("infomenu").style.display = "none";' onclick='document.getElementById("pbbox").style.display="block"; document.getElementById("edbox").style.display="none"; document.getElementById("exbox").style.display="none"; document.getElementById("skbox").style.display="none"; document.getElementById("rebox").style.display="none"; document.getElementById("table").style.display="none"; this.style.backgroundColor = "green"; document.getElementById("skbutton").style.backgroundColor = "#00b33c"; document.getElementById("exbutton").style.backgroundColor = "#00b33c"; document.getElementById("edbutton").style.backgroundColor = "#00b33c"; document.getElementById("rebutton").style.backgroundColor = "#00b33c"; document.getElementById("pobutton").style.backgroundColor = "#00b33c";'>Info</button>

<span id='infomenu' style='display: none; position: absolute; margin-left: 210px;'>

<button id='exbutton' class='newbutton' onmouseover='document.getElementById("infomenu").style.display= "block";' onmouseout='document.getElementById("infomenu").style.display = "none";' onclick='document.getElementById("exbox").style.display="block"; document.getElementById("skbox").style.display="none"; document.getElementById("pbbox").style.display="none"; document.getElementById("edbox").style.display="none"; document.getElementById("rebox").style.display="none"; document.getElementById("table").style.display="none"; this.style.backgroundColor = "green"; document.getElementById("skbutton").style.backgroundColor = "#00b33c"; document.getElementById("pbbutton").style.backgroundColor = "#00b33c"; document.getElementById("edbutton").style.backgroundColor = "#00b33c"; document.getElementById("rebutton").style.backgroundColor = "#00b33c"; document.getElementById("pobutton").style.backgroundColor = "#00b33c";'>Experience</button>
<br>
<button id='edbutton' class='newbutton' onmouseover='document.getElementById("infomenu").style.display= "block";' onmouseout='document.getElementById("infomenu").style.display = "none";' onclick='document.getElementById("edbox").style.display="block"; document.getElementById("skbox").style.display="none"; document.getElementById("pbbox").style.display="none"; document.getElementById("exbox").style.display="none";  document.getElementById("rebox").style.display="none"; document.getElementById("table").style.display="none"; this.style.backgroundColor = "green"; document.getElementById("skbutton").style.backgroundColor = "#00b33c"; document.getElementById("pbbutton").style.backgroundColor = "#00b33c"; document.getElementById("exbutton").style.backgroundColor = "#00b33c"; document.getElementById("rebutton").style.backgroundColor = "#00b33c"; document.getElementById("pobutton").style.backgroundColor = "#00b33c";'>Education</button>

</span>

<button id='pobutton' class='newbutton' onclick='document.getElementById("table").style.display="block"; document.getElementById("skbox").style.display="none"; document.getElementById("pbbox").style.display="none"; document.getElementById("edbox").style.display="none"; document.getElementById("exbox").style.display="none"; document.getElementById("rebox").style.display="none"; this.style.backgroundColor = "green"; document.getElementById("skbutton").style.backgroundColor = "#00b33c"; document.getElementById("pbbutton").style.backgroundColor = "#00b33c"; document.getElementById("exbutton").style.backgroundColor = "#00b33c"; document.getElementById("rebutton").style.backgroundColor = "#00b33c"; document.getElementById("edbutton").style.backgroundColor = "#00b33c";'>Posts</button>

<button id='rebutton' class='newbutton' onclick='document.getElementById("rebox").style.display="block"; document.getElementById("skbox").style.display="none"; document.getElementById("pbbox").style.display="none"; document.getElementById("edbox").style.display="none"; document.getElementById("exbox").style.display="none"; document.getElementById("table").style.display="none"; this.style.backgroundColor = "green"; document.getElementById("skbutton").style.backgroundColor = "#00b33c"; document.getElementById("edbutton").style.backgroundColor = "#00b33c"; document.getElementById("exbutton").style.backgroundColor = "#00b33c";  document.getElementById("pbbutton").style.backgroundColor = "#00b33c"; document.getElementById("pobutton").style.backgroundColor = "#00b33c";'>Resume</button>

<button id='skbutton' class='newbutton' onclick='document.getElementById("skbox").style.display="block"; document.getElementById("rebox").style.display="none"; document.getElementById("pbbox").style.display="none"; document.getElementById("edbox").style.display="none"; document.getElementById("exbox").style.display="none"; document.getElementById("table").style.display="none"; this.style.backgroundColor = "green"; document.getElementById("rebutton").style.backgroundColor = "#00b33c"; document.getElementById("edbutton").style.backgroundColor = "#00b33c"; document.getElementById("exbutton").style.backgroundColor = "#00b33c"; document.getElementById("pbbutton").style.backgroundColor = "#00b33c"; document.getElementById("pobutton").style.backgroundColor = "#00b33c";'>Skills</button>




<?php 
if ($_GET['delete']==true){ 
$id = ($_GET['id']);
mysql_query("DELETE FROM postings WHERE username = ('$username') AND id = ('$id')");
// get all file names
$files = glob('images/post/'.$id.'/*');
// loop through files
foreach($files as $file){
  if(is_file($file)) {
    // delete file
    unlink($file);
  }
}
rmdir('images/post/'.$id.'');
}










 ?>






<br>

<span id="displayarea"></span>



<?php
$sql="SELECT * FROM skills WHERE username = ('$username') ORDER BY id desc";
$result = mysql_query($sql);
if(mysql_num_rows($result) == 1){
echo '<span id="skbox" style="display: none;"><br><br><center><a class="newbutton" style="width: 100%; text-align: center; font-size: 15; font-weight: bold;" href="createskills.php">Change your Skills</a></center>';
echo '<br><br><br><center><a class="redbutton" style="width: 100%; text-align: center; font-size: 15; font-weight: bold;" onclick="document.getElementById(\'lightskills\').style.display = \'block\'; document.getElementById(\'fade\').style.display = \'block\';">Delete your Skills</a></center></span>';
} else {
echo '<span id="skbox" style="display: none;"><br><br><center><a class="newbutton" style="width: 100%; text-align: center; font-size: 15; font-weight: bold;" href="createskills.php">Add your Skills</a></center></span>';
}
?>


<style>
input {
	display: block;
	margin: 5px 10px 10px 15px;
	width: 50%;
	background: white;
	border: 1px solid white;
	padding: 5px;
	color: forestgreen;
	font-size: 20px;
        font-weight: bold;
        text-align: center;
}
</style>







<span id="rebox" style="display: none;">

<br>
<br>

<?php

//has everything

$sql="SELECT * FROM resumes WHERE username = ('$username') AND position != ('') AND filename != ('') ORDER BY id desc";
$result = mysql_query($sql);
if(mysql_num_rows($result) == 1){

echo '<center><a class="newbutton" style="width: 100%; text-align: center; font-size: 15; font-weight: bold;" href="createresume.php">Change your Resume</a>&nbsp;&nbsp;';

echo '<label for="resumefile" class="newbutton" style="width: 100%; text-align: center; font-size: 15; font-weight: bold;" href="createresume.php">Change your Resume file</label></center>';

echo '<br><br><br><center><a class="redbutton" style="width: 100%; text-align: center; font-size: 15; font-weight: bold;" onclick="document.getElementById(\'lightresume\').style.display = \'block\'; document.getElementById(\'fade\').style.display = \'block\';">Delete your Resume</a>&nbsp;&nbsp;';

echo '<a class="redbutton" style="width: 100%; text-align: center; font-size: 15; font-weight: bold;" onclick="document.getElementById(\'lightresume2\').style.display = \'block\'; document.getElementById(\'fade\').style.display = \'block\';">Delete your Resume file</a></center>';

}

//has resume but no file

$sql="SELECT * FROM resumes WHERE username = ('$username') AND position != ('') AND filename = ('') ORDER BY id desc";
$result = mysql_query($sql);
if(mysql_num_rows($result) == 1){

echo '<center><a class="newbutton" style="width: 100%; text-align: center; font-size: 15; font-weight: bold;" href="createresume.php">Change your Resume</a>&nbsp;&nbsp;';

echo '<label for="resumefile" class="newbutton" style="width: 100%; text-align: center; font-size: 15; font-weight: bold;" href="createresume.php">Create a Resume file</label></center>';

echo '<br><br><br><center><a class="redbutton" style="width: 100%; text-align: center; font-size: 15; font-weight: bold;" onclick="document.getElementById(\'lightresume\').style.display = \'block\'; document.getElementById(\'fade\').style.display = \'block\';">Delete your Resume</a></center>';

}

//has file but no resume

$sql="SELECT * FROM resumes WHERE username = ('$username') AND position = ('') AND filename != ('') ORDER BY id desc";
$result = mysql_query($sql);
if(mysql_num_rows($result) == 1){

echo '<center><a class="newbutton" style="width: 100%; text-align: center; font-size: 15; font-weight: bold;" href="createresume.php">Create a Resume</a>&nbsp;&nbsp;';

echo '<label for="resumefile" class="newbutton" style="width: 100%; text-align: center; font-size: 15; font-weight: bold;" href="createresume.php">Change your Resume file</label></center>';

echo '<br><br><br><center><a class="redbutton" style="width: 100%; text-align: center; font-size: 15; font-weight: bold;" onclick="document.getElementById(\'lightresume2\').style.display = \'block\'; document.getElementById(\'fade\').style.display = \'block\';">Delete your Resume file</a></center>';

}

//has nothing

$sql6="SELECT * FROM resumes WHERE username = ('$username')";
$result6 = mysql_query($sql6);
if(mysql_num_rows($result6) != 1){
echo '<center><a class="newbutton" style="width: 100%; text-align: center; font-size: 15; font-weight: bold;" href="createresume.php">Create a Resume</a>&nbsp;&nbsp;';

echo '<label for="resumefile" class="newbutton" style="width: 100%; text-align: center; font-size: 15; font-weight: bold;" href="createresume.php">Create a Resume file</label></center>';

}

?>


</span>

<span id='pbbox' style='display: block; border-bottom-right-radius: 5px; overflow-y: auto; float: left; border: solid white 1px; height: 25%; width: 63%; text-align: center; background: white;' onmouseover='document.getElementById("pbeditbutton").style.visibility = "visible"; this.style.border = "solid forestgreen 1px";' onmouseout='document.getElementById("pbeditbutton").style.visibility = "hidden"; this.style.border = "solid white 1px";'>

<span style='font-weight: bold; color: forestgreen;'>General Information</span>

<span id='pbeditbutton' style='position: absolute; visibility: hidden; margin-left: 9.50%; margin-top: 1px;'>
<button class='newbutton' style='' onclick='firstpb = document.getElementById("pbcontent").innerHTML; pbcontent = document.getElementById("pbcontent").innerHTML; document.getElementById("pbcontent").style.display = "none"; pbcontent = pbcontent.replace(/^\s+|\s+$/g, ""); document.getElementById("pbtextarea").value = pbcontent; document.getElementById("pbcontent2").style.display = "block"; document.getElementById("pbeditbutton").style.visibility = "hidden"; document.getElementById("pbeditbutton").style.display = "none"; document.getElementById("pbediting").style.visibility = "visible";'>Edit</button>
</span>

<script>
//pbtc = pbtc.replace(/<br>/g, ":br:");
if (document.getElementById('pbbox').clientHeight < document.getElementById('pbbox').scrollHeight){

}
</script>

<span id='pbediting' style='position: absolute; visibility: hidden; margin-left: 9.9%; margin-top: 1px;'>
<button id='pbsavebutton' class='newbutton' style='padding-right: 17px; padding-left: 17px;'>Save</button>
<br><br>
<button id='pbcancelbutton' class='newbutton' style='padding-right: 10px; padding-left: 10px; margin-right: 4px;' onclick='document.getElementById("pbediting").style.visibility = "hidden"; document.getElementById("pbeditbutton").style.display = "inline-block"; document.getElementById("pbeditbutton").style.visibility = "visible";  document.getElementById("pbcontent2").style.display = "none"; document.getElementById("pbcontent").innerHTML = pbcontent;document.getElementById("pbcontent").style.display = "block"; '>Cancel</button>
</span>

<span id='pbcontent' style='display: block;'>
<?php 
$sql="SELECT * FROM users WHERE username = ('$username') ORDER BY id desc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$publicinfo = htmlspecialchars($row['publicinfo'], ENT_QUOTES);
$publicinfo = str_replace("&lt;br&gt;","<br>",$publicinfo);
$lines = explode("\n", wordwrap($publicinfo, 40));
$publicinfo = "";
foreach ($lines as $key) {
if (strlen($key) > 40) {$key = chunk_split($key, 40, "<br>");}
$publicinfo = $publicinfo.$key."<br>";
}
if (endsWith($publicinfo, "<br>")){
$publicinfo = str_lreplace("<br>", "", $publicinfo);
}

echo $publicinfo;
}
?> 
</span>

<span id='pbcontent2' style='display: none;'>
<textarea id="pbtextarea" rows= "9" cols="50" style="text-align: center; resize: none;" oninput="pbtc = this.value;" autofocus></textarea>
</span>



</span>


<span id='exbox' style='display: none; border-bottom-right-radius: 5px; overflow-y: auto; float: left; border: solid white 1px; height: 25%; width: 63%; text-align: center; background: white;' onmouseover='document.getElementById("exeditbutton").style.visibility = "visible"; this.style.border = "solid forestgreen 1px";' onmouseout='document.getElementById("exeditbutton").style.visibility = "hidden"; this.style.border = "solid white 1px";'>

<span style='font-weight: bold; color: forestgreen;'>Experience Information</span>

<span id='exeditbutton' style='position: absolute; visibility: hidden; margin-left: 8.35%; margin-top: 1px;'>
<button class='newbutton' style='' onclick='firstex = document.getElementById("excontent").innerHTML; excontent = document.getElementById("excontent").innerHTML; document.getElementById("excontent").style.display = "none"; excontent = excontent.replace(/^\s+|\s+$/g, ""); document.getElementById("extextarea").value = excontent; document.getElementById("excontent2").style.display = "block"; document.getElementById("exeditbutton").style.visibility = "hidden"; document.getElementById("exeditbutton").style.display = "none"; document.getElementById("exediting").style.visibility = "visible";'>Edit</button>
</span>

<script>
//extc = extc.replace(/<br>/g, ":br:");
if (document.getElementById('exbox').clientHeight < document.getElementById('exbox').scrollHeight){

}
</script>

<span id='exediting' style='position: absolute; visibility: hidden; margin-left: 8.8%; margin-top: 1px;'>
<button id='exsavebutton' class='newbutton' style='padding-right: 17px; padding-left: 17px;'>Save</button>
<br><br>
<button id='excancelbutton' class='newbutton' style='padding-right: 10px; padding-left: 10px; margin-right: 3px;' onclick='document.getElementById("exediting").style.visibility = "hidden"; document.getElementById("exeditbutton").style.display = "inline-block"; document.getElementById("exeditbutton").style.visibility = "visible";  document.getElementById("excontent2").style.display = "none"; document.getElementById("excontent").innerHTML = excontent;document.getElementById("excontent").style.display = "block"; '>Cancel</button>
</span>

<span id='excontent' style='display: block;'>
<?php 
$sql="SELECT * FROM users WHERE username = ('$username') ORDER BY id desc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$experienceinfo = htmlspecialchars($row['experienceinfo'], ENT_QUOTES);
$experienceinfo = str_replace("&lt;br&gt;","<br>",$experienceinfo);
$lines = explode("\n", wordwrap($experienceinfo, 40));
$experienceinfo = "";
foreach ($lines as $key) {
if (strlen($key) > 40) {$key = chunk_split($key, 40, "<br>");}
$experienceinfo = $experienceinfo.$key."<br>";
}
if (endsWith($experienceinfo, "<br>")){
$experienceinfo = str_lreplace("<br>", "", $experienceinfo);
}

echo $experienceinfo;
}
?> 
</span>

<span id='excontent2' style='display: none;'>
<textarea id="extextarea" rows= "9" cols="50" style="text-align: center; resize: none;" oninput="extc = this.value;" autofocus></textarea>
</span>

</span>












<script>var last1 = 'new';</script>
<div id="table" style="display: none; float: left;">

<table style=" background: white; border: solid white 1px; border-bottom-right-radius: 5px;" onmouseover="this.style.border = 'solid forestgreen 1px';" onmouseout="this.style.border = 'solid white 1px';">
  <tr>
    <th style="color: white;">Time</th>
    <th style="color: white;">Title</th>
    <th style="color: white;">Section</th>
    <th style="color: white;">People</th>
    <th></th>
  </tr>

<?php 
$stuffnumber = 0;
if ($_GET['delete']==true){ 
$id = ($_GET['id']);
mysql_query("DELETE FROM postings WHERE username = ('$username') AND id = ('$id')");
// get all file names
$files = glob('images/post/'.$id.'/*');
// loop through files
foreach($files as $file){
  if(is_file($file)) {
    // delete file
    unlink($file);
  }
}
rmdir('images/post/'.$id.'');
}


$sql="SELECT * FROM postings WHERE username = ('$username') ORDER BY id desc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{






echo "
  <tr>
    <td>".$row['time']."</td>
    <td>
<a href='content.php?title=".urlencode($row['title'])."&section=".$row['section']."&id=".$row['id']."' onmouseover='this.style.color = \"white\";  this.style.backgroundColor = \"forestgreen\";' onmouseout='this.style.color = \"forestgreen\"; this.style.backgroundColor = \"white\";' style='font-size: 20; color: forestgreen;'>".urldecode($row['title'])."</a>
    </td>
    <td><a href='https://sparkwill.com/list.php?section=".$row['section']."&type=".$row['type']."' style='color: forestgreen;' onmouseover='this.style.color = \"white\"; this.style.backgroundColor = \"forestgreen\";' onmouseout='this.style.color = \"forestgreen\"; this.style.backgroundColor = \"white\";'><b>".$row['section']."</b></a>
    </td>
    <td>
<script>show".$row['id']." = \"no\";</script>
<a id='id".$row['id']."' style='cursor: pointer; font-weight: bold; color: forestgreen;' onmouseover='this.style.color = \"white\";  this.style.backgroundColor = \"forestgreen\";' onmouseout='this.style.color = \"forestgreen\"; this.style.backgroundColor = \"white\";' style='font-size: 20; color: forestgreen;' onclick='if (show".$row['id']." != \"yes\"){show".$row['id']." = \"yes\"; this.innerHTML = \"Hide\"; } else { show".$row['id']." = \"no\"; this.innerHTML = \"Show\";}' >Show</a>
<script>
toggle".$row['id']." = 'yes';
document.getElementById('id".$row['id']."').addEventListener('click', function() {
if (toggle".$row['id']." == 'yes'){
    viewerajax('".$row['id']."','yes');
    toggle".$row['id']." = 'no';
} else {
viewerajax('".$row['id']."','no');
toggle".$row['id']." = 'yes';
}
}, false);
</script>
    </td>
    <td>
<a id='del".$row['id']."' style='cursor: pointer; float: right; font-weight: bold; color: forestgreen;' onmouseover='this.style.color = \"white\"; this.style.backgroundColor = \"forestgreen\";' onmouseout='this.style.color = \"forestgreen\"; this.style.backgroundColor = \"white\";'>Delete</a>
</td>
    </tr>
";


echo "
<div id='lightdel".$row['id']."' class='newwhite_content' style='height: 23%; cursor: default; color: white; font-size: 25; font-weight: bold; text-align: center; display: none;'>
Do you really want to delete this Post?
<br>
<br>
<a class='newbutton' style='text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;' onclick=\"window.location = 'accountindex.php?delete=true&id=".$row['id']."'; document.getElementById('lightdel".$row['id']."').style.display='none'; document.getElementById('fadedel".$row['id']."').style.display='none';\">Yes</a>
<a class='newbutton' style='text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;' onclick=\"document.getElementById('lightdel".$row['id']."').style.display='none'; document.getElementById('fadedel".$row['id']."').style.display='none';\">No</a>
</div>

<div id='fadedel".$row['id']."' class='newblack_overlay' style='display: none;' onclick=\"document.getElementById('lightdel".$row['id']."').style.display='none'; document.getElementById('fadedel".$row['id']."').style.display='none';\"></div> 

";


echo "
<script>
document.getElementById('del".$row['id']."').addEventListener(\"click\", myFunction".$row['id'].");

function myFunction".$row['id']."() {
    
document.getElementById('fadedel".$row['id']."').style.display = 'block'; document.getElementById('lightdel".$row['id']."').style.display = 'block';

}
</script>

";



$stuffnumber = ($stuffnumber + 1);






}


 ?>
</table>




<center>
<br>
<div id='viewerresults' style='display: none;'></div>
</center>



</div>

















<span id='edbox' style='display: none; border-bottom-right-radius: 5px; overflow-y: auto; float: left; border: solid white 1px; height: 25%; width: 63%; text-align: center; background: white;' onmouseover='document.getElementById("ededitbutton").style.visibility = "visible"; this.style.border = "solid forestgreen 1px";' onmouseout='document.getElementById("ededitbutton").style.visibility = "hidden"; this.style.border = "solid white 1px";'>

<span style='font-weight: bold; color: forestgreen;'>Education Information</span>

<span id='ededitbutton' style='position: absolute; visibility: hidden; margin-left: 8.7%; margin-top: 1px;'>
<button class='newbutton' style='' onclick='firsted = document.getElementById("edcontent").innerHTML; edcontent = document.getElementById("edcontent").innerHTML; document.getElementById("edcontent").style.display = "none"; edcontent = edcontent.replace(/^\s+|\s+$/g, ""); document.getElementById("edtextarea").value = edcontent; document.getElementById("edcontent2").style.display = "block"; document.getElementById("ededitbutton").style.visibility = "hidden"; document.getElementById("ededitbutton").style.display = "none"; document.getElementById("edediting").style.visibility = "visible";'>Edit</button>
</span>

<script>
//edtc = edtc.replace(/<br>/g, ":br:");
if (document.getElementById('edbox').clientHeight < document.getElementById('edbox').scrollHeight){

}
</script>

<span id='edediting' style='position: absolute; visibility: hidden; margin-left: 9.15%; margin-top: 1px;'>
<button id='edsavebutton' class='newbutton' style='padding-right: 17px; padding-left: 17px;'>Save</button>
<br><br>
<button id='edcancelbutton' class='newbutton' style='padding-right: 10px; padding-left: 10px; margin-right: 4px;' onclick='document.getElementById("edediting").style.visibility = "hidden"; document.getElementById("ededitbutton").style.display = "inline-block"; document.getElementById("ededitbutton").style.visibility = "visible";  document.getElementById("edcontent2").style.display = "none"; document.getElementById("edcontent").innerHTML = edcontent;document.getElementById("edcontent").style.display = "block"; '>Cancel</button>
</span>

<span id='edcontent' style='display: block;'>
<?php 
$sql="SELECT * FROM users WHERE username = ('$username') ORDER BY id desc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$educationinfo = htmlspecialchars($row['educationinfo']);
$educationinfo = str_replace("&lt;br&gt;","<br>",$educationinfo);
$lines = explode("\n", wordwrap($educationinfo, 40));
$educationinfo = "";
foreach ($lines as $key) {
if (strlen($key) > 40) {$key = chunk_split($key, 40, "<br>");}
$educationinfo = $educationinfo.$key."<br>";
}
if (endsWith($educationinfo, "<br>")){
$educationinfo = str_lreplace("<br>", "", $educationinfo);
}

echo $educationinfo;
}
?> 
</span>

<span id='edcontent2' style='display: none;'>
<textarea id="edtextarea" rows= "9" cols="50" style="text-align: center; resize: none;" oninput="edtc = this.value;" autofocus></textarea>
</span>

</span>




<br>

<div style="clear: both;"> </div>

</div>
</div>

</div>

</body>
</html>


<script>

<?php
if (!empty($token)){
echo '
document.getElementById("newfbpic").addEventListener("click", function(){ 

  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("fbnewpicspot")
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }

  xhttp.open("GET", "fbloginajax.php?fbtoken='.$token.'&action=newfbpic", true);
  xhttp.send();

});
';
}
?>

pbtc = 'undefined';
edtc = 'undefined';
extc = 'undefined';
if (window.frameElement) {
  window.parent.history.replaceState('Object', 'Title', '/blank.php?page=accountindex.php');
}

document.getElementById("pbsavebutton").addEventListener("click", function() {
    pbupdate();
}, false);

document.getElementById("exsavebutton").addEventListener("click", function() {
    exupdate();
}, false);

document.getElementById("edsavebutton").addEventListener("click", function() {
    edupdate();
}, false);


document.getElementById("logoutbutton").addEventListener("click", function() {
    online('no');
}, false);

function online(status){
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("onlineresults")
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }
  xhttp.open("GET", "onlineajax.php?status="+status, true);
  xhttp.send();
                        }






function pbupdate(){
if (pbtc == 'undefined'){pbtc = document.getElementById("pbtextarea").value;}
pbtc = pbtc.replace(/\n\r?/g, "<br>");
document.getElementById("pb1").innerHTML = pbtc;
document.getElementById("pb2").innerHTML = firstpb;
if (document.getElementById("pb1").innerHTML==document.getElementById("pb2").innerHTML){
document.getElementById("pbediting").style.visibility = "hidden"; document.getElementById("pbeditbutton").style.display = "inline-block"; document.getElementById("pbeditbutton").style.visibility = "visible";  document.getElementById("pbcontent2").style.display = "none"; document.getElementById("pbcontent").innerHTML = pbcontent;document.getElementById("pbcontent").style.display = "block"; 
} else {
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("pbresults")
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }
xhttp.open("GET", "pbinfoajax.php?p="+pbtc, true);
xhttp.send();
}

}

function exupdate(){
if (extc == 'undefined'){extc = document.getElementById("extextarea").value;}
extc = extc.replace(/\n\r?/g, "<br>");
document.getElementById("ex1").innerHTML = extc;
document.getElementById("ex2").innerHTML = firstex;
if (document.getElementById("ex1").innerHTML==document.getElementById("ex2").innerHTML){
document.getElementById("exediting").style.visibility = "hidden"; document.getElementById("exeditbutton").style.display = "inline-block"; document.getElementById("exeditbutton").style.visibility = "visible";  document.getElementById("excontent2").style.display = "none"; document.getElementById("excontent").innerHTML = excontent;document.getElementById("excontent").style.display = "block"; 
} else {
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("exresults")
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }
xhttp.open("GET", "exinfoajax.php?ex="+extc, true);
xhttp.send();
}

}


function edupdate(){
if (edtc == 'undefined'){edtc = document.getElementById("edtextarea").value;}
edtc = edtc.replace(/\n\r?/g, "<br>");
document.getElementById("ed1").innerHTML = edtc;
document.getElementById("ed2").innerHTML = firsted;
if (document.getElementById("ed1").innerHTML==document.getElementById("ed2").innerHTML){
document.getElementById("edediting").style.visibility = "hidden"; document.getElementById("ededitbutton").style.display = "inline-block"; document.getElementById("ededitbutton").style.visibility = "visible";  document.getElementById("edcontent2").style.display = "none"; document.getElementById("edcontent").innerHTML = edcontent;document.getElementById("edcontent").style.display = "block"; 
} else {
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("edresults")
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }
xhttp.open("GET", "edinfoajax.php?ed="+edtc, true);
xhttp.send();
}


}

function viewerajax(id,toggle){
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("viewerresults")
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }
xhttp.open("GET", "viewerajax.php?id="+id+"&toggle="+toggle, true);
xhttp.send();
}







</script>

<div id='pbresults' style='display: none;'></div>
<div id='exresults' style='display: none;'></div>
<div id='edresults' style='display: none;'></div>


<div id='lightpic' class='newwhite_content' style='height: 23%; cursor: default; color: white; font-size: 25; font-weight: bold; text-align: center; display: none;'>
Do you really want to delete your Photo?
<br>
<br>
<a class="newbutton" style="text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;" onclick="window.location = 'accountindex.php?deleteprofpic=true'; document.getElementById('lightpic').style.display='none'; document.getElementById('fade').style.display='none'">Yes</a>
<a class="newbutton" style="text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;" onclick="document.getElementById('lightpic').style.display='none'; document.getElementById('fade').style.display='none'">No</a>
</div>


<div id='fade' class='newblack_overlay' style='display: none;' onclick = "document.getElementById('lightquestions').style.display='none'; document.getElementById('lightskills').style.display='none'; document.getElementById('lightpic').style.display='none'; document.getElementById('lightresume').style.display='none'; document.getElementById('lightresume2').style.display='none'; document.getElementById('lightmerge').style.display='none'; document.getElementById('fade').style.display='none'"></div> 


<div id='lightresume' class='newwhite_content' style='height: 23%; cursor: default; color: white; font-size: 25; font-weight: bold; text-align: center; display: none;'>
Do you really want to delete your Resume?
<br>
<br>
<a class="newbutton" style="text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;" onclick="window.location = 'accountindex.php?deleteresume=true'; document.getElementById('lightresume').style.display='none'; document.getElementById('fade').style.display='none'">Yes</a>
<a class="newbutton" style="text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;" onclick="document.getElementById('lightresume').style.display='none'; document.getElementById('fade').style.display='none'">No</a>
</div>

<div id='lightresume2' class='newwhite_content' style='height: 23%; cursor: default; color: white; font-size: 25; font-weight: bold; text-align: center; display: none;'>
Do you really want to delete your Resume File?
<br>
<br>
<a class="newbutton" style="text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;" onclick="window.location = 'accountindex.php?deleteresumefile=true'; document.getElementById('lightresume2').style.display='none'; document.getElementById('fade').style.display='none'">Yes</a>
<a class="newbutton" style="text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;" onclick="document.getElementById('lightresume2').style.display='none'; document.getElementById('fade').style.display='none'">No</a>
</div>

<div id='lightskills' class='newwhite_content' style='height: 23%; cursor: default; color: white; font-size: 25; font-weight: bold; text-align: center; display: none;'>
Do you really want to delete your Skills?
<br>
<br>
<a class="newbutton" style="text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;" onclick="window.location = 'accountindex.php?deleteskills=true'; document.getElementById('lightskills').style.display='none'; document.getElementById('fade').style.display='none'">Yes</a>
<a class="newbutton" style="text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;" onclick="document.getElementById('lightskills').style.display='none'; document.getElementById('fade').style.display='none'">No</a>
</div>


<div id='lightquestions' class='newwhite_content' style='height: 23%; cursor: default; color: white; font-size: 25; font-weight: bold; text-align: center; display: none;'>
Do you really want to delete your Answers?
<br>
<br>
<a class="newbutton" style="text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;" onclick="window.location = 'accountindex.php?deletequestions=true'; document.getElementById('lightquestions').style.display='none'; document.getElementById('fade').style.display='none'">Yes</a>
<a class="newbutton" style="text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;" onclick="document.getElementById('lightquestions').style.display='none'; document.getElementById('fade').style.display='none'">No</a>
</div>


<div id='lightmerge' class='newwhite_content' style='height: 30%; width: 35%; cursor: default; color: white; font-size: 25; font-weight: bold; text-align: center; display: none;'>
Clicking below will allow<br>
you to Log In with Facebook<br>
from now on.
<br>
<br>
<button id="fbmergemebutton" class="fbbutton" style="width: 60%;">MERGE</button>
<script>
document.getElementById("fbmergemebutton").addEventListener("click", function() {
var justloggedin='no';
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected' && justloggedin == 'yes') {
      loginAPI();
    } else if (response.status === 'connected' && justloggedin == 'no') {
      // The person is logged into Facebook, but not your app.
      loadAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      logoutAPI();
    } else {
      logoutAPI();
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
    }
  }



  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1725123037768359',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.5' // use graph api version 2.5
  });



  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };


  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = '//connect.facebook.net/en_US/sdk.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));



  function loginAPI() {
    FB.api('/me?fields=name,email', function(response) {
      fbmergecall(response.id);
      location.reload();
    });
  }

  function loadAPI() {
    FB.api('/me?fields=name,email', function(response) {
fbtoken = response.id;
    });
  }

function fbmergecall(fbtoken){
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById('fbmergecall')
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName('script'); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }

  xhttp.open('GET', 'fbloginajax.php?fbtoken='+fbtoken+'&action=merge', true);
  xhttp.send();
}
    justloggedin = 'yes'; 
    loginAPI(); 
}, false);
</script>
<div style="margin-left: 25%;">
<div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-auto-logout-link="false" style="display: none;"></div>
<div id="status"></div>
</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br>

<div id="pb1" style="display: none;"></div>
<div id="pb2" style="display: none;"></div>
<div id="ed1" style="display: none;"></div>
<div id="ed2" style="display: none;"></div>
<div id="ex1" style="display: none;"></div>
<div id="ex2" style="display: none;">


