<?
include 'header.php';
$sqlqty = "SELECT settings_value FROM settings WHERE settings_id = 1";
$rs = mysql_query($sqlqty, $connect);
$fetch = mysql_fetch_assoc($rs);

// qty
if (strlen($_POST['qty']) > 0)
{
  $qty = $_POST['qty'];
  $_SESSION['qty'] = $qty;
}
else
{
  
  if (!(strlen($_SESSION['qty'])>0))
  {	
	$qty = $fetch['settings_value'];
	$_SESSION['qty'] = $fetch['settings_value'];
  }
  
}

// sim_carrier
if (strlen($_POST['sim_carrier']) > 0)
{
  $sim_carrier = $_POST['sim_carrier'];
  $_SESSION['sim_carrier'] = $sim_carrier;
}
else
{
  $sim_carrier = $_SESSION['sim_carrier'];
}
// sim_location
if (strlen($_POST['sim_location']) > 0)
{
 echo $sim_location = $_POST['sim_location'];
  $_SESSION['sim_location'] = $sim_location;
}
else
{
  $sim_location = $_SESSION['sim_location'];
}

// sim_imsi
if (strlen($_POST['sim_imsi']) > 0)
{
 echo $sim_imsi = $_POST['sim_imsi'];
  $_SESSION['sim_imsi'] = $sim_imsi;
}
else
{
  $sim_imsi = $_SESSION['sim_imsi'];
}
// sim_msisdn
if (strlen($_POST['sim_msisdn']) > 0)
{
 echo $sim_msisdn = $_POST['sim_msisdn'];
  $_SESSION['sim_msisdn'] = $sim_msisdn;
}
else
{
  $sim_msisdn = $_SESSION['sim_msisdn'];
}

// user_id
if (strlen($_POST['sim_user_id']) > 0)
{
 echo $sim_user_id = $_POST['sim_user_id'];
  $_SESSION['sim_user_id'] = $sim_user_id;
}
else
{
  $sim_user_id = $_SESSION['sim_user_id'];
}



?>
<body id="page-admin">

  <form method="get" action="index.php" class="navpop" style="display: inline;">

</form>
</td></tr>
  <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
 		<table cellpadding="0" cellspacing="0" align="center"><tr>
  <td valign="middle" style="width:368px">&nbsp;</td>
  <td class="tabdown"><a href="handhelds.php" class="plain">Handhelds</a></td>
  <td class="tabup"><a href="simcards.php" class="plain">SIM cards</a></td>
  <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

  </tr>
  </table></td></tr>
  <tr id="nav-secondary">
  <td align="center" class="tabs" colspan="2">

			<table cellpadding="0" cellspacing="0" align="center"><tr>
			<td class="tabdown2"><a href="displaysim.php" class="plain">Display SIM</a></td>
			<td class="tabup"><a href="searchsim.php" class="plain">Search SIM</a></td>
			<td class="tabdown2"><a href="imsearchsim.php" class="plain">Search SIM(im)</a></td>
			<td class="tabdown2"><a href="signoutsim.php" class="plain">Sign-out SIM</a></td>
			<td class="tabdown2"><a href="signinsim.php" class="plain">Sign-in SIM</a></td>
			<td class="tabdown2"><a href="addsim.php" class="plain">Add SIM</a></td>
			<td class="tabdown2"><a href="editsim.php" class="plain">Edit SIM</a></td>
			<td class="tabdown2"><a href="removesim.php" class="plain">Remove SIM</a></td>
			
			</table></td></tr></table>

<table>
<tr>
<td>
<!-- start of the form -->		

<form action="searchsim.php" method="post" name="longform" ">
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
	<?
	$sql = "SELECT * FROM troubador_device.sim_carrier ORDER BY ID";
	$rs = mysql_query($sql, $connect);
	$numrs = mysql_num_rows($rs);
	?>
	<select name="sim_carrier">
	<option value="any">ANY</option>

	<?php


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
<tr>
</tr>
</table>
</form>

</td>
<!-- start of right frame -->
<td>
<?

	if (strlen($_POST['search']) > 0)
	{
	 echo $sim_carrier= $_REQUEST['sim_carrier'];
	 echo $sim_location = $_REQUEST['sim_location'];
	 echo $sim_imsi = $_REQUEST['sim_imsi'];
	 echo $sim_msisdn = $_REQUEST['sim_msisdn'];
	 echo $sim_user_id = $_REQUEST['sim_user_id'];
	 
	 
	 //echo $handheld_location = $_REQUEST['handheld_location'];
	 ?>
		<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
		<tr>
		<th class="asc"><a href="index.php?step=list&#38;event=admin&#38;sort=name&#38;dir=desc">Simcard ID</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=RealName&#38;dir=desc">&nbsp;</a></th>

		<th><a href="index.php?step=list&#38;event=admin&#38;sort=email&#38;dir=desc">ICCID</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Carrier</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">ID</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Assigned_To</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">User</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">IMSI</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>


		
		<th>&#160;</th><th>&#160;</th></tr>
		
		<!-- start of dynamic rows -->	
		<?
		//echo $sqlhh = "SELECT * FROM troubador_device.handhelds WHERE type='$type' AND loc_id=$handheld_location";
		//echo $sqlhh = "SELECT * FROM troubador_device.simcards22 WHERE Carrier='$sim_carrier'";
		
		// start building out the sql query here 
		
		$sqlsim = "SELECT * FROM simcards22 WHERE (1=1) " ;
		

		if (isset($_SESSION['sim_carrier']))
		{	
			if (!($_SESSION['sim_carrier'] == 'any'))
			{
			$sqlsim .= " AND Carrier LIKE '%$sim_carrier%' " ;
			}
		}
		
		if (isset($_SESSION['sim_user_id']))
		{
			if (!($_SESSION['sim_user_id'] == 0))
			{
			$sqlsim .= " AND user_id=$sim_user_id ";
			}
		}
		
		if (isset($_SESSION['sim_location']))
		{
			if (!isset($_SESSION['sim_location']))
			{
				$sqlsim .= " AND IMSI LIKE '%$sim_imsi%' AND loc_id=$sim_location ";
			}
		}
		
		
		// end building out the sql query here 
		
		$resultsim = mysql_query($sqlsim, $connect);
		while ($fetch = mysql_fetch_assoc($resultsim))
		{
		?>
		<tr>	
		<td><?=$fetch['simcard_id']?></td>
		<td>&nbsp;</td>
		<td><? echo $fetch['ICCID']?></td>

		<td>&nbsp;</td>
		<td><?=$fetch['Carrier']?></td>
		
		<td>&nbsp;</td>
		<td><?=$fetch['ID']?></td>
		
		<td>&nbsp;</td>
		<td><?
		$user_id = $_SESSION['sim_user_id'];
		$sqluser = "SELECT * FROM users WHERE Id = $user_id";
		$resultuser = mysql_query($sqluser, $connect);
		$fetchuser = mysql_fetch_assoc($resultuser);
		
		echo $fetchuser['username'];
		echo $fetch['user_id'];
		?></td>
		
		<td>&nbsp;</td>
		<td><? echo $fetchuser['email']; ?></td>
		
		<td>&nbsp;</td>
		<td><?=$fetch['IMSI']?></td>
		
		<td>&nbsp;</td>
		<td><?=$fetch['Phone']?></td>
		
	


		</tr>
		<?
		}
		?>
		<!-- end of dynamic rows -->
		</table>
	  <?
	}
	

?>
</td>
<!-- end of right frame -->
</tr>
</table>

<div style="margin: 3em auto auto auto; text-align: center;">


<?
include 'footer.php';
echo $sqlsim;
echo $_SESSION['qty'];
echo "<br>";
echo "-------------";
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";

?>