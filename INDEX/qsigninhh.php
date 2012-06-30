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


<script language="javascript">
function charAlert() 
{
	

	var identifier = document.getElementById('identifier');

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
			ajaxRequest.open("GET", "server-hh-signin-sendrequest-pin.php?identifier="+identifier+'&rnd='+rnd, true);
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
			ajaxRequest.open("GET", "server-hh-signin-sendrequest-meid.php?identifier="+identifier+'&rnd='+rnd, true);
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
			ajaxRequest.open("GET", "server-hh-signin-sendrequest-imei.php?identifier="+identifier+'&rnd='+rnd, true);
			
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

	var imeival = document.getElementById('identifier');
	imeival.focus();

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
							 <td class="tabup"><a href="qsigninhh.php" class="plain">Quicksignin</a></td>
							 <td class="tabdown2"><a href="qsignouthh.php" class="plain">Quicksignout</a></td>
                            <td class="tabdown2"><a href="addhh.php" class="plain">Add HH</a></td>
							<td class="tabdown2"><a href="hhtypes.php" class="plain">HH Types</a></td>
                            <td class="tabdown2"><a href="displayhistoryhh.php" class="plain">History</a></td>
                          
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
		<label for="testinput">Quick Sign In </label>
		<br />
		<br />
		<p>Please scan IMEI / MEID barcode or enter PIN and hit tab to sign-in device</p>
		<br />
		<!-- <input id='imei' onKeyUp="charAlert()" style="font-size: 10px; width: 200px;"  ></input>  <br>-->
		<input id='identifier' onBlur="charAlert();" style="font-size: 10px; width: 200px;" tabindex="1" ></input>  <br>
		<input id='identifier2' type="hidden" tabindex="2" ></input>  <br>
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
 




<!-- end of home -->

</body>
</html>
