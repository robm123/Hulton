<?php

	if(isset($_POST['search']))
	{
		$dbhost = 'www.db4free.net';
		$dbuser = '*********';
		$dbpass = '*********';
      	$dbname = '*********';
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname); // Create connection
		if(! $conn )
      	{
         die('Could not connect: ' . mysql_error());
      	}


		$country = $_POST["country"];
		$state = $_POST["state"];
		$checkin = $_POST["checkin"];
		$checkout = $_POST["checkout"];
		$type = $_POST["type"];
	}
?>