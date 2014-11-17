<?php
/*
	Registration script
	author: Aslam
	Date: 2014/11/14
*/

	include('../class/dbcon.php');
	include('../class/user.php');

	$user = new User();

	$id = uniqid(cid, false);
	$id = md5($id);

	$db = new DbCon();
	$string = "select * from user where reg_ID = $id";
	$idCheck = $db->getScalar($string);

	if($idCheck != 0)
	{
		$regDetail['regID'] = $id;
		$regDetail['email'] = $_POST['email'];
		$regDetail['password'] = $_POST['pass'];
		$regDetail['verified'] = 0;

		$regDetailed['reg_ID'] = $id;
		$reg_ID['display_name'] = $_POST['dispname'];
		$reg_ID['fname'] = $_POST['Fname'];
		$reg_ID['lname'] = $_POST['Lname'];
		$reg_ID['gender'] = $_POST['gender'];
		$reg_ID['dob'] = $_POST['dob'];
		$reg_ID['country'] = $_POST['country'];
		$reg_ID['billing_add1'] = $_POST['billing_add1'];
		$reg_ID['billing_add2'] = $_POST['billing_add2'];
		$reg_ID['billing_add3'] = $_POST['billing_add3'];
		$reg_ID['billing_add4'] = $_POST['billing_add4'];
		$reg_ID['billing_add5'] = $_POST['billing_add5'];
		$reg_ID['pos_points'] = 0;
		$reg_ID['neg_points'] = 0;


		$user->registration('account', $regDetail);
		
		$user->registration('user', $regDetailed);
	}
	else
	{
		header('Location:  registration.php');
		echo "error";
	}

	$db->__destruct();

?>