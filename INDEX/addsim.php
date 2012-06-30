<?
require "loginstuff.php";
require 'globalheader.php';
?>

              <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
 		<table cellpadding="0" cellspacing="0" align="center"><tr>
  <td valign="middle" style="width:368px">&nbsp;</td>
  <td class="tabdown"><a href="home.php" class="plain">Home</a></td>
  <td class="tabdown"><a href="handhelds.php" class="plain">Handhelds</a></td>
  <td class="tabup"><a href="simcards.php" class="plain">SIM cards</a></td>
  <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

  </tr>
  </table></td></tr>
  <tr id="nav-secondary">
  <td align="center" class="tabs" colspan="2">

			<table cellpadding="0" cellspacing="0" align="center">
			<tr>
			<!-- <td class="tabdown2"><a href="displaysim-sorted.php" class="plain">Display SIM</a></td>-->
						<td class="tabdown2"><a href="imsearchsim-run.php" class="plain">Search SIM</a></td>
						<td class="tabdown2"><a href="quicksearchsim.php" class="plain">Quicksearch</a></td>
						 <td class="tabdown2"><a href="qsigninsim.php" class="plain">Quicksignin</a></td>
						 <td class="tabdown2"><a href="qsignoutsim.php" class="plain">Quicksignout</a></td>
						<td class="tabup"><a href="addsim.php" class="plain">Add SIM</a></td>
						<td class="tabdown2"><a href="displayhistorysim.php" class="plain">History</a></td>
				
			</tr>

        </table>

<!-- start of addsim -->

<?
require 'checkadmin.php';

if (strlen($_REQUEST['submit']))
{

	$sim_iccid = $_REQUEST['sim_iccid'];
	$sim_carrier = $_REQUEST['sim_carrier'];
	$sim_id = $_REQUEST['sim_id'];
	$sim_imsi = $_REQUEST['sim_imsi'];
	$sim_msisdn = $_REQUEST['sim_msisdn'];
	$sim_owner_id = $_REQUEST['sim_owner_id'];
	$sim_notes = $_REQUEST['sim_notes'];
	
	
	$date = '2009-06-11';
	$today = date("Y-n-j"); 
	
	if (strlen($_REQUEST['sim_in_svv'])>0) $sim_in_svv = 'Y';   else $sim_in_svv = 'N';	
	if (strlen($_REQUEST['sim_conference_call'])>0)  $sim_conference_call = 'Y' ; else $sim_conference_call = 'N';
	if (strlen($_REQUEST['sim_international_call'])>0) $sim_international_call = 'Y'; else $sim_international_call = 'N';
	
	if (strlen($_REQUEST['sim_call_forwarding'])>0) $sim_call_forwarding = 'Y'; else $sim_call_forwarding = 'N';	
	if (strlen($_REQUEST['sim_call_barring'])>0) $sim_call_barring = 'Y' ; else $sim_call_barring = 'N';
	if (strlen($_REQUEST['sim_call_waiting'])>0) $sim_call_waiting = 'Y'; else $sim_call_waiting = 'N';
	
	if (strlen($_REQUEST['sim_voicemail'])>0) $sim_voicemail = 'Y'; else $sim_voicemail = 'N';	
	if (strlen($_REQUEST['sim_telenav'])>0) $sim_telenav = 'Y';  else $sim_telenav = 'N';
	if (strlen($_REQUEST['sim_als'])>0) $sim_als = 'Y'; else $sim_als = 'N';
	
	if (strlen($_REQUEST['sim_modem'])>0) $sim_modem = 'Y'; else $sim_modem = 'N';	
	if (strlen($_REQUEST['sim_plmn'])>0) $sim_plmn = 'Y'; else $sim_plmn = 'N';
	if (strlen($_REQUEST['sim_myfaves'])>0) $sim_myfaves = 'Y'; else $sim_myfaves = 'N';

	if (strlen($_REQUEST['sim_sms'])>0) $sim_sms = 'Y'; else $sim_sms = 'N';	
	if (strlen($_REQUEST['sim_voice'])>0) $sim_voice = 'Y' ; else $sim_voice = 'N';
	if (strlen($_REQUEST['sim_data_only'])>0) $sim_data_only = 'Y'; else $sim_data_only = 'N';

	if (strlen($_REQUEST['sim_corporate'])>0) $sim_corporate = 'Y'; else $sim_corporate = 'N';	
	if (strlen($_REQUEST['sim_wispr'])>0) $sim_wispr = 'Y' ; else $sim_wispr = 'N';
	if (strlen($_REQUEST['sim_personx'])>0) $sim_personx = 'Y'; else $sim_personx = 'N';

	
echo $sql = "INSERT INTO simcards (ICCID, Carrier, ID,  user_id, IMSI, MSISDN, Notes, owner_id, loc_id, Added_on, In_SVV, "
." Conference_Call, International_Call, Call_Forwarding, Call_Barring, Call_Waiting, Voice_Mail, Telenav, ALS, Modem, PLMN, "
." MyFaves, SMS, Voice, Data_Only, Corporate, WISPr, Talk_to_person_X ) "
.	" VALUES('$sim_iccid', '$sim_carrier', '$sim_id',  0, '$sim_imsi', '$sim_msisdn', '$sim_notes', $sim_owner_id,  1, '$today', "
.  " '$sim_in_svv', '$sim_conference_call', '$sim_international_call', '$sim_call_forwarding', '$sim_call_barring', "
.  " '$sim_call_waiting', '$sim_voicemail', '$sim_telenav', '$sim_als', '$sim_modem', '$sim_plmn', '$sim_myfaves', "
.  " '$sim_sms', '$sim_voice', '$sim_data_only', '$sim_corporate', '$sim_wispr', '$sim_personx')";

	$result = mysql_query($sql, $connect) or die(mysql_error());

	$new_simcard_id = mysql_insert_id();
	
	?>
	<script type="text/javascript">
	location.href="imsearchsim-run.php?simcard_id=<?=$new_simcard_id?>";
	</script>
	
	<?

}
else
{
?>
<form name="editsubmit" method="POST" action="<?=$_SERVER['PHP_SELF']?>">	
<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
<tr>
	<td></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>

</tr>
<tr>
	<th><label>Enter data for new simcard</label><label class="redlabel"> (* Mandatory) </label></th>
	<th>&nbsp;</th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&#160;</th>
	<th>&#160;</th>

</tr>
<tr>
	<!-- <th class="asc"><a href="index.php?step=list&#38;event=admin&#38;sort=name&#38;dir=desc">Login</a></th> -->
	<th><label>ICCID</label><label class="redlabel"> *</label></th>
	<th>&nbsp;</th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&#160;</th>
	<th>&#160;</th>
	</tr>
	
	<tr>	
	
	<td>
	<input value="" name="sim_iccid" size="20" class="edit" id="sim_iccid" type="text" tabindex="1">
	
	</td>
	<td></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>

<tr>

	<th><label>Carrier</label><label class="redlabel"> *</label></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
	
	<tr>	
	
	<td>
	<select name="sim_carrier" id="sim_carrier" tabindex="2">

	<?php

	$sql = "SELECT * FROM sim_carrier ORDER BY CarrierName";
	$rs = mysql_query($sql, $connect);
	while ($fetch = mysql_fetch_assoc($rs))
	{
	  
	    echo "<option value='" . $fetch['CarrierName'] . "'>" . $fetch['CarrierName'] . "</option>\n";  
	
	   
	 }
	
	?>
    
	</select>
	</td>
	<td></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>

<!-- start of ID -->
<tr>

	<th><label>ID</label></th>
	<th>&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>	
	</tr>
	<tr>	
	
	<th>
	<input value="" name="sim_id" size="20" class="edit" id="sim_id" type="text" tabindex="3">
	</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&#160;</th>
	<th>&#160;</th>
	<th>&nbsp;</th>
</tr>
<!-- end of ID -->
<!-- start of IMSI -->
<tr>

	<th><label>IMSI</label></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>	
	</tr>
	<tr>	
	
	<th>
	<input value="" name="sim_imsi" size="20" class="edit" id="sim_imsi" type="text" tabindex="4">
	</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&#160;</th>
	<th>&#160;</th>
	<th>&nbsp;</th>
</tr>
<!-- end of IMSI -->
<!-- start of MSISDN -->
<tr>

	<th><label>MSISDN</label></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
	
	</tr>
	
	<tr>	
	
	<th>
	<input value="<? echo $_SESSION['sim_msisdn']; ?>" 	name="sim_msisdn" size="20" class="edit" id="sim_msisdn" type="text" tabindex="5">
	</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&#160;</th>
	<th>&#160;</th>
	<th>&nbsp;</th>
</tr>
<!-- end of MSISDN -->
<!-- start of owner name -->
<tr>

	<th><label>Owner</label></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
	
	<tr>	
	
	<td>
	<select name="sim_owner_id" id="sim_owner_id" tabindex="6">
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
	<td></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<!-- end of owner name-->


<!-- start of in_svv -->

<!-- start of notes -->
<tr>

	<th><label>Notes</label></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&#160;</th>
	<th>&#160;</th>
	</tr>
	
	<tr>	
	
	<td>
	
	<textarea rows="3" name="sim_notes" id="sim_notes" cols="80" value="" tabindex="7" ></textarea>
	
	</td>
	<td></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<!-- end of notes-->
<!-- start of row1 checkboxes -->
<tr>
	<th>
	<input type="checkbox" name="sim_in_svv" value="1" id="sim_in_svv" class="checkbox" tabindex="8" />
	<label>In SV&V</label>
	<input type="checkbox" name="sim_conference_call" value="1" id="sim_conference_call" class="checkbox" tabindex="9" />
	<label>Con Call </label>
	<input type="checkbox" name="sim_international_call" value="1" id="sim_international_call" class="checkbox" tabindex="10"/>
	<label>Intl Call </label>
	<input type="checkbox" name="sim_call_forwarding" value="1" id="sim_call_forwarding" class="checkbox" tabindex="11"/>
	<label>Call Fwding </label>
	<input type="checkbox" name="sim_call_barring" value="1" id="sim_call_barring" class="checkbox" tabindex="12"/>
	<label>Call Barring </label>
	<input type="checkbox" name="sim_call_waiting" value="1" id="sim_call_waiting" class="checkbox" tabindex="13"/>
	<label>Call Waiting</label>
	<input type="checkbox" name="sim_voicemail" value="1" id="sim_voicemail" class="checkbox" tabindex="14" />
	<label>Voicemail</label>
	<input type="checkbox" name="sim_telenav" value="1" id="sim_telenav" class="checkbox" tabindex="15" />
	<label>Telenav</label>
	
    </th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>	
<!-- end of checkboxes-->
<!-- start of row2 checkboxes -->
<tr>
	<th>
	
	<input type="checkbox" name="sim_als" value="1" id="sim_als" class="checkbox" tabindex="16" />
	<label>ALS </label>
	<input type="checkbox" name="sim_modem" value="1" id="sim_modem" class="checkbox" tabindex="17"/>
	<label>Modem </label>
	<input type="checkbox" name="sim_plmn" value="1" id="sim_plmn" class="checkbox" tabindex="18"/>
	<label>PLMN </label>
	<input type="checkbox" name="sim_myfaves" value="1" id="sim_myfaves" class="checkbox" tabindex="18"/>
	<label>MyFaves</label>
	<input type="checkbox" name="sim_sms" value="1" id="sim_sms" class="checkbox" tabindex="19"/>
	<label>SMS</label>
	<input type="checkbox" name="sim_voice" value="1" id="sim_voice" class="checkbox" tabindex="20" />
	<label>VOICE </label>
	<input type="checkbox" name="sim_data_only" value="1" id="sim_data_only" class="checkbox" tabindex="21" />
	<label>Data Only </label>
	<input type="checkbox" name="sim_corporate" value="1" id="sim_corporate" class="checkbox" tabindex="22" />
	<label>Corporate</label>
	<input type="checkbox" name="sim_wispr" value="1" id="sim_wispr" class="checkbox" tabindex="23" />
	<label>WISPr </label>
	<input type="checkbox" name="sim_personx" value="1" id="sim_personx" class="checkbox" tabindex="24" />
	<label>Talk to person X</label>
	
    </th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>	
<!-- end of checkboxes-->

<!-- start of submit -->
<tr>

	<th><input type="submit"  value="Submit" name="submit" tabindex="25">&nbsp;&nbsp; 
	<!-- <input type="reset" value="Reset" name="B2" class="smallerboxsp"> -->
	</th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
</tr>
	

<!-- end of submit-->
<!-- start of submit -->
<tr>

	<th><span  class="ok" id="returned_value"></span></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
</tr>
	

<!-- end of submit-->

<tr>

</tr>
</table>
</form>
<?
}

?>

<!-- end of form -->		


<div style="margin: 3em auto auto auto; text-align: center;">


<p id="moniker">Logged in as <span>ardas</span><br /><a href="index.php?logout=1">Logout</a></p>

</div>
</body>
</html>