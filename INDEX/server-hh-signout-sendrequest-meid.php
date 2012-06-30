<?

$identifier = $_GET['identifier'];
$hh_userid = $_GET['hh_userid'];

require 'db.php';

$today = date("Y-n-j"); 
$now = date("Y-n-j" . " " . "H:m:s");

?>
<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
<tr class="thetoprow">
<th class="bigok"><strong>Signing out.. </strong></th>
<th class="bigok"><? echo $typesdescription; ?> </th>
<th></th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>

</tr>
<tr>
<?echo '<th class="asc"><a href="imsearchhh.php?sort=asg&dir=desc">Type</a></th>';  ?>
<?echo '<th class="asc"><a href="imsearchhh.php?sort=asg&dir=desc">Asg</a></th>';  ?>
<?  echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Rev#</a></th>';  ?>
<? echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">PIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></th>'; ?>
<? echo '<th class="col_imei"><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">IMEI / MEID</a></th>';  ?>
<? echo '<th class="col_bootrom"><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Location</a></th>';  ?>
<?  echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Now signed out to</a></th>';?>
</tr>
<?

		$sqlupdate = "UPDATE handhelds SET timestamp = '$now', userid = $hh_userid WHERE IMEI = '$identifier' ";
		$rsupdate = mysql_query($sqlupdate, $connect) or die(mysql_error());		

		$sqlhh = "SELECT h.Id AS Id, h.type AS type, h.AssignedNumber AS AssignedNumber, h.RevisionNumber AS RevisionNumber, h.MB AS MB, "
				. " h.PIN AS PIN, h.ESN AS ESN, h.IMEI AS IMEI, h.Phone AS Phone, h.VoiceMailPassword AS VoiceMailPassword, h.Notes AS Notes, "
				. " h.Status AS Status, h.userid AS userid, u.username AS username, h.timestamp AS timestamp, h.bootrom AS bootrom, "
				. " h.loc_id AS loc_id, loc.name AS loc_name, h.is_secure AS is_secure, "
				. " h.is_corp AS is_corp, h.is_otasl AS is_otasl, h.CPR AS CPR, loc.name AS loc_name "
				. " FROM troubador_device.handhelds AS h "
				. " LEFT JOIN users AS u ON u.Id=h.userid "
				. " LEFT JOIN location AS loc ON loc.id = h.loc_id "
				. " WHERE (1=1) AND (h.userid <> 248) AND h.IMEI='$identifier' " ;

		$resulthh = mysql_query($sqlhh, $connect) or die(mysql_error());
		$num_rows = mysql_num_rows($resulthh);
		if ($num_rows)
		{
			$fetch = mysql_fetch_assoc($resulthh);
		
			?>
			<tr <? echo 'class="not-available"';  ?> >	
			<?
			echo '<td>' . $fetch['type'] . '</a></td>'; 
			 echo '<td>' . $fetch['AssignedNumber'] . '</a></td>'; 
			  echo '<td>' . $fetch['RevisionNumber'] . '</td>'; 
			  echo '<td>' . $fetch['PIN'] . '</td>';  
			  echo '<td>' . $fetch['IMEI'] . '</td>';  
			  echo '<td>' . $fetch['loc_name'] .  '</td>';   
			  echo '<td>' . $fetch['username'].  '</td>';   
			  echo '<td>' . '&nbsp;' .  '</td>'; 
			  echo '<td>' . '&nbsp;' .  '</td>'; 
				echo '</tr>';
		}
?>

</table>
