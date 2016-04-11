<?php
	session_start();
	echo "<h1>Welcome " . explode(" ",$_SESSION["fullname"])[0] . "!</h1>";
	echo "<h3>Access the Hub Map and User tracking in the navigation bar above.</h3>";
?>