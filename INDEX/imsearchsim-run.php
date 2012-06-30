<?
require "loginstuff.php";
require 'globalheader.php';
//include 'loadsessionvariables.php';
include 'loadsimsessionvariables.php';
$query_string = $_SERVER['QUERY_STRING'];

?>

  <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
 		<table cellpadding="0" cellspacing="0" align="center"><tr>
  <td valign="middle" style="width:368px">&nbsp;</td>
  <td class="tabdown"><a href="home.php" class="plain">Home</a></td>
  <td class="tabdown"><a href="index.php" class="plain">Handhelds</a></td>
  <td class="tabup"><a href="simcards.php" class="plain">SIM cards</a></td>
  <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>
  <td class="tabdown"><a href="superadmin.php" class="plain">Superadmin</a></td>

  </tr>
  </table></td></tr>
  <tr id="nav-secondary">
  <td align="center" class="tabs" colspan="2">

			<table cellpadding="0" cellspacing="0" align="center">
			<tr>
                    <!-- <td class="tabdown2"><a href="displaysim-sorted.php" class="plain">Display SIM</a></td>-->
						<td class="tabup"><a href="imsearchsim-run.php" class="plain">Search SIM</a></td>
						<td class="tabdown2"><a href="quicksearchsim.php" class="plain">Quicksearch</a></td>
						 <td class="tabdown2"><a href="qsigninsim.php" class="plain">Quicksignin</a></td>
						 <td class="tabdown2"><a href="qsignoutsim.php" class="plain">Quicksignout</a></td>
						<td class="tabdown2"><a href="addsim.php" class="plain">Add SIM</a></td>
						<td class="tabdown2"><a href="displayhistorysim.php" class="plain">History</a></td>
						
			
			</table>
			</td>
			</tr>
			
			</table>

			
			
			
<div id="navAlpha">	
<?
	

	?>
	<table cellpadding="0" cellspacing="0" border="0" id="list" align="left">
						
							
	<form action="<?=$_SERVER['PHP_SELF']?>" method="GET" name="longform">
        <tr>
		<td><label>Carrier</label></td>
		
		</tr>
		<tr>	
		
		
		<td>
	<select name="sim_carrier" id="sim_carrier" tabindex="1">
	<option value="any">ANY</option>

	<?php

	$sql = "SELECT * FROM sim_carrier ORDER BY CarrierName";
	$rs = mysql_query($sql, $connect);
	while ($fetch = mysql_fetch_assoc($rs))
	{
	  if (strlen($sim_carrier) > 0)
	  {
		   if ($_REQUEST['sim_carrier']	== $fetch['CarrierName'])
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
		<td><label>Location</label></td>
		</tr>	
		<td>
			<select name="sim_location" id="sim_location" tabindex="2">
	<option value="0" selected="selected" >ANY</option>

	<?php

	$sql = "SELECT name, id FROM troubador_device.location ";
	
	$rs = mysql_query($sql, $connect);
	while ($fetch = mysql_fetch_assoc($rs))
	{
	
	 
	 if (strlen($sim_carrier) > 0)
	  {
		   if ($_REQUEST['sim_location'] == $fetch['id'])
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
		<!-- start of ICCID -->

		<tr>
		<td><label>ICCID</label></td>
		</tr>
		<tr>	
		<td>
		<input value="<? if (isset($_REQUEST['sim_iccid'])) echo $_REQUEST['sim_iccid']; ?>" name="sim_iccid" size="25" class="edit" id="sim_iccid" type="text" tabindex="3">
		</td>
		
	</tr>
	<!-- end of ICCID -->

	<!-- start of IMSI -->

		<tr>
		<td><label>IMSI</label></td>
		</tr>
		<tr>	
		<td>
		<input value="<? if (isset($_REQUEST['sim_imsi'])) echo $_REQUEST['sim_imsi']; ?>" name="sim_imsi" size="25" class="edit" id="sim_imsi" type="text" tabindex="4">
		</td>
		
	</tr>
	<!-- end of IMSI -->
	<!-- start of MSISDN -->
     <tr>
		<td><label>MSISDN</label></td>
		</tr>
		<tr>	
		<td>
		<input value="<? if (isset($_REQUEST['sim_msisdn'])) echo $_REQUEST['sim_msisdn']; ?>" name="sim_msisdn" size="25" class="edit" id="sim_msisdn" type="text" tabindex="5">
		</td>
		
	</tr>
	<!-- end of MSISDN -->
	<!-- start of Assigned To  -->
    <tr>
		<td><label>Assigned To</label></td>
		</tr>
		
		<tr>	
		
		<td>
			<select name="sim_user_id" id="sim_user_id" tabindex="6">
			<option value="0">ANY</option>

			<?php

			$sql = "SELECT username, id FROM troubador_device.users WHERE (isactive = 1 AND email <> '') OR (username LIKE '%OTASL%')  order by username asc";

			$rs = mysql_query($sql, $connect);
			while ($fetch = mysql_fetch_assoc($rs))
			{


			if (strlen($sim_user_id) > 0)
			{
			if ($_REQUEST['sim_user_id'] == $fetch['id'])
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

	
	</table>	
	
		<span style="position:relative; left:0px; top:0px;">
		<!-- start of available -->
		<input type="checkbox" name="sim_available_only"  id="sim_available_only" class="checkbox" 
		<? if (($_REQUEST['sim_available_only'] =="on") or ($_REQUEST['sim_available_only']) )
		{ 
			echo 'checked="checked"'; 
			$_REQUEST['sim_available_only'] = $_REQUEST['sim_available_only'];
		} 
	
		?> tabindex="7"/><label>Available Only</label>
		<!-- end of available-->
		</span>
		
		
		
		
		<div style="position:relative; left:150px; top:-20px;">
		<!-- end of conferencecall-->
		<input type="checkbox" name="sim_conference_call"  id="sim_conference_call" class="checkbox" 
		<? if (($_REQUEST['sim_conference_call'] =="on") or ($_REQUEST['sim_conference_call']) )
		{ 
			echo 'checked="checked"'; 
			$_REQUEST['sim_conference_call'] = $_REQUEST['sim_conference_call'];
		} 
	
		?>tabindex="8"/><label>Con Call (CON)</label>
		<!-- end of conferencecall-->
		</div>

	
		<div style="position:relative; left:0px; top:-10px;">
		<!-- start of internationalcall-->
		<input type="checkbox" name="sim_international_call" id="sim_international_call" class="checkbox"
		<?
		if ( ($_REQUEST['sim_international_call'] =="on") or ($_REQUEST['sim_international_call']) )
		{
			echo 'checked="checked"';
			$_REQUEST['sim_international_call'] = $_REQUEST['sim_international_call'];
		}
		?> tabindex="9"/> <label>Intl Call (INT)</label>
		<!-- end of internationalcall-->
		</div>
		<div style="position:relative; left:150px; top:-30px;">
		

		<!-- start of callforwarding-->
		<input type="checkbox" name="sim_call_forwarding"  id="sim_call_forwarding" class="checkbox" 
		<? if (($_REQUEST['sim_call_forwarding'] =="on") or ($_REQUEST['sim_call_forwarding']) )
		{ 
			echo 'checked="checked"'; 
			$_REQUEST['sim_call_forwarding'] = $_REQUEST['sim_call_forwarding'];
		} 
	
		?> tabindex="10"/><label>Call Fwding (FWD)</label>
		<!-- end of callforwarding-->
		</div>
		

	<!-- end of conference call-->
	
	<!-- start of international call -->

		<div style="position:relative; left:0px; top:-20px;">
		<input type="checkbox" name="sim_call_barring"  id="sim_call_barring" class="checkbox"
		<?
		if ( ($_REQUEST['sim_call_barring'] =="on") or ($_REQUEST['sim_call_barring']) )
		{
			echo 'checked="checked"';
			$_REQUEST['sim_call_barring'] = $_REQUEST['sim_call_barring'];
		}
		?> tabindex="9" /><label>Call Barring (BARR)</label>
		
		</div>
		<div style="position:relative; left:150px; top:-40px;">
		<input type="checkbox" name="sim_call_waiting"  id="sim_call_waiting" class="checkbox" 
		<? if (($_REQUEST['sim_call_waiting'] =="on") or ($_REQUEST['sim_call_waiting']) )
		{ 
			echo 'checked="checked"'; 
			$_REQUEST['sim_call_waiting'] = $_REQUEST['sim_call_waiting'];
		} 
	
		?> tabindex="11"/><label>Call Waiting (WAIT)</label>
		</div>

	<!-- end of international call-->
	<!-- start of call forwarding -->

	<div style="position:relative; left:0px; top:-30px;">
		<input type="checkbox" name="sim_voicemail"  id="sim_voicemail" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_forwarding'] =="on") or ($_REQUEST['sim_call_forwarding']) ) 
	{
		echo 'checked="checked"';
		$_REQUEST['sim_call_forwarding'] = $_REQUEST['sim_call_barring'];
	}
	?> tabindex="12"/><label>Voice Mail (VMAIL)</label>
	</div>
	<div style="position:relative; left:150px; top:-50px;">
		<input type="checkbox" name="sim_telenav"  id="sim_telenav" class="checkbox" 
		<? if (($_REQUEST['sim_telenav'] =="on") or ($_REQUEST['sim_telenav']) )
		{ 
			echo 'checked="checked"'; 
			$_REQUEST['sim_telenav'] = $_REQUEST['sim_telenav'];
		} 
	
		?> tabindex="13"/><label>Telenav (TELENAV)</label>
	</div>
		

	<!-- end of call forwarding-->
	<!-- start of call barring -->

	<div style="position:relative; left:0px; top:-40px;">
		<input type="checkbox" name="sim_als"  id="sim_als" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_barring'] =="on") or ($_REQUEST['sim_call_barring'] ) )
	{
		echo 'checked="checked"';
		$_REQUEST['sim_call_barring'] = $_REQUEST['sim_call_barring'];
	}
	?> tabindex="14"/><label>ALS (ALS)</label>
	</div>
		<div style="position:relative; left:150px; top:-60px;">
		<input type="checkbox" name="sim_modem"  id="sim_modem" class="checkbox" 
		<? if (($_REQUEST['sim_modem'] =="on") or ($_REQUEST['sim_modem']) )
		{ 
			echo 'checked="checked"'; 
			$_REQUEST['sim_modem'] = $_REQUEST['sim_modem'];
		} 
	
		?> tabindex="15"/><label>Modem (MODEM)</label>
	</div>
	
	<!-- end of call barring-->
	<!-- start of call waiting -->
	<div style="position:relative; left:0px; top:-50px;">
		<input type="checkbox" name="sim_plmn"  id="sim_plmn" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_waiting'] =="on") or ($_REQUEST['sim_call_waiting']) )
	{
		echo 'checked="checked"';
		$_REQUEST['sim_call_waiting'] = $_REQUEST['sim_call_waiting'];
	}
	?> tabindex="16"/><label>PLMN (PLMN)</label>
	</div>
		<!-- start of voicemail -->
		<div style="position:relative; left:150px; top:-70px;">
		<input type="checkbox" name="sim_myfaves"  id="sim_myfaves" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_barring'] =="on") or ($_REQUEST['sim_call_barring'] ) )
	{
		echo 'checked="checked"';
		$_REQUEST['sim_call_barring'] = $_REQUEST['sim_call_barring'];
	}
	?> tabindex="17"/><label>MyFaves (MYFAVES)</label>
	</div>
	
	
	<!-- end of call waiting-->
	<!-- start of voicemail -->
	<div style="position:relative; left:0px; top:-60px">
		<input type="checkbox" name="sim_sms"  id="sim_sms" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_waiting'] =="on") or ($_REQUEST['sim_call_waiting']) )
	{
		echo 'checked="checked"';
		$_REQUEST['sim_call_waiting'] = $_REQUEST['sim_call_waiting'];
	}
	?> tabindex="18" /><label>SMS (SMS)</label>
	</div>	
	<!-- end of call waiting -->
	
	
	<!-- start of voicemail -->
		<div style="position:relative; left:150px; top:-80px;">
		<input type="checkbox" name="sim_voice"  id="sim_voice" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_barring'] =="on") or ($_REQUEST['sim_call_barring'] ) )
	{
		echo 'checked="checked"';
		$_REQUEST['sim_call_barring'] = $_REQUEST['sim_call_barring'];
	}
	?> tabindex="19"/><label>Voice (VOICE)</label>
	</div>
	
	<!-- start of data only, corp -->
	<div style="position:relative; left:0px; top:-70px">
		<input type="checkbox" name="sim_data_only"  id="sim_data_only" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_waiting'] =="on") or ($_REQUEST['sim_call_waiting']) )
	{
		echo 'checked="checked"';
		$_REQUEST['sim_call_waiting'] = $_REQUEST['sim_call_waiting'];
	}
	?> tabindex="20"/>
	<label>Data Only (DATA)</label>
	</div>
	<div style="position:relative; left:150px; top:-90px;">
	<input type="checkbox" name="sim_corporate"  id="sim_corporate" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_barring'] =="on") or ($_REQUEST['sim_call_barring'] ) )
	{
		echo 'checked="checked"';
		$_REQUEST['sim_call_barring'] = $_REQUEST['sim_call_barring'];
	}
	?> tabindex="21"/>
	<label>Corporate (CORP)</label>
	</div>
	<!-- end of data only, corp -->
	<!-- start of data only, corp -->
	<div style="position:relative; left:0px; top:-80px">
		<input type="checkbox" name="sim_wispr"  id="sim_wispr" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_waiting'] =="on") or ($_REQUEST['sim_call_waiting']) )
	{
		echo 'checked="checked"';
		$_REQUEST['sim_call_waiting'] = $_REQUEST['sim_call_waiting'];
	}
	?> tabindex="22" />
	<label>WISPr (WISPr)</label>
	</div>
	<div style="position:relative; left:150px; top:-100px;">
	<input type="checkbox" name="sim_personx"  id="sim_personx" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_barring'] =="on") or ($_REQUEST['sim_call_barring'] ) )
	{
		echo 'checked="checked"';
		$_REQUEST['sim_call_barring'] = $_REQUEST['sim_call_barring'];
	}
	?> tabindex="23"/><label>Talk to person X (X)</label>
	</div>
	<!-- end of data only, corp -->
	
	<!-- start of submit -->
	<div style="position:relative; left:0px; top:-80px;">
	<input type="submit" value="Search" name="search" class="smallerboxsp" title="search"" tabindex="24"/>
	</div>
	<!-- end of submit-->

	</form>
</div>
<!-- end of left frame -->

<div class="content">
<!-- start of right frame -->

<?

if (strlen($_GET['simcard_id'])>0)
{

		$simcard_id = $_REQUEST['simcard_id'];
		
			$sql = "SELECT s.simcard_id AS simcard_id, "
		. " s.ICCID AS ICCID, s.ID AS ID, s.Carrier AS Carrier, s.ID AS ID, s.Assigned_To AS Assigned_To, "
		. " s.user_id AS user_id, o.Id AS owner_id, s.IMSI AS IMSI, s.MSISDN AS MSISDN, "
		. " s.Conference_Call AS Conference_Call, s.International_Call AS International_Call, "
		. " s.Call_Forwarding AS Call_Forwarding, s.Call_Barring AS Call_Barring, "
		. " s.Call_Waiting AS Call_Waiting, s.Voice_Mail AS Voice_Mail, "
		. " s.Notes AS Notes, s.Sign_out AS Sign_out, "
		. " u.loc_id AS loc_id, "
		. " u.email AS email, u.username AS username, o.username AS owner, " 
		. " l.name AS location FROM simcards AS s "
		. " LEFT JOIN users AS u ON u.Id = s.user_id "
		. " LEFT JOIN users AS o ON o.Id = s.owner_id "
		. " LEFT JOIN location AS l ON l.id = u.loc_id " 
		. " WHERE s.simcard_id = $simcard_id " ;
	
	$rs = mysql_query($sql, $connect);

	$fetchsimcard = mysql_fetch_assoc($rs);
	
	?>
		<form method="post" action="signinsignoutsim.php?<?=$_SERVER['QUERY_STRING']?>" enctype="multipart/form-data">
		<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
		<tr class="thetoprow">
		<th class="bigok"><strong>Carrier </strong></th>
		<th class="bigok"><?=$fetchsimcard['Carrier']?></th>
		<th></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>

		</tr>
		
		<tr >
		<th><a href=""><strong>Select</strong></a></th>
		<? 
		echo '<th><label>ICCID</label></th>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_id']) 
		echo '<th><label>ID</label></th>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_carrier']) 
		echo '<th><label>Carrier</label></th>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_user']) 
		echo '<th><label>User</label></th>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_user']) 
		echo '<th><label>Owner</label></th>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_imsi']) 
		echo '<th><label>IMSI</label></th>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_location']) 
		echo '<th><label>Location</label></th>'; ?>
			<? if ($_SESSION['hh_settings']['sim_show_msisdn']) 
		echo '<th><label>MSISDN</label></th>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_notes']) 
		echo '<th><label>Notes</label></th>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_signout_date']) 
		echo '<th><label>Signout Date</label></th>'; ?>
		<? echo '<th><label>Actions</label></th>'; ?>		
		<th>&#160;</th><th>&#160;</th>
		</tr>
		
		
		<tr <? if ($fetch['user_id']!=0) { echo 'class="not-available"'; } else { echo 'class="available"'; } ?> >	
		<td><input type="checkbox" name="select_for_sign_out<?=$fetch['Id']?>" id="select_for_sign_out<?=$fetch['Id']?>" class="checkbox" tabindex="10" /></td>
		
		
		<? if ($_SESSION['hh_settings']['sim_show_iccid']) 
		echo '<td>' . $fetchsimcard['ICCID']. '</td>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_id']) 
		echo '<td>' . $fetchsimcard['ID']. '</td>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_carrier']) 
		echo '<td>' . $fetchsimcard['Carrier']. '</td>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_user']) 
		echo '<td>';
		if ($fetchsimcard['user_id'] !=0)
		{
			echo $fetchsimcard['username'] ;
		}
		else
		{
			echo "AVAILABLE"; 
		}
		 				
		echo '</td>'; 
		 ?>
		<? if ($_SESSION['hh_settings']['sim_show_user']) 
		echo '<td>';
		if ($fetchsimcard['owner_id'] !=0)
		{
			echo $fetchsimcard['owner'];
		}
		else
		{
			echo "NOVAL"; 
		}
		 				
		echo '</td>'; 
		
		?>
		<? if ($_SESSION['hh_settings']['sim_show_imsi']) 
		{
		echo '<td>'; 
		if (strlen($fetchsimcard['IMSI']) > 0) { echo $fetchsimcard['IMSI']; } else { echo 'NOVAL'; } 
	    echo '</td>';
		} 
		?>
		<? 
		if ($_SESSION['hh_settings']['sim_show_location']) 
		{
		echo '<td>'; 		
		if (strlen($fetchsimcard['location']) > 0) { echo $fetchsimcard['location']; } else { echo 'NOVAL'; } 
	    echo '</td>';	
		}
		?>
		<? 
		if ($_SESSION['hh_settings']['sim_show_msisdn']) 
		{
		echo '<td>'; 		
		if (strlen($fetchsimcard['MSISDN']) > 0) { echo $fetchsimcard['MSISDN']; } else { echo 'NOVAL'; } 
	    echo '</td>';	
		}
		?>
		<?
		if ($_SESSION['hh_settings']['sim_show_notes']) 
		{
		echo '<td>' . $fetchsimcard['Notes'] . '</td>';
		}
		?>
		<? if ($_SESSION['hh_settings']['sim_show_signout_date']) 
		{
		echo '<td>' . $fetchsimcard['Sign_out'] . '</td>';
		}
		?>
		
		<td><a href="edit-sim-run.php?simcard_id=<?=$fetchsimcard['simcard_id']?>&<?=$query_string?>">
		<img src="iconimages/action_edit.png" alt="edit" title="edit"></a>
		<input id="sim_id" type="hidden" value="<?=$fetchsimcard['Id']?>">
		<a href="userhist.php?simcard_id=<?=$fetchsimcard['simcard_id']?>">
		<img src="iconimages/action_history.png" alt="history" title="history"></a>
		</td>
	
		<th>&#160;</th><th>&#160;</th>
		</tr>
	<?

}
//$carriersarray = array();
else if (strlen($_REQUEST['search']) > 0)
	{
	  
		//echo $_SESSION['hh_settings']['sim_show_iccid'];
		//echo $_SESSION['hh_settings']['sim_show_carrier'];
		//echo $_SESSION['hh_settings']['sim_show_id'];
		//echo $_SESSION['hh_settings']['sim_show_user'];
		//echo $_SESSION['hh_settings']['sim_show_imsi'];
		//echo $_SESSION['hh_settings']['sim_show_msisdn'];
		//echo $_SESSION['hh_settings']['sim_show_notes'];
		//echo $_SESSION['hh_settings']['sim_show_location'];
		//echo $_SESSION['hh_settings']['sim_show_flags'];
		//echo $handheld_location = $_REQUEST['handheld_location'];
		$sim_carrier = $_REQUEST['sim_carrier'];
		$sim_user_id = $_REQUEST['sim_user_id'];
		$sim_location = $_REQUEST['sim_location'];	  
		$sim_iccid = $_REQUEST['sim_iccid'];
		$sim_imsi = $_REQUEST['sim_imsi'];
		$sim_msisdn = $_REQUEST['sim_msisdn'];
	  
		$sqlcarriers = "SELECT * FROM troubador_device.sim_carrier ORDER BY CarrierName";
		
		if ($sim_carrier != 'any')
		{
			$carriersarray[] = $sim_carrier;
			echo "<!--";
			echo "carriersdebug";
			echo strlen($sim_available_only);
			echo "-->";
			
		}
		else
		{
			
			$resultcarriers = mysql_query($sqlcarriers, $connect);
			while ($fetchcarriers = mysql_fetch_assoc($resultcarriers))
			{
				$carriersarray[] = $fetchcarriers['CarrierName'];
			}
			echo "<!--";
			echo "carriersdebug";
			echo strlen($sim_available_only);
			echo "-->";
		}

		//for ($icount=0; $icount<sizeof($carriersarray); $icount++)
	
		foreach ($carriersarray as $sim_carrier)
		{

		//$sim_carrier = $carriersarray[$icount];	
		// start building out the sql query here 
		
		$sqlsim = "SELECT s.simcard_id AS simcard_id, s.ICCID AS ICCID, "
		. " s.Carrier AS Carrier, s.ID AS ID, s.Assigned_To AS Assigned_To, "
		. " s.user_id AS user_id, s.owner_id AS owner_id, s.IMSI AS IMSI, s.MSISDN AS MSISDN, "
		. " s.Conference_Call AS Conference_Call, s.International_Call AS International_Call, "
		. " s.Call_Forwarding AS Call_Forwarding, s.Call_Barring AS Call_Barring, "
		. " s.Call_Waiting AS Call_Waiting, s.Voice_Mail AS Voice_Mail, s.Telenav AS Telenav, "
		. " s.ALS AS ALS, s.Modem AS Modem, s.PLMN AS PLMN, s.MyFaves AS MyFaves, s.SMS AS SMS, "
		. " s.Voice AS Voice, s.Data_Only, s.Corporate AS Corporate, s.WISPr AS WISPr, s.Talk_to_person_X AS Talk_to_person_X,"
		. " s.Notes AS Notes, s.Sign_out AS Sign_out, "
		. " u.loc_id AS loc_id, "
		. " u.email AS email, u.username AS username, o.username AS owner, " 
		. " l.name AS location FROM simcards AS s "
		. " LEFT JOIN users AS u ON u.Id = s.user_id "
		. " LEFT JOIN users AS o ON o.Id = s.owner_id "
		. " LEFT JOIN location AS l ON l.id = s.loc_id " 
		. " WHERE (s.Carrier = '$sim_carrier') AND (1=1)  " ;
		
		
		if (isset($_REQUEST['sim_user_id']))
		{
			if (!($_REQUEST['sim_user_id'] == 0))
			{
			$sqlsim .= " AND s.user_id=$sim_user_id ";
			}
		}
		
		if (isset($_REQUEST['sim_location']))
		{
			if (!($_REQUEST['sim_location']) ==0)
			{
				$sqlsim .= "  AND s.loc_id=$sim_location ";
			}
		}
		if (isset($_REQUEST['sim_iccid']) > 0)
		{
			
				 $sqlsim .= " AND s.ICCID LIKE '%$sim_iccid%' ";
			
		}
		
		if (isset($_REQUEST['sim_imsi']) > 0 )
		{
		
				$sqlsim .= " AND s.IMSI LIKE '%$sim_imsi%' ";
			
		}
		
		if (isset($_REQUEST['sim_msisdn']) > 0 )
		{
			
				$sqlsim .= " AND s.MSISDN LIKE '%$sim_msisdn%' ";
			
		}
		
		// available_only
		 if (strlen($sim_available_only)>0)
		 {
		   
				
				$sqlsim .= "	AND s.user_id = 0 ";
				
			
		 }
		 else
		 {
		 
			//$sqlsim .= "  AND (u.Id > 14) ";
		}		
	
		// end building out the sql query here 
	
		
		$resultsim = mysql_query($sqlsim, $connect);
		$resultnum = mysql_num_rows($resultsim);
		if ($resultnum > 0 )
		{	
		?>
		<form method="post" action="signinsignoutsim.php?<?=$_SERVER['QUERY_STRING']?>" enctype="multipart/form-data">
		<input type="hidden" name="query_string" value="<?=$query_string?>">
		<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">

		<tr>
		<th><input value="Sign In/Sign Out" name="B1"  type="submit"></th>
		<th><span class="ok" id="signout_signin_returned_value" ></span></th>	
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		</tr>

		<tr class="thetoprow">
		<th class="bigok"><strong><? echo  $sim_carrier; ?></strong></th>
		<th class="bigok"><?=$fetchsimcard['Carrier']?></th>
		<th></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		</tr>
		<tr >
		<th>
		<? 
		echo '<label>ICCID</label>'; ?>
		</th>
		<? if ($_SESSION['hh_settings']['sim_show_imsi']) 
		echo '<th><a href="#">IMSI</a></th>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_id']) 
		echo '<th><a href="#">ID</a></th>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_carrier']) 
		echo '<th><a href="#">Carrier</a></th>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_user']) 
		echo '<th><a href="#">User</a></th>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_user']) 
		echo '<th><a href="#">Owner</a></th>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_location']) 
		echo '<th><a href="#">Location</a></th>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_msisdn']) 
		echo '<th><a href="#">MSISDN</a></th>'; ?>
		<? 
		echo '<th><label>Provisioning</label>&nbsp;<label class="Y">Yes</label>&nbsp;<label class="N">No</label>&nbsp;<label class="Z">Not Set</label></th>'; ?>
		
		
		<? if ($_SESSION['hh_settings']['sim_show_notes']) 
		echo '<th><a href="#">Notes</a></th>'; ?>
		<? if ($_SESSION['hh_settings']['sim_show_signout_date']) 
		echo '<th><a href="#">Signout Date</a></th>'; ?>
		<? echo '<th><label>Actions</label></th>'; ?>
		
		<th>&#160;</th><th>&#160;</th>
		</tr>
		<!-- start of dynamic rows -->	
		<?

		
		
		while ($fetch = mysql_fetch_assoc($resultsim))
		{
		?>
		<tr <? 
		if ($fetch['user_id']!=0) { echo 'class="not-available"'; } else { echo 'class="available"'; } ?> >
		
		<td>
		<input type="checkbox" name="select_for_sign_out[]" id="select_for_sign_out[]" class="checkbox" tabindex="10" value="<?=$fetch['simcard_id']?>" />
		<?
		if (strlen($fetch['ICCID'])>0){ echo $fetch['ICCID'];} else { echo 'NOVAL'; } 
		echo '</td>';
		
		?>
		<?
		if ($_SESSION['hh_settings']['sim_show_imsi'])
		{
		
		echo '<td>'; 
		if (strlen($fetch['IMSI']) > 0) { echo $fetch['IMSI']; } else { echo 'NOVAL'; } 
	    echo '</td>';
		}
		?>

	
		<?
		if ($_SESSION['hh_settings']['sim_show_id'])
		{
		echo '<td>';
		if (strlen($fetch['ID']) > 0) { echo $fetch['ID']; } else { echo 'NOVAL'; }
		echo '</td>';
		
		}
		?>
		<?
		if ($_SESSION['hh_settings']['sim_show_carrier'])
		{
		echo '<td>';
		if (strlen($fetch['Carrier']) > 0) { echo $fetch['Carrier']; } else { echo 'NOVAL'; }
		echo '</td>';
		
		}
		?>
		<?
		
		if ($_SESSION['hh_settings']['sim_show_user'])
		{
		echo '<td>' ;
			if ($fetch['user_id'] != 0)
			{
				echo $fetch['username'];
			}
			else
			{
				echo "AVAILABLE";
			}
		echo '</td>';
		}
		
		if ($_SESSION['hh_settings']['sim_show_user'])
		{
		echo '<td>' ;
			if ($fetch['owner_id'] != 0)
			{
				echo $fetch['owner'];
			}
			else
			{
				echo "NOVAL";
			}
		echo '</td>';
		}
		
		if ($_SESSION['hh_settings']['sim_show_location'])
		{
		
		echo '<td>'; 		
		if (strlen($fetch['location']) > 0) { echo $fetch['location']; } else { echo 'NOVAL'; } 
	    echo '</td>';
		}
		
		if ($_SESSION['hh_settings']['sim_show_msisdn']) 
		{
		echo '<td>'; 		
		if (strlen($fetch['MSISDN']) > 0) { echo $fetch['MSISDN']; } else { echo 'NOVAL'; } 
	    echo '</td>';	
		}
	
		
		echo '<td>' .'<label class="' . $fetch['Conference_Call'] . '">'. 'CON' . '</label> '. ' &nbsp;' 
		. '<label class=' . $fetch['International_Call'] . '>' . 'INT' . '</label> '. ' &nbsp;' 
		. '<label class=' . $fetch['Call_Forwarding'] . '>' .'FWD'. '</label> ' . ' &nbsp;' 
		. '<label class=' . $fetch['Call_Barring'] . '>' . 'BARR' . '</label>' . ' &nbsp;'
		. '<label class=' . $fetch['Call_Waiting'] . '>' . 'WAIT' . '</label>' . ' &nbsp;'
		. '<label class=' . $fetch['Voice_Mail'] . '>' . 'VMAIL' .  '</label>' . ' &nbsp;'
		. '<label class=' . $fetch['Telenav'] . '>' . 'TELENAV'  .   '</label>' . ' &nbsp;'
		. '<label class=' . $fetch['ALS'] . '>' . 'ALS' .  '</label>' . ' &nbsp;'
		. '<label class=' . $fetch['Modem'] . '>' . 'MODEM' .  '</label>' . ' &nbsp;'
		. '<label class=' . $fetch['PLMN'] . '>' . 'PLMN' . '</label>' . ' &nbsp;'
		. '<label class=' . $fetch['MyFaves'] . '>' . 'MYFAVES' . '</label>' . ' &nbsp;'
		. '<label class=' . $fetch['SMS'] . '>' . 'SMS' . '</label>' . ' &nbsp;'
		. '<label class=' . $fetch['Voice'] . '>' . 'VOICE' . '</label>' . ' &nbsp;'
		. '<label class=' . $fetch['Data_Only'] . '>' . 'DATA' . '</label>' . ' &nbsp;'
		. '<label class=' . $fetch['Corporate'] . '>' . 'CORP' . '</label>' . ' &nbsp;'
		. '<label class=' . $fetch['WISPr'] . '>' . 'WISPr' . '</label>' . ' &nbsp;'
		. '<label class=' . $fetch['Talk_to_person_X'] . '>' . 'PersonX' . '</label>' . ' &nbsp;'
		. '</td>';
	
		?>
		
	
		

		
		<?
		if ($_SESSION['hh_settings']['sim_show_notes'])
		{
		echo '<td>' . $fetch['Notes'] . '</td>';
		}
		?>
		
		<?
		if ($_SESSION['hh_settings']['sim_show_signout_date'])
		{
		echo '<td>' . $fetch['Sign_out'] . '</td>';
		}
		?>
		<td><a href="edit-sim-run.php?simcard_id=<?=$fetch['simcard_id']?>&<?=$query_string?>">
		<img src="iconimages/action_edit.png" alt="edit" title="history"></a>
		<input id="sim_id" type="hidden" value="<?=$fetch['simcard_id']?>">
		<input type="hidden" id="old_user_id" name="old_user_id" value="<?=$_GET['sim_user_id']?>">
		 <a href="#" onclick="openhistorybox(<?=$fetch['simcard_id']?>, 1)">
		<img src="iconimages/action_history.png" alt="history" title="history"/></a>
		</td>
	
		</tr>
		
		<?
		}
		?>
		<!-- end of dynamic rows -->
		<?
		}
		$icount++;
		}
  
	}
echo "<!--" . $sqlsim . "-->";
?>

</div>
<!-- end of right frame -->


<div style="margin: 3em auto auto auto; text-align: center;">


<?

include 'footer.php';

?>