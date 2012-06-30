<?
header("content-type: text/xml");
$hh_userid = $_GET['hh_userid'];
$hh_type = $_GET['hh_type'];

$connect = mysql_connect('localhost', 'devicetracker', 'device');
$select = mysql_select_db('devicetracker') ;

if (strlen($_GET['hh_assigned_num']) > 0) 
{
	$hh_assigned_num = $_GET['hh_assigned_num'];
}

if (strlen($_GET['hh_assigned_num']) > 0)
{
	$hh_pin = $_GET['hh_pin'];
	
	$sql = "SELECT id, userid, type, AssignedNumber FROM troubador_device.handhelds WHERE PIN = '$hh_pin' ";
	$rs = mysql_query($sql, $connect);
	$num_rows = mysql_num_rows ($rs);
	
	if ($num_rows==1)
	{
		$fetch = mysql_fetch_assoc($rs);
		$id = $fetch['id'];
		$updatesql = "UPDATE devicetracker.handhelds SET userid = $userid, status = 'SIGNED OUT' WHERE id = $id";
		$updaters = mysql_query($updatesql);
		if ($updaters)
		{
			$hh_message = "Handheld signed out";
		}
		else
		{
			$hh_message = "Update failed";
		}
		
	}
}



echo '<?xml version="1.0"?><user>
        <hh_message>'.$hh_message.'</hh_message>	
        <random>'.$_GET['rnd'].'</random></user>';
		
die();


?>