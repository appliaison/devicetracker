<?
header("content-type: text/xml");

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



//$date = '2009-06-11';
$today = date("Y-n-j"); 

$sql = "INSERT INTO devicetracker.handhelds (type, AssignedNumber, RevisionNumber, PIN, IMEI, Notes, Status, userid, timestamp, bootrom, loc_id,  is_secure, is_corp, is_otasl, CPR ) " 
. " VALUES ('$hh_type', $hh_assigned_num, '$hh_revision_num', '$hh_pin', '$hh_imei', '$hh_notes', "
. " '$hh_status', '$hh_userid', '$today', '$bootrom', $hh_location, $is_secure, $is_corp, $is_otasl, '$hh_cpr') ";

$connect = mysql_connect('localhost', 'devicetracker', 'device');
$select = mysql_select_db('devicetracker') ;

$result = mysql_query($sql, $connect);

if (!$result)
{
	echo $sql;
}

/*

int retval = statement.executeUpdate("INSERT INTO simcard VALUES(" + iccid + "," + carrier + "," + id + ", NULL," + imsi + "," + msisdn + "," + owner_name + "," + owner_contact + ", 'Y' ," + conference_call + "," + international_call + "," + call_forwarding + "," + call_barring + "," + call_waiting + "," + voice_mail + "," + notes + "," + Util + "," + Cost_Jan + "," + Cost_Feb + "," + Cost_Mar + "," + Cost_Apr + "," + Cost_May + "," + Cost_Jun + "," + Cost_Jul + "," + Cost_Aug + "," + Cost_Sept + "," + Cost_Oct + "," + Cost_Nov + "," + Cost_Dec + ", NOW())");
  out.println("<b>SUCCESS:</b> Your changes have been successfully written to the database.");
  session.putValue("entry", "<b>" + userName + " (Add SIM)</b>: added SIM with ICCID: " + iccid + ", Carrier: " + carrier + ", ID: " + id + ", IMSI: " + imsi + ", MSISDN: " + msisdn + ", Owner Name: " + owner_name + ", Owner Contact: " + owner_contact + ", Conference Call: " + conference_call + ", International Call: " + international_call + ", Call Forwarding: " + call_forwarding + ", Call Barring: " + call_barring + ", Call Waiting: " + call_waiting + ", Voice Mail: " + voice_mail + ", Notes: " + notes);

catch (SQLException e)
{ if (e.getErrorCode() == 1062) 
  { out.println("<p><b>ERROR:</b> There is a SIM card with the same ICCID already in the database. Please go back and try again.</p>"); 
  }
  else if (e.getErrorCode() == 1048)
  { out.println("<p><b>ERROR:</b> A required field was not filled in. Please go back and try again.</p>"); 
  }
  else
  { out.println("<p><b>ERROR:</b> Unexpected error <b>" + e.getErrorCode() + "</b> occurred.</p>");
    out.println("<p>" + e + "</p>");
  }
}
*/


echo '<?xml version="1.0"?><user>
        <hh_type>'.$hh_type.'</hh_type>
		<hh_location>'.$hh_location.'</hh_location>
		<hh_assigned_num>'.$hh_assigned_num.'</hh_assigned_num>
		<hh_revision_num>'.$hh_revision_num.'</hh_revision_num>
		<hh_pin>'.$hh_pin.'</hh_pin>
		<hh_imei>'.$hh_imei.'</hh_imei>
		<hh_bootrom>'.$hh_bootrom.'</hh_bootrom>
		<hh_notes>'.$hh_notes.'</hh_notes>
        <hh_cpr>' .$hh_cpr. '</hh_cpr>		
        <random>'.$_GET['rnd'].'</random></user>';
		
die();

?>