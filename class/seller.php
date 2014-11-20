<?php
/*
	Seller class
	Author : Aslam
	Created : 2014-11-18
*/

	class Seller extends User
	{
		var $sellerID;
		var $shopName;
		private $shopDecription;
		protected $creditAccountNo;
		private $logoImg;
		var $reputationPoints;

		function __construct()
		{
			$slid = uniqid(SL, false);
			$slid = md5($slid);

			this->$sellerID = $slid;
			this->$reputationPoints = 0;
		}

		function getSellerId()
		{
			return $this->sellerID;
		}

		function setShopName($spname)
		{
			$this->shopName = $spname;
		}

		function getShopName()
		{
			return $this->shopName;
		}

		function setShopDescription($desc)
		{
			$this->shopDecription = $desc;
		}

		function getShopDescription()
		{
			return $this->shopDecription;
		}

		function setCreditAccountNo($accno)
		{
			$this->creditAccountNo = $accno;
		}

		function getCreditAccountNo()
		{
			return $this->creditAccountNo;
		}

		function setLogoImg()
		{

		}

		function getLogoImg()
		{

		}

		function setReputationPoints($points)
		{
			this->$reputationPoints += $points;
		}

		function getReputationPoints()
		{
			return this->$reputationPoints;
		}
		
		function manageShop($details, $category)
		{
			//$details stores the form data received via POST and is passed here

			$db = new DbCon();

			$result = $db->runInsertRecord('shops', $details);

			if($result)
				header('Location:  profile.php');
			else
				header('Location:  manageShops.php');

			$newDetails['shopID'] = $details['shopID'];
			$newDetails['categoryID'] = $category;
			
			$newResult = $db->runInsertRecord('shop_categories', $newDetails);
		}
	}

?>