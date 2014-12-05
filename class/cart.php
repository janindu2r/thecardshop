<?php
/* Cart Class 
created: 2014-12-01
by : JK;
lastEdited: 2014-12-01
by: JK;
*/

class Cart
{
	protected $userId;
	protected $db;
    public $simpleProds = array();
    public $varProds = array();
    public $cartOrder = array();
    public $cartTotal = 0;
	
	function __construct() {
        $this->db = new DbCon();
		$this->userId = $_SESSION['user']->getRegID();
        $this->getSimpleProducts();
        $this->getVariationProducts();
        $this->calculateCartTotal();
	} 
	
	
	function getSimpleProducts()
	{
        $products = $this->db->getSelectTable('select * from cart_products where user_id = ' . $this->userId);
        if($products ){
            foreach($products as $row) {
                $newCartProd =  new CartProd();
                $newCartProd = $newCartProd->makeSimpleCartItem($row['prod_id'], $row['quantity'], $row['added_datetime']);
                $this->simpleProds[$row['prod_id']] = $newCartProd;
                $this->cartOrder['0'.$row['prod_id']] = $row['added_datetime'];
            }
        }
	}

	function getVariationProducts()
	{
        $varProducts = $this->db->getSelectTable('select * from cart_variation_group where user_id = ' . $this->userId);
        if($varProducts){
            foreach($varProducts as $row) {
                $newCartProd =  new CartVar();
                $groupId = $row['var_group'];
                $pdId = $row['product_id'];
                $dnt = $row['added_datetime'];
                $qt = $row['quantity'];
                $varStr = array();
                $varIts = $this->db->getSelectTable('select variation_id, variation_value from cart_variations where var_group = '. $groupId);
                foreach($varIts as $row)
                {
                    $varStr[$row['variation_id']] = $row['variation_value'];
                }
                $newCartProd = $newCartProd->makeVariationCartItem($groupId,$pdId,$qt,$dnt, $varStr);
                $this->varProds[$groupId] =$newCartProd;
                $this->cartOrder['1'.$groupId] = $dnt;
            }
        }
	}
	
	function getCompleteCartPrint()
	{
        $fullHtmlString = '';
        if($this->cartOrder){
            arsort($this->cartOrder);
            foreach($this->cartOrder as $id => $val) {
                $rId = substr($id,1);
                if(substr($id,0,1) == '1')
                    $fullHtmlString .= $this->varProds[$rId]->getPortableVariationItem();
                else
                    $fullHtmlString .= $this->simpleProds[$rId]->getSimplePortableCartHtml();
            }
        /*    $fullHtmlString = '';  //combine the html strings together;
            foreach ($this->simpleProds as $itm) {
                $fullHtmlString .= $itm->getSimplePortableCartHtml();
            } */
            return $fullHtmlString;
        }
        else
            return "<lable id='empty-lbl'>Cart Is Empty</lable>";
	}

    function calculateCartTotal()
    {
        foreach($this->simpleProds as $itm)
            $this->cartTotal += floatval($itm->calculateFullItemPrice());
        foreach($this->varProds as $vItm)
            $this->cartTotal += floatval($vItm->calculateFullItemPrice());

        $this->cartTotal = round($this->cartTotal,2);
    }

}

?>
