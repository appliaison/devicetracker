<?
require "loginstuff.php";
require 'globalheader.php';
?>
  <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
 		<table cellpadding="0" cellspacing="0" align="center"><tr>
  <td valign="middle" style="width:368px">&nbsp;</td>
  <td class="tabdown"><a href="home.php" class="plain">Home</a></td>
  <td class="tabdown"><a href="handhelds.php" class="plain">Handhelds</a></td>
  <td class="tabdown"><a href="simcards.php" class="plain">SIM cards</a></td>
  <td class="tabup"><a href="admin.php" class="plain">Admin</a></td>
  </tr>
  </table></td></tr>
  <tr id="nav-secondary">
  <td align="center" class="tabs" colspan="2">

			<table cellpadding="0" cellspacing="0" align="center"><tr>
			<td class="tabdown2"><a href="loginslog.php" class="plain">Loginslog</a></td>
			<td class="tabdown2"><a href="maile.php" class="plain">Mailer</a></td>
			<td class="tabdown2"><a href="carriers.php" class="plain">Carriers</a></td>
			<td class="tabdown2"><a href="settings.php" class="plain">Settings</a></td>
			<td class="tabdown2"><a href="users.php" class="plain">Users</a></td>
			<td class="tabup"><a href="usergroups.php" class="plain">Groups</a></td>
			<td class="tabdown2"><a href="handheldadmin.php" class="plain">HH admin</a></td>
			<td class="tabdown2"><a href="simcardadmin.php" class="plain">SIM card admin</a></td>
			<td class="tabdown2"><a href="statuses.php" class="plain">Statuses</a></td>
			<td class="tabdown2"><a href="autosync.php" class="plain">Auto Sync</a></td>
			<td class="tabdown2"><a href="export.php" class="plain">Export to Excel</a></td></tr>
			
			</tr>
			
			</table></td></tr></table>
<?
require 'checkadmin.php';
?>
		
<form action="index.php" method="post" name="longform" onsubmit="return verify('Are you sure?')"><table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
<tr>
	<th class="asc"><a href="index.php?step=list&#38;event=admin&#38;sort=name&#38;dir=desc">username</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=RealName&#38;dir=desc">&nbsp;</a></th>

	<th><a href="index.php?step=list&#38;event=admin&#38;sort=email&#38;dir=desc">Email</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">password</a></th><th>&#160;</th><th>&#160;</th></tr>
<?php



$sql = "SELECT * FROM troubador_device.usergroups";
$rs = mysql_query($sql, $connect);



while ($fetch = mysql_fetch_assoc($rs) ) 
{
	?>
	<tr>	
	<td><?=$fetch['username']?></td>
	<td>&nbsp;</td>
	<td><? echo $email = $fetch['email']?></td>

	<td>&nbsp;</td>
	<td><?=$fetch['password']?></td>
	<td><a href="?event=admin&#38;step=author_edit&#38;user_id=1">Edit</a></td>
	<td><?
	
	?>
	</td>
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