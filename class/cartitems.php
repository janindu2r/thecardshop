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
	public  $quantity;
	protected $addDateTime;	
	protected $db;
    public $nItem;
	
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

        if(!$this->cProduct->virtual)
        {
            $shipping= new Physical();
            $shipping= $shipping->selectPhysicalProduct($this->cProduct->prodId);
            $this->cProduct = $shipping;
        }
		
	}
		
	function addToCartTable($prodId, $qty)
	{
        //check if it's already in the database
        $gQty = $this->db->getScalar("select quantity from cart_products where user_id = ".$this->userId."  and prod_id = ".$prodId);
        if($gQty) {
            $tQty = intval($gQty) + intval($qty);
            $var = $this->db->runUpdateOneValue('cart_products', 'quantity = ' . $tQty, 'user_id = ' . $this->userId . '  and prod_id = ' . $prodId);
            if ($var) {
                $this->cartProdIni($prodId, $tQty);
                $this->nItem = false;
                return $this;
            } else
                return 0;
        }
        else{ //if not add the product
            $this->cartProdIni($prodId, $qty);
            $simProd['user_id'] = $this->db->escapeString($this->userId);
            $simProd['prod_id'] = $this->db->escapeString($this->cProduct->prodId);
            $simProd['quantity'] = $this->db->escapeString($this->quantity);
            $simProd['added_datetime'] = $this->db->escapeString($this->addDateTime);
            $var = $this->db->runInsertRecord('cart_products', $simProd);
            if($var) {
                $this->nItem = true;
                return $this;
            }
            else
                return 0;
            }
	}
	
	function makeSimpleCartItem($prodId, $qty, $addedDnT)
	{
        $this->cartProdIni($prodId, $qty);
        $this->addDateTime = $addedDnT;
        return $this;
    }


    function getSimplePortableCartHtml()
    {
        $shipping = $this->calculateShippingCost();
        $itemHtml = '<div class="row"> <div class="col-xs-2"> <img class="img-responsive" src="/content/products/prodthumbnail/' ;
        $itemHtml .=  $this->cProduct->prodId.'.jpg"> </div><div class="col-xs-4"> <h4 class="product-name"><strong>' ;
        $itemHtml .= $this->cProduct->proName.'</strong></h4><h4><small> Shipping $'. number_format($shipping, 2, '.', '') ;
        $itemHtml .= '</small></h4> </div> <div class="col-xs-6"> <div class="col-xs-6 text-right"> <h6><strong>';
        $itemHtml .= $this->cProduct->proPrice . '<span class="text-muted">x</span></strong></h6> </div> <div class="col-xs-4">' ;
        $itemHtml .= '<input type="number" class="form-control input-sm output-qty-cart" value="'. $this->quantity. '"> </div> ' ;
        $itemHtml .= '<div class="col-xs-2"> <button type="button" class="btn btn-link btn-xs"> <span class="glyphicon glyphicon-trash"> </span> ' ;
        $itemHtml .= '</button> </div> </div> </div> <hr>' ;
        return $itemHtml;
    }

    function calculateShippingCost()
    {
        $shipping = 0;
        if(!$this->cProduct->virtual)
        {
            $shipping= floatval($this->cProduct->shipCst);
            if($this->cProduct->multiByq)
                $shipping = $shipping * floatval($this->quantity) ;
        }
        return round($shipping,2);
    }

    function calculateFullItemPrice()
    {
        $fullPrc =  (floatval($this->cProduct->proPrice) * floatval($this->quantity)) +   $this->calculateShippingCost();
        return  round($fullPrc,2);
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
        $success = $this->db->runInsertRecord('cart_variation', $varProd);
		return $success;
	}


    function makeVariationCartItem($prodId,$varId, $varVal,$qty, $addedDnT)
    {
            $this->cartProdIni($prodId, $qty);
            $this->variationIni($varId, $varVal);
            $this->addDateTime = $addedDnT;
            return $this;
    }

    function getPortableVariationItem()
    {

    }
		
}

?>
