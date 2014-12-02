<?php
include('../class/dbcon.php');
include('../class/physical.php');
include('../class/Product.php');



/*$instance = new physical();
 $instance->outDimensions("biscuits",'30','20','0','50');*/
/*from
$select = new physical();
$success = $select->selectPhysicalProduct(1);
echo "product id:".$echo['product_id'];
here*/
/*$delete = new physical();
$flag = $delete->deleteProduct();
if($flag == 1)
{
echo"deleted";	
}
else
echo "coudnt delete";*/

$phyView = new physical();
$result = $phyView->viewProducts(1);
echo $result->shipCst ."<br>";
echo $result->multiByq ."<br>";


?>