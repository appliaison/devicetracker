<?
include 'header.php';
?>

  <form method="get" action="index.php" class="navpop" style="display: inline;">

</form>
</td></tr>
  <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
 		<table cellpadding="0" cellspacing="0" align="center"><tr>
  <td valign="middle" style="width:368px">&nbsp;</td>
  <td class="tabup"><a href="handhelds.php" class="plain">Handhelds</a></td>
  <td class="tabdown"><a href="simcards.php" class="plain">SIM cards</a></td>
  <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

  </tr>
  </table></td></tr>
  <tr id="nav-secondary">
  <td align="center" class="tabs" colspan="2">

			<table cellpadding="0" cellspacing="0" align="center"><tr>
			<td class="tabup"><a href="searchhh.php" class="plain">Search HH</a></td>
			<td class="tabdown2"><a href="addhh.php" class="plain">Add HH</a></td>
			
			<td class="tabdown2"><a href="addhhtype.php" class="plain">Add HH Type</a></td>
			<td class="tabdown2"><a href="displayhhtype.php" class="plain">Display HH Types</a></td>
			<td class="tabdown2"><a href="displayhistory.php" class="plain">History</a></td>
			<td class="tabdown2"><a href="export.php" class="plain">Export to Excel</a></td></tr></table></td></tr></table>

<!-- start of the form -->		
<!-- start of filters -->
<div style="margin: 0px auto auto 20px; text-align: left;">
<select name="type">
	<option value="any">ANY</option>

	<?php

	$sql = "SELECT * FROM troubador_device.handheld_type ORDER BY type";	
	$rs = mysql_query($sql, $connect);
	while ($fetch = mysql_fetch_assoc($rs))
	{
	 echo "<option value='" . $fetch['type'] . "'>" . $fetch['type'] . "</option>\n";  
	 }
	
	?>
    
</select>

<select name="handheld_location">
	<option value="any" selected="selected" >ANY</option>

	<?php

	$sql = "SELECT name, id FROM troubador_device.location ";
	
	$rs = mysql_query($sql, $connect);
	while ($fetch = mysql_fetch_assoc($rs))
	{
	 echo "<option value='" . $fetch['id'] . "'>" . $fetch['name'] . "</option>\n";  
	 }
	
	?>
    
</select>

<input value="" name="AssignedNumber" size="20" class="edit" id="sitename" type="text">
</div>
<!-- end of filters -->

<form action="searchhh.php" method="post" name="longform" ">
<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
<tr>
	<!-- <th class="asc"><a href="index.php?step=list&#38;event=admin&#38;sort=name&#38;dir=desc">Login</a></th> -->
	<th><a href="">Handheld Type</a></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
	
	<tr>	
	
	<td>
	<select name="type">
	<option value="any">ANY</option>

	<?php

	$sql = "SELECT * FROM troubador_device.handheld_type ORDER BY type";
	$rs = mysql_query($sql, $connect);
	while ($fetch = mysql_fetch_assoc($rs))
	{
	 echo "<option value='" . $fetch['type'] . "'>" . $fetch['type'] . "</option>\n";  
	 }
	
	?>
    
</select>
	
	</td>
	<td></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<!-- start of location -->
<tr>

	<th><a href="">Handheld Location</a></th>
	<th><a href="">&nbsp;</a></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
	
	<tr>	
	
	<td>
	<select name="handheld_location">
	<option value="any" selected="selected" >ANY</option>

	<?php

	$sql = "SELECT name, id FROM troubador_device.location ";
	
	$rs = mysql_query($sql, $connect);
	while ($fetch = mysql_fetch_assoc($rs))
	{
	 echo "<option value='" . $fetch['id'] . "'>" . $fetch['name'] . "</option>\n";  
	 }
	
	?>
    
</select>
	
	</td>
	<td></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>

<!-- end of location -->

<!-- start of assigned number -->
<tr>

	<th><a href="">Assigned #</a></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>	
	</tr>
	<tr>	
	
	<th>
	<input value="" name="AssignedNumber" size="20" class="edit" id="sitename" type="text">
	</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&#160;</th>
	<th>&#160;</th>
	<th>&nbsp;</th>
</tr>
<!-- end of assigned# -->
<!-- start of pin -->
<tr>

	<th><a href="">PIN</a></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
	
	</tr>
	
	<tr>	
	
	<th>
	<input value="" name="sitename" size="20" class="edit" id="sitename" type="text">
	</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&#160;</th>
	<th>&#160;</th>
	<th>&nbsp;</th>
</tr>
<!-- end of pin -->
<!-- start of user -->
<tr>

	<th><a href="">User</a></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
	
	<tr>	
	
	<td>
	<select name="user">
	<option value="any">ANY</option>

	<?php

	$sql = "SELECT username, id FROM troubador_device.users WHERE isactive = 1 order by username asc";
	
	$rs = mysql_query($sql, $connect);
	while ($fetch = mysql_fetch_assoc($rs))
	{
	 echo "<option value='" . $fetch['id'] . "'>" . $fetch['username'] . "</option>\n";  
	 }
	
	?>
    
</select>
	
	</td>
	<td></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<!-- end of user-->
<!-- start of available -->
<tr>

	<th><a href="">Available Only</a></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
	
	<tr>	
	
	<td>
	<input type="checkbox" name="mail_password" value="1" id="mail_password" checked="checked" class="checkbox" />
	</td>
	<td></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<!-- end of available-->
<!-- start of submit -->
<tr>

	<th><input type="submit" value="Search" name="search" class="smallerboxsp" title="search"" /></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
</tr>
	

<!-- end of submit-->
<tr>
</tr>
</table>
</form>

<?
if (strlen($_POST['search']) > 0)
{
 echo $type = $_REQUEST['type'];
 echo $handheld_location = $_REQUEST['handheld_location'];
 ?>
    <table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
    <tr>
	<th class="asc"><a href="index.php?step=list&#38;event=admin&#38;sort=name&#38;dir=desc">Handheld Type</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=RealName&#38;dir=desc">&nbsp;</a></th>

	<th><a href="index.php?step=list&#38;event=admin&#38;sort=email&#38;dir=desc">Asg#</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Rev#</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">MB</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Bootrom</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Status</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Date</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">User</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Notes</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Location</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Action</a></th>

	
	<th>&#160;</th><th>&#160;</th></tr>
	
	<!-- start of dynamic rows -->	
	<?
	//echo $sqlhh = "SELECT * FROM troubador_device.handhelds WHERE type='$type' AND loc_id=$handheld_location";
	echo $sqlhh = "SELECT * FROM troubador_device.handhelds WHERE loc_id=$handheld_location";
	$resulthh = mysql_query($sqlhh, $connect);
	while ($fetch = mysql_fetch_assoc($resulthh))
	{
	?>
	<tr>	
	<td><?=$fetch['type']?></td>
	<td>&nbsp;</td>
	<td><? echo $fetch['AssignedNumber']?></td>

	<td>&nbsp;</td>
	<td><?=$fetch['RevisionNumber']?></td>
	
	<td>&nbsp;</td>
	<td><?=$fetch['MB']?></td>
	
	<td>&nbsp;</td>
	<td><?=$fetch['PIN']?></td>
	
	<td>&nbsp;</td>
	<td><?=$fetch['ESN']?></td>
	
	<td>&nbsp;</td>
	<td><?=$fetch['IMEI']?></td>
	
	<td>&nbsp;</td>
	<td><?=$fetch['Phone']?></td>
	
	<td>&nbsp;</td>
	<td><?=$fetch['VoiceMailPassword']?></td>
	
	<td>&nbsp;</td>
	<td><?=$fetch['Notes']?></td>
	
	<td>&nbsp;</td>
	<td><? //$fetch['Status']?></td>
	
	<td>&nbsp;</td>
	<td><?=$fetch['RevisionNumber']?></td>


	</tr>
	<?
	}
	?>
	<!-- end of dynamic rows -->
	</table>
  <?
}
?>


<div style="margin: 3em auto auto auto; text-align: center;">


<p id="moniker">Logged in as <span>ardas</span><br /><a href="index.php?logout=1">Logout</a></p>

</div>
</body>
</html>