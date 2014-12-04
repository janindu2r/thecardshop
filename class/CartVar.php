<?php
/* Cart Variable Class 
created: 2014-12-01
by : JK;
lastEdited: 2014-12-01
by: JK;
*/

class CartVar extends CartProd{

    private $cartVGroup;

    function __construct()
    {
        parent::__construct();
        $this->cProduct = new Variation();
    }

	function variationIni(array $allVars)
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
	//	$varProd['variation_id'] = $this->db->escapeString($this->variationId);
	//	$varProd['variation_value'] = $this->db->escapeString($this->variationValue);
        $varProd['quantity'] = $this->db->escapeString($this->quantity);
		$varProd['added_datetime'] = $this->db->escapeString($this->addDateTime);
        $success = $this->db->runInsertRecord('cart_variation', $varProd);
		return $success;
	}


    function makeVariationCartItem($prodId, array $varArr,$qty, $addedDnT)
    {
            $this->cartProdIni($prodId, $qty);
          //  $this->variationIni($varId, $varVal);
            $this->addDateTime = $addedDnT;
            return $this;
    }

    function getPortableVariationItem()
    {

    }
		
}

?>
