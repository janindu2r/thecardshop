<?php
/*
	Registration script
	author: Aslam
	Date: 2014/11/14
*/

include($_SERVER['DOCUMENT_ROOT'].'/internal.php');

$db = new DbCon();
$mail = new Email();


if($_POST) {
    $email = $_POST['rec_email'];

        $query = "SELECT display_name FROM account where email='" . $email . "'";

        $dname = $db->getScalar($query);
        if ($dname) {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
            $newpassword = substr(str_shuffle($chars), 0, 8);
            $to = $email;
            $body = "Hi " . $dname . "(hoping that is you :P ),<br/> it seems you have forgotten your password. <br/> Dont worry. We are providing you with a temporary password. Please log in with it and then reset your password from your Settings page.<br/><br/> Your temporary password is : " . $newpassword . "  <br/>Hope you have a great day! ";

            $subject = "Comercio Password Recovery";

            if ($mail->sendMail($to, 'help', $subject, $body)) {
                echo 1;
            }
    }
}


?>