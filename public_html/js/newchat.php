<div id='delconv'></div>
<script>
var curdel = '';
var curperson = '';
function delconv(id){ 
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var div = document.getElementById("delconv");
      div.innerHTML = xhttp.responseText;

var x = div.getElementsByTagName("script"); 
   for(var i=0;i<x.length;i++)
   {
       eval(x[i].text);
   }

    }
  }

  xhttp.open("GET", "delconvajax.php?id="+id, true);
  xhttp.send();
}

function ucfirst(string){ 
    return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase(); 
}
var curid = '';
var cows = [];
var bears = [];
            //this function can remove a array element.
            Array.remove = function(array, from, to) {
                var rest = array.slice((to || from) + 1 || array.length);
                array.length = from < 0 ? array.length + from : from;
                return array.push.apply(array, rest);
            };
        
            //this variable represents the total number of popups can be displayed according to the viewport width
            var total_popups = 0;
            
            //arrays of popups ids
            var popups = [];
        
            //this is used to close a popup
            function close_popup(id)
            {


                for(var iii = 0; iii < popups.length; iii++)
                {
                    if(id == popups[iii])
                    {
                        Array.remove(popups, iii);
                        
                        document.getElementById(id).style.display = "none";
                        document.getElementById('topname'+id+'2').style.display = "none";
                        var i = bears.indexOf(id);
                            if(i != -1) {bears.splice(i, 1);}
                        var i = cows.indexOf(id);
                            if(i != -1) {cows.splice(i, 1);}
                        
                    
if (cows.length == 0) { document.getElementById('mstop').innerHTML = eval('clearInterval(alertiss); document.getElementById("mgo").innerHTML = " "'); }

document.getElementById('textarea'+id+'').value = '';

var xhttp; xhttp = new XMLHttpRequest(); 
xhttp.open("GET", "istypingajax.php?v=no", true); 
xhttp.send(); 
xhttp.onreadystatechange = function() {
if (xhttp.readyState == 4 && xhttp.status == 200) {
ucid = (ucfirst(id)); 
var div = document.getElementById(ucid+"itentry"); 
div.innerHTML = xhttp.responseText; 
var x = div.getElementsByTagName("script"); 
for(var i=0;i<x.length;i++){eval(x[i].text);}
}
};






                        calculate_popups();
                        
                        return;

                    }
                }

   
            }
        
            //displays the popups. Displays based on the maximum number of popups that can be displayed on the current viewport width
            function display_popups()
            {
                var right = 220;
                
                var iii = 0;
                for(iii; iii < total_popups; iii++)
                {
                    if(popups[iii] != undefined)
                    {

if (iii == 0){document.getElementById("textarea"+popups[iii]).focus();}

                        var element = document.getElementById(popups[iii]);
                        element.style.right = right + "px";
                   document.getElementById('topname'+popups[iii]+'2').style.right = right + "px";
                        right = right + 320;

if (document.getElementById('topname'+popups[iii]+'2').style.display == 'none' && document.getElementById('topname'+popups[iii]+'3').innerHTML != 'bottom'){
                        element.style.display = "block";
} else {
  document.getElementById('topname'+popups[iii]+'2').style.display = 'block';
}

                    }

                }
                
                for(var jjj = iii; jjj < popups.length; jjj++)
                {
                    var element = document.getElementById(popups[jjj]);
                    element.style.display = "none";
                    document.getElementById('topname'+popups[iii]+'2').style.display = 'none';

                }



	        	        document.getElementById("zest").innerHTML =  eval(' cows.forEach(function(entry) { document.getElementById("heightme"+ entry).scrollTop = document.getElementById("scrollinfo"+ entry).innerHTML; }) ');




            }
            
            //creates markup for a new popup. Adds the id to popups array.

            function register_popup(id, name)
            {
			if (curid != ''){bears.push(curid);}
			   


bears.forEach(function(entry) {eval (' document.getElementById("info"+ entry).innerHTML = document.getElementById("textarea"+ entry).value;')}
);




                 









                for(var iii = 0; iii < popups.length; iii++)
                {   
                    //already registered. Bring it to front.
                    if(id == popups[iii])
                    {
document.getElementById(id).style.display = 'block';

document.getElementById('topname'+id+'2').style.display = 'none';
document.getElementById('topname'+id+'3').innerHTML = 'top';
                        Array.remove(popups, iii);
                    
                        popups.unshift(id);

                        calculate_popups();
                        
                        
                        return;
                    }
                }               
                
if (document.getElementById(id)==null){
                var element = '<div class="popup-box chat-popup" id="'+ id +'">';

                element = element + '<div class="popup-head">';
                element = element + '<div class="popup-head-left" onclick="funcyou(\''+ name +'\')" style="font-size: 20;">'+ name +'</div><span id="istyping'+ id +'" style="font-size: 16; margin-left: 10px; color: yellow; cursor: default;"></span><a style=\'margin-left: 10px; cursor: pointer; font-size: 17; color:white;\' onMouseOver="this.style.color=\'yellow\'" onMouseOut="this.style.color=\'white\'" onclick="curdel = \''+ id +'\'; document.getElementById(\'might\').style.display=\'\'; document.getElementById(\'mighttxt\').focus(); document.getElementById(\'fade\').style.display=\'\'; curperson = \''+ id +'\';">&#9993;</a>';
                element = element + '<div class="popup-head-right" id="topname'+ id +'"><a style=\'cursor: pointer; font-size: 17; color:white;\' onMouseOver="this.style.color=\'red\'" onMouseOut="this.style.color=\'white\'" onclick="curdel = \''+ id +'\';document.getElementById(\'light\').style.display=\'\'; document.getElementById(\'fade\').style.display=\'\';"> &#128293;</a><a style=\'font-size: 15; color:white; cursor: pointer;\' onMouseOver="this.style.color=\'yellow\'" onMouseOut="this.style.color=\'white\'" onclick="document.getElementById(\'beforemini'+ id +'\').innerHTML = document.getElementById(\'heightme'+ id +'\').scrollHeight; document.getElementById(\''+ id +'\').style.display = \'none\'; document.getElementById(\'topname'+ id +'2\').style.display = \'block\'; document.getElementById(\'topname'+ id +'3\').innerHTML = \'bottom\';"> &#10134; </a><a style=\'cursor: pointer; font-size: 17; color:white;\' onMouseOver="this.style.color=\'black\'" onMouseOut="this.style.color=\'white\'" onclick="document.getElementById(\'scrollinfo'+ id +'\').innerHTML = document.getElementById(\'heightme'+ id +'\').scrollHeight; document.getElementById(\''+ id +'\').style.display = \'none\' ; close_popup(\''+ id +'\');"> &#10005;</a></div>';
                element = element + '<div style="clear: both"></div></div>';
                element = element + '<div class="popup-messages" id="heightme'+ id +'" style="background: lightgreen; height: 258px;overflow-y: auto;" onscroll="document.getElementById(\'scrollinfo'+ id +'\').innerHTML = this.scrollTop;"><img id="topimg'+ id +'" style="float:left; visibility: hidden; border-radius: 2px;" width="71px" height="71px" src="images/post/default.jpg" onclick="funcyou(\''+ name +'\')"/><div style="text-align: center;"><div id="topinfo'+ id +'" style="width: 180px; height: 73px; overflow-y: hidden; float: right;"></div><div style="width:100%; height:1px; background: lightgreen;"></div></div><span style="overflow-y:auto;">';


function ajaxcall(){ var xhttp; xhttp = new XMLHttpRequest(); xhttp.open("GET", "chatajax.php?n="+name, true); xhttp.send(); xhttp.onreadystatechange = function() {if (xhttp.readyState == 4 && xhttp.status == 200) {var div = document.getElementById(name+"this"); div.innerHTML = xhttp.responseText; var x = div.getElementsByTagName("script"); for(var i=0;i<x.length;i++){eval(x[i].text);}}}}

ajaxcall();



element = element + '<div id="'+name+'this"></div><div id="'+name+'itentry"></div><span id="'+name+'this2" style="display: none;">hi</span>';

element = element + '</span></div><form action="#" id="form'+ id +'"><div style="position:relative; margin-top: 22px;" id="topme'+ id +'";><textarea id="textarea'+ id +'" rows="1" cols="39" form="test" style="outline:none;border:1px solid forestgreen;border-bottom-style:none;resize:none;position:absolute;bottom:0; height: 25px; width: 100%" onmouseover="this.focus();" onmouseout="this.blur();"></textarea></form></div></div>';		
				
element = element + '<span id="topname'+ id +'3" style="display: none;">top</span><div class="popup-head" id="topname'+ id +'2" style="right: 220px; width: 220px; height: 15px; position: fixed; bottom: 0px; display: none;"><div class="popup-head-left" onmouseover="this.style.textShadow = \'0 0 10px yellow\';" onmouseout="this.style.textShadow = \'\';" onclick="funcyou(\''+ name +'\')" style="cursor: pointer; float: left;">'+ name +'</div><div class="popup-head-right" style="float: right;"><a style=\'font-size:17; color:limegreen; cursor: pointer;\' onMouseOver="this.style.color=\'lightgreen\'" onMouseOut="this.style.color=\'limegreen\'" onclick="document.getElementById(\'topname'+ id +'2\').style.display = \'none\'; document.getElementById(\''+ id +'\').style.display = \'block\'; document.getElementById(\'topname'+ id +'3\').innerHTML = \'top\'; document.getElementById(\'textarea'+ id +'\').focus(); ">&plus; </a><a style=\'color:limegreen; cursor: pointer;\' onMouseOver="this.style.color=\'red\'" onMouseOut="this.style.color=\'limegreen\'" onclick="document.getElementById(\'topname'+ id +'2\').style.display = \'none\'; document.getElementById(\'topname'+ id +'3\').innerHTML = \'top\'; document.getElementById(\'scrollinfo'+ id +'\').innerHTML = document.getElementById(\'beforemini'+ id +'\').innerHTML; javascript:close_popup(\''+ id +'\');"> &#10005;</a></div></div>';



                document.getElementsByTagName("fish")[0].innerHTML = document.getElementsByTagName("fish")[0].innerHTML + element;  
if (curid==''){curid = id;}

							   curid = id;


}


cows.push(id);


function testcall(){ if (cows != ''){ var xhttp; xhttp = new XMLHttpRequest(); xhttp.open("GET", "chatajax.php?test="+cows, true); xhttp.send(); xhttp.onreadystatechange = function() {if (xhttp.readyState == 4 && xhttp.status == 200) {var div = document.getElementById("mgo"); div.innerHTML = xhttp.responseText; var x = div.getElementsByTagName("script"); for(var i=0;i<x.length;i++){eval(x[i].text);}}}}}


                 document.getElementById("mgo").innerHTML =  eval('testcall(); alertiss = setInterval(function(){ testcall(); }, 3000);');


cows.forEach(function(entry) {
    document.getElementById("test"+entry).innerHTML =  eval('var hastext = "no"; function istyping'+ entry +'(typingvalue){var xhttp; xhttp = new XMLHttpRequest(); xhttp.open("GET", "istypingajax.php?v="+typingvalue, true); xhttp.send(); xhttp.onreadystatechange = function() {if (xhttp.readyState == 4 && xhttp.status == 200) {ucentry = (ucfirst(entry)); var div = document.getElementById(ucentry+"itentry"); div.innerHTML = xhttp.responseText; var x = div.getElementsByTagName("script"); for(var i=0;i<x.length;i++){eval(x[i].text);}}};} var lentext'+ entry +' = "0"; function ajaxmessage'+ entry +'(curmessage){ucentry = (ucfirst(entry)); var xhttp; xhttp = new XMLHttpRequest(); xhttp.open("GET", "chatajax.php?n="+ucentry+"&m="+curmessage, true); xhttp.send(); xhttp.onreadystatechange = function() {if (xhttp.readyState == 4 && xhttp.status == 200) {var div = document.getElementById(ucentry+"this"); div.innerHTML = xhttp.responseText; var x = div.getElementsByTagName("script"); for(var i=0;i<x.length;i++){eval(x[i].text);}}};} var textarea'+ entry +' = document.getElementById("textarea'+ entry +'"); textarea'+ entry +'.onkeyup= function(event) { if (event.which == 13 && event.shiftKey === true){ if (textarea'+ entry +'.style.height == "32px" && lentext'+ entry +' == "0"){document.getElementById("heightme'+ entry +'").scrollTop = (curscrollvar + 8); lentext'+ entry +' = "1";}; if (textarea'+ entry +'.style.height == "25px" && lentext'+ entry +' == "1"){document.getElementById("heightme'+ entry +'").scrollTop = (curscrollvar - 8); lentext'+ entry +' = "0";}; if (textarea'+ entry +'.style.height == "32px" && lentext'+ entry +' == "2"){document.getElementById("heightme'+ entry +'").scrollTop = (curscrollvar - 16); lentext'+ entry +' = "1";}; if (textarea'+ entry +'.style.height == "47px" && lentext'+ entry +' == "1"){document.getElementById("heightme'+ entry +'").scrollTop = (curscrollvar + 16); lentext'+ entry +' = "2";}; if (textarea'+ entry +'.style.height == "47px" && lentext'+ entry +' == "3"){document.getElementById("heightme'+ entry +'").scrollTop = (curscrollvar - 14); lentext'+ entry +' = "2";}; if (textarea'+ entry +'.style.height == "60px" && lentext'+ entry +' == "2"){document.getElementById("heightme'+ entry +'").scrollTop = (curscrollvar + 14); lentext'+ entry +' = "3";}; } if (event.which == 13 && event.shiftKey !== true){ istyping'+ entry +'("no"); hastext = "no"; document.getElementById("textarea"+entry).value = document.getElementById("textarea"+entry).value.replace('+/\n\r?/g+', "<bra>"); ajaxmessage'+ entry +'(textarea'+ entry +'.value); document.getElementById("textarea"+entry).value = ""; lentext'+ entry +' = "0"; textarea'+ entry +'.style.height = "25px"; textarea'+ entry +'.style.height = Math.min(textarea'+ entry +'.scrollHeight, 60) + "px"; event.preventDefault(); if (textarea'+ entry +'.scrollHeight <= 70){ document.getElementById("heightme'+ entry +'").style.height = ( 280 - textarea'+ entry +'.scrollHeight + 1) + "px";  document.getElementById("topme'+ entry +'").style.marginTop = (textarea'+ entry +'.scrollHeight - 2) + "px"; }}; }; textarea'+ entry +'.oninput= function() {if (textarea'+ entry +'.value.length=="0" && hastext =="yes"){istyping'+ entry +'("no"); hastext = "no";} if (textarea'+ entry +'.value.length!="0" && hastext !="yes") {istyping'+ entry +'("yes"); hastext="yes";}; curscrollvar = document.getElementById("heightme'+ entry +'").scrollTop; textarea'+ entry +'.style.height = "26px"; textarea'+ entry +'.style.height = Math.min(textarea'+ entry +'.scrollHeight, 60) + "px"; if (textarea'+ entry +'.scrollHeight <= 70){ if (textarea'+ entry +'.style.height == "32px" && lentext'+ entry +' == "0"){document.getElementById("heightme'+ entry +'").scrollTop = (curscrollvar + 8); lentext'+ entry +' = "1";}; if (textarea'+ entry +'.style.height == "25px" && lentext'+ entry +' == "1"){document.getElementById("heightme'+ entry +'").scrollTop = (curscrollvar - 8); lentext'+ entry +' = "0";}; if (textarea'+ entry +'.style.height == "25px" && lentext'+ entry +' == "2"){document.getElementById("heightme'+ entry +'").scrollTop = (curscrollvar - 24); lentext'+ entry +' = "0";}; if (textarea'+ entry +'.style.height == "25px" && lentext'+ entry +' == "3"){document.getElementById("heightme'+ entry +'").scrollTop = (curscrollvar - 38); lentext'+ entry +' = "0";};  if (textarea'+ entry +'.style.height == "32px" && lentext'+ entry +' == "2"){document.getElementById("heightme'+ entry +'").scrollTop = (curscrollvar - 16); lentext'+ entry +' = "1";}; if (textarea'+ entry +'.style.height == "47px" && lentext'+ entry +' == "1"){document.getElementById("heightme'+ entry +'").scrollTop = (curscrollvar + 16); lentext'+ entry +' = "2";}; if (textarea'+ entry +'.style.height == "47px" && lentext'+ entry +' == "3"){document.getElementById("heightme'+ entry +'").scrollTop = (curscrollvar - 14); lentext'+ entry +' = "2";}; if (textarea'+ entry +'.style.height == "60px" && lentext'+ entry +' == "2"){document.getElementById("heightme'+ entry +'").scrollTop = (curscrollvar + 14); lentext'+ entry +' = "3";}; document.getElementById("heightme'+ entry +'").style.height = ( 282 - textarea'+ entry +'.scrollHeight) + "px"; document.getElementById("topme'+ entry +'").style.marginTop = (textarea'+ entry +'.scrollHeight - 2) + "px"; } }; document.getElementById("textarea"+entry).value = document.getElementById("info"+entry).innerHTML; document.getElementById("heightme"+ entry).scrollTop = document.getElementById("scrollinfo"+ entry).innerHTML; ');}
);







                popups.unshift(id);
                        
                calculate_popups();
                
document.getElementById("textarea"+id).focus();
				
				


				
				
				
				
				
				
            }
            
            //calculate the total number of popups suitable and then populate the total_popups variable.
            function calculate_popups()
            {
                var width = window.innerWidth;
                if(width < 540)
                {
                    total_popups = 0;
                }
                else
                {
                    width = width - 200;
                    //320 is width of a single popup box
                    total_popups = parseInt(width/320);
                }
                
                display_popups();
                
            }
            
            //recalculate when window is loaded and also when window is resized.
            window.addEventListener("resize", calculate_popups);
            window.addEventListener("load", calculate_popups);


 
        </script>

<script>
function reply(name,uname){

document.getElementById('replyarea').innerHTML = document.getElementById('replyarea').innerHTML + "<div id='test"+name+"' style='display: none;'></div><div id='best"+name+"' style='display: none;'></div><div id='info"+name+"' style='display: none;'></div><div id='scrollinfo"+name+"' style='display: none;'></div><div id='beforemini"+name+"' style='display: none;'></div>";


register_popup(name, uname);
}

</script>


<script>
function lcFirst(string) {
	return string.substring(0, 1).toLowerCase() + string.substring(1).toLowerCase();
}
function funcyou(person) {
	person = lcFirst(person);
        document.getElementById('man').src = "other.php?other="+person;
}
</script>

<link rel="stylesheet" type="text/css" href="css/main.css">

<div id='light' class='newwhite_content' style='cursor: default; color: white; font-size: 25; font-weight: bold; text-align: center; display: none;'>
Do you really want to delete this conversation?
<br>
<br>
<a class="newbutton" style="text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;" onclick="delconv(curdel); document.getElementById('light').style.display='none'; document.getElementById('fade').style.display='none'">Yes</a>
<a class="newbutton" style="text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;" onclick="document.getElementById('light').style.display='none'; document.getElementById('fade').style.display='none'">No</a>
</div>

<div id='fade' class='newblack_overlay' style='display: none;' onclick = "document.getElementById('might').style.display='none'; document.getElementById('mighttxt').value=''; document.getElementById('light').style.display='none'; document.getElementById('fade').style.display='none'"></div> 

<div id='might' class='newmight_content' style='cursor: default; color: white; font-size: 25; font-weight: bold; text-align: center; display: none;'>

<textarea id='mighttxt' rows='12' cols='70' style='resize: none;' onmouseover='this.focus();'></textarea>

<br>

<a class="newbutton" id="bigsend" style="text-align: center; font-size: 15; font-weight: bold; color: white; cursor: pointer;" onclick="document.getElementById('might').style.display='none'; document.getElementById('fade').style.display='none'">Send</a>


</div>


<script>
document.getElementById("bigsend").addEventListener("click", function(){

function bigajaxmessage(bigcurmessage){ 
var bigcurmessage = document.getElementById("mighttxt").value.replace('+/\n\r?/g+', "<bra>"); 
var xhttp; 
xhttp = new XMLHttpRequest(); 
xhttp.open("GET", "chatajax.php?n="+curperson+"&m="+bigcurmessage, true); 
xhttp.send(); 
xhttp.onreadystatechange = function() {if (xhttp.readyState == 4 && xhttp.status == 200) {
var div = document.getElementById(ucfirst(curperson)+"this"); 
div.innerHTML = xhttp.responseText; 
var x = div.getElementsByTagName("script"); 
for(var i=0;i<x.length;i++){eval(x[i].text);}
}}
}



    eval('bigajaxmessage(document.getElementById("mighttxt").value);');
document.getElementById("mighttxt").value = '';
});
</script>