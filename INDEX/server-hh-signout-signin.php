<?
$handheld_id = $_GET['handheld_id'];

$connect = mysql_connect('localhost', 'devicetracker', 'device');
$select = mysql_select_db('devicetracker') ;

echo "sign-out and sign-in activated" . $handheld_id;

$sqltest = "SELECT * FROM troubador_device.sign WHERE handheld_id = $handheld_id";
$rs = mysql_query($sqltest, $connect);
$num_rows = mysql_num_rows($rs);

if (!$num_rows)
{

	$sqlinsert = "INSERT INTO devicetracker.sign (handheld_id) VALUES ($handheld_id)";
	$rsinsert = mysql_query($sqlinsert, $connect);
}
else
{
	$sqldelete = "DELETE FROM troubador_device.sign WHERE handheld_id = $handheld_id";
	$rsdelete = mysql_query($sqldelete, $connect);

}

?>