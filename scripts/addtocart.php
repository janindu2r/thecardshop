<?php
 $path = $_SERVER['DOCUMENT_ROOT'];
 include($path.'/internal.php');

if($_SESSION){

$cartItm;


if($_POST)
{
    $variation = intval( $_POST['variation']);
	$prodId = $_POST['prodId'];
	$qty = $_POST['quantity'];
    if($variation)
    {
		$cartItm = new CartVar();
		$ok = $cartItm->addVariationProd($prodId, $qty, $_POST['variationId'], $_POST['variationVal']);
		if($ok)
		{
			echo 'Added To Cart';
            //return a confirmation about success and then the thumbnail item
		}
        else
            echo "Error. Try Again";


    }
    else{
		$cartItm = new CartProd();
		$ok = $cartItm->addToCartTable($prodId, $qty);
		if($ok)
		{
			echo 'Added To Cart';
            //return a confirmation about success and then the thumbnail item
		}
        else
            echo "Error. Try Again";

    }
    
}
}

?>