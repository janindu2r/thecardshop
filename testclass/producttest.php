<?php
include('../class/dbcon.php');
include('../class/product.php');


//selecting product details from db
$sampleProd = product::selectProduct(1);
echo $sampleProd->prodId ."<br>";
echo $sampleProd->proName."<br>";
echo $sampleProd->proPrice."<br>";
echo $sampleProd->sell_Unit."<br>";
echo $sampleProd->description."<br>";
echo $sampleProd->proImg."<br>";

//initializing associative array
 $arr = "o";
 $arr= array("product_id"=>"5","product_title"=>"biscuits","price"=>"300","selling_unit"=>"20","product_desc"=>"'its nice'");
$addedProd = product::addProduct($arr);
/*echo $addedProd->proName."<br>";
echo $addedProd->prodId."<br>";*/

//inserting values to product table

//echo $sample2->$arr['pro_name']."<br>";

echo $arr['product_title']."<br>";
echo $arr['product_id']."<br>";


//viewing
$viewPro = product::viewProduct(2);
echo $viewPro->prodId."<br>";
echo $viewPro->proName."<br>";
echo $viewPro->description."<br>";
echo $viewPro->proImg."<br>";
echo $viewPro->sellUnit."<br>";
echo $viewPro->proPrice."<br>";

?>