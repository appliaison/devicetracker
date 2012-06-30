function generatehandheldhistory(formtitle)
{
	var formtitle_id = formtitle;
	var rnd = Math.random();
	
	document.getElementById("returned_value").innerHTML ='';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		document.getElementById("returned_value").innerHTML = "<img src='ajax-loader.gif'/>";
		
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
			
			
			document.getElementById("returned_value").innerHTML = ajaxRequest.responseText;
			
		
		}
	}
	ajaxRequest.open("GET", "server-generate-handhelds-history.php?formtitle_id="+formtitle_id+'&rnd='+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
		
}