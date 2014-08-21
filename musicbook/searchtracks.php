<?php
$q=$_GET['searchtracks'];
$thisalbum = $_GET['thistrack_id'];
if($q !="") { 
require_once("connect.php");


$sql="SELECT * FROM tbl_songs WHERE song_title LIKE '".$q."%' AND album_id =".$thisalbum; 
$result = mysql_query($sql);
$numrows = mysql_num_rows($result);

if($numrows > 0) { 
	while($row = mysql_fetch_array($result)) {
		 echo "<div id=\"tracks\">".$row['song_title']."<a href=\"\">+</a><br /></div> ";
	}
}else{
	echo "No results matched your search";
}
}
?>