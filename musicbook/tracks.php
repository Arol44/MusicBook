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
 	$thistrack = $_GET['thisalbum_id'];
 	$result = mysql_query("SELECT * FROM tbl_members WHERE member_id=".$_SESSION['id']);
	$tracks = mysql_query("SELECT* FROM tbl_album,tbl_songs WHERE tbl_album.album_id = tbl_songs.album_id AND tbl_album.album_id=".$thistrack." ORDER BY song_title ASC");
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
	echo "<a href=\"Bands.php?id=".$_SESSION['id']."\">Bands | </a><a href=\"profile.php?id=".$_SESSION['id']."\">Profile | </a>"
	?>
   <a href="index.php">logout</a>
   </div>
</div>
<div id="searchfriends">
	<form>
    	Search: <input type="text" onKeyup="liveSearchTracks(this.value+'&amp;thistrack_id=<?php echo $thistrack; ?>')" name="searchbox" id="searchbox" class="loginform" />
    </form>
</div>
<div id="friendslist">
	<?php
		while($row = mysql_fetch_array($tracks)){
			echo "<div id=\"tracks\">".$row['song_title']."<a href=\"\"> +</a><br /><br /></div><br /> ";
		}
	?>
</div>
</body>
</html>