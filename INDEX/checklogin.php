<?php
$host="localhost"; // Host name
$username="devicetracker"; // Mysql username
$password="device"; // Mysql password
$db_name="devicetracker"; // Database name
$tbl_name="users"; // Table name

// Connect to server and select databse.
$connect = mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form
$email=$_POST['email'];
$password=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$email= stripslashes($email);
$password = stripslashes($password);
$email = mysql_real_escape_string($email);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM $tbl_name WHERE email='$email' AND password='$password' AND isactive=1";
$result=mysql_query($sql, $connect);

// initialize settings
$sqlinit1 = "UPDATE devicetracker.settings SET settings_value = 0 WHERE settings_id = 5";
$result1 = mysql_query($sqlinit1, $connect);

$sqlinit2 = "UPDATE devicetracker.settings SET settings_value = 0 WHERE settings_id = 6";
$result2 = mysql_query($sqlinit2, $connect);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1)
{
	// Register $myusername, $mypassword and redirect to file "index2.php"
	$_SESSION['email'] = $email;
	$_SESSION['password'] = $password;
	session_register("email");
	session_register("password");
	
	$fetch = mysql_fetch_assoc($result);
	$userid = $fetch['Id'];
	
	$nowdate = date("Y-n-j"); 
	$nowtime = date("H:i:s");
	$coordinates = $_SERVER['REMOTE_ADDR'];
	$sqlinsert = "INSERT INTO loginlog (userid, time, coordinates, date) VALUES ($userid, '$nowtime', '$coordinates', '$nowdate')";
	$runinsert = mysql_query($sqlinsert, $connect);
	header("location:imsearchhh.php?runinsert=$runinsert");
}
else 
{
	header("location:index.php?login=0");
}
?>
