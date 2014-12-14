<?php
include ('../class/dbcon.php');
$path = $_SERVER['DOCUMENT_ROOT'];
include ($path.'/internal.php');
$user = $_SESSION['user'];

$fname = escapeString($_POST["fname"]);
$lname = escapeString($_POST["lname"]);
$dob = escapeString($_POST["dob"]);
$add1 = escapeString($_POST["add1"]);
$add1 = escapeString($_POST["add2"]);
$add3 = escapeString($_POST["add3"]);
$postal = escapeString($_POST["postal"]);
$arr;
if($user->fName != $fname)
{
$arr['fname'] = $fname;
}
if($user->lName != $lname)
{
    $arr['lname'] = $lname;
}
if($user->postalCode != $postal)
{
    $arr['postal_code'] = $postal;
}
if($user->addressL1 != $add1)
{
    $arr['deflt_billin_addl1'] = $add1;
}
if($user->addressL2 != $add2)
{
    $arr['deflt_billin_addl2'] = $add2;
}
if($user->addressL3 != $add3)
{
    $arr['deflt_billin_addl3'] = $add3;
}

$res = $db->runUpdateOneValue('user',$arr,'reg_id ="$user->regID');

if($res == 1)
{
    alert("records are updated successfully");
}



?>