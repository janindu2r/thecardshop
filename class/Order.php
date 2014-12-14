<?php
class Order
{

    public  $userId;
    public $orderId;
    public $simpleProds = array();
    public $varProds = array();
    public $totalItems;
    public $processed;
    public $orderStatus;
    public $shippingTotal;
    public $buyerNote;
    public $telNum;
    private $billingAd = array();
    private $shippingAd = array();
    private  $db;
    public $dateTime;


    function __construct(){
        $this->db = new DbCon();
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
            $this->userId = $tempCart->userId;
            $this->totalItems = sizeof($tempCart->cartOrder);
            $this->processed = 0;
            $this->orderStatus = 'Placed';
            $this->shippingTotal = $tempCart->cartEstShipping;
            $this->billingAd[1] = $inVals['bill_add_line1'];
            $this->billingAd[2] = $inVals['bill_add_line2'];
            $this->billingAd[3] = $inVals['bill_add_line3'];
            $this->billingAd[4] = $inVals['bill_postal_code'];
            $this->shippingAd[0] = $inVals['ship_to_name'];
            $this->shippingAd[1] =  $inVals['ship_add_line1'];
            $this->shippingAd[2] =  $inVals['ship_add_line2'];
            $this->shippingAd[3] =  $inVals['ship_add_line3'];
            $this->shippingAd[4] =  $inVals['ship_postal_code'];
            $this->buyerNote =  $inVals['buyer_note'];
            $this->telNum = $inVals['telephone'];
            $this->dateTime = $currentT;

            $this->getOrderSimpProds($tempCart->simpleProds);
            $this->getOrderVarProds($tempCart->varProds);

            return $this->orderId;
        }
    }


    function addOrderSimpleProds(array $cartProds)
    {
        foreach($cartProds as $obj){
            $ordPrd = new OrderProd();
            $ordPrd->makeOrderProd($obj->cProduct, $obj->quantity, $obj->calculateShippingCost(), $obj->calculateEachItemPrice());
            $ad = $ordPrd->addToOrderItemsTable($this->orderId);
            if($ad) {
                array_push($this->simpleProds, $ordPrd);
                $obj->deleteItem($obj->cProduct->prodId);
            }
        }
    }

    function addOrderVarProds(array $cartVars)
    {
        foreach($cartVars as $obj){
            $varPrd = new OrderVar();

            $ad = 0;
            if($ad){
                array_push($this->varProds, $varPrd);
                $obj->deleteCartVar($obj->groupId);
            }
        }

    }



	
}
?>