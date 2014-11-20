<?php
/*
	display user info for update
	author : Aslam
	created : 2014-11-17
*/

	include('../class/dbcon.php');
	include('../class/user.php');

	$user = new User();
	$dbcon = new DbCon();
	$regid = $_POST['regid'];

	$query = "select * from user where reg_id = $regid";
	$details = $dbcon->getScalar($query);

	return $details;

?>