<?php
include('../class/dbcon.php');
include('../class/product.php');


//selecting product details from db
$sampleProd = product::selectProduct(1);    //try catch here and show error 
echo $sampleProd->prod_Id ."<br>";
echo $sampleProd->pro_Name."<br>";
echo $sampleProd->pro_Price."<br>";
echo $sampleProd->sell_Unit."<br>";
echo $sampleProd->description."<br>";
echo $sampleProd->pro_Img."<br>";

//initializing associative array
$arr = array('product_id'=>'2','product_title'=>'biscuits','price'=>'300','selling_unit'=>'20','product_desc'=>'its nice');
$addedProd = product::addProduct($arr);       //try catch here and show error 

echo $addedProd->pro_Name. "<br>";

//inserting values to product table
echo $arr['product_title']."<br>";



?>