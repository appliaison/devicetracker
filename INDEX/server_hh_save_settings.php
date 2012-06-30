<?
//session_start();
//if(!session_is_registered("email"))
//{
//	header("location:index.php");
//}
$formtitle_id = $_GET['formtitle_id'];

require 'db.php';

if ($formtitle_id == 2)
{
	$settings_val2 = $_GET['settings_val2'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val2 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);

}
else if ($formtitle_id == 3)
{
	$settings_val3 = $_GET['settings_val3'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val3 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}
else if ($formtitle_id == 4)
{
	$settings_val4 = $_GET['settings_val4'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val4 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}
else if ($formtitle_id == 5)
{
	$settings_val5 = $_GET['settings_val5'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val5 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}
else if ($formtitle_id == 6)
{
	$settings_val6 = $_GET['settings_val6'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val6 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}
else if ($formtitle_id == 7)
{
	$settings_val7 = $_GET['settings_val7'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val7 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}
else if ($formtitle_id == 8)
{
	$settings_val8 = $_GET['settings_val8'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val8 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}
else if ($formtitle_id == 9)
{
	$settings_val9 = $_GET['settings_val9'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val9 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}
else if ($formtitle_id == 10)
{
	$settings_val10 = $_GET['settings_val10'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val10 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}
else if ($formtitle_id == 20)
{
	$settings_val20 = $_GET['settings_val20'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val20 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}

echo "Saved";

?>