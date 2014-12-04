<?php
/* Cart Variable Class 
created: 2014-12-01
by : JK;
lastEdited: 2014-12-01
by: JK;
*/

class CartVar extends CartProd{

    private $cartVGroup = array();
  //   $varNames => array of var ID and var Name (1 : Color, 2: Size)
  //   $allVars => array of var ID and the particular values of the specific variation item (1 : Blue, 2 : Medium)

    function __construct()
    {
        parent::__construct();
        $this->cProduct = new Variation();
    }

    function  initializeVarGroup()
    {
        foreach($this->cProduct->varNames as $id => $name)
            $this->cartVGroup[$name] = $this->cProduct->allVars[$id];
    }

    function varProdIni($prodId, array $varItems)
    {
        $this->cProduct = new Physical();
        $this->cProduct = $this->cProduct->selectPhysicalProduct($prodId);
        if($this->cProduct->variation)
        {
            $var = new Variation();
            $var = $var->initializeVariation($prodId, $varItems);
            $this->cProduct = $var;
        }
        return $this;
    }

    function addToVarCartTable($prodId,$qty,array $varItems){

        $this->varProdIni($prodId, $varItems);
        $this->quantity = $qty;
        $this->initializeVarGroup();
        $varGroup['user_id'] = $this->db->escapeString($this->userId);
        $varGroup['product_id'] = $this->db->escapeString($this->cProduct->prodId);
        $varGroup['quantity'] = $this->db->escapeString($this->quantity);
        $varGroup['added_datetime'] = $this->db->escapeString($this->addDateTime);
        $groupId = $this->db->runInsertAndGetID('cart_variation_group', $varGroup);
        $success = 0;

        if($groupId)
        {
            $varProd['var_group'] = $this->db->escapeString($groupId) ;
            foreach($this->cProduct->allVars as $k => $vl ){
                $varProd['variation_id'] = $this->db->escapeString($k);
               	$varProd['variation_value'] = $this->db->escapeString($vl);
                $success += $this->db->runInsertRecord('cart_variations', $varProd);
            }
        }

        if($success == count($varItems))
            return 1;
        else
            return 0;
    }


    function makeVariationCartItem($prodId,$qty,array $varItems, $addedDnT)
    {
        $this->cartProdIni($prodId, $qty);
        $this->cProduct->initializeVariation($prodId, $varItems);
        $this->addDateTime = $addedDnT;
        $this->initializeVarGroup();
        return $this;
    }

    function getPortableVariationItem()
    {

    }

}

?>
