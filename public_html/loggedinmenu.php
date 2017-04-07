<?php include "databaselogin.php"; session_start();


	 $sql="SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
         $result = mysql_query($sql);
         while($row = mysql_fetch_array($result)) 
             {
                 $rowprofpic = $row['profpic'];
                 if ($rowprofpic == ''){
                     $profpic = 'noprofpic';
                 } else {
                     $profpic = "<img src='users/".$row['username']."/images/".$row['profpic']."' height='35px' width='35px'>";
                 }
             }






if ($profpic == 'noprofpic'){
echo "<a class='maintabs' href='accountindex.php'>Account</a>";
} else {
echo $profpic."<a class='maintabs' href='accountindex.php'>Account</a>";
}
echo "
<style>
a.maintabs:hover {
   background: #1d771d;
}
</style>
";
?>