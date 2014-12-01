<?php
//Including all the class files 
include '/class/dbcon.php';
include '/class/user.php';
include '/class/cart.php';

$user = new User();
session_start();

if ($_SESSION) {
	$user = $_SESSION['user'];
}