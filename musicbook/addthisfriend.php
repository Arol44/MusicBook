<?php
session_start();
require_once("connect.php");

$member = $_SESSION['id'];
$friend = $_GET['friend_id'];

$friendquery = mysql_query("INSERT INTO tbl_friends(user_id,friend_id) VALUES('".$member."','".$friend."')");
header("Location: profile.php");

?>



<?php
//session_start();
//require_once("connect.php");
//
////echo '<pre>' . print_r($_GET, 1) . '</pre>';
//
//$user = $_SESSION['id'];
//$friend = $_GET['friend_id'];
//
//$add = "INSERT INTO tbl_friends(user_id, friend_id) VALUES('".$user."','".$friend."')";
//
//$insert = mysql_query($add);
//header("Location: profile.php");
//
?>