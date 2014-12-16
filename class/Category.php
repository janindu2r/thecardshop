<?php

class Category{
    private $db;

	function __construct()
    {
		$this->db = new DbCon();
	}

    public function getCategories()
    {
        $sql = "select category_id, category_name from categories order by category_name ASC";
        $result = $this->db->getSelectTable($sql);
        return $result;
    }

    public function getCatName($catId)
    {
        return $this->db->getScalar('select category_name from categories where category_id = '. $catId);
    }

    public  function getCatProdList($catId, $start, $num)
    {
        $query = "select product_id, variations from products where category_id = ".$catId." order by product_id desc limit ". $start .",". $num ;
        $result = $this->db->getSelectTable($query);
        return $result;
    }

}

?>
