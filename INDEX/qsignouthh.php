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
<link href="css/autosuggest.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="javascript/bsn.AutoSuggest_c_2.0.js"></script>
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
// -->
</script>

<script language="javascript">
function charAlert() 
{
	

	var identifier = document.getElementById('identifier');
	var hh_userid = document.getElementById('hh_userid').value;

	if(identifier.value.length == 8)
	{
		/* must be > 5, not == 5 or else the substring statement on the next line will cause 
		the function to run again if the user dismisses the alert by pressing the 'enter' key rather than clicking 'OK'. */

		var identifier = identifier.value;
	
		// set field's value equal to first five characters.

		//imei.blur()
		/* move cursor out of form element to keep it from placing itself at position zero, causing an overwrite of the first character */

		//alert("You entered a PIN");
		
		//var answer = confirm('Signin the following device?' + '\n' + identifier.value);
		var answer = true;
		if(answer)
		{
			var rnd = Math.random();

			//document.getElementById("hh_signin_returned_value").innerHTML ='';
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
				
				
				document.getElementById("hh_signin_returned_value").innerHTML +=  ajaxRequest.responseText;
				document.getElementById("identifier").value = "";
				document.getElementById("identifier").focus();
				

			}
			}
			ajaxRequest.open("GET", 'server-hh-signout-sendrequest-pin.php?identifier='+identifier+'&hh_userid='+hh_userid+'&rnd='+rnd, true);
			ajaxRequest.send(null); 

			// end of sendRequest code 	
			

		}	
		else 
		{
			alert('Not signed out')
		}

	}
	
	else if(identifier.value.length == 14)
	{
		/* must be > 5, not == 5 or else the substring statement on the next line will cause 
		the function to run again if the user dismisses the alert by pressing the 'enter' key rather than clicking 'OK'. */

		var identifier = identifier.value;
		// set field's value equal to first five characters.

	
		
		
		/* move cursor out of form element to keep it from placing itself at position zero, causing an overwrite of the first character */

		//alert("You entered an MEID");
		
		//var answer = confirm('Signin the following device?' + '\n' + identifier.value);
		var answer = true;
		
		if(answer)
		{
			var rnd = Math.random();

			//document.getElementById("hh_signin_returned_value").innerHTML ='';
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
				
				
				document.getElementById("hh_signin_returned_value").innerHTML +=  ajaxRequest.responseText;
				document.getElementById("identifier").value = "";
				document.getElementById("identifier").focus();
				

			}
			}
			ajaxRequest.open("GET", 'server-hh-signout-sendrequest-meid.php?identifier='+identifier+'&hh_userid='+hh_userid+'&rnd='+rnd, true);
			ajaxRequest.send(null); 
			

			// end of sendRequest code 	
			
			

		}	
		else 
		{
			alert('Not signed out')
		}
		
	}
	
	else if(identifier.value.length == 15)
	{
		/* must be > 5, not == 5 or else the substring statement on the next line will cause 
		the function to run again if the user dismisses the alert by pressing the 'enter' key rather than clicking 'OK'. */

		var identifier = identifier.value;
		// set field's value equal to first five characters.

		//imei.blur()
		/* move cursor out of form element to keep it from placing itself at position zero, causing an overwrite of the first character */

		//alert("You entered an IMEI");
		
		//var answer = confirm('Signin the following device?' + '\n' + identifier.value);
		var answer = true;
		
		if(answer)
		{
			var rnd = Math.random();

			//document.getElementById("hh_signin_returned_value").innerHTML ='';
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
				
				
				document.getElementById("hh_signin_returned_value").innerHTML +=  ajaxRequest.responseText;
				document.getElementById("identifier").value = "";
				document.getElementById("identifier").focus();
				

			}
			}
			ajaxRequest.open("GET", 'server-hh-signout-sendrequest-imei.php?identifier='+identifier+'&hh_userid='+hh_userid+'&rnd='+rnd, true);	
			ajaxRequest.send(null); 

			// end of sendRequest code 	
			

		}	
		else 
		{
			alert('Not signed out')
		}

	}

		

} 
</script>
<script type="text/javascript">

function init() 
{

	var hh_user_field = document.getElementById('hh_user_field');
	hh_user_field.focus();

}
window.onload=init;
</script>
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
 




</td></tr>
  <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
                    <table cellpadding="0" cellspacing="0" align="center"><tr>
                            <td valign="middle" style="width:368px">&nbsp;</td>
							<td class="tabdown"><a href="home.php" class="plain">Home</a></td>
                            <td class="tabup"><a href="handhelds.php" class="plain">Handhelds</a></td>
                            <td class="tabdown"><a href="simcards.php" class="plain">SIM cards</a></td>
                            <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

                        </tr>
                    </table></td></tr>
            <tr id="nav-secondary">
                <td align="center" class="tabs" colspan="2">

                    <table cellpadding="0" cellspacing="0" align="center"><tr>
          							 
                             <td class="tabdown2"><a href="index.php" class="plain">Search HH</a></td>
							 <td class="tabdown2"><a href="quicksearchhh.php" class="plain">Quicksearch</a></td>
							 <td class="tabdown2"><a href="qsigninhh.php" class="plain">Quicksignin</a></td>
							 <td class="tabup"><a href="qsignouthh.php" class="plain">Quicksignout</a></td>
                            <td class="tabdown2"><a href="addhh.php" class="plain">Add HH</a></td>
							<td class="tabdown2"><a href="hhtypes.php" class="plain">HH Types</a></td>
                            <td class="tabdown2"><a href="displayhistoryhh.php" class="plain">History</a></td>
                           
							</tr>
                    </table></td></tr></table>
<?
require 'checkadmin.php';
?>
		
<!-- start of quick-signout for hh -->
<div>


</div>

<div id="quicksigninFrame" class="asholder">	

<!-- start of quick-signout for hh -->

<!-- start of quick-signout for hh -->


	<form name="formTwo">
		<label for="testinput">Username: </label>
		<br />
		<br />
		<input type="text" id="hh_user_field" value="" style="width:200px" tabindex="1"/> 
		<br/>
		<br />
		<!-- <input id='imei' onKeyUp="charAlert()" style="font-size: 10px; width: 200px;"  ></input>  <br>-->
		<label for="testinput">Quick Sign Out (HH)</label>
		<br />
		<br />
		<p>Please type username and then scan IMEI / MEID barcode or enter PIN and hit tab to sign-out device</p>
		<br />
		<input id='identifier' onBlur="charAlert();" style="font-size: 10px; width: 200px;" tabindex="2" ></input>  <br>
		<input id='identifier2' type="hidden" tabindex="3" ></input>  <br>
		
	</form>  


	<input type="hidden" name="hh_userid" id="hh_userid" value="" style="font-size: 10px; width: 20px;" />
	 <input type="hidden" name="hh_type" id="hh_type" value="" style="font-size: 10px; width: 20px;"  />
	
<span class="ok" id="returned_value" ></span>



<!-- end of quick-signout for hh -->
<!-- start of quick-sigin for hh -->
<br>

<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">	
<tr>
<td>
<span class="ok" id="hh_signin_returned_value" ></span>
</tr>
</td>
</table>


</div>
 <script type="text/javascript">	
	var options_xml = {
		script:"userlist.php?",
		varname:"input",
		callback: function (obj) { document.getElementById('hh_userid').value = obj.id; }
	};
	var as_xml = new AutoSuggest('hh_user_field', options_xml);
 </script>




<!-- end of home -->

</body>
</html>
