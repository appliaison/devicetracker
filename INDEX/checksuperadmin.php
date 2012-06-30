<?
 $useremail = $user . '@rim.com';
$sqlcheckpermissions = "SELECT issuperadmin, isadmin, email FROM users WHERE email = '$useremail' AND isactive=1";
$rs = mysql_query($sqlcheckpermissions, $connect);
$fetch = mysql_fetch_assoc($rs);

if  ( (!$fetch['issuperadmin']) and ($_SERVER['PHP_SELF'] != '/devicetracker/index.php') and ($_SERVER['PHP_SELF'] != '/devicetracker/imsearchsim-run.php')  )
{
echo "<br/>";
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You do not have privileges for accessing this feature. ';
echo 'Please email <a href="mailto:svvhhtoolsdev@rim.com&subject=[Device Tracker Priveleges Request]
&body=Please give me administrator access to Device Tracker">SV&V Handheld Tools Development DL </a> for privileges';
die();
}


?>
