<?php
//Including all the class files 
foreach (glob("/class/*.php") as $filename)
{
	if($filename != 'aaa.php')
		include $filename;
}
//later call autoload function here

session_start();
$u_name = 'Sample User'; //must be changed
$logged = 0; //boolean variable to be used later to determine what content would be printed (Basically checks if session exists)
if ($_SESSION) {
	$logged = 1; 
	/*initiate buyer object and store it in session instead of following variables. Also store in session whether user has a shop seperately because that'd be used later */
	$u_id = $_SESSION['u_id'];
	$u_name = $_SESSION['u_name'];
	$u_password = $_SESSION['u_pass'];
}
?>