<?php
/*
	Registration script
	author: Aslam
	Date: 2014/11/14
*/

	include($_SERVER['DOCUMENT_ROOT'].'/internal.php');

    $db = new DbCon();
	$user = new User();

        $regDetail['email'] = "'".$_POST["email"]. "'" ;
        $regDetail['display_name'] = $db->escapeString($_POST["uname"]);
        $regDetail['password'] = $db->escapeString(md5($_POST["password"]));

        $userDetails['fname'] = $db->escapeString($_POST["firstname"]);
        $userDetails['lname'] = $db->escapeString($_POST["lastname"]);
        $userDetails['gender'] = $db->escapeString($_POST["gender"]);
        $date = "'". $_POST["year"] . "-" . $_POST["month"] . "-" . $_POST["day"] . "'";
        $userDetails['date_of_birth'] = $date;
        $userDetails['deflt_billin_addl1'] = $db->escapeString($_POST["add1"]);
        $userDetails['deflt_billin_addl2'] = $db->escapeString($_POST["add2"]);
        $userDetails['deflt_billin_addl3'] = $db->escapeString($_POST["add3"]);
        $userDetails['postal_code'] = $_POST["postal"];

        $result = $user->registration($regDetail,$userDetails);

        if($result)
            header('location: /activation.php?success=true');
        else
            header('location: /activation.php?success=false');



?>