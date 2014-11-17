<?php
/*
	login page script
	author: Aslam
	created: 2014-11-17
*/

	include('../class/dbcon.php');
	include('../class/user.php');

	$user = new User();

	$dpname = $_POST['uname'];
	$pass = $_POST['password'];

	$user->login($dpname, $pass);
?>