<?php
 $path = $_SERVER['DOCUMENT_ROOT'];
 include($path.'/internal.php');

$car = new Cart();
$car->getSimpleProducts();



$number = 8;

echo number_format($number, 2, '.', '');

?>