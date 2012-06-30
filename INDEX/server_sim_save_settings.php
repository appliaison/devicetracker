<?
//session_start();
//if(!session_is_registered("email"))
//{
//	header("location:index.php");
//}
$formtitle_id = $_GET['formtitle_id'];

require 'db.php';

if ($formtitle_id == 11)
{
	$settings_val11 = $_GET['settings_val11'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val11 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);

}
else if ($formtitle_id == 12)
{
	$settings_val12 = $_GET['settings_val12'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val12 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}
else if ($formtitle_id == 13)
{
	$settings_val13 = $_GET['settings_val13'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val13 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}
else if ($formtitle_id == 14)
{
	$settings_val14 = $_GET['settings_val14'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val14 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}
else if ($formtitle_id == 15)
{
	$settings_val15 = $_GET['settings_val15'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val15 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}
else if ($formtitle_id == 16)
{
	$settings_val16 = $_GET['settings_val16'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val16 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}
else if ($formtitle_id == 17)
{
	$settings_val17 = $_GET['settings_val17'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val17 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}
else if ($formtitle_id == 18)
{
	$settings_val18 = $_GET['settings_val18'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val18 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}
else if ($formtitle_id == 19)
{
	$settings_val19 = $_GET['settings_val19'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val19 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}
else if ($formtitle_id == 21)
{
	$settings_val21 = $_GET['settings_val21'];
	$sql = "UPDATE devicetracker.settings SET settings_value=$settings_val21 WHERE settings_id = $formtitle_id";
	$rs = mysql_query($sql, $connect);
}

echo "Saved" ;

?>