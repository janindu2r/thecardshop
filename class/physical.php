<?php
include('../class/product.php');

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
  selectProduct($proId);
  $db = new DbCon();
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


function insertPhysicalProducts($pId,$pName,$pTag,$pImg, $pPrice,$selUnit,$desc,$inStck,$cuStck,$sId,$caId,$variatn,$tag,$virtuals,$pPnts,$nPnts,$date,$dele,$widths,$heights,$lengths,$weights)
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
}


//viewing product

function viewProduct()
{
$db = new DbCon();
		$view = $this->db->getFirstRow("select * from products where product_id = ".$this->prodId);
	
		$this->prodId = $view["product_id"];
		$this->proName = $view["product_title"];
		$this->proPrice = $view["price"];
		$this->proImg = $view["default_img_loc"];
		$this->sell_Unit = $view["selling_unit"];
		$this->description = $view["product_desc"];
		return $this;	
	
	
}


protected function updatePhysicalProduct()
{
	
	
	
}

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