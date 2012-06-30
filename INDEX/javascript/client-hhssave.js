function hh_save_sendRequest(formtitle, fadin, getstringval)
{
	var handheld_id = document.getElementById("handheld_id").value;
	var formtitle_id = formtitle;
	var hh_userid = document.getElementById("hh_userid").value;
	var hh_type = document.getElementById("hh_type").value;
	var hh_location = document.getElementById("hh_location").value;
	var hh_assigned_num = document.getElementById("hh_assigned_num").value;
	var hh_revision_num = document.getElementById("hh_revision_num").value;
	var hh_pin = document.getElementById("hh_pin").value;
	var hh_imei = document.getElementById("hh_imei").value;
	var hh_bootrom = document.getElementById("hh_bootrom").value;
	var hh_cpr = document.getElementById("hh_cpr").value;
	var hh_notes = document.getElementById("hh_notes").value;
	var xhh_is_secure = document.getElementById("xhh_is_secure").value;
	var xhh_is_corp = document.getElementById("xhh_is_corp").value;
	var xhh_is_otasl = document.getElementById("xhh_is_otasl").value;
	var getstring = getstringval;
	
	var rnd = Math.random();
	if ( (handheld_id.length >0) )
	{
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
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			
			
			document.getElementById("hh_save_returned_value").innerHTML = ajaxRequest.responseText;
			
		
		}
	}
	ajaxRequest.open("GET", "server-hhsave.php?handheld_id="+handheld_id+'&rnd='+rnd+'&formtitle_id='+formtitle_id+'&hh_userid='+hh_userid+'&hh_type='+hh_type+'&hh_location='+hh_location+'&hh_assigned_num='+hh_assigned_num+'&hh_revision_num='+hh_revision_num+'&hh_pin='+hh_pin+'&hh_notes='+hh_notes+'&xhh_is_secure='+xhh_is_secure+'&xhh_is_corp='+xhh_is_corp+'&xhh_is_otasl='+xhh_is_otasl, true);
	ajaxRequest.send(null); 
	location.href="imsearchhh.php?handheld_id="+handheld_id+getstring;
	
  // end of sendRequest code 
}