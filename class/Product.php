<?php 
/*
product class

 last-Edited-on 2014-12-2
 by bmla

*/
class Product
{
public  $prodId, $proName,$proTag, $proPrice,$sellUnit,$description,$inStock,$cuStock,$shopId,$catId,$variation,$virtual,$pPoints,$nPoints,$dates,$del;
public $db;

function __construct()
{
	try
	{
		$this->db = new DbCon();
	}
	catch(Exception $e)
	{
		echo $e->getMessage();
	}
	
}

 public function initializeProduct($prodArray){

     if($prodArray){
	 	$this->prodId = $prodArray['product_id'];
		$this->shopId = $prodArray['shop_id'];
		$this->proName = $prodArray['product_title'];
		$this->description =$prodArray['product_desc'];	
		$this->proTag =$prodArray['product_tag'];
		$this->catId = $prodArray['category_id'];
		$this->proPrice = $prodArray['price'];
		$this->variation = $prodArray['variations'];
		$this->virtual = $prodArray['virtual'];
		$this->sellUnit = $prodArray['selling_unit'];
		$this->pPoints = $prodArray['pos_rep_points'];
		$this->nPoints = $prodArray['neg_rep_points'];
		$this->inStock = $prodArray['initial_stck'];
		$this->cuStock =$prodArray['current_stck'];		
		$this->dates = $prodArray['date_added'];
		$this->del = $prodArray['deleted'];
		return $this;
     }
     else
         return 0;
 }

 public function returnProduct($productID)
 {
	 $selectArray = $this->db->getFirstRow("select * from products where product_id = ". $this->db->escapeString($productID));
     return $this->initializeProduct($selectArray);
 }

 public function addProduct(array $asArrProd)
 {
	$new = $this->db->runInsertAndGetID("products",$asArrProd);
		if($new)
		{
        $asArrProd['product_id'] =  $new ;
		$obj = $this->initializeProduct($asArrProd);
		return $obj;
		}
		else
		return 0;
 }

 public function insertValues($sId,$pTitle,$pTag,$cId,$pPrice,$pDesc,$pVartns,$pVirtual,$pSelUnits,$Stock)
 {
    $asscArry['shop_id'] = $this->db->escapeString($sId);
	$asscArry['product_title'] = $this->db->escapeString($pTitle);
	$asscArry['product_tag'] = $this->db->escapeString($pTag);
	$asscArry['category_id'] = $this->db->escapeString($cId);
	$asscArry['price'] = $this->db->escapeString($pPrice);
	$asscArry['product_desc'] = $this->db->escapeString($pDesc);
	$asscArry['variations'] = $this->db->escapeString($pVartns);
	$asscArry['virtual'] = $this->db->escapeString($pVirtual);
	$asscArry['selling_unit'] =$this->db->escapeString($pSelUnits);
	$asscArry['pos_rep_points'] = '0';
	$asscArry['neg_rep_points'] = '0';
	$asscArry['initial_stck'] = $this->db->escapeString($Stock);
	$asscArry['current_stck'] =$this->db->escapeString($Stock);
	$asscArry['date_added'] = $this->db->escapeString(date('Y-m-d'));
	$asscArry['deleted'] = '0';
	
	return $this->addProduct($asscArry);
	 
 }
//delete method
 public function deleteProduct($pId)
 { 
	$deleteRec = $this->db->runNonQuery("delete from products where product_id = ".$pId);
	return $deleteRec;	 
 }


public function deleteAll()
{
	$del = $this->db->runNonQuery("update products set deleted = '1' where deleted = '0'");
	return $del;
}
	

 public function updateProduct(array $setValue,$wheres)
 {
	$result = $this->db->runUpdateRecord('products',$setValue,$wheres);
	return $result; 
 }


//viewing products
public function viewProducts($pId)
{
        $view = $this->db->getFirstRow(" select * from products where product_id  = ".$pId."and deleted = 0");
        $this->prodId = $view['product_id'];
		$this->shopId = $view['shop_id'];
		$this->proName = $view['product_title'];
		$this->proTag = $view['product_tag'];
		$this->catId = $view['category_id'];
		$this->proPrice = $view['price'];
		$this->description = $view['product_desc'];
		$this->variation = $view['variations'];
		$this->virtual = $view['virtual'];
		$this->sellUnit =$view['selling_unit'];
		$this->pPoints = $view['pos_rep_points'];
		$this->nPoints = $view['neg_rep_points'];
		$this->inStock = $view['initial_stck'];
	    $this->cuStock = $view['current_stck'];
		$this->dates = $view['date_added'];
		$this->del = $view['deleted'];
		return $this;
}
//function to gain the product id
public function getProductId($pName)
{
	$res = $this->db->getFirstRow("select product_id from products");
	$this->prodId = $res['product_id'];
	return $this;
}

function getShopName()
{
$shopName = $this->db->getScalar("select shop_name from shops where shop_id = ". $this->shopId);
return $shopName;
}


}



?>