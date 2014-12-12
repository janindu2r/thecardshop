<?php

$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/internal.php');

$msg = new Email();

$to = 'blogepistle@gmail.com';
$subj = 'Sample Email';

$message = '<div><h1>This is a test email</h1><p style="padding: 10px; color: grey">This is a test paragraph. This is a test paragraph. This is a test paragraph.</p> </div>';

echo 'Send Mail Through php mail() function <br>'; 

$suc = $msg->sendSimpleMail($to, 'Testing Email Generation', $subj, $message);

if($suc)
	echo 'Success';
else 
	echo 'Not so much';


echo '<br><br>Send Mail through PhpMailer<br>';

if( $msg->sendMail($to, 'Testing Email Generation', $subj, $message))
	echo 'Success';
else
	echo 'Not successful';
;


?>
