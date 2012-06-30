<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$handheld_id = $_GET['handheld_id'];

$sql = "SELECT loc.id AS loc_id, loc.name AS loc_name, u.username AS username, hh.AssignedNumber AS AssignedNumber, "
    . " hh.RevisionNumber AS RevisionNumber, "
    . " hh.IMEI AS IMEI, "
    . " hh.bootrom AS bootrom, "
    . " hh.CPR AS CPR, "
    . " hh.Status AS Status, "
    . " hh.Notes AS Notes "
    . " FROM troubador_device.handhelds AS hh "
    . " LEFT JOIN  devicetracker.location AS loc ON hh.loc_id = loc.id  "
    . " LEFT JOIN devicetracker.users AS u ON u.Id = hh.userid "
    . " WHERE hh.Id=$handheld_id  " ;

$rs = mysql_query($sql, $connect);
$num_rows = mysql_num_rows($rs);
if ($num_rows==1) {

    $hh_type = $_REQUEST['hh_type'];
    $hh_location = $_REQUEST['hh_location'];
    $hh_assigned_num = $_REQUEST['hh_assigned_num'];
    $hh_revision_num = $_REQUEST['hh_revision_num'];
    $hh_pin = $_REQUEST['hh_pin'];
    $hh_imei = $_REQUEST['hh_imei'];
    $hh_bootrom = $_REQUEST['hh_bootrom'];
    $hh_cpr = $_REQUEST['hh_cpr'];
    $hh_notes = $_REQUEST['hh_notes'];
    $xhh_is_secure = $_REQUEST['xhh_is_secure'];
    $xhh_is_corp = $_REQUEST['xhh_is_corp'];
    $xhh_is_otasl = $_REQUEST['xhh_is_otasl'];
    $hh_userid = $_REQUEST['hh_userid'];

    if ($xhh_is_secure == 'on') {	$xhh_is_secure = 1; } else { $xhh_is_secure = 0; }
    if ($xhh_is_corp == 'on') { $xhh_is_corp = 1; } else { $xhh_is_corp = 0; }
    if ($xhh_is_otasl == 'on') { $xhh_is_otasl = 1; } else { $xhh_is_otasl = 0; }


    $sqlupdate = "UPDATE devicetracker.handhelds SET type = '$hh_type', loc_id = $hh_location, AssignedNumber = $hh_assigned_num, RevisionNumber = '$hh_revision_num', PIN = '$hh_pin', "
        . " IMEI = '$imei', bootrom = '$hh_bootrom', CPR = '$hh_cpr', userid=$hh_userid, Notes = '$hh_notes', is_secure = $xhh_is_secure, is_corp = $xhh_is_corp, is_otasl = $xhh_is_otasl WHERE "
        . " Id = $handheld_id ";

    $rsupdate = mysql_query($sqlupdate, $connect);

    $sql = "SELECT hh.Id AS Id, loc.id AS loc_id, loc.name AS loc_name, u.username AS username, hh.AssignedNumber AS AssignedNumber, "
        . " hh.RevisionNumber AS RevisionNumber, "
        . " hh.IMEI AS IMEI, "
        . " hh.bootrom AS bootrom, "
        . " hh.CPR AS CPR, "
        . " hh.PIN AS PIN, "
        . " hh.Status AS Status, "
		. " hh.userid AS userid, "
        . " hh.Notes AS Notes, "
        . " hh.is_secure AS is_secure, "
        . " hh.is_corp AS is_corp, "
        . " hh.is_otasl AS is_otasl "
        . " FROM troubador_device.handhelds AS hh "
        . " LEFT JOIN  devicetracker.location AS loc ON hh.loc_id = loc.id  "
        . " LEFT JOIN devicetracker.users AS u ON u.Id = hh.userid "
        . " WHERE hh.Id=$handheld_id  " ;

    $rs = mysql_query($sql, $connect);

    $fetch = mysql_fetch_assoc($rs);

    ?>	<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
    <tbody width="100%">
        <tr style="background-color:#CCCCCC;">
    
    <? if ($_SESSION['hh_settings']['hh_show_assigned_num']) { 
	echo '<th class="asc"><a href="index.php?step=list&#38;event=admin&#38;sort=email&#38;dir=desc">Asg</a></th>'; } 
	?>
     <? if ($_SESSION['hh_settings']['hh_show_revision_num']) { 
	 echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Rev#</a></th>'; } 
	 ?>
     <? if ($_SESSION['hh_settings']['hh_show_pin']) 
	 { 
	 echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">PIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></th>';
	 } 
	 ?>
	<? if ($_SESSION['hh_settings']['hh_show_imei']) 
	{ 
	echo '<th class="col_imei"><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">IMEI</a></th>'; } 
	?>
	<? if ($_SESSION['hh_settings']['hh_show_bootrom']) 
	{ 
	echo '<th class="col_bootrom"><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Bootrom</a></th>'; 
	} ?>
	<? 
	if ($_SESSION['hh_settings']['hh_show_cpr']) 
	{ 
	echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">CPR</a></th>'; 
	} 
	?>
	<? 
	if ($_SESSION['hh_settings']['hh_show_user']) 
	{ 
	echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">User</a></th>'; } 
	?>

            <th><a href="<?=$_SERVER['PHP_SELF']?>">Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></th>
    <? 
	if ($_SESSION['hh_settings']['hh_show_location']) 
	{ 
	echo '<th><label>Location</label></th>'; 
	} 
	?>
	<? if ($_SESSION['hh_settings']['hh_show_notes']) 
	{ 
	echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Notes</a></th>'; } 
	?>
    <th></th>
	<th>			
	<a href="<?=$_SERVER['PHP_SELF']?>">Actions</a></th>
        </tr>
        <tr <? if ($fetch['userid'] != 0 ) { echo 'class="not-available"'; } else { echo 'class="available"';}?> >
    <? if ($_SESSION['hh_settings']['hh_show_assigned_num']) { echo '<td>' . $fetch['AssignedNumber'] . '</td>' ; } ?>

    <? if ($_SESSION['hh_settings']['hh_show_revision_num']) { echo '<td>' . $fetch['RevisionNumber'] . '</td>'; } ?>

    <? if ($_SESSION['hh_settings']['hh_show_pin']) { echo '<td>' . $fetch['PIN'] . '</td>'; } ?>

    <? if ($_SESSION['hh_settings']['hh_show_imei']) { echo '<td>' . $fetch['IMEI'] . '</td>'; } ?>

    <? if ($_SESSION['hh_settings']['hh_show_bootrom']) { echo '<td>' . $fetch['bootrom'] . '</td>' ; } ?>

    <? if ($_SESSION['hh_settings']['hh_show_cpr']) { echo '<td>' . $fetch['CPR'] . '</td>'; } ?>

            <td><? echo $fetch['username']; ?></td>
            <td><? if ($fetch['userid']!=0) 
			{ 
			echo '<img src="iconimages/not_available.gif" alt="Not Available" title="Not Available">'; 
			} 
			else { echo '<img src="iconimages/available.gif" alt="Available" title="Available">';} ?>
    <? if (!$fetch['is_secure']) { echo '<img src="iconimages/not_secure.png" alt="Insecure" title="Insecure">'; } 
	else { echo '<img src="iconimages/secure.png" alt="Secure" title="Secure">';} ?>
                    <? if (!$fetch['is_corp']) { echo '<img src="iconimages/not_corporate.png" alt="Testing" title="Testing">'; } 
					else { echo '<img src="iconimages/corporate.png" alt="Corporate" title="Corporate">';} ?>
                    
            </td>
            <td><? echo $fetch['loc_name']; ?></td>
            <td><? echo $fetch['Notes'] ; ?></td>
            <td><a href="edithh.php?handheld_id=<?=$fetch['Id']?>">
			<img src="iconimages/action_edit.png" alt="edit" title="edit"/></a>
                <input id="handheld_id" type="hidden" value="<?=$fetch['Id']?>">
                <img src="iconimages/sign_out.png" alt="sign out" title="sign out"/>
                <a href="#" onclick="openhistorybox(<?=$fetch['Id']?>, 1)">
				<img src="iconimages/action_history.png" alt="history" title="history"/></a>
            </td>
        </tr>
    </tbody>
</table>
<?

			}
