<?php
$q=$_GET['searchfriends'];
if($q !="") { 
require_once("connect.php");


$sql="SELECT * FROM tbl_members WHERE member_lname LIKE '".$q."%' OR member_fname LIKE '".$q."%'"; 
$result = mysql_query($sql);
$numrows = mysql_num_rows($result);

if($numrows > 0) { 
	while($row = mysql_fetch_array($result)) {
		 echo "<div id=\"person\"><img src=\"images/members/".$row['member_thumbpic']."\" /><br />".$row['member_fname']." ".$row['member_lname']."</div> ";
	}
}else{
	echo "No results matched your search";
}
}
?>