<?php 

class Product
{
public $prodId, $proName,$proTag, $proPrice,$sell_Unit,$description,$inStock,$cuStock,$shopId,$catId,$variation,$virtual,$pPoints,$nPoints,$dates,$del;
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

 public function initializeProduct(array $prodArray)
 {
	 	$this->prodId = $prodArray['product_id'];
		$this->proName = $prodArray['product_title'];
		$this->proPrice = $prodArray['price'];
		$this->description =$prodArray['product_desc']; //and so on
		$this->sell_Unit = $prodArray['selling_unit'];		
		$this->inStock = $prodArray['initial_stck'];
		$this->cuStock =$prodArray['current_stck'];
		$this->catId = $prodArray['category_id'];
		$this->dates = $prodArray['date_added'];
		$this->del = $prodArray['deleted'];
		$this->nPoints = $prodArray['neg_rep_points'];
		$this->pPoints = $prodArray['pos_rep_points'];
		$this->shopId = $prodArray['shop_id'];
		$this->proTag =$prodArray['product_tag'];
		$this->variation = $prodArray['variations'];
		$this->virtual = $prodArray['virtual'];
		return $this;
 }
 
 public function returnProduct($productID)
 {
	 $selectArray = $this->db->getFirstRow("select * from products where product_id = ".$productID);	 
	 $arr =  $this->initializeProduct($selectArray);
	 return $arr;
 }

 public function addProduct(array $assArryProd)
 {
	
	$new = $this->db->runInsertRecord("products",$assArryProd);
	try
	{
		if($new == 0)
		{
		$this->initializeProduct($assArryProd);		
		return $this;
		}
		
	}
	catch(Exception $e)
	{
	  echo $e->getMessage();	
	}
	
	 
 }

 public function insertValues($pId,$sId,$pTitle,$pTag,$cId,$pPrice,$pDesc,$pVartns,$pVirtual,$pSelUnits,$pPoints,$nPoints,$iStock,$cStock,$pDate,$pDel)
 {
	 $asscArry['product_id'] = $pId;	
	$asscArry['product_title'] = $pTitle;
	$asscArry['price'] = $pPrice;
	$asscArry['product_desc'] = $pDesc;
	$asscArry['selling_unit'] = $pSelUnits;
	$asscArry['default_img_loc'] = $pImg;
	$asscArry['initial_stck'] = $iStock;
	$asscArry['current_stck'] = $cStock;
	$asscArry['category_id'] = $cId;
	$asscArry['date_added'] = $pDate;
	$asscArry['deleted'] = $pDel;
	$asscArry['tags'] = $pTags;
	$asscArry['shop_id'] = $sId;
	$asscArry['product_tag'] = $pTag;
	$asscArry['variations'] = $pVartns;
	$asscArry['virtual'] = $pVirtual;
	addProduct($asscArry);
	 
 }

 public function deleteProduct($pId)
 { 
	$deleteRec = $this->db->runNonQuery("delete from products where product_id = ".$pId);
	return $deleteRec;	 
 }
 
//destructor
function __destructor(){
//echo "destroying the connection";	
}

 public function updateProduct(array $setValue,$wheres)
 {
			
	$result = $this->db->runUpdateRecord('products',$setValue,$wheres);
	return $result; 
 }

public function viewProducts($pId)
{
$view = $this->db->getFirstRow("select * from products where product_id  = ".$pId);

$this->prodId = $view['product_id'];	
	
		$this->shopId = $view['shop_id'];
		$this->proName = $view['product_title'];
		$this->proTag = $view['product_tag'];
		$this->catId = $view['category_id'];
		$this->proPrice = $view['price'];
		$this->description = $view['product_desc'];
		$this->variation = $view['variations'];
		$this->virtual = $view['virtual'];
		$this->sell_Unit =$view['selling_unit'];
		$this->pPoints = $view['pos_rep_points'];
		$this->nPoints = $view['neg_rep_points'];
		$this->inStock = $view['initial_stck'];
	    $this->cuStock = $view['current_stck'];
		$this->dates = $view['date_added'];
		$this->del = $view['deleted'];
		return $this;
}



}










?>