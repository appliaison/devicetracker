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

	<!-- start of user -->
	<tr>
	<td><label>Status</label></td>
	</tr>
		<tr>

		<td>
		<select name="userid" id="userid" tabindex="9">
		<option value="any">ANY</option>

		<?php

		$sql = "SELECT username, id FROM troubador_device.users WHERE ((Id < 15 OR Id = 248) AND (isactive = 1))  order by username asc";

		$rs = mysql_query($sql, $connect);
		
		
		while ($fetch = mysql_fetch_assoc($rs))
		{
		 //echo "<option value='" . $fetch['id'] . "'>" . $fetch['username'] . "</option>\n";

		  if (strlen($userid) > 0)
			{
				if ($_REQUEST['userid']	== $fetch['id'])
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
