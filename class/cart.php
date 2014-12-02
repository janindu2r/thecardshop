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
    public $cartTotal = 0;
	
	function __construct() {
        $this->db = new DbCon();
		$this->userId = $_SESSION['user']->getRegID();
        $this-> getSimpleProducts();
        $this->calculateCartTotal();
	} 
	
	
	function getSimpleProducts()
	{
		$sqlSimp = 'select * from cart_products where user_id = ' . $this->userId . ' order by added_datetime';
        $products = $this->db->getSelectTable($sqlSimp);

        if($products ){
            foreach($products as $row) {
                $newCartProd =  new CartProd();
                $newCartProd = $newCartProd->makeSimpleCartItem($row['prod_id'], $row['quantity'], $row['added_datetime']);
                $this->simpleProds[$row['prod_id']] = $newCartProd;
            }
        }
	}

	
	function getVariationProducts()
	{
		$sqlVar = 'select * from cart_variation where user_id = ' . $this->userId;
        $varProducts = $this->db->getSelectTable($sqlVar);

        if($varProducts){
            foreach($varProducts as $row) {
                $newCartProd =  new CartVar();
                $newCartProd = $newCartProd->makeVariationCartItem
                ($row['product_id'],$row['variation_id'], $row['variation_value'], $row['quantity'], $row['added_datetime']);
                $this->varProds[$row['prod_id']] = $newCartProd;
            }
        }
	}
	
	function getCompleteCartPrint()
	{
        if($this->simpleProds) {
            //sort variations and simple products together
            $fullHtmlString = '';  //combine the html strings together;
            foreach ($this->simpleProds as $itm) {
                $fullHtmlString .= $itm->getSimplePortableCartHtml();
            }
            return $fullHtmlString;
        }
        else
            return "Cart Is Empty";
	}


    function calculateCartTotal()
    {
        foreach($this->simpleProds as $itm)
        {
            $this->cartTotal += floatval($itm->calculateFullItemPrice());
        }
        $this->cartTotal = round($this->cartTotal,2);
    }

}

?>
