<script>
window.onbeforeunload = function () { };
</script>
<?php include "databaselogin.php"; session_start();

if (isset($_SESSION['username']) && isset($_GET['section']) && isset($_GET['type'])){
$username = $_SESSION['username'];
    echo "<scrip"."t>";
    echo "if (!(window.frameElement)) {window.location = 'blank.php?page=post".$_GET['type'].".php';}";
    echo "</scrip"."t>"; 
} else {
   	 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';  
exit();   
}
?>

<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/background.css">
<link rel="stylesheet" type="text/css" href="css/list.css">
<style>
input[type="checkbox"]{
  width: 30px;
  height: 30px;
}
</style>


<link rel="icon" type="image/png" href="images/Logo.png" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />

<a class="newbutton" style="position: fixed; top: 1px; height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; float:left; color:white; cursor:pointer;" onclick="window.history.back();">Go Back</a>


<script>
if (window.frameElement) {
  window.parent.history.replaceState('Object', 'Title', '/blank.php?page=post<?php echo $_GET['type']; ?>.php');
}
</script>



<title>Trade Posting</title>   
	
    <header>
      <div class="wrapper" onclick="document.getElementById('showlight').style.visibility ='hidden'; document.getElementById('show').style.visibility ='hidden';">
          <nav style="">
<img src="images/Logo.png" alt="Logo" height="40px" width="40px"></img>
<a class="maintabs" href="index.php">Home</a>

			
<?php 
if (!empty($_SESSION['loggedin'])){
include 'loggedinmenu.php';
} else {
echo "<a class='maintabs' href='index.php'>Log In</a>";
}
?>




          </nav>
      </div>
    </header>


		
      <div class="wrapper">

<?php 

echo "
<br><br><br>
<center>
<form method=\"post\" action=\"list.php?section=".$_GET['section']."&type=".$_GET['type']."\" enctype=\"multipart/form-data\" id=\"k\">
<font size='6' style='cursor: default; color: white; display:inline-block; vertical-align:middle;'>Title:</font><br><input type='text' onmouseover='this.focus();' onmouseout='this.blur();' onfocus='this.style.border = \"2px ridge red\";' onblur='this.style.border = \"2px ridge white\";' style='outline: 0; border: 2px ridge white; border-radius: 2px; color:green; font-size:20; text-align:center; display:inline-block; vertical-align:middle; padding: 5px;' name='title' id='title' autofocus/>
        <br>
<font size='6' style='cursor: default; color: white; display:inline-block; vertical-align:middle;'>Price:</font><br><input type='text' onmouseover='this.focus();' onmouseout='this.blur();' onfocus='this.style.border = \"2px ridge red\";' onblur='this.style.border = \"2px ridge white\";' style='outline: 0; border: 2px ridge white; border-radius: 2px; color:green; font-size:20; text-align:center; display:inline-block; vertical-align:middle; padding: 5px;' name='pay' id='pay' autofocus/>
        <br>
<font size='6' style='cursor: default; color: white;'>Content:</font><br><textarea onmouseover='this.focus();' onmouseout='this.blur();' name='content' cols='50' rows='5' id='content' onfocus='this.style.border = \"2px ridge red\";' onblur='this.style.border = \"2px ridge white\";' style='outline: 0; border: 2px ridge white; border-radius: 2px; color:green; font-size:20; text-align:center; resize: none; padding: 5px;'></textarea>
        <br>
<font size='6' style='cursor: default; color: white; display:inline-block; vertical-align:middle;'>Area:</font><br><input type='text' onmouseover='this.focus();' onmouseout='this.blur();' onfocus='this.style.border = \"2px ridge red\";' onblur='this.style.border = \"2px ridge white\";' style='outline: 0; border: 2px ridge white; border-radius: 2px; color:green; font-size:20; text-align:center; display:inline-block; vertical-align:middle; padding: 5px;' name='area' id='area'/>
        <br>
<font size='6' style='cursor: default; color: white; display:inline-block; vertical-align:middle;'>Address:</font><br><input type='text' onmouseover='this.focus();' onmouseout='this.blur();' onfocus='this.style.border = \"2px ridge red\";' onblur='this.style.border = \"2px ridge white\";' style='outline: 0; border: 2px ridge white; border-radius: 2px; color:green; font-size:20; text-align:center; display:inline-block; vertical-align:middle; padding: 5px;' name='address' id='address'/>
        <br>
        <br>
<input type='checkbox' name='semail' value='semail' id='semail' /> <b style='cursor: default; color: white; font-size:20;'>Show E-mail</b>
        <br>
        <br>
        <b style='cursor: default; color: black; font-size:20;'>Add a Picture</b>
        <br>
        <input style='color: black; padding-left: 10%;' name='uploads[]' type='file' multiple>
        <input style='color: black; padding-left: 10%;' name='uploads[]' type='file' multiple>
        <input style='color: black; padding-left: 10%;' name='uploads[]' type='file' multiple>
        <input style='color: black; padding-left: 10%;' name='uploads[]' type='file' multiple>
<center><input style='color: black; padding-left: 10%;' name='uploads[]' type='file' multiple></center>
        <br>
        

";


?>

<input type='hidden' name='type' id='type' value='<?php echo $_GET['type']; ?>'>

<input type='submit' class='newbutton' value='Post' style='font-size: 15; font-weight: bold; width: 25%;'>
</form>




<br>



<div id="contentwrap">
 
 


<div style="clear: both;"> </div>

</div>





</div>
    </section>
</div>


<script>

function checker(a){
if (document.getElementById(a).checked === true){
document.getElementById(a).checked = false;
} else {
document.getElementById(a).checked = true;
}
}


window.onload = document.body.style.background = 'darkgreen';

</script>
