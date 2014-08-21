<?php
session_start();
require_once("connect.php");

$songtitle = $_POST['formsongs'];
$length = $_POST['length'];
$mp3 = $_FILES['music']['name'];

print_r($_FILES);

$query = "UPDATE tbl_songs SET song_time='".$length."',song_song='".$mp3."' WHERE song_id=".$songtitle;
$result = mysql_query($query);

print_r($result);

?>