<?php
session_start();
require_once("connect.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Friends</title>
<link href="styles/musicstyle.css" rel="stylesheet" type="text/css" media="all" />
<script src="ajax_start.js"></script>
 <?php
	$result = mysql_query("SELECT * FROM tbl_members WHERE member_id=".$_SESSION['id']);
	$friendslist = mysql_query("SELECT * FROM tbl_members ORDER BY member_fname ASC");
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
    	Search: <input type="text" onKeyup="liveSearch(this.value)" name="searchbox" id="searchbox" class="loginform" />
    </form>
</div>
<div id="friendslist">
<?php
	while ($row = mysql_fetch_array($friendslist)){
		echo "<div id=\"person\"><a href=\"friendprofile.php?thisuser_id=".$row['member_id']."\"><img src=\"images/members/".$row['member_thumbpic']."\" /></a><br />".$row['member_fname']." ".$row['member_lname']." <a href=\"addthisfriend.php?friend_id=".$row['member_id']."\">+</a> </div> ";
	}
?>
</div>
</div>
</body>
</html>