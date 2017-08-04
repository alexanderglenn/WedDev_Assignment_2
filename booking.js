/* Alexander Glenn, ID:15896259
 * File:  booking.js
 * uses POST method
 * Functions utilise the XMLHttpRequest object for asynchronius communication with the server
 */

/* Takes inputs from the booking.html page uses the xhr object to pass them to the server
 */
var xhr = createRequest();
function getInfo(dataSource, divID)
 {
	// Get all the variables required for entry into the database
	var aName = document.forms["bookingform"]["cust_name"].value;
	var aPhone = document.forms["bookingform"]["phone"].value;
	var aUnit = document.forms["bookingform"]["unit"].value;
	var aStreetNum = document.forms["bookingform"]["street_num"].value;
	var aStreetName = document.forms["bookingform"]["street_name"].value;
	var aSub = document.forms["bookingform"]["suburbfield"].value;
	var aDesSub = document.forms["bookingform"]["destination_suburb"].value;
	var aPickDate = document.forms["bookingform"]["pickup_date"].value;
	var aPickTime = document.forms["bookingform"]["pickup_time"].value;		
	
	if(xhr) {		
		var obj = document.getElementById(divID);
		var requestbody ='name='+encodeURIComponent(aName)
						+'&phone='+encodeURIComponent(aPhone)
						+'unit='+encodeURIComponent(aUnit)
						+'&streetnum='+encodeURIComponent(aStreetNum)
						+'&streetname='+encodeURIComponent(aStreetName)
						+'&suburb='+encodeURIComponent(aSub)
						+'&destsuburb='+encodeURIComponent(aDesSub)
						+'&pickupdate='+encodeURIComponent(aPickDate);
						+'&pickuptime='+encodeURIComponent(aPickTime);
		xhr.open("POST", dataSource, true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function() {
					if (xhr.readyState == 4 && xhr.status == 200) {
							obj.innerHTML = xhr.responseText;
					} 
	} 
		
	xhr.send(requestbody);
	} 
}

/* Fetchs and then shows the admin all the unassignned bookings
 */
function showUnassignedBookings(dataSource, divID){
	if(xhr) {		
		var obj = document.getElementById(divID);
		var requestbody = null;
		xhr.open("POST", dataSource, true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function() {
					if (xhr.readyState == 4 && xhr.status == 200) {
							obj.innerHTML = xhr.responseText;
					} 
	}
		
	xhr.send(requestbody);
	}
}

/* Assigns a specific booking reference number with a taxi
 */
function assignTaxiToBooking(dataSource, divID){
	
	var adminBookingRefNum = document.forms["adminform"]["specificBookingNum"].value;
	
	if(xhr) {		
		var obj = document.getElementById(divID);
		var requestbody = 'assignBookingRef='+encodeURIComponent(adminBookingRefNum);
		xhr.open("POST", dataSource, true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function() {
					if (xhr.readyState == 4 && xhr.status == 200) {
							obj.innerHTML = xhr.responseText;
					} 
	} 
		
	xhr.send(requestbody);
	} 
}

/* Validate input form fields function
 * This will check if the any of the required fields are empty and will display an alert book to the user to provide the input
 */
 function validateBookingForm()
{
	// Pass in the values from the booking.html form
	var nameCheck = document.forms["bookingform"]["cust_name"].value;
	var phoneCheck = document.forms["bookingform"]["phone"].value;
	var streetNumCheck = document.forms["bookingform"]["street_num"].value;
	var streetNameCheck = document.forms["bookingform"]["street_name"].value;
	var subCheck = document.forms["bookingform"]["suburbfield"].value;
	var destSubCheck = document.forms["bookingform"]["destination_suburb"].value;
	var pickDateCheck = document.forms["bookingform"]["pickup_date"].value;
	var pickTimeCheck = document.forms["bookingform"]["pickup_time"].value;
	
	// The below if-else ladder checks if any of the fields are not set
    if (nameCheck == "") {
        alert("Please provide your name");
        return false;
    }
	
	else if (phoneCheck == ""){
		alert("Please provide your phone number");
        return false;
	}
	
	else if (streetNumCheck == ""){
		alert("Please provide your street number");
        return false;
	}
	
	else if (streetNameCheck == ""){
		alert("Please provide your street name");
        return false;
	}
	
	else if (subCheck == ""){
		alert("Please provide your suburb");
        return false;
	}
	
	else if (destSubCheck == ""){
		alert("Please provide the destination suburb");
        return false;
	}
	
	else if (pickDateCheck == ""){
		alert("Please provide the pick up date");
        return false;
	}
	
	else if (pickTimeCheck == ""){
		alert("Please provide the pick up time");
        return false;
	}
	
	else{
		alert("All fields entered.");
		
		// these have been hard coded, used to setup the input function
		var divID = "div_00";
		var sourceName = "bookingprocess.php";
		
		// Then proceed to server back stuff
		getInfo(sourceName, divID);
	}
}