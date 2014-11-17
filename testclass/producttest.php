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
 $arr= array("product_id"=>"5","product_title"=>"'biscuits'","price"=>"300","product_desc"=>"'its nice'","selling_unit"=>"20","default_img_loc"=>"c:/newfolder","initial_stck"=>"30","current_stck"=>"20","category_id"=>"12","date_added"=>"2014-09-21","deleted"=>"0","neg_rep_points"=>"0","pos_rep_points"=>"10","tags"=>"'eee'","shop_id"=>"3","product_tag"=>"'sweets'","variations"=>"se3","virtual"=>"2we");
$addedProd = product::addProduct($arr);
/*echo $addedProd->proName."<br>";
echo $addedProd->prodId."<br>";*/

//inserting values to product table

//echo $sample2->$arr['pro_name']."<br>";

echo $arr['product_title']."<br>";
echo $arr['product_id']."<br>";

$proclass = new product();
$arr2 = $proclass->insertproduct('4','noodles','500',"'they are good'",'100','c:/newfolder','60','30','20','2014-11-21','1','2','0','sdss','6','food','s34','sw23');
$addedProd = product::addProduct($arr2);

echo $arr2["product_id"]."<br>";
echo $arr2["shop_id"]."<br>";
echo $arr2["product_title"]."<br>";
echo $arr2["product_tag"]."<br>";
echo $arr2["category_id"]."<br>";


//viewing
$viewPro = new product();
$viewProd = $viewPro->viewProduct(2);
echo $viewProd->prodId."<br>";
echo $viewProd->proName."<br>";
echo $viewProd->description."<br>";
echo $viewProd->proImg."<br>";
echo $viewProd->sell_Unit."<br>";
echo $viewProd->proPrice."<br>";


//deleting a record
$delRecord = new product();
$success = $delRecord->deleteProduct(2);
if($success == 1)
{
echo "yeah we removed"."<br>";
//calling the destructor
$new = $delRecord->__destructor();
}
else
echo"we coudnt remove record";

?>