<?php
//Including all the class files 
include '/class/dbcon.php';
include '/class/user.php';
include '/class/product.php';
include '/class/physical.php';
include '/class/variation.php';
include '/class/cartitems.php';
include '/class/cart.php';

$logged = 0; //boolean variable to check if logged in or not
$user = new User();
session_start();

if($_GET)
{
	if(array_key_exists('logout', $_GET))
	{
        if($_GET['logout']) {
            session_destroy();
            header('location: /index.php');
        }
	}
}

if($_POST)
{								  
	$dpname = $_POST['eid'];
	$pass = $_POST['passwd'];
	$dpname = htmlspecialchars($dpname);
	$pass = htmlspecialchars($pass);
	$logged = $user->login($dpname, $pass);
	if($logged) {
        $_SESSION['user'] = $user;
       // $_SESSION['cart'] = new Cart();
    }
	else
		header('location: /login.php');	//redirect to login page with error name
}
 
if ($_SESSION) {
	$logged = 1; 
	$user = $_SESSION['user'];
    $cart =  new Cart(); // = $_SESSION['cart'];
}
?>