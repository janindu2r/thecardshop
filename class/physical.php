<?php

class Physical extends Product
{
public $width,$height,$length,$weight,$shipCst,$multiByq;



function __construct()
{
	parent::__construct();	
}


public function selectPhysicalProduct($proID)
{		
		$this->returnProduct($proID);
		$view = $this->db->getFirstRow("select * from physical where prod_id = ".$this->prodId);
		$this->width = $view['width'];
		$this->height = $view['height'];
		$this->length = $view['length'];
		$this->weight = $view['weight'];
		$this->shipCst = $view['shipping_cost'];
		$this->multiByq = $view['multiply_byq'];
		return $this;	
}

//deleting a record

public function deletePhyProducts()

{}
//constructor to initialise

/*now
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
	
	
}*/
/*

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
*/

//inserting values to the table
/*

function insertPhysicalProducts($pId,$pName,$pTag,$pImg, $pPrice,$selUnit,$desc,$inStck,$cuStck,$sId,$caId,$variatn,$tag,$virtuals,$pPnts,$nPnts,$date,$dele,$widths,$heights,$lengths,$weights)
{
	
$arrayPro = array('');
	addProduct();
	
	
	
}

//deleting a record

public function deletePhysicalProduct()
{
	
$val1 = $this->db->runNonQuery("delete from products where product_id = ".$this->prodId);	
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

/*public function updatePhysicalProduct()
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