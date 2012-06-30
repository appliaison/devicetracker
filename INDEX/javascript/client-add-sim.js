var http = createRequestObject();

function createRequestObject() {  
	// find the correct xmlHTTP, works with IE, FF and Opera
	var xmlhttp;
	try {
  	xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
  catch(e) {
    try {
    	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    catch(e) {
    	xmlhttp=null;
    }
  }
  if(!xmlhttp&&typeof XMLHttpRequest!="undefined") {
  	xmlhttp=new XMLHttpRequest();
  }
	return  xmlhttp;
}

function sendRequest() {
	var sim_iccid = document.getElementById("sim_iccid").value;
	var sim_carrier = document.getElementById("sim_carrier").value;
	var sim_id = document.getElementById("sim_id").value;
	var sim_imsi = document.getElementById("sim_imsi").value;
	var sim_msisdn = document.getElementById("sim_msisdn").value;
	var sim_owner_name = document.getElementById("sim_owner_name").value;
	var sim_available_only = document.getElementById("sim_available_only").value;
	var sim_in_svv = document.getElementById("sim_in_svv").value;
	var sim_conference_call = document.getElementById("sim_conference_call").value;
	var sim_international_call = document.getElementById("sim_international_call").value;
	var sim_call_forwarding = document.getElementById("sim_call_forwarding").value;
	var sim_call_barring = document.getElementById("sim_call_barring").value;
	var sim_call_waiting = document.getElementById("sim_call_waiting").value;
	var sim_voicemail = document.getElementById("sim_voicemail").value;
	var sim_notes = document.getElementById("sim_notes").value;
	
	var rnd = Math.random();
	if(sim_iccid.length >0 && sim_carrier.length >0) 
	{
		sim_iccid=escape(sim_iccid);
		sim_carrier=escape(sim_carrier);
		try
		{
		http.open("GET", "server-addsim.php?sim_iccid="+sim_iccid+'&sim_carrier='+sim_carrier+'&sim_id='+sim_id+'&sim_imsi='+sim_imsi+'&sim_msisdn='+sim_msisdn+'&sim_owner_name='+sim_owner_name+'&sim_available_only='+sim_available_only+'&sim_in_svv='+sim_in_svv+'&sim_conference_call='+sim_conference_call+'&sim_international_call='+sim_international_call+'&sim_call_forwarding='+sim_call_forwarding+'&sim_call_barring='+sim_call_barring+'&sim_call_waiting='+sim_call_waiting+'&sim_voicemail='+sim_voicemail+'&sim_notes='+sim_notes+'&rnd='+rnd, true);
		http.setRequestHeader('Content-Type',  "text/xml");
		http.onreadystatechange = handleResponse;
		http.send(null);
	}
	catch(e){
		// caught an error
		alert('Request send failed.');
	}
	finally{}
		// disable button until end of response
		//document.getElementById('go').disabled = true;
		//document.getElementById('go').value = "Hold On";
		// hide any previous returned values
		document.getElementById('returned_value').style.display="none";
	} 
	else 
	{
		alert("ICCID and Carrier are required fields");
	}
}

function handleResponse() {
	try{
    if((http.readyState == 4)&&(http.status == 200)){
    	var response = http.responseXML.documentElement;
    	var sim_iccid = response.getElementsByTagName('sim_iccid')[0].firstChild.nodeValue;
		var sim_carrier = response.getElementsByTagName('sim_carrier')[0].firstChild.nodeValue;
		var sim_id = response.getElementsByTagName('sim_id')[0].firstChild.nodeValue;
		var sim_imsi = response.getElementsByTagName('sim_imsi')[0].firstChild.nodeValue;
		var today = response.getElementsByTagName('today')[0].firstChild.nodeValue;
		
		//var sim_msisdn = response.getElementsByTagName('sim_msisdn')[0].firstChild.nodeValue;
		//var sim_owner_name = response.getElementsByTagName('sim_owner_name')[0].firstChild.nodeValue;
		//var sim_available_only = response.getElementsByTagName('sim_available_only')[0].firstChild.nodeValue;
		//var sim_in_svv = response.getElementsByTagName('sim_in_svv')[0].firstChild.nodeValue;
		//var sim_conference_call = response.getElementsByTagName('sim_conference_call')[0].firstChild.nodeValue;
		//var sim_international_call = response.getElementsByTagName('sim_international_call')[0].firstChild.nodeValue;
		//var sim_call_forwarding = response.getElementsByTagName('sim_call_forwarding')[0].firstChild.nodeValue;
		//var sim_call_barring = response.getElementsByTagName('sim_call_barring')[0].firstChild.nodeValue;
		//var sim_call_waiting = response.getElementsByTagName('sim_call_waiting')[0].firstChild.nodeValue;
		//var sim_voicemail = response.getElementsByTagName('sim_voicemail')[0].firstChild.nodeValue;
    	//var sim_notes = response.getElementsByTagName('sim_notes')[0].firstChild.nodeValue;


    	// write out response
      //document.getElementById("returned_value").innerHTML = '<br /><strong>SIM card added:</strong> <a href="mailto:'+e+'">'+n+'</a> ('+e+') <strong>Random:</strong> '+r;
	  document.getElementById("returned_value").innerHTML = '<br /><strong>SIM card added:</strong> ICCID : '+sim_iccid+'Carrier :'+sim_carrier+'Today: '+today ;
      // re-enable the button
      //document.getElementById('go').disabled = false;
      //document.getElementById('go').value = "Submit";
      document.getElementById('returned_value').style.display="";
		}
  }
	catch(e){
		// caught an error
		//alert('Not added.');
		alert(e);
	}
	finally{}
}