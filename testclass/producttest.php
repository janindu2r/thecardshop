<?php
include('../class/dbcon.php');
include('../class/product.php');


//selecting product details from db
$sampleProd = product::selectProduct(1);
echo $sampleProd->prod_Id ."<br>";
echo $sampleProd->pro_Name."<br>";
echo $sampleProd->pro_Price."<br>";
echo $sampleProd->sell_Unit."<br>";
echo $sampleProd->description."<br>";
echo $sampleProd->pro_Img."<br>";

//initializing associative array
$arr = "o";
$sample2 = product::addProduct($arr);


//inserting values to product table
$arr = array('product_id'=>'2','product_title'=>'biscuits','price'=>'300','selling_unit'=>'20','product_desc'=>'its nice');
echo $sample2-$arr['pro_name']."<br>";
$a = new DbCon();
echo $a->runInsertRecord('product',$arr)."<br>";


?>