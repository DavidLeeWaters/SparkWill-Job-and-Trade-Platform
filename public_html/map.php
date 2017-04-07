<?php include "databaselogin.php"; session_start(); ?>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/background.css">
<link rel="stylesheet" type="text/css" href="css/list.css">
<link rel="icon" type="image/png" href="images/Logo.png" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />



<?php
if (isset($_GET['fromfront'])){
echo '<a class="newbutton" style="position: fixed; top: 1px; height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; float:left; color:white; cursor:pointer;" onclick="window.location.href = \'index.php?nofront=yes\';">Go Back</a>';
} else {
echo '<a class="newbutton" style="position: fixed; top: 1px; height: 40px; z-index: 1100; text-align: center; font-size: 15; font-weight: bold; float:left; color:white; cursor:pointer;" onclick="window.history.back();">Go Back</a>';
}

if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
echo "<scrip"."t>";
echo "if (!(window.frameElement)) {window.location = 'blank.php?page=map.php';} else {  } ";
echo "</scrip"."t>";
}
?>

<script>
if (window.frameElement) {
  window.parent.history.replaceState('Object', 'Title', '/blank.php?page=map.php');
}
</script>

<title><?php echo $_GET['search']; ?></title> 
<script>
 window.parent.document.title = "Map";
</script>  
	
    <header>
      <div class="wrapper">
          <nav style="cursor: default;">
<img src="images/Logo.png" alt="Logo" height="40px" width="40px"></img>
<a class='maintabs' href="index.php">Home</a>

			
<?php 

if (!empty($_SESSION['loggedin'])){

include 'loggedinmenu.php';

} else {
echo "<a class='maintabs' href='index.php?clickedhere=true&slogin=true'>Log In</a>";
}

?>


<?php
if (!empty($_SESSION['loggedin'])){
echo "
<a class='newbutton' style='text-align: center; font-size: 17; font-weight: bold; margin-left: 2%;' id='restaurants'>Restaurants</a>
";
} else {
echo "
<a class='newbutton' style='text-align: center; font-size: 17; font-weight: bold; margin-left: 10%;' id='restaurants'>Restaurants</a>
";
}
?>
<a class='newbutton' style='text-align: center; font-size: 17; font-weight: bold;' id='hotels'>Hotels</a>
<a class='newbutton' style='text-align: center; font-size: 17; font-weight: bold;' id='gas stations'>Gas Stations</a>
<a class='newbutton' style='text-align: center; font-size: 17; font-weight: bold;' id='hospitals'>Hospitals</a>
<a class='newbutton' style='text-align: center; font-size: 17; font-weight: bold;' id='fitness'>Gyms</a>

          </nav>
      </div>
    </header>
    </section>
</div>

<script>
var mapsrc = "";
var fullmapsrc = "";
<?php if (isset($_GET['search'])){echo "mapsrc='".$_GET['search']."'; ";} ?>
function makemap(thesrc) {
fullmapsrc = 'https://www.google.com/maps/embed/v1/search?q=' + thesrc + '%20near%20me' + '&key=AIzaSyAPLAWdGqx-mJhXcJyKUVdg0gG7PJfbdk4';
document.getElementById('map').src = fullmapsrc;
}
document.getElementById('hotels').addEventListener("click", function(){
   makemap('hotels');
});
document.getElementById('restaurants').addEventListener("click", function(){
   makemap('restaurants');
});
document.getElementById('gas stations').addEventListener("click", function(){
   makemap('gas stations');
});
document.getElementById('hospitals').addEventListener("click", function(){
   makemap('hospitals');
});
document.getElementById('fitness').addEventListener("click", function(){
   makemap('fitness');
});
</script>


<?php
echo '<iframe id="map" width="100%" height="93.5%" frameborder="0" style="border:0%; margin-top: 42px;" src="https://www.google.com/maps/embed/v1/search?q=';
if (isset($_GET['search'])){
echo $_GET['search'];
echo '%20near%20me';
} else {
echo 'my location';
}
echo '&key=AIzaSyAPLAWdGqx-mJhXcJyKUVdg0gG7PJfbdk4" allowfullscreen></iframe>';

?>


<script>
if (window.frameElement) {
  window.parent.history.replaceState('Object', 'Title', 'blank.php?page=map.php');
} else {
  window.parent.history.replaceState('Object', 'Title', 'map.php');
}
</script>