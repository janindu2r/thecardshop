<?php
/* Order Product Class
by: JK;
*/

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

        if($this->cProduct->virtual) {
            $link = $this->db->getScalar('select download_link from virtual where prod_id = ' . $this->cProduct->prodId);
            if ($link)
                $this->processVirtualPurchase($link);
        }

        return $add;
    }


    function processVirtualPurchase($link)
    {
        $regMail = new Email();
        $nUser = $_SESSION['user'];
        $mailSuccess = $regMail->sendMail($nUser->email, 'download', 'Download your product!', $this->getEmail($nUser->getProfile(), $link));
        if($mailSuccess)
        {
            $array['status'] = $this->db->escapeString('Recieved');
            $array['recieved_date_time'] = $this->db->escapeString(date("Y-m-d H:i:s"));
            $this->db->runUpdateRecord('product_order_items', $array , 'order_id = '. $this->orderId . ' and product_id = '. $this->cProduct->prodId);
            $this->db->runUpdateOneValue('orders', 'processed_items = processed_items + 1', 'order_id = ' . $this->orderId);
        }
    }

    private function getEmail($userFullName, $link){

        $email = '<div style="width: 80%; margin: 0 auto; padding: 20px;"><h2>Hello ';
        $email .= $userFullName .'!</h2><p style="color:#34495e; clear: both; margin: 0.5em;">You purchased a product from Comercio! ';
        $email .= 'Please click the download link below and download your virtual product.</p><div style="padding: 2em;">';
        $email .= '<a title="Download" style="text-decoration: none; color:#FFFFFF; padding: 1em 1.5em 1em 1.5em; border-radius: 0.5em; font-size: 1.2em; background-color: #557da1;"';
        $email .= 'href="'.$link;
        $email .= '">Download</a></div></div>';
        return $email;
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

    function getSeller()
    {
        return $this->db->getScalar('select shop_id from products where product_id = '. $this->cProduct->prodId);
    }
	
}
?>