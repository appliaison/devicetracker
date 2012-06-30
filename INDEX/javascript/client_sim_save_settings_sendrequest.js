function sim_save_settings_sendrequest(formtitle)
{
	var formtitle_id = formtitle;
	var settings_val11 = document.getElementById("settings_val11").value;
	var settings_val12 = document.getElementById("settings_val12").value;
	var settings_val13 = document.getElementById("settings_val13").value;
	var settings_val14 = document.getElementById("settings_val14").value;
	var settings_val15 = document.getElementById("settings_val15").value;
	var settings_val16 = document.getElementById("settings_val16").value;
	var settings_val17 = document.getElementById("settings_val17").value;
	var settings_val18 = document.getElementById("settings_val18").value;
	var settings_val19 = document.getElementById("settings_val19").value;
	var settings_val20 = document.getElementById("settings_val20").value;
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
	ajaxRequest.open("GET", "server_sim_save_settings.php?formtitle_id="+formtitle_id+'&settings_val11='+settings_val11+'&settings_val12='+settings_val12+'&settings_val13='+settings_val13+'&settings_val14='+settings_val14+'&settings_val15='+settings_val15+'&settings_val16='+settings_val16+'&settings_val17='+settings_val17+'&settings_val18='+settings_val18+'&settings_val19='+settings_val19+'&settings_val20='+settings_val20+'&rnd='+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
		
}

