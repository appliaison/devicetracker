function populateAssigned()
{

	var hh_type = document.getElementById("hh_type").value;


	var rnd = Math.random();
	
	//document.getElementById("hh_save_returned_value").innerHTML ='';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		
		try{
			// Opera 8.0+, Firefox, Safari
			ajaxRequest = new XMLHttpRequest();
		} catch (e){
			// Internet Explorer Browsers
			try{
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try{
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e){
					// Something went wrong
					alert("Your browser broke!");
					return false;
				}
			}
		}

		
		// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			
			
			document.getElementById("hh_assigned_num").value = ajaxRequest.responseText;
			
		
		}
	}
	ajaxRequest.open("GET", "server-populateassigned-hh.php?hh_type="+hh_type+'&rnd='+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
		
}

