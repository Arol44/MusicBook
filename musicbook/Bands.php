<?php
session_start();
require_once("connect.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bands</title>
<link href="styles/musicstyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="ajax_start.js"></script>
 <?php
 	$result = mysql_query("SELECT * FROM tbl_members WHERE member_id=".$_SESSION['id']);
	$bands = mysql_query("SELECT artist_id,artist_photolarge,artist_fname FROM tbl_artists ORDER BY artist_fname ASC");
?>
</head>

<body class="black">
<div id="container">
<div id="header">
	<div id="logo">
	<img src="images/Logo_White.png" />
	</div>
    <div id="welcome">
   <?php
   while ($row = mysql_fetch_array($result)){
	   echo "Welcome, ".$row['member_fname']." ".$row['member_lname'];
   }
   ?>
   </div>
   <div id="logout">
	<?php
	echo "<a href=\"profile.php?id=".$_SESSION['id']."\">Profile | </a>"
	?>
   <a href="index.php">logout</a>
   </div>
</div>
<div id="searchfriends">
	<form>
    	Search: <input type="text" onKeyup="liveSearchBands(this.value)" name="searchbox" id="searchbox" class="loginform" />
    </form>
</div>
<div id="friendslist">
	<?php
		while($row = mysql_fetch_array($bands)){
			echo "<div id=\"artists\"><a href=\"album.php?thisband_id=".$row['artist_id']."\"><img src=\"images/BandImages/".$row['artist_photolarge']."\" /></a><br />".$row['artist_fname']."</div> ";
		}
	?>
</div>
</body>
</html>