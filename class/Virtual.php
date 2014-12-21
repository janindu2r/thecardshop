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
		$mail = $this->email;
		$mLink = wordwrap($this->link,70);

	if(@mail($mail,"link",$mLink))
	{
		echo " mail was sent successfully";
	}
	else
	
	echo "mail not sent";
	}
	
	public function getEmails($link)
    {
        $email = '<div style="width: 80%; margin: 0 auto; padding: 20px;"><h2>Hello ';
        $email .= 'An online ecommerce platform designed to provide the customer and seller the best online service possible</p><div style="padding: 2em;">';
        $email .= '<a title="Activate" style="text-decoration: none; color:#FFFFFF; padding: 1em 1.5em 1em 1.5em; border-radius: 0.5em; font-size: 1.2em; background-color: #557da1;"';
        $email .= 'href="http://comerciotest.com/activation.php?confirm='. md5((string)$link) ;
        $email .= '"> The link </a></div></div>';
        return $email;
    }
	
	
}



?>