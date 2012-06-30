<?
session_start();
if(!session_is_registered("email"))
{
	header("location:index.php");
}

$handheld_id = $_GET['handheld_id'];
$formtitle_id = $_GET['formtitle_id'];


$connect = mysql_connect('localhost', 'devicetracker', 'device');
$select = mysql_select_db('devicetracker') ;

$_SESSION['formtitle_id'] = $formtitle_id;


$sqlpopulate = "SELECT h.Id AS handheld_id, h.type AS type, h.AssignedNumber AS AssignedNumber, h.RevisionNumber AS RevisionNumber, "
			. " h.MB AS MB, h.PIN AS PIN, h.ESN AS ESN, h.IMEI AS IMEI, h.Status AS Status, u.username AS username "
			. " FROM troubador_device.sign AS s "
			. " LEFT JOIN devicetracker.handhelds AS h ON h.Id = s.handheld_id" 
			. " LEFT JOIN devicetracker.users AS u ON u.Id = h.userid ";
$rspopulate = mysql_query($sqlpopulate, $connect);
$num_rows = mysql_num_rows($rspopulate);

if ($num_rows > 0 )
{
?>
<span class="ok" id="hh_save_signoutsignin_returned_value" >
<table cellpadding="0" cellspacing="0" border="0" id="list" align="left">
<tr>
	<th><a href="">Id</a></th>
	<th><a href="">Type</a></th>
	<th><a href="">AssignedNumber</a></th>
	<th><a href="">RevisionNumber</a></th>
	<th><a href="">MB</a></th>
	<th><a href="">PIN</a></th>
	<th><a href="">ESN</a></th>
	<th><a href="">Status</a></th>
	<th><a href="">User</a></th>

</tr>
<?
	while ($fetch = mysql_fetch_assoc($rspopulate))
	{
	?>
	<tr <? if ($fetch['Status']=="AVAILABLE") { echo 'class="available"' ; } else { echo 'class="not-available"' ; } ?>>
		<td><?=$fetch['handheld_id']?></td>
		<th><?=$fetch['type']?></th>
		<th><?=$fetch['AssignedNumber']?></th>
		<th><?=$fetch['RevisionNumber']?></th>
		<th><?=$fetch['handheld_id']?></th>
		<th><?=$fetch['type']?></th>
		<th><?=$fetch['AssignedNumber']?></th>
		<th><?=$fetch['RevisionNumber']?></th>
		<th><?=$fetch['username']?></th>

	</tr>
	<?
	}
	?>
	<tr>
	<td>
		<select name="signout_signin_userid" id="signout_signin_userid" tabindex="9">
		<option value="1">AVAILABLE</option>

		<?php

		$sql = "SELECT username, id FROM troubador_device.users WHERE isactive = 1 order by username asc";
		
		$rs = mysql_query($sql, $connect);
		while ($fetch = mysql_fetch_assoc($rs))
		{
		 //echo "<option value='" . $fetch['id'] . "'>" . $fetch['username'] . "</option>\n";  
		 
		  if (strlen($userid) > 0)
			{
				if ($_SESSION['userid']	== $fetch['id'])
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
<?
}
else
{
	echo "Please select devices to sign out";

}

?>

<tr>
<td>

<input type="submit"  value="Submit" name="B1" onClick="hh_save_signoutsignin_sendRequest()" tabindex="16">
<input type="button" name="cancel" value="Cancel" onclick="closedeletebox()">	
<input type="button" name="done" value="Done" onclick="reload_search()">	
</td>
</tr>

</table>
</span>