<?php
/* Order Class
by: JK;
*/


class Order
{

    public $userId;
    public $orderId;
    public $simpleProds = array();
    public $varProds = array();
    public $totalItems;
    public $processed;
    public $orderStatus;
    public $subTotal;
    public $shippingTotal;
    public $buyerNote;
    public $telNum;
    public $total;
    public $billingAd = array();
    public $shippingAd = array();
    private $db;
    public $dateTime;


    function __construct(){
        $this->db = new DbCon();
        $this->subTotal = 0;
    }

    function insertOrder(array $inVals)
    {
      //  $ar['order_id']
        $tempCart = new Cart();
        $inVals['buyer_id'] = $this->db->escapeString($tempCart->userId);
        $currentT = date("Y-m-d H:i:s");
        $inVals['order_dnt'] = $this->db->escapeString($currentT);
        $inVals['total'] = $this->db->escapeString($tempCart->cartTotal);
        $inVals['tot_items_in_cart'] = $this->db->escapeString(sizeof($tempCart->cartOrder));
        $inVals['processed_items'] = '0';
        $inVals['order_status'] = $this->db->escapeString('Placed');
        $inVals['shipping_tot'] = $this->db->escapeString($tempCart->cartEstShipping);
        $this->orderId =  $this->db->runInsertAndGetID('orders', $inVals);

        if($this->orderId)
        {
            $this->initializeOrder();
            $this->addOrderSimpProds($tempCart->simpleProds);
            $this->addOrderVarProds($tempCart->varProds);
            return $this->orderId;
        }
    }

    function initializeOrder()
    {
        $oVals = $this->db->getFirstRow('select * from orders where order_id = ' . $this->orderId);
        $this->userId = $oVals['buyer_id'];
        $this->totalItems = $oVals['tot_items_in_cart'];
        $this->processed =  $oVals['processed_items'] ;
        $this->orderStatus = $oVals['order_status'];
        $this->shippingTotal = $oVals['shipping_tot'];
        $this->buyerNote = $oVals['buyer_note'];
        $this->telNum = $oVals['telephone'];
        $this->dateTime = $oVals['telephone'];
        $this->total = $oVals['total'];
        $this->billingAd[1] = $oVals['bill_add_line1'];
        $this->billingAd[2] = $oVals['bill_add_line2'];
        $this->billingAd[3] = $oVals['bill_add_line3'];
        $this->billingAd[4] = $oVals['bill_postal_code'];
        $this->shippingAd[0] = $oVals['ship_to_name'];
        $this->shippingAd[1] =  $oVals['ship_add_line1'];
        $this->shippingAd[2] =  $oVals['ship_add_line2'];
        $this->shippingAd[3] =  $oVals['ship_add_line3'];
        $this->shippingAd[4] =  $oVals['ship_postal_code'];
        $this->dateTime = $oVals['order_dnt'];
    }

    function addOrderSimpProds(array $cartProds)
    {
        foreach($cartProds as $obj){
            $ordPrd = new OrderProd($this->orderId);
            $ordPrd->makeOrderProd($obj->cProduct, $obj->quantity, $obj->calculateShippingCost(), $obj->calculateEachItemPrice());
            $ad = $ordPrd->addToOrderItems($this->orderId);
            if($ad) {
                array_push($this->simpleProds, $ordPrd);
                $this->subTotal += floatval($ordPrd->itemsTotal);
                $obj->deleteItem($obj->cProduct->prodId);
            }
        }
    }

    function addOrderVarProds(array $cartVars)
    {
        foreach($cartVars as $obj){
            $varPrd = new OrderVar($this->orderId);
            $varPrd->makeVarOrderProd($obj->cProduct, $obj->cartVGroup ,$obj->quantity, $obj->calculateShippingCost(), $obj->calculateEachItemPrice());
            $ad = $varPrd->addToOrderVarItems($this->orderId);
            if($ad > 1){
                array_push($this->varProds, $varPrd);
                $this->subTotal += floatval($varPrd->itemsTotal);
                $obj->deleteCartVar($obj->groupId);
            }
        }

    }

    function getFullName()
    {
        return $this->db->getScalar("select concat(fname,' ', lname) from user where reg_id = ". $this->userId );
    }

    function getOrder($id){
        $this->orderId = $id;
        $this->initializeOrder();
        $this->getOrderSimpProds();
        $this->getOrderVarProds();
    }

    function getOrderSimpProds()
    {
        $sql = 'select * from product_order_items where order_id = '. $this->orderId ;
        $simpProds = $this->db->getSelectTable($sql);
        if($simpProds) {
            foreach ($simpProds as $row) {
                $ordPrd = new OrderProd($this->orderId);
                $ordPrd->makeOrderProd($ordPrd->simpProdIni($row['product_id']), $row['quantity'], $row['shipping_tot'], $row['items_tot']);
                array_push($this->simpleProds, $ordPrd);
                $this->subTotal += floatval($ordPrd->itemsTotal);
            }
        }
    }

    function getOrderVarProds()
    {
        $sql = 'select * from variation_order_group where order_id = '. $this->orderId ;
        $varProds = $this->db->getSelectTable($sql);
        if($varProds) {
            foreach ($varProds as $row) {
                $varPrd = new OrderVar($this->orderId);
                $varPrd->orderId = $this->orderId;
                $varPrd->groupId = $row['varord_group'];
                $varPrd->varProdIni($row['product_id']);
                $varPrd->initializeVarGroup();
                $varPrd->makeVarOrderProd($varPrd->cProduct, $varPrd->cartVGroup, $row['quantity'], $row['shipping_tot'], $row['items_tot']);
                array_push($this->varProds, $varPrd);
                $this->subTotal += floatval($varPrd->itemsTotal);
            }
        }
    }

    function toDec($val){
        return number_format($val, 2, '.', '');
    }

    function payOrder()
    {
        $this->db->runUpdateOneValue('orders', 'order_status = "Paid"', 'order_id = '. $this->orderId );
        $this->db->runUpdateOneValue('product_order_items', 'paid_to_seller = "1"', 'order_id = '. $this->orderId);
        $this->db->runUpdateOneValue('variation_order_group', 'paid_to_seller = "1"', 'order_id = '. $this->orderId);

    }


}
?>