<?php
include('../class/dbcon.php');
include('../class/product.php');


//view

$object = new product();
$success = $object->viewProducts(1000000);
echo $success->prodId."<br>";
echo $success->proName."<br>";

//deleting a record
$delRecord = new product();
$success = $delRecord->deleteProduct(7);
if($success == 1)
{
echo "yeah we removed"."<br>";
//calling the destructor
$delRecord->__destructor();
}
else
echo"we coudnt remove record"."<br>";


//updating the details
$update = new product();
$values = array( "product_desc" =>"'bad'");

$pUpdate = $update->updateProduct($values,'product_id = "1000000"');
if($pUpdate == 1)
{
echo "successfully updated"."<br>";	
	
}
else
echo "coudnt update try again"."<br>";



//adding data

$add = new product();
$insert = $add->insertValues("7","8","fgh","3ed","4","234","fffffffffffffffffffffffffffffffffffffffff","1","0","456","30","4","2014-12-24","1");
if($insert)
{
	print_r($insert);
}
else
echo "not working";


?>