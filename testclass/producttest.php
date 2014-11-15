<?php
include('../class/dbcon.php');
include('../class/product.php');

$sampleProd = product::selectProduct(1);
echo $sampleProd->prod_ID ."<br>";
echo $sampleProd->pro_name."<br>";
echo $sampleProd->pro_price."<br>";
echo $sampleProd->sell_unit."<br>";
echo $sampleProd->description."<br>";
echo $sampleProd->pro_img."<br>";
$arr = "o";
$sample2 = product::addProduct($arr);
echo $sample2->pro_name."<br>";

?>