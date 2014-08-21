<?php
$q=$_GET['searchalbums'];
$thisband = $_GET['thisband_id'];
if($q !="") { 
require_once("connect.php");


$sql="SELECT * FROM tbl_album WHERE album_title LIKE '".$q."%' AND artist_id =".$thisband; 
$result = mysql_query($sql);
$numrows = mysql_num_rows($result);

if($numrows > 0) { 
	while($row = mysql_fetch_array($result)) {
		 echo "<div id=\"artists\"><a href=\"tracks.php?thisalbum_id=".$row['album_id']."\"><img src=\"images/BandImages/albums/".$row['album_coverart']."\" /></a><br />".$row['album_title']."</div> ";
	}
}else{
	echo "No results matched your search";
}
}
?>