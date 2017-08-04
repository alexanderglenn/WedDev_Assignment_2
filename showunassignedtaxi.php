<!DOCTYPE html>
<!-- Alexander Glenn, ID:15896259 -->
<!-- This file fetches all the unassigned bookings and sends them back to the admin user -->
<!-- The results are displayed as table to the client -->
<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
<body>

<?php

	require_once ("/home/tsh9748/public_html/conf/settings.php"); //please make sure the path is correct
	
	// The @ operator suppresses the display of any error messages
	// mysqli_connect returns false if connection failed, otherwise a connection value
	$conn = @mysqli_connect($server, $username, $pswd, $dbnm);

	// SQL statemnts, make sure the status is 'unassigned'
	$check_table = "SELECT booking_ref, name, phone, suburb, des_suburb, pickup_date, pickup_time
					FROM taxibooking WHERE status = 'unassigned'";
	
	$query_checking = mysqli_query($conn, $check_table);
	
	// Set up table to show the unassigned bookings
	echo "<table border=\"1\">";
			echo "<tr>\n"
				 ."<th scope=\"col\">Booking Reference Number</th>\n"
			     ."<th scope=\"col\">Name</th>\n"
				 ."<th scope=\"col\">Phone</th>\n"
				 ."<th scope=\"col\">Suburb</th>\n"
				 ."<th scope=\"col\">Destination Suburb</th>\n"
				 ."<th scope=\"col\">Pickup Date</th>\n"
				 ."<th scope=\"col\">Pickup Time</th>\n"
				 ."</tr>\n";
	
	// Put each entry into the table
	while ($row_check = mysqli_fetch_assoc($query_checking)){
		echo "<tr>";
		echo "<td>",$row_check["booking_ref"],"</td>";
		echo "<td>",$row_check["name"],"</td>";
		echo "<td>",$row_check["phone"],"</td>";
		echo "<td>",$row_check["suburb"],"</td>";
		echo "<td>",$row_check["des_suburb"],"</td>";
		echo "<td>",$row_check["pickup_date"],"</td>";
		echo "<td>",$row_check["pickup_time"],"</td>";
		echo "</tr>";
	}
	
?>

</body>
</html>