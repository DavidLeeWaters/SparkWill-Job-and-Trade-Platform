<?php include "databaselogin.php"; session_start(); 
$username = $_SESSION['username'];

$sql="SELECT * FROM users WHERE username = ('$username') ORDER BY id asc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
$friends=($row['friends']);
if ($friends != '') {
$friends2 = explode(",",$friends);
}
}

if ($_SESSION['curfriends'] != $friends){$_SESSION['curfriends'] = $friends;


$i = 1;
foreach ($friends2 as $friend){


$topnum = $i * 5.0 + 1.5;

echo '
            <div class="sidebar-name">
                <a id="'.$friend.'pop" class="tooltip" style="cursor:pointer;" onclick="javascript:register_popup(\''.$friend.'\', \''.ucfirst($friend).'\');" onmouseover="document.getElementById(\''.$friend.'arrow\').style.visibility = \'visible\';" onmouseout="document.getElementById(\''.$friend.'arrow\').style.visibility = \'hidden\';">
                    
<span style="background: white;" onclick="if (!e) var e = window.event; e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); document.getElementById(\'man\').src = \'other.php?other='.$friend.'\';">'.ucfirst($friend).'<div class="arrow-right" style="top: '.$topnum.'%;"></div>
';

$sql="SELECT * FROM users WHERE username = ('".$friend."') ORDER BY id desc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
if (!empty($row['profpic'])){
echo '<img style="float: left;" width="120" height="120" src="users/'.$friend.'/images/'.$row['profpic'].'" /></span><div class="arrow-right" id="'.$friend.'arrow" style="cursor: default; visibility: hidden; top: '.$topnum.'%;"></div>'; 

if ($row['online']=='yes'){ 
echo '<font id="online'.$friend.'" style="padding-right: 3px; display: inline; color: limegreen; cursor: default;">&#9679;</font>';
echo '<img id="online'.$friend.'2" style="padding-left: 0%;" class="sidebarpic" src="users/'.$friend.'/images/'.$row['profpic'].'" />'; 
} else {
echo '<font id="online'.$friend.'" style="padding-right: 0px; display: none; color: limegreen; cursor: default;">&#9679;</font>';
echo '<img id="online'.$friend.'2" class="sidebarpic" src="users/'.$friend.'/images/'.$row['profpic'].'" />';
}
} else {
echo '<img style="float: left;" width="120" height="120" src="images/post/default.jpg" /></span><div class="arrow-right" id="'.$friend.'arrow" style="cursor: default; visibility: hidden; top: '.$topnum.'%;"></div>';

if ($row['online']=='yes'){ 
echo '<font id="online'.$friend.'" style="padding-right: 3px; display: inline; color: limegreen; cursor: default;"> &#9679;</font>'; 
echo '<img id="online'.$friend.'2" style="padding-left: 0%;" class="sidebarpic" src="images/post/default.jpg" />';
} else {
echo '<font id="online'.$friend.'" style="padding-right: 0px; display: none; color: limegreen; cursor: default;">&#9679;</font>';
echo '<img id="online'.$friend.'2" class="sidebarpic" src="images/post/default.jpg" />';
}
}
}


echo '				
					'.ucfirst($friend).'
                </a>
            </div>




                                <div id="test'.$friend.'" style="display: none;"></div>	
				<div id="best'.$friend.'" style="display: none;"></div>	
                                <div id="info'.$friend.'" style="display: none;"></div>
                                <div id="scrollinfo'.$friend.'" style="display: none;"></div>
                                <div id="beforemini'.$friend.'" style="display: none;"></div>
';
$i++;


















}
} else {echo 'undefined';}
?>