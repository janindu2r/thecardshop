<?php
/* Cart Variable Class 
created: 2014-12-01
by : JK;
lastEdited: 2014-12-01
by: JK;
*/

class CartVar extends CartProd{

    private $cartVGroup = array();
    public $groupId;
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
        $varGroup['added_datetime'] = $this->db->escapeString($this->addDateTime);
        $varGroup['quantity'] = $this->db->escapeString($this->quantity);

        //Get if there's already a group with the same variation numbers
        $varConct ='';
        foreach($varItems as $k => $v)
            $varConct .=  ','. substr($k,1,1) . ':' . $v ;

        $varConct = $this->db->escapeString(substr($varConct,1));

        $sqlString = 'SELECT g.var_group as var_group, g.quantity as qty FROM cart_variation_group g join (select var_group ' ;
        $sqlString .= 'from cart_variations group by var_group having group_concat(concat_ws(":",variation_id,variation_value)) = '. $varConct ;
        $sqlString .= ') s on g.var_group = s.var_group where g.user_id = '. $this->userId . ' and g.product_id = ' . $prodId ;

        $extRow = $this->db->getFirstRow($sqlString);
        if($extRow) {
            //group ID exists, run update query
            $this->groupId = $extRow['var_group'];
            $this->quantity = intval($extRow['qty']) + intval($qty);
            $var = $this->db->runUpdateOneValue('cart_variation_group', 'quantity = ' . $this->quantity , 'var_group = ' . $this->groupId);
                if ($var)
                    return 1;
                else
                    return 0;
        }
        else {
            $this->groupId = $this->db->runInsertAndGetID('cart_variation_group', $varGroup);
            $success = 0;

            if ($this->groupId) {
                $varProd['var_group'] = $this->db->escapeString($this->groupId);
                foreach ($this->cProduct->allVars as $k => $vl) {
                    $varProd['variation_id'] = $k;
                    $varProd['variation_value'] = $this->db->escapeString($vl);
                    $success += $this->db->runInsertRecord('cart_variations', $varProd);
                }
            }
            if($success == count($varItems))
                return 1;
            else
                return 0;
        }
    }


    function makeVariationCartItem($groupId, $prodId,$qty,$addedDnT, array $varItems)
    {
        $this->varProdIni($prodId, $varItems);
        $this->quantity = $qty;
        $this->addDateTime = $addedDnT;
        $this->groupId = $groupId;
        $this->initializeVarGroup();
        return $this;
    }


    function updateFromVarGroupTable($groupId, $qty)
    {
        $var = $this->db->runUpdateOneValue('cart_variation_group', 'quantity = ' . $qty, 'var_group = ' . $groupId );
        if ($var)
            return 1;
        else
            return 0;
    }

    function deleteCartVar($groupId){
            $var = $this->db->deleteRecords('cart_variation_group', 'var_group = ' . $groupId);
            if($var)
                return 1;
            else
                return 0;
    }


    function getPortableVariationItem()
    {
        $shipping = $this->calculateShippingCost();
        $shipPrice = number_format($shipping, 2, '.', '');
        $desc = '<b>Variation</b><br>';

        foreach($this->cartVGroup as $k => $v)
            $desc .=  '<i>' .$k . '</i> ' . $v .'<br>';

        $desc .= '<i>Shipping</i> $'.  $shipPrice;

        $itemHtml = '<div class="row"> <div class="col-xs-2"> <img class="img-responsive" src="/content/products/prodthumbnail/' ;
        $itemHtml .=  $this->cProduct->prodId.'.jpg"> </div><div class="col-xs-4"> <h4 class="product-name"><strong>' ;
        $itemHtml .= '<a href="/viewproduct.php?product=' . $this->cProduct->prodId . '">';
        $itemHtml .= $this->cProduct->proName.'</a></strong></h4><h4><small> ' .  $desc ;
        $itemHtml .= '</small></h4> </div> <div class="col-xs-5"> <div class="col-xs-5 text-right"> <h6><strong>';
        $itemHtml .= $this->cProduct->proPrice . '<span class="text-muted">x</span></strong></h6> </div> <div class="col-xs-5">' ;
        $itemHtml .= '<input type="number" class="form-control input-sm output-qty-cart" id="1-'. $this->groupId.'" value="';
        $itemHtml .= $this->quantity. '" min="1" max="999"> </div> ' ;
        $itemHtml .= '<div class="col-xs-1"> <button type="button" class="btn btn-link btn-xs delete-cart-itm" id="1-'. $this->groupId ;
        $itemHtml .= '"><span class="glyphicon glyphicon-trash"> </span> </button> </div> </div> </div> <hr>' ;
        return $itemHtml;

    }

    function getStaticVarCartItem()
    {
        $shipping = $this->calculateShippingCost();
        $shipPrice = number_format($shipping, 2, '.', '');

        $desc = '<div style="font-size: 0.9em; color: #34495e; padding: 5px"><small></small><b>Variation</b><br>';

        foreach($this->cartVGroup as $k => $v)
            $desc .=  '<i>' .$k . '</i> ' . $v .'<br>';

        $desc .= '</small></div>';

        $itemHtml = '<tr><td class="col-sm-8 col-md-6"><div class="media"><a class="thumbnail pull-left"id="cart-picture" style="width: 72px; height: 72px;"  href="/viewproduct.php?product=';
        $itemHtml .=  $this->cProduct->prodId . '"><img class="media-object" src="/content/products/prodthumbnail/'. $this->cProduct->prodId .'.jpg"></a>';
        $itemHtml .= '<div class="media-body"><h4 class="media-heading"><a href="/viewproduct.php?product=';
        $itemHtml .=  $this->cProduct->prodId . '">'.$this->cProduct->proName;
        $itemHtml .= '</a></h4><h5 class="media-heading"> by <a href="#">'.   /*$this->cProduct->getShopName()*/ 'sth' .'</a></h5>' ;
        $itemHtml .= '<span>Status: </span><span class="text-success"><strong>'. $this->cProduct->cuStock .' out of ';
        $itemHtml .= $this->cProduct->inStock . ' available </strong></span>'. $desc .'</div></div></td><td class="col-sm-1" style="text-align: center">' ;
        $itemHtml .= '<input type="number" class="form-control input-sm output-qty-cart" id="1-'. $this->groupId.'" value="';
        $itemHtml .= $this->quantity. '" min="1" max="999"></td><td class="col-sm-1 col-md-1 text-right"><strong>$';
        $itemHtml .= $this->cProduct->proPrice . '</strong></td><td class="col-sm-1 col-md-1 text-right"><strong>$';
        $itemHtml .= $shipPrice .'</strong></td><td class="col-sm-1 col-md-1 text-right"><strong>$';
        $itemHtml .= $this->calculateEachItemPrice() . '</strong></td><td class="col-sm-1 col-md-1 text-right"><button type="button"';
        $itemHtml .= 'class="btn btn-sm btn-danger delete-cart-itm" id="1-'. $this->groupId .'"><span class="glyphicon glyphicon-remove"></span>';
        $itemHtml .= '</button></td></tr>';

        return $itemHtml;
    }




}

?>
