<?
require "loginstuff.php";
require 'globalheader.php';
?>
            <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
                    <table cellpadding="0" cellspacing="0" align="center"><tr>
                            <td valign="middle" style="width:368px">&nbsp;</td>
							<td class="tabup"><a href="home.php" class="plain">Home</a></td>
                            <td class="tabdown"><a href="handhelds.php" class="plain">Handhelds</a></td>
                            <td class="tabdown"><a href="simcards.php" class="plain">SIM cards</a></td>
                            <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

                        </tr>
                    </table></td></tr>
            <tr id="nav-secondary">
                <td align="center" class="tabs" colspan="2">

                    <table cellpadding="0" cellspacing="0" align="center"><tr>
                            <td class="tabup"><a href="cdma.php" class="plain">CDMA</a></td>
                            <!-- <td class="tabdown2"><a href="mailer.php" class="plain">Mailer</a></td>
                            <td class="tabdown2"><a href="carriers.php" class="plain">Carriers</a></td>
                            <td class="tabdown2"><a href="settings.php" class="plain">Settings</a></td>
                            <td class="tabdown"><a href="users.php" class="plain">Users</a></td>
                            <td class="tabdown"><a href="usergroups.php" class="plain">Groups</a></td>
                            <td class="tabdown2"><a href="handheldadmin.php" class="plain">HH admin</a></td>
                            <td class="tabdown2"><a href="simcardadmin.php" class="plain">SIM card admin</a></td>
                            <td class="tabdown2"><a href="statuses.php" class="plain">Statuses</a></td>
                            <td class="tabdown2"><a href="autosync.php" class="plain">Auto Sync</a></td>
                            <td class="tabdown2"><a href="export.php" class="plain">Export to Excel</a></td></tr>
							-->
                    </table></td></tr></table>
<?
require 'checkadmin.php';
?>

<div class="contentcenter">
<?
function trim_value(&$value) 
{ 
    $value = trim($value); 
}


if (strlen($_REQUEST['submit']) > 0)
{


	$phone_numbers = $_REQUEST['phone_numbers'];

	$phones = explode(',', $phone_numbers);

	//$phones = strtok($phone_numbers, " \r\n");
	
	//$phones = token_get_all($phone_numbers);
	
	array_walk($phones, 'trim_value');
	
	
	
	$number_of_numbers = sizeof($phones);
	?>
				<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
			 <tr>
                    <th><label>Phone Number</label></th>

                    <th><label>Username</label></th>
                    <th><label>PIN</label></th>
                    <th><label>Device</label></th>
					<th>&#160;</th><th>&#160;</th>
				</tr>
	
	<?
	
	for ($k=0; $k < $number_of_numbers; $k++)
	{
		?>
		
		<tr>
		<td>
		<?
		echo $phone = $phones[$k];
		?>
		</td>
		<?
		$sql = "SELECT h.PIN AS PIN, h.type AS type, u.Id AS userid, u.username AS username FROM handhelds AS h LEFT JOIN users AS u ON u.Id = h.userid WHERE h.Notes LIKE '%$phone%' ";
		$rs = mysql_query($sql, $connect);
		$num_rows = mysql_num_rows($rs);
		
		if ($num_rows == 1)
		{
			$fetch = mysql_fetch_assoc($rs);
			echo "<td>" . $fetch['username'] . "</td>";
			echo "<td>" . $fetch['PIN'] . "</td>";
			echo "<td>" . $fetch['type'] . "</td>";
		}
		else
		{
			echo "<td>" . "no user found" . "</td>";
			echo "<td>" . "NULL" . "</td>";
			echo "<td>" . "NULL" . "</td>";
		}
		?>
		
		
		</tr>
		
		<?
	}
	?>
	</table>
	<?
	
}

else
{
?>

	<table>
	<tr>
	<td>
	Paste the phone numbers of CDMA devices that you want to lookup here
	</td>
	</tr>
	<tr>
	<td>
	<form name="populatephone" method="POST" action="<?=$_SERVER['PHP_SELF']?>">
	<textarea rows="20" name="phone_numbers" id="phone_numbers" cols="80" value="" tabindex="9"></textarea>

	</td>
	</td>
	</tr>
	<tr>
	<td>
	<input value="Submit" name="submit" tabindex="25" type="submit">&nbsp;&nbsp; 

	</td>
	</tr>
	</table>
	</form>
<?
}
?>
</div>
	<div style="margin: 3em auto auto auto; text-align: center;">


	   

	</div>
	</body>
	</html>