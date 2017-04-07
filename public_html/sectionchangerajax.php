<?php include "databaselogin.php"; session_start();
$_SESSION['section'] = mysql_real_escape_string($_GET['section']);
if ($_SESSION['section'] == ''){
echo "<script>Search(); document.getElementById('secchange').innerHTML = ' ';</script>";
} else {
echo "<script>Search(); document.getElementById('secchange').innerHTML = '".$_SESSION['section']."';</script>";
}
?>