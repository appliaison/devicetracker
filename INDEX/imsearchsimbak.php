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
<script type="text/javascript" src="shortcuts.js"></script>
<script src="lightbox-form.js" type="text/javascript"></script>
<script type="text/javascript">
function markCalled(id) {

	document.getElementById('sim_carrier').focus();
}
function init() 
{
	document.getElementById('sim_carrier').focus();
	shortcut.add("Ctrl+s", function() {
	markCalled("ctrl1");		
	});
	


}

</script>
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
margin:8px 10px 10px 320px;
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

body>#navAlpha {width:270px;}

</style>

<link href="default.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="css/lightbox-form.css">

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
<body id="page-admin" onLoad="init()">
	  <table id="pagetop" cellpadding="0" cellspacing="0">
  <tr id="branding"><td>
  <a href="http://svv-db:8090/devicetracker/index2.php"><h1 id="textpattern">Textpattern</h1></a>
  </td><td id="navpop">
 <? 
$sqlqty = "SELECT settings_value FROM settings WHERE settings_id = 1";
$rs = mysql_query($sqlqty, $connect);
$fetch = mysql_fetch_assoc($rs);

// qty
if (strlen($_POST['qty']) > 0)
{
  $qty = $_POST['qty'];
  $_SESSION['qty'] = $qty;
}
else
{
  
  if (!(strlen($_SESSION['qty'])>0))
  {	
	$qty = $fetch['settings_value'];
	$_SESSION['qty'] = $fetch['settings_value'];
  }
  
}

// sim_carrier
if (strlen($_POST['sim_carrier']) > 0)
{
  $sim_carrier = $_POST['sim_carrier'];
  $_SESSION['sim_carrier'] = $sim_carrier;
}
else
{
  $sim_carrier = $_SESSION['sim_carrier'];
}
// sim_location
if (strlen($_POST['sim_location']) > 0)
{
 echo $sim_location = $_POST['sim_location'];
  $_SESSION['sim_location'] = $sim_location;
}
else
{
  $sim_location = $_SESSION['sim_location'];
}

// sim_imsi
if (strlen($_POST['sim_imsi']) > 0)
{
 echo $sim_imsi = $_POST['sim_imsi'];
  $_SESSION['sim_imsi'] = $sim_imsi;
}
else
{
  $sim_imsi = $_SESSION['sim_imsi'];
}
// sim_msisdn
if (strlen($_POST['sim_msisdn']) > 0)
{
 echo $sim_msisdn = $_POST['sim_msisdn'];
  $_SESSION['sim_msisdn'] = $sim_msisdn;
}
else
{
  $sim_msisdn = $_SESSION['sim_msisdn'];
}

// user_id
if (strlen($_POST['sim_user_id']) > 0)
{
 echo $sim_user_id = $_POST['sim_user_id'];
  $_SESSION['sim_user_id'] = $sim_user_id;
}
else
{
  $sim_user_id = $_SESSION['sim_user_id'];
}



?>
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
			<td class="tabdown2"><a href="displaysim-sorted.php" class="plain">Display SIM</a></td>
			<td class="tabup"><a href="imsearchsim.php" class="plain">Search SIM(im)</a></td>
			<td class="tabdown2"><a href="signoutsim.php" class="plain">Sign-out SIM</a></td>
			<td class="tabdown2"><a href="signinsim.php" class="plain">Sign-in SIM</a></td>
			<td class="tabdown2"><a href="addsim.php" class="plain">Add SIM</a></td>
			<td class="tabdown2"><a href="editsim.php" class="plain">Edit SIM</a></td>
			<td class="tabdown2"><a href="removesim.php" class="plain">Remove SIM</a></td>
			
			</table></td></tr></table>

<div id="navAlpha">	
	<table cellpadding="0" cellspacing="0" border="0" id="list" align="left">
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post" name="longform" ">
        <tr>
		<td><a href=""><strong>Carrier</strong></a></td>
		
		</tr>
		<tr>	
		
		
		<td>
	<select name="sim_carrier" id="sim_carrier" tabindex="1">
	<option value="any">ANY</option>

	<?php

	echo $sql = "SELECT * FROM troubador_device.sim_carrier ORDER BY ID";
	$rs = mysql_query($sql, $connect);
	while ($fetch = mysql_fetch_assoc($rs))
	{
	  if (strlen($sim_carrier) > 0)
	  {
		   if ($_SESSION['sim_carrier']	== $fetch['CarrierName'])
		   { 
			echo "<option value='" . $fetch['CarrierName'] . "'" . " selected" . ">" . $fetch['CarrierName'] . "</option>\n";  
			}
			else
			{
			  echo "<option value='" . $fetch['CarrierName'] . "'>" . $fetch['CarrierName'] . "</option>\n";  
			}
		
	   }
	   else
	   {
	    echo "<option value='" . $fetch['CarrierName'] . "'>" . $fetch['CarrierName'] . "</option>\n";  
	   }
	   
	 }
	
	?>
    
	</select>
	
		
		</td>

	</tr>
	<!-- start of location -->

		<tr>	
		<tr>
		<td><a href=""><strong>Location</strong></a></td>
		</tr>	
		<td>
			<select name="sim_location" id="sim_location" tabindex="2">
	<option value="any" selected="selected" >ANY</option>

	<?php

	$sql = "SELECT name, id FROM troubador_device.location ";
	
	$rs = mysql_query($sql, $connect);
	while ($fetch = mysql_fetch_assoc($rs))
	{
	
	 
	 if (strlen($sim_carrier) > 0)
	  {
		   if ($_SESSION['sim_location'] == $fetch['id'])
		   { 
		    echo "<option value='" . $fetch['id'] . "'" . " selected" . ">" . $fetch['name'] . "</option>\n";  
			
			}
			else
			{
			  echo "<option value='" . $fetch['id'] . "'>" . $fetch['name'] . "</option>\n";  
			}
		
	   }
	   else
	   {
	    echo "<option value='" . $fetch['id'] . "'>" . $fetch['name'] . "</option>\n";  
	   }
	   
	 
	 
	 }
	
	?>
    
</select>
		
		</td>
	</tr>

	<!-- end of location -->

	<!-- start of IMSI -->

		<tr>
		<td><a href=""><strong>IMSI</strong></a></td>
		</tr>
		<tr>	
		<td>
		<input value="<? echo $_SESSION['sim_imsi']; ?>" name="sim_imsi" size="20" class="edit" id="sim_imsi" type="text" tabindex="3">
		</td>
		
	</tr>
	<!-- end of IMSI -->
	<!-- start of MSISDN -->
     <tr>
		<td><a href=""><strong>MSISDN</strong></a></td>
		</tr>
		<tr>	
		<td>
		<input value="<? echo $_SESSION['sim_msisdn']; ?>" name="sim_msisdn" size="20" class="edit" id="sim_msisdn" type="text" tabindex="4">
		</td>
		
	</tr>
	<!-- end of MSISDN -->
	<!-- start of Assigned To  -->
    <tr>
		<td><a href=""><strong>Assigned To</strong></a></td>
		</tr>
		
		<tr>	
		
		<td>
			<select name="sim_user_id" id="sim_user_id" tabindex="5">
			<option value="0">ANY</option>

			<?php

			$sql = "SELECT username, id FROM troubador_device.users WHERE isactive = 1 AND email <> '' order by username asc";

			$rs = mysql_query($sql, $connect);
			while ($fetch = mysql_fetch_assoc($rs))
			{


			if (strlen($sim_user_id) > 0)
			{
			if ($_SESSION['sim_user_id'] == $fetch['id'])
			{ 
			echo "<option value='" . $fetch['id'] . "'" . " selected" . ">" . $fetch['username'] . "</option>\n";  

			}
			else
			{
			  echo "<option value='" . $fetch['id'] . "'>" . $fetch['username'] . "</option>\n";  
			}

			}
			else
			{
			echo "<option value='" . $fetch['id'] . "'>" . $fetch['username'] . "</option>\n";  
			}

			}

			?>

			</select>
		</td>
	</tr>
	<!-- end of Assigned To -->

	<!-- start of available -->
	</table>	
	
		<span style="position:relative; left:0px; top:0px;">
		
		<input type="checkbox" name="sim_available_only"  id="sim_available_only" class="checkbox" 
		<? if (($_POST['sim_available_only'] =="on") or ($_SESSION['sim_available_only']) )
		{ 
			echo 'checked="checked"'; 
			$_SESSION['sim_available_only'] = $_POST['sim_available_only'];
		} 
	
		?> tabindex="5"/><a href="">Available Only</a>
		</span>
		<div style="position:relative; left:150px; top:-20px;">
		<input type="checkbox" name="sim_conference_call"  id="sim_conference_call" class="checkbox" 
		<? if (($_POST['sim_available_only'] =="on") or ($_SESSION['sim_available_only']) )
		{ 
			echo 'checked="checked"'; 
			$_SESSION['sim_available_only'] = $_POST['sim_available_only'];
		} 
	
		?>tabindex="6"/><a href="">Conference Call</a>
		</div>

	
	<!-- end of available-->
	<!-- start of conference call -->

		<div style="position:relative; left:0px; top:-10px;">
		<input type="checkbox" name="sim_international_call" id="sim_international_call" class="checkbox"
		<?
		if ( ($_POST['sim_conference_call'] =="on") or ($_SESSION['sim_conference_call']) )
		{
			echo 'checked="checked"';
			$_SESSION['sim_conference_call'] = $_POST['sim_conference_call'];
		}
		?> tabindex="7"/> <a href="">International Call</a>
		</div>
		<div style="position:relative; left:150px; top:-30px;">
		


		<input type="checkbox" name="sim_call_forwarding"  id="sim_call_forwarding" class="checkbox" 
		<? if (($_POST['sim_available_only'] =="on") or ($_SESSION['sim_available_only']) )
		{ 
			echo 'checked="checked"'; 
			$_SESSION['sim_available_only'] = $_POST['sim_available_only'];
		} 
	
		?> tabindex="8"/><a href="">Call Forwarding</a>
		</div>
		

	<!-- end of conference call-->
	
	<!-- start of international call -->

		<div style="position:relative; left:0px; top:-20px;">
		<input type="checkbox" name="sim_call_barring"  id="sim_call_barring" class="checkbox"
		<?
		if ( ($_POST['sim_international_call'] =="on") or ($_SESSION['sim_international_call']) )
		{
			echo 'checked="checked"';
			$_SESSION['sim_international_call'] = $_POST['sim_international_call'];
		}
		?> tabindex="9" /><a href="">Call Barring</a>
		
		</div>
		<div style="position:relative; left:150px; top:-40px;">
		<input type="checkbox" name="sim_call_waiting"  id="sim_call_waiting" class="checkbox" 
		<? if (($_POST['sim_available_only'] =="on") or ($_SESSION['sim_available_only']) )
		{ 
			echo 'checked="checked"'; 
			$_SESSION['sim_available_only'] = $_POST['sim_available_only'];
		} 
	
		?> tabindex="10"/><a href="">Call Waiting</a>
		</div>

	<!-- end of international call-->
	<!-- start of call forwarding -->

	<div style="position:relative; left:0px; top:-30px;">
		<input type="checkbox" name="sim_voicemail"  id="sim_voicemail" class="checkbox" 
	<?
	if ( ($_POST['sim_call_forwarding'] =="on") or ($_SESSION['sim_call_forwarding']) ) 
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_forwarding'] = $_POST['sim_call_barring'];
	}
	?> tabindex="11"/><a href="">Voice Mail</a>
	</div>
	<div style="position:relative; left:150px; top:-50px;">
		<input type="checkbox" name="sim_telenav"  id="sim_telenav" class="checkbox" 
		<? if (($_POST['sim_available_only'] =="on") or ($_SESSION['sim_available_only']) )
		{ 
			echo 'checked="checked"'; 
			$_SESSION['sim_available_only'] = $_POST['sim_available_only'];
		} 
	
		?> tabindex="12"/><a href="">Telenav</a>
	</div>
		

	<!-- end of call forwarding-->
	<!-- start of call barring -->

	<div style="position:relative; left:0px; top:-40px;">
		<input type="checkbox" name="sim_als"  id="sim_als" class="checkbox" 
	<?
	if ( ($_POST['sim_call_barring'] =="on") or ($_SESSION['sim_call_barring'] ) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_barring'] = $_POST['sim_call_barring'];
	}
	?> tabindex="13"/><a href="">ALS</a>
	</div>
		<div style="position:relative; left:150px; top:-60px;">
		<input type="checkbox" name="sim_modem"  id="sim_modem" class="checkbox" 
		<? if (($_POST['sim_available_only'] =="on") or ($_SESSION['sim_available_only']) )
		{ 
			echo 'checked="checked"'; 
			$_SESSION['sim_available_only'] = $_POST['sim_available_only'];
		} 
	
		?> tabindex="14"/><a href="">Modem</a>
	</div>
	
	<!-- end of call barring-->
	<!-- start of call waiting -->
	<div style="position:relative; left:0px; top:-50px;">
		<input type="checkbox" name="sim_plmn"  id="sim_plmn" class="checkbox" 
	<?
	if ( ($_POST['sim_call_waiting'] =="on") or ($_SESSION['sim_call_waiting']) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_waiting'] = $_POST['sim_call_waiting'];
	}
	?> tabindex="15"/><a href="">PLMN</a>
	</div>
		<!-- start of voicemail -->
		<div style="position:relative; left:150px; top:-70px;">
		<input type="checkbox" name="sim_myfaves"  id="sim_myfaves" class="checkbox" 
	<?
	if ( ($_POST['sim_call_barring'] =="on") or ($_SESSION['sim_call_barring'] ) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_barring'] = $_POST['sim_call_barring'];
	}
	?> tabindex="16"/><a href="">MyFaves</a>
	</div>
	
	
	<!-- end of call waiting-->
	<!-- start of voicemail -->
	<div style="position:relative; left:0px; top:-60px">
		<input type="checkbox" name="sim_sms"  id="sim_sms" class="checkbox" 
	<?
	if ( ($_POST['sim_call_waiting'] =="on") or ($_SESSION['sim_call_waiting']) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_waiting'] = $_POST['sim_call_waiting'];
	}
	?> tabindex="17" /><a href="">SMS</a>
	</div>	
	<!-- end of call waiting -->
	
	
	<!-- start of voicemail -->
		<div style="position:relative; left:150px; top:-80px;">
		<input type="checkbox" name="sim_voice_only"  id="sim_voice_only" class="checkbox" 
	<?
	if ( ($_POST['sim_call_barring'] =="on") or ($_SESSION['sim_call_barring'] ) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_barring'] = $_POST['sim_call_barring'];
	}
	?> tabindex="18"/><a href="">Voice Only</a>
	</div>
	
	<!-- start of data only, corp -->
	<div style="position:relative; left:0px; top:-70px">
		<input type="checkbox" name="sim_data_only"  id="sim_data_only" class="checkbox" 
	<?
	if ( ($_POST['sim_call_waiting'] =="on") or ($_SESSION['sim_call_waiting']) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_waiting'] = $_POST['sim_call_waiting'];
	}
	?> tabindex="19"/><a href="">Data Only</a>
	</div>
	<div style="position:relative; left:150px; top:-90px;">
	<input type="checkbox" name="sim_corporate"  id="sim_corporate" class="checkbox" 
	<?
	if ( ($_POST['sim_call_barring'] =="on") or ($_SESSION['sim_call_barring'] ) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_barring'] = $_POST['sim_call_barring'];
	}
	?> tabindex="20"/><a href="">Corporate</a>
	</div>
	<!-- end of data only, corp -->
	<!-- start of data only, corp -->
	<div style="position:relative; left:0px; top:-80px">
		<input type="checkbox" name="sim_wispr"  id="sim_wispr" class="checkbox" 
	<?
	if ( ($_POST['sim_call_waiting'] =="on") or ($_SESSION['sim_call_waiting']) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_waiting'] = $_POST['sim_call_waiting'];
	}
	?> tabindex="21" /><a href="">WISPr</a>
	</div>
	<div style="position:relative; left:150px; top:-100px;">
	<input type="checkbox" name="sim_personx"  id="sim_personx" class="checkbox" 
	<?
	if ( ($_POST['sim_call_barring'] =="on") or ($_SESSION['sim_call_barring'] ) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_barring'] = $_POST['sim_call_barring'];
	}
	?> tabindex="22"/><a href="">Talk to person X</a>
	</div>
	<!-- end of data only, corp -->
	
	<!-- start of submit -->
	<div style="position:relative; left:0px; top:-80px;">
	<input type="submit" value="Search" name="search" class="smallerboxsp" title="search"" tabindex="23"/>
	</div>
	<!-- end of submit-->

	</form>
</div>
<!-- end of left frame -->

<div class="content">
<!-- start of right frame -->

<?

	if (strlen($_POST['search']) > 0)
	{
	 echo $sim_carrier= $_REQUEST['sim_carrier'];
	 echo $sim_location = $_REQUEST['sim_location'];
	 echo $sim_imsi = $_REQUEST['sim_imsi'];
	 echo $sim_msisdn = $_REQUEST['sim_msisdn'];
	 echo $sim_user_id = $_REQUEST['sim_user_id'];
	 
	 
	 //echo $handheld_location = $_REQUEST['handheld_location'];
	 ?>
		<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
		<tr>


		<th><a href="index.php?step=list&#38;event=admin&#38;sort=email&#38;dir=desc">ICCID</a></th>

		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">ID</a></th>

		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Status</a></th>

		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">User</a></th>

		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">IMSI</a></th>

		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Notes</a></th>
	
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Sign out</a></th>

		
		<th>&#160;</th><th>&#160;</th></tr>
		
		<!-- start of dynamic rows -->	
		<?
		//echo $sqlhh = "SELECT * FROM troubador_device.handhelds WHERE type='$type' AND loc_id=$handheld_location";
		//echo $sqlhh = "SELECT * FROM troubador_device.simcards22 WHERE Carrier='$sim_carrier'";
		
		// start building out the sql query here 
		
		$sqlsim = "SELECT * FROM simcards22 WHERE (1=1) " ;
		

		if (isset($_SESSION['sim_carrier']))
		{	
			if (!($_SESSION['sim_carrier'] == 'any'))
			{
			$sqlsim .= " AND Carrier LIKE '%$sim_carrier%' " ;
			}
		}
		
		if (isset($_SESSION['sim_user_id']))
		{
			if (!($_SESSION['sim_user_id'] == 0))
			{
			$sqlsim .= " AND user_id=$sim_user_id ";
			}
		}
		
		if (isset($_SESSION['sim_location']))
		{
			if (!isset($_SESSION['sim_location']))
			{
				$sqlsim .= " AND IMSI LIKE '%$sim_imsi%' AND loc_id=$sim_location ";
			}
		}
		
		
		// end building out the sql query here 
		
		$resultsim = mysql_query($sqlsim, $connect);
		while ($fetch = mysql_fetch_assoc($resultsim))
		{
		?>
		<tr>	

		<td><? if (strlen($fetch['ICCID'])>0){ echo $fetch['ICCID'];} else { echo 'NOVAL'; } ?></td>

		

		<td><?if (strlen($fetch['ID']) > 0) { echo $fetch['ID']; } else { echo 'NOVAL'; } ?></td>
		

		<td><?
		$user_id = $fetch['user_id'];
		$sqluser = "SELECT * FROM users WHERE Id = $user_id";
		$resultuser = mysql_query($sqluser, $connect);
		$fetchuser = mysql_fetch_assoc($resultuser);
		
		//echo $fetchuser['username'];
		echo $fetch['Assigned_To'];
		?></td>
		

		<td><? echo $fetchuser['email']; ?></td>
		

		<td><?=$fetch['IMSI']?></td>
		

		<td><?echo $fetch['Notes']?></td>
		<td><?echo $fetch['Sign_out']?></td>
	


		</tr>
		<?
		}
		?>
		<!-- end of dynamic rows -->
		</table>
	  <?
	}
	

?>
</div>
<!-- end of right frame -->


<div style="margin: 3em auto auto auto; text-align: center;">


<?
include 'footer.php';

?>