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

echo 'This script takes the "simcard" table from the simcardinventory database and populates the "simcards" table in the devicetracker database';
echo '<br>';

echo "First - check the number of records in the simcardinventory.simcard table";


require 'db.php';

$sql_num_rows_in_simcard = "SELECT * FROM simcardinventory.simcard";
$rs_num_rows_in_simcard = mysql_query($sql_num_rows_in_simcard, $connect);
$num_rows_in_simcard = mysql_num_rows($rs_num_rows_in_simcard);

$select2 = mysql_select_db('devicetracker');

$sql_num_rows_in_simcards22 = "SELECT * FROM troubador_device.simcards22";
$rs_num_rows_in_simcards22 = mysql_query($sql_num_rows_in_simcards22, $connect);
$num_rows_in_simcards22 = mysql_num_rows($rs_num_rows_in_simcards22);

echo "The number of rows in the simcard table is : " . $num_rows_in_simcard;

echo "<br>";

echo "The number of rows in the simcards22 table is : " . $num_rows_in_simcards22;



if (($num_rows_in_simcards22 == 0) and ($num_rows_in_simcard > 0))
{

	$select = mysql_select_db('simcardinventory');
	$sql = "SELECT * FROM simcardinventory.simcard";
	$rs = mysql_query($sql, $connect);
	$count = 0;
	while ($fetch = mysql_fetch_assoc($rs))
	{
		$count ++;
		$ICCID = $fetch['ICCID'];
		
		$Carrier = $fetch['Carrier'];
		
		$ID = $fetch['ID'];
		
		$Assigned_To = addslashes($fetch['Assigned_To']);
		
		$IMSI = $fetch['IMSI'];
		
		$MSISDN = $fetch['MSISDN'];
		
		$Owner_Name = addslashes($fetch['Owner_Name']);
		
		$Owner_Contact = $fetch['Owner_Contact'];
		
		$In_SVV = $fetch['In_SVV'];
		
		$Conference_Call =  $fetch['Conference_Call'];
		
		$International_Call = $fetch['International_Call'];
		
		$Call_Forwarding = $fetch['Call_Forwarding'];
		
		$Call_Barring = $fetch['Call_Barring'];
		
		$Call_Waiting = $fetch['Call_Waiting'];
		
		$Voice_Mail = $fetch['Voice_Mail'];
		
		$Notes = addslashes($fetch['Notes']);
		
		
		$Util = $fetch['Util'];
		
		$Cost_Jan = $fetch['Cost_Jan'];
		
		$Cost_Feb = $fetch['Cost_Feb'];
		
		$Cost_Mar = $fetch['Cost_Mar'];
		
		$Cost_Apr = $fetch['Cost_Apr'];
		
		$Cost_May = $fetch['Cost_May'];
		
		$Cost_Jun = $fetch['Cost_Jun'];
		
		$Cost_Jul = $fetch['Cost_Jul'];
		
		$Cost_Aug = $fetch['Cost_Aug'];
		
		$Cost_Sept = $fetch['Cost_Sept'];
		
		$Cost_Oct = $fetch['Cost_Oct'];
		
		$Cost_Nov = $fetch['Cost_Nov'];
		
		$Cost_Dec = $fetch['Cost_Dec'];
		
		$Sign_out = $fetch['Sign_out'];
		
		
		$userid = $fetch['user_id'];
		
		$loc_id = $fetch['loc_id'];
		
		$owner_id = $fetch['owner_id'];
		
		
		
		$connect2 = mysql_connect('localhost', 'devicetracker', 'device');
		$select2 = mysql_select_db('devicetracker');
		
		echo $sql2 = "INSERT INTO devicetracker.simcards22(ICCID, Carrier, ID, Assigned_To, user_id, IMSI, MSISDN, Owner_Name, Owner_Contact,  Notes, Util, Cost_Jan, Cost_Feb, Cost_Mar, Cost_Apr, Cost_May, Cost_Jun, Cost_Jul, Cost_Aug, Cost_Sept, Cost_Oct, Cost_Nov, Cost_Dec, Sign_out, loc_id, owner_id) " 
		   . "VALUES ('$ICCID', '$Carrier', '$ID', '$Assigned_To', $userid, '$IMSI', '$MSISDN', '$Owner_Name', '$Owner_Contact', '$Notes', '$Util', '$Cost_Jan', '$Cost_Feb', '$Cost_Mar', '$Cost_Apr', '$Cost_May', '$Cost_Jun', '$Cost_Jul', '$Cost_Aug', '$Cost_Sept', '$Cost_Oct', '$Cost_Nov', '$Cost_Dec', '$Sign_out', $loc_id, $owner_id)";
		 
		echo "<br>"; 
		 $insert = mysql_query($sql2, $connect) or mysql_error();
		 if ($insert)
			{
		
			}
			else
			{
			echo "FAIL";
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
  

?>
<p id="moniker">Logged in as<span></span><br /><a href="index.php?logout=1">Logout</a></p>

</div>
</body>
</html>