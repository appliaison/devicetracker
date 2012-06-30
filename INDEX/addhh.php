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
                            <td class="tabdown2"><a href="index.php" class="plain">Search HH</a></td>
							<td class="tabdown2"><a href="quicksearchhh.php" class="plain">Quicksearch</a></td>
							 <td class="tabdown2"><a href="qsigninhh.php" class="plain">Quicksignin</a></td>
							 <td class="tabdown2"><a href="qsignouthh.php" class="plain">Quicksignout</a></td>
                            <td class="tabup"><a href="addhh.php" class="plain">Add HH</a></td>
							<td class="tabdown2"><a href="hhtypes.php" class="plain">HH Types</a></td>
                            <td class="tabdown2"><a href="displayhistoryhh.php" class="plain">History</a></td>
                  
							</tr>
                    </table>
                </td>
            </tr>

        </table>
<?
require 'checkadmin.php';
?>

<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">		
<?


if (isset($_REQUEST['submit']))
{

	$hh_type = $_REQUEST['hh_type']; 																						// type
	$hh_location = $_REQUEST['hh_location'];																				// location
	if (strlen($_REQUEST['hh_assigned_num'])>0) $hh_assigned_num = $_REQUEST['hh_assigned_num']; else $hh_assigned_num = -1; // assigned num
	if (strlen($_REQUEST['hh_revision_num'])>0) $hh_revision_num = $_REQUEST['hh_revision_num']; else $hh_revision_num = 'NULL'; // revision num
	if (strlen($_REQUEST['hh_pin'])>0) $hh_pin = $_REQUEST['hh_pin']; else $hh_pin = 'NULL';									// pin
	if (strlen($_REQUEST['hh_imei'])>0) $hh_imei = $_REQUEST['hh_imei']; else $hh_imei = 'NULL';								// imei
	if (strlen($_REQUEST['hh_bootrom'])>0) $hh_bootrom = $_REQUEST['hh_bootrom']; else $hh_bootrom = 'NULL';				// bootroom
	if (strlen($_REQUEST['hh_notes'])>0) $hh_notes = $_REQUEST['hh_notes']; else $hh_notes = 'NULL';							// notes
	if (strlen($_REQUEST['is_secure'])>0) $is_secure = $_REQUEST['is_secure']; else $is_secure = 2;									// is_secure
	if (strlen($_REQUEST['is_corp'])>0) $is_corp = $_REQUEST['is_corp']; else $is_corp = 2;										// is_corp
	if (strlen($_REQUEST['hh_cpr'])>0) $hh_cpr = $_REQUEST['hh_cpr']; else $hh_cpr = 'NULL';									// CPR
	$hh_status = 'AVAILABLE';
	$hh_userid = 666;



	//$date = '2009-06-11';
	$today = date("Y-n-j"); 

	$sqlcheck1 = "SELECT * FROM troubador_device.handhelds WHERE PIN = '$hh_pin' ";
	$rscheck1 = mysql_query($sqlcheck1, $connect);
	$num_rows1 = mysql_num_rows($rscheck1);


	if ($num_rows1>0)
	{

		echo "FAIL-PINEXISTS";
		
	}

	else
	{
		$sqlfind = "SELECT MAX(Id) AS max_id FROM troubador_device.handhelds ";
		$rsfind = mysql_query($sqlfind, $connect) or die(mysql_error());
		$fetchfind = mysql_fetch_assoc($rsfind);
		$max_id = $fetchfind['max_id'] + 1;
		
		

		$sql = "INSERT INTO devicetracker.handhelds (type, AssignedNumber, RevisionNumber, PIN, IMEI, Notes, "
		. " Status, userid, timestamp, bootrom, loc_id,  is_secure, is_corp, CPR ) " 
		. " VALUES ('$hh_type', $hh_assigned_num, '$hh_revision_num', '$hh_pin', '$hh_imei', '$hh_notes', "
		. " '$hh_status', '$hh_userid', '$today', '$hh_bootrom', $hh_location, $is_secure, $is_corp,  '$hh_cpr') ";


		$result = mysql_query($sql, $connect);
		
		
		
		?>
		<script type="text/javascript">
		location.href = "index.php?handheld_id=<?=$max_id?>";
		</script>
		<?

		if (!$result)
		{
			echo $sql;
		}
	}
}

else
{

?>		
		
<form name="addhh" method="post" action="<?=$_SERVER['PHP_SELF']?>">	


<!-- start of Type -->
<tr>
	<th><label>Type</label></th>
	<th>&nbsp;</th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
	
	<tr>	
	
	<td>
	<select name="hh_type" id="hh_type" tabindex="1" onChange="populateAssigned()" >
	<option value="0">ANY</option>

	<?php

	$sql = "SELECT * FROM troubador_device.handheld_type ORDER BY Id ASC";
	
	$rs = mysql_query($sql, $connect);
	while ($fetch = mysql_fetch_assoc($rs))
	{
	 
	 
	 
	    echo "<option value='" . $fetch['type'] . "'>" . $fetch['type'] . "</option>\n";  
	   
	 
	 
	 
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
	 
	 
	 
	    echo "<option value='" . $fetch['id'] . "'>" . $fetch['name'] . "</option>\n";  
	   
	 
	 
	 
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
	<input value="" name="hh_assigned_num" size="20" class="edit" id="hh_assigned_num" type="text" tabindex="3">
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
	<input value="" name="hh_revision_num" size="20" class="edit" id="hh_revision_num" type="text" tabindex="4">
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
	<input value="" name="hh_pin" size="20" class="edit" id="hh_pin" type="text" tabindex="5">
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

	<th><label>IMEI / MEID</label></th>
	<th>&nbsp;</th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
	
	</tr>
	
	<tr>	
	
	<th>
	<input value="" name="hh_imei" size="20" class="edit" id="hh_imei" type="text" tabindex="6">
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
	<input value="" name="hh_bootrom" size="20" class="edit" id="hh_bootrom" type="text" tabindex="7">
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
	<input value="" name="hh_cpr" size="20" class="edit" id="hh_cpr" type="text" tabindex="8">
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
	
	<textarea rows="1" name="hh_notes" id="hh_notes" cols="80" value="" tabindex="9" ></textarea>
	
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
	<th><input type="checkbox" name="hh_is_secure" id="hh_is_secure" value="1" id="sim_in_svv" class="checkbox" tabindex="10" />
	<label>Secure / Insecure</label>
	<input type="checkbox" name="hh_is_corp" value="1" id="hh_is_corp" class="checkbox" tabindex="11" />
	<label>Corporate</label>


    </th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
</tr>	
<!-- end of checkboxes-->

<!-- start of submit -->
<tr>

	<th><input type="submit"  id="submit" name="submit"  value="Add" tabindex="13">&nbsp;&nbsp; 
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

</form>

<!-- end of form -->		
<?

}

?>
</table>
<div style="margin: 3em auto auto auto; text-align: center;">


</div>
</body>
</html>
