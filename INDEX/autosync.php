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
			<td class="tabdown2"><a href="usergroups.php" class="plain">Groups</a></td>
			<td class="tabdown2"><a href="handheldadmin.php" class="plain">HH admin</a></td>
			<td class="tabdown2"><a href="simcardadmin.php" class="plain">SIM card admin</a></td>
			<td class="tabdown2"><a href="statuses.php" class="plain">Statuses</a></td>
			<td class="tabup"><a href="autosync.php" class="plain">Auto Sync</a></td>
			<td class="tabdown2"><a href="export.php" class="plain">Export to Excel</a></td></tr>
			
			</tr>
			
			</table></td></tr></table>

<?
require 'checkadmin.php';
?>		

<p class="prev-next"><strong>Sync users</strong></p>


<p class="prev-next"><strong>Sync simcards</strong></p>



<p class="prev-next"><strong>Sync handhelds</strong></p>

<div style="margin: 3em auto auto auto; text-align: center;">
<p> The following steps grab a dump of the old SIM card table and shape the table so that it works with device tracker</p>
<p id="moniker"><a href="delete-rows-simcards.php">Delete all rows from simcards22 table</a></p>
<p id="moniker"><a href="populatesimcards.php">Populate all rows of simcards22 table</a></p>
<p id="moniker"><a href="populatesimcards.php">Takes the data from the old simcard inventory table and then moves it to the new simcard inventory table</a></p>
<p id="moniker"><a href="populatesimcards.php">Adds the simcard_id field to the new simcard inventory table</a></p>
<p> The following steps have to be run sequentially in order to populate the new database with information from the old database and if one of the following fails, then we have a problem</p>

<p id="moniker">Step 1 <span></span><br /><a href="populatesimcardswithcorrectuserid-unrun.php">Populate sim cards with correct user id (be careful about running this one)</a></p>
<p id="moniker">Logged in as<span></span><br /><a href="index.php?logout=1">Logout</a></p>
<p id="moniker">Logged in as<span></span><br /><a href="index.php?logout=1">Logout</a></p>
<p id="moniker">Logged in as<span></span><br /><a href="index.php?logout=1">Logout</a></p>

</div>
</body>
</html>