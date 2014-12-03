<?php
 $path = $_SERVER['DOCUMENT_ROOT'];
 include($path.'/internal.php');

if($_SESSION){
 if($_POST)
{
    if($_POST['type'] == 'refresh')
    {
        $cr = new Cart();
        echo json_encode(array('success' => '1', 'itemAr' => $cr->getCompleteCartPrint(), 'totalCost' => number_format($cr->cartTotal, 2, '.', '')));
    }
}
}

?>