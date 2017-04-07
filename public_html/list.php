<?php include "databaselogin.php"; session_start(); unset($_SESSION['term']); 
if ($_GET['section']=='' or $_GET['type']=='') {echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">'; exit();}
$_SESSION['page'] = 1;
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<link rel="icon" type="image/png" href="images/Logo.png" sizes="16x16">
<script>
var showhere = window.location.href
showhere = showhere.replace("https://sparkwill.com/list.php?", "");

if (parent.window.location.href.includes('&fromfront=yes') === true) {
var pwlhr = parent.window.location.href.replace("&fromfront=yes", "");
window.parent.history.replaceState('Object', 'Title', pwlhr);
}
if (parent.window.location.href.includes('https') === false) {
var pwlhr2 = parent.window.location.href.replace("http://", "");
pwlhr2 = pwlhr2.replace("www.", "");
pwlhr2 = "https://" + pwlhr2;
parent.window.location.href = pwlhr2;
}

</script>

<?php
if (isset($_GET['fromfront'])){
echo '<a class="newbutton" style="position: fixed; top: 1px; height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; float:left; color:white; cursor:pointer;" onclick="window.location.href = \'index.php?nofront=yes\';">Go Back</a>';
} else {
echo '<a class="newbutton" style="position: fixed; top: 1px; height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; float:left; color:white; cursor:pointer;" onclick="window.history.back();">Go Back</a>';
}
?>

<?php
if (isset($_SESSION['username'])){
echo "<scrip"."t>";
echo "if (!(window.frameElement)) {window.location = 'blank.php?page=listings.php&'+showhere;}";
echo "</scrip"."t>";
}


?>
<link rel="stylesheet" type="text/css" href="css/gallery.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/background.css">
<link rel="stylesheet" type="text/css" href="css/list.css">
<link rel="stylesheet" type="text/css" href="css/search.css">


<div id="top"></div>
<script>
i=0;
function rinout(){
if (i==0){i=1; document.getElementById('micro').style.background = 'white';} else {i=0; document.getElementById('micro').style.background = 'linear-gradient(#333, #222)';}
}
</script>
<?php 
include "js/microphone.js"; 

function endsWith($str, $sub) {
   return ( substr( $str, strlen( $str ) - strlen( $sub ) ) === $sub );
}

if (isset($_GET['type'])) {
$type = ($_GET['type']);
}

?>





<title>List</title> 

<script>
 window.parent.document.title = "<?php echo ucfirst($type); ?>";
</script>	
    <header>
      <div class="wrapper">
          <nav style="">
<img src="images/Logo.png" alt="Logo" height="40px" width="40px"></img>
<a class='maintabs' href="index.php?clickedhere=true">Home</a>

			
<?php 

if (!empty($_SESSION['loggedin'])){

include 'loggedinmenu.php';

} else {
echo "
<a class='maintabs' href='index.php?clickedhere=true&slogin=true'>Log In</a>
";
}

?>




  

<section class="webdesigntuts-workshop" style="display: inline-block;">
		    
		<input type="search" placeholder="Search..." id="search" onmouseover='this.focus();' onmouseout='' oninput="Search();" onfocus='glowme();' onfocusout="glowout();"></input>
<button id='micro' onmouseover="document.getElementById('searchnote').style.display='block';" onmouseout="document.getElementById('searchnote').style.display='none';" onclick="startDictation(event); rinout()" style="width:40px; border-radius: 0 0 0 0; border-left: none;"><label for="search"><img src="images/voice.png" alt="microphone" height="40px" width="40px"></label></button>	    	
		<button onclick="Search(); if (recognizing){rinout(); recognition.stop();return;};" style="border-left: none;" >Search</button>

<span class='toptimebubble' id='searchnote' style='cursor: default; margin-left: 45.5%; position: absolute; margin-top: 40px; opacity: 0.8; font-size: 20; display: none; background: black; color: white; border-radius: 3px;' onmouseover='this.style.display = "block";' onmouseout='this.style.display = "none";'>Voice Search</span>

</section>

<script>
if (!(window.frameElement)) {
  document.getElementById('searchnote').style.marginRight = '26%';
}
function glowme(){
document.getElementById('micro').style.borderColor = "forestgreen";
}
function glowout(){
document.getElementById('micro').style.borderColor = "#000";
}
</script>


          </nav>
      </div>
    </header>


	

    <section id="main">
	

	  <div id="leftCol"><font size='3'>
          <br><br><br>
<?php echo "<div class='wordwrap' style='width: 100%;'><h1 style='font-size: 20; color:firebrick;'><center><span id='secchange'>".$_GET['section']."</span></center></h1></div>"; ?>



<select name='state' id='state' style='height: 30px; font-size: 18;' onchange='Search();'>

        <option value='FL'>Florida</option>
	<option value='AL'>Alabama</option>
	<option value='AK'>Alaska</option>
	<option value='AZ'>Arizona</option>
	<option value='AR'>Arkansas</option>
	<option value='CA'>California</option>
	<option value='CO'>Colorado</option>
	<option value='CT'>Connecticut</option>
	<option value='DE'>Delaware</option>
	<option value='GA'>Georgia</option>
	<option value='HI'>Hawaii</option>
	<option value='ID'>Idaho</option>
	<option value='IL'>Illinois</option>
	<option value='IN'>Indiana</option>
	<option value='IA'>Iowa</option>
	<option value='KS'>Kansas</option>
	<option value='KY'>Kentucky</option>
	<option value='LA'>Louisiana</option>
	<option value='ME'>Maine</option>
	<option value='MD'>Maryland</option>
	<option value='MA'>Massachusetts</option>
	<option value='MI'>Michigan</option>
	<option value='MN'>Minnesota</option>
	<option value='MS'>Mississippi</option>
	<option value='MO'>Missouri</option>
	<option value='MT'>Montana</option>
	<option value='NE'>Nebraska</option>
	<option value='NV'>Nevada</option>
	<option value='NH'>New Hampshire</option>
	<option value='NJ'>New Jersey</option>
	<option value='NM'>New Mexico</option>
	<option value='NY'>New York</option>
	<option value='NC'>North Carolina</option>
	<option value='ND'>North Dakota</option>
	<option value='OH'>Ohio</option>
	<option value='OK'>Oklahoma</option>
	<option value='OR'>Oregon</option>
	<option value='PA'>Pennsylvania</option>
	<option value='RI'>Rhode Island</option>
	<option value='SC'>South Carolina</option>
	<option value='SD'>South Dakota</option>
	<option value='TN'>Tennessee</option>
	<option value='TX'>Texas</option>
	<option value='UT'>Utah</option>
	<option value='VT'>Vermont</option>
	<option value='VA'>Virginia</option>
	<option value='WA'>Washington</option>
	<option value='DC'>Washington D.C.</option>
	<option value='WV'>West Virginia</option>
	<option value='WI'>Wisconsin</option>
	<option value='WY'>Wyoming</option>
</select>

<br>
<br>

<select name='typechange' id='typechange' style='height: 30px; font-size: 18;' onchange='Search();'>

	<option value='activities'>Activities</option>
        <option value='job'>Jobs</option>
	<option value='place'>Place</option>
	<option value='services'>Services</option>
	<option value='trade'>Trade</option>

</select>

<style>
#typechange {
  width: 150px;   
}
</style>



<br>
<br>

<style>
input::-webkit-input-placeholder { /* WebKit browsers */
    color: white;
}
input:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color: white;
}
input::-moz-placeholder { /* Mozilla Firefox 19+ */
    color: white;
}
input:-ms-input-placeholder { /* Internet Explorer 10+ */
    color: white;
}
</style>

<input type='text' onmouseover='this.focus(); this.placeholder=""; this.style.outline = "1px solid lime"; ' onmouseout='this.blur(); this.placeholder="Area"; this.style.outline = "none"; ' style='outline: 0 none; border-style: none; color: white; background: forestgreen; width: 135px; text-align:center; vertical-align:middle; padding: 2px;' name='area' id='area' placeholder='Area' oninput="page = 1; Search();"/>

<script>
<?php
if (isset($_SESSION['state'])){
echo "document.getElementById('state').value = '".$_SESSION['state']."'; ";
} else {
echo "document.getElementById('state').value = 'FL'; ";
}

?>
</script>

<br>
<br>

<input type='text' onmouseover='this.focus(); this.placeholder=""; this.style.outline = "1px solid lime"; ' onmouseout='this.blur(); this.placeholder="Section"; this.style.outline = "none"; ' style='outline: 0 none; border-style: none; color: white; background: forestgreen; width: 135px; text-align:center; vertical-align:middle; padding: 2px;' name='sectionchange' id='sectionchange' placeholder='Section' oninput="sectionchangerajax();"/>

<br>

<script>
document.getElementById('sectionchange').value = '<?php echo $_GET['section']; ?>';

document.getElementById('typechange').value = '<?php echo $_GET['type']; ?>';

document.getElementById('typechange').addEventListener('change', typefunc, false);

if (document.getElementById('sectionchange').value != ''){
var sectionvar = document.getElementById('sectionchange').value;
} else {
var sectionvar = '<?php echo $_GET['section']; ?>';
}
var typevar = document.getElementById('typechange').value;


function typefunc(){

if (document.getElementById('sectionchange').value != ''){
sectionvar = document.getElementById('sectionchange').value;
} else {
sectionvar = '<?php echo $_GET['section']; ?>';
}

typevar = document.getElementById('typechange').options[document.getElementById('typechange').selectedIndex].value;

window.location.href = 'list.php?section=' + sectionvar + '&type=' + typevar; 


}


</script>

<?php

if ($_GET['type']=='place'){
echo "
<br>Price<br>
<input type='text' onmouseover='this.focus(); this.placeholder=\"\"; this.style.outline = \"1px solid lime\"; ' onmouseout='this.blur(); this.placeholder=\"Min\"; this.style.outline = \"none\"; ' style='outline: 0 none; border-style: none; color: white; background: forestgreen; width: 65px; text-align:center; vertical-align:middle; padding: 2px;' name='area' id='minprice' placeholder='Min' oninput='Search();'/>
<input type='text' onmouseover='this.focus(); this.placeholder=\"\"; this.style.outline = \"1px solid lime\"; ' onmouseout='this.blur(); this.placeholder=\"Max\"; this.style.outline = \"none\"; ' style='outline: 0 none; border-style: none; color: white; background: forestgreen; width: 65px; text-align:center; vertical-align:middle; padding: 2px;' name='area' id='maxprice' placeholder='Max' oninput='Search();'/>
";
}

?>

<br>
<br>

 <input type="checkbox" name="test" id="*1*" onchange="CheckBoxer(this.id);" style="height: 20px; width: 20px;"/>From Today<br/>
 <input type="checkbox" name="test" id="*2*" onchange="CheckBoxer(this.id);" style="height: 20px; width: 20px;"/>Has Pictures<br/>


          </font></div> 
        

	
	
      <div class="wrapper">



     
     <form> 
<input type="button" class="newbutton" name="Text" value="Text" onclick="Search('List')" style="width:15%;">
<input type="button" class="newbutton" name="Pic" value="Pic" onclick="Search('Thumb')" style="width:15%;">
<input type="button" class="newbutton" name="Gallery" value="Gallery" onclick="Search(this.value)" style="width:15%;">  
</select>
</form>


<?php



 if (!empty($_SESSION['loggedin'])){
 echo "
<br>
<a id='stest' class='newbutton' style='text-align: center; font-size: 15; font-weight: bold; color:white; cursor:pointer;' onclick=\"window.location = 'post".$_GET['type'].".php?section=".$_GET['section']."&type=".$_GET['type']."';\">Post</a>
      ";
                                   } else {
 echo "<span style='font-size: 20; color: green;'>
<b>please <a href='https://sparkwill.com/index.php?clickedhere=true&slogin=true' style='color: darkgreen;'> log in</a> or <a href='https://sparkwill.com/index.php?ssignup=true' style='color: darkgreen;'> sign up</a> to post</b>
      </span>";
                                          }





echo "




";


?>


<br>


<div id="results"></div>
<div id="sectionresults"></div>



<script>
var assignedTos = '';
var assignedTo = '';

function CheckBoxer(pid){
if (document.getElementById(pid).checked == true){
assignedTo = assignedTo+pid;

} else {
assignedTo = assignedTo.replace(pid,'');

}


area = document.getElementById('area').value;
state = document.getElementById('state').value;

  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("results")
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }
searchvar = document.getElementById('search').value;
  xhttp.open("GET", "listajax.php?c="+assignedTo+"&t="+searchvar+"&s=undefined"+"&state="+state+"&area="+area, true);
  xhttp.send();

assignedTos = assignedTo;
};

function sectionchangerajax(){
page = 1;
sectionvar = document.getElementById('sectionchange').value;

  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var secdiv = document.getElementById("sectionresults")
      secdiv.innerHTML = xhttp.responseText;

var x = secdiv.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }

  xhttp.open("GET", "sectionchangerajax.php?section=" + sectionvar, true);
  xhttp.send();
}


page = <?php echo $_SESSION['page']; ?>;
function Search(str){
area = document.getElementById('area').value;
state = document.getElementById('state').value;

<?php
if ($_GET['type']=='place'){
echo "
minprice = document.getElementById('minprice').value;
maxprice = document.getElementById('maxprice').value;
";
}
?>

searchvar = document.getElementById('search').value;
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("results")
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }

<?php
if ($_GET['type']=='place'){
echo '
  xhttp.open("GET", "listajax.php?c="+assignedTos+"&t="+searchvar+"&s="+str+"&state="+state+"&area="+area+"&minprice="+minprice+"&maxprice="+maxprice, true);
';
} else {
echo '
xhttp.open("GET", "listajax.php?c="+assignedTos+"&t="+searchvar+"&s="+str+"&state="+state+"&area="+area+"&page="+page, true);
';
}
?>
  xhttp.send();
}




window.onload=Search('<?php if (isset($_SESSION['style'])){echo($_SESSION['style']);}else{echo 'List';} ?>');

</script>
















<div id="contentwrap">
 
 
<?php 



 if (!empty($_FILES['uploads']['name'])){

    //create folder
$sql7="SELECT id FROM postings ORDER BY id DESC LIMIT 1";
$result7 = mysql_query($sql7);
while($row7 = mysql_fetch_array($result7)) 
{
$newfilename = ($row7['id'])+1;
}
	mkdir('images/post/'.$newfilename, 0777, true);


}

$k=0;

foreach ($_FILES['uploads']['name'] as $filename) {
$fext = 'no';

    

$lastDot = strrpos($filename, ".");
$string = str_replace(".", "", substr($filename, 0, $lastDot)) . substr($filename, $lastDot);
    $maybe = strtr("$string" , "," , " ");
    $maybe = str_replace(' ','',$maybe ); 
   
if (endsWith($maybe, ".jpg")){
$fext = 'yes';
}
if (endsWith($maybe, ".bmp")){
$fext = 'yes';
}
if (endsWith($maybe, ".png")){
$fext = 'yes';
}
if (endsWith($maybe, ".gif")){
$fext = 'yes';
}
if (endsWith($maybe, ".jpeg")){
$fext = 'yes';
}
if (endsWith($maybe, ".bpg")){
$fext = 'yes';
}
if (endsWith($maybe, ".ico")){
$fext = 'yes';
}
if (endsWith($maybe, ".img")){
$fext = 'yes';
}

   //upload picture

if ($fext=='yes'){

    if (!empty($test)){
    if (!empty($maybe)) {
    $test = $test.",".$maybe;
    }} else {
    $test = $maybe;
    }


	move_uploaded_file($_FILES['uploads']['tmp_name'][$k], "images/post/$newfilename/$maybe");
   $k++;
}



}








if (isset($_GET['section'])) {
$section = ($_GET['section']);
$_SESSION['section'] = $section;
} else {
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
}

if (isset($_GET['type'])) {
$type = ($_GET['type']);
$_SESSION['type'] = $type;
} else {
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
}

if (!empty($_POST['content']) && !empty($_POST['title']) && !empty($_POST['type'])){
$type = $_POST['type'];
$address = mysql_real_escape_string($_POST['address']);
$timezone = -4;
$state = $_SESSION['state'];
$section = mysql_real_escape_string($_SESSION['section']);
$message = $_POST['content'];



function str_lreplace($search, $replace, $subject)
{   
    $pos = strrpos($subject, $search);
    if($pos !== false){ $subject = substr_replace($subject, $replace, $pos, strlen($search)); }
    return $subject;
}

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
$content = mysql_real_escape_string($content);
$content = str_replace("%E2%80%A2",",",$content);
$area = urlencode($_POST['area']);
$area = mysql_real_escape_string($area);
$email = mysql_real_escape_string($_SESSION['email']);
$time = gmdate("Y/m/j ".','." H:i", time() + 3600*($timezone));
$title = urlencode($_POST['title']);
$title = mysql_real_escape_string($title);
$pay = urlencode($_POST['pay']);
$pay = mysql_real_escape_string($pay);
$username = ($_SESSION['username']);
$picnames = $test;
if ($picnames==''){$picnames='default.jpg';}
$extid = pathinfo($picnames, PATHINFO_EXTENSION);
$requirements = '';
$edrequirements = '';

if ($_POST['semail'] == 'semail'){
$semail = 'yes';
}

if (isset($_POST['requirements'])){

$requirements = ($_POST['advise_clients_or_customers'].$_POST['answer_customer_or_public_inquiries'].$_POST['call_on_customers_to_solicit_new_business'].$_POST['climb_ladders_and_scaffolding_and_or_utility_or_telephone_poles'].$_POST['collect_payment'].$_POST['communicate_technical_information'].$_POST['communicate_visually_or_verbally'].$_POST['conduct_or_attend_staff_meetings'].$_POST['confer_with_engineering_and_technical_or_manufacturing_personnel'].$_POST['consult_with_customers_concerning_needs'].$_POST['develop_budgets'].$_POST['develop_or_maintain_databases'].$_POST['develop_plans_for_programs_or_projects'].$_POST['examine_files_or_documents_to_obtain_information'].$_POST['file_or_retrieve_paper_documents_and_related_materials'].$_POST['fill_out_business_or_government_forms'].$_POST['follow_safe_waste_disposal_procedures'].$_POST['follow_tax_laws_or_regulations'].$_POST['greet_customers_and_guests_and_visitors_and_or_passengers'].$_POST['maintain_records_and_reports_and_or_files'].$_POST['maintain_relationships_with_clients'].$_POST['make_decisions'].$_POST['make_presentations'].$_POST['modify_work_procedures_or_processes_to_meet_deadlines'].$_POST['move_or_fit_heavy_objects'].$_POST['obtain_information_from_clients_and_customers_and_or_patients'].$_POST['package_goods_for_shipment_or_storage'].$_POST['prepare_reports_for_management'].$_POST['provide_customer_service'].$_POST['read_technical_drawings'].$_POST['receive_customer_orders'].$_POST['record_clients_personal_data'].$_POST['retrieve_files_or_charts'].$_POST['schedule_meetings_or_appointments'].$_POST['stock_or_organize_goods'].$_POST['take_messages'].$_POST['understand_second_language'].$_POST['understand_technical_operating_and_service_or_repair_manuals'].$_POST['use_cash_registers'].$_POST['use_computers_to_enter_and_access_or_retrieve_data'].$_POST['use_conflict_resolution_techniques'].$_POST['use_government_regulations'].$_POST['use_health_or_sanitation_standards'].$_POST['use_interpersonal_communication_techniques'].$_POST['use_interviewing_procedures'].$_POST['use_inventory_control_procedures'].$_POST['use_negotiation_techniques'].$_POST['use_oral_or_written_communication_techniques'].$_POST['use_project_management_techniques'].$_POST['use_public_speaking_techniques'].$_POST['use_secretarial_procedures'].$_POST['use_time_management_techniques'].$_POST['work_as_a_team_member']);

$requirements = rtrim($requirements, ',');
	
}



if (isset($_POST['edrequirements'])){

$edrequirements = ($_POST['highschool'].$_POST['associates'].$_POST['bachelors'].$_POST['masters'].$_POST['phd'].$_POST['md'].$_POST['jd']);

$edrequirements = rtrim($edrequirements, ',');
	
}

$sql8="SELECT id FROM postings ORDER BY id DESC LIMIT 1";
$result8 = mysql_query($sql8);
while($row8 = mysql_fetch_array($result8)) 
{
$newid = ($row8['id'])+1;
}
    $registerquery = mysql_query("INSERT INTO postings (id, content, email, section, time, title, username, picnames, state, area, requirements, edrequirements, pay, type, semail, address) VALUES('".$newid."', '".$content."', '".$email."', '".$section."', '".$time."', '".$title."',  '".$username."', '".$picnames."', '".$state."', '".$area."', '".$requirements."', '".$edrequirements."', '".$pay."', '".$type."', '".$semail."', '".$address."' )");
        if($registerquery == '1')
        {
$sql="SELECT * FROM postings WHERE username = ('$username') AND title = ('$title') AND section = ('$section') AND time = ('$time')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$id = ($row['id']);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=content.php?title='.urlencode($title).'&id='.$id.'&justposted=yes">';
}
	}

}




?>




<div style="clear: both;"> </div>

</div>








<a onclick="gotop()" id="gotop" style="display: none;"><img height="75px" width="75px" src="images/top.png" class="fixedbutton"></a>
<script>
function gotop(){
document.getElementById("top").scrollIntoView(true);
}

window.onscroll = function() {showscroll()};

function showscroll() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById("gotop").style.display = "";
    } else {
        document.getElementById("gotop").style.display = "none";
    }
}
</script>















</div>
    </section>
</div>

<script>
if (window.frameElement) {
  window.parent.history.replaceState('Object', 'Title', '/blank.php?page=listings.php&section=<?php echo $section; ?>&type=<?php echo $type; ?>');
}
</script>