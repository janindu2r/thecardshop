<?php
/*
	login page script
	author: Aslam
	created: 2014-11-17
*/
	include('/internal.php');

	$user = new User();

	$dpname = $_POST['uname'];
	$pass = $_POST['password'];

	$dpname = htmlspecialchars($dpname);
	$pass = htmlspecialchars($pass);

	$user->login($dpname, $pass);
?>