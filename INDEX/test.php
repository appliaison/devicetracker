<!-- star of the left frame -->
<form action="<?=$_SERVER['PHP_SELF']?>" method="post" name="longform" ">
<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
<tr>
	<!-- <th class="asc"><a href="index.php?step=list&#38;event=admin&#38;sort=name&#38;dir=desc">Login</a></th> -->
	<th><a href="">Carrier</a></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
	
	<tr>	
	
	<td>
	<select name="sim_carrier">
	<option value="any">ANY</option>

	<?php

	echo $sql = "SELECT * FROM troubador_device.sim_carrier ORDER BY ID";
	$rs = mysql_query($sql, $connect);
	while ($fetch = mysql_fetch_assoc($rs))
	{
	  if (strlen($sim_carrier) > 0)
	  {
		   if ($_SESSION['sim_carrier']	== $fetch['CarrierName'])
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
	    //echo "<option value='" . $fetch['CarrierName'] . "'>" . $fetch['CarrierName'] . "</option>\n";  
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
<!-- start of location -->
<tr>

	<th><a href="">Location</a></th>
	<th><a href="">&nbsp;</a></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
	
	<tr>	
	
	<td>
	<select name="sim_location">
	<option value="any" selected="selected" >ANY</option>

	<?php

	$sql = "SELECT name, id FROM troubador_device.location ";
	
	$rs = mysql_query($sql, $connect);
	while ($fetch = mysql_fetch_assoc($rs))
	{
	
	 
	 if (strlen($sim_carrier) > 0)
	  {
		   if ($_SESSION['sim_location'] == $fetch['id'])
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

<!-- end of location -->

<!-- start of assigned number -->
<tr>

	<th><a href="">IMSI</a></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>	
	</tr>
	<tr>	
	
	<th>
	<input value="<? echo $_SESSION['sim_imsi']; ?>" name="sim_imsi" size="20" class="edit" id="sim_imsi" type="text">
	</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&#160;</th>
	<th>&#160;</th>
	<th>&nbsp;</th>
</tr>
<!-- end of assigned# -->
<!-- start of pin -->
<tr>

	<th><a href="">MSISDN</a></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
	
	</tr>
	
	<tr>	
	
	<th>
	<input value="<? echo $_SESSION['sim_msisdn']; ?>" name="sim_msisdn" size="20" class="edit" id="sim_msisdn" type="text">
	</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&#160;</th>
	<th>&#160;</th>
	<th>&nbsp;</th>
</tr>
<!-- end of pin -->
<!-- start of user -->
<tr>

	<th><a href="">Assigned To</a></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
	
	<tr>	
	
	<td>
	<select name="sim_user_id">
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
<!-- end of user-->
<!-- start of available -->
<tr>
	<th><input type="checkbox" name="sim_available_only"  id="sim_available_only" class="checkbox" 
	<? if (($_POST['sim_available_only'] =="on") or ($_SESSION['sim_available_only']) )
	{ 
		echo 'checked="checked"'; 
		$_SESSION['sim_available_only'] = $_POST['sim_available_only'];
	} 
	
	?> 
	
	/><a href="">Available Only</a></th>
	<th><a href="">&nbsp;</a></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
</tr>	
<!-- end of available-->
<!-- start of conference call -->
<tr>
	<th><input type="checkbox" name="sim_conference_call" id="sim_conference_call" class="checkbox"
	<?
	if ( ($_POST['sim_conference_call'] =="on") or ($_SESSION['sim_conference_call']) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_conference_call'] = $_POST['sim_conference_call'];
	}
	?>

	/><a href="">Conference Call</a></th>
	<th><a href="">&nbsp;</a></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
</tr>
<!-- end of conference call-->
<!-- start of international call -->
<tr>
	<th><input type="checkbox" name="sim_international_call"  id="sim_international_call" class="checkbox"
	<?
	if ( ($_POST['sim_international_call'] =="on") or ($_SESSION['sim_international_call']) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_international_call'] = $_POST['sim_international_call'];
	}
	?>

	/><a href="">International Call</a></th>
	<th><a href="">&nbsp;</a></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
</tr>
<!-- end of international call-->
<!-- start of call forwarding -->
<tr>
	<th><input type="checkbox" name="sim_call_forwarding"  id="sim_call_forwarding" class="checkbox" 
	<?
	if ( ($_POST['sim_call_forwarding'] =="on") or ($_SESSION['sim_call_forwarding']) ) 
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_forwarding'] = $_POST['sim_call_barring'];
	}
	?>
	/><a href="">Call Forwarding</a></th>
	<th><a href="">&nbsp;</a></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
</tr>
<!-- end of call forwarding-->
<!-- start of call barring -->
<tr>
	<th><input type="checkbox" name="sim_call_barring"  id="sim_call_barring" class="checkbox" 
	<?
	if ( ($_POST['sim_call_barring'] =="on") or ($_SESSION['sim_call_barring'] ) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_barring'] = $_POST['sim_call_barring'];
	}
	?>
	/><a href="">Call Barring</a></th>
	<th><a href="">&nbsp;</a></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
</tr>
<!-- end of call barring-->
<!-- start of call waiting -->
<tr>
	<th><input type="checkbox" name="sim_call_waiting"  id="sim_call_waiting" class="checkbox" 
	<?
	if ( ($_POST['sim_call_waiting'] =="on") or ($_SESSION['sim_call_waiting']) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_waiting'] = $_POST['sim_call_waiting'];
	}
	?>
	/><a href="">Call Waiting</a></th>
	<th><a href="">&nbsp;</a></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
</tr>
<!-- end of call waiting-->

<!-- start of voicemail -->
<tr>
	<th><input type="checkbox" name="sim_voicemail" id="sim_voicemail" class="checkbox" 
	<?
	if (($_POST['sim_voicemail'] =="on") or ($_SESSION['sim_voicemail'] =="on") )
	{
		echo 'checked="checked"';
		$_SESSION['sim_voicemail'] = $_POST['sim_voicemail'];
	}
	?>
	/><a href="">Voicemail</a></th>
	<th><a href="">&nbsp;</a></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
</tr>
<!-- end of voicemail-->

<!-- start of submit -->
<tr>

	<th><input type="submit" value="Search" name="search" class="smallerboxsp" title="search"" /></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
</tr>
	

<!-- end of submit-->

</table>
</form>
