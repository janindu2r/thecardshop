<?php
include ('../class/dbcon.php');
$path = $_SERVER['DOCUMENT_ROOT'];
include ($path.'/internal.php');
$user = $_SESSION['user'];

$db = new DbCon();

if (!empty($_POST['submit1']))
{
	$fname = $db->escapeString($_POST["fname"]);
	$lname = $db->escapeString($_POST["lname"]);
	$dob = $db->escapeString($_POST["dob"]);
	$add1 = $db->escapeString($_POST["add1"]);
	$add2 = $db->escapeString($_POST["add2"]);
	$add3 = $db->escapeString($_POST["add3"]);
	$postal = $db->escapeString($_POST["postal"]);
	$arr;
	if($user->fName != $fname)
	{
	$arr['fname'] = $fname;
	}
	if($user->lName != $lname)
	{
	    $arr['lname'] = $lname;
	}
	if($user->postalCode != $postal)
	{
	    $arr['postal_code'] = $postal;
	}
	if($user->addressL1 != $add1)
	{
	    $arr['deflt_billin_addl1'] = $add1;
	}
	if($user->addressL2 != $add2)
	{
	    $arr['deflt_billin_addl2'] = $add2;
	}
	if($user->addressL3 != $add3)
	{
	    $arr['deflt_billin_addl3'] = $add3;
	}

	$reg = $user->getRegID();
	$clause = "reg_id = $reg";

	$res = $db->runUpdateRecord('user',$arr, $clause);

	if($res > 0)
	{
		echo '<script type="text/javascript">';
	    echo 'alert("records updated successfully")';
	    echo '</script>';
	}

	header('location: /dashboard.php');
}

if (!empty($_POST['submit2']))
{
	$uname = $db->escapeString($_POST["dispName"]);
	$email = $db->escapeString($_POST["email"]);

	if($user->getDispName() != $uname)
	{
		$ar['display_name'] = $uname;
	}

	if($user->email != $email)
	{
		$ar['email'] = $email;
	}

	$res1 = $db->runUpdateRecord('account', $ar, $clause);

	if($res1 > 0)
	{
		echo '<script type="text/javascript">';
	    echo 'alert("records updated successfully")';
	    echo '</script>';
	}

	header('location: /dashboard.php');
}
if (!empty($_POST['submit3']))
{

	$curpass = $db->escapeString(md5($_POST["password"]));
	$newpass = $db->escapeString(md5($_POST["newpassword"]));

	if($user->getPassword() == $curpass && $curpass != $newpass)
	{
		$arra['password'] = $newpass;
	}

	$res2 = $db->runUpdateRecord('account', $arra, $clause);

	if($res2 > 0)
	{
		echo '<script type="text/javascript">';
	    echo 'alert("records updated successfully")';
	    echo '</script>';
	}

	header('location: /dashboard.php');
}
?>