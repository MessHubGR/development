<?php include "dbConfig.php";

$sql = "SELECT `lat`, `long` FROM hub;";
$result = $db->query($sql);

$url = "http://maps.google.com/maps/api/staticmap?center=Aidipsos,Greece&zoom=7&size=1920x1080&maptype=roadmap";

while($row = $result->fetch_assoc())
{
	$url = $url . "&markers=" . $row["lat"] . "," . $row["long"];
}
$url = $url . "&sensor=false&key";
echo "<img src='$url'></img>";
?> 
