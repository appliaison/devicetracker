<?
require "loginstuff.php";
require 'globalheader.php';
?>

            <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
                    <table cellpadding="0" cellspacing="0" align="center"><tr>
                            <td valign="middle" style="width:368px">&nbsp;</td>
							<td class="tabdown"><a href="home.php" class="plain">Home</a></td>
                            <td class="tabup"><a href="index.php" class="plain">Handhelds</a></td>
                            <td class="tabdown"><a href="simcards.php" class="plain">SIM cards</a></td>
                            <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

                        </tr>
                    </table></td></tr>
            <tr id="nav-secondary">
                <td align="center" class="tabs" colspan="2">

                    <table cellpadding="0" cellspacing="0" align="center"><tr>
                            <td class="tabdown2"><a href="index.php" class="plain">Search HH</a></td>
							<td class="tabdown2"><a href="quicksearchhh.php" class="plain">Quicksearch</a></td>
							<td class="tabdown2"><a href="qsigninhh.php" class="plain">Quicksignin</a></td>
							<td class="tabdown2"><a href="qsignouthh.php" class="plain">Quicksignout</a></td>
                            <td class="tabdown2"><a href="addhh.php" class="plain">Add HH</a></td>
                            <td class="tabup"><a href="hhtypes.php" class="plain">HH Types</a></td>
                            <td class="tabdown2"><a href="displayhistoryhh.php" class="plain">History</a></td>
                         
							</tr>
                    </table>
                </td>
            </tr>

        </table>
<!-- start of displayhhtype -->
<?
require 'checkadmin.php';
?>
<?
if ( (strlen($_REQUEST['hh_type']) > 0) && (strlen($_REQUEST['hh_desc']) > 0)  && (isset($_REQUEST['add']) ) )
{
	$hh_type = $_REQUEST['hh_type'];
	$hh_desc = $_REQUEST['hh_desc'];
	
	$sqladd = "INSERT INTO devicetracker.handheld_type (type, description, visibility) VALUES ('$hh_type', '$hh_desc', 1)";
	$rsadd = mysql_query($sqladd, $connect);
	
	?>
	<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
	<tr>

	<th class="ok">Handheld Type added</th>
	<th></th>

	<th></th>
	<th></th>
	<th></a></th>
	<th>&nbsp;</a></th>
	<th></a></th>
	<th>&#160;</th>
	<th>&#160;</th>
	
	</tr>
	<?
	
	
}

?>
<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
<tr>
	<th class="asc"><a href="index.php?step=list&#38;event=admin&#38;sort=name&#38;dir=desc">ID</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=RealName&#38;dir=desc">&nbsp;</a></th>

	<th><a href="index.php?step=list&#38;event=admin&#38;sort=email&#38;dir=desc">Type</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Description</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Count</a></th>
	<th>&#160;</th>
	<th>&#160;</th>
	
	</tr>
	<form method="post" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">

	<tr>
	<th class="asc"></a></th>
	<th></th>
	<th><input value="" name="hh_type" size="10" class="edit" id="sitename" tabindex="1" type="text"></th>
	<th></th>
	<th><input value="" name="hh_desc" size="20" class="edit" id="sitename" tabindex="1" type="text"></a></th>
	<th>&nbsp;</a></th>
	<th><input value="add" name="add" tabindex="6" type="submit"></a></th>
	<th>&#160;</th>
	<th>&#160;</th>	
	</tr>
	
	</form>
<?php
$sql = "SELECT * FROM troubador_device.handheld_type";
$rs = mysql_query($sql, $connect);
while ($fetch = mysql_fetch_assoc($rs) ) 
{
	?>
	<tr>	
	<td><?=$fetch['Id']?></td>
	<td>&nbsp;</td>
	<td><?=$fetch['type']?></td>

	<td>&nbsp;</td>
	<td><?=$fetch['description']?></td>
	<td>&nbsp;</td>
	<td><?
	$type = $fetch['type'];
	
	$sql2 = "SELECT * FROM troubador_device.handhelds WHERE type = '$type' ";
	$rs2 = mysql_query($sql2, $connect);
	$count = mysql_num_rows($rs2);
	
	echo $count; ?></td>
	<td><a href="hhtypes-edit.php?hh_id=<?=$fetch['Id']?>">Edit</a></td>
	<td>&#160;</td>
	</tr>
<?
}
?>


</table>


<p class="prev-next">1/1</p>
<form method="post" action="index.php"><div style="margin: auto; text-align: center;">View <select name="qty" class="list" onchange="submit(this.form);">
	<option value="15">15</option>
	<option value="25" selected="selected">25</option>
	<option value="50">50</option>
	<option value="100">100</option>

</select> per page<input type="hidden" value="admin" name="event" /><input type="hidden" value="admin_change_pageby" name="step" /><noscript> <input type="submit" value="Go" class="smallerbox" /></noscript></div></form>
<div style="margin: 3em auto auto auto; text-align: center;">


<p id="moniker">Logged in as <span>ardas</span><br /><a href="index.php?logout=1">Logout</a></p>

</div>
</body>
</html>