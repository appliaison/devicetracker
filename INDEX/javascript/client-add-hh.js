// start of addhhtodb

function addhhtodb()
{
	var hh_type = document.getElementById("hh_type").value;
	var hh_location = document.getElementById("hh_location").value;
	var hh_assigned_num = document.getElementById("hh_assigned_num").value;
	var hh_revision_num = document.getElementById("hh_revision_num").value;
	var hh_pin = document.getElementById("hh_pin").value;
	var hh_imei = document.getElementById("hh_imei").value;
	var hh_bootrom = document.getElementById("hh_bootrom").value;
	var hh_cpr = document.getElementById("hh_cpr").value;
	var hh_notes = document.getElementById("hh_notes").value;
	var hh_is_secure = document.getElementById("hh_is_secure").value;
	var hh_is_corp = document.getElementById("hh_is_corp").value;
	var hh_is_otasl = document.getElementById("hh_is_otasl").value;

	
	var rnd = Math.random();
	

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
			if (ajaxRequest.responseText == "FAIL-PINEXISTS")
			{
				document.getElementById("returned_value").innerHTML = '<a class="not-ok"> Error : A handheld was found in database with this PIN</a>';
			}
			
			else
			{
			document.getElementById("returned_value").innerHTML = '<a class="ok"><strong>Handheld added:</strong> Type : '+hh_type+'</a>' ;
			 document.getElementById('returned_value').style.display="";
			}
		}
	}
	ajaxRequest.open("GET", "server-add-hh.php?hh_type="+hh_type+'&hh_location='+hh_location+'&hh_assigned_num='+hh_assigned_num+'&hh_revision_num='+hh_revision_num+'&hh_pin='+hh_pin+'&hh_imei='+hh_imei+'&hh_bootrom='+hh_bootrom+'&hh_cpr='+hh_cpr+'&hh_notes='+hh_notes+'&rnd='+rnd, true);
	ajaxRequest.send(null); 

}


function populateAssigned()
{
	var hh_type = document.getElementById("hh_type").value;

	
	var rnd = Math.random();
	

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
			if (ajaxRequest.responseText != "0")
			{
				document.getElementById("hh_assigned_num").value = ajaxRequest.responseText;
				
			}
			
			else
			{
				document.getElementById("hh_assigned_num").value = 1;
			}
		}
	}
	ajaxRequest.open("GET", "server-populateassigned-hh.php?hh_type="+hh_type+'&rnd='+rnd, true);
	ajaxRequest.send(null); 

}



