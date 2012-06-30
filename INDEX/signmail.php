<?php
$to      = 'ardas@rim.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: devicetracker@rim.com' . "\r\n" .
    'Reply-To: devicetracker@rim.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>
