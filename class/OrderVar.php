<?php
class OrderVar extends CartVar
{
    public $orderId;
    public $shippedDate;
    public $receivedDateTime;
    public $shippingCost;
    public $paidToSeller;
    public $shipLoc;
    public $itemsTotal;

    function __construct(){
        parent::__construct();
    }

    function makeVarOrderProd($prod, array $variation, $qty, $ship, $totPrc)
    {
        $this->cProduct = $prod;
        $this->cartVGroup = $variation;
        $this->quantity = $qty;
        $this->shippingCost = $ship;
        $this->itemsTotal = $totPrc;
        return $this;
    }

    function addToOrderVarItems($ordId)
    {
        $ad = null;
        $this->orderId = $ordId;
        $ar['order_id'] = $this->db->escapeString($this->orderId);
        $ar['product_id'] = $this->db->escapeString($this->cProduct->prodId);
        $ar['quantity']  = $this->db->escapeString($this->quantity);
        $ar['items_tot']  = $this->db->escapeString($this->itemsTotal);
        $ar['status']  = $this->db->escapeString('Placed');
        $ar['paid_to_seller']  = $this->db->escapeString('0');
        $ar['shipping_tot'] = $this->db->escapeString($this->shippingCost);
        $this->groupId = $this->db->runInsertAndGetID('variation_order_group', $ar);

        $item['varord_group'] = $this->groupId;
        if($this->groupId)
        {
            $ad = 1;
            foreach($this->cartVGroup as $key => $val)
            {
                $item['variation_id'] = $this->db->escapeString(array_search($key, $this->cProduct->varNames));
                $item['variation_value'] = $this->db->escapeString($val);
                $ad += $this->db->runInsertRecord('variation_order_items',$item);
            }
        }

        $this->db->runUpdateOneValue('products', 'current_stck = current_stck - '. $this->quantity, 'product_id = '. $this->cProduct->prodId);

        return $ad;
    }

    function varProdIni($prodId)
    {
        $this->cProduct= new Variation();
        $this->cProduct->selectPhysicalProduct($prodId);
        $this->cProduct->getAllVariations($prodId);
        return $this->cProduct;
    }

    function initializeVarGroup()
    {
        $varStr = null;
        $sql = 'select * from variation_order_items where varord_group = '. $this->groupId;
        $varIts = $this->db->getSelectTable($sql);
        foreach ($varIts as $row) {
            $this->cartVGroup[$this->cProduct->getVarName($row['variation_id'])] = $row['variation_value'];
        }
    }

	
}
?>