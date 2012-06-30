<?
require "loginstuff.php";
require 'globalheader.php';

$select_for_sign_out=$_POST['select_for_sign_out'];

$query_string = 
"type=" . $_REQUEST['type'] 
. "&handheld_location=" . $_REQUEST['handheld_location']
. "&assigned_num=" . $_REQUEST['assigned_num'] 
. "&revision_num=" . $_REQUEST['revision_num']
. "&pin=" . $_REQUEST['pin']
. "&imei=" . $_REQUEST['imei']
. "&bootrom_version=" . $_REQUEST['bootrom_version']
. "&cpr=" . $_REQUEST['cpr']
. "&userid=" . $_REQUEST['userid'];


  $useremail = $user . '@rim.com';
  $sqlcheckpermissions = "SELECT isadmin, email, id FROM users WHERE email = '$useremail' ";
  $rs = mysql_query($sqlcheckpermissions, $connect);
  $fetch = mysql_fetch_assoc($rs);
  $adminid = $fetch['id'];

?>
 
  <form method="get" action="index.php" class="navpop" style="display: inline;">

</form></td></tr>
              <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
                    <table cellpadding="0" cellspacing="0" align="center"><tr>
                            <td valign="middle" style="width:368px">&nbsp;</td>
							<td class="tabdown"><a href="home.php" class="plain">Home</a></td>
                            <td class="tabup"><a href="handhelds.php" class="plain">Handhelds</a></td>
                            <td class="tabdown"><a href="simcards.php" class="plain">SIM cards</a></td>
                            <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

                        </tr>
                    </table></td></tr>
            <tr id="nav-secondary">
                <td align="center" class="tabs" colspan="2">

                    <table cellpadding="0" cellspacing="0" align="center"><tr>
                            <td class="tabup"><a href="index.php" class="plain">Search HH</a></td>
							<td class="tabdown2"><a href="quicksearchhh.php" class="plain">Quicksearch</a></td>
							 <td class="tabdown2"><a href="qsigninhh.php" class="plain">Quicksignin</a></td>
							 <td class="tabdown2"><a href="qsignouthh.php" class="plain">Quicksignout</a></td>
                            <td class="tabdown"><a href="addhh.php" class="plain">Add HH</a></td>
							<td class="tabdown2"><a href="hhtypes.php" class="plain">HH Types</a></td>
                            <td class="tabdown2"><a href="displayhistoryhh.php" class="plain">History</a></td>
                            <td class="tabdown2"><a href="export.php" class="plain">Export to Excel</a></td></tr>
                    </table>
                </td>
            </tr>

        </table>
		<?
			require 'checkadmin.php';
		?>
<?
if (isset($_REQUEST['commit']))
{
	
	

	$today = date("Y-m-d") ." " . date("G:i:s");
	$signout_signin_userid = $_REQUEST['signout_signin_userid'];
	$old_user_id = $_REQUEST['old_user_id'];
	
	if ($signout_signin_userid == 0)
		{
			$action = "Signed in ";
			$user_id = $old_user_id;
			// Find the user to whom the devices are being signed out
			
			$sqlfind = "SELECT email, username FROM users WHERE id = $user_id ";
			$rsfind = mysql_query($sqlfind, $connect);
			
			$fetchfind = mysql_fetch_assoc($rsfind);
			
			//$to  = $fetchfind['email'] . ', '; // note the comma
			//$to .= 'ardas@rim.com';
			
			$to  = $fetchfind['email'];
			
			
			$username = $fetchfind['username'];
			// multiple recipients
			
			// message
			$message = '
			<html>
			<head>
			  <title>Devices</title>
			</head>
			<body>
			  <p>You, ' . $username .  ' have signed in the following devices</p>
			  <p>________________________________________________</p>
			  <table>   
			  ';
			
			$subject = "Devices have been signed in";
			
		}
	else
		{
			$action = "Signed out";
			$user_id = $signout_signin_userid;
			
			// Find the user to whom the devices are being signed out
			
			$sqlfind = "SELECT email, username FROM users WHERE id = $user_id ";
			$rsfind = mysql_query($sqlfind, $connect);
			
			$fetchfind = mysql_fetch_assoc($rsfind);
			
			//$to  = $fetchfind['email'] . ', '; // note the comma
			//$to .= 'ardas@rim.com';
			
			$to  = $fetchfind['email'];
			
			
			$username = $fetchfind['username'];
			// multiple recipients
			
			// message
			$message = '
			<html>
			<head>
			  <title>Devices</title>
			</head>
			<body>
			  <p>The following devices were signed out to you, ' . $username . '</p>
			  <p>________________________________________________</p>
			  <table>   
			';
			
			$subject = "Devices have been signed out";
		}
		
		
	
	while (list ($key,$val) = @each ($select_for_sign_out))
	{
		$handheld_id = $val;
		$sqlcommit = "UPDATE devicetracker.handhelds SET userid=$signout_signin_userid WHERE Id=$handheld_id";
		$rscommit = mysql_query($sqlcommit, $connect);
		//echo "<br>";
		
		$sqlget = "SELECT type, AssignedNumber, IMEI, PIN  FROM troubador_device.handhelds WHERE Id=$handheld_id";
		$rsget = mysql_query($sqlget, $connect);
		$fetchget = mysql_fetch_assoc($rsget);
		$hh_type = $fetchget['type'];
		$AssignedNumber = $fetchget['AssignedNumber'];
		$imei = $fetchget['IMEI'];
		$pin = $fetchget['PIN'];
		
		
		
		$message .= '<tr><td>' . 'Type : ' . '</td><td>' . $hh_type. '</td></tr>' 
		. '<tr><td>' . 'AssignedNumber : ' . '</td><td>' . $AssignedNumber. '</td></tr>' 
		. '<tr><td>' . 'IMEI : ' . '</td><td>' . $imei . '</td></tr>' 
		. '<tr><td>' . 'PIN : ' . '</td><td>' . $pin. '</td></tr>'
		. '<tr><td>________</td><td></td></tr>';
		
		

		
		$action = $action . " handheld " . $hh_type . " #" . $AssignedNumber;
		if (!strlen($user_id) >0)
		{
			$user_id = 0;
		}
		$sqlhistory = "INSERT INTO devicetracker.history(userid, adminid, hhid, action, date, simid) "
		." VALUES ($user_id, $adminid, $handheld_id, '$action', '$today', 0)";
		$rshistory = mysql_query($sqlhistory);
			
		
	}
	
			$message .= 
		'</table>
		<p>If you think the above information is incorrect, please contact <a href="mailto:SVVHandheldPPA@rim.com?subject=[DeviceTracker%20Error]">Project Prime Assistants</a></p>	
		</body>
		</html>
		';
        
		
	
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		//$headers .= 'To: Mary <ardas@rim.com>, Myles<ardas@rim.com>' . "\r\n";
		$headers .= 'To:' .  $username . '<' . $to . '>'. "\r\n";
		$headers .= 'From: Device Tracker <devicetracker@rim.com>' . "\r\n";
		//$headers .= 'Cc: tread@rim.com' . "\r\n";
		$headers .= 'Bcc: devicetracker@rim.com' . "\r\n";

		// Mail it
		mail($to, $subject, $message, $headers);
						
	
	
	$query_string = $_REQUEST['query_string'];
	?>
	<script type="text/javascript">
	location.href="index.php?<?=$query_string?>";
	</script>
	<?
}
else
{
	if (sizeof($select_for_sign_out) > 0) 
	{
		$today = date("Y-m-d") . " " . date("G:i:s");
		?>
		<form name="signinsignouthh" method="post" action="<?=$_SERVER['PHP_SELF']?>">
		<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
		<tr>
			<!-- <th><a href="">Id</a></th> -->
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
		while (list ($key,$val) = @each ($select_for_sign_out)) 
			{
					$handheld_id = $val;
					$sqlpopulate = "SELECT h.Id AS handheld_id, h.type AS type, h.userid AS userid, "
					. " h.AssignedNumber AS AssignedNumber, h.RevisionNumber AS RevisionNumber, "
					. " h.MB AS MB, h.PIN AS PIN, h.ESN AS ESN, h.IMEI AS IMEI, h.Status AS Status, u.username AS username "
					. " FROM troubador_device.handhelds AS h " 
					. " LEFT JOIN devicetracker.users AS u ON u.Id = h.userid WHERE h.Id=$handheld_id";
					echo "<br>";
					$rspopulate = mysql_query($sqlpopulate, $connect);
					$num_rows = mysql_num_rows($rspopulate);
					while ($fetch = mysql_fetch_assoc($rspopulate))
					{
					?>
					<tr <? if ($fetch['userid']==0) { echo 'class="available"' ; } else { echo 'class="not-available"' ; } ?>>
						<!-- <td><?=$fetch['handheld_id']?></td> -->
						<td><?=$fetch['type']?></td>
						<td><?=$fetch['AssignedNumber']?></td>
						<td><? echo $fetch['RevisionNumber']  ;?></td>
						<td><? echo $fetch['MB']?></td>
						<td><?=$fetch['PIN']?></td>
						<td><?=$fetch['ESN']?></td>
						<td><?  if ($fetch['userid']==0) { echo 'AVAILABLE' ; } else { echo 'SIGNED OUT' ; }  ?></td>
						<td><?=$fetch['username']?></td>

					</tr>
					<?
					}
					
			}
	}

	else
	{

		echo "Please select devices";
	}
	
	?>
	
	<tr>
	<td>
		<select name="signout_signin_userid" id="signout_signin_userid" tabindex="9">
		<option value="0">AVAILABLE</option>

		<?php

		$sql2 = "SELECT username, id FROM users WHERE isactive = 1 order by username asc";
		
		$rs2 = mysql_query($sql2, $connect);
		while ($fetch2 = mysql_fetch_assoc($rs2))
		{
		 //echo "<option value='" . $fetch['id'] . "'>" . $fetch['username'] . "</option>\n";  
		 
		  if (strlen($userid) > 0)
			{
				if ($_SESSION['userid']	== $fetch2['id'])
				{ 
				echo "<option value='" . $fetch2['id'] . "'" . " selected" . ">" . $fetch2['username'] . "</option>\n";  
				}
				else
				{
				  echo "<option value='" . $fetch2['id'] . "'>" . $fetch2['username'] . "</option>\n";  
				}

			}
			else
			{
				echo "<option value='" . $fetch2['id'] . "'>" . $fetch2['username'] . "</option>\n";  
			}
		 
		 }
		
		?>
		
	</select>
	</td>
	</tr>
	
	<tr>
	<td>
	
	<?
	
	for ($i=0; $i<sizeof($select_for_sign_out); $i++)
	{
	?>
	<input type="hidden" name="select_for_sign_out[]" id="select_for_sign_out[]" class="checkbox" tabindex="10" value="<?=$select_for_sign_out[$i]?>" />
	<?
	}
	?>
	<input type="hidden" id="query_string" name="query_string" value="<?=$query_string?>" >
	<input type="hidden" id="old_user_id" name="old_user_id" value="<?=$_GET['userid']?>">
	<input type="submit"  value="commit" id="commit" name="commit" tabindex="16">

	</td>
	</tr>

	</table>
	</form>
<?
	
	
}






?>






<form method="post" action="index.php"><div style="margin: auto; text-align: center;">View 
<select name="qty" class="list" onchange="submit(this.form);">
	<option value="15">15</option>
	<option value="25" selected="selected">25</option>
	<option value="50">50</option>
	<option value="100">100</option>

</select> per page<input type="hidden" value="admin" name="event" />
<input type="hidden" value="admin_change_pageby" name="step" />
<noscript> <input type="submit" value="Go" class="smallerbox" /></noscript></div></form>
<div style="margin: 3em auto auto auto; text-align: center;">




</div>
</body>
</html>