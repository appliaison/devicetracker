<?
	$connect = mysql_connect('localhost', 'devicetracker', 'device');
	$select = mysql_select_db('devicetracker');
	session_start();
	if(!session_is_registered("email"))
	{
	header("location:index.php");
	}
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
	<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow" />
<title>Device Tracker</title>
<script type="text/javascript" src="javascript/bsn.AutoSuggest_c_2.0.js"></script>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<link href="css/frames.css" rel="stylesheet" type="text/css" />
<link href="css/autosuggest.css" rel="stylesheet" type="text/css" />
<?

$session_email_not_set = (!isset($_SESSION['email']));
if ($session_email_not_set == 1)
{

 ?>
<!-- <script type="text/javascript">
location.replace('index.php');
</script>
-->
<?
}
?>

</head>
<body id="page-admin">
  <table id="pagetop" cellpadding="0" cellspacing="0">
  <tr id="branding">
  <td>
  <a href="http://svv-db:8090/devicetracker/index2.php">
  Device Tracker
  </a>
  </td>
  <td align="right">
	Logged in as <? echo $_SESSION['email']; ?><a href="logout.php"> Logout</a>
  </td>
  </tr>
  
<script src="shortcuts.js" type="text/javascript"></script>
<script src="javascript/ajax.js" type="text/javascript"></script>
<script type="text/javascript">
function markCalled(id) {
	$(id).innerHTML = "Called";
	$(id).className = "message-success";
}
function init() {

	shortcut.add("Ctrl+s", function() {
		//markCalled("ctrl1");
	});
	shortcut.add("Alt+s", function() {
		//markCalled("alt1");
	});

}
window.onload=init;
</script>
<script type="text/javascript">
<!-- 
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

	var hh_userid = document.getElementById("hh_userid").value;
	var hh_type = document.getElementById("hh_type").value;
	var hh_assigned_num = document.getElementById("hh_assigned_num").value;
	var hh_pin = document.getElementById("hh_pin").value;

	var rnd = Math.random();
	if ( (hh_userid.length >0) && ( ((hh_type.length >0) && (hh_assigned_num.length > 0)) || (hh_pin.length > 0) ) )
	{
		try
		{
		http.open("GET", "server-hhquicksignout.php?hh_type="+hh_type+'&hh_userid='+hh_userid+'&hh_assigned_num='+hh_assigned_num+'&hh_pin='+hh_pin+'&rnd='+rnd, true);
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
		document.getElementById("returned_value").innerHTML = '<br /><strong>Please fill in the required fields</strong> ';
	}
}

function handleResponse() {
	try{
    if((http.readyState == 4)&&(http.status == 200)){
    	var response = http.responseXML.documentElement;
    	var hh_message = response.getElementsByTagName('hh_message')[0].firstChild.nodeValue;
    	// write out response
      //document.getElementById("returned_value").innerHTML = '<br /><strong>Handheld added:</strong> <a href="mailto:'+e+'">'+n+'</a> ('+e+') <strong>Random:</strong> '+r;
	  document.getElementById("returned_value").innerHTML = '<br /><strong>Response from server:</strong>: '+hh_message ;
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
// start of hh_signin
function hh_signin_sendRequest() {

	var hh_userid = document.getElementById("hh_userid").value;
	var hh_type = document.getElementById("hh_type").value;
	var hh_assigned_num = document.getElementById("hh_assigned_num").value;
	var hh_pin = document.getElementById("hh_pin").value;

	var rnd = Math.random();
	if ( (hh_userid.length >0) && ( ((hh_type.length >0) && (hh_assigned_num.length > 0)) || (hh_pin.length > 0) ) )
	{
		try
		{
		http.open("GET", "server-hhquicksignout.php?hh_type="+hh_type+'&hh_userid='+hh_userid+'&hh_assigned_num='+hh_assigned_num+'&hh_pin='+hh_pin+'&rnd='+rnd, true);
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
		document.getElementById('hh_signin_returned_value').style.display="none";
	}
	else
	{
		document.getElementById("hh_signin_returned_value").innerHTML = '<br /><strong>Please fill in the required fields</strong> ';
	}
}

function hh_signin_handleResponse() {
	try{
    if((http.readyState == 4)&&(http.status == 200)){
    	var response = http.responseXML.documentElement;
    	var hh_message = response.getElementsByTagName('hh_message')[0].firstChild.nodeValue;
    	// write out response
      //document.getElementById("hh_signin_returned_value").innerHTML = '<br /><strong>Handheld added:</strong> <a href="mailto:'+e+'">'+n+'</a> ('+e+') <strong>Random:</strong> '+r;
	  document.getElementById("hh_signin_returned_value").innerHTML = '<br /><strong>Reply from server:</strong><br> Type : '+hh_message ;
      // re-enable the button
      //document.getElementById('go').disabled = false;
      //document.getElementById('go').value = "Submit";
      document.getElementById('hh_signin_returned_value').style.display="";
		}
  }
	catch(e){
		// caught an error
		//alert('Not added.');
		alert(e);
	}
	finally{}
}
// start of sim_signout
function sim_signout_sendRequest() {

	var hh_userid = document.getElementById("hh_userid").value;
	var hh_type = document.getElementById("hh_type").value;
	var hh_assigned_num = document.getElementById("hh_assigned_num").value;
	var hh_pin = document.getElementById("hh_pin").value;

	var rnd = Math.random();
	if ( (hh_userid.length >0) && ( ((hh_type.length >0) && (hh_assigned_num.length > 0)) || (hh_pin.length > 0) ) )
	{
		try
		{
		http.open("GET", "server-hhquicksignout.php?hh_type="+hh_type+'&hh_userid='+hh_userid+'&hh_assigned_num='+hh_assigned_num+'&hh_pin='+hh_pin+'&rnd='+rnd, true);
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
		document.getElementById('sim_signout_returned_value').style.display="none";
	}
	else
	{
		document.getElementById("sim_signout_returned_value").innerHTML = '<br /><strong>Please fill in the required fields</strong> ';
	}
}

function sim_signout_handleResponse() {
	try{
    if((http.readyState == 4)&&(http.status == 200)){
    	var response = http.responseXML.documentElement;
    	var hh_message = response.getElementsByTagName('hh_message')[0].firstChild.nodeValue;
    	// write out response
      //document.getElementById("hh_signin_returned_value").innerHTML = '<br /><strong>Handheld added:</strong> <a href="mailto:'+e+'">'+n+'</a> ('+e+') <strong>Random:</strong> '+r;
	  document.getElementById("sim_signout_returned_value").innerHTML = '<br /><strong>Reply from server:</strong><br> Type : '+hh_message ;
      // re-enable the button
      //document.getElementById('go').disabled = false;
      //document.getElementById('go').value = "Submit";
      document.getElementById('sim_signout_returned_value').style.display="";
		}
  }
	catch(e){
		// caught an error
		//alert('Not added.');
		alert(e);
	}
	finally{}
}
// start of sim_signin
function sim_signin_sendRequest() {

	var hh_userid = document.getElementById("hh_userid").value;
	var hh_type = document.getElementById("hh_type").value;
	var hh_assigned_num = document.getElementById("hh_assigned_num").value;
	var hh_pin = document.getElementById("hh_pin").value;

	var rnd = Math.random();
	if ( (hh_userid.length >0) && ( ((hh_type.length >0) && (hh_assigned_num.length > 0)) || (hh_pin.length > 0) ) )
	{
		try
		{
		http.open("GET", "server-hhquicksignout.php?hh_type="+hh_type+'&hh_userid='+hh_userid+'&hh_assigned_num='+hh_assigned_num+'&hh_pin='+hh_pin+'&rnd='+rnd, true);
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
		document.getElementById('sim_signin_returned_value').style.display="none";
	}
	else
	{
		document.getElementById("sim_signin_returned_value").innerHTML = '<br /><strong>Please fill in the required fields</strong> ';
	}
}

function sim_signin_handleResponse() {
	try{
    if((http.readyState == 4)&&(http.status == 200)){
    	var response = http.responseXML.documentElement;
    	var hh_message = response.getElementsByTagName('hh_message')[0].firstChild.nodeValue;
    	// write out response
      //document.getElementById("hh_signin_returned_value").innerHTML = '<br /><strong>Handheld added:</strong> <a href="mailto:'+e+'">'+n+'</a> ('+e+') <strong>Random:</strong> '+r;
	  document.getElementById("sim_signin_returned_value").innerHTML = '<br /><strong>Reply from server:</strong><br> Type : '+hh_message ;
      // re-enable the button
      //document.getElementById('go').disabled = false;
      //document.getElementById('go').value = "Submit";
      document.getElementById('sim_signin_returned_value').style.display="";
		}
  }
	catch(e){
		// caught an error
		//alert('Not added.');
		alert(e);
	}
	finally{}
}
 // -->
</script>
</td></tr>
  <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
 		<table cellpadding="0" cellspacing="0" align="center"><tr>
  <td valign="middle" style="width:368px">&nbsp;</td>
  <td class="tabdown"><a href="handhelds.php" class="plain">Handhelds</a></td>
  <td class="tabdown"><a href="simcards.php" class="plain">SIM cards</a></td>
  <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

  </tr>
  </table></td></tr>
  <tr id="nav-secondary">
  <td align="center" class="tabs" colspan="2">

			<table cellpadding="0" cellspacing="0" align="center"><tr>
			<td class="tabdown2"><a href="carriers.php" class="plain">Carriers</a></td>
			<td class="tabdown2"><a href="settings.php" class="plain">Settings</a></td>
			<td class="tabdown2"><a href="?event=admin" class="plain">Users</a></td>
			<td class="tabdown2"><a href="?event=log" class="plain">Add Handheld</a></td>
			<td class="tabdown2"><a href="?event=plugin" class="plain">Add SIM card</a></td><td class="tabdown2">
			<a href="?event=export" class="plain">Export to Excel</a></td>
			</tr>
			</table>
			
			</td>
			</tr></table>

		


<!-- start of quick-signout for hh -->
<div>


</div>

<div id="leftFrame" class="asholder">	

<!-- start of quick-signout for hh -->

<b>Quick Sign Out (HH)</b>

		<label for="testinput">User: </label><input type="text" id="testinput_xml" value="" style="width:200px" tabindex="1"/> <br>
  
Enter 'type' / 'assigned #' or 'PIN'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



	<input type="hidden" name="hh_userid" id="hh_userid" value="" style="font-size: 10px; width: 20px;" />
	 <input type="hidden" name="hh_type" id="hh_type" value="" style="font-size: 10px; width: 20px;"  />

<input type="text" id="testinput2_xml" value="" size="15" tabindex="2"/>
 / <input name="hh_assigned_num" id="hh_assigned_num" size="5" type="text" tabindex="3"> or <input name="hh_pin" id="hh_pin" size="10" type="text" tabindex="4"><br>


<input type="submit"  value="Sign out" name="B1" onClick="sendRequest()" tabindex="5">
<input type="submit"  value="Sign in" name="B1" onClick="hh_signin_sendRequest()" tabindex="10">
<span class="ok" id="returned_value" ></span>

<!-- end of quick-signout for hh -->
<!-- start of quick-sigin for hh -->
<br>

<span class="ok" id="returned_value" ></span>
</div>
<div id="leftFrameBottom" class="asholder">	

<!-- start of quick-signout for hh -->


<span class="ok" id="returned_value" ></span>

<!-- end of quick-signout for hh -->
<!-- start of quick-sigin for hh -->
<br>
<b>Quick Sign In (HH)</b>

		<label for="testinput">User: </label><input type="text" id="testinput_xml" value="" style="width:200px" tabindex="6"/> <br>
  
Enter 'type' / 'assigned #' or 'PIN'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



	<input type="hidden" name="hh_userid" id="hh_userid" value="" style="font-size: 10px; width: 20px;"  />
	 <input type="hidden" name="hh_type" id="hh_type" value="" style="font-size: 10px; width: 20px;" />

<input type="text" id="testinput2_xml" value="" size="15" tabindex="7" />
 / <input name="hh_assigned_num" id="hh_assigned_num" size="5" type="text" tabindex="8"> or <input name="hh_pin" id="hh_pin" size="10" type="text" tabindex="9"><br>

<input type="submit"  value="Sign out" name="B1" onClick="hh_signin_sendRequest()" tabindex="10">
<span class="ok" id="hh_signin_returned_value" ></span>
</div>
</div>
<!-- end of quick-signin for hh -->



<!-- start of quick-signout for simcards -->
<div id="rightFrame">	

	<b>Quick Sign Out (SIM)</b>

			<label for="simuserinput">User: </label><input type="text" id="simuserinput_xml" value="" style="width:200px" tabindex="11" /> <br>
	  
	Enter 'type' / 'assigned #' or 'PIN'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



		<input type="hidden" name="hh_userid" id="hh_userid" value="" style="font-size: 10px; width: 20px;"  />
		 <input type="hidden" name="hh_type" id="hh_type" value="" style="font-size: 10px; width: 20px;" />

	<input type="text" id="simtypesinput_xml" value="" size="15" tabindex="12"/>
	 / <input name="hh_assigned_num" id="hh_assigned_num" size="5" type="text" tabindex="13"> or <input name="hh_pin" id="hh_pin" size="10" type="text" tabindex="14"><br>


	<input type="submit"  value="Sign out" name="B1" onClick="sim_signout_sendRequest()" tabindex="15">
	<span class="ok" id="sim_signout_returned_value" ></span>

</div>
<!-- end of quick-signout for simcards -->
<!-- start of quick-in for simcards -->
<div id="rightFrameBottom">	

	<b>Quick Sign In (SIM)</b>

			<label for="testinput">User: </label><input type="text" id="testinput_xml" value="" style="width:200px" /> <br>
	  
	Enter 'type' / 'assigned #' or 'PIN'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



		<input type="hidden" name="hh_userid" id="hh_userid" value="" style="font-size: 10px; width: 20px;"  />
		 <input type="hidden" name="hh_type" id="hh_type" value="" style="font-size: 10px; width: 20px;" />

	<input type="text" id="testinput2_xml" value="" size="15" />
	 / <input name="hh_assigned_num" id="hh_assigned_num" size="5" type="text"> or <input name="hh_pin" id="hh_pin" size="10" type="text"><br>


	<input type="submit"  value="Sign out" name="B1" onClick="sim_signin_sendRequest()" tabindex="16">
	<span class="ok" id="sim_signin_returned_value" ></span>

</div>
<!-- end of quick-signin for simcards -->

<script type="text/javascript">
	var options = {
		script:"userlist?json=true&",
		varname:"input",
		json:true,
		callback: function (obj) { document.getElementById('hh_userid').value = obj.id; }
	};
	var as_json = new AutoSuggest('testinput', options);
	
	
	var options_xml = {
		script:"userlist.php?",
		varname:"input",
		callback: function (obj) { document.getElementById('hh_userid').value = obj.id; }
	};
	var as_xml = new AutoSuggest('testinput_xml', options_xml);
</script>

<script type="text/javascript">
	var options = {
		script:"userlist?json=true&",
		varname:"input",
		json:true,
		callback: function (obj) { document.getElementById('hh_userid').value = obj.id; }
	};
	var as_json = new AutoSuggest('testinput', options);
	
	
	var options_xml = {
		script:"userlist.php?",
		varname:"input",
		callback: function (obj) { document.getElementById('hh_userid').value = obj.id; }
	};
	var as_xml = new AutoSuggest('simuserinput_xml', options_xml);
</script>

<script type="text/javascript">
	var options = {
		script:"hhtypeslist?json=true&",
		varname:"input",
		json:true,
		callback: function (obj) { document.getElementById('hh_type').value = obj.id; }
	};
	var as_json = new AutoSuggest('testinput', options);
	
	
	var options_xml = {
		script:"hhtypelist.php?",
		varname:"input",
		callback: function (obj) { document.getElementById('hh_type').value = obj.id; }
	};
	var as_xml = new AutoSuggest('testinput2_xml', options_xml);
</script>
<script type="text/javascript">
	var options = {
		script:"hhtypeslist?json=true&",
		varname:"input",
		json:true,
		callback: function (obj) { document.getElementById('hh_type').value = obj.id; }
	};
	var as_json = new AutoSuggest('testinput', options);
	
	
	var options_xml = {
		script:"hhtypelist.php?",
		varname:"input",
		callback: function (obj) { document.getElementById('hh_type').value = obj.id; }
	};
	var as_xml = new AutoSuggest('simtypesinput_xml', options_xml);
</script>
</body>
</html>
