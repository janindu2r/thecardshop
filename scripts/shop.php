<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form name="addproduct" method="post" action="addShop.php">
Shop ID <input type="text" name="sId" /><br />
Shop Name <input type="text" name="sName" /><br />
Account nummber<input type="text" name="sCredit" /><br />
Background Color<input type="text" name="sColor" /><br />
Positive points<input type="text" name="sPPoints" /><br />
Negative points<input type="text" name="sNPoints" /><br />
Shop base location<input type="text" name="sLoc" /><br />
Money Guarant <input type="checkbox" name="guarant" value="yes" /> Yes
<input type="checkbox" name="guarant" value="no" />No <br />
Activated Date <input type="date" name="sDate" /><br />

<input type="submit" value="Add Shop" />

 

</form>
</body>
</html>
-->

<?php
/*
	Create shop script
*/

	include('../class/dbcon.php');
	include('../class/seller.php');
	include('../class/user.php');

	$sell = new User();
	$db = new DbCon();

	$uname = $sell->getDispName();
	$sql = "SELECT reg_id FROM account WHERE display_name = '" . $uname . "';";
	$sid = $db->getScalar($sql);

	$shopDetails['shop_id'] = $sid;
	$shopDetails['shop_name'] = $db->escapeString($_POST["sname"]);
	$shopDetails['shop_desc'] = $db->escapeString($_POST["descr"]);
	$shopDetails['credit_to'] = $db->escapeString($_POST["payment"]);
	$shopDetails['bg_colors'] = $db->escapeString($_POST["colorscheme"]);
	$shopDetails['pos_rep_pnts'] = 0;
	$shopDetails['neg_rep_pnts'] = 0;
	$shopDetails['shop_base_loc'] = $db->escapeString($_POST["city"]);

	if(isset($_POST["money"]))
		$shopDetails['mony_back_gurantee'] = 1;
	else
		$shopDetails['mony_back_gurantee'] = 0;	
	
	$shopDetails['activated_date'] = date("Y-m-d");


	$shopDetailed['shop_id'] = $sid;
	$shopDetailed['catogory_id'] = $_POST["category"];


	$db->runInsertRecord('shops', $shopDetails);
	$db->runInsertRecord('shop_categories', $shopDetailed);	

	header('Location: ../dashboard.php');

?>