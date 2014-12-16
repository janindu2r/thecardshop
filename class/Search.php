<?php
class Search
{
     public $max = 5;
     public $min = 1;
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


}



?>