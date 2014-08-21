<?php
$q=$_GET['searchbands'];
if($q !="") { 
require_once("connect.php");


$sql="SELECT * FROM tbl_artists WHERE artist_fname LIKE '".$q."%'"; 
$result = mysql_query($sql);
$numrows = mysql_num_rows($result);

if($numrows > 0) { 
	while($row = mysql_fetch_array($result)) {
		 echo "<div id=\"artists\"><a href=\"album.php?thisband_id=".$row['artist_id']."\"><img src=\"images/BandImages/".$row['artist_photolarge']."\" /></a><br />".$row['artist_fname']."</div> ";
	}
}else{
	echo "No results matched your search";
}
}
?>