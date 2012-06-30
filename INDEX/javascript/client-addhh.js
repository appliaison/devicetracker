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
	if(hh_assigned_num.length >0 && hh_revision_num.length >0) 
	{
		hh_assigned_num=escape(hh_assigned_num);
		hh_revision_num=escape(hh_revision_num);
		try
		{
		http.open("GET", "server-addhh.php?hh_type="+hh_type+'&hh_location='+hh_location+'&hh_assigned_num='+hh_assigned_num+'&hh_revision_num='+hh_revision_num+'&hh_pin='+hh_pin+'&hh_imei='+hh_imei+'&hh_bootrom='+hh_bootrom+'&hh_cpr='+hh_cpr+'&hh_notes='+hh_notes+'&rnd='+rnd, true);
		http.setRequestHeader('Content-Type',  "text/xml");
		http.onreadystatechange = handleResponse;
		http.send(null);
	}
	catch(e){
		// caught an error
		//alert('Request send failed.');
		alert(e);
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
		alert("Please fill in all the fields");
	}
}

function handleResponse() {
	try{
    if((http.readyState == 4)&&(http.status == 200)){
    	var response = http.responseXML.documentElement;
    	var hh_type = response.getElementsByTagName('hh_type')[0].firstChild.nodeValue;
		var hh_location = response.getElementsByTagName('hh_location')[0].firstChild.nodeValue;
		var hh_assigned_num = response.getElementsByTagName('hh_assigned_num')[0].firstChild.nodeValue;
		var hh_revision_num = response.getElementsByTagName('hh_revision_num')[0].firstChild.nodeValue;
		var hh_pin = response.getElementsByTagName('hh_pin')[0].firstChild.nodeValue;
		var hh_imei = response.getElementsByTagName('hh_imei')[0].firstChild.nodeValue;
		var hh_bootrom = response.getElementsByTagName('hh_bootrom')[0].firstChild.nodeValue;
		var hh_cpr = response.getElementsByTagName('hh_cpr')[0].firstChild.nodeValue;
		var hh_notes = response.getElementsByTagName('hh_notes')[0].firstChild.nodeValue;
		
		//var sim_in_svv = response.getElementsByTagName('sim_in_svv')[0].firstChild.nodeValue;
		//var sim_conference_call = response.getElementsByTagName('sim_conference_call')[0].firstChild.nodeValue;
		//var sim_international_call = response.getElementsByTagName('sim_international_call')[0].firstChild.nodeValue;
		//var sim_call_forwarding = response.getElementsByTagName('sim_call_forwarding')[0].firstChild.nodeValue;
		//var sim_call_barring = response.getElementsByTagName('sim_call_barring')[0].firstChild.nodeValue;
		//var sim_call_waiting = response.getElementsByTagName('sim_call_waiting')[0].firstChild.nodeValue;
		//var sim_voicemail = response.getElementsByTagName('sim_voicemail')[0].firstChild.nodeValue;
    	//var sim_notes = response.getElementsByTagName('sim_notes')[0].firstChild.nodeValue;


    	// write out response
      //document.getElementById("returned_value").innerHTML = '<br /><strong>Handheld added:</strong> <a href="mailto:'+e+'">'+n+'</a> ('+e+') <strong>Random:</strong> '+r;
	  document.getElementById("returned_value").innerHTML = '<br /><strong>Handheld added:</strong> Type : '+hh_type+'Location :'+hh_location ;
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