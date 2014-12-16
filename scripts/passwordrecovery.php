<?php
/*
	Registration script
	author: Aslam
	Date: 2014/11/14
*/

include($_SERVER['DOCUMENT_ROOT'].'/internal.php');

$user = new User();

if($_POST) {
 if($_POST['rec_email'])
 {
     $recEmail = new Email();
     $db = new DbCon();


   //  $recEmail->sendMail(); //add parameters


    // if successfull
     echo 1;
     //else will display an error message so even if it's null no worries


 }
}


?>