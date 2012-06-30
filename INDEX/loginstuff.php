<?php
// $headers = apache_request_headers();

		$user = 'ardas';
		
		$email = $user. "@rim.com";
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
		//$sqlinsert = "INSERT INTO loginlog (userid, time, coordinates, date, workstation, page) VALUES ($user_id, '$nowtime', '$coordinates', '$nowdate', '$workstation', '$page')";
		$runinsert = mysql_query($sqlinsert, $connect);

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
