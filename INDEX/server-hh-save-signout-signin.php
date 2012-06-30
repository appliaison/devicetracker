<?
session_start();
if(!session_is_registered("email"))
{
	header("location:index.php");
}
$signout_signin_userid = $_GET['signout_signin_userid'];
$datenow = date("Y-n-j"); 
$timenow = date("H:i:s"); 
$now = $datenow . " " . $timenow;

$connect = mysql_connect('localhost', 'devicetracker', 'device');
$select = mysql_select_db('devicetracker') ;



$sqlgetarray= "SELECT h.Id AS handheld_id, h.type AS type, h.AssignedNumber AS AssignedNumber, h.RevisionNumber AS RevisionNumber, "
			. " h.MB AS MB, h.PIN AS PIN, h.ESN AS ESN, h.IMEI AS IMEI, h.Status AS Status, u.username AS username " 
			. " FROM troubador_device.sign AS s "
			. " LEFT JOIN devicetracker.handhelds AS h ON h.Id = s.handheld_id" 
			. " LEFT JOIN devicetracker.users AS u ON u.Id = h.userid ";
			
$rsgetarray = mysql_query($sqlgetarray, $connect);


	while ($fetch = mysql_fetch_assoc($rsgetarray))
	{
		$handheld_id = $fetch['handheld_id'];
		if ($signout_signin_userid == 1)
		{
			$sqlupdate = "UPDATE devicetracker.handhelds SET userid = 1, timestamp = '$now', Status = 'AVAILABLE' WHERE Id = $handheld_id ";		
			$rsupdate = mysql_query($sqlupdate, $connect);
		}
		else 
		{
			$sqlupdate = "UPDATE devicetracker.handhelds SET userid = $signout_signin_userid, timestamp = '$now', Status = 'SIGNED OUT' WHERE Id = $handheld_id ";
			$rsupdate = mysql_query($sqlupdate, $connect);
		}

	}






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
		&nbsp;
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
<input type="submit"  value="Submit" name="B1" onClick="hh_save_signoutsignin_sendRequest()" tabindex="16" disabled="true">
<input type="button" name="cancel" value="Cancel" onclick="closedeletebox()">	
<input type="button" name="done" value="Done" onclick="reload_search()">
</td>
</tr>
</table>
</span>

