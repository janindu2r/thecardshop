<?php
/*
	update user details script
	author : Aslam
	created : 2014-11-17
*/

	include('../class/dbcon.php');
	include('../class/user.php');

	$user = new User();

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

	$user->updateDetails($regDetailed, "reg_ID = $id");
?>