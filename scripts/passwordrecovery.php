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
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $newpassword = substr(str_shuffle($chars), 0, 8);
            $to = $email;
            $body = "Hello " . $dname . "<br/><br/> It seems you have forgotten your password. <br/> Don't worry. We are providing you with a temporary password. Please log in with it and then reset your password from your Settings page.<br/><br/> Your temporary password is <b>" . $newpassword . "</b> <br/><br/>Hope you have a great day! ";

            $subject = "Comercio Password Recovery";

            if ($mail->sendMail($to, 'help', $subject, $body)) {
                $sc = $db->runUpdateOneValue('account', 'password = "'. md5($newpassword) . '"', 'display_name = "'. $dname . '"');
                if($sc)
                {
                    //login and update your password or whatever, redirection etc etc
                    echo '1';
                }
            }
    }
}


?>