<?php
/* Cart Items Class 
created: 2014-12-01
by : JK;
lastEdited: 2014-12-01
by: JK;
*/

class CartProd extends Cart{
	protected $productId;
	protected $quantity;
	protected $addDateTime;
	
	function __construct()
    {
        parent::__construct() ;
        $this->addDateTime = date("Y-m-d H:i:s");
	}
	
	function cartProdIni($prodId, $qty)
	{
		$this->productId = $prodId;
		$this->quantity = $qty;
	}
		
	function addToCartTable($prodId, $qty)
	{
		$this->cartProdIni($prodId, $qty);
		$simProd['user_id'] = $this->db->escapeString($this->userId);
		$simProd['prod_id'] = $this->db->escapeString($this->productId);
		$simProd['quantity'] = $this->db->escapeString($this->quantity);
		$simProd['added_datetime'] = $this->db->escapeString($this->addDateTime);
		$sucess = $this->db->runInsertRecord('cart_products', $simProd);
		return $sucess;
	}
	
}

class CartVar extends CartProd{	
	private $variationId;
	private $variationValue;

    function __construct()
    {
        parent::__construct();
    }

	function variationIni($varId, $varVal)
	{
		$this->variationId = $varId;
		$this->variationValue = $varVal;
	}
	
	function addVariationProd($prodId, $qty, $varId, $varVal)
	{
		$this->cartProdIni($prodId, $qty);
		$this->variationIni($varId, $varVal);
		$varProd['user_id'] =  $this->db->escapeString($this->userId);
		$varProd['product_id'] = $this->db->escapeString($this->productId);
		$varProd['variation_id'] = $this->db->escapeString($this->variationId);
		$varProd['variation_value'] = $this->db->escapeString($this->variationValue);
        $varProd['quantity'] = $this->db->escapeString($this->quantity);
		$varProd['added_datetime'] = $this->db->escapeString($this->addDateTime);
        $sucess = $this->db->runInsertRecord('cart_variation', $varProd);
		return $sucess;
	}
	
	function getPortableVariationItem()
	{
	}
		
}

?>
