<?php
/*
	Registration script
	author: Aslam
	Date: 2014/11/14
*/

	include('../class/dbcon.php');
	include('../class/user.php');

	$user = new User();
/*
	$id = uniqid(cid, false);
	$id = md5($id);


	$string = "select * from user where reg_ID = $id";
	$idCheck = $db->getScalar($string);
*/
	$db = new DbCon();

//	if($idCheck == 0)
//	{
		//$regDetail['reg_id'] = 1;
		$regDetail['email'] = $db->escapeString($_POST["email"]);
		$emailCheck = $db->escapeString($_POST["reenteremail"]);
		$regDetail['display_name'] = $db->escapeString($_POST["uname"]);
		//$regDetail['display_name'] = "'". $_POST["firstname"] . " " . $_POST["lastname"] . "'";
		$regDetail['password'] = $db->escapeString(md5($_POST["password"]));
		$passwordCheck = $db->escapeString(md5($_POST["repassword"]);
		$regDetail['verified'] = 0;

		//$regDetailed['reg_ID'] = 1;
		$regDetailed['fname'] = $db->escapeString($_POST["firstname"]);
		$regDetailed['lname'] = $db->escapeString($_POST["lastname"]);
		$regDetailed['gender'] = $db->escapeString($_POST["gender"]);
		
		$date = "'". $_POST["year"] . "-" . $_POST["month"] . "-" . $_POST["day"] . "'";
		$regDetailed['date_of_birth'] = $date;
		$regDetailed['deflt_billin_addl1'] = $db->escapeString($_POST["add1"]);
		$regDetailed['deflt_billin_addl2'] = $db->escapeString($_POST["add2"]);
		$regDetailed['deflt_billin_addl3'] = $db->escapeString($_POST["add3"]);
		$regDetailed['postal_code'] = $_POST["postal"];
		$regDetailed['pos_rep_pnts'] = 0;
		$regDetailed['neg_rep_pnts'] = 0;
		
		if($passwordCheck==$regDetail['password'] && $emailCheck==$regDetail['email'])
		{
			$user->registration('account', $regDetail);
		
			$user->registration('user', $regDetailed);

			header('Location: ../index.php');
		}
		else
		{
			header('Location: ../register.php');
		}
		
//	}
//	else
//	{
//		header('Location:  ../registration.php');
//		echo "error";
//	}

?>