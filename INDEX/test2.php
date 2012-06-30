<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
	<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow" />
<title>Device Tracker</title>
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
margin:20px 10px 10px 360px;
border:1px dashed black;
background-color:white;
padding:0px;
z-index:3; /* This allows the content to overlap the right menu in narrow windows in good browsers. */
}

#navAlpha {
position:absolute;
width:300px;
top:100px;
left:20px;
border:1px dashed black;
background-color:#eee;
padding:10px;
z-index:2;


voice-family: "\"}\"";
voice-family:inherit;
width:300px;
}

body>#navAlpha {width:300px;}

</style>

<link href="default.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="css/lightbox-form.css">

</head>

<body id="page-admin">
	  <table id="pagetop" cellpadding="0" cellspacing="0">
  <tr id="branding"><td>
  <a href="http://svv-db:8090/devicetracker/index2.php"><h1 id="textpattern">Textpattern</h1></a>
  </td><td id="navpop">
 <body id="page-admin">

  <form method="get" action="index.php" class="navpop" style="display: inline;">

</form>

</td></tr>
  <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
 		<table cellpadding="0" cellspacing="0" align="center"><tr>
  <td valign="middle" style="width:368px">&nbsp;</td>
  <td class="tabdown"><a href="handhelds.php" class="plain">Handhelds</a></td>
  <td class="tabup"><a href="simcards.php" class="plain">SIM cards</a></td>
  <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

  </tr>
  </table></td></tr>
  <tr id="nav-secondary">
  <td align="center" class="tabs" colspan="2">

			<table cellpadding="0" cellspacing="0" align="center"><tr>
			<td class="tabdown2"><a href="displaysim.php" class="plain">Display SIM</a></td>
			<td class="tabdown2"><a href="searchsim.php" class="plain">Search SIM</a></td>

			<td class="tabup"><a href="imsearchsim.php" class="plain">Search SIM(im)</a></td>
			<td class="tabdown2"><a href="signoutsim.php" class="plain">Sign-out SIM</a></td>
			<td class="tabdown2"><a href="signinsim.php" class="plain">Sign-in SIM</a></td>
			<td class="tabdown2"><a href="addsim.php" class="plain">Add SIM</a></td>
			<td class="tabdown2"><a href="editsim.php" class="plain">Edit SIM</a></td>
			<td class="tabdown2"><a href="removesim.php" class="plain">Remove SIM</a></td>

			
			</table></td></tr></table>

<div id="navAlpha">	
<!-- start of the form -->		
<form action="/devicetracker/imsearchsim.php" method="post" name="longform" ">
<table cellpadding="0" cellspacing="0" border="0" id="list" align="left">
<tr>
		<td><a href=""><strong>Carrier</strong></a></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>

		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		
</tr>
<tr>
	<td>
	<select name="sim_carrier">
	<option value="any">ANY</option>

	SELECT * FROM troubador_device.sim_carrier ORDER BY ID<option value='Microcell'>Microcell</option>
<option value='Rogers'>Rogers</option>
<option value='T-Mobile'>T-Mobile</option>
<option value='Telus'>Telus</option>
<option value='Nextel'>Nextel</option>
<option value='Motorola'>Motorola</option>
<option value='Telcel'>Telcel</option>
<option value='Fido'>Fido</option>

<option value='Cincinnati Bell'>Cincinnati Bell</option>
<option value='Vodafone UK'>Vodafone UK</option>
<option value='AT&T'>AT&T</option>
    
	</select>	
	</td>
	<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>

		<td>&nbsp;</td>
		<td>&nbsp;</td>
</tr>
</table>
</form>
</div>
<!-- end of left frame -->

<div class="content">
<!-- start of right frame -->

</div>
<!-- end of right frame -->


<div style="margin: 3em auto auto auto; text-align: center;">


<p id="moniker">Logged in as <span>ardas@rim.com </span><br /><a href="logout.php">Logout</a></p>
<p id="moniker">Logged in as <span>ardas@rim.com </span><br /><a href="logout.php">Logout</a></p>
<br>-------------<br><pre>Array
(
    [PHPSESSID] => ce857e09d6b7d29248a5fa123f76df83
    [JSESSIONID] => 20BC9A4107D8488F81BABB5A1BF352DF
)
</pre>ardas@rim.comardas
</div>
</body>
</html>