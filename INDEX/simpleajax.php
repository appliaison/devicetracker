<html>
<head>
<script type"text/javascript">
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
	var name = document.getElementById("name").value;
	var email = document.getElementById("email").value;
	var rnd = Math.random();
	if(name.length >0 && email.length >0) {
		name=escape(name);
		email=escape(email);
		alert('name is :'+ name);
	try{
    http.open("GET", "returnvalues.php?name="+name+'&email='+email+'&rnd='+rnd, true);
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
		document.getElementById('go').disabled = true;
		document.getElementById('go').value = "Hold On";
		// hide any previous returned values
		document.getElementById('returned_value').style.display="none";
	} else {
		alert("please complete both fields first");
	}
}

function handleResponse() {
	
	
	try
	{
    if((http.readyState == 4)&&(http.status == 200))
	{
    	var response = http.responseXML.documentElement;
    	var n = response.getElementsByTagName('test')[0].firstChild.nodeValue;
    	var e = response.getElementsByTagName('email')[0].firstChild.nodeValue;
    	var r = response.getElementsByTagName('random')[0].firstChild.nodeValue;
       
    	// write out response
      document.getElementById("returned_value").innerHTML ='Returned: '+n+' ('+e+') Random: '+r;
      // document.getElementById("returned_value").innerHTML='testing';
      // re-enable the button
      //document.getElementById('go').disabled = false;
      //document.getElementById('go').value = "Submit";
      //document.getElementById('returned_value').style.display="";
	}
		
  }
	catch(e)
	{
		// caught an error
		//alert('Response failed.');
		//alert(e);
		alert(response);
		//document.getElementById("returned_value").innerHTML='Returned : ' + n;
		//alert (r);
		document.getElementById('go').disabled = false;
	}
	finally
	{
	
	}
}

  
</script>

</head>

<title> </title>

<body onLoad="document.getElementById('name').focus()">
	<fieldset>
		<legend>  </legend>

		<br />
		<label>Name: <input type="text" id="name" name="name"></label>&nbsp;
		<label>Email: <input type="text" id="email" name="email"></label>&nbsp;
		<input type="button" value=" Submit " id="go" onClick="sendRequest()">
		<br /><br />
	<span id="returned_value"></span>
	</fieldset>

<br /><p></p>
</body>

</html>
