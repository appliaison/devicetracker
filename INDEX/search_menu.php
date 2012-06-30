<?
include 'header2.php';
?>
<body>
<body id="page-admin">
<table id="pagetop" cellpadding="0" cellspacing="0">
  <tr id="branding"><td>
  <a href="http://svv-db:8090/devicetracker/index.php"><h1 id="textpattern">Textpattern</h1></a>
  </td><td id="navpop">


  <form method="get" action="index.php" class="navpop" style="display: inline;">

</form>
</td></tr>
  
  </table></td></tr>
  
</table>

<form action="searchframes.php" method="post" name="longform" ">
<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">

	<tr>	
	
	<td><a href="index.php?step=list&#38;event=admin&#38;sort=name&#38;dir=desc">Handheld Type</a></td>
	<td>
	<select name="type" tabindex="1">
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

	<th></th>
	<th><a href="">&nbsp;</a></th>
	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
	
	<tr>	
		
	<td><a href="">Handheld Location</a>
	</td>
	<td>
	<select name="handheld_location" tabindex="2">
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

	<th></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>	
	</tr>
	<tr>	

	<td><a href="">Assigned #</a>
	</td>
	<td>
	<input value="" name="AssignedNumber" size="20" class="edit" id="sitename" type="text" tabindex="3">
	</td>
	<td>&nbsp;</td>
	
</tr>
<!-- end of assigned# -->
<!-- start of pin -->
<tr>

	<th></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
	
	</tr>
	
	<tr>	
	
	<td><a href="">PIN</a>
	</td>
	
	<td>
	<input value="" name="sitename" size="20" class="edit" id="sitename" type="text" tabindex="4">
	</td>
	<td>&nbsp;</td>
</tr>
<!-- end of pin -->
<!-- start of user -->
<tr>

	<th></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
	
	<tr>	
	
	<td>
	<a href="">User</a>
	</td>
	<td>
	<select name="user" tabindex="4">
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

</tr>
<!-- end of user-->
<!-- start of available -->
<tr>

	<th></th>
	<th><a href="">&nbsp;</a></th>

	<th>&nbsp;</th>
	<th>&nbsp;</th>
	<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
	
	<tr>	
	
	<td><a href="">Available Only</a>
	</td>
	<td>
	<input type="checkbox" name="mail_password" value="1" id="mail_password" checked="checked" class="checkbox" tabindex="5"/>
	</td>
	<td></td>
	<td>&nbsp;</td>

</tr>
<!-- end of available-->
<!-- start of submit -->
<tr>

	<th><input type="submit" value="Search" name="search" class="smallerboxsp" title="search"" tabindex="6"/></th>
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
</body>
</html>