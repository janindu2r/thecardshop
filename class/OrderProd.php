<?php
class OrderProd extends CartProd
{

    public $orderId;
    public  $shippedDate;
    public  $receivedDateTime;
    public $shippingCost;
    public $paidToSeller;
    public  $shipLoc;
    public  $itemsTotal;

    function __construct(){
        parent::__construct();
    }

    function makeOrderProd($prod, $qty, $ship, $totPrc)
    {
        $this->cProduct = $prod;
        $this->quantity = $qty;
        $this->shippingCost = $ship;
        $this->itemsTotal = $totPrc;
        return $this;
    }

    function addToOrderItems($ordId)
    {
        $this->orderId = $ordId;
        $ar['order_id'] = $this->db->escapeString($this->orderId);
        $ar['product_id'] = $this->db->escapeString($this->cProduct->prodId);
        $ar['quantity']  = $this->db->escapeString($this->quantity);
        $ar['items_tot']  = $this->db->escapeString($this->itemsTotal);
        $ar['status']  = $this->db->escapeString('Placed');
        $ar['paid_to_seller']  = $this->db->escapeString('0');
        $ar['shipping_tot'] = $this->db->escapeString($this->shippingCost);
        $add = $this->db->runInsertRecord('product_order_items', $ar);

        //email the seller and make notification

        return $add;
    }

	
}
?>