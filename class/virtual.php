<?php

class Virtual extends Product
{

public $pId,$link,$email;

function __construct()
    {
        parent::__construct();
    }
	
	public function getEmail($proId)
	{
		$res = $this->db->getFirstRow("select product.shop_id from product inner join virtual on product.product_id = virtual.prod_id ");
		
		$vShopId = $res['shop_id'];
		$nextRes = $this->db->getFirstRow("select account.email from account inner join shops on account.reg_id = shops.shop_id");
		
		$this->email = $nextRes['email'];
		return $this;
	}
		
	
	
	
	
}



?>