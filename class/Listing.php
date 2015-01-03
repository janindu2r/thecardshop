<?php
/* Listing Class
by: JK & bmla
*/


class Listing
{
    public $db;

    function __construct()
    {
        $this->db = new DbCon();
    }

    //getting top selling products
    public function topSellProducts($start, $num)
    {
        $sql = "(SELECT product_id,  '1' AS variation, COUNT( order_id ) AS orders FROM  variation_order_group GROUP BY product_id ";
        $sql .= "ORDER BY COUNT( order_id ) DESC)UNION ( SELECT product_id,  '0' AS variation, COUNT( order_id ) AS orders FROM ";
        $sql .= "product_order_items GROUP BY product_id ORDER BY COUNT( order_id ) DESC ) ORDER BY orders DESC limit ". $start .",". $num ;
        return $this->db->getSelectTable($sql);
    }

    //getting product id from
    public function getProdSearch($name, $start, $num)
    {
        $sql = "select product_id, variations from products where product_title like '%" .$name ."%' limit ". $start .",". $num ;
        $result = $this->db->getSelectTable($sql);
        return $result;
    }

    //getting most recent products
    public function getRecentProducts($start, $num)
    {
        $sql = " select product_id, variations from products order by date_added desc limit ". $start .",". $num ;
        $result = $this->db->getSelectTable($sql);
        return $result;
    }

    //getting most recent shops
    public function getRecentShops($start, $num)
    {
        $sql = "select shop_id from shops order by activated_date desc limit ". $start .",". $num ;
        $result = $this->db->getSelectTable($sql);
        return $result;
    }



    /* getting top selling shops
    public function getTopShops($start, $num)
    {
        $sql = " select shop_id from shops where ";
        $result = $this->db->getSelectTable($sql);
        return $result;
    }

    */

}



?>