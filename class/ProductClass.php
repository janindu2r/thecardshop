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
//declaring abstract methods

abstract protected function addProduct($assArryProd);

abstract protected function viewProduct();

abstract protected function deleteProduct();

abstract protected function updateProduct();





}










?>