<?php
/*
created by bmla
last edit 2014-12-3

*/

include('../class/DbCon.php');
include('../class/Product.php');


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
$update = new Product();
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
$insert = $add->insertValues("10003","fgh","3ed","3","234","fffffffffffffffffffffffffffffffffffffffff","1","0","456","30","4","2014-12-24","1");
if($insert)
{
	print_r($insert)."<br>";
}
else

echo "not working"."<br>";

//delete all
$delAll = new Product();
$flag = $delAll->deleteAll();
if($flag == 1)
{
echo "done"."<br>";	
}
else
echo " couldnt "."<br>";


//calling the getProductId function

$obj = new Product();
$result = $obj->getProductId("First Product");
echo $result->prodId;

?>