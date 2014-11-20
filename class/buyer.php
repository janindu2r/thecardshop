<?php
/*
	Buyer class
	Author : Aslam
	Created : 2014-11-18
*/

	class Buyer extends User
	{
		var $buyerID;
		var $buyerName;
		var $reputationPoints;

		function __construct()
		{
			$bid = uniqid(BY, false);
			$bid = md5($bid);

			$this->buyerID = $bid;
			$this->reputationPoints = 0;
		}

		function getBuyerID()
		{
			return $this->buyerID;
		}

		function setBuyerName($name)
		{
			$this->buyerName = $name;
		}

		function getBuyerName()
		{
			return $this->buyerName;
		}

		function setReputationPoints($points)
		{
			$this-$reputationPoints += $points;
		}

		function getReputationPoints()
		{
			return $this->reputationPoints;
		}

		private function purchase()
		{

		}

		private function commenting()
		{

		}

		private function counsel()
		{

		}

		private function seekCounsel()
		{

		}
	}
?>