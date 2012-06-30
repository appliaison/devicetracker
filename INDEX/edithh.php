<?
require "loginstuff.php";
require 'globalheader.php';
?>
            <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
                    <table cellpadding="0" cellspacing="0" align="center"><tr>
                            <td valign="middle" style="width:368px">&nbsp;</td>
							<td class="tabdown"><a href="home.php" class="plain">Home</a></td>
                            <td class="tabup"><a href="handhelds.php" class="plain">Handhelds</a></td>
                            <td class="tabdown"><a href="simcards.php" class="plain">SIM cards</a></td>
                            <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

                        </tr>
                    </table></td></tr>
            <tr id="nav-secondary">
                <td align="center" class="tabs" colspan="2">

                    <table cellpadding="0" cellspacing="0" align="center"><tr>
                            <td class="tabup"><a href="index.php" class="plain">Search HH</a></td>
                            <td class="tabdown2"><a href="addhh.php" class="plain">Add HH</a></td>
							<td class="tabdown2"><a href="hhtypes.php" class="plain">HH Types</a></td>
                            <td class="tabdown2"><a href="displayhistoryhh.php" class="plain">History</a></td>
                            <td class="tabdown2"><a href="export.php" class="plain">Export to Excel</a></td></tr>
                    </table>
                </td>
            </tr>

        </table>
<?
echo $hh_userid;
if (strlen($_REQUEST['btn_submit']) > 0)
{
		$handheld_id = $_REQUEST['handheld_id'];
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
		
		$hh_userid = $_REQUEST['hh_userid'];

		$sql = "SELECT * FROM troubador_device.handhelds WHERE Id = $handheld_id ";
		$rs = mysql_query($sql, $connect);
		$num_rows = mysql_num_rows($rs);

		if ($num_rows==1)
		{
		$sqlupdate = "UPDATE handhelds SET type = '$hh_type', loc_id = $hh_location, AssignedNumber = $hh_assigned_num, RevisionNumber = '$hh_revision_num', PIN = '$hh_pin', "
					. " IMEI = '$imei', bootrom = '$hh_bootrom', CPR = '$hh_cpr', userid=$hh_userid, Notes = '$hh_notes', is_secure = $xhh_is_secure, is_corp = $xhh_is_corp WHERE "
					. " Id = $handheld_id ";

		$rsupdate = mysql_query($sqlupdate, $connect);
		?>
		<script type="text/javascript">
		location.href="index.php?handheld_id=<?=$handheld_id?>";
		</script>
		<?
		}

}
else
{

	$handheld_id = $_GET['handheld_id'];


	if (strlen($_REQUEST['handheld_id']) > 0)
	{



	$sql = "SELECT * FROM troubador_device.handhelds WHERE Id = $handheld_id ";
	$rs = mysql_query($sql, $connect);
	$num_rows = mysql_num_rows($rs);

		if ($num_rows > 0)
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
			
			
		}
	}

			
	?>	
	<form name="editsubmit" method="POST" action="<?=$_SERVER['PHP_SELF']?>?handheld_id=<?=$handheld_id?>">	
	<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">

	<!-- start of Type -->
	<tr>
		<th><label>Type</label></th>
		<th>&nbsp;</th>

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

		<th><label>Location</label></th>
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

		<th><label>Assigned #</label></th>
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

		<th><label>Revision #</label></th>
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

		<th><label>PIN</label></th>
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

		<th><label>IMEI</label></th>
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

		<th><label>Bootroom Version</label></th>
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

		<th><label>CPR</label></th>
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

		<th><label>Notes</label></th>
		<th>&nbsp;</th>

		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th><th>&#160;</th>
		<th>&#160;</th></tr>
		
		<tr>	
		
		<td>
		
		<textarea rows="1" name="hh_notes" id="hh_notes" cols="40" tabindex="9" ><?=$hh_notes?></textarea>
		
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
		<th>
		<input type="checkbox" name="xhh_is_secure" id="xhh_is_secure"  class="checkbox" <? if ($hh_is_secure) echo " checked "; ?> /><a href="">Secure</label>
		<input type="checkbox" name="xhh_is_corp" id="xhh_is_corp" class="checkbox"<? if ($hh_is_corp) echo " checked "; ?>/><a href="">Corporate</label>


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
		<input type="hidden" value="<?=$hh_userid?>" name="hh_userid" id="hh_userid">
		<input type="hidden"  value="<?=$handheld_id?>" name="handheld_id" id="handheld_id">
		<input type="submit"  value="Submit" name="btn_submit" id = "btn_submit" tabindex="16">&nbsp;&nbsp; 
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
<?
}
?>

<!-- end of form -->		


<div style="margin: 3em auto auto auto; text-align: center;">


</div>
</body>
</html>