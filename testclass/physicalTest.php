<?php
include('../class/dbcon.php');
include('../class/physical.php');


/*$instance = new physical();
 $instance->outDimensions("biscuits",'30','20','0','50');*/

$select = new physical();
$success = $select->selectPhysicalProduct(1);
echo "product id:".$echo['product_id'];

/*$delete = new physical();
$flag = $delete->deleteProduct();
if($flag == 1)
{
echo"deleted";	
}
else
echo "coudnt delete";*/

?>