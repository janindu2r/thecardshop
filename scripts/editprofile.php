<?php
include ('../class/dbcon.php');
$path = $_SERVER['DOCUMENT_ROOT'];
include ($path.'/internal.php');
$user = $_SESSION['user'];

$db = new DbCon();

$reg = $user->getRegID();
$clause = "reg_id = '".$reg. "'";

/*$fname = $db->escapeString($_POST["fname"]);
$lname = $db->escapeString($_POST["lname"]);
$dob = $db->escapeString($_POST["dob"]);
$add1 = $db->escapeString($_POST["add1"]);
$add2 = $db->escapeString($_POST["add2"]);
$add3 = $db->escapeString($_POST["add3"]);
$postal = $db->escapeString($_POST["postal"]);*/

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$dob = $_POST["dob"];
$add1 = $_POST["add1"];
$add2 = $_POST["add2"];
$add3 = $_POST["add3"];
$postal = $_POST["postal"];

if (!empty($_POST['submit1']))
{

	$arr;
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
	if($user->getDob != $dob)
	{
		$_SESSION['user']->setDob($dob);
		$dob = $db->escapeString($_POST["dob"]);
	    $arr['dob'] = $dob;
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
	$uname = $_POST["dispName"];
	$email = $_POST["email"];

	if($user->getDispName() != $uname)
	{
		$_SESSION['user']->dispName = $uname;
		$uname = $db->escapeString($_POST["dispName"]);
		$ar['display_name'] = $uname;
	}

	if($user->email != $email)
	{
		$_SESSION['user']->email = $email;
		$email = $db->escapeString($_POST["email"]);
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
	$passsql = "Select password FROM account WHERE reg_id = '" . $reg. "'";
	$curpass = $db->escapeString(md5($_POST["password"]));
	$newpass = $db->escapeString(md5($_POST["newpassword"]));
	$dbpass = $db->getScalar($passsql);

	if($dbpass == $curpass && $curpass != $newpass)
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