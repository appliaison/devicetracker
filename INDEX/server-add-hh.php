<?

$hh_type = $_GET['hh_type']; 																						// type
$hh_location = $_GET['hh_location'];																				// location
if (strlen($_GET['hh_assigned_num'])>0) $hh_assigned_num = $_GET['hh_assigned_num']; else $hh_assigned_num = -1; // assigned num
if (strlen($_GET['hh_revision_num'])>0) $hh_revision_num = $_GET['hh_revision_num']; else $hh_revision_num = 'NULL'; // revision num
if (strlen($_GET['hh_pin'])>0) $hh_pin = $_GET['hh_pin']; else $hh_pin = 'NULL';									// pin
if (strlen($_GET['hh_imei'])>0) $hh_imei = $_GET['hh_imei']; else $hh_imei = 'NULL';								// imei
if (strlen($_GET['hh_bootroom'])>0) $hh_bootroom = $_GET['hh_bootroom']; else $hh_bootroom = 'NULL';				// bootroom
if (strlen($_GET['hh_notes'])>0) $hh_notes = $_GET['hh_notes']; else $hh_notes = 'NULL';							// notes
if (strlen($_GET['is_secure'])>0) $is_secure = $_GET['is_secure']; else $is_secure = 2;									// is_secure
if (strlen($_GET['is_corp'])>0) $is_corp = $_GET['is_corp']; else $is_corp = 2;										// is_corp
if (strlen($_GET['is_otasl'])>0) $is_otasl = $_GET['is_otasl']; else $is_otasl = 2;									// is_otasl
if (strlen($_GET['hh_cpr'])>0) $hh_cpr = $_GET['hh_cpr']; else $hh_cpr = 'NULL';									// CPR
$hh_status = 'AVAILABLE';
$hh_userid = 666;

require 'db.php';


//$date = '2009-06-11';
$today = date("Y-n-j"); 

$sqlcheck1 = "SELECT * FROM troubador_device.handhelds WHERE PIN = '$hh_pin' ";
$rscheck1 = mysql_query($sqlcheck1, $connect);
$num_rows1 = mysql_num_rows($rscheck1);


if ($num_rows1>0)
{

	echo "FAIL-PINEXISTS";
	
}

else
{

	$sql = "INSERT INTO devicetracker.handhelds (type, AssignedNumber, RevisionNumber, PIN, IMEI, Notes, Status, userid, timestamp, bootrom, loc_id,  is_secure, is_corp, is_otasl, CPR ) " 
	. " VALUES ('$hh_type', $hh_assigned_num, '$hh_revision_num', '$hh_pin', '$hh_imei', '$hh_notes', "
	. " '$hh_status', '$hh_userid', '$today', '$bootrom', $hh_location, $is_secure, $is_corp, $is_otasl, '$hh_cpr') ";


	$result = mysql_query($sql, $connect);

	if (!$result)
	{
		echo $sql;
	}
}


?>