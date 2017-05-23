
// file booking.js
// using POST method
var xhr = createRequest();
function getInfo(dataSource, divID, aName, aPhone, aUnit, aStreetNum, aStreetName, aSub, aDesSub, aPickDate)
 {
	if(xhr) {		
		var obj = document.getElementById(divID);
		var requestbody = 'name='+encodeURIComponent(aName)
						+'&phone='+encodeURIComponent(aPhone)
						+'&unit='+encodeURIComponent(aUnit)
						+'&streetnum='+encodeURIComponent(aStreetNum)
						+'&streetname='+encodeURIComponent(aStreetName)
						+'&suburb='+encodeURIComponent(aSub)
						+'&destsuburb='+encodeURIComponent(aDesSub)
						+'&pickupdate='+encodeURIComponent(aPickDate);
		xhr.open("POST", dataSource, true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		//xhr.setRequestHeader("Content-length", requestbody.length);
		xhr.onreadystatechange = function() {
					alert(xhr.readyState); // to let us see the state of the computation
					if (xhr.readyState == 4 && xhr.status == 200) {
							obj.innerHTML = xhr.responseText;
					} // end if
	} // end anonymous call-back function
	xhr.send(requestbody);
	} // end if
} // end function getInfo()

