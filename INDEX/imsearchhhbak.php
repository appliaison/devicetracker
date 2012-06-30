<?
	$connect = mysql_connect('localhost', 'devicetracker', 'device');
	$select = mysql_select_db('devicetracker');
	session_start();
	if(!session_is_registered("email"))
	{
	header("location:index.php");
	}
	include 'loadsettings.php';
	$sqlreset = "DELETE FROM troubador_device.sign";
	$rs = mysql_query($sqlreset, $connect);
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
	<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow" />
<script type="text/javascript" src="shortcuts.js"></script>
<script src="javascript/lightbox-form.js" type="text/javascript"></script>
<script src="javascript/jquery-latest.js"></script>
<script src="javascript/client-hhssave.js"></script>
<script src="javascript/client-hh-signout-signin.js"></script>
<script src="javascript/client-hh-save-signout-signin.js"></script>
<script src="javascript/activate-checkboxes.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('input[type="checkbox"]').click(function() {
        var index = $(this).attr('name').substr(3);
        index--;
        $('table tr').each(function() { 
            $('td:eq(' + index + ')',this).toggle();
        });
        $('th.' + $(this).attr('name')).toggle();
    });
});
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
<script type="text/javascript">

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
margin:0px 10px 10px 360px;
border:1px dashed black;
background-color:white;
padding:0px;
z-index:3; /* This allows the content to overlap the right menu in narrow windows in good browsers. */
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


voice-family: "\"}\"";
voice-family:inherit;
width:300px;
}

body>#navAlpha {width:300px;}

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
<?



$sqlqty = "SELECT settings_value FROM settings WHERE settings_id = 1";
$rsqty = mysql_query($sqlqty, $connect);
$fetchqty = mysql_fetch_assoc($rsqty);


include 'loadsessionvariables.php';


?>
<body id="page-admin" onLoad="init()">

  <table id="pagetop" cellpadding="0" cellspacing="0">
  <tr id="branding">
  <td>
  <a href="http://svv-db:8090/devicetracker/index2.php">
  Device Tracker
  </a>
  </td>
  <td align="right">
	Logged in as <? echo $_SESSION['email']; ?><? echo $_REQUEST['type']?><a href="logout.php"> Logout</a>

	</td>
	</tr>
	  <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
			<table cellpadding="0" cellspacing="0" align="center"><tr>
	  <td valign="middle" style="width:368px">&nbsp;</td>
	  <td class="tabup"><a href="handhelds.php" class="plain">Handhelds</a></td>
	  <td class="tabdown"><a href="simcards.php" class="plain">SIM cards</a></td>	
	  <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

	  </tr>
	  </table></td></tr>
	  <tr id="nav-secondary">
	  <td align="center" class="tabs" colspan="2">

				<table cellpadding="0" cellspacing="0" align="center"><tr>
				<td class="tabup"><a href="imsearchhh.php" class="plain">Search HH</a></td>
				<td class="tabdown2"><a href="addhh.php" class="plain">Add HH</a></td>			
				<td class="tabdown2"><a href="addhhtype.php" class="plain">Add HH Type</a></td>
				<td class="tabdown2"><a href="displayhhtype.php" class="plain">Display HH Types</a></td>
				<td class="tabdown2"><a href="displayhistoryhh.php" class="plain">History</a></td>
				<td class="tabdown2"><a href="export.php" class="plain">Export to Excel</a></td></tr>
				</table>
		</td>
		</tr>

	</table>

	<!-- start of the form -->		

<div id="navAlpha" >

	<table cellpadding="0" cellspacing="0" border="0" id="list" align="left">
	<form action="<?=$_SERVER['PHP_SELF']?>" method="GET" name="longform" ">
        <tr>
		<td><a href=""><strong>Type</strong></a></td>
		
		</tr>
		<tr>	
		
		
		<td>
		<select name="type" id="type" tabindex="1">
		<option value="any">ANY</option>

		<?php

		$sql = "SELECT * FROM troubador_device.handheld_type ORDER BY type";
		$rs = mysql_query($sql, $connect);
		while ($fetch = mysql_fetch_assoc($rs))
		{
			// echo "<option value='" . $fetch['type'] . "'>" . $fetch['type'] . "</option>\n";  
			 
			if (strlen($type) > 0)
			{
				if ($_SESSION['type']== $fetch['type'])
				{ 
				echo "<option value='" . $fetch['type'] . "'" . " selected" . ">" . $fetch['type'] . "</option>\n";  
				}
				else
				{
				  echo "<option value='" . $fetch['type'] . "'>" . $fetch['type'] . "</option>\n";  
				}

			}
			else
			{
				echo "<option value='" . $fetch['type'] . "'>" . $fetch['type'] . "</option>\n";  
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
		<select name="handheld_location" tabindex="2">
		<option value="any" selected="selected" >ANY</option>

		<?php

		$sql = "SELECT name, id FROM troubador_device.location ";
		
		$rs = mysql_query($sql, $connect);
		while ($fetch = mysql_fetch_assoc($rs))
		{
		 //echo "<option value='" . $fetch['id'] . "'>" . $fetch['name'] . "</option>\n";  
		 
		 if (strlen($handheld_location) > 0)
			{
				if ($_SESSION['handheld_location']	== $fetch['id'])
				{ 
				echo "<option value='" . $fetch['handheld_location'] . "'" . " selected" . ">" . $fetch['name'] . "</option>\n";  
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

	<!-- start of assigned number -->

		<tr>
		<td><a href=""><strong>Assigned #</strong></a></td>
		</tr>
		<tr>	
		<td>
		<input value="<?=$_SESSION['assigned_num']?>" name="assigned_num" size="5" class="edit" id="assigned_num" type="text" tabindex="3">
		</td>
		
	</tr>
	<!-- end of assigned# -->
	<!-- start of assigned number -->
     <tr>
		<td><a href=""><strong>Revision #</strong></a></td>
		</tr>
		<tr>	
		<td>
		<input value="<?=$_SESSION['revision_num']?>" name="revision_num" size="20" class="edit" id="revision_num" type="text" tabindex="4">
		</td>
		
	</tr>
	<!-- end of assigned# -->
	<!-- start of pin -->
    <tr>
		<td><a href=""><strong>PIN</strong></a></td>
		</tr>
		
		<tr>	
		
		<td>
		<input value="<?=$_SESSION['pin']?>" name="pin" size="20" class="edit" id="pin" type="text" tabindex="5">
		</td>
	</tr>
	<!-- end of pin -->
	<!-- start of IMEI -->
	<tr>
		<td><a href=""><strong>IMEI</strong></a></td>
		</tr>
	<tr>	
		<td>
		<input value="<?=$_SESSION['imei']?>" name="imei" size="20" class="edit" id="imei" type="text" tabindex="6">
		
		</td>
	</tr>
	<!-- end of IMEI -->
	<!-- start of bootrom -->
    <tr>
		<td><a href=""><strong>Bootrom version</strong></a></td>
		</tr>
		<tr>	
		<td>
		<input value="<?=$bootrom_version?>" name="bootrom_version" size="20" class="edit" id="bootrom_version" type="text" tabindex="7">
		</td>
	</tr>
	<!-- end of bootroom -->
	
	<!-- start of CPR -->
	<tr>
		<td><a href=""><strong>CPR</strong></a></td>
		</tr>
	<tr>	

		<td>
		<input value="<?=$cpr?>" name="cpr" size="20" class="edit" id="cpr" type="text" tabindex="8">
		</td>
	</tr>
	<!-- end of CPR -->
	<!-- start of user -->
	<tr>
	<td><a href=""><strong>User</strong></a></td>
	</tr>
		<tr>	

		<td>
		<select name="userid" id="userid" tabindex="9">
		<option value="any">ANY</option>

		<?php

		$sql = "SELECT username, id FROM troubador_device.users WHERE isactive = 1 order by username asc";
		
		$rs = mysql_query($sql, $connect);
		while ($fetch = mysql_fetch_assoc($rs))
		{
		 //echo "<option value='" . $fetch['id'] . "'>" . $fetch['username'] . "</option>\n";  
		 
		  if (strlen($userid) > 0)
			{
				if ($_SESSION['userid']	== $fetch['id'])
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
	<!-- end of user-->
	<!-- start of available -->
		
	<tr>	
		
		<td>
		<input type="checkbox" name="hh_available_only" id="hh_available_only" 

		<?
		//if ( ($_REQUEST['hh_available_only'] =="on") or ($_SESSION['hh_available_only']) == "on" )
		if ( $hh_available_only == "on" ) 
		{
			echo 'checked ';
			$_SESSION['hh_available_only'] = $_REQUEST['hh_available_only'];
		}
		?>

		class="checkbox" tabindex="10"/><a onClick="activate_checkbox('hh_available_only')">Available Only</a>
		</td>


	</tr>
	<!-- end of available-->
	<!-- start of secure/insecure -->
	<tr>	
		
		<td>
		<input type="checkbox" name="hh_is_secure" id="hh_is_secure"

		<?
		//if ( ($_REQUEST['hh_available_only'] =="on") or ($_SESSION['hh_available_only']) )
		if ($hh_is_secure == "on") 
		{
			echo 'checked="checked"';
			//$_SESSION['hh_available_only'] = $_REQUEST['hh_available_only'];
		}
		?>

		class="checkbox" tabindex="11"/><a onClick="activate_checkbox('hh_is_secure')">Secure Only</a>

		<input type="checkbox" name="hh_is_not_secure" id="hh_is_not_secure"

		<?
		//if ( ($_REQUEST['hh_available_only'] =="on") or ($_SESSION['hh_available_only']) )
		if ($hh_is_not_secure == "on")
		{
			echo 'checked="checked"';
			//$_SESSION['hh_available_only'] = $_REQUEST['hh_available_only'];
		}
		?>

		class="checkbox" tabindex="11"/><a onClick="activate_checkbox('hh_is_not_secure')">Insecure Only</a>
		</td>



	</tr>
	<!-- end of secure / insecure-->
	
	<!-- start of corporate -->
	<tr>	
		
		<td>
		<input type="checkbox" name="hh_is_corp" id="hh_is_corp"

		<?
		//if ( ($_REQUEST['hh_available_only'] =="on") or ($_SESSION['hh_available_only']) )
		if ($hh_is_corp == "on")
		{
			echo 'checked="checked"';
			//$_SESSION['hh_available_only'] = $_REQUEST['hh_available_only'];
			
		}
		?>

		class="checkbox" tabindex="12"/><a onClick="activate_checkbox('hh_is_corp')">Corporate</a>
		</td>

	</tr>
	<!-- end of corporate-->
	<!-- start of otasl -->
	<tr>	
		
		<td>
		<input type="checkbox" name="hh_is_otasl" id="hh_is_otasl"

		<?
		//if ( ($_REQUEST['hh_available_only'] =="on") or ($_SESSION['hh_available_only']) )
		if ($hh_is_otasl == "on")
		{
			echo 'checked="checked"';
			//$_SESSION['hh_available_only'] = $_REQUEST['hh_available_only'];
		}
		?>

		class="checkbox" tabindex="13"/><a onClick="activate_checkbox('hh_is_otasl')">OTASL</a>
		</td>

	</tr>
	<!-- end of otasl-->
	
	
	
	
	<!-- start of submit -->
	<tr>

		<td><input type="submit" value="Search" name="search" class="smallerboxsp" title="search"" tabindex="14"/></td>
		<td>&nbsp;</td>
	</tr>
		

	<!-- end of submit-->
	<tr>
	</tr>
	</table>
	</form>
 </div>

<div class="content"  >
		<!-- start of right frame - search results -->
		<!-- start of block for displaying handheld using handheld_id -->
		<?
		if (strlen($_GET['handheld_id'])>0) 
		{
		   $handheld_id = $_GET['handheld_id'];

			$sql = "SELECT loc.id AS loc_id, loc.name AS loc_name, u.username AS username, hh.AssignedNumber AS AssignedNumber, "
			. " hh.RevisionNumber AS RevisionNumber, "
			. " hh.IMEI AS IMEI, "
			. " hh.bootrom AS bootrom, "
			. " hh.CPR AS CPR, " 
			. " hh.Status AS Status, "
			. " hh.Notes AS Notes "
			. " FROM troubador_device.handhelds AS hh "
			. " LEFT JOIN  devicetracker.location AS loc ON hh.loc_id = loc.id  " 
			. " LEFT JOIN devicetracker.users AS u ON u.Id = hh.userid " 
			. " WHERE hh.Id=$handheld_id  " ;
			
			$rs = mysql_query($sql, $connect);
			$num_rows = mysql_num_rows($rs);
			if ($num_rows==1)
			{
		
			$hh_type = $_REQUEST['hh_type'];
			$hh_location = $_REQUEST['hh_location'];
			$hh_assigned_num = $_REQUEST['hh_assigned_num'];
			$hh_revision_num = $_REQUEST['hh_revision_num'];
			$hh_pin = $_REQUEST['hh_pin'];
			$hh_imei = $_REQUEST['hh_imei'];
			$hh_bootrom = $_REQUEST['hh_bootrom'];
			$hh_cpr = $_REQUEST['hh_cpr'];
			$hh_notes = $_REQUEST['hh_notes'];
			$xhh_is_secure = $_REQUEST['xhh_is_secure'];
			$xhh_is_corp = $_REQUEST['xhh_is_corp'];
			$xhh_is_otasl = $_REQUEST['xhh_is_otasl'];
			$hh_userid = $_REQUEST['hh_userid'];
			
			if ($xhh_is_secure == 'on') {	$xhh_is_secure = 1; } else { $xhh_is_secure = 0; }
			if ($xhh_is_corp == 'on') { $xhh_is_corp = 1; } else { $xhh_is_corp = 0; }
			if ($xhh_is_otasl == 'on') { $xhh_is_otasl = 1; } else { $xhh_is_otasl = 0; }  
				
			
			$sqlupdate = "UPDATE devicetracker.handhelds SET type = '$hh_type', loc_id = $hh_location, AssignedNumber = $hh_assigned_num, RevisionNumber = '$hh_revision_num', PIN = '$hh_pin', "
				. " IMEI = '$imei', bootrom = '$hh_bootrom', CPR = '$hh_cpr', userid=$hh_userid, Notes = '$hh_notes', is_secure = $xhh_is_secure, is_corp = $xhh_is_corp, is_otasl = $xhh_is_otasl WHERE "
				. " Id = $handheld_id ";

			$rsupdate = mysql_query($sqlupdate, $connect);
			
			$sql = "SELECT hh.Id AS Id, loc.id AS loc_id, loc.name AS loc_name, u.username AS username, hh.AssignedNumber AS AssignedNumber, "
			. " hh.RevisionNumber AS RevisionNumber, "
			. " hh.IMEI AS IMEI, "
			. " hh.bootrom AS bootrom, "
			. " hh.CPR AS CPR, " 
			. " hh.Status AS Status, "
			. " hh.Notes AS Notes, "
			. " hh.is_secure AS is_secure, "
			. " hh.is_corp AS is_corp, "
			. " hh.is_otasl AS is_otasl "
			. " FROM troubador_device.handhelds AS hh "
			. " LEFT JOIN  devicetracker.location AS loc ON hh.loc_id = loc.id  " 
			. " LEFT JOIN devicetracker.users AS u ON u.Id = hh.userid " 
			. " WHERE hh.Id=$handheld_id  " ;
			
			$rs = mysql_query($sql, $connect);
			
			$fetch = mysql_fetch_assoc($rs);
			
			?>	<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
				<tbody width="100%">
				<tr style="background-color:#CCCCCC;">
				
				<? if ($_SESSION['hh_settings']['hh_show_assigned_num']) { echo '<th class="asc"><a href="index.php?step=list&#38;event=admin&#38;sort=email&#38;dir=desc">Asg</a></th>'; } ?>
				<? if ($_SESSION['hh_settings']['hh_show_revision_num']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Rev#</a></th>'; } ?>
				<? if ($_SESSION['hh_settings']['hh_show_pin']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">PIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></th>';} ?>
				<? if ($_SESSION['hh_settings']['hh_show_imei']) { echo '<th class="col_imei"><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">IMEI</a></th>'; } ?>
				<? if ($_SESSION['hh_settings']['hh_show_bootrom']) { echo '<th class="col_bootrom"><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Bootrom</a></th>'; } ?>
				<? if ($_SESSION['hh_settings']['hh_show_cpr']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">CPR</a></th>'; } ?>
				<? if ($_SESSION['hh_settings']['hh_show_user']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">User</a></th>'; } ?>

				<th><a href="<?=$_SERVER['PHP_SELF']?>">Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></th>
				<? if ($_SESSION['hh_settings']['hh_show_location']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Location</a></th>'; } ?>
				<? if ($_SESSION['hh_settings']['hh_show_notes']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Notes</a></th>'; } ?>
				<th class="asc"><a href="<?=$_SERVER['PHP_SELF']?>">Actions</a></th>
				</tr>
				<tr <? if ($fetch['Status']=='SIGNED OUT') { echo 'class="not-available"'; } else { echo 'class="available"';}?> >	
				<? if ($_SESSION['hh_settings']['hh_show_assigned_num']) { echo '<td>' . $fetch['AssignedNumber'] . '</td>' ; } ?>

				<? if ($_SESSION['hh_settings']['hh_show_revision_num']) { echo '<td>' . $fetch['RevisionNumber'] . '</td>'; } ?>
				
				<? if ($_SESSION['hh_settings']['hh_show_pin']) { echo '<td>' . $fetch['PIN'] . '</td>'; } ?>
				
				<? if ($_SESSION['hh_settings']['hh_show_imei']) { echo '<td>' . $fetch['IMEI'] . '</td>'; } ?>
					
				<? if ($_SESSION['hh_settings']['hh_show_bootrom']) { echo '<td>' . $fetch['bootrom'] . '</td>' ; } ?>
				
				<? if ($_SESSION['hh_settings']['hh_show_cpr']) { echo '<td>' . $fetch['CPR'] . '</td>'; } ?>
				
				<td><? echo $fetch['username']; ?></td>
				<td><? if ($fetch['Status']=='SIGNED OUT') { echo '<img src="iconimages/not_available.gif" alt="Not Available" title="Not Available">'; } else { echo '<img src="iconimages/available.gif" alt="Available" title="Available">';} ?>
				<? if (!$fetch['is_secure']) { echo '<img src="iconimages/not_secure.png" alt="Insecure" title="Insecure">'; } else { echo '<img src="iconimages/secure.png" alt="Secure" title="Secure">';} ?>
				<? if (!$fetch['is_corp']) { echo '<img src="iconimages/not_corporate.png" alt="Testing" title="Testing">'; } else { echo '<img src="iconimages/corporate.png" alt="Corporate" title="Corporate">';} ?>
				<? if (!$fetch['is_otasl']) { echo '<img src="iconimages/not_otasl.png" alt="Not OTASL" title="Not OTASL">'; } else { echo '<img src="iconimages/otasl.png" alt="OTASL" title="OTASL">';} ?>
				</td>
				<td><? echo $fetch['loc_name']; ?></td>
				<td><? echo $fetch['Notes'] ; ?></td>
				<td><a href="#" onclick="openbox(<?=$fetch['Id']?>, 1)"><img src="iconimages/action_edit.png" alt="edit" title="edit"></a>
				<input id="handheld_id" type="hidden" value="<?=$fetch['Id']?>">
				<img src="iconimages/sign_out.png" alt="sign out" title="sign out">
				<a href="#" onclick="openhistorybox(<?=$fetch['Id']?>, 1)"><img src="iconimages/action_history.png" alt="history" title="history"></a>
				</td>
				</tr>
				</tbody>
				</table>
			<?
			
			}
		
		}
		?>
		
		<!-- end of block for displaying handheld using handheld_id -->
<?



if (isset($_REQUEST['type']))
{

	if (strlen($_REQUEST['search']) > 0)
	{
	
	 ?>
		
		<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
		<tbody width="100%">
		<!-- start of dynamic rows -->	
		
		<?

		if (isset($type))
		{
					
							$query_string = $_SERVER['QUERY_STRING'];
							// create a list of device types
							$sqltypes = "SELECT * FROM troubador_device.handheld_type";
							
							$typesarray = array();
							if ($type != 'any')
							{
								$typesarray[] = $type;
							
							}
							else
							{
								$resulttypes = mysql_query($sqltypes, $connect);
								while ($fetchtypes = mysql_fetch_assoc($resulttypes))
								{
									$typesarray[] = $fetchtypes['type'];
								}
								
							}
							
							
							for ($icount=0; $icount<=sizeof($typesarray); $icount++)
							{
								
								$typesvalue = $typesarray[$icount];
								$typesdescription = $typesarray['description'];
								// open the sql query
								$sqlhh = "SELECT h.Id AS Id, h.type AS type, h.AssignedNumber AS AssignedNumber, h.RevisionNumber AS RevisionNumber, h.MB AS MB, "
								. " h.PIN AS PIN, h.ESN AS ESN, h.IMEI AS IMEI, h.Phone AS Phone, h.VoiceMailPassword AS VoiceMailPassword, h.Notes AS Notes, "
								. " h.Status AS Status, h.userid AS userid, u.username AS username, h.timestamp AS timestamp, h.bootrom AS bootrom, "
								. " h.loc_id AS loc_id, h.is_secure AS is_secure, "
								. " h.is_corp AS is_corp, h.is_otasl AS is_otasl, h.CPR AS CPR, loc.name AS loc_name "
								. " FROM troubador_device.handhelds AS h "
								. " LEFT JOIN users AS u ON u.Id=h.userid "
								. " LEFT JOIN location AS loc ON loc.id = h.loc_id "
								. " WHERE (1=1) AND (h.userid <> 248) AND h.type='$typesvalue' " ;
								
									 
								 if (isset($handheld_location))
								 {
								  if (strlen($handheld_location) > 0)
								  {		  
								   if (!($handheld_location == 'any'))
									{
									
										$sqlhh .= "	AND h.loc_id=$handheld_location ";
										
									}
								  }
								 }
								 // available_only
								 if (strlen($_SESSION['hh_available_only'])>0)
								 {
								   if ($_SESSION['hh_available_only'])
									{
										$sqlhh .= "	AND h.Status='AVAILABLE' ";
										
									}
								 }
								 // assigned_num
								 if (isset($assigned_num))
								 {
								  if (strlen($assigned_num) > 0)
								  {		  
								   if (!($assigned_num == 'any'))
									{
									
										$sqlhh .= "	AND h.AssignedNumber=$assigned_num ";
										
									}
								  }
								 }
								 
								 // revision_num
								 if (isset($revision_num))
								 {
								  if (strlen($revision_num) > 0)
								  {		  
								   if (!($revision_num == 'any'))
									{
									
										$sqlhh .= "	AND h.RevisionNumber=$revision_num ";
										
									}
								  }
								 }
								 
								 // PIN
								 if (isset($pin))
								 {
								  if (strlen($pin) > 0)
								  {		  
								   if (!($pin == ''))
									{
									
										$sqlhh .= "	AND h.PIN LIKE '$pin%' ";
										
									}
								  }
								 }
								 
								 // IMEI
								 if (isset($imei))
								 {
								  if (strlen($imei) > 0)
								  {		  
								   if (!($imei == ''))
									{
									
										$sqlhh .= "	AND h.IMEI LIKE '$imei%' ";
										
									}
								  }
								 }
								 
								 // bootrom_version
								 if (isset($bootrom_verion))
								 {
								  if (strlen($bootrom_version) > 0)
								  {		  
								   if (!($bootrom_version == ''))
									{
									
										$sqlhh .= "	AND h.bootrom LIKE '$bootrom_version%' ";
										
									}
								  }
								 }
								 
								 // CPR
								 if (isset($cpr))
								 {
								  if (strlen($cpr) > 0)
								  {		  
								   if (!($cpr == ''))
									{
									
										$sqlhh .= "	AND h.CPR LIKE '$cpr%' ";
										
									}
								  }
								 }
								 
								  // userid
								 if (isset($userid))
								 {
								  if (strlen($userid) > 0)
								  {		  
								   if (!($userid == 'any'))
									{
									
										$sqlhh .= "	AND h.userid LIKE '$userid%' ";
										
									}
								  }
								 }
								 
							    
								$sqlnum = $sqlhh;
								
								//$sqlhh .= " AND type = '$type' ";
							
								// close out the query 
								 $sqlhh .= " ORDER BY h.type ";
								 
								 $sqlhh .= " , h.AssignedNumber DESC";
								
								
								 
								 // qty
								if (strlen($_SESSION['qty']>0))
								{		
								  $sqlhh = $sqlhh . " LIMIT 0, " . $_SESSION['qty']*50 ;
									
								}
								else
								{
									$sqlhh = $sqlhh;
								}
                                

								
								$resulthh = mysql_query($sqlhh, $connect);
								$resultnum = mysql_query($sqlnum, $connect);
								$num_results = mysql_num_rows($resultnum);
								$resultscounter = 0;
								//echo "Your query returned " . $num_results . " results ";
                                if ($num_results>0)
								{
									
									?>
									<tr>
									<th><input value="Sign In/Sign Out" name="B1" onclick="opensignoutbox('test', 1)" tabindex="16" type="submit"></th>
									<th><span class="ok" id="signout_signin_returned_value" ></span></th>	
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									
									</tr>
									<tr class="thetoprow">
									<th class="bigok"><strong><? echo $typesvalue; ?> </strong></th>
									<th class="bigok"><? echo $typesdescription; ?> </th>
									<th></th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									</tr>
								
									<tr>
									<th><a href=""><strong>Select</strong></a></th>
									<?if ($_SESSION['hh_settings']['hh_show_assigned_num']) { echo '<th class="asc"><a href="imsearchhh.php?sort=asg&dir=desc">Asg</a></th>'; } ?>
									<? if ($_SESSION['hh_settings']['hh_show_revision_num']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Rev#</a></th>'; } ?>
									<? if ($_SESSION['hh_settings']['hh_show_pin']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">PIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></th>'; } ?>
									<? if ($_SESSION['hh_settings']['hh_show_imei']) { echo '<th class="col_imei"><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">IMEI</a></th>'; } ?>
									<? if ($_SESSION['hh_settings']['hh_show_bootrom']) { echo '<th class="col_bootrom"><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Bootrom</a></th>'; } ?>
									<? if($_SESSION['hh_settings']['hh_show_cpr']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">CPR</a></th>'; } ?>
									<? if($_SESSION['hh_settings']['hh_show_user']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">User</a></th>';}?>
									
									<th><a href="<?=$_SERVER['PHP_SELF']?>">Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></th>
									<? if ($_SESSION['hh_settings']['hh_show_location']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Location</a></th>' ; } ?>
									<? if ($_SESSION['hh_settings']['hh_show_notes']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Notes</a></th>'; } ?>
									<th><a href="<?=$_SERVER['PHP_SELF']?>">Actions</a></th>
									</tr>
									<?
									
									while ($fetch = mysql_fetch_assoc($resulthh))
									{
									$resultscounter++;
									?>
									<tr <? if ($fetch['Status']=='SIGNED OUT') { echo 'class="not-available"'; } else { echo 'class="available"'; } ?> >	
									<td><input type="checkbox" name="select_for_sign_out<?=$fetch['Id']?>" id="select_for_sign_out<?=$fetch['Id']?>" class="checkbox" tabindex="10" onclick="add_to_signout_signin_array(<?=$fetch['Id']?>)"/></td>
									<? if ($_SESSION['hh_settings']['hh_show_assigned_num']) { echo '<td>' . $fetch['AssignedNumber'] . '</td>' ; } ?>

									<? if ($_SESSION['hh_settings']['hh_show_revision_num']) { echo '<td>' . $fetch['RevisionNumber'] . '</td>'; } ?>
									
									<? if ($_SESSION['hh_settings']['hh_show_pin']) { echo '<td>' .  $fetch['PIN'] . '</td>'; } ?>
									
									<? if ($_SESSION['hh_settings']['hh_show_imei']) { echo '<td>' . $fetch['IMEI'] . '</td>'; } ?>
										
									<? if ($_SESSION['hh_settings']['hh_show_bootrom']) { echo '<td>' . $fetch['bootrom'] . '</td>'; } ?>
									
									<? if ($_SESSION['hh_settings']['hh_show_cpr']) { echo '<td>' . $fetch['CPR'] . '</td>' ; } ?>
									
									<td><?	echo $fetch['username']?></td>
									
									
						
									<td><? if ($fetch['Status']=='SIGNED OUT') { echo '<img src="iconimages/not_available.gif" alt="Not Available" title="Not Available">'; } else { echo '<img src="iconimages/available.gif" alt="Available" title="Available">';} ?>
									<? if (!$fetch['is_secure']) { echo '<img src="iconimages/not_secure.png" alt="Insecure" title="Insecure">'; } else { echo '<img src="iconimages/secure.png" alt="Secure" title="Secure">';} ?>
									<? if (!$fetch['is_corp']) { echo '<img src="iconimages/not_corporate.png" alt="Testing" title="Testing">'; } else { echo '<img src="iconimages/corporate.png" alt="Corporate" title="Corporate">';} ?>
									<? if (!$fetch['is_otasl']) { echo '<img src="iconimages/not_otasl.png" alt="Not OTASL" title="Not OTASL">'; } else { echo '<img src="iconimages/otasl.png" alt="OTASL" title="OTASL">';} ?>
									</td>
									
									
							
									<td><?
									
									//$loc_id = $fetch['loc_id'];
									
									//$sqllocation = "SELECT * FROM troubador_device.location WHERE id = $loc_id";
									//$resultlocation = mysql_query($sqllocation, $connect);
									//$fetchlocation = mysql_fetch_assoc($resultlocation);
									//echo $fetchlocation['name'];
									
									echo $fetch['loc_name'];
									?></td>
									<? if ($_SESSION['hh_settings']['hh_show_notes']) { echo '<td>' . substr($fetch['Notes'], 0, 90) . '</td>'; } ?>
									<td><a href="#" onclick="openbox(<?=$fetch['Id']?>, 1, '<?=$query_string?>')"><img src="iconimages/action_edit.png" alt="edit" title="edit"></a>
									<input id="handheld_id" type="hidden" value="<?=$fetch['Id']?>">
									<a href="#" onclick="opendeletebox(<?=$fetch['Id']?>, 1)"><img src="iconimages/sign_out.png" alt="sign out" title="sign out"></a>
									<a href="#" onclick="openhistorybox(<?=$fetch['Id']?>, 1)"><img src="iconimages/action_history.png" alt="history" title="history"></a>
									</td>
									</tr>
									<?
									}
								}
						}
				
		}
			?>
		<!-- end of dynamic rows -->
		</tbody>
		</table>
	  <?
	}
	
}

?>


<!-- end of right frame - search results -->
</div>
<div style="margin: 3em auto auto auto; text-align: center;">
<form method="GET" action="<?=$_SERVER['PHP_SELF']?>">
<div style="margin: auto; text-align: center;">View 

	<?
	if (strlen($_SESSION['qty'])>0) 
	{
	?>
	<select name="qty" class="list" onchange="submit(this.form);">
	<?
	for ($i=0; $i < 3; $i++)
	{
		?>
		<option value="<? echo $i; ?>" <? if ($_SESSION['qty']==$i) { echo 'selected="selected"'; }?>>
		<?
		if ($i==1) echo "50";
		else if ($i==2) echo "100";
		else echo "All";
		?>
		</option>
		<?
	}
	?>
	</select> 
	<?
	}
	else
	{
	  ?>
	  <select name="qty" class="list" onchange="submit(this.form);">
		<option value="1">50</option>
		<option value="2" selected="selected">100</option>
		<option value="0">All</option>
        </select> 
	  <?
	}
	?>
	per page<input type="hidden" value="admin" name="event" />
	
<input type="hidden" value="admin_change_pageby" name="step" /><noscript> 
<input type="submit" value="Go" class="smallerbox" /></noscript></div>
<p id="moniker">Logged in as <span><? echo $_SESSION['email']; ?> </span><br /><a href="logout.php">Logout</a>
</p>
</form>
<!-- start of overlay form -->
<div id="filter"></div>

<div id="box">
  <span id="boxtitle"></span>
  	<span class="ok" id="returned_value" ></span>
		
	<span class="ok" id="hh_save_returned_value" ></span>
	
</div>
<!-- end of overlay form -->

<!-- start of history box overlay -->
<div id="filter"></div>

<div id="historybox">
  <span id="boxtitle"></span>
	<input type="button" name="cancel" value="Cancel" onclick="closehistorybox()">
  	<span class="ok" id="history_returned_value" ></span>
  
		
	<span class="ok" id="hh_save_returned_value" ></span>
	<input type="button" name="cancel" value="Cancel" onclick="closehistorybox()">
	
</div>
<!-- end of history box overlay  -->
<!-- start of delete box overlay -->
<div id="deletebox">
  <span id="deleteboxtitle"></span>
  	<span class="ok" id="delete_returned_value" ></span>
  
		
	<span class="ok" id="delete_hh_save_returned_value" ></span>
</div>
<!-- end of delete box overlay -->

</body>
</html>

