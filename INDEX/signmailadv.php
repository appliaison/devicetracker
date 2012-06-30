<?php
// multiple recipients
$to  = 'ardas@rim.com' . ', '; // note the comma
$to .= 'ardas@rim.com';

// subject
$subject = 'Devices signed out to you';

// message
$message = '
<html>
<head>
  <title>Devices</title>
</head>
<body>
  <p>The following devices were signed out to you</p>
  <table>
    <tr>
      <th>Type</th><th>IMEI</th><th>PIN</th><th>Year</th>
    </tr>
    <tr>
      <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: Mary <ardas@rim.com>, Myles<ardas@rim.com>' . "\r\n";
$headers .= 'From: Device Tracker <devicetracker@rim.com>' . "\r\n";
$headers .= 'Cc: ardas@rim.com' . "\r\n";
$headers .= 'Bcc: ardas@rim.com' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
?>
