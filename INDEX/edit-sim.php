<?
require "loginstuff.php";
require 'globalheader.php';
$simcard_id = $_REQUEST['simcard_id'];
$query_string = $_SERVER['QUERY_STRING'];
$sql = "SELECT u.Id AS id, u.Id AS userid, u.username AS username, s.ICCID AS ICCID, s.Carrier AS Carrier, "
	 . " s.ID AS ID, s.user_id AS user_id, s.IMSI AS IMSI, s.MSISDN AS MSISDN, "
     . " s.owner_id AS owner_id, s.loc_id AS loc_id, s.In_SVV AS In_SVV, s.Conference_Call AS Conference_Call, "
     . " s.International_Call AS International_Call, s.Call_Forwarding AS Call_Forwarding, s.Call_Barring AS Call_Barring, "
     . " s.Call_Waiting AS Call_Waiting, s.Voice_Mail AS Voice_Mail,  "	 
	 . " s.Notes AS Notes, s.Util AS Util, s.Sign_out AS Sign_out "	
	 . " FROM troubador_device.simcards AS s LEFT JOIN users AS u ON s.user_id = u.Id WHERE s.simcard_id = $simcard_id ";

	 
 $rs = mysql_query($sql, $connect);
$num_rows = mysql_num_rows($rs);
$fetch = mysql_fetch_assoc($rs);
$sim_iccid = $fetch['ICCID'];
$sim_carrier = $fetch['Carrier'];
$sim_id = $fetch['ID'];
$sim_imsi = $fetch['IMSI'];
$sim_msisdn = $fetch['MSISDN'];
$sim_user_id = $fetch['user_id'];
$sim_owner_id = $fetch['owner_id'];
$sim_loc_id = $fetch['loc_id'];
$sim_in_svv = $fetch['In_SVV'];
$sim_conference_call= $fetch['Conference_Call'];
$sim_international_call = $fetch['International_Call'];
$sim_call_forwarding = $fetch['Call_Forwarding'];
$sim_call_barring = $fetch['Call_Barring'];
$sim_call_waiting = $fetch['Call_Waiting'];
$sim_voice_mail = $fetch['Voice_Mail'];
$sim_telenav = $fetch['Telenav'];
$sim_als  = $fetch['ALS'];
$sim_modem = $fetch['modem'];

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


if (strlen($_REQUEST['submit']))
{


	 $hh_type = $_REQUEST['hh_type'];
	 $hh_location = $_REQUEST['hh_location'];
	 $hh_assigned_num = $_REQUEST['hh_assigned_num'];
	 $hh_revision_num = $_REQUEST['hh_revision_num'];
	 $hh_pin = $_REQUEST['hh_pin'];
	 $hh_imei = $_REQUEST['hh_imei'];
	 $hh_bootrom = $_REQUEST['hh_bootrom'];
	 $hh_cpr = $_REQUEST['hh_cpr'];
	 $hh_userid = $_REQUEST['hh_userid'];
	 $hh_notes = $_REQUEST['hh_notes'];
	if ($_REQUEST['xhh_is_secure'] == 'on')
	{	$xhh_is_secure = 1; } else { $xhh_is_secure = 0; } 
	if ($_REQUEST['xhh_is_corp'] == 'on')
	{	$xhh_is_corp = 1; } else { $xhh_is_corp = 0; }
	if ($_REQUEST['xhh_is_otasl'] == 'on')
	{ 	$xhh_is_otasl = 1; } else { $xhh_is_otasl = 0; } 

	 $sqlupdate = "UPDATE simcards SET type = '$hh_type', AssignedNumber = $hh_assigned_num, RevisionNumber = $hh_revision_num, "
			.    "PIN = '$hh_pin',  IMEI = '$hh_imei', Notes = '$hh_notes' WHERE Id = $handheld_id ";
			
	$rsupdate = mysql_query ($sqlupdate, $connect);
	
	 $query_string = $_REQUEST['query_string'];
	
	?>
	<script type="text/javascript">
	
	location.href = "imsearchsim-run.php?<?=$query_string?>";
	
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
	<th>&nbsp;test</th>

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
		<select name="sim_location" id="sim_location" tabindex="2">
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

	<th><a href="">Assigned To</a></th>
	<th>&nbsp;</th>
	</tr>
<tr>
	<td>
	<select name="sim_user_id" id="sim_user_id" tabindex="9">
	<option value="any">ANY</option>

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

	<th><a href="">Owner Name</a></th>
	<th>&nbsp;</th>
	</tr>
<tr>
	<td>
	<select name="sim_owner_id" id="sim_owner_id" tabindex="9">
	<option value="any">ANY</option>

	<?php

	$sql2 = "SELECT username, Id FROM troubador_device.users WHERE isactive = 1 order by username asc";

	echo $rs2 = mysql_query($sql2, $connect);
	while ($fetch2 = mysql_fetch_assoc($rs2))
	{  

		if (strlen($sim_owner_id) > 0)
		{
			if ($sim_owner_id== $fetch2['Id'])
			{ 
				
				echo "<option value='" . $fetch2['Id'] . "'" . " selected" . ">" . $fetch2['username'] . "</option>\n";  
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
	<th>&nbsp;</th><th>&#160;</th>
	<th>&#160;</th></tr>
	
	<tr>	
	
	<td>
	
	<textarea rows="4" name="sim_notes" id="sim_notes" cols="40" tabindex="9" ><?=$sim_notes?></textarea>
	
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
	<th><input type="checkbox" name="xhh_is_secure" id="xhh_is_secure"  class="checkbox" <? if ($hh_is_secure) echo " checked "; ?>/><a href="">Conference Call</a>
	<input type="checkbox" name="xhh_is_corp" id="xhh_is_corp" class="checkbox"<? if ($hh_is_corp) echo " checked "; ?>/><a href="">International Call</a>
	<input type="checkbox" name="xhh_is_otasl"  id="xhh_is_otasl" class="checkbox" <? if ($hh_is_otasl) echo " checked "; ?>/><a href="">Call Forwarding</a>
	<th><input type="checkbox" name="xhh_is_secure" id="xhh_is_secure"  class="checkbox" <? if ($hh_is_secure) echo " checked "; ?>/><a href="">Call Barring</a>
	<input type="checkbox" name="xhh_is_corp" id="xhh_is_corp" class="checkbox"<? if ($hh_is_corp) echo " checked "; ?>/><a href="">Call Waiting</a>
	<input type="checkbox" name="xhh_is_otasl"  id="xhh_is_otasl" class="checkbox" <? if ($hh_is_otasl) echo " checked "; ?>/><a href="">Voicemail</a>  
   </th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>	
<!-- end of checkboxes-->
<!-- start of row2 checkboxes -->
<tr>
	<th><input type="checkbox" name="xhh_is_secure" id="xhh_is_secure"  class="checkbox" <? if ($hh_is_secure) echo " checked "; ?>/><a href="">Conference Call</a>
	<input type="checkbox" name="xhh_is_corp" id="xhh_is_corp" class="checkbox"<? if ($hh_is_corp) echo " checked "; ?>/><a href="">International Call</a>
	<input type="checkbox" name="xhh_is_otasl"  id="xhh_is_otasl" class="checkbox" <? if ($hh_is_otasl) echo " checked "; ?>/><a href="">Call Forwarding</a>
	<th><input type="checkbox" name="xhh_is_secure" id="xhh_is_secure"  class="checkbox" <? if ($hh_is_secure) echo " checked "; ?>/><a href="">Call Barring</a>
	<input type="checkbox" name="xhh_is_corp" id="xhh_is_corp" class="checkbox"<? if ($hh_is_corp) echo " checked "; ?>/><a href="">Call Waiting</a>
	<input type="checkbox" name="xhh_is_otasl"  id="xhh_is_otasl" class="checkbox" <? if ($hh_is_otasl) echo " checked "; ?>/><a href="">Voicemail</a>  
   </th>
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
	<input type="submit"  value="Submit" name="submit" id="submit" tabindex="16">&nbsp;&nbsp; 
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
