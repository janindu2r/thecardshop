<?php
/*
	Registration script
	author: Aslam
	Date: 2014/11/14
*/

	include('../class/dbcon.php');
	include('../class/user.php');

	$user = new User();

	$id = uniqid(cid, false);
	$id = md5($id);

	$db = new DbCon();
	$string = "select * from user where reg_ID = $id";
	$idCheck = $db->getScalar($string);

	if($idCheck == 0)
	{
		$regDetail['regID'] = $id;
		$regDetail['email'] = $_POST["email"];
		$emailCheck = $_POST["reenteremail"];

		$regDetail['dispname'] = $_POST["firstname"] . " " . $_POST["lastname"];
		$regDetail['password'] = $_POST["pass"];
		$passwordCheck = $_POST["repassword"];

		$regDetail['verified'] = 0;

		$regDetailed['reg_ID'] = $id;
		$regDetailed['fname'] = $_POST["firstname"];
		$regDetailed['lname'] = $_POST["lastname"];
		$regDetailed['gender'] = $_POST["gender"];
		$regDetailed['currency'] = 'SLR';
		$date = $_POST["year"] . "-" . $_POST["month"] . "-" . $_POST["day"];
		$regDetailed['dob'] = $date;
		$regDetailed['billing_add1'] = $_POST["billing_add1"];
		$regDetailed['billing_add2'] = $_POST["billing_add2"];
		$regDetailed['billing_add3'] = $_POST["billing_add3"];
		$regDetailed['postal'] = $_POST["postal"];
		$regDetailed['pos_points'] = 0;
		$regDetailed['neg_points'] = 0;


		$user->registration('account', $regDetail);
		
		$user->registration('user', $regDetailed);

		header('Location: ../index.php');
			/*
		if($passwordCheck==$regDetail['password'] && $emailCheck==$regDetail['email'])
		{
			$user->registration('account', $regDetail);
		
			$user->registration('user', $regDetailed);

			header('Location: ../index.php');
		}
		else
		{
			header('Location: ../register.php');
			echo "data mismatch";
		}
		*/
	}
	else
	{
		header('Location:  ../registration.php');
		echo "error";
	}

?>