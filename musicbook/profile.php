<?php
session_start();
require_once("connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="select_album.js"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Musicbook</title>
<link href="styles/musicstyle.css" rel="stylesheet" type="text/css" media="all" />
 <?php
	$result = mysql_query("SELECT * FROM tbl_members WHERE member_id=".$_SESSION['id']);
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
    	<div id="friendstitle">&nbsp;Friends <a href="addfriends.php">+</a></div>
        <?php
			$addfriend = mysql_query("SELECT member_fname,member_lname,member_thumbpic,member_id FROM tbl_members,tbl_friends WHERE tbl_friends.friend_id = tbl_members.member_id AND tbl_friends.user_id=".$_SESSION['id']);
		
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
<!--   	  <div id="musicplayertop">
        </div>-->
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="330" height="385" id="FlashID" title="playmusic">
          <param name="movie" value="bin-debug/musicplayer.swf" />
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="10.2.153.1(10.2)" />
          <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
          <param name="expressinstall" value="Scripts/expressInstall.swf" />
          <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
          <!--[if !IE]>-->
          <object type="application/x-shockwave-flash" data="bin-debug/musicplayer.swf" width="330" height="385">
            <!--<![endif]-->
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="10.2.153.1(10.2)" />
            <param name="expressinstall" value="Scripts/expressInstall.swf" />
            <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
            <div>
              <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
              <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
            </div>
            <!--[if !IE]>-->
          </object>
          <!--<![endif]-->
      </object>
	</div>
    <div id="uploadsong">
    	<span class="profiletitles">&nbsp;Upload A Song</span>
        <br /><br />
    	<form id="uploadform" name="uploadform" action="upload_song.php" method="post" enctype="multipart/form-data">
        <span class="bold"> &nbsp;&nbsp;&nbsp;&nbsp;Band</span> 
        <select id="formband" name="formband" class="uploadform" onchange="showAlbum(this.value)">
            <?php
				$band = mysql_query("SELECT artist_id,artist_fname FROM tbl_artists");
				while($row = mysql_fetch_array($band)){
					echo "<option value=\"".$row['artist_id']."\">".$row['artist_fname']."</option>";
				}
            ?>
        </select><br /><br /><br />
        <span class="bold"> &nbsp;&nbsp;&nbsp;&nbsp;Album</span> 
        <select id="formalbums" name="formalbums" class="uploadform" onchange="showTracks(this.value)">
        </select><br /><br /><br />
        <span class="bold"> &nbsp;&nbsp;&nbsp;&nbsp;Song Title</span>
        <select id="formsongs" name="formsongs" class="uploadform">
        </select><br /><br /><br />
        <span class="bold"> &nbsp;&nbsp;&nbsp;&nbsp;Length</span> <input type="time" name="length" id="length" value="00:00" class="uploadform" /><br /><br /><br />
        <span class="bold"> &nbsp;&nbsp;&nbsp;&nbsp;Upload</span> <input type="file" name="music" id="music" class="uploadwidth" />
        <input type="image" src="images/button_upload.png" class="uploadbutton" />
    	</form>
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
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
</html>