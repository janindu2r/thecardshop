<?php
include('../class/dbcon.php');
include('../class/product.php');


//selecting product details from db
$sampleProd = product::selectProduct(1);
echo $sampleProd->prodId ."<br>";
echo $sampleProd->proName."<br>";
echo $sampleProd->proPrice."<br>";
echo $sampleProd->sellUnit."<br>";
echo $sampleProd->description."<br>";
echo $sampleProd->proImg."<br>";

//initializing associative array
 $arr = "";
$sample2 = product::addProduct($arr);


//inserting values to product table
$arr= array('product_id'=>'2','product_title'=>'biscuits','price'=>'300','selling_unit'=>'20','product_desc'=>'its nice');
//echo $sample2->$arr['pro_name']."<br>";

echo $db->runInsertRecord('product',$arr)."<br>";


?>