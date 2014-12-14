<?php
/*
	Registration script
	author: Aslam
	Date: 2014/11/14
*/

include($_SERVER['DOCUMENT_ROOT'].'/internal.php');

$user = new User();

if($_POST) {

    foreach($_POST as $key => $val)
    {
        switch ($key) {
            case "uname":
                $valid = $user->validateUserName($val);
                if ($valid)
                    echo 1;
                else
                    echo 0;
                break;
            case "email";
                $valid = $user->validateEmail($val);
                if($valid)
                    echo 1;
                else
                    echo 0;
                break;
        }
    }
}


?>