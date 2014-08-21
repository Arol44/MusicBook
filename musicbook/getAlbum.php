<?php
$capture=$_GET['search'];
if($capture !==""){
require_once("connect.php");

$album = mysql_query("SELECT album_id,album_title FROM tbl_album,tbl_artists WHERE tbl_album.artist_id = tbl_artists.artist_id AND tbl_album.artist_id= ".$capture);

while($row = mysql_fetch_array($album)){
	echo "<option value=\"".$row['album_id']."\">".$row['album_title']."</option>";
}

}
?>