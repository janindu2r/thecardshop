<?php
class Search
{
     public $max = 5;
     public $min = 1;
    public $maxDate = "2014-01-12";
    public $maxShopDate;
    function __construct()
    {
        $this->db = new DbCon();
    }


    //get products title when product_Id is given
    public function getProducts($catId)
    {
    $query = " select product_id from products where category_id = ".$catId."order by product_id limit 0,4";
        $result = $this->getSelectTable($query);
        return $query;

    }
     //geting top selling products
    public function topSellProducts()
    {
    $sql = " select product_title from products where pos_rep_points > $this->max and neg_rep_points < $this->min limit 0,4";
        $result =$this->getSelectTable($sql);
        return $result;

    }

    //getting product id from
    public function getProdId($name)
    {
       $sql = "select product_id from products where product_title like " .$name%." limit 0,4";
        $result = $this->getSelectTable($sql);
        return $result;

    }

    //geting most recent products

    public function getRecentProducts()
    {
        $sql = " select product _id from products where date_added > $this->maxDate limit 0,4 ";
        $result = $this->getSelectTable($sql);
        return $result;

    }

    //getting most recent shops
    public function getRecentShops()
    {
        $sql = "select shop_id from shops where activated_date > $this->maxShopDate limit 0,4";
        $result = $this->getSelectTable($sql);
        return $result;

    }
    //getting top selling shops

    public function getTopShops()
    {
        $sql = " select shop_id from shops where pos_rep_pnts > $this->max and neg_rep_pnts < $this->min limit 0,4 ";
        $result = $this->getSelectTable($sql);
        return $result;

    }


}



?>