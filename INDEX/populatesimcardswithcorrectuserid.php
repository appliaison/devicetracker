<?

echo 'This script takes the "simcard" table and populates the "simcards" table';
echo '<br>';

require 'db.php';

$sql = "SELECT * FROM troubador_device.simcards";
$rs = mysql_query($sql, $connect);
$count = 0;
while ($fetch = mysql_fetch_assoc($rs))
{
	$count ++;
	$ICCID = $fetch['ICCID'];
	
	$Carrier = $fetch['Carrier'];
	
	$ID = $fetch['ID'];
	
	$Assigned_To =  $fetch['Assigned_To'];
	
	$IMSI = $fetch['IMSI'];
	
	$MSISDN = $fetch['MSISDN'];
	
	$Owner_Name = addslashes($fetch['Owner_Name']);
	
	$Owner_Contact = $fetch['Owner_Contact'];
	
	$In_SVV = $fetch['In_SVV'];
	
	$Conference_Call =  $fetch['Conference_Call'];
	
	$International_Call = $fetch['International_Call'];
	
	$Call_Forwarding = $fetch['Call_Forwarding'];
	
	$Call_Barring = $fetch['Call_Barring'];
	
	$Call_Waiting = $fetch['Call_Waiting'];
	
	$Voice_Mail = $fetch['Voice_Mail'];
	
	$Notes = addslashes($fetch['Notes']);
	
	
	$Util = $fetch['Util'];
	
	$Cost_Jan = $fetch['Cost_Jan'];
	
	$Cost_Feb = $fetch['Cost_Feb'];
	
	$Cost_Mar = $fetch['Cost_Mar'];
	
	$Cost_Apr = $fetch['Cost_Apr'];
	
	$Cost_May = $fetch['Cost_May'];
	
	$Cost_Jun = $fetch['Cost_Jun'];
	
	$Cost_Jul = $fetch['Cost_Jul'];
	
	$Cost_Aug = $fetch['Cost_Aug'];
	
	$Cost_Sept = $fetch['Cost_Sept'];
	
	$Cost_Oct = $fetch['Cost_Oct'];
	
	$Cost_Nov = $fetch['Cost_Nov'];
	
	$Cost_Dec = $fetch['Cost_Dec'];
	
	$Sign_out = $fetch['Sign_out'];
	
	//echo $sql2 = "INSERT INTO simcards22(ICCID, Carrier, ID, Assigned_To, IMSI, MSISDN, Owner_Name, Owner_Contact, Conference_Call, International_Call, Call_Forwarding, Call_Waiting, Voice_Mail, Notes, Util, Cost_Jan, Cost_Feb, Cost_Mar, Cost_Apr, Cost_May, Cost_Jun, Cost_Jul, Cost_Aug, Cost_Sept, Cost_Oct, Cost_Nov, Cost_Dec, Sign_out) " 
	//   . "VALUES ('$ICCID', '$Carrier', '$ID', '$Assigned_To', '$IMSI', '$MSISDN', '$Owner_Name', '$Owner_Contact',  '$Conference_Call', '$International_Call', '$Call_Forwarding', '$Call_Waiting', '$Voice_Mail', '$Notes', '$Util', '$Cost_Jan', '$Cost_Feb', '$Cost_Mar', '$Cost_Apr', '$Cost_May', '$Cost_Jun', '$Cost_Jul', '$Cost_Aug', '$Cost_Sept', '$Cost_Oct', '$Cost_Nov', '$Cost_Dec', '$Sign_out')";
	 echo "<br>";  
	 
	 
	 $insert = mysql_query($sql2, $connect) or mysql_error();
	 if ($insert)
		{
		echo $count . "<strong>" . $insert . "</strong>";
		}
		else
		{
		echo "FAIL";
		}
 
	echo "<br>";

}
