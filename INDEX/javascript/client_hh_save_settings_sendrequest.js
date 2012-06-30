function hh_save_settings_sendrequest(formtitle)
{
	var formtitle_id = formtitle;
	var settings_val2 = document.getElementById("settings_val2").value;
	var settings_val3 = document.getElementById("settings_val3").value;
	var settings_val4 = document.getElementById("settings_val4").value;
	var settings_val5 = document.getElementById("settings_val5").value;
	var settings_val6 = document.getElementById("settings_val6").value;
	var settings_val7 = document.getElementById("settings_val7").value;
	var settings_val8 = document.getElementById("settings_val8").value;
	var settings_val9 = document.getElementById("settings_val9").value;
	var settings_val10 = document.getElementById("settings_val10").value;

	var rnd = Math.random();
	
	document.getElementById("hh_save_returned_value").innerHTML ='';
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
			
			
			document.getElementById("hh_save_returned_value").innerHTML = ajaxRequest.responseText;
			
		
		}
	}
	ajaxRequest.open("GET", "server_hh_save_settings.php?formtitle_id="+formtitle_id+'&settings_val2='+settings_val2+'&settings_val3='+settings_val3+'&settings_val3='+settings_val3+'&settings_val4='+settings_val4+'&settings_val5='+settings_val5+'&settings_val6='+settings_val6+'&settings_val7='+settings_val7+'&settings_val8='+settings_val8+'&settings_val9='+settings_val9+'&settings_val10='+settings_val10+'&rnd='+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
		
}

