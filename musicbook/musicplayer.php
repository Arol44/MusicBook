<?php
header("Content-type: text/xml");

session_start();
require_once("connect.php");
$_SESSION['id'];

$xmlquery = mysql_query("SELECT * FROM tbl_songs,tbl_playlist WHERE tbl_playlist.song_id = tbl_songs.song_id AND tbl_playlist.member_id=".$_SESSION['id']);


echo "<musicplayer>";
while($row = mysql_fetch_array($xmlquery)){
	echo "<song>
	<title>".$row['song_title']."</title>
	<mp3>".$row['song_song']."</mp3>
	<length>".$row['song_time']."</length>
	</song>";	
}
echo "</musicplayer>";

?>


















<?php header("Content-type: text/xml");

session_start();
require_once("connect.php");
$_SESSION['id'];


//tbl_tracks,tbl_artists,tbl_albums WHERE tbl_playlist.track_id = tbl_tracks.track_id AND tbl_tracks.album_id = tbl_albums.album_id AND tbl_albums.artist_id = tbl_artists.artist_id AND tbl_playlist.user_id = 1

//$playlist = mysql_query("SELECT * FROM tbl_playlist,tbl_tracks,tbl_members WHERE tbl_playlist.tracks_id = tbl_tracks.tracks_id AND tbl_playlist.user_id AND tbl_members.member_id=".$_SESSION['id']);

$player = mysql_query("SELECT * FROM tbl_tracks,tbl_playlist WHERE tbl_playlist.track_id = tbl_tracks.track_id AND tbl_playlist.user_id=1");


echo "<musicplayer>";
while($row = mysql_fetch_array($player)){
	echo "<song>
	<name>".$row['track_title']."</name>
	<track>".$row['track_mp3']."</track>
	<time>".$row['track_time']."</time>
	</song>";	
}
echo "</musicplayer>";

?>