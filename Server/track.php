<html>
<head>
	<title>Tracking</title>
</head>
<body>
	Input user's ID (you want '123'):
	<form method="POST" action="track.php">
		<INPUT TYPE = "Text" NAME = "USERID" ID = "USERID"/>
	</form>
	
	<?php include "dbConfig.php";

	if(!empty($_POST)){
		try{
			$userNumber = $_POST['USERID'];
			$sql = "SELECT H.`long`, H.`lat` FROM `log_dispense` AS L INNER JOIN `hub` AS H ON L.`idHub` = H.`idHub` WHERE L.`idUSER` = '" . $userNumber . "' GROUP BY H.`idHub`;";
			$result = $db->query($sql);
			
			$url = "http://maps.google.com/maps/api/staticmap?center=Aidipsos,Greece&zoom=7&size=1920x1080&maptype=roadmap";
			
			while($row = $result->fetch_assoc())
			{
				$url = $url . "&markers=" . $row["lat"] . "," . $row["long"];
			}
			
			$url = $url . "&sensor=false&key";
			echo "<img src='$url'></img>";
		}
		catch(Exception $e)
		{echo "Exception";}
	}
	?>
</body>
</html>