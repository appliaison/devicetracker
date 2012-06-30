<?

$handheld_id = $_GET['handheld_id'];
$formtitle_id = $_GET['formtitle_id'];

require 'db.php';

$_SESSION['formtitle_id'] = $formtitle_id;


$sql = "SELECT u.username AS username, ua.username AS adminusername, his.action AS action, his.date AS date FROM troubador_device.history AS his LEFT JOIN devicetracker.handhelds AS hh ON hh.Id=his.hhid LEFT JOIN devicetracker.users AS u ON his.userid = u.Id LEFT JOIN devicetracker.users AS ua ON his.adminid = ua.Id WHERE hhid = $formtitle_id ORDER BY his.date DESC LIMIT 0, 8";
$rs = mysql_query($sql, $connect);
$num_rows = mysql_num_rows($rs);
?>
<table cellpadding="0" cellspacing="0" border="0" id="list" align="left">
<tr>
	<th><a href="">User</a></th>
	<th><a href="">Admin</a></th>
	<th><a href="">Action</a></th>
	<th><a href="">Date</a></th>

</tr>

<?
if ($num_rows > 0 )
{
	while ($fetch = mysql_fetch_assoc($rs))
	{
		$username = $fetch['username'];
		$adminusername = $fetch['adminusername'];
		$action = $fetch['action'];
		$date = $fetch['date'];
	

	//echo $hh_assigned_num;

	?>
	<tr>
	<td><? echo $fetch['username']; ?></td>
	<td><? echo $fetch['adminusername']; ?></td>
	<td><? echo $fetch['action']; ?></td>
	<td><? echo $fetch['date']; ?></td>
	</tr>
		
	<?
	}
}
?>
		<tr>
		<td>
		<input type="button" name="cancel" value="Cancel" onclick="closehistorybox()">
		</td>
		</tr>
		</table>