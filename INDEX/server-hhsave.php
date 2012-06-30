<?
session_start();
if(!session_is_registered("email"))
{
	header("location:index.php");
}

$handheld_id = $_GET['handheld_id'];
$formtitle_id = $_SESSION['formtitle_id'];
$hh_type = $_GET['hh_type'];
$hh_location = $_GET['hh_location'];
$hh_assigned_num = $_GET['hh_assigned_num'];
$hh_revision_num = $_GET['hh_revision_num'];
$hh_pin = $_GET['hh_pin'];
$hh_imei = $_GET['hh_imei'];
$hh_bootrom = $_GET['hh_bootrom'];
$hh_cpr = $_GET['hh_cpr'];
$hh_notes = $_GET['hh_notes'];
$xhh_is_secure = $_GET['xhh_is_secure'];
$xhh_is_corp = $_GET['xhh_is_corp'];
$xhh_is_otasl = $_GET['xhh_is_otasl'];
$hh_userid = $_GET['hh_userid'];


$connect = mysql_connect('localhost', 'devicetracker', 'device');
$select = mysql_select_db('devicetracker') ;

$sql = "SELECT * FROM troubador_device.handhelds WHERE Id = $formtitle_id ";
$rs = mysql_query($sql, $connect);
$num_rows = mysql_num_rows($rs);

if ($num_rows==1)
{
	echo $sqlupdate = "UPDATE devicetracker.handhelds SET type = '$hh_type', loc_id = $hh_location, AssignedNumber = $hh_assigned_num, RevisionNumber = '$hh_revision_num', PIN = '$hh_pin', "
				. " IMEI = '$imei', bootrom = '$hh_bootrom', CPR = '$hh_cpr', userid=$hh_userid, Notes = '$hh_notes', is_secure = $xhh_is_secure, is_corp = $xhh_is_corp, is_otasl = $xhh_is_otasl WHERE "
				. " Id = $handheld_id ";

	$rsupdate = mysql_query($sqlupdate, $connect);
}

//echo $formtitle_id . "type" . $hh_notes;
echo $handheld_id;
echo "<br>";
echo "Type :";
echo $hh_type;
echo "<br>";
echo $xhh_is_secure = strlen($_GET['xhh_is_secure']);
echo "<br>";
echo $xhh_is_corp = strlen($_GET['xhh_is_corp']);
echo "<br>";
echo $xhh_is_otasl = strlen($_GET['xhh_is_otasl']);
echo "<br>";
?>