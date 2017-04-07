<?php include "databaselogin.php"; session_start(); ?>

<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/background.css">
<link rel="stylesheet" type="text/css" href="css/list.css">

<link rel="icon" type="image/png" href="images/Logo.png" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />


<a class="newbutton" style="position: fixed; top: 1px; height: 40px; z-index: 2000; text-align: center; font-size: 15; font-weight: bold; float:left; color:white; cursor:pointer;" onclick="window.history.back();">Go Back</a>

<?php
if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
echo "<scrip"."t>";
echo "if (!(window.frameElement)) {window.location = 'blank.php?page=createresume.php'}";
echo "</scrip"."t>";
} else {
echo "
<script>
window.history.back();
</script>
";
}
?>


<script>
if (window.frameElement) {
  window.parent.history.replaceState('Object', 'Title', '/blank.php?page=createresume.php');
}
</script>



<title>Create Resume</title>   
	
<script>
 window.parent.document.title = "Create Resume";
</script>

    <header>
      <div class="wrapper" onclick="document.getElementById('showlight').style.visibility ='hidden'; document.getElementById('show').style.visibility ='hidden';">
          <nav>
<img src="images/Logo.png" alt="Logo" height="40px" width="40px"></img>
<a class='maintabs' href="index.php">Home</a>

			
<?php 
if (!empty($_SESSION['loggedin'])){
include 'loggedinmenu.php';
}
?>




          </nav>
      </div>
    </header>


		

















<br><br><br>
<center>



<form method="post" action="accountindex.php" enctype="multipart/form-data" id="updateform">
<font size='5' style='cursor: default; color: green; font-weight: bold;'>Position You Want:</font><br><input type='text' onmouseover='this.focus();' onmouseout='this.blur();' style='border: 2px groove lightgreen; font-size: 15; color: green;width: 30%; text-align: center;  padding: 0.3%;' name='position' id='position' />
<br>
<font size='5' style='cursor: default; color: green; font-weight: bold;'>Your Area (County, City, Town, Etc...) :</font><br><input type='text' onmouseover='this.focus();' onmouseout='this.blur();' style='border: 2px groove lightgreen; font-size: 15; color: green;width: 30%; text-align: center;  padding: 0.3%;' name='area' id='area' />
<br>
<font size='5' style='cursor: default; color: green; padding-left: 0%; font-weight: bold;'>Experience:</font>
<br>
<textarea onmouseover='this.focus();' onmouseout='this.blur();' cols='100' rows='5' style='border: 2px groove lightgreen; font-size: 15; color: green; resize: none; text-align: center; padding: 0.3%;' name='experience' id='experience'>
</textarea>
<br>
<font size='5' style='cursor: default; color: green; font-weight: bold;'>Education:</font>
<br>
<span style="font-size: 20; font-weight: bold; color: green; cursor: default;">
 <input type="checkbox" name="highschool" value="highschool," id="highschool" /> Highschool
 <input type="checkbox" name="associates" value="associates," id="associates" /> Associates
 <input type="checkbox" name="bachelors" value="bachelors," id="bachelors" /> Bachelors<br>
 <input type="checkbox" name="masters" value="masters," id="masters" /> Masters
 <input type="checkbox" name="phd" value="phd," id="phd" /> PHD
 <input type="checkbox" name="md" value="md," id="md" /> MD
 <input type="checkbox" name="jd" value="jd" id="jd" /> JD<br>
</span>
<textarea onmouseover='this.focus();' onmouseout='this.blur();' cols='70' rows='5' style='border: 2px groove lightgreen; font-size: 15; color: green; resize: none; text-align: center; padding: 0.3%;' name='education' id='education'>
</textarea>
<br>
<font size='5' style='cursor: default; color: green; font-weight: bold;'>Certifications, Licenses:</font>
<br>
<textarea onmouseover='this.focus();' onmouseout='this.blur();' cols='100' rows='3' style='border: 2px groove lightgreen; font-size: 15; color: green; resize: none; text-align: center; padding: 0.3%;' name='certlic' id='certlic'>
</textarea>
<br>
<br>

<input type='button' class='newbutton' value='Update' style='cursor: pointer;' style='width: 25%;' onclick='checkupdate()'/>
</form>

</center>

<script>
window.onload = document.body.style.background = 'lightgreen';

function checkupdate() {
if (document.getElementById('position').value == ''){
	document.getElementById('position').style.borderColor = 'red';
    document.getElementById('position').style.outline = 'none';
     } else {
	document.getElementById('position').style.borderColor = 'transparent';
    document.getElementById('position').style.outline = 'initial';
}
if (document.getElementById('experience').value == ''){
	document.getElementById('experience').style.borderColor = 'red';
    document.getElementById('experience').style.outline = 'none';
     } else {
	document.getElementById('experience').style.borderColor = 'transparent';
    document.getElementById('experience').style.outline = 'initial';
}
if (document.getElementById('position').value != '' && document.getElementById('experience').value != ''){	 
document.getElementById('updateform').submit();
}
}






<?php
$sql="SELECT * FROM resumes WHERE username = ('$username')";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$position = $row['position'];
$experience = $row['experience'];
$education = $row['education'];
$certlic = $row['certlic'];
$area = $row['area'];
$degrees = $row['degrees'];

echo "document.getElementById('position').value = '".$position."';";
echo "document.getElementById('education').value = '".$education."';";
echo "document.getElementById('experience').value = '".$experience."';";

if (!empty($certlic)){
echo "document.getElementById('certlic').value = '".$certlic."';";
}
if (!empty($degrees)){
$degrees2 = explode(',' , $degrees);
foreach($degrees2 as $key){
echo "document.getElementById('".$key."').checked = 'true';";
}
}
if (!empty($area)){
echo "document.getElementById('area').value = '".$area."';";
}

}
?>










</script>

