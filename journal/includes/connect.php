<?php
	$server = "localhost";
	$db_name = "comp426"; // Enter your database name
	$db_user = "root"; // Enter your username
	$db_pass = "password"; // Enter your password
	
	mysqli_connect("localhost", "root","password","426project");

	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	// mysqli_connect($server, $db_user, $db_pass, $db_name) or die("Could not connect to server!");
	// mysqli_select_db($db_name) or die("Could not connect to database!");
?>