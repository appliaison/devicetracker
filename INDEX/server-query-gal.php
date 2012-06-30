<?
require 'creds.php';

$protocol = "http://";
$url = "http://svvrp001cnc/crapp_webservice/Test.aspx?rimnetid=deforbes";

// Setup a string with the form parameters in it
$strParameters = "query=dog";

// Initialize the CURL library
$ch = curl_init($url);

// Set the URL to execute
curl_setopt($ch, CURLOPT_URL, "http://svvrp001cnc/crapp_webservice/Test.aspx?rimnetid=ardas");

// Set options
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $strParameters);
//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_NTLM); 

// make sure you enter the values of $username and $password in a file called "creds.php"
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");

// Execute, saving results in a variable
$strPage = curl_exec($ch);

// Close CURL resource
curl_close($ch);

// This will print out the HTML contents
echo($strPage);


?>