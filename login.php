<?php
	$country = $_POST["country"];
	$state = $_POST["state"];
	$checkin = $_POST["checkin"];
	$checkout = $_POST["checkout"];
	$type = $_POST["type"];

	if(isset($_POST['search']))
	{
		$dbhost = 'robertomina123.cnfw63tusvga.us-west-2.rds.amazonaws.com';
		$dbuser = 'RobertoMina123';
		$dbpass = 'robminapassword';
  	$dbname = 'Hulton';
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname); // Create connection
		if(! $conn )
    {
         die('Could not connect: ' . mysql_error());
    }

		$sql ="SELECT H.ID FROM Hotels H, ROOM R WHERE H.State = '$state' AND H.Country = '$country' AND R.type = '$type' AND H.ID = R.hotelID ";
		$result = $conn->query($sql);


		while($row = mysqli_fetch_assoc($result))
		{
			if( $row["State"] == "New York")
			echo "string";
		}







	}
?>
