<?php
/*
	Registration script
	author: Aslam
	Date: 2014/11/14
*/

include('/internal.php');

$user = new User();

if($_POST) {

    if ($_POST['uname']) {
        $valid = $user->validateUserName($_POST['uname']);
        if($valid)
            echo 1;
        else
            echo 0;
    }

    if ($_POST['email']) {
        $valid = $user->validateEmail($_POST['email']);
        if($valid)
            echo 1;
        else
            echo 0;
    }
}


?>