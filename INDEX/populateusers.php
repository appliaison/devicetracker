<?
require "loginstuff.php";
require 'globalheader.php';
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
  <td class="tabdown"><a href="simcards.php" class="plain">SIM cards</a></td>
  <td class="tabup"><a href="admin.php" class="plain">Admin</a></td>

  </tr>
  </table></td></tr>
  <tr id="nav-secondary">
  <td align="center" class="tabs" colspan="2">

			<table cellpadding="0" cellspacing="0" align="center"><tr>
			<td class="tabdown2"><a href="carriers.php" class="plain">Carriers</a></td>
			<td class="tabdown2"><a href="settings.php" class="plain">Settings</a></td>
			<td class="tabdown2"><a href="users.php" class="plain">Users</a></td>
			<td class="tabdown2"><a href="handheldadmin.php" class="plain">HH admin</a></td>
			<td class="tabdown2"><a href="simcardadmin.php" class="plain">SIM card admin</a></td>
			<td class="tabup"><a href="statuses.php" class="plain">Statuses</a></td>
			<td class="tabdown2"><a href="export.php" class="plain">Export to Excel</a></td></tr></table></td></tr></table>

<?

echo 'This script takes the users table from the hhdb2.users table and populates the devicetracker.users22 '
. 'table in the devicetracker database';
echo '<br>';

echo "First - check the number of records in the hhdb2.handhelds table";


require 'db.php';

$sql_num_rows_in_users = "SELECT * FROM hhdb2.users";
$rs_num_rows_in_users = mysql_query($sql_num_rows_in_users , $connect);
$num_rows_in_users = mysql_num_rows($rs_num_rows_in_users);

$select2 = mysql_select_db('devicetracker');

$sql_num_rows_in_users22 = "SELECT * FROM troubador_device.users22";
$rs_num_rows_in_users22 = mysql_query($sql_num_rows_in_users22, $connect);
$num_rows_in_users22 = mysql_num_rows($rs_num_rows_in_users22);

echo "The number of rows in the hhdb2.users table is : " . $num_rows_in_users;

echo "<br>";

echo "The number of rows in the devicetracker.users22 table is : " . $num_rows_in_users22;

if ( $num_rows_in_users22 == $num_rows_in_users)
{
	exit();
}

echo "<br>";
echo "EOF";
exit();


if (($num_rows_in_handhelds22== 0) and ($num_rows_in_handhelds > 0))
{

	$select = mysql_select_db('hhdb2.handhelds');
	$sql = "SELECT * FROM hhdb2.handhelds";
	$rs = mysql_query($sql, $connect);
	$count = 0;
	while ($fetch = mysql_fetch_assoc($rs))
	{
		$count ++;
		$handheld_id = $fetch['Id'];
		
		$type = $fetch['type'];
		
		$AssignedNumber = $fetch['AssignedNumber'];
		
		$RevisionNumber = $fetch['RevisionNumber'];
		
		$MB = $fetch['MB'];
		
		$PIN = $fetch['PIN'];
		
		$ESN = $fetch['ESN'];
		
		$IMEI = $fetch['IMEI'];
		
		$Phone = $fetch['Phone'];
		
		$VoiceMailPassword = $fetch['VoiceMailPassword'];
		
		//$Notes = $fetch['Notes'];
		
		if (!get_magic_quotes_gpc()) 
		{
			$Notes = addslashes($fetch['Notes']);
		} else 
		{
			$Notes = addslashes($fetch['Notes']);
		}
		
		$Status = $fetch['Status'];
		
		$userid = $fetch['userid'];
		
		$timestamp = $fetch['timestamp'];
		
		if (strlen($timestamp) == 0)
		{
			
			$timestamp = '0000-00-00 00:00:00';
		}
		
		$bootrom = $fetch['bootrom'];
		
		$loc_id = $fetch['loc_id'];	
		
		$CPR = $fetch['CPR'];
		
		$is_secure = $fetch['is_secure'];
		
		$is_corp = $fetch['is_corp'];
		
		$is_otasl = $fetch['is_otasl'];
			
		$connect2 = mysql_connect('localhost', 'devicetracker', 'device');
		$select2 = mysql_select_db('devicetracker');
		
		echo $sql2 = "INSERT INTO devicetracker.handhelds22(type, AssignedNumber, RevisionNumber, MB, PIN, ESN, IMEI, Phone, VoiceMailPassword, Notes, Status, userid, timestamp, bootrom, loc_id, CPR, is_secure, is_corp, is_otasl) " 
		   . "VALUES ('$type', '$AssignedNumber', '$RevisionNumber', '$MB', '$PIN', '$ESN', '$IMEI', '$Phone',  '$VoiceMailPassword', '$Notes', '$Status', '$userid', '$timestamp', '$bootrom', '$loc_id', '$CPR', '$is_secure', '$is_corp', '$is_otasl')";
		 
		echo "<br>"; 
		 $insert = mysql_query($sql2, $connect) or mysql_error();
		 if ($insert)
			{
		
			}
			else
			{
			echo "<b>" . "FAIL" . "</b>";
			}
	 

	}
 
}
else
{
   echo "<br /><strong>Houston. We have a problem</strong>";
}	
$select = mysql_select_db('simcardinventory');

$sql_num_rows_in_simcard = "SELECT * FROM simcardinventory.simcard";
$rs_num_rows_in_simcard = mysql_query($sql_num_rows_in_simcard, $connect);
$num_rows_in_simcard = mysql_num_rows($rs_num_rows_in_simcard);

$select2 = mysql_select_db('devicetracker');

$sql_num_rows_in_simcards22 = "SELECT * FROM troubador_device.simcards22";
$rs_num_rows_in_simcards22 = mysql_query($sql_num_rows_in_simcards22, $connect);
$num_rows_in_simcards22 = mysql_num_rows($rs_num_rows_in_simcards22);

if ($num_rows_in_simcards22 == $num_rows_in_simcard) 
{
	   echo "<br /><strong>Sync successful</strong>";
}
else
{
     echo "<br /><strong>Sync failure</strong>";
}

*/
?>


</div>
</body>
</html>