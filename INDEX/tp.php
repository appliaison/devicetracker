<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
	<title>Txp &#8250; My Site &#8250; Users</title>
	<link href="textpattern.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="textpattern.js"></script>

	<script type="text/javascript">
	<!--

		var cookieEnabled = checkCookies();

		if (!cookieEnabled)
		{
			confirm('Browser cookies must be enabled to use Textpattern.');
		}

		function poweredit(elm)
		{
			var something = elm.options[elm.selectedIndex].value;

			// Add another chunk of HTML
			var pjs = document.getElementById('js');

			if (pjs == null)
			{
				var br = document.createElement('br');
				elm.parentNode.appendChild(br);

				pjs = document.createElement('P');
				pjs.setAttribute('id','js');
				elm.parentNode.appendChild(pjs);
			}

			if (pjs.style.display == 'none' || pjs.style.display == '')
			{
				pjs.style.display = 'block';
			}

			if (something != '')
			{
				switch (something)
				{
case 'changeprivilege':
	pjs.innerHTML = '<span><select name=\"privs\" class=\"list\">	<option value=\"1\">Publisher</option>	<option value=\"2\">Managing Editor</option>	<option value=\"3\">Copy Editor</option>	<option value=\"4\">Staff writer</option>	<option value=\"5\">Freelancer</option>	<option value=\"6\">Designer</option>	<option value=\"0\" selected=\"selected\">None</option></select></span>';
	break;

					default:
						pjs.style.display = 'none';
					break;
				}
			}

			return false;
		}

		addEvent(window, 'load', cleanSelects);
	-->
	</script>
	<script type="text/javascript" src="jquery.js"></script>
		</head>
	<body id="page-admin">
	  <table id="pagetop" cellpadding="0" cellspacing="0">
  <tr id="branding"><td><h1 id="textpattern">Textpattern</h1></td><td id="navpop"><form method="get" action="index.php" class="navpop" style="display: inline;">
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
		<option value="diag">Diagnostics</option>
		<option value="prefs">Preferences</option>
		<option value="admin">Users</option>
		<option value="log">Visitor Logs</option>

		<option value="plugin">Plugins</option>
		<option value="import">Import</option>
	</optgroup>
</select>
</form></td></tr>
  <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
 		<table cellpadding="0" cellspacing="0" align="center"><tr>
  <td valign="middle" style="width:368px">&nbsp;</td><td class="tabdown"><a href="?event=article" class="plain">Content</a></td><td class="tabdown"><a href="?event=page" class="plain">Presentation</a></td><td class="tabup"><a href="?event=admin" class="plain">Admin</a></td><td class="tabdown"><a href="http://localhost/devicetracker/" class="plain" target="_blank">View Site</a></td></tr></table></td></tr><tr id="nav-secondary"><td align="center" class="tabs" colspan="2">

			<table cellpadding="0" cellspacing="0" align="center"><tr><td class="tabdown2"><a href="?event=diag" class="plain">Diagnostics</a></td><td class="tabdown2"><a href="?event=prefs" class="plain">Preferences</a></td><td class="tabup"><a href="?event=admin" class="plain">Users</a></td><td class="tabdown2"><a href="?event=log" class="plain">Visitor Logs</a></td><td class="tabdown2"><a href="?event=plugin" class="plain">Plugins</a></td><td class="tabdown2"><a href="?event=import" class="plain">Import</a></td></tr></table></td></tr></table>
<form method="post" action="index.php"><h3 style="text-align: center;">Add New Author</h3><table cellpadding="3" cellspacing="0" border="0" id="edit" align="center">
<tr><td class="noline" style="text-align: right; vertical-align: middle;">Login </td><td class="noline"><input type="text" value="" name="name" class="edit" /></td></tr><tr><td class="noline" style="text-align: right; vertical-align: middle;">Real Name </td><td class="noline"><input type="text" value="" name="RealName" class="edit" /></td></tr><tr><td class="noline" style="text-align: right; vertical-align: middle;">E-mail </td><td class="noline"><input type="text" value="" name="email" class="edit" /></td></tr><tr><td class="noline" style="text-align: right; vertical-align: middle;">Privileges </td>	<td><select name="privs" class="list">
	<option value="1">Publisher</option>

	<option value="2">Managing Editor</option>
	<option value="3">Copy Editor</option>
	<option value="4">Staff writer</option>
	<option value="5">Freelancer</option>
	<option value="6">Designer</option>
	<option value="0" selected="selected">None</option>

</select>&#160;<a target="_blank" href="http://rpc.textpattern.com/help/?item=about_privileges&#38;language=en-gb" onclick="popWin(this.href); return false;" class="pophelp">?</a></td>
</tr><tr>	<td>&#160;</td>
	<td><input type="submit" value="Save" class="publish" />&#160;<a target="_blank" href="http://rpc.textpattern.com/help/?item=add_new_author&#38;language=en-gb" onclick="popWin(this.href); return false;" class="pophelp">?</a></td>
</tr>
</table>
<input type="hidden" value="admin" name="event" /><input type="hidden" value="author_save_new" name="step" /></form>
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
</form><p class="prev-next">1/1</p>
<form method="post" action="index.php"><div style="margin: auto; text-align: center;">View <select name="qty" class="list" onchange="submit(this.form);">
	<option value="15">15</option>
	<option value="25" selected="selected">25</option>
	<option value="50">50</option>
	<option value="100">100</option>

</select> per page<input type="hidden" value="admin" name="event" /><input type="hidden" value="admin_change_pageby" name="step" /><noscript> <input type="submit" value="Go" class="smallerbox" /></noscript></div></form>
<div style="margin: 3em auto auto auto; text-align: center;">
<form method="post" action="index.php"><h3>Change Your Password</h3><p style="text-align: center;"><label for="new_pass">New password</label> <input type="password" value="" name="new_pass" size="20" class="edit" tabindex="1" id="new_pass" /><input type="checkbox" name="mail_password" value="1" id="mail_password" checked="checked" class="checkbox" /><label for="mail_password">Mail it to me</label> <input type="submit" value="Submit" name="change_pass" class="smallerbox" /><input type="hidden" value="admin" name="event" /><input type="hidden" value="change_pass" name="step" /></p></form>
</div>
<!-- runtime: 0.0176 --><div id="end_page"><form method="get" action="index.php" class="navpop">
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
		<option value="diag">Diagnostics</option>
		<option value="prefs">Preferences</option>
		<option value="admin">Users</option>
		<option value="log">Visitor Logs</option>

		<option value="plugin">Plugins</option>
		<option value="import">Import</option>
	</optgroup>
</select>
</form>
<a href="http://www.textpattern.com"><img src="txp_img/carver.gif" width="60" height="48" border="0" alt="" /></a>
<p>Textpattern &#183; 4.0.8</p>
<p id="moniker">Logged in as <span>ardas</span><br /><a href="index.php?logout=1">Logout</a></p>

</div>
</body>
</html>