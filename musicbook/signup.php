<?php
session_start();
require_once("connect.php");


$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$gender = $_POST['gender'];
$user = $_POST['user'];
$pass = $_POST['pass'];

$query = "INSERT INTO tbl_members(member_id,member_fname,member_lname,member_password,member_gender) VALUES (NULL,'".$firstname."','".$lastname."','".$user."','".$pass."','".$gender."')";
$result = mysql_query($query);

$_SESSION['id'] = mysql_insert_id();

header("Location: profile.php?id=".$_SESSION['id']);

?>