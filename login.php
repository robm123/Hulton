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
      	$dbname = 'The_Hulton';
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname); // Create connection
		if(! $conn )
    {
         die('Could not connect: ' . mysql_error());
    }
/*
		$sql ="SELECT H.ID, R.RoomNumber,H.Country,H.State,R.persons,R.Description,R.Price,R.floorN  FROM Hotels H, ROOM R, RoomReservation RR
		WHERE H.State = '$state' AND H.Country = '$country' AND R.type = '$type' AND H.ID = R.hotelID AND (H.ID, R.RoomNumber) NOT IN
		(SELECT ref_hotel_id, roomNumber FROM RoomReservation WHERE CheckinDate<='$checkin' AND CheckoutDate>='$checkout' )";
*/
		$sql = "SELECT DISTINCT country FROM Hotel";
		$result = $conn->query($sql);

		while($array[] = $result->fetch_object());

		array_pop($array);

		//while ($row = mysqli_fetch_array($result)) 
		//{
		//	echo $row['country'];
		//}
	}
?>

<!doctype html>
<html lang="en">
	<head>
	    <meta charset="utf-8" />
	    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1" />

	    <title>Hulton Hotels</title>


	    <!-- Latest compiled and minified CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	    <!-- Latest compiled and minified JavaScript -->
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	     <!-- my css -->
	    <link rel="stylesheet" type="text/css" href="style.css">

	    <!--Bootstrap Date Picker-->
	    <script src="Libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js" charset="utf-8"></script>

	    <link rel="stylesheet" type="text/css" href="Libs/bootstrap-datepicker/css/bootstrap-datepicker.css">

	     <!-- from here ..-->
	    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	    
	    <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css"
	        rel="stylesheet" type="text/css" />
	    
	    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
	    
	    <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
	        rel="stylesheet" type="text/css" />
	    
	    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
	        type="text/javascript"></script>
	    <!-- to here are libraries included for jquery multiselect-->
	    <!-- for Breakfast and Services options-->

	</head>
	    <script type="text/javascript">
	        $(function () 
	        {
	            $('#lstFruits').multiselect({
	                includeSelectAllOption: true
	            });
	            $('#btnSelected').click(function () {
	                var selected = $("#lstFruits option:selected");
	                var message = "";
	                selected.each(function () {
	                    message += "TEXT:\t" +  $(this).text() + " VALUE:\t" + $(this).val() + "\n";
	                });
	                alert(message);
	            });
	        });

	    </script>
	<body>

		<!--header-->
		<div class="page-header">
  		<img id="logo" src="Logo.png"/>
  			<div class ="menu-bar">
				<ul>
					<li>Register</li>
  					<li>Login</li>
  					<li>Admin</li>
				</ul>
  			</div>
  		</div>


	  	<div class="page-background">
	        
	        <div id="form-wrapper">
	        	<!-- action="login.php" method="post" WHAT should this be for this form--> 
	          <form id="select-room" >
				
				<div id="slogan">
            	<h3 id ="one"> Choose your Room</h3>
            	<br>
          		</div>

				<select name="dropdown">
					<option value="">Choose a room</option>
					<?php foreach($array as $option) : ?>
						<option value="<?php echo $option->country; ?>"><?php echo $option->country; ?></option>
					<?php endforeach;?>
				</select>
				<br><br>

				<!--
	            <div class="text-center">
	              <button type="submit" name="Reserve" class="btn btn-primary">Reserve</button>
	            </div>
				-->
	            <div id="slogan">
            	<h3 id ="one"> Breakfast options or Additional Services?</h3>
            	<br>
          		</div>

			     <select id="lstFruits" multiple="multiple">
				    <?php foreach($array as $option) : ?>
				        <option value="<?php echo $option->country; ?>"><?php echo $option->country; ?></option>
				    <?php endforeach;?>
			    </select>
			    <!--<input type="button" id="btnSelected" value="Get Selected" />-->
			    <br><br>
	            <div class="text-center">
	              <button type="button" name="Reserve" id="btnSelected" value="Get Select" class="btn btn-primary">Reserve</button>
	            </div>

	          </form>
	        </div>
	  	</div>



	</body>
</html>





