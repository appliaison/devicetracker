<?

$hh_type = $_GET['hh_type']; 	

require 'db.php';

$sqlassigned = "SELECT * FROM troubador_device.handhelds WHERE type = '$hh_type'";

$rsassigned = mysql_query($sqlassigned, $connect);

$num_rows = mysql_num_rows($rsassigned);

if ($num_rows > 0)

{

	$sqlmax = "SELECT MAX(AssignedNumber) AS max_assigned FROM troubador_device.handhelds WHERE type = '$hh_type' ";
	$rsmax = mysql_query($sqlmax, $connect);
	$fetch = mysql_fetch_assoc($rsmax);
	$max_assigned = $fetch['max_assigned'];
	$next = $max_assigned+1;
	echo $next;

}
else
{

	echo "0";
}
