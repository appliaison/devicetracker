<?
	$connect = mysql_connect('localhost', 'devicetracker', 'device');
	$select = mysql_select_db('devicetracker');

// Replace all instances of ' with /'
// This will escape my strings for me
//	This page to return search results as part of an AJAX function to make handheld type dropdown menus.

$search = $_REQUEST['search'];
$sql = "SELECT type FROM troubador_device.handheld_type WHERE type LIKE '$search%' AND type <> '$search' ORDER BY TYPE" ;
$rs = mysql_query($sql, $connect);
echo "\n";	
while ($fetch = mysql_fetch_assoc($rs))
{
	echo $fetch['type'] . "\n";
	
}
?>