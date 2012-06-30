<?php

// This a copy taken 2008-08-21 from http://siphon9.net/loune/f/ntlm.php.txt to make sure the code is not lost.
// For more information see:
// http://blogs.msdn.com/cellfish/archive/2008/08/26/getting-the-logged-on-windows-user-in-your-apache-server.aspx

// NTLM specs http://davenport.sourceforge.net/ntlm.html

$headers = apache_request_headers();

if (!isset($headers['Authorization'])){
	header('HTTP/1.1 401 Unauthorized');
	header('WWW-Authenticate: NTLM');
	exit;
}

$auth = $headers['Authorization'];

if (substr($auth,0,5) == 'NTLM ') {
	$msg = base64_decode(substr($auth, 5));
	if (substr($msg, 0, 8) != "NTLMSSP\x00")
		die('error header not recognised');

	if ($msg[8] == "\x01") {
		$msg2 = "NTLMSSP\x00\x02"."\x00\x00\x00\x00". // target name len/alloc
			"\x00\x00\x00\x00". // target name offset
			"\x01\x02\x81\x01". // flags
			"\x00\x00\x00\x00\x00\x00\x00\x00". // challenge
			"\x00\x00\x00\x00\x00\x00\x00\x00". // context
			"\x00\x00\x00\x00\x30\x00\x00\x00"; // target info len/alloc/offset

		header('HTTP/1.1 401 Unauthorized');
		header('WWW-Authenticate: NTLM '.trim(base64_encode($msg2)));
		exit;
	}
	else if ($msg[8] == "\x03") {
		function get_msg_str($msg, $start, $unicode = true) {
			$len = (ord($msg[$start+1]) * 256) + ord($msg[$start]);
			$off = (ord($msg[$start+5]) * 256) + ord($msg[$start+4]);
			if ($unicode)
				return str_replace("\0", '', substr($msg, $off, $len));
			else
				return substr($msg, $off, $len);
		}
		$user = get_msg_str($msg, 36);
		$domain = get_msg_str($msg, 28);
		$workstation = get_msg_str($msg, 44);


		
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
	<title>Device Tracker </title>
	<link href="css/default.css" rel="stylesheet" type="text/css" />

	<script type="text/javascript" src="jquery.js"></script>
		</head>
	<body id="page-logout">
	  <table id="pagetop" cellpadding="0" cellspacing="0">
  <tr id="branding"><td><h1 id="textpattern">Devicetracker</h1></td><td id="navpop"></td></tr>
  <tr id="nav-primary"><td align="center" class="tabs" colspan="2">

 		<table cellpadding="0" cellspacing="0" align="center"><tr>
  <td valign="middle" style="width:368px">&nbsp;</td><td class="tabdown"></td></tr></table></td></tr></table>
<form method="post" action="checklogin.php"><table cellpadding="3" cellspacing="0" border="0" id="edit" align="center">


<tr>
	<td>&#160;</td>
	<td><p>Welcome <? echo $user ; //$workstation.$domain"; ?></p> 
	
	<p>Login to Device Tracker - The Unified SIM and HH database</p></td>
</tr>

<tr>

<td class="noline" style="text-align: right; vertical-align: middle;"><label for="name">Email</label></td>
<td class="noline"><input type="text" value="" name="email" class="edit" tabindex="1" id="email" /></td></tr>

<tr>
<td class="noline" style="text-align: right; vertical-align: middle;"><label for="password">Password </label></td>
	<td><input type="password" value="" name="password" class="edit" tabindex="2" id="password" /></td>
</tr>

<tr>
	<td>&#160;</td>
	<td><p>
	
	<input type="checkbox" name="stay" value="1" id="stay" tabindex="3" class="checkbox" /><label for="stay">Remain logged in with this browser</label>&#160;</p></td>

</tr>
<tr>
	<td>&#160;</td>
	<td><p><? 
	$login=$_GET['login'];
	if (strlen($login) > 0)
	{
		if (!$login)
		{
			echo "Wrong Username or Password";
		}
	}
	?></p></td>

</tr>
<tr>
	<td>&#160;</td>
	<td><input type="submit" value="Login" class="publish" tabindex="4" /><p><a href="?reset=1">Forgot password?</a></p></td>
</tr>
</table>
</form>
<?
echo $_SESSION;
?>

</html>