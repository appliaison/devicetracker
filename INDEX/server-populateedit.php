<?
session_start();
if(!session_is_registered("email"))
{
	header("location:index.php");
}

$handheld_id = $_GET['handheld_id'];
$formtitle_id = $_GET['formtitle_id'];
$getstringvalue = $_GET['getstringvalue'];

$connect = mysql_connect('localhost', 'devicetracker', 'device');
$select = mysql_select_db('devicetracker') ;

$_SESSION['formtitle_id'] = $formtitle_id;

$sql = "SELECT * FROM troubador_device.handhelds WHERE Id = $formtitle_id ";
$rs = mysql_query($sql, $connect);
$num_rows = mysql_num_rows($rs);
?>
<form name="editsubmit" method="POST" action="imsearchhh.php?handheld_id=<?=$handheld_id?>">
<table cellpadding="0" cellspacing="0" border="0" id="list" align="left">
				
				<tr>	
				
				<th>
			
				</th>
				<th>&nbsp;</th>
			</tr>
<?
if ($num_rows==1)
{
	$fetch = mysql_fetch_assoc($rs);
	$hh_type = $fetch['type'];
	$hh_assigned_num = $fetch['AssignedNumber'];
	$hh_revision_num = $fetch['RevisionNumber'];
	$hh_mb = $fetch['MB'];
	$hh_pin = $fetch['PIN'];
	$hh_esn = $fetch['ESN'];
	$hh_imei = $fetch['IMEI'];
	$hh_notes = $fetch['Notes'];
	$hh_status = $fetch['Status'];
	$hh_userid = $fetch['userid'];
	$hh_bootrom = $fetch['bootrom'];
	$hh_location = $fetch['loc_id'];
	$hh_cpr = $fetch['CPR'];
	$hh_loc_id = $fetch['loc_id'];
	$hh_is_secure = $fetch['is_secure'];
	$hh_is_corp = $fetch['is_corp'];
	$hh_is_otasl = $fetch['is_otasl'];
	

	//echo $hh_assigned_num;

	?>
			
			<!-- start of Type -->
			<tr>
				<th><a href="">Type</a></th>
				<th><a href="">&nbsp;</a></th>

			</tr>
				
				<tr>	
				
				<td>
				<select name="hh_type" id="hh_type" tabindex="1">
				<option value="0">ANY</option>

				<?php

				$sql = "SELECT * FROM troubador_device.handheld_type ORDER BY Id ASC";
				
				$rs = mysql_query($sql, $connect);
				while ($fetch = mysql_fetch_assoc($rs))
				{
				  
					//echo "<option value='" . $fetch['type'] . "'>" . $fetch['type'] . "</option>\n";  
					 if (strlen($hh_type) > 0)
					{
						if ($hh_type == $fetch['type'])
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
				<td></td>
				<td>&nbsp;</td>

			</tr>
			<!-- end of Type -->
			<!-- start of Location -->
			<tr>

				<th><a href="">Location</a></th>
				<th>&nbsp;</a></th>
				
				</tr>
				
				<tr>	
				
				<td>
					<select name="hh_location" id="hh_location" tabindex="2">
				<option value="0">ANY</option>

				<?php

				$sql = "SELECT * FROM troubador_device.location ORDER BY id ASC";
				
				$rs = mysql_query($sql, $connect);
				while ($fetch = mysql_fetch_assoc($rs))
				{
				 
					//echo "<option value='" . $fetch['id'] . "'>" . $fetch['name'] . "</option>\n";  
 
					 if (strlen($hh_loc_id) > 0)
					{
						if ($hh_loc_id == $fetch['id'])
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
			</tr>
			<!-- end of Location -->
			<!-- start of Assigned # -->
			<tr>

				<th><a href="">Assigned #</a></th>
				<th>&nbsp;</th>
				</tr>
				<tr>	
				
				<th>
				<input value="<?=$hh_assigned_num?>" name="hh_assigned_num" size="20" class="edit" id="hh_assigned_num" type="text" tabindex="3">
				</th>
				<th>&nbsp;</th>
			</tr>
			<!-- end of Assigned # -->
			<!-- start of Revision # -->
			<tr>

				<th><a href="">Revision #</a></th>
				<th>&nbsp;</th>
				</tr>
				<tr>	
				
				<th>
				<input value="<?=$hh_revision_num?>" name="hh_revision_num" size="20" class="edit" id="hh_revision_num" type="text" tabindex="4">
				</th>
				<th>&nbsp;</th>
			</tr>
			<!-- end of Revision # -->
			<!-- start of PIN -->
			<tr>

				<th><a href="">PIN</a></th>
				<th>&nbsp;</th>

				
				</tr>
				
				<tr>	
				
				<th>
				<input value="<?=$hh_pin?>" name="hh_pin" size="20" class="edit" id="hh_pin" type="text" tabindex="5">
				</th>
				<th>&nbsp;</th>

				</tr>
			<!-- end of PIN -->

			<!-- start of IMEI -->
			<tr>

				<th><a href="">IMEI</a></th>
				<th>&nbsp;</th>

				
				</tr>
				
				<tr>	
				
				<th>
				<input value="<?=$hh_imei?>" name="hh_imei" size="20" class="edit" id="hh_imei" type="text" tabindex="6">
				</th>
				<th>&nbsp;</th>

			</tr>
			<!-- end of IMEI -->
			<!-- start of Bootroom -->
			<tr>

				<th><a href="">Bootroom Version</a></th>
				<th>&nbsp;</th>

				
				</tr>
				
				<tr>	
				
				<th>
				<input value="<?=$hh_bootrom?>" name="hh_bootrom" size="20" class="edit" id="hh_bootrom" type="text" tabindex="7">
				</th>
				<th>&nbsp;</th>

			</tr>
			<!-- end of Bootroom -->
			<!-- start of MB -->
			<tr>

				<th><a href="">CPR</a></th>
				<th>&nbsp;</th>
				
				</tr>
				
				<tr>	
				
				<th>
				<input value="<?=$hh_cpr?>" name="hh_cpr" size="20" class="edit" id="hh_cpr" type="text" tabindex="8">
				</th>
				<th>&nbsp;</th>

			</tr>
			<!-- end of MB -->
			
			<!-- start of user -->
			<tr>

				<th><a href="">User</a></th>
				<th>&nbsp;</th>
				</tr>
			<tr>
				<td>
				<select name="hh_userid" id="hh_userid" tabindex="9">
				<option value="any">ANY</option>

				<?php

				$sql = "SELECT username, id FROM troubador_device.users WHERE isactive = 1 order by username asc";

				$rs = mysql_query($sql, $connect);
				while ($fetch = mysql_fetch_assoc($rs))
				{
				//echo "<option value='" . $fetch['id'] . "'>" . $fetch['username'] . "</option>\n";  

				if (strlen($userid) > 0)
				{
				if ($hh_userid== $fetch['id'])
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
			<!-- start of notes -->
			<tr>

				<th><a href="">Notes</a></th>
				<th>&nbsp;</th>
				</tr>
				
				<tr>	
				
				<td>
				
				<textarea rows="1" name="hh_notes" id="hh_notes" cols="40" tabindex="9" ><?=$hh_notes?></textarea>
				
				</td>

			</tr>
			<!-- end of notes-->
			<!-- start of checkboxes -->
			<tr>
				<th><input type="checkbox" name="xhh_is_secure" id="xhh_is_secure"  class="checkbox" 
				<? if ($hh_is_secure) echo " checked "; ?>/><a href="">Secure</a>
				<input type="checkbox" name="xhh_is_corp" id="xhh_is_corp" class="checkbox"<? if ($hh_is_corp) echo " checked "; ?>/><a href="">Corporate</a>
				<input type="checkbox" name="xhh_is_otasl"  id="xhh_is_otasl" class="checkbox" <? if ($hh_is_otasl) echo " checked "; ?>/><a href="">OTASL</a>

				</th>

			</tr>	
			<!-- end of checkboxes-->
			
		<?
}
?>
<tr>
<th>
<input type="submit"  value="Submit" name="B1" onClick="hh_save_sendRequest('<?=$getstringvalue?>')" tabindex="10">
<input type="button" name="cancel" value="Cancel" onclick="closebox()">	

</th>
</tr>
</table>
</form>