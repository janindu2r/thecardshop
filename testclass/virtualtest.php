<?php

/*
created on:2014-12-3
by:bmla
*/
include('../class/dbcon.php');
include('../class/product.php');
include('../class/virtual.php');

//calling email function

$email = new Virtual();
$get = $email->getEmail(1000000);
echo $get;

$mail = $email->getEmails("bimlamadhavee@gmail.com");
echo $mail;


?>