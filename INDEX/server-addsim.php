<?
header("content-type: text/xml");
$sim_iccid = $_GET['sim_iccid'];
$sim_carrier = $_GET['sim_carrier'];
if (strlen($_GET['sim_id'])>0) $sim_id = $_GET['sim_id']; else $sim_id = 'NULL'; 
$assigned_to = 'NULL';
if (strlen($_GET['sim_imsi'])>0) $sim_imsi = $_GET['sim_imsi']; else $sim_imsi = 'NULL'; 
if (strlen($_GET['sim_msisdn'])>0) $sim_msisdn = $_GET['sim_msisdn']; else $sim_msisdn = 'NULL';
if (strlen($_GET['sim_owner_name'])>0) $sim_owner_name = $_GET['sim_owner_name']; else $sim_owner_name = 'NULL';
if (strlen($_GET['sim_available_only'])>0) $sim_available_only = $_GET['sim_available_only']; else $sim_available_only = 'NULL';
if (strlen($_GET['sim_in_svv'])>0) $sim_in_svv = $_GET['sim_in_svv']; else $sim_in_svv = 'NULL';
if (strlen($_GET['sim_conference_call'])>0) $sim_conference_call = $_GET['sim_conference_call']; else $sim_conference_call = 'NULL';
if (strlen($_GET['sim_international_call'])>0) $sim_international_call = $_GET['sim_international_call']; else $sim_international_call = 'NULL';
if (strlen($_GET['sim_call_forwarding'])>0) $sim_call_forwarding = $_GET['sim_call_forwarding']; else $sim_call_forwarding = 'NULL';
if (strlen($_GET['sim_call_barring'])>0) $sim_call_barring = $_GET['sim_call_barring']; else $sim_call_barring = 'NULL';
if (strlen($_GET['sim_call_waiting'])>0) $sim_call_waiting = $_GET['sim_call_waiting']; else $sim_call_waiting = 'NULL';
if (strlen($_GET['sim_voicemail'])>0) $sim_voicemail = $_GET['sim_voicemail']; else $sim_voicemail = 'NULL';
if (strlen($_GET['sim_notes'])>0) $sim_notes = $_GET['sim_notes']; else $sim_notes = 'NULL';

$date = '2009-06-11';
$today = date("Y-n-j"); 
$sql = "INSERT INTO devicetracker.simcards22 (ICCID, Carrier, ID, Assigned_To, user_id, IMSI, MSISDN, Owner_Name, "
. "Owner_Contact, In_SVV, Conference_Call, International_Call, Call_Forwarding, Call_Barring, Call_Waiting, "
. " Voice_Mail, Notes, Util, Cost_Jan, Cost_Feb, Cost_Mar, Cost_Apr, Cost_May, Cost_Jun, Cost_Jul, Cost_Aug, "
. " Cost_Sept, Cost_Oct, Cost_Nov, Cost_Dec, Sign_out, loc_id ) VALUES('$sim_iccid', '$sim_carrier', '$sim_id', '$assigned_to', 0, '$sim_imsi', '$sim_msisdn', "
. " '$sim_owner_name', '$sim_available_only', '$sim_in_svv', '$sim_conference_call', '$sim_international_call', '$sim_call_forwarding', '$sim_call_barring', "
. " '$sim_call_waiting', '$sim_voicemail', '$sim_notes', 'Test', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '$today', 1 )";

$connect = mysql_connect('localhost', 'devicetracker', 'device');
$select = mysql_select_db('devicetracker') ;

$result = mysql_query($sql, $connect) or die(mysql_error());

 
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
        <sim_iccid>'.$sim_iccid.'</sim_iccid>
		<sim_carrier>'.$sim_carrier.'</sim_carrier>
		<sim_id>'.$sim_id.'</sim_id>
		<sim_imsi>'.$sim_imsi.'</sim_imsi>
		<sim_msisdn>'.$sim_msisdn.'</sim_msisdn>
		<sim_owner_name>'.$sim_owner_name.'</sim_owner_name>
		<sim_available_only>'.$sim_available_only.'</sim_available_only>
		<sim_in_svv>'.$sim_in_svv.'</sim_in_svv>
		<sim_conference_call>'.$sim_conference_call.'</sim_conference_call>
		<sim_international_call>'.$sim_international_call.'</sim_international_call>
		<sim_call_forwarding>'.$sim_call_forwarding.'</sim_call_forwarding>
		<sim_call_barring>'.$sim_call_barring.'</sim_call_barring>
		<sim_call_waiting>'.$sim_call_waiting.'</sim_call_waiting>
		<sim_voicemail>'.$sim_voicemail.'</sim_voicemail>
		<sim_notes>'.$sim_notes.'</sim_notes>
	    <today>'.$today.'</today>
        <random>'.$_GET['rnd'].'</random></user>';
		
die();

?>