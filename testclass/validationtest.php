<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/15/2014
 * Time: 12:58 AM
 */

$root = $_SERVER['DOCUMENT_ROOT'];
include ($root.'/internal.php');
include ("../class/Validate.php");

Validate :: validString(" bimla ");

Validate :: validInt(1234567);

Validate :: emailValidte("' bimlamadhavee@gmail.com '");


//echo $success;



?>