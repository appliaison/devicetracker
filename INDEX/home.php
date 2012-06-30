<?
require "loginstuff.php";
include 'loadsessionvariables.php';
include 'loadsimsessionvariables.php';
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
	<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow" />
<title> Device Tracker - Blackberry Enterprise Resource Tracker 	<? $sql = "SELECT settings_description FROM settings WHERE settings_name = 'version'";
						$rs = mysql_query($sql, $connect);
						$fetch = mysql_fetch_assoc($rs);
						echo $fetch['settings_description'];
						?></title>
<script type="text/javascript" src="javascript/bsn.AutoSuggest_c_2.0.js"></script>
<link href="css/<? $sql = "SELECT settings_description FROM settings WHERE settings_name = 'default_css'";
						$rs = mysql_query($sql, $connect);
						$fetch = mysql_fetch_assoc($rs);
						echo $fetch['settings_description'];
						?>" rel="stylesheet" type="text/css" />
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
  <a href="index.php">
  Device Tracker - Blackberry Enterprise Resource Tracker 	<? $sql = "SELECT settings_description FROM settings WHERE settings_name = 'version'";
						$rs = mysql_query($sql, $connect);
						$fetch = mysql_fetch_assoc($rs);
						echo $fetch['settings_description'];
						?>
  </a>
  </td>
  <td align="right">
	Logged in as <? echo $user ; //$workstation.$domain"; ?><? echo $_REQUEST['type']?><!-- <a href="logout.php"> Logout</a> -->
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
  <td class="tabup"><a href="home.php" class="plain">Home</a></td>
  <td class="tabdown"><a href="index.php" class="plain">Handhelds</a></td>
  <td class="tabdown"><a href="imsearchsim-run.php" class="plain">SIM cards</a></td>
  <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>
  <td class="tabdown"><a href="superadmin.php" class="plain">Superadmin</a></td>

  </tr>
  </table></td></tr>
  <tr id="nav-secondary">
  <td align="center" class="tabs" colspan="2">

			<table cellpadding="0" cellspacing="0" align="center">
			<tr>
			<td class="tabdown2"><a href="cdma.php" class="plain">CDMA</a></td>
			<!-- 
			<td class="tabdown2"><a href="settings.php" class="plain">Settings</a></td>
			<td class="tabdown2"><a href="?event=admin" class="plain">Users</a></td>
			<td class="tabdown2"><a href="?event=log" class="plain">Add Handheld</a></td>
			<td class="tabdown2"><a href="?event=plugin" class="plain">Add SIM card</a></td><td class="tabdown2">
			<a href="?event=export" class="plain">Export to Excel</a></td>
			-->
			</tr>
			
			</table>
			
			</td>
			</tr></table>

		

 <? 
  $useremail = $user . '@rim.com';
  $sqlcheckpermissions = "SELECT isadmin, email, id FROM users WHERE email = '$useremail' ";
  $rs = mysql_query($sqlcheckpermissions, $connect);
  $fetch = mysql_fetch_assoc($rs);
  $my_id = $fetch['id'];
  
  //if ($fetch['isadmin'])
  //{
  ?>
<!-- start of quick-signout for hh -->
<div>


</div>

<div id="centerFrame" class="asholder">	

<!-- start of quick-signout for hh -->



		<label for="testinput">Device Tracker Help: </label>
		<br/>
		<br/>	
	
Device Tracker v1.01 is an inventory management system created by 
the SV&V Handheld Tools Development Team

with the following features - 
<br/>
-          Consolidated system for both SIM cards and devices
<br/>
-          Barcode scanning support
<br/>
-          Breakdown of corporate and test devices
<br/>
-          More effective searching functionality
<br/>
-          Automatic emailing of all users of a given device type 
<br/>
-          Device tracking support by office location
<br/>
-          New UI
<br/>
-          Numerous field updates and enhancements to aid with tracking
<br/>
-          Automatic Email sent when a device is signed out
<br/>
<br/>

Updates Coming in v1.1 (Going live this week)
<br/>        
<br/>
-          Ability to query a block of IMEIs and ICCID
<br/>
-          Searching for a handheld by team field
<br/>
-          Exporting of data to excel
<br/>
-          Enhanced sorting
<br/>
<br/>
 <?

 

 $sql2 = "SELECT * FROM troubador_device.handhelds WHERE userid = $my_id";
	
$rs2 = mysql_query($sql2, $connect);
echo "<b>You have the following devices signed out :</b>";
echo "<br>";
while ($fetch = mysql_fetch_assoc($rs2))
{
	echo $fetch['type'] . "# " .  $fetch['AssignedNumber'];
	
	echo " " . $fetch['IMEI'] . " " . $fetch['PIN'];
	echo "<br>";
}

echo "<br>";

 $sql2 = "SELECT * FROM troubador_device.simcards WHERE user_id = $my_id";
	
$rs2 = mysql_query($sql2, $connect);

echo "<b>You have the following simcards signed out :</b>"; 
echo "<br>";
while ($fetch = mysql_fetch_assoc($rs2))
{
	echo "ICCID" . $fetch['ICCID'] . " " . "Carrier:" . " " . $fetch['Carrier'];
	echo "<br>";
	
}
?>
<!-- end of quick-signout for hh -->
<!-- start of quick-sigin for hh -->
<br>

<span class="ok" id="returned_value" ></span>
</div>

<?
//}
//else
//{
//	echo "You do not have permissions to view this page. Please email svvhhtoolsdev@rim.com if you need permissions to view this page";
//}
?>
</body>
</html>
