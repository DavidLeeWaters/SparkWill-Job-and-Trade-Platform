<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/background.css" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/accountbox.css">
<div id="circus"></div>

<script>
page = 'index.php';
other = '';
section = '';
<?php 

if (isset($_GET['page'])){
echo "page = '".$_GET['page']."';";
}

if (isset($_GET['other'])){
echo "other = '".$_GET['other']."';";
}

if (isset($_GET['section'])){
echo "section = '".$_GET['section']."';";
}

if (isset($_GET['type'])){
echo "type = '".$_GET['type']."';";
}



if (isset($_GET['title']) && isset($_GET['id'])){
$title = $_GET['title'];
echo "title = '".$title."';";
echo "id = '".$_GET['id']."';";
}










?>
var xhttp; 
xhttp = new XMLHttpRequest();
xhttp.open("GET", "blankajax.php?test="+page<?php if (isset($title)) {echo '+"&title="+title';} ?><?php if (isset($_GET['id'])) {echo '+"&id="+id';} ?><?php if (isset($_GET['section'])) {echo '+"&section="+section';} ?><?php if (isset($_GET['type'])) {echo '+"&type="+type';} ?><?php if (isset($_GET['other'])) {echo '+"&other="+other';} ?>, true);
xhttp.send();
xhttp.onreadystatechange = function() { if (xhttp.readyState == 4 && xhttp.status == 200) {
 var div = document.getElementById("circus");
 div.innerHTML = xhttp.responseText;
 var x = div.getElementsByTagName("script");
 for(var i = 0; i<x.length; i++){ eval(x[i].text); }
}
}

</script>
