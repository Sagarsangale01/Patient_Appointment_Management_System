
<?php
include("dbconnect.php");
date_default_timezone_set("Asia/Calcutta");
$l_dat = date("Y-m-d H:i:s");
//echo "$dat";
// $ip=$_SERVER['REMOTE_ADDR'];

session_start();
$uname = $_SESSION['username'];
$uid = $_SESSION['userid'];
$lastid = $_SESSION['lastid'];

// $sql = "UPDATE adminloggedin SET logout_time ='$l_dat' WHERE log_id = $lastid ";
//       mysql_query($sql);
//die();
unset($_SESSION['username']);
unset($_SESSION['userid']);
unset($_SESSION['password']);
unset($_SESSION['name']);
unset($_SESSION['lastid']);
unset($_SESSION['role']);
session_destroy();

$uname = '';
$uid = '';
$lastid = '';

header("Location: index.php");
exit;
?>
