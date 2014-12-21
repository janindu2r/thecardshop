<?php
/*
	Buyer class
	Author : Aslam
	Created : 2014-11-18
*/

class Buyer
{
	public $regID;
	public $db;
	public $ordList;
	function __construct($id){
		$this->regID = $id;
		$this->db = new DbCon();
		$this->getAllOrders();
	}

	private function getAllOrders()
	{
		$sql = "select order_id, order_dnt, tot_items_in_cart, processed_items, order_status from orders WHERE buyer_id = ". $this->regID . " order by order_dnt desc";
		$this->ordList = $this->db->getSelectTable($sql);
	}


}
?>