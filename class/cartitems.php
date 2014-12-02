<?php
/* Cart Items Class 
created: 2014-12-01
by : JK;
lastEdited: 2014-12-01
by: JK;
*/

class CartProd{
	protected $userId;
	public $cProduct;
	protected $quantity;
	protected $addDateTime;	
	protected $db;	
	
	function __construct()
    {		
		$this->db = new DbCon();
		$this->userId = $_SESSION['user']->getRegID();
        $this->addDateTime = date("Y-m-d H:i:s");
		$this->cProduct = new Product();		
	}
	
	function cartProdIni($prodId, $qty)
	{
		$this->cProduct =  $this->cProduct->returnProduct($prodId);
		$this->quantity = $qty;
		
		if($this->cProduct->virtual)
			$xgsgjgjjj = 1; //initialize virtual object
		else
		{
			$shipping= new Physical();
			$shipping= $shipping->selectPhysicalProduct($this->cProduct->prodId);
			$this->cProduct = $shipping;
		}
		
	}
		
	function addToCartTable($prodId, $qty)
	{
		$this->cartProdIni($prodId, $qty);
		$simProd['user_id'] = $this->db->escapeString($this->userId);
		$simProd['prod_id'] = $this->db->escapeString($this->cProduct->prodId);
		$simProd['quantity'] = $this->db->escapeString($this->quantity);
		$simProd['added_datetime'] = $this->db->escapeString($this->addDateTime);
		$sucess = $this->db->runInsertRecord('cart_products', $simProd);
		if ($sucess)
			return $this;
		else
			return 0; 
	}
	
	function getDetails()
	{
	
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
		$varProd['product_id'] = $this->db->escapeString($this->cProduct->prodId);
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
