<?
require "loginstuff.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex, nofollow" />
         <script type="text/javascript" src="shortcuts.js"></script> 
        <script src="javascript/lightbox-form.js" type="text/javascript"></script>
        <script src="javascript/client-hhssave.js" type="text/javascript"></script>
		<script src="javascript/client_hh_save_settings_sendrequest.js" type="text/javascript"></script>
		<script src="javascript/client-generate-handheld-history.js" type="text/javascript"></script>
		<script src="javascript/client_sim_save_settings_sendrequest.js" type="text/javascript"></script>
        <script src="javascript/client-hh-signout-signin.js" type="text/javascript"></script>
        <script src="javascript/client-hh-save-signout-signin.js" type="text/javascript"></script>
        <script src="javascript/activate-checkboxes.js" type="text/javascript"></script>
		<script src="javascript/client-add-sim.js" type="text/javascript"></script>
		<script src="javascript/client-hh-populate-assigned.js" type="text/javascript"></script>
		<script src="javascript/jquery.js" type="text/javascript"></script>
		<script language="javascript" type="text/javascript">
		function ValidateInput(input)
		{
		var id = input.id;
		var value = input.value;

		$("#" + id).fadeOut();

		$("#" + id).removeClass('goodinput');
		$("#" + id).removeClass('badinput');

		$.post("server-validate-user.php", { inputdata: value },

		function(data)
		{
			if(data == 1)
			{
				$("#" + id).addClass('goodinput');
				
			}
			else
			{
				$("#" + id).addClass('badinput');	
			}	
			$("#" + id).fadeIn();
		});
		}

		$(document).ready(function()
		{
		var RequiredFields = new Array();
		RequiredFields[0] = "username";
		RequiredFields[1] = "email";
		RequiredFields[2] = "email_address";

		for(i=0; i < RequiredFields.length; i++)
		{
			$("#" + RequiredFields[i]).blur(function()
			{
			   ValidateInput(this);
			});
		}
		});
		
		
		function user_add_sendrequest()
		{
		
			alert('test');
		}
		</script>
        <script type="text/javascript">
            function markCalled(id) {

                document.getElementById('type').focus();
            }
            function init()
            {
                document.getElementById('type').focus();
                shortcut.add("Ctrl+s", function() {
                    markCalled("ctrl1");
                });

            }

        </script>
		<script language="javascript">
		function checkFifteen() 
		{
			var imei = document.getElementById('imei');

			if(imei.value.length == 15)
			{
			/* must be > 5, not == 5 or else the substring statement on the next line will cause 
			the function to run again if the user dismisses the alert by pressing the 'enter' key rather than clicking 'OK'. */

			imei.value= imei.value;
			// set field's value equal to first five characters.

			imei.blur()
			/* move cursor out of form element to keep it from placing itself at position zero, causing an overwrite of the first character */

			//alert(textField.value);
			
		
			document.forms[0].submit();
			}
			
		} 
		</script>
        <script type="text/javascript">

        </script>
        <title>Device Tracker - Blackberry Enterprise Resource Tracker 	<? $sql = "SELECT settings_description FROM settings WHERE settings_name = 'version'";
						$rs = mysql_query($sql, $connect);
						$fetch = mysql_fetch_assoc($rs);
						echo $fetch['settings_description'];
						?></title>
        <style type='text/css'>
            .jsLink {
                border-bottom:1px dotted #09C;
                cursor:pointer;
            }

            /* 3 col flanking menus */

			/* All the content boxes belong to the content class. */
            .content {
                position:relative; /* Position is declared "relative" to gain control of stacking order (z-index). */
                width:auto;
                min-width:400px;
                margin:0px 10px 10px 360px;
                border:1px dashed black;
                background-color:white;
                padding:0px;
                z-index:3; /* This allows the content to overlap the right menu in narrow windows in good browsers. */
            }
			
			/* All the content boxes belong to the content class. */
            .contentsim {
                position:relative; /* Position is declared "relative" to gain control of stacking order (z-index). */
                width:auto;
                min-width:800px;
                margin:0px 40px 10px 10px;
                border:1px dashed black;
                background-color:white;
                padding:0px;
                z-index:1; /* This allows the content to overlap the right menu in narrow windows in good browsers. */
            }
			
			/* All the content boxes belong to the content class. */
            .contentcenter {
                position:relative; /* Position is declared "relative" to gain control of stacking order (z-index). */
                width:auto;
                min-width:800px;
                margin:10px 10px 10px 10px;
                border:1px dashed black;
                background-color:white;
                padding:0px;
                z-index:1; /* This allows the content to overlap the right menu in narrow windows in good browsers. */
            }
			

            #navAlpha {
                position:absolute;
                width:300px;
                top:80px;
                left:20px;
                border:1px dashed black;
                background-color:#eee;
                padding:10px;
                z-index:2;
                width:300px;
            }


			
            body>#navAlpha {width:300px;}
			
			#navAlphaLeft {
                position:relative;
                width:1000px;
                top:0px;
                left:10px;
                
                background-color:#eee;
                padding:0px;
                z-index:2;
             
            }


			
          
			
			#navAlphaSim {
                position:absolute;
                width:800px;
                top:80px;
                left:40px;
                border:1px dashed black;
                background-color:#eee;
                padding:10px;
                z-index:2;
                width:800px;
            }


			
            body>#navAlphaSim {width:800px;}
			
			

        </style>
		<style type="text/css">
		<!--
		label {
		background-color: #FAFBFB;
		border-top-width: 1px;
		border-right-width: 1px;
		border-bottom-width: 1px;
		border-left-width: 1px;
		border-top-style: solid;
		border-right-style: solid;
		border-top-color: #E7EAEB;
		border-right-color: #E7EAEB;
		border-bottom-color: #E7EAEB;
		border-left-color: #E7EAEB;
		color: #6D309B;
		font-size: 10px;
		}
		input {
		background-color: #F2F4F5;
		border: 1px solid #DDE1E2;
		}
		.badinput {
		background-color: #F7E1DB;
		border: 1px solid #C76565;
		}
		.goodinput {
		background-color: #E1FFE1;
		border: 1px solid #0C0;
		}
		-->
		</style>
        <link  rel="stylesheet" type="text/css" href="css/<? $sql = "SELECT settings_description FROM settings WHERE settings_name = 'default_css'";
						$rs = mysql_query($sql, $connect);
						$fetch = mysql_fetch_assoc($rs);
						echo $fetch['settings_description'];
						?>" />
        <link type="text/css" rel="stylesheet" href="css/lightbox-form.css">

    </head>
    <?



    $sqlqty = "SELECT settings_value FROM settings WHERE settings_id = 1";
    $rsqty = mysql_query($sqlqty, $connect);
    $fetchqty = mysql_fetch_assoc($rsqty);


    ?>


    <body id="page-admin">
        <table id="pagetop" cellpadding="0" cellspacing="0">
            <tr id="branding">
                <td>
                    <a href="index.php">
                        Device Tracker - Blackberry Enterprise Resource Tracker 
						<? $sql = "SELECT settings_description FROM settings WHERE settings_name = 'version'";
						$rs = mysql_query($sql, $connect);
						$fetch = mysql_fetch_assoc($rs);
						echo $fetch['settings_description'];
						?>
                    </a>
					
                </td>
                <td align="right">
Logged in as <? echo $user ; //$workstation.$domain"; ?><!-- <a href="logout.php"> Logout</a> -->
                </td>
            </tr>

            <script type="text/javascript">
                function markCalled(id) {
                    $(id).innerHTML = "Called";
                    $(id).className = "message-success";
                }
                function init() {
     
                   
                    shortcut.add("Alt+1", function() {
                        //markCalled("alt1");
                    });
                    shortcut.add("Shift+1", function() {
                        //markCalled("shift1");
                    });
                    shortcut.add("Ctrl+Alt+1", function() {
                        //markCalled("ctrlalt1");
                    });
                    shortcut.add("Ctrl+Shift+1", function() {
                        //markCalled("ctrlshift1");
                    });
                    shortcut.add("Shift+Alt+1", function() {
                        //markCalled("shiftalt1");
                    });
                    shortcut.add("Ctrl+2", function() {
                        //markCalled("ctrl2");
                    });
                    
                    shortcut.add("Ctrl+a", function() {
                        //markCalled("ctrla");
                    },{"propagate":true});
                   
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
  <td class="tabdown"><a href="home.php" class="plain">Home</a></td>
  <td class="tabdown"><a href="handhelds.php" class="plain">Handhelds</a></td>
  <td class="tabdown"><a href="simcards.php" class="plain">SIM cards</a></td>
  <td class="tabup"><a href="admin.php" class="plain">Admin</a></td>

  </tr>
  </table></td></tr>
  <tr id="nav-secondary">
  <td align="center" class="tabs" colspan="2">

			<table cellpadding="0" cellspacing="0" align="center"><tr>
			<td class="tabdown2"><a href="loginslog.php" class="plain">Loginslog</a></td>
			<td class="tabdown2"><a href="maile.php" class="plain">Mailer</a></td>
			<td class="tabdown2"><a href="carriers.php" class="plain">Carriers</a></td>
			<td class="tabdown2"><a href="settings.php" class="plain">Settings</a></td>
			<td class="tabup"><a href="users.php" class="plain">Users</a></td>
			<td class="tabdown2"><a href="usergroups.php" class="plain">Groups</a></td>
			<td class="tabdown2"><a href="handheldadmin.php" class="plain">HH admin</a></td>
			<td class="tabdown2"><a href="simcardadmin.php" class="plain">SIM card admin</a></td>
			<td class="tabdown2"><a href="statuses.php" class="plain">Statuses</a></td>
			<td class="tabdown2"><a href="autosync.php" class="plain">Auto Sync</a></td>
			<td class="tabdown2"><a href="export.php" class="plain">Export to Excel</a></td></tr>
			</tr>
			
			</table></td></tr></table>
<?
require 'checkadmin.php';
?>
		
<form action="index.php" method="post" name="longform" onsubmit="return verify('Are you sure?')">
<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
<tr>
	<th class="asc"><a href="#">username</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=RealName&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=email&#38;dir=desc">Email</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Date Active</a></th>
	<th>&#160;</th><th>&#160;</th>
</tr>

<span class="ok" id="user_add_returned_value" >
<tr>
<th class="asc"></a>
<label>
          <br />
          <input type="text" name="username" id="username" />
</label>
</th>

<th></th>
<th>
<label>
          <br />
          <input type="email" name="email" id="email" />
</label>
</th>
<th></th>
<th><input type="email" name="email" id="email" /></th>
<th>&nbsp;</a></th>
<th>
<input type="button"  id="submit" value="Add" style="color: #6D828F; font-weight: bold" onclick="user_add_sendrequest(1);" />


</a></th>
<th>&#160;</th>
<th>&#160;</th>	
</tr>
<tr>
<th class="asc"></a>
<label>
          <br />
          <input type="text" name="validate_username" id="validate_username" />
</label>
</th>

<th></th>
<th>
<label>
          <br />
          <input type="email" name="email" id="email" />
</label>
</th>
<th></th>
<th><input type="email" name="email" id="email" /></th>
<th>&nbsp;</a></th>
<th>
<input type="button"  id="submit" value="Add" style="color: #6D828F; font-weight: bold" onclick="user_add_sendrequest(1);" />


</a></th>
<th>&#160;</th>
<th>&#160;</th>	
</tr>
</span>



<?php



$sql = "SELECT * FROM troubador_device.users WHERE isactive=1 AND email <> '' ORDER BY username";
$rs = mysql_query($sql, $connect);



while ($fetch = mysql_fetch_assoc($rs) ) 
{
	?>
	<tr>	
	<td><?=$fetch['username']?></td>
	<td>&nbsp;</td>
	<td><? echo $email = $fetch['email']?></td>

	<td>&nbsp;</td>
	<td><?=$fetch['dateActive']?></td>
	<td><a href="?event=admin&#38;step=author_edit&#38;user_id=1">Edit</a></td>
	<td><?
	// the following code checks to see if this email address is already in the list
	$sqltest = "SELECT * from devicetracker.users WHERE email = '$email' AND isactive=1" ;
	$resulttest  = mysql_query($sqltest, $connect);
	echo $num_rows = mysql_num_rows($resulttest);
	?>
	</td>
	</tr>
<?
}
?>


</table>
</form>


<form method="post" action="index.php">
<div style="margin: auto; text-align: center;">View <select name="qty" class="list" onchange="submit(this.form);">
	<option value="15">15</option>
	<option value="25" selected="selected">25</option>
	<option value="50">50</option>
	<option value="100">100</option>

</select> <input type="hidden" value="admin" name="event" /><input type="hidden" value="admin_change_pageby" name="step" />
<noscript> <input type="submit" value="Go" class="smallerbox" /></noscript></div></form>
<div style="margin: 3em auto auto auto; text-align: center;">


<p id="moniker">Logged in as <span>ardas</span><br /><a href="index.php?logout=1">Logout</a></p>

</div>
</body>
</html>