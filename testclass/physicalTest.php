<?php
/*
created by :bmla
last edit:3-12-14

*/

include('../class/dbcon.php');

include('../class/product.php');
include('../class/physical.php');



//view physical products
$phyView = new Physical();
$result = $phyView->selectPhysicalProduct(1000001);
echo $result->shipCst ."<br>";
echo $result->multiByq ."<br>";


//delete physical

$objectPhy = new Physical();
$res = $objectPhy->deletePhyProducts(1000003);
if($res == 1)
echo "record deleted";
else
 echo "record coudnt be removed"."<br>";
 
 
 
 //adding a record
 $pObject = new Physical();
 $answer = $pObject->insertValue("1000013","2021","3081","201","431","303.25","1");
 if($answer)
 {
	print_r($answer); 
	 
 }
 else
 echo"couldnt insert"."<br>";
 
 //update a record
 
 $pysUpdate = new Physical();
$pValue = array( "weight" => " 60 ");

$pyUpdate = $pysUpdate->updateProduct($pValue,' prod_id = "1000000"');
if($pyUpdate == 1)
{
echo "successfully updated"."<br>";	
	
}
else
echo "coudnt update try again"."<br>";

?>