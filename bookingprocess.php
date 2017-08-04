<!DOCTYPE html>
<!-- Alexander Glenn, ID:15896259 -->
<!-- This file fetches all the unassigned bookings and sends them back to the admin user -->
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
	
	// Store all the POST inputs to variables for later use
	$name = $_POST["name"];
	$phone = $_POST["phone"];
	$unit = $_POST["unit"];
	$street_num = $_POST["streetnum"];
	$street_name = $_POST["streetname"];
	$suburb = $_POST["suburb"];
	$dest_suburb = $_POST["destsuburb"];
	$pickup_date = $_POST["pickupdate"];
	
	// REMIND, there variables are not 'posting' properly
	$pickup_time = $_POST["pickuptime"];
	
	$serv_time = $_SERVER['REQUEST_TIME'];
	
	// Time and date formatting for pickup and booking time records
	$pickup_time = date('H:i');
	$booking_time = date('H:i', time());
	$booking_date = date('Y-m-d');
	
	$initialStatus = "unassigned";
	
	// This is needed for the unique reference number
	$file = 'unique_num.txt';

	// Booking-RefNum comes from a txt file and is incremented after use.
	// get the number for the booking reference from the text file
	$uniq = file_get_contents($file);
	$bookingRef = $uniq + 1 ;
	file_put_contents($file, $bookingRef);
	
	// SQL statement for add the new booking into the database
	$bookinginsert = "INSERT INTO taxibooking (booking_ref, name, streetname, suburb, phone, streetnum, des_suburb, 
												pickup_date, pickup_time, status, booking_date, booking_time) 
						VALUES ('$bookingRef', '$name', '$street_name', '$suburb', '$phone', '$street_num', '$dest_suburb', 
								'$pickup_date', '$pickup_time', '$initialStatus', '$booking_date', '$booking_time')";
	
	
	if (mysqli_query($conn, $bookinginsert) === TRUE) {
		// Display a confirmation message to the user that their cab is booked
    	echo "<p>Thank you! Your booking reference number is: {$bookingRef}. You will be pick up in front of your provided
	         address at {$pickup_time} on {$pickup_date}</p>";					
	}
	else {
		echo "<p>Record not inserted! Check stuff </p>";
	}
?>

</body>
</html>