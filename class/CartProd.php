<?php
/* Cart Products Class 
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
            if($var)
                return $this;
            else
                return 0;
            }
	}

    function updateFromCartTable($prodId, $qty)
    {
            $var = $this->db->runUpdateOneValue('cart_products', 'quantity = ' . $qty, 'user_id = ' . $this->userId . '  and prod_id = ' . $prodId);
            if ($var)
                return 1;
            else
                return 0;
    }

    function deleteItem($prodId)
    {
        $var = $this->db->deleteRecords('cart_products', 'user_id = ' . $this->userId . '  and prod_id = ' . $prodId);
        if($var)
            return 1;
        else
            return 0;
    }
	
	function makeSimpleCartItem($prodId, $qty, $addedDnT)
	{
        $this->cartProdIni($prodId, $qty);
        $this->addDateTime = $addedDnT;
        return $this;
    }


    function getPortableSimpleCartItem()
    {
        $shipping = $this->calculateShippingCost();
        $shipPrice = number_format($shipping, 2, '.', '');
        $desc = '<div style="font-size: 0.9em;"><table class="table"><tbody>';
        $desc .= '<tr><td><b>Shipping</b></td><td> $'.  $shipPrice . '</div></td></tr></tbody></table>';


        $itemHtml = '<div class="row"> <div class="col-xs-2"> <img class="img-responsive" src="/content/products/prodthumbnail/' ;
        $itemHtml .=  $this->cProduct->prodId.'.jpg"> </div><div class="col-xs-4"> <h4 class="product-name"><strong>' ;
        $itemHtml .= '<a href="/viewproduct.php?product=' . $this->cProduct->prodId . '">';
        $itemHtml .= $this->cProduct->proName.'</a></strong></h4><h4><small> ' .  $desc ;
        $itemHtml .= '</small></h4> </div> <div class="col-xs-5"> <div class="col-xs-5 text-right"> <h6><strong>';
        $itemHtml .= $this->cProduct->proPrice . '<span class="text-muted">x</span></strong></h6> </div> <div class="col-xs-5">' ;
        $itemHtml .= '<input type="number" class="form-control input-sm output-qty-cart" id="0-'. $this->cProduct->prodId.'" value="';
        $itemHtml .= $this->quantity. '" min="1" max="999"> </div> ' ;
        $itemHtml .= '<div class="col-xs-1"> <button type="button" class="btn btn-link btn-xs delete-cart-itm" id="0-'. $this->cProduct->prodId ;
        $itemHtml .= '"><span class="glyphicon glyphicon-trash"> </span> </button> </div> </div> </div> <hr>' ;
        return $itemHtml;
    }

    function getStaticSimpleCartItem()
    {
        $shipping = $this->calculateShippingCost();
        $itemTotal = $this->toDec($this->calculateEachItemPrice());
        $shipPrice = $this->toDec($shipping);
        $grandTotal = $this->toDec($this->calculateEachWithShipping());


        $itemHtml = '<tr><td class="col-sm-6 col-md-4"><div class="media"><a class="thumbnail pull-left" id="cart-picture" style="width: 72px; height: 72px;" href="/viewproduct.php?product=';
        $itemHtml .=  $this->cProduct->prodId . '"><img class="media-object" src="/content/products/prodthumbnail/'. $this->cProduct->prodId .'.jpg"></a>';
        $itemHtml .= '<div class="media-body"><h4 class="media-heading"><a href="/viewproduct.php?product=';
        $itemHtml .=  $this->cProduct->prodId . '">'.$this->cProduct->proName;
        $itemHtml .= '</a></h4><h5 class="media-heading"> by <a href="#">'. $this->cProduct->getShopName() .'</a></h5>' ;
        $itemHtml .= '<span class="text-success"><strong>'. $this->cProduct->cuStock .' out of ';
        $itemHtml .= $this->cProduct->inStock . ' available</strong></span></div></div></td><td class="col-sm-1" style="text-align: center">' ;
        $itemHtml .= '<input type="number" class="form-control input-sm output-qty-cart" id="0-'. $this->cProduct->prodId.'" value="';
        $itemHtml .= $this->quantity. '" min="1" max="999"></td><td class="col-sm-1 col-md-1 text-right">$';
        $itemHtml .= $this->cProduct->proPrice . '</td><td class="col-sm-1 col-md-1 text-right">$';
        $itemHtml .= $itemTotal .'</td><td class="col-sm-1 col-md-1 text-right">$';
        $itemHtml .= $shipPrice .'</strong></td><td class="col-sm-1 col-md-1 text-right"><strong>$';
        $itemHtml .= $grandTotal . '</td><td class="col-sm-1 col-md-1 text-right"><button type="button"';
        $itemHtml .= 'class="btn btn-sm btn-danger delete-cart-itm" id="0-'. $this->cProduct->prodId . '"><span class="glyphicon glyphicon-remove"></span>';
        $itemHtml .= '</button></td></tr>';

        return $itemHtml;
    }

    function toDec($val){
        return number_format($val, 2, '.', '');
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

    function calculateEachItemPrice(){
        $val = floatval($this->cProduct->proPrice) * floatval($this->quantity);
        return round($val,2);
    }

    function calculateEachWithShipping(){
        $val = $this->calculateEachItemPrice() + $this->calculateShippingCost();
        return round($val,2);
    }

    function calculateFullItemPrice()
    {
        $fullPrc =  $this->calculateEachItemPrice() +   $this->calculateShippingCost();
        return  round($fullPrc,2);
    }

}

?>
