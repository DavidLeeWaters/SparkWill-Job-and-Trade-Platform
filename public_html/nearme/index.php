<?php include "databaselogin.php";



?>

<input id='name' type='text' value=''>
<br>
<button onclick='done();'>Done</button>

<div id='demo'></div>
<div id='results'></div>

<script>
var latitude = '';
var longitude = '';
var running = '';

function Ajax(){
if (running == 'yes'){
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

  xhttp.open("GET", "ajax.php?name="+name+"&la="+latitude+"&lo="+longitude, true);
  xhttp.send();
}
}




function done() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        document.getElementById("demo").innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    document.getElementById("demo").innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
name = document.getElementById("name").value; 
latitude = position.coords.latitude;
longitude = position.coords.longitude;
running = 'yes';
Ajax();
}







</script>




