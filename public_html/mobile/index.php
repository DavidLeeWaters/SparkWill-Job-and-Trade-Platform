<?php include "../databaselogin.php"; require "background_loader.php"; session_start(); 


if (isset($_GET['loggingout'])){session_destroy(); echo "<script>window.location = 'index.php';</script>"; exit();}


if (isset($_POST['login_username']) && isset($_POST['login_password'])){

    $login_username = mysql_real_escape_string($_POST['login_username']);
    $login_password = mysql_real_escape_string($_POST['login_password']);

    $checklogin = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '".$login_username."' AND password = '".$login_password."' "));	 

    if($checklogin!=0){
             $sql="SELECT * FROM users WHERE username = '".$login_username."'";
             $result = mysql_query($sql);
             while($row = mysql_fetch_array($result)) 
                 {
	             $email = $row['email'];
                     $state = $row['state'];
                     $area = $row['area'];
                 }
             $_SESSION['state'] = $state;
             $_SESSION['area'] = $area;
	     $_SESSION['email'] = $email;
	     $_SESSION['username'] = $login_username;
	     $_SESSION['password'] = $login_password;
     	     $_SESSION['loggedin'] = 1;  
	 } else {
             echo "<script>alert('Wrong Username or Password')</script>";
         }


}
?>

<link rel="icon" type="image/png" href="images/logo.png" sizes="16x16">


<!DOCTYPE html>
<html lang="en">
<head>
  <title>SparkWill</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="main_font_color">
    <h1>SparkWill</h1>
    <button type="button" class="btn btn-danger btn-sm" style="float: right; display: none;" id="x_top_buttons" onclick="hide_top_buttons();">X</button>
    <p>Helping people find work!</p> 
</div>
<?php
    if (!isset($_SESSION['loggedin'])){
        echo '
            <div class="btn-group btn-group-justified" id="top_buttons">
                <a id="signup_button" class="btn btn-primary btn-block" onclick="show_top_buttons(\'signup\');">Sign up</a>
                <a id="login_button" class="btn btn-info btn-block" onclick="show_top_buttons(\'login\');">Log In</a>
            </div>
        ';
    }
?>
    <br>
    <button type="button" class="btn btn-danger btn-sm" style="float: right; display: none;" id="x_content_area" onclick="hide_content_area();">X</button>
<div id="content_area">
<button type="button" class="btn btn-primary btn-block btn-lg" onclick="show_content_area('jobs_physical');">Physical Jobs</button>
<button type="button" class="btn btn-info btn-block btn-lg" onclick="show_content_area('jobs_mental');">Mental Jobs</button>
<button type="button" class="btn btn-success btn-block btn-lg" onclick="show_content_area('trade');">Trade</button>
<button type="button" class="btn btn-warning btn-block btn-lg" onclick="show_content_area('housing_for_rent');">Housing for Rent</button>
<button type="button" class="btn btn-danger btn-block btn-lg" onclick="show_content_area('housing_for_sale');">Housing for Sale</button>
</div>

</div>


</body>
</html>

<script>

<?php 

$types = array('jobs_mental', 'jobs_physical', 'trade', 'housing_for_rent', 'housing_for_sale');




$jobs_physical_sections = array('automotives', 'food', 'barbering', 'labor', 'manufacturing', 'nonprofit', 'part-time', 'real estate', 'retail', 'security', 'skilled trade', 'transport');

$jobs_mental_sections = array('accounting', 'education', 'engineering', 'finance', 'hardware', 'software', 'legal', 'management', 'office', 'science', 'marketing', 'sales');

$trade_sections = array('appliances', 'electronics', 'clothes', 'barber', 'free', 'baby or child', 'wanted', 'business', 'small auto', 'auto', 'auto parts', 'boats');

$housing_for_rent_sections = array('apartments', 'office', 'business', 'storage', 'rooms', 'rooms wanted', 'temporary', 'vacation rentals');

$housing_for_sale_sections = array('homes', 'land', 'apartment complex', 'business');



foreach ($types as $type) {

echo 'var '.$type.'_content = \''; 

foreach (${$type.'_sections'} as ${$type.'_section'}) {
    echo '<button type="button" class="btn btn-primary btn-block btn-lg" onclick="goto_section(&apos;'.explode('_',$type)[0].'&apos;, &apos;'.${$type.'_section'}.'&apos;)">'.${$type.'_section'}.'</button>';
}

echo '\';';

}


?>




    function goto_section(type, section){
        window.location = 'postings.php?type='+type+'&section='+section;
    }

    function show_content_area(type){
        document.getElementById('x_content_area').style.display = 'block';
        document.getElementById('content_area').innerHTML = window[type+'_content'];
}

    function hide_content_area(type){
        document.getElementById('x_content_area').style.display = 'none';
        document.getElementById('content_area').innerHTML = '<button type="button" class="btn btn-primary btn-block btn-lg" onclick="show_content_area(\'jobs_physical\');">Physical Jobs</button><button type="button" class="btn btn-info btn-block btn-lg" onclick="show_content_area(\'jobs_mental\');">Mental Jobs</button><button type="button" class="btn btn-success btn-block btn-lg" onclick="show_content_area(\'trade\');">Trade</button><button type="button" class="btn btn-warning btn-block btn-lg" onclick="show_content_area(\'housing_for_rent\');">Housing for Rent</button><button type="button" class="btn btn-danger btn-block btn-lg" onclick="show_content_area(\'housing_for_sale\');">Housing for Sale</button>';
}

    var original_form = '<a id="signup_button" class="btn btn-primary btn-block" onclick="show_top_buttons(\'signup\');">Sign up</a><a id="login_button" class="btn btn-info btn-block" onclick="show_top_buttons(\'login\');">Log In</a>';

    var signup_form = '<form action="index.php" method="POST" role="form"><div class="form-group"><label for="signup_username">Username:</label><input type="text" class="form-control" id="signup_username" name="signup_username"></div><div class="form-group"><label for="signup_password">Password:</label><input type="password" class="form-control" id="signup_password" name="signup_password"></div><div class="form-group" style="text-align: center;"><button type="submit" class="btn btn-primary">Submit</button></div></form>';

    var login_form = '<form action="index.php" method="POST" role="form"><div class="form-group"><label for="login_username">Username:</label><input type="text" class="form-control" id="login_username" name="login_username"></div><div class="form-group"><label for="login_password">Password:</label><input type="password" class="form-control" id="login_password" name="login_password"></div><div class="form-group" style="text-align: center;"><button type="submit" class="btn btn-primary">Submit</button></div></form>';

    function show_top_buttons(action){
        document.getElementById('x_top_buttons').style.display = 'block';
        if (action == 'signup'){
            document.getElementById('top_buttons').innerHTML = signup_form;
        } else {
            document.getElementById('top_buttons').innerHTML = login_form;
        }
        }

    function hide_top_buttons(){
        document.getElementById('x_top_buttons').style.display = 'none';
        document.getElementById('top_buttons').innerHTML = original_form;
    }
</script>