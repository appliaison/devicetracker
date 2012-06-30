<?

session_start();
//if(!session_is_registered("email"))
//{
//	header("location:index.php");
//}


require 'db.php';


$sql = "SELECT * FROM settings";
$rs = mysql_query($sql, $connect);
$_SESSION['hh_settings'] = array();

while ($fetch = mysql_fetch_assoc($rs))
{
	$settings_name = $fetch['settings_name']; 
	$_SESSION['hh_settings'][$settings_name] = $fetch['settings_value'];
	
}

/*
echo "<pre>";
print_r($_SESSION['hh_settings']);
echo "</pre>";
*/
