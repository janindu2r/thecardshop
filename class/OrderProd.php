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

    function __construct($id){
        parent::__construct();
        $this->orderId = $id;
    }

    function makeOrderProd($prod, $qty, $ship, $totPrc)
    {
        $this->cProduct = $prod;
        $this->quantity = $qty;
        $this->shippingCost = $ship;
        $this->itemsTotal = $totPrc;
        return $this;
    }

    function getOrderDetails(){
        $row = $this->db->getFirstRow('select * from product_order_items where order_id = '. $this->orderId . ' and product_id = '. $this->cProduct->prodId);
        $this->shippedDate = $row['shipped_date'];
        $this->receivedDateTime = $row['recieved_date_time'];
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
        $this->db->runUpdateOneValue('products', 'current_stck = current_stck - '. $this->quantity, 'product_id = '. $this->cProduct->prodId);

        if($this->cProduct->virtual)
        {
            //email the seller and make notifications if virtual?
        }

        return $add;
    }

    function simpProdIni($prodId)
    {
        $this->cProduct = new Product();
        $this->cProduct =  $this->cProduct->returnProduct($prodId);
        if(!$this->cProduct->virtual)
        {
            $shipping= new Physical();
            $shipping= $shipping->selectPhysicalProduct($this->cProduct->prodId);
            $this->cProduct = $shipping;
        }
        return $this->cProduct;
    }

    function calcShippingCost()
    {
        return round((intval($this->shippingCost) + intval($this->itemsTotal)), 2);
    }
	
}
?>