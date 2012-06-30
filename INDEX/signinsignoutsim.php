<?
require "loginstuff.php";
require 'globalheader.php';
$select_for_sign_out=$_POST['select_for_sign_out'];

$query_string = 
"sim_carrier=" . $_REQUEST['sim_carrier'] 
. "&sim_location=" . $_REQUEST['sim_location']
. "&sim_iccid=" . $_REQUEST['sim_iccid'] 
. "&sim_imsi=" . $_REQUEST['sim_imsi']
. "&sim_msisdn=" . $_REQUEST['sim_msisdn']
. "&sim_user_id=" . $_REQUEST['sim_user_id'];

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
                            <td class="tabdown"><a href="handhelds.php" class="plain">Handhelds</a></td>
                            <td class="tabup"><a href="simcards.php" class="plain">SIM cards</a></td>
                            <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

                        </tr>
                    </table></td></tr>
            <tr id="nav-secondary">
                <td align="center" class="tabs" colspan="2">

                    <table cellpadding="0" cellspacing="0" align="center">
					<tr>
                    <!-- <td class="tabdown2"><a href="displaysim-sorted.php" class="plain">Display SIM</a></td>-->
                    <td class="tabup"><a href="imsearchsim-run.php" class="plain">Search SIM</a></td> 
                    <td class="tabdown2"><a href="addsim.php" class="plain">Add SIM</a></td>
                    <td class="tabdown2"><a href="displayhistorysim.php" class="plain">History</a></td>
					<td class="tabdown2"><a href="export.php" class="plain">Export to Excel</a></td>
			
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
			// Find the user to whom the simcards are being signed out
			
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
			  <title>SIM cards</title>
			</head>
			<body>
			  <p>You, ' . $username . ', have signed in the following SIM cards</p>
			  <p>________________________________________________</p>
			  <table>';
			
			$subject = "SIM cards have been signed in";
			
		}
	else
		{
			$action = "Signed out";
			$user_id = $signout_signin_userid;
			
			// Find the user to whom the simcards are being signed out
			
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
			  <title>SIM cards</title>
			</head>
			<body>
			  <p>The following SIM cards were signed out to you, ' . $username .'</p>
			  <p>________________________________________________</p>
			  <table>';
			
			$subject = "SIM cards have been signed out";
		}
		
	
	
	while (list ($key,$val) = @each ($select_for_sign_out))
	{
		$simcard_id = $val;
		$sqlcommit = "UPDATE devicetracker.simcards SET user_id=$signout_signin_userid WHERE simcard_id=$simcard_id";
		$rscommit = mysql_query($sqlcommit, $connect) or die(mysql_error());
		echo "<br>";
		
		
		
		$sqlget = "SELECT ICCID, Carrier, ID, MSISDN  FROM simcards WHERE simcard_id=$simcard_id";
		$rsget = mysql_query($sqlget, $connect);
		$fetchget = mysql_fetch_assoc($rsget);
		$iccid = $fetchget['ICCID'];
		$carrier = $fetchget['Carrier'];
		$id = $fetchget['ID'];
		$msisdn = $fetchget['MSISDN'];
		
		$message .= '<tr><td>' . 'ICCID : ' . '</td><td>' . $iccid. '</td></tr>' 
		. '<tr><td>' . 'Carrier : ' . '</td><td>' . $carrier. '</td></tr>' 
		. '<tr><td>' . 'ID : ' . '</td><td>' . $id. '</td></tr>' 
		. '<tr><td>' . 'MSISDN : ' . '</td><td>' . $msisdn. '</td></tr>'
		. '<tr><td>________</td><td></td></tr>';
		
		
		$action = $action . " simcard " . $iccid . " carrier : " . $carrier;
		if (!strlen($user_id) >0)
		{
			$user_id = 0;
		}
		$sqlhistory = "INSERT INTO devicetracker.simhistory(userid, adminid, hhid, action, date, simid) "
		." VALUES ($user_id, $adminid, 0, '$action', '$today', $simcard_id)";
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
	location.href="imsearchsim-run.php?<?=$query_string?>";
	</script>
	<?
}


else 
{
	
	if (sizeof($select_for_sign_out) > 0) 
	
	{
	
?>
<form name="signinsignoutsim" method="post" action="<?=$_SERVER['PHP_SELF']?>">
<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
<tr>
<td>
<?
	$select_for_sign_out=$_POST['select_for_sign_out'];
	
	$query_string = $_REQUEST['query_string'];

	
?>
</td>
</tr>

<tr class="thetoprow">
		
		<th class="bigok"><strong>Simcard - Sign In / Sign Out</strong></th>
		
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		</tr>
<tr>
	<th><a href="">ICCID</a></th>
	<th><a href="">Carrier</a></th>
	<th><a href="">ID</a></th>
	<th><a href="">User</a></th>	
	<th><a href="">Location</a></th>
	<th><a href="">Notes</a></th>
	<!-- <th><a href="">Test</a></th> -->
	

</tr>
<?
		while (list ($key,$val) = @each ($select_for_sign_out)) 
		{
				$simcard_id = $val;
				
				$sql = "SELECT s.simcard_id AS simcard_id, s.ICCID AS ICCID, "
			. " s.Carrier AS Carrier, s.ID AS ID, s.Assigned_To AS Assigned_To, "
			. " s.user_id AS user_id, s.IMSI AS IMSI, s.MSISDN AS MSISDN, "
			. " s.Conference_Call AS Conference_Call, s.International_Call AS International_Call, "
			. " s.Call_Forwarding AS Call_Forwarding, s.Call_Barring AS Call_Barring, "
			. " s.Call_Waiting AS Call_Waiting, s.Voice_Mail AS Voice_Mail, s.Telenav AS Telenav, "
			. " s.ALS AS ALS, s.Modem AS Modem, s.PLMN AS PLMN, s.MyFaves AS MyFaves, S.SMS AS SMS, "
			. " s.Voice AS Voice, s.Data_Only, s.Corporate AS Corporate, s.WISPr AS WISPr, s.Talk_to_person_X AS Talk_to_person_X,"
			. " s.Notes AS Notes, s.Sign_out AS Sign_out, "
			. " u.loc_id AS loc_id, "
			. " u.email AS email, u.username AS username, " 
			. " l.name AS location FROM simcards AS s "
			. " LEFT JOIN users AS u ON u.Id = s.user_id "
			. " LEFT JOIN location AS l ON l.id = u.loc_id " 
			. " WHERE s.simcard_id = $simcard_id  " ;
			
				$rs = mysql_query($sql, $connect);
				$fetch = mysql_fetch_assoc($rs);
			
		?>
		<tr <? if ($fetch['user_id']!=0) { echo 'class="not-available"' ; } else { echo 'class="available"' ; } ?>>
			<td><?=$fetch['ICCID']?></td>
			<td><?=$fetch['Carrier']?></td>
			<td><?=$fetch['ID']?></td>
			<td><?=$fetch['username']?></td>
			<td><?=$fetch['location']?></td>
			<td><?=$fetch['Notes']?></td>
			
			<td><?
			/*
			echo '<td>' .'<label class="' . $fetch['Conference_Call'] . '">'. 'CON' . '</label> '. ' &nbsp;' 
			. '<label class=' . $fetch['International_Call'] . '>' . 'INT' . '</label> '. ' &nbsp;' 
			. '<label class=' . $fetch['Call_Forwarding'] . '>' .'FWD'. '</label> ' . ' &nbsp;' 
			. '<label class=' . $fetch['Call_Barring'] . '>' . 'BARR' . '</label>' . ' &nbsp;'
			. '<label class=' . $fetch['Call_Waiting'] . '>' . 'WAIT' . '</label>' . ' &nbsp;'
			. '<label class=' . $fetch['Voice_Mail'] . '>' . 'VMAIL' .  '</label>' . ' &nbsp;'
			. '<label class=' . $fetch['Telenav'] . '>' . 'TELENAV'  .   '</label>' . ' &nbsp;'
			. '<label class=' . $fetch['ALS'] . '>' . 'ALS' .  '</label>' . ' &nbsp;'
			. '<label class=' . $fetch['Modem'] . '>' . 'MODEM' .  '</label>' . ' &nbsp;'
			. '<label class=' . $fetch['PLMN'] . '>' . 'PLMN' . '</label>' . ' &nbsp;'
			. '<label class=' . $fetch['MyFaves'] . '>' . 'MYFAVES' . '</label>' . ' &nbsp;'
			. '<label class=' . $fetch['SMS'] . '>' . 'SMS' . '</label>' . ' &nbsp;'
			. '<label class=' . $fetch['Voice'] . '>' . 'VOICE' . '</label>' . ' &nbsp;'
			. '<label class=' . $fetch['Data_Only'] . '>' . 'DATA' . '</label>' . ' &nbsp;'
			. '<label class=' . $fetch['Corporate'] . '>' . 'CORP' . '</label>' . ' &nbsp;'
			. '<label class=' . $fetch['WISPr'] . '>' . 'WISPr' . '</label>' . ' &nbsp;'
			. '<label class=' . $fetch['Talk_to_person_X'] . '>' . 'PersonX' . '</label>' . ' &nbsp;'
			. '</td>';
			*/
		?></th>
		

		</tr>
		<?
		}
	
	}
	else
	{

		echo "Please select simcards";
	}
	?>
	<tr>
	<td>
		<select name="signout_signin_userid" id="signout_signin_userid" tabindex="9">
		<option value="0">AVAILABLE</option>

		<?php

		$sql2 = "SELECT username, id FROM troubador_device.users WHERE isactive = 1 AND Id > 14 order by username asc";
		
		$rs2 = mysql_query($sql2, $connect);
		while ($fetch2 = mysql_fetch_assoc($rs2))
		{
		 //echo "<option value='" . $fetch['id'] . "'>" . $fetch['username'] . "</option>\n";  
		 
		 
				echo "<option value='" . $fetch2['id'] . "'>" . $fetch2['username'] . "</option>\n";  
		 
		 }
		
		?>
		
	</select>
	</td>
	</tr>
<?

?>

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
<input type="hidden" id="old_user_id" name="old_user_id" value="<?=$_GET['sim_user_id']?>">
	<input type="submit"  value="commit" id="commit" name="commit" tabindex="16">

</td>
</tr>

</table>
</form>

<?
	

	
}





?>

<p class="prev-next"><!--pagenumber--></p>
<form method="post" action="index.php">
<div style="margin: auto; text-align: center;">View 
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