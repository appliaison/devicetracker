<?
include 'header.php';
?>
  
  <form method="get" action="index.php" class="navpop" style="display: inline;">
<!--
<select name="event" onchange="submit(this.form);">
	<option>Go&#8230;</option>

	<optgroup label="Content">
		<option value="category">Categories</option>
		<option value="article">Write</option>
		<option value="list">Articles</option>
		<option value="image">Images</option>
		<option value="file">Files</option>

		<option value="link">Links</option>
		<option value="discuss">Comments</option>
	</optgroup>
	<optgroup label="Presentation">
		<option value="section">Sections</option>
		<option value="page">Pages</option>
		<option value="form">Forms</option>

		<option value="css">Style</option>
	</optgroup>
	<optgroup label="Admin">
		<option value="diag">Carriers</option>
		<option value="prefs">Preferences</option>
		<option value="admin">Users</option>
		<option value="log">Visitor Logs</option>

		<option value="plugin">Plugins</option>
		<option value="import">Import</option>
	</optgroup>
</select>
-->
</form></td></tr>
  <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
 		<table cellpadding="0" cellspacing="0" align="center"><tr>
  <td valign="middle" style="width:368px">&nbsp;</td>
  <td class="tabdown"><a href="handhelds.php" class="plain">Handhelds</a></td>
  <td class="tabup"><a href="simcards.php" class="plain">SIM cards</a></td>
  <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

  </tr>
  </table></td></tr>
  <tr id="nav-secondary">
  <td align="center" class="tabs" colspan="2">

	        <table cellpadding="0" cellspacing="0" align="center"><tr>
			<td class="tabdown2"><a href="displaysim.php" class="plain">Display SIM</a></td>
			<td class="tabdown2"><a href="searchsim.php" class="plain">Search SIM</a></td>
			<td class="tabup"><a href="signoutsim.php" class="plain">Sign-out SIM</a></td>
			<td class="tabdown2"><a href="signinsim.php" class="plain">Sign-in SIM</a></td>
			<td class="tabdown2"><a href="addsim.php" class="plain">Add SIM</a></td>
			<td class="tabdown2"><a href="editsim.php" class="plain">Edit SIM</a></td>
			<td class="tabdown2"><a href="removesim.php" class="plain">Remove SIM</a></td>
			
			
			</tr></table></td></tr></table>

		
<form action="index.php" method="post" name="longform" onsubmit="return verify('Are you sure?')"><table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
<tr>
	<th class="asc"><a href="index.php?step=list&#38;event=admin&#38;sort=name&#38;dir=desc">Login</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=RealName&#38;dir=desc">Real Name</a></th>

	<th><a href="index.php?step=list&#38;event=admin&#38;sort=email&#38;dir=desc">E-mail</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">Privileges</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Last Login</a></th><th>&#160;</th><th>&#160;</th></tr><tr>	<td>ardas</td>
	<td>ardas</td>
	<td><a href="mailto:ardas@rim.com">ardas@rim.com</a></td>

	<td>Publisher</td>
	<td>May&#160;2009</td>
	<td><a href="?event=admin&#38;step=author_edit&#38;user_id=1">Edit</a></td>
	<td>&#160;</td>
</tr>

<tr><td colspan="6" style="text-align: right; border: none;">Select: <input type="button" value="All" name="selall" class="smallerboxsp" title="select all" onclick="selectall();" /><input type="button" value="None" name="selnone" class="smallerboxsp" title="select none" onclick="deselectall();" /><input type="button" value="Range" name="selrange" class="smallerboxsp" title="select range" onclick="selectrange();" /><label for="withselected">With selected:</label>&#160;<select name="edit_method" class="list" id="withselected" onchange="poweredit(this); return false;">

	<option value="" selected="selected"></option>
	<option value="changeprivilege">Change privilege</option>
	<option value="resetpassword">Reset password</option>
	<option value="delete">Delete</option>
</select>
<input type="hidden" value="admin" name="event" />
<input type="hidden" value="admin_multi_edit" name="step" />
<input type="hidden" value="1" name="page" />
<input type="hidden" value="name" name="sort" />
<input type="hidden" value="asc" name="dir" />

<input type="submit" value="Go" class="smallerbox" /></td></tr>
</table>
</form>

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