<?php

$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/internal.php');

//calling email function


$msg = new Email();

$to = 'jkehelwala28@gmail.com';
$subj = 'Sample Email';

$message = '<div><h1>This is a test email</h1><p style="padding: 10px; color: grey">This is a test paragraph. This is a test paragraph. This is a test paragraph.</p> </div>';

$suc = $msg->sendMail($to, 'Testing Email Generation', $subj, $message);

if($suc)
	echo 'Success';
else 
	echo 'Not so much';




?>
