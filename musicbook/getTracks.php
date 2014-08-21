<?php
$capturetrack=$_GET['searchtrack'];
if($capturetrack !==""){
require_once("connect.php");

$track = mysql_query("SELECT song_id,song_title FROM tbl_album,tbl_songs WHERE tbl_songs.album_id = tbl_album.album_id AND tbl_songs.album_id= ".$capturetrack);

while($row = mysql_fetch_array($track)){
	echo "<option value=\"".$row['song_id']."\">".$row['song_title']."</option>";
}

}
?>