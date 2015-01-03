<?php
/*
	Edit profile script
	Author : Aslam
*/

$path = $_SERVER['DOCUMENT_ROOT'];
include ($path.'/internal.php');
//$user = new User();
$user = $_SESSION['user'];

$db = new DbCon();

$clause = "reg_id = '". $user->getRegID() . "'";

$edited = 0;

if (!empty($_POST['submitUser']))
{
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$add1 = $_POST["add1"];
	$add2 = $_POST["add2"];
	$add3 = $_POST["add3"];
	$postal = $_POST["postal"];

	if($user->fName != $fname)
	{
		$_SESSION['user']->fName = $fname;
		$fname = $db->escapeString($_POST["fname"]);
		$arr['fname'] = $fname;
	}
	if($user->lName != $lname)
	{
	    $_SESSION['user']->lName = $lname;
		$lname = $db->escapeString($_POST["lname"]);
	    $arr['lname'] = $lname;
	}
	if($user->postalCode != $postal)
	{
	    $_SESSION['user']->postalCode = $postal;
		$postal = $db->escapeString($_POST["postal"]);
	    $arr['postal_code'] = $postal;
	}
	if($user->addressL1 != $add1)
	{
		$_SESSION['user']->addressL1 = $add1;
		$add1 = $db->escapeString($_POST["add1"]);
	    $arr['deflt_billin_addl1'] = $add1;
	}
	if($user->addressL2 != $add2)
	{
		$_SESSION['user']->addressL2 = $add2;
		$add2 = $db->escapeString($_POST["add2"]);
	    $arr['deflt_billin_addl2'] = $add2;
	}
	if($user->addressL3 != $add3)
	{
		$_SESSION['user']->addressL3 = $add3;
		$add3 = $db->escapeString($_POST["add3"]);
	    $arr['deflt_billin_addl3'] = $add3;	    
	}

	$res = $db->runUpdateRecord('user',$arr, $clause);
	$edited = 1;
	$multiple = '&user='.$res;
}

if (!empty($_POST['submitEmail']))
{
	$email = $_POST["email"];
	if($user->email != $email)
	{
		$_SESSION['user']->email = $email;
		$email = $db->escapeString($_POST["email"]);
		$ar['email'] = $email;
	}
	$resEmail = $db->runUpdateRecord('account', $ar, $clause);
	$edited = 1;
	$multiple = '&email='.$resEmail;
}


if (!empty($_POST['submitPass']))
{
	$upPass = 0;
	$curpass = $db->escapeString(md5($_POST["password"]));
	$newpass = $db->escapeString(md5($_POST["newpassword"]));
	$dbpass = $db->escapeString($user->getPassword());

	if($dbpass == $curpass && $curpass != $newpass)
	{
		$arr['password'] = $newpass;
		$upPass = $db->runUpdateRecord('account', $arr, $clause);
		$_SESSION['user']->setPassword($db->getScalar('select password from account where '. $clause));
	}

	$edited = 1;
	$multiple = '&pass='.$upPass;
}

header('location: /dashboard.php?edited='.$edited.$multiple)

?>