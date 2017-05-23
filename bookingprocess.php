<?php
	// get name and password passed from client
	$name = $_POST["name"];
	$phone = $_POST["phone"];
	$unit = $_POST["unit"];
	
	// These are now working
	$street_num = $_POST["streetnum"];
	$street_name = $_POST["streetname"];
	$suburb = $_POST["suburb"];
	$dest_suburb = $_POST["destsuburb"];
	$pickup_date = $_POST["pickupdate"];
	
	
	// sleep for 10 seconds to slow server response down
	sleep(2);
	
	// write back the inputted information from the booking.html form
	echo "<br>";
	echo $name;
	echo "<br>";
	echo $phone;
	echo "<br>";
	echo $unit;
	echo "<br>";
	echo $street_num;
	echo "<br>";
	echo $street_name;
	echo "<br>";
	echo $suburb;
	echo "<br>";
	echo $dest_suburb;
	echo "<br>";
	echo $pickup_date;
	echo "<br>";
	echo $unit;
	echo $street_num;
	echo $name;
	
	if (!isset($_POST["name"])){
		echo "<br>name Not set</br>";
	}
	else {
		echo "<br>name Is set</br>";
	}
	if (!isset($_POST["phone"])){
		echo "<br>phone Not set</br>";
	}
	else {
		echo "<br>phone Is set</br>";
	}
	if (!isset($_POST["unit"])){
		echo "<br>unit Not set</br>";
	}
	else {
		echo "<br>unit Is set</br>";
	}
	if (!isset($_POST["streetnum"])){
		echo "<br>streetnum Not set</br>";
	}
	else {
		echo "<br>streetnum Is set</br>";
	}
	if (!isset($_POST["streetname"])){
		echo "<br> streetname Not set</br>";
	}
	else {
		echo "<br>streetname Is set</br>";
	}
	if (!isset($_POST["suburb"])){
		echo "<br> suburb Not set</br>";
	}
	else {
		echo "<br>suburb Is set</br>";
	}
	if (!isset($_POST["destsuburb"])){
		echo "<br> destsuburb Not set</br>";
	}
	else {
		echo "<br>destsuburb Is set</br>";
	}
	if (!isset($_POST["pickupdate"])){
		echo "<br> pickupdate Not set</br>";
	}
	else {
		echo "<br>pickupdate Is set</br>";
	}
?>