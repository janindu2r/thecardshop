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

	$user->updateDetails($regDetailed, "reg_ID = $id");
?>