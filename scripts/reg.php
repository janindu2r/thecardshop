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

	if($idCheck == 0)
	{
		$regDetail['regID'] = $id;
		$regDetail['email'] = $_POST['email'];
		$regDetail['password'] = $_POST['pass'];
		$regDetail['verified'] = 0;

		$regDetailed['reg_ID'] = $id;
		$regDetailed['display_name'] = $_POST['dispname'];
		$regDetailed['fname'] = $_POST['Fname'];
		$regDetailed['lname'] = $_POST['Lname'];
		$regDetailed['gender'] = $_POST['gender'];
		$regDetailed['dob'] = $_POST['dob'];
		$regDetailed['country'] = $_POST['country'];
		$regDetailed['billing_add1'] = $_POST['billing_add1'];
		$regDetailed['billing_add2'] = $_POST['billing_add2'];
		$regDetailed['billing_add3'] = $_POST['billing_add3'];
		$regDetailed['billing_add4'] = $_POST['billing_add4'];
		$regDetailed['billing_add5'] = $_POST['billing_add5'];
		$regDetailed['pos_points'] = 0;
		$regDetailed['neg_points'] = 0;


		$user->registration('account', $regDetail);
		
		$user->registration('user', $regDetailed);
	}
	else
	{
		header('Location:  registration.php');
		echo "error";
	}

?>