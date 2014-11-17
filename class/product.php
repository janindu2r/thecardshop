
<?php



class product
{
	
public $prodId, $proName,$proTag,$proImg, $proPrice,$sell_Unit,$description,$inStock,$cuStock,$shopId,$catId,$variation,$tags,$virtual,$pPoints,$nPoints,$dates,$del;
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

	public static function selectProduct($proid)
	{
		$instance = new self();
		$db = new DbCon();
		$num = $db->getFirstRow("select * from products where product_id =".$proid);
	$instance->proName = $num['product_title'];
	$instance->proImg = $num['default_img_loc'];
	$instance->proPrice = $num['price'];
	$instance->sell_Unit = $num['selling_unit'];
	$instance->description = $num['product_desc'];
	return $instance;	
	}
	public static function addProduct(array $assArr)
	{
		$instance = new self();
		$db = new DbCon();
		
       
		
		$new = $db->runInsertRecord("products",$assArr);
		try
		{
			if($new = 0)
			{
				
		$instance->prodId = $assArr['product_id'];
		$instance->proName = $assArr['product_title'];
		$instance->proPrice = $assArr['price'];
		$instance->description = $assArr['product_desc'];
		$instance->sell_Unit = $assArr['selling_unit'];
		$instance->proImg = $assArr['default_img_loc'];
		$instance->inStock = $assArr['initial_stck'];
		$instance->cuStock = $assArr['current_stck'];
		$instance->catId = $assArr['category_id'];
		$instance->dates = $assArr['date_added'];
		$instance->del = $assArr['deleted'];
		$instance->nPoints = $assArr['neg_rep_points'];
		$instance->pPoints = $assArr['pos_rep_points'];
		$instance->tags = $assArr['tags'];
		$instance->shopId = $assArr['shop_id'];
		$instance->proTag = $assArr['product_tag'];
		$instance->variation = $assArr['variations'];
		$instance->virtual = $assArr['virtual'];
		
		return $instance;
		}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			
		}
	}
	
	
	
	//a costructor for addProduct method
	
	function insertproduct($pId,$sId,$pTitle,$pTag,$cId,$pPrice,$pDesc,$pVartns,$pVirtual,$pTags,$pSelUnits,$pPoints,$nPoints,$pImg,$iStock,$cStock,$pDate,$pDel)
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
	
	
	
	return $asscArry;
		
		
		
	}
	
	
	
	
	
	
	//viewing a selected product
	  function viewProduct($prodctId)
	{
		
		$db = new DbCon();
		
		$view = $db->getFirstRow("select * from products where product_id =".$prodctId);
	
		$this->prodId = $view["product_id"];
		$this->proName = $view["product_title"];
		$this->proPrice = $view["price"];
		$this->proImg = $view["default_img_loc"];
		$this->sell_Unit = $view["selling_unit"];
		$this->description = $view["product_desc"];
		return $this;
		
	}
	
	//deleting a record
	
function deleteProduct($productId)
{
	//making an instance of the db class
	$db = new DbCon();
	$deleteRec = $db->runNonQuery("delete from products where product_id = ".$productId);
	
	return $deleteRec;
		
}
//destructor
function __destructor()
{
echo "destroying the connection";	
}


	/*function updateProduct($pNum)
	{
	$db = new DbCon();	
	$update = $db->runNonQuery("");	
		
	}*/
}

?>
