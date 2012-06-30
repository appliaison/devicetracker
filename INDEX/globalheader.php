
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
		