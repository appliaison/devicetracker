<?
include 'header.php';
?>
  <form method="get" action="index.php" class="navpop" style="display: inline;">
<!--
<select name="event" onchange="submit(this.form);">
	<option>Go&#8230;</option>

	<optgroup label="Content">
		<option value="category">Categories</option>
		<option value="article">Write</option>
		<option value="list">Articles</option>
		<option value="image">Images</option>
		<option value="file">Files</option>

		<option value="link">Links</option>
		<option value="discuss">Comments</option>
	</optgroup>
	<optgroup label="Presentation">
		<option value="section">Sections</option>
		<option value="page">Pages</option>
		<option value="form">Forms</option>

		<option value="css">Style</option>
	</optgroup>
	<optgroup label="Admin">
		<option value="diag">Carriers</option>
		<option value="prefs">Preferences</option>
		<option value="admin">Users</option>
		<option value="log">Visitor Logs</option>

		<option value="plugin">Plugins</option>
		<option value="import">Import</option>
	</optgroup>
</select>
-->
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
			<td class="tabdown2"><a href="signoutsim.php" class="plain">Sign-out SIM</a></td>
			<td class="tabdown2"><a href="signinsim.php" class="plain">Sign-in SIM</a></td>
			<td class="tabdown2"><a href="addsim.php" class="plain">Add SIM</a></td>
			<td class="tabdown2"><a href="editsim.php" class="plain">Edit SIM</a></td>
			<td class="tabdown2"><a href="removesim.php" class="plain">Remove SIM</a></td>
			
			</tr></table></td>
			</tr></table>

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
$sql = "SELECT * FROM devicetracker.simcards";
$rs = mysql_query($sql, $connect);
while ($fetch = mysql_fetch_assoc($rs) ) 
{
	?>
	<tr>	
	<td><? echo $simcard_id = $fetch['simcard_id']?></td>
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
		echo $sql2 = "SELECT Id, username FROM users WHERE username LIKE '%$Assigned_To%' ";
		$rs2 = mysql_query($sql2, $connect);
		$fetch2 = mysql_fetch_assoc($rs2);
		$num = mysql_num_rows($rs2);
		echo "The user_id value on here should be " ;
		echo $fetch2['Id'] . "--" . $fetch2['username'];
		//echo $type = $fetch['Assigned_To'];	
	}
	else
	{
		echo "<strong>";
		echo "NOVAL";
		
		echo $sql3 = "UPDATE simcards SET user_id = 11 WHERE simcard_id = $simcard_id";
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