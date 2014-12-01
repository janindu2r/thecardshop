
<?php
include('../class/dbcon.php');


abstract class product
{
	
protected $prodId, $proName,$proTag,$proImg, $proPrice,$sell_Unit,$description,$inStock,$cuStock,$shopId,$catId,$variation,$tags,$virtual,$pPoints,$nPoints,$dates,$del;
protected $db;

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

	protected function selectProduct($proid)
	{
		
		//$db = new DbCon();
		$num = $db->getFirstRow("select * from products where product_id =".$proid);
	$instance->proName = $num['product_title'];
	$instance->proImg = $num['default_img_loc'];
	$instance->proPrice = $num['price'];
	$instance->sell_Unit = $num['selling_unit'];
	$instance->description = $num['product_desc'];
	return $instance;	
	}
	private function addProduct(array $assArr)
	{
		
		$db = new DbCon();
		
       
		
		$new = $db->runInsertRecord("products",$assArr);
		try
		{
			if($new = 0)
			{
				
		$this->prodId = $assArr['product_id'];
		$this->proName = $assArr['product_title'];
		$this->proPrice = $assArr['price'];
		$this->description = $assArr['product_desc'];
		$this->sell_Unit = $assArr['selling_unit'];
		
		$this->inStock = $assArr['initial_stck'];
		$this->cuStock = $assArr['current_stck'];
		$this->catId = $assArr['category_id'];
		$this->dates = $assArr['date_added'];
		$this->del = $assArr['deleted'];
		$this->nPoints = $assArr['neg_rep_points'];
		$this->pPoints = $assArr['pos_rep_points'];
		$this->tags = $assArr['tags'];
		$this->shopId = $assArr['shop_id'];
		$this->proTag = $assArr['product_tag'];
		$this->variation = $assArr['variations'];
		$this->virtual = $assArr['virtual'];
		return $this;
		
		}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			
		}
	}
	
	
	
	//a costructor for addProduct method
	
  function  insertProductArray($pId,$sId,$pTitle,$pTag,$cId,$pPrice,$pDesc,$pVartns,$pVirtual,$pTags,$pSelUnits,$pPoints,$nPoints,$pImg,$iStock,$cStock,$pDate,$pDel)
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
	
	
	
	
	
	
	//viewing a selected product
	abstract  function viewProduct();
	/*{
		
		
		
		$view =$this->db->getFirstRow("select * from products where product_id =".$this->prodId);
	
		$this->prodId = $view["product_id"];
		$this->proName = $view["product_title"];
		$this->proPrice = $view["price"];
		$this->proImg = $view["default_img_loc"];
		$this->sell_Unit = $view["selling_unit"];
		$this->description = $view["product_desc"];
		return $this;
		
	}*/
	
	//deleting a record
	
protected function deleteProduct()
{
	//making an instance of the db class
	
	$deleteRec = $this->db->runNonQuery("delete from products where product_id = ".$this->prodId);
	
	return $deleteRec;
		
}
//destructor
function __destructor()
{
echo "destroying the connection";	
}

//updating the details
	protected function updateProduct(array $setValue,$wheres)
	{
		
	$result = $this->db->runUpdateRecord('products',$setValue,$wheres);
	return $result;	
		
	}
	
	
	//inserting values
	/*function insertProducts(array $field)
	{
		$db = new DbCon();
		$insert = $db->runInsertRecord(" products ",$field);
		return $insert;
		
	}*/
	
	function updating($settingValue,$where)
	{
	$db = new DbCon();
	$x = $db->runUpdateOneValue('products',$settingValue,$where);
		
		
		
	}
	
}

class physical extends product
{

private $width,$height,$length,$weight;
 

//getters and setters

function setWidth($newWidth)
{
	$this->width =  $newWidth;
}
function getWidth()
{
return $this->width;	
}
function setHeight($newHeight)
{
	$this->height =  $newHeight;
}
function getHeight()
{
return $this->height;	
}

function setLength($newLength)
{
	$this->length =  $newLength;
}
function getLength()
{
return $this->length;	
}
function setWeight($newWeight)
{
	$this->weight =  $newWeight;
}
function getWeight()
{
return $this->weight;	
}



//constructor to initialise


function __constructor($asArray)
{
if($asArray == null)
{
selectPhysicalProduct();	
	
}
else
{
addPhysicalProduct();	
	
}
	
	
}

//implementing the selectPhysicalProduct

function selectPhysicalProduct($proId)
{
	$newProd = new physical();
 $newProd->selectProduct($proId);
  
  $select = $db->getFirstRow("select * from physical where prod_id = ".$proId);
 $this->width = $select['width'] ; 
 $this->height = $select['height'];
 $this->weight = $select['weight'];
 $this->length = $select['length'];
 return $select['product_id'];
  return $select['product_title'];
   return $select['shop_id'];
    return $select['initial_stck'];
 return $this->width;	
  return $this->height;
	return $this->weight;
	return $this->length;
}


//inserting values to the table


/*function insertPhysicalProducts($pId,$pName,$pTag,$pImg, $pPrice,$selUnit,$desc,$inStck,$cuStck,$sId,$caId,$variatn,$tag,$virtuals,$pPnts,$nPnts,$date,$dele,$widths,$heights,$lengths,$weights)
{
	
$arrayPro = array('');
	addProduct();
	
	
	
}

//deleting a record

protected function deletePhysicalProduct()
{
	$db = new DbCon();
$val1 = $db->runNonQuery("delete from products where product_id = ".$this->prodId);	
$val2 = deleteProduct();

if(val1 && val2)
{
return true;	
	
}
	else
	{
	return false;	
	}
}*/


//viewing product

function viewProduct()
{
//$db = new DbCon();
		$view = $db->getFirstRow("select * from products where product_id = ".$this->prodId);
	
		$this->prodId = $view["product_id"];
		$this->proName = $view["product_title"];
		$this->proPrice = $view["price"];
		$this->proImg = $view["default_img_loc"];
		$this->sell_Unit = $view["selling_unit"];
		$this->description = $view["product_desc"];
		return $this;	
	
	
}

/*
public  function updatePhysicalProduct()
{
	
	
	
}*/

//echo dimensions

/*function outDimensions($pName,$wdth,$hght,$lngth,$wght)
{
	echo " name of the product: ".$pName."<br>";
echo " length is:".$wdth."<br>";
echo " height is:".$hght."<br>";
echo " width is :".$lngth."<br>";
echo " weight is:".$wght. "<br>";
	
	
}*/
	
	
	
}








?>
