// start of add_to_sign_out_array

function hh_save_signoutsignin_sendRequest()
{
	var signout_signin_userid = document.getElementById("signout_signin_userid").value;	
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
			
			//document.getElementById("hh_save_signoutsignin_returned_value").innerHTML = '';
			document.getElementById("hh_save_signoutsignin_returned_value").innerHTML = ajaxRequest.responseText;
			
		}
	}
	ajaxRequest.open("GET", "server-hh-save-signout-signin.php?signout_signin_userid="+signout_signin_userid+'&rnd='+rnd, true);
	ajaxRequest.send(null); 

}


function reload_search()
{
	location.href = "imsearchhh.php";
	
}