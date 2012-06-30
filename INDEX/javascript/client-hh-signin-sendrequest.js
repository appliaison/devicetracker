function client-hh-signin-sendrequest()
{
	//var formtitle_id = formtitle;


	var rnd = Math.random();
	
	document.getElementById("hh_signin_returned_value").innerHTML ='';
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
			
			
			document.getElementById("hh_signin_returned_value").innerHTML = ajaxRequest.responseText;
			
		
		}
	}
	//ajaxRequest.open("GET", "server-hh-signin-sendrequest.php?formtitle_id="+formtitle_id+'&rnd='+rnd, true);
	ajaxRequest.open("GET", "server-hh-signin-sendrequest.php?rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
		
}

