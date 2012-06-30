<?
require "loginstuff.php";
require 'globalheader.php';
$simcard_id = $_REQUEST['simcard_id'];
$query_string = $_SERVER['QUERY_STRING'];
$sql = "SELECT u.Id AS id, u.Id AS userid, u.username AS username, s.ICCID AS ICCID, s.Carrier AS Carrier, "
	 . " s.ID AS ID, s.user_id AS sim_user_id, s.IMSI AS IMSI, s.MSISDN AS MSISDN, "
     . " s.owner_id AS sim_owner_id, s.loc_id AS sim_loc_id, s.In_SVV AS In_SVV, s.Conference_Call AS Conference_Call, "
     . " s.International_Call AS International_Call, s.Call_Forwarding AS Call_Forwarding, s.Call_Barring AS Call_Barring, "
     . " s.Call_Waiting AS Call_Waiting, s.Voice_Mail AS Voice_Mail,  "	 
	 . " s.Telenav AS Telenav, s.ALS AS ALS, s.Modem AS Modem, s.PLMN AS PLMN, s.MyFaves AS MyFaves, " 
	 . " s.SMS AS SMS, s.Voice AS Voice, s.Data_Only AS Data_Only, s.Corporate AS Corporate, "
	 . " s.WISPr AS WISPr, s.Talk_to_person_X AS Talk_to_person_X, "
	 . " s.Notes AS Notes, s.Util AS Util, s.Sign_out AS Sign_out "	
	 . " FROM troubador_device.simcards AS s LEFT JOIN users AS u ON s.user_id = u.Id WHERE s.simcard_id = $simcard_id ";

	 
 $rs = mysql_query($sql, $connect);
$num_rows = mysql_num_rows($rs);
$fetch = mysql_fetch_assoc($rs);
$sim_carrier = $fetch['Carrier'];
$sim_loc_id = $fetch['sim_loc_id'];
$sim_iccid = $fetch['ICCID'];
$sim_id = $fetch['ID'];
$sim_imsi = $fetch['IMSI'];
$sim_msisdn = $fetch['MSISDN'];
$sim_user_id = $fetch['sim_user_id'];
$sim_owner_id = $fetch['sim_owner_id'];
$sim_in_svv = $fetch['In_SVV'];
$sim_conference_call= $fetch['Conference_Call'];
$sim_international_call = $fetch['International_Call'];
$sim_call_forwarding = $fetch['Call_Forwarding'];
$sim_call_barring = $fetch['Call_Barring'];
$sim_call_waiting = $fetch['Call_Waiting'];
$sim_voice_mail = $fetch['Voice_Mail'];
$sim_telenav = $fetch['Telenav'];
$sim_als  = $fetch['ALS'];
$sim_modem = $fetch['Modem'];
$sim_plmn = $fetch['PLMN'];
$sim_myfaves = $fetch['MyFaves'];
$sim_sms = $fetch['SMS'];
$sim_voice = $fetch['Voice'];
$sim_data_only = $fetch['Data_Only'];
$sim_corporate = $fetch['Corporate'];
$sim_wispr = $fetch['WISPr'];
$sim_talkx = $fetch['Talk_to_person_X'];
$sim_notes = $fetch['Notes'];


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
                    <td class="tabup"><a href="imsearchsim-run.php" class="plain">Search SIM</a></td> 
                    <td class="tabdown2"><a href="addsim.php" class="plain">Add SIM</a></td>
                    <td class="tabdown2"><a href="displayhistorysim.php" class="plain">History</a></td>
					<td class="tabdown2"><a href="export.php" class="plain">Export to Excel</a></td>
			
			</table>
                </td>
            </tr>

        </table>
		<?
			require 'checkadmin.php';
		?>
<?


if (isset($_REQUEST['submit']))
{


	 $sim_carrier = $_REQUEST['sim_carrier'];
	$sim_loc_id = $_REQUEST['sim_loc_id'];
	$sim_iccid = $_REQUEST['sim_iccid'];
	$sim_id = $_REQUEST['sim_id'];
	$sim_imsi = $_REQUEST['sim_imsi'];
	$sim_msisdn = $_REQUEST['sim_msisdn'];
	$sim_user_id = $_REQUEST['sim_user_id'];
    $sim_owner_id = $_REQUEST['sim_owner_id'];
	$sim_notes = $_REQUEST['sim_notes'];
	if (isset($_REQUEST['sim_in_svv']))	{	$sim_in_svv = 'Y'; } else { $sim_in_svv = 'N'; }
	if (isset($_REQUEST['sim_conference_call'])) { $sim_conference_call = 'Y'; } else { $sim_conference_call = 'N'; }	
	if (isset($_REQUEST['sim_international_call']) ) { $sim_international_call = 'Y'; } else { $sim_international_call = 'N'; }	
	if (isset($_REQUEST['sim_call_forwarding']) ) { $sim_call_forwarding = 'Y' ; } else  { $sim_call_forwarding = 'N'; }
	if (isset($_REQUEST['sim_call_barring'])  ) { $sim_call_barring = 'Y'; } else  { $sim_call_barring = 'Y'; } 
	if (isset($_REQUEST['siim_call_waiting'])  ) { $sim_call_waiting = 'Y'; } else { $sim_call_waiting = 'N'; }
	if (isset($_REQUEST['sim_voice_mail']) ) { $sim_voice_mail = 'Y'; } else { $sim_voice_mail = 'N'; }
	if (isset($_REQUEST['sim_telenav']) ) { $sim_telenav = 'Y'; } else { $sim_telenav = 'N'; }
	if (isset($_REQUEST['sim_als'])) { $sim_als = 'Y'; } else { $sim_als = 'N'; }
	if (isset($_REQUEST['sim_modem'])) { $sim_modem = 'Y'; } else { $sim_modem = 'N'; } 
	if (isset($_REQUEST['sim_plmn']))  { $sim_plmn = 'Y'; } else { $sim_plmn = 'N'; } 
	if (isset($_REQUEST['sim_myfaves'])) { $sim_myfaves = 'Y'; } else { $sim_myfaves = 'N'; } 
	if (isset($_REQUEST['sim_sms'])) { $sim_sms = 'Y'; } else { $sim_sms = 'N'; }
	if (isset($_REQUEST['sim_voice'])) { $sim_voice = 'Y'; } else { $sim_voice = 'N'; }
	if (isset($_REQUEST['sim_data_only'])) { $sim_data_only = 'Y'; } else { $sim_data_only = 'N'; }
	if (isset($_REQUEST['sim_corporate']) ) { $sim_corporate = 'Y'; } else { $sim_corporate = 'N'; }
	if (isset($_REQUEST['sim_wispr'])) { $sim_wispr = 'Y'; } else { $sim_wispr = 'N'; }
	if (isset($_REQUEST['sim_talkx'])) { $sim_talkx = 'Y'; } else { $sim_talkx = 'N'; } 

	
	$sqlupdate = "UPDATE simcards SET "
	            . " ICCID = '$sim_iccid', "
				. " Carrier = '$sim_carrier', "
				. " ID = '$sim_id', "
				. " user_id = '$sim_user_id', "
				. " IMSI = '$sim_imsi', "
				. " MSISDN = '$sim_msisdn', "
				. " In_SVV = '$sim_in_svv', "
				. " Notes = '$sim_notes', "
				. " loc_id = $sim_loc_id, "
				. " owner_id = '$sim_owner_id', "
				. " Conference_Call = '$sim_conference_call', "
				. " International_Call = '$sim_international_call', "
				. " Call_Forwarding = '$sim_call_forwarding', "
				. " Call_Barring = '$sim_call_barring', "
				. " Call_Waiting = '$sim_call_waiting', "
				. " Voice_Mail = '$sim_voice_mail', "
				. " Telenav = '$sim_telenav', "
				. " ALS = '$sim_als' , "
				. " Modem = '$sim_modem', "
				. " PLMN = '$sim_plmn', "
				. " MyFaves = '$sim_myfaves', "
				. " SMS = '$sim_sms', "
				. " Voice = '$sim_voice', "
				. " Data_Only = '$sim_data_only', "
				. " Corporate = '$sim_corporate', "
				. " WISPr = '$sim_wispr', "
				. " Talk_to_person_X = '$sim_talkx' "
				. " WHERE simcard_id = $simcard_id ";
				


	//$sqlupdate = "UPDATE devicetracker.simcards SET ";
	//foreach ($_POST as $key => $value)
	//{
    //$sqlupdate .= " $key='$value', ";
	//}

	$rsupdate = mysql_query ($sqlupdate, $connect);
	
	 $query_string = $_REQUEST['query_string'];
	 
	
	?>
	<script type="text/javascript">
	
	
	location.href = "imsearchsim-run.php?simcard_id=<?=$simcard_id?>";
	</script>
	<?
	
	
	
	

}
else
{

?>		
<form name="editsubmit" method="POST" action="<?=$_SERVER['PHP_SELF']?>?simcard_id=<?=$simcard_id?>">		
<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">

<!-- start of Type -->
<tr>
	<th><label>Carrier</label></th>
	<th>&nbsp;</th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
	
	<tr>	
	
	<td>
		<select name="sim_carrier" id="sim_carrier" tabindex="1">
		<option value="0">ANY</option>

		<?php

		$sql = "SELECT * FROM troubador_device.sim_carrier ORDER BY ID ASC";

		echo $rs = mysql_query($sql, $connect);
		while ($fetch = mysql_fetch_assoc($rs))
		{
		  
	
			 if (strlen($sim_carrier) > 0)
			{
				if ($sim_carrier == $fetch['CarrierName'])
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
	<td></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<!-- end of Type -->
<!-- start of Location -->
<tr>

	<th><label>Location</label></th>
	<th>&nbsp;</a></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
	
	<tr>	
	
	<td>
		<select name="sim_loc_id" id="sim_loc_id" tabindex="2">
				<option value="0">ANY</option>

				<?php

				$sql = "SELECT * FROM troubador_device.location ORDER BY id ASC";
				
				$rs = mysql_query($sql, $connect);
				while ($fetch = mysql_fetch_assoc($rs))
				{
				 
					//echo "<option value='" . $fetch['id'] . "'>" . $fetch['name'] . "</option>\n";  
 
					 if (strlen($sim_loc_id) > 0)
					{
						if ($sim_loc_id == $fetch['id'])
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
	<td></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<!-- end of Location -->
<!-- start of Assigned # -->
<tr>

	<th><label>ICCID</label></th>
	<th>&nbsp;</th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>	
	</tr>
	<tr>	
	
	<th>
	<input value="<?=$sim_iccid?>" name="sim_iccid" size="40" class="edit" id="sim_iccid" type="text" tabindex="3">

	</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&#160;</th>
	<th>&#160;</th>
	<th>&nbsp;</th>
</tr>
<!-- end of Assigned # -->
<!-- start of Revision # -->
<tr>

	<th><label>ID</label></th>
	<th>&nbsp;</th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>	
	</tr>
	<tr>	
	
	<th>
	<input value="<?=$sim_id?>" name="sim_id" size="20" class="edit" id="sim_id" type="text" tabindex="4">

	</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&#160;</th>
	<th>&#160;</th>
	<th>&nbsp;</th>
</tr>
<!-- end of Revision # -->


<!-- start of IMEI -->
<tr>

	<th><label>IMSI</label></th>
	<th>&nbsp;</th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
	
	</tr>
	
	<tr>	
	
	<th>
	<input value="<?=$sim_imsi?>" name="sim_imsi" size="20" class="edit" id="sim_imsi" type="text" tabindex="6">
	</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&#160;</th>
	<th>&#160;</th>
	<th>&nbsp;</th>
</tr>
<!-- end of IMEI -->
<!-- start of Bootroom -->
<tr>

	<th><label>MSISDN</label></th>
	<th>&nbsp;</th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
	
	</tr>
	
	<tr>	
	
	<th>
	<input value="<?=$sim_msisdn?>" name="sim_msisdn" size="20" class="edit" id="sim_msisdn" type="text" tabindex="7">
	</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&#160;</th>
	<th>&#160;</th>
	<th>&nbsp;</th>
</tr>
<!-- end of Bootroom -->

<!-- start of assigned to -->
<tr>

	<th><label>Assigned To</a></th>
	<th>&nbsp;</th>
	</tr>
<tr>
	<td>
	<select name="sim_user_id" id="sim_user_id" tabindex="8">
	<option value="0">ANY</option>

	<?php

	$sql2 = "SELECT username, id FROM troubador_device.users WHERE isactive = 1 order by username asc";

	$rs2 = mysql_query($sql2, $connect);
	while ($fetch2 = mysql_fetch_assoc($rs2))
	{  

	if (strlen($sim_user_id) > 0)
	{
	if ($sim_user_id == $fetch2['id'])
	{ 
		echo "<option value='" . $fetch2['id'] . "'" . " selected" . ">" . $fetch2['username'] . "</option>\n";  
	}
	else
	{
	  echo "<option value='" . $fetch2['id'] . "'>" . $fetch2['username'] . "</option>\n";  
	}

	}
	else
	{
	echo "<option value='" . $fetch2['id'] . "'>" . $fetch2['username'] . "</option>\n";  
	}

	}

	?>
	</select>
	</td>
</tr>
<!-- end of assigned to-->

<!-- start of owner name -->
<tr>

	<th><label>Owner Name</a></th>
	<th>&nbsp;</th>
	</tr>
<tr>
	<td>
	<select name="sim_owner_id" id="sim_owner_id" tabindex="9">
	<option value="0">ANY</option>

	<?php

	$sql2 = "SELECT username, id FROM troubador_device.users WHERE isactive = 1 order by username asc";

	$rs2 = mysql_query($sql2, $connect);
	while ($fetch2 = mysql_fetch_assoc($rs2))
	{  

	if (strlen($sim_owner_id) > 0)
	{
	if ($sim_owner_id == $fetch2['id'])
	{ 
		echo "<option value='" . $fetch2['id'] . "'" . " selected" . ">" . $fetch2['username'] . "</option>\n";  
	}
	else
	{
	  echo "<option value='" . $fetch2['id'] . "'>" . $fetch2['username'] . "</option>\n";  
	}

	}
	else
	{
	echo "<option value='" . $fetch2['id'] . "'>" . $fetch2['username'] . "</option>\n";  
	}

	}

	?>
	</select>
	</td>
</tr>
<!-- end of owner name-->
<!-- start of notes -->
<tr>

	<th><label>Notes</label></th>
	<th>&nbsp;</th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&#160;</th>
	<th>&#160;</th>
	</tr>
	
	<tr>	
	<td>	
	<textarea rows="4" name="sim_notes" id="sim_notes" cols="100" tabindex="10" ><?=$sim_notes?></textarea>	
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

	<th colspan="2">
	<input type="checkbox" name="sim_in_svv" id="sim_in_svv"  class="checkbox" tabindex="11" <? if ($sim_in_svv=="Y") echo " checked "; ?>/>
	<label>In SV&V</label> &nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="sim_conference_call" id="sim_conference_call"  class="checkbox" tabindex="12" <? if ($sim_conference_call =="Y") echo " checked "; ?>/>
	<label>Con Call</label>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="sim_international_call" id="sim_international_call" class="checkbox" tabindex="13"<? if ($sim_international_call=="Y") echo " checked "; ?>/>
	<label>International Call</label>&nbsp;&nbsp;&nbsp;&nbsp;

	<input type="checkbox" name="sim_call_forwarding"  id="sim_call_forwarding" class="checkbox" tabindex="14" <? if ($sim_call_forwarding =="Y") echo " checked "; ?>/>
	<label>Call Fwding</label>&nbsp;&nbsp;&nbsp;&nbsp;
	
	<input type="checkbox" name="sim_call_barring" id="sim_call_barring"  class="checkbox" tabindex="15" <? if ($sim_call_barring=="Y") echo " checked "; ?>/>
	<label>Call Barring</label>&nbsp;&nbsp;&nbsp;&nbsp;

	<input type="checkbox" name="sim_call_waiting" id="sim_call_waiting" class="checkbox" tabindex="16" <? if ($sim_call_waiting=="Y") echo " checked "; ?>/>
	<label>Call Waiting</label>&nbsp;&nbsp;&nbsp;&nbsp;

	<input type="checkbox" name="sim_voice_mail"  id="sim_voice_mail" class="checkbox" tabindex="17" <? if ($sim_voice_mail=="Y") echo " checked "; ?>/>
	<label>Voice Mail</label>  
	<input type="checkbox" name="sim_telenav"  id="sim_telenav" class="checkbox" tabindex="18" <? if ($sim_telenav=="Y") echo " checked "; ?>/>
	<label>Telenav</label> 
   </th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>  
	<th>&nbsp;</th> 
	
</tr>	
<!-- end of checkboxes-->
<!-- start of row2 checkboxes -->
<tr>
	<th colspan="2">
	<input type="checkbox" name="sim_als" id="sim_als"  class="checkbox" tabindex="19" <? if ($sim_als =="Y") echo " checked "; ?>/>
	<label>ALS</label>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="sim_modem" id="sim_modem"  class="checkbox" tabindex="20" <? if ($sim_modem =="Y") echo " checked "; ?>/>
	<label>Modem</label>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="sim_plmn" id="sim_plmn" class="checkbox" tabindex="21" <? if ($sim_plmn=="Y") echo " checked "; ?>/>
	<label>PLMN</label>&nbsp;&nbsp;&nbsp;&nbsp;

	<input type="checkbox" name="sim_myfaves"  id="sim_myfaves" class="checkbox" tabindex="22" <? if ($sim_myfaves=="Y") echo " checked "; ?>/>
	<label>MyFaves</label>&nbsp;&nbsp;&nbsp;&nbsp;
	
	<input type="checkbox" name="sim_sms" id="sim_sms"  class="checkbox" tabindex="23" <? if ($sim_sms=="Y") echo " checked "; ?>/>
	<label>SMS</label>&nbsp;&nbsp;&nbsp;&nbsp;

	<input type="checkbox" name="sim_voice" id="sim_voice" class="checkbox" tabindex="24" <? if ($sim_voice=="Y") echo " checked "; ?>/>
	<label>Voice</label>&nbsp;&nbsp;&nbsp;&nbsp;

	<input type="checkbox" name="sim_data_only"  id="sim_data_only" class="checkbox" tabindex="25" <? if ($sim_data_only=="Y") echo " checked "; ?>/>
	<label>Data Only</label>  &nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="sim_corporate"  id="sim_corporate" class="checkbox" tabindex="26" <? if ($sim_corporate=="Y") echo " checked "; ?>/>
	<label>Corporate</label>  &nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="sim_wispr"  id="sim_wispr" class="checkbox" tabindex="27" <? if ($sim_wispr=="Y") echo " checked "; ?>/>
	<label>WISPr</label>  &nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="sim_talkx"  id="sim_talkx" class="checkbox" tabindex="28" <? if ($sim_wispr=="Y") echo " checked "; ?>/>
	<label>Talk to person X</label>
   </th>
   <th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>  
	<th>&nbsp;</th> 

    
	
</tr>	
<!-- end of checkboxes-->

<!-- start of submit -->
<tr>

	<th>
	<input type="hidden" name="query_string" id="query_string" value="<?=$query_string?>">
	<input type="submit"  value="Submit" name="submit" id="submit" tabindex="29">&nbsp;&nbsp; 
	<!-- <input type="reset" value="Reset" name="B2" class="smallerboxsp"> -->
	</th>
	<th>&nbsp;</th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
</tr>
	

<!-- end of submit-->
<!-- start of submit -->
<tr>

	<th><span id="returned_value" ></span></th>
	<th>&nbsp;</th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
</tr>
	

<!-- end of submit-->

<tr>

</tr>
</table>
</form>

<!-- end of form -->		
<?
}
?>

<div style="margin: 3em auto auto auto; text-align: center;">


</div>
</body>
</html>