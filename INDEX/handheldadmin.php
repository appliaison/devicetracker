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
			<td class="tabdown2"><a href="mailer.php" class="plain">Mailer</a></td>
			<td class="tabdown2"><a href="carriers.php" class="plain">Carriers</a></td>
			<td class="tabdown2"><a href="settings.php" class="plain">Settings</a></td>
			<td class="tabdown2"><a href="users.php" class="plain">Users</a></td>
			<td class="tabdown2"><a href="usergroups.php" class="plain">Groups</a></td>
			<td class="tabup"><a href="handheldadmin.php" class="plain">HH admin</a></td>
			<td class="tabdown2"><a href="simcardadmin.php" class="plain">SIM card admin</a></td>
			<td class="tabdown2"><a href="statuses.php" class="plain">Statuses</a></td>
			<td class="tabdown2"><a href="autosync.php" class="plain">Auto Sync</a></td>
			<td class="tabdown2"><a href="export.php" class="plain">Export to Excel</a></td></tr>
			</tr>
			
			</table></td></tr></table>

<?
require 'checkadmin.php';
?>		

<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
<tr>

	<th><a href="<?=$_SERVER['PHP_SELF']?>">Column name</a></th>
	<th><a href="<?=$_SERVER['PHP_SELF']?>">Column description</a></th>
	<th><a href="<?=$_SERVER['PHP_SELF']?>">Value</a></th>
	<th>&nbsp;</th>
	</tr>
<?
$sql = "SELECT * FROM settings WHERE settings_device = 'hh'";
$rs = mysql_query($sql, $connect);
while ($fetch = mysql_fetch_assoc($rs))
{
	?>
	<tr>	
	<td><? echo $fetch['settings_name']; ?></td>
	<td><? echo $fetch['settings_description']; ?></td>
	<td>
	<select name="settings_val<?=$fetch['settings_id']?>" class="list" id="settings_val<?=$fetch['settings_id']?>" onchange="hh_save_settings_sendrequest(<?=$fetch['settings_id']?>); return false;">
	<option value="1" <? if ($fetch['settings_value']==1) { echo ' selected="selected" ';}?> >Show</option>
	<option value="0" <? if ($fetch['settings_value']==0) { echo ' selected="selected" ';}?> >Hide</option>
	</select>
	</td>
	</tr>
	
	<?
}
?>	
	<tr>
	<td>
	<span class="ok" id="hh_save_returned_value" ></span>
	</td>
	</tr>
	</table>

</div>
</body>
</html>