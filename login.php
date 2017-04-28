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

		$sql ="SELECT H.ID, R.RoomNumber,H.Country,H.State,R.persons,R.Description,R.Price,R.floorN  FROM Hotels H, ROOM R, RoomReservation RR
		WHERE H.State = '$state' AND H.Country = '$country' AND R.type = '$type' AND H.ID = R.hotelID AND (H.ID, R.RoomNumber) NOT IN
		(SELECT ref_hotel_id, roomNumber FROM RoomReservation WHERE CheckinDate<='$checkin' AND CheckoutDate>='$checkout' )";

		$result = $conn->query($sql);


		while($row = mysqli_fetch_assoc($result))
		{
			if( $row["State"] == "New York")
			echo "string";
		}







	}
?>
