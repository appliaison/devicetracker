<?

/**
 * Get a web file (HTML, XHTML, XML, image, etc.) from a URL.  Return an
 * array containing the HTTP server response header fields and content.
 */
function get_web_page( $url )
{
    $options = array(
        CURLOPT_RETURNTRANSFER => true,     // return web page
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => "",       // handle all encodings
        CURLOPT_USERAGENT      => "spider", // who am i
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
        CURLOPT_TIMEOUT        => 120,      // timeout on response
        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
	
    );

    $ch      = curl_init( $url );
    curl_setopt_array( $ch, $options );
    $content = curl_exec( $ch );
    $err     = curl_errno( $ch );
    $errmsg  = curl_error( $ch );
    $header  = curl_getinfo( $ch );
    curl_close( $ch );

    $header['errno']   = $err;
    $header['errmsg']  = $errmsg;
    $header['content'] = $content;
    return $header;
}


echo $url = "http://svvrp001cnc/crapp_webservice/Test.aspx?rimnetid=deforbes";
/*

$result = get_web_page( $url );

if ( $result['errno'] != 0 )
   {
   //error: bad url, timeout, redirect loop ...
  }

if ( $result['http_code'] != 200 )
	{
	
    //... error: no page, no permissions, no service ...
	}
echo $page = $result['content'];


echo "<pre>";
print_r($result);
echo "<pre>";




// HTTP authentication
$url = "http://svvrp001cnc/crapp_webservice/Test.aspx?rimnetid=deforbes";
$ch = curl_init();    
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_USERPWD, "ardas:Al0kVaid");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: AuthSub token="' . $token . '"'));
curl_setopt($ch, CURLOPT_HTTPAUTH, "CURLAUTH_NTLM");

$result = curl_exec($ch); 

echo $result; 
curl_close($ch); 
die();

*/

$username = 'ardas';
$password = 'Al0kVaid';
//Contains encoded string to pass along for basic authentication purposes
$auth_token = base64_encode($username . '-' . $password);
//Target URL - the URL you want to submit a form to
$target_url = 'http://svvrp001cnc/crapp_webservice/Test.aspx?rimnetid=deforbes';
//Create  a new cURL handle
//Passing the target URL to curl_init allows you to bypass the call curl_setopt($ch, CURLOPT_URL, $target_url);
$ch = curl_init($target_url);
//Tell the handler that the info is to be sent using an HTTP POST request
curl_setopt($ch, CURLOPT_POST, true);
//Set other relevant headers.  Place each header as an array element
//An alternative to building the Authorization header is to use curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
$headers = array('Authorization: Basic ' . $auth_token,
				 'User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//Pass the POST fields - be sure to urlencode your value strings (hint: http_build_query() will do this for you; PHP5)
//Below we assume values have already been posted to this script and kept in $_POST.  We have validated the submission and
// are now posting the same values to a remote URL
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST));
//When we execute the handle, we want curl_exec() to return to a string rather than directly outputting it
curl_setopt($ch, CURLOPT_RETURNTRANSER, 1);
//Don't use a cached connection - explicitly create a new one
curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
//Fail if cannot connect to the target server within 5 seconds
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
//If the target server returns a redirect request using the "Location:" header directive, then follow it.
//To prevent recursive redirects, only do a max of 5 follows
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
//Let's now execute the handler
//Because CURLOPT_RETURNTRANSFER is true, we need to capture the return value of curl_exec()
$response_data = curl_exec($ch);
//Was there an error?
//curl_errno() returns the error code
//curl_error() returns a clear text message for the last cURL operation
if (curl_errno($ch)> 0){
	die('There was a cURL error: ' . curl_error($ch));
} else {
	//Close the handler and release resources
	curl_close($ch);
}
//Now do something with your data
echo $response_data;



?>