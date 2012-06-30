<?php
$headers = apache_request_headers();

if (!isset($headers['Authorization'])){
	header('HTTP/1.1 401 Unauthorized');
	header('WWW-Authenticate: NTLM');
	exit;
}

$auth = $headers['Authorization'];

if (substr($auth,0,5) == 'NTLM ') 
{
	$msg = base64_decode(substr($auth, 5));
	if (substr($msg, 0, 8) != "NTLMSSP\x00")
		die('error header not recognised');

	if ($msg[8] == "\x01") 
	{
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
	else if ($msg[8] == "\x03") 
	{
		function get_msg_str($msg, $start, $unicode = true) 
		{
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
		$email = $user . "@rim.com";
		include 'loadsettings.php';
		$sqlfind = "SELECT Id AS user_id FROM users WHERE email LIKE '$email' ";
		$rsfind = mysql_query($sqlfind, $connect);
		$fetch = mysql_fetch_assoc($rsfind);
		$user_id = $fetch['user_id'];
		
		$nowdate = date("Y-n-j"); 
		$nowtime = date("H:i:s");
		$coordinates = $_SERVER['REMOTE_ADDR'];
		$workstation = $domain . " " . $workstation;
		$page = $_SERVER['PHP_SELF'];
		$sqlinsert = "INSERT INTO loginlog (userid, time, coordinates, date, workstation, page) VALUES ($user_id, '$nowtime', '$coordinates', '$nowdate', '$workstation', '$page')";
		$runinsert = mysql_query($sqlinsert, $connect);

		
	}
}
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
	
	session_start();
	//if(!session_is_registered("email"))
	//{
	//header("location:index.php");
	//}
	
	


?>
