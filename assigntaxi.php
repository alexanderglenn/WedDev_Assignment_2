<!DOCTYPE html>
<!-- Alexander Glenn, ID:15896259 -->
<!-- This file handles assigning a taxi when the admin user wants to assign a taxi to an unassigned booking -->
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
	
	// Reference number from the admin user
	$ref_num = $_POST["assignBookingRef"];
	
	// SQL statements to update the booking status to 'assigned' and a statement to check the booking reference exists in the table
	$check_for_ref = "SELECT * FROM taxibooking WHERE booking_ref = '$ref_num' AND status = 'unassigned'";
	$assign_taxi = "UPDATE taxibooking SET status = 'assigned' WHERE booking_ref = '$ref_num'";
	
	$res1 = mysqli_query($conn, $check_for_ref);
	
	// check if the reference number exists and is unassigned, if it is unassigned, assign it
	if (mysqli_num_rows($res1) > 0){
		if (($query_update = mysqli_query($conn, $assign_taxi)) === TRUE){
			echo "<p>The booking request: {$ref_num} has been properly assigned</p>";
		}
		else {
			echo "<p>Something went wrong. Taxi not assigned</p>";
		}
	}
	else {
		echo "<p>No booking for the reference number: {$ref_num} or it has already been assigned</p>";
	}
?>

</body>
</html>