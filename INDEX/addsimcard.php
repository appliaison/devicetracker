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

	echo "<pre>";
	print_r($_REQUEST);
	echo "</pre>";
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
	<input value="" name="sim_carrier" size="20" class="edit" id="sim_carrier" type="text" tabindex="2">
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

	<th><label>Owner Name</label></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
	
	<tr>	
	
	<td>
	<select name="sim_owner_name" id="sim_owner_name" tabindex="6">
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
	<input type="checkbox" name="sim_telenav" value="1" id="sim_in_svv" class="checkbox" tabindex="15" />
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
	
	<input type="checkbox" name="sim_als" value="1" id="sim_conference_call" class="checkbox" tabindex="16" />
	<label>ALS </label>
	<input type="checkbox" name="sim_modem" value="1" id="sim_international_call" class="checkbox" tabindex="17"/>
	<label>Modem </label>
	<input type="checkbox" name="sim_call_plmn" value="1" id="sim_call_forwarding" class="checkbox" tabindex="18"/>
	<label>PLMN </label>
	<input type="checkbox" name="sim_myfaves" value="1" id="sim_call_barring" class="checkbox" tabindex="18"/>
	<label>MyFaves</label>
	<input type="checkbox" name="sim_sms" value="1" id="sim_call_waiting" class="checkbox" tabindex="19"/>
	<label>SMS</label>
	<input type="checkbox" name="sim_voice" value="1" id="sim_voicemail" class="checkbox" tabindex="20" />
	<label>VOICE </label>
	<input type="checkbox" name="sim_data_only" value="1" id="sim_voicemail" class="checkbox" tabindex="21" />
	<label>Data Only </label>
	<input type="checkbox" name="sim_corporate" value="1" id="sim_voicemail" class="checkbox" tabindex="22" />
	<label>Corporate</label>
	<input type="checkbox" name="sim_wispr" value="1" id="sim_voicemail" class="checkbox" tabindex="23" />
	<label>WISPr </label>
	<input type="checkbox" name="sim_personx" value="1" id="sim_voicemail" class="checkbox" tabindex="24" />
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