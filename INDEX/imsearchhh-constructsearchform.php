<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div id="navAlpha" >

	<table cellpadding="0" cellspacing="0" border="0" id="list" align="left">
	<form action="<?=$_SERVER['PHP_SELF']?>" method="GET" name="hhsearchform">
        <tr>
		<td><label>Type</label></td>

		</tr>
		<tr>


		<td>
		<select name="type" id="type" tabindex="1">
		<option value="any">ANY</option>

		<?php
		$handheldtypes = array();

		
		$sql = "SELECT * FROM troubador_device.handheld_type WHERE visibility = 1 ORDER BY Id";
		$rs = mysql_query($sql, $connect);
		
		while ($fetch = mysql_fetch_assoc($rs))
		{
				 $handheldtypes[] = $fetch['type'];
				
				
		}

		sort($handheldtypes);
		
		
		foreach ($handheldtypes as $key=>$val)
		{
			// echo "<option value='" . $fetch['type'] . "'>" . $fetch['type'] . "</option>\n";

			if (strlen($type) > 0)
			{
				if ($type== $val)
				{
				echo "<option value='" . $val . "'" . " selected" . ">" . $val . "</option>\n";
				}
				else
				{
				  echo "<option value='" . $val . "'>" . $val . "</option>\n";
				}

			}
			else
			{
				echo "<option value='" . $val . "'>" . $val . "</option>\n";
			}


		}



		?>

	</select>

		</td>

	</tr>
	<!-- start of location -->

		<tr>
		<tr>
		<td><label>Location</label></td>
		</tr>
		<td>
		<select name="handheld_location" tabindex="2" id="handheld_location">
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
		<td><label>Assigned #</label></td>
		</tr>
		<tr>
		<td>
		<input value="<?=$_SESSION['assigned_num']?>" name="assigned_num" size="5" class="edit" id="assigned_num" type="text" tabindex="3">
		</td>

	</tr>
	<!-- end of assigned# -->
	<!-- start of assigned number -->
     <tr>
		<td><label>Revision #</label></td>
		</tr>
		<tr>
		<td>
		<input value="<?=$_SESSION['revision_num']?>" name="revision_num" size="20" class="edit" id="revision_num" type="text" tabindex="4">
		</td>

	</tr>
	<!-- end of assigned# -->
	<!-- start of pin -->
    <tr>
		<td><label>PIN</label></td>
		</tr>

		<tr>

		<td>
		<input value="<?=$_SESSION['pin']?>" name="pin" size="20" class="edit" id="pin" type="text" tabindex="5">
		</td>
	</tr>
	<!-- end of pin -->
	<!-- start of IMEI -->
	<tr>
		<td><label>IMEI</label></td>
		</tr>
	<tr>
		<td>
		<input value="<?=$_SESSION['imei']?>" name="imei" size="20" class="edit" id="imei" type="text" tabindex="6">

		</td>
	</tr>
	<!-- end of IMEI -->
	<!-- start of bootrom -->
    <tr>
		<td><label>Bootrom version</label></td>
		</tr>
		<tr>
		<td>
		<input value="<?=$bootrom_version?>" name="bootrom_version" size="20" class="edit" id="bootrom_version" type="text" tabindex="7">
		</td>
	</tr>
	<!-- end of bootroom -->

	<!-- start of CPR -->
	<tr>
		<td><label>CPR</label></td>
		</tr>
	<tr>

		<td>
		<input value="<?=$cpr?>" name="cpr" size="20" class="edit" id="cpr" type="text" tabindex="8">
		</td>
	</tr>
	<!-- end of CPR -->
	<!-- start of user -->
	<tr>
	<td><label>User</label></td>
	</tr>
		<tr>

		<td>
		<select name="userid" id="userid" tabindex="9">
		<option value="any">ANY</option>

		<?php

		$sql = "SELECT username, id FROM troubador_device.users WHERE (isactive = 1 AND email <> '') OR (username LIKE '%OTASL%')  order by username asc";

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
			echo 'checked="checked"';
			//$_SESSION['hh_available_only'] = $_REQUEST['hh_available_only'];
		}
		?>

		class="checkbox" tabindex="10"/><label>Available Only</label>
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

		class="checkbox" tabindex="11"/><label>Secure Only</label>

		<input type="checkbox" name="hh_is_not_secure" id="hh_is_not_secure" 

		<?
		//if ( ($_REQUEST['hh_available_only'] =="on") or ($_SESSION['hh_available_only']) )
		if ($hh_is_not_secure == "on")
		{
			echo 'checked="checked"';
			//$_SESSION['hh_available_only'] = $_REQUEST['hh_available_only'];
		}
		?>

		class="checkbox" tabindex="11"/><label>Insecure Only</label>
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

		class="checkbox" tabindex="12"/><label>Corporate Only</label>
		</td>

	</tr>
	<!-- end of corporate-->
	




	<!-- start of submit -->
	<tr>

		<td><input type="submit" value="Search" name="search" id="search" class="smallerboxsp" title="search" tabindex="14" /></td>
		<td>&nbsp;</td>
	</tr>


	<!-- end of submit-->
	<tr>
	</tr>
	</table>
</form>

 </div>
<!-- end of the form -->
<?
?>
