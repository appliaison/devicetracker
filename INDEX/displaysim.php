<?
include 'header3.php';
//echo $_SESSION['sim_carrier'];
?>
<body id="page-admin">
<table id="pagetop" cellpadding="0" cellspacing="0">
  <tr id="branding"><td>
  <a href="http://svv-db:8090/devicetracker/index2.php"><h1 id="textpattern">Textpattern</h1></a>
  </td><td id="navpop">
  <form method="get" action="index.php" class="navpop" style="display: inline;">

</form></td></tr>
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
			<td class="tabup"><a href="displaysim.php" class="plain">Display SIM</a></td>
			<td class="tabdown2"><a href="searchsim.php" class="plain">Search SIM</a></td>
			<td class="tabdown2"><a href="signoutsim.php" class="plain">Sign-out SIM</a></td>
			<td class="tabdown2"><a href="signinsim.php" class="plain">Sign-in SIM</a></td>
			<td class="tabdown2"><a href="addsim.php" class="plain">Add SIM</a></td>
			<td class="tabdown2"><a href="editsim.php" class="plain">Edit SIM</a></td>
			<td class="tabdown2"><a href="removesim.php" class="plain">Remove SIM</a></td>
			
			</tr></table></td>
			</tr>
</table>

<form action="index.php" method="post" name="longform" onsubmit="return verify('Are you sure?')">
<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
<tr>
	<th class="asc"><a href="index.php?step=list&#38;event=admin&#38;sort=name&#38;dir=desc">simcard_id</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=RealName&#38;dir=desc">&nbsp;</a></th>

	<th><a href="index.php?step=list&#38;event=admin&#38;sort=email&#38;dir=desc">ICCID</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Carrier</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">ID</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Assigned To</a></th>
			<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Assigned To</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">The correct user id for this field is</a></th>
	<th>&#160;</th>
	<th>&#160;</th>
	
	</tr>
<?php
$sql = "SELECT * FROM troubador_device.simcards22";
$rs = mysql_query($sql, $connect);
while ($fetch = mysql_fetch_assoc($rs) ) 
{
	?>
	<tr>	
	<td><?echo $simcard_id = $fetch['simcard_id']?></td>
	<td>&nbsp;</td>
	<td><?=$fetch['ICCID']?></td>

	<td>&nbsp;</td>
	<td><?=$fetch['Carrier']?></td>
	<td>&nbsp;</td>
	<td><?	echo $type = $fetch['ID']; ?></td>
	<td>&nbsp;</td>
	<td><?
	echo $Assigned_To= $fetch['Assigned_To'];	
	?></td>
	<td>&nbsp;</td>
	<td><?
	echo $type = $fetch['Assigned_To'];	
	?></td>
	<td>&nbsp;</td>
	<td><?
	if (strlen($Assigned_To) > 0)
	{
		
		echo $sql2 = "SELECT Id, username FROM troubador_device.users WHERE username LIKE '%$Assigned_To%' AND isactive=1";
		$rs2 = mysql_query($sql2, $connect);
		$fetch2 = mysql_fetch_assoc($rs2);
		$num = mysql_num_rows($rs2);
		
		echo "The user_id value on here should be " ;
		echo $user_id = $fetch2['Id'];
		echo $fetch2['Id'] . "--" . $fetch2['username'];
		//echo $type = $fetch['Assigned_To'];	
		
		if ($num >1)
		{
		 echo "<strong>ALERT</strong>";
		}
		else 
		{
		 echo $updatesql = "UPDATE devicetracker.simcards22 SET user_id=$user_id WHERE simcard_id = $simcard_id";
		  
		  if (strlen($user_id) > 0) 
		  {
		   $updaters = mysql_query($updatesql, $connect);
		   echo "<strong>";
		   echo "UPDATED";
		   echo "</strong>";
		  }

		}
		
		
	}
	else
	{
		echo "<strong>";
		echo "NOVAL";
		echo "</strong>";
	}
		
	?></td>
	<td><a href="?event=admin&#38;step=author_edit&#38;user_id=1">Edit</a></td>
	<td>&#160;</td>
	</tr>
<?
}
?>


</table>
</form>

<p class="prev-next">1/1</p>
<!-- start of sorter -->

<!-- end of sorter -->
<form method="post" action="index.php"><div style="margin: auto; text-align: center;">View <select name="qty" class="list" onchange="submit(this.form);">
	<option value="15">15</option>
	<option value="25" selected="selected">25</option>
	<option value="50">50</option>
	<option value="100">100</option>

</select> per page<input type="hidden" value="admin" name="event" /><input type="hidden" value="admin_change_pageby" name="step" /><noscript> <input type="submit" value="Go" class="smallerbox" /></noscript></div></form>
<div style="margin: 3em auto auto auto; text-align: center;">


<p id="moniker">Logged in as <span>ardas</span><br /><a href="index.php?logout=1">Logout</a></p>

</div>
</body>
</html>