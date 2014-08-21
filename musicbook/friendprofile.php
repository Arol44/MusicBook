<?php
session_start();
require_once("connect.php");
$thisfriend = $_GET['thisuser_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="select_album.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Musicbook</title>
<link href="styles/musicstyle.css" rel="stylesheet" type="text/css" media="all" />
 <?php
	$result = mysql_query("SELECT * FROM tbl_members WHERE member_id=".$thisfriend);
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
	   echo $row['member_fname']." ".$row['member_lname']."'s Profile";
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
<div id="tophalf">
	<div id="displaypic">
		<?php
		mysql_data_seek($result,0);
		while($row = mysql_fetch_array($result)){
			echo "<img src=\"images/members/".$row['member_displaypic']."\" /> ";
		}
		?>
        
	</div>
	<div id="friends">
    	<div id="friendstitle">&nbsp;Friends</div>
        <?php
			$addfriend = mysql_query("SELECT member_fname,member_lname,member_thumbpic,member_id FROM tbl_members,tbl_friends WHERE tbl_friends.friend_id = tbl_members.member_id AND tbl_friends.user_id=".$thisfriend);
		
			if(mysql_num_rows($addfriend)){
				mysql_data_seek($addfriend,0);
				while($row = mysql_fetch_array($addfriend)){
					echo "<div id=\"profileperson\"><a href=\"friendprofile.php?thisuser_id=".$row['member_id']."\"><img src=\"images/members/".$row['member_thumbpic']."\" /></a><br />".$row['member_fname']." ".$row['member_lname']."</div> ";
				} 
			}
?>
	</div>
</div>
<div id="bottomhalf">
	<div id="musicplayer">
    	<div id="musicplayertop">
        </div>
    </div>
    <div id="uploadsong">
    </div>
     <div id="featureband">
    	<div id="featuretitle">&nbsp;Feature Band <a href="Bands.php">+</a></div><br />
        <?php
		$feature = mysql_query("SELECT artist_photo,artist_bio FROM tbl_artists ORDER BY RAND() LIMIT 1");
        while($row = mysql_fetch_array($feature)){
			echo "&nbsp;&nbsp;<img src=\"images/BandImages/".$row['artist_photo']."\" />".$row['artist_bio']."";
		}
		?>
    </div>
</div>
</div>
</body>
</html>