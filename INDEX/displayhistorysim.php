<?
require "loginstuff.php";
require 'globalheader.php';
?>

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

				<table cellpadding="0" cellspacing="0" align="center"><tr>
					<!-- <td class="tabdown2"><a href="displaysim-sorted.php" class="plain">Display SIM</a></td>-->
						<td class="tabdown2"><a href="imsearchsim-run.php" class="plain">Search SIM</a></td>
						<td class="tabdown2"><a href="quicksearchsim.php" class="plain">Quicksearch</a></td>
						 <td class="tabdown2"><a href="qsigninsim.php" class="plain">Quicksignin</a></td>
						 <td class="tabdown2"><a href="qsignoutsim.php" class="plain">Quicksignout</a></td>
						<td class="tabdown2"><a href="addsim.php" class="plain">Add SIM</a></td>
						<td class="tabup"><a href="displayhistorysim.php" class="plain">History</a></td>
				
				</table>
			
			
			
			</tr></table>
			
<?
require 'checkadmin.php';
?>			
<!-- start of history -->
<form action="index.php" method="post" name="longform" onsubmit="return verify('Are you sure?')">
<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
<tr>
	<th class="asc"><a href="index.php?step=list&#38;event=admin&#38;sort=name&#38;dir=desc">#</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=RealName&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=email&#38;dir=desc">User</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Admin</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Action</a></th>
	<th>&#160;</th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Date</a></th>
	
	</tr>
<?php

$count = 1;

$sql = "SELECT u.username AS username, u.email, h.userid, h.adminid AS admin, "
	. "h.hhID, h.action, h.date AS thetime FROM troubador_device.history AS h "
	. " LEFT JOIN users AS u ON h.adminid = u.Id "
	. " WHERE h.hhid <> 0 ORDER BY h.date DESC, h.id DESC LIMIT 0, 500";


	
$rs = mysql_query($sql, $connect);
while ($fetch = mysql_fetch_assoc($rs) ) 
{
	?>
	<tr>	
	<td><?=$fetch['username']?></td>
	<td>&nbsp;</td>
	<td><?=$fetch['username']?></td>

	<td>&nbsp;</td>
	<td><?=$fetch['admin']?></td>
	<td>&nbsp;</td>
	<td><?
	
	echo $count; ?></td>
	<td><?=$fetch['thetime']?></td>
	<td>&#160;</td>
	</tr>
<?
}
?>


</table>
</form>
		
<!-- end of history -->
	


<div style="margin: 3em auto auto auto; text-align: center;">


</div>
</body>
</html>