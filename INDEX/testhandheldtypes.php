<?
require 'db.php';


$sql = "SELECT * FROM troubador_device.handheld_type ORDER BY type";

$rs = mysql_query($sql, $connect);

$handheldtype = array();

while ($fetch = mysql_fetch_assoc($rs))
{
		 $handheldtype[] = $fetch['type'];
		
		
}

sort($handheldtype);

echo "<pre>";

print_r($handheldtype);

echo "</pre>";


?>

