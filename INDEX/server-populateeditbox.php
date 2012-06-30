<?
header("content-type: text/xml");
$handheld_id = $_GET['handheld_id'];
$formtitle_id = $_GET['formtitle_id'];


$connect = mysql_connect('localhost', 'devicetracker', 'device');
$select = mysql_select_db('devicetracker') ;

$sql = "SELECT * FROM troubador_device.handhelds WHERE Id = $formtitle_id ";
$rs = mysql_query($sql, $connect);
$num_rows = mysql_num_rows($rs);

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
	//echo $hh_assigned_num;

	?>
		<table cellpadding="0" cellspacing="0" border="0" id="list" align="left">

			<!-- start of Type -->
			<tr>
				<th><a href="">Type</a></th>
				<th><a href="">&nbsp;</a></th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
				
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
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<!-- end of Type -->
			<!-- start of Location -->
			<tr>

				<th><a href="">Location</a></th>
				<th>&nbsp;</a></th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
				
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
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<!-- end of Location -->
			<!-- start of Assigned # -->
			<tr>

				<th><a href="">Assigned #</a></th>
				<th>&nbsp;</th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>	
				</tr>
				<tr>	
				
				<th>
				<input value="<?=$hh_assigned_num?>" name="hh_assigned_num" size="20" class="edit" id="hh_assigned_num" type="text" tabindex="3">
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

				<th><a href="">Revision #</a></th>
				<th>&nbsp;</th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>	
				</tr>
				<tr>	
				
				<th>
				<input value="<?=$hh_revision_num?>" name="hh_revision_num" size="20" class="edit" id="hh_revision_num" type="text" tabindex="4">
				</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&#160;</th>
				<th>&#160;</th>
				<th>&nbsp;</th>
			</tr>
			<!-- end of Revision # -->
			<!-- start of PIN -->
			<tr>

				<th><a href="">PIN</a></th>
				<th>&nbsp;</th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
				
				</tr>
				
				<tr>	
				
				<th>
				<input value="<?=$hh_pin?>" name="hh_pin" size="20" class="edit" id="hh_pin" type="text" tabindex="5">
				</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&#160;</th>
				<th>&#160;</th>
				<th>&nbsp;</th>
			</tr>
			<!-- end of PIN -->

			<!-- start of IMEI -->
			<tr>

				<th><a href="">IMEI</a></th>
				<th>&nbsp;</th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
				
				</tr>
				
				<tr>	
				
				<th>
				<input value="<?=$hh_imei?>" name="hh_imei" size="20" class="edit" id="hh_imei" type="text" tabindex="6">
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

				<th><a href="">Bootroom Version</a></th>
				<th>&nbsp;</th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
				
				</tr>
				
				<tr>	
				
				<th>
				<input value="<?=$hh_bootrom?>" name="hh_bootrom" size="20" class="edit" id="hh_bootrom" type="text" tabindex="7">
				</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&#160;</th>
				<th>&#160;</th>
				<th>&nbsp;</th>
			</tr>
			<!-- end of Bootroom -->
			<!-- start of MB -->
			<tr>

				<th><a href="">CPR</a></th>
				<th>&nbsp;</th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
				
				</tr>
				
				<tr>	
				
				<th>
				<input value="<?=$hh_cpr?>" name="hh_cpr" size="20" class="edit" id="hh_cpr" type="text" tabindex="8">
				</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&#160;</th>
				<th>&#160;</th>
				<th>&nbsp;</th>
			</tr>
			<!-- end of MB -->
			<!-- start of notes -->
			<tr>

				<th><a href="">Notes</a></th>
				<th>&nbsp;</th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th>
				<th>&#160;</th></tr>
				
				<tr>	
				
				<td>
				
				<textarea rows="3" name="hh_notes" id="hh_notes" cols="40" tabindex="9" ><?=$hh_notes?></textarea>
				
				</td>
				<td></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<!-- end of notes-->
			<!-- start of checkboxes -->
			<tr>
				<th><input type="checkbox" name="hh_is_secure" id="hh_is_secure" value="1" id="sim_in_svv" class="checkbox" tabindex="10" /><a href="">Secure / Insecure</a>
				<input type="checkbox" name="hh_is_corp" value="1" id="hh_is_corp" class="checkbox" tabindex="11" /><a href="">Corporate</a>
				<input type="checkbox" name="hh_is_otasl" value="1" id="hh_is_otasl" class="checkbox" tabindex="12" /><a href="">OTASL</a>

				</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>	
			<!-- end of checkboxes-->

			</table>
		<?
}
