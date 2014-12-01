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
	$prodDesc = '';
    if($variation)
    {
		$cartItm = new CartVar();
		$varVal = $_POST['variationVal'];
		$varId = $_POST['variationId'];
		$prodDesc = 'Color : '. $varVal;
		$ok = $cartItm->addVariationProd($prodId, $qty, $varId, $varVal);
		if($ok)
		{
			$asso['prodTitle'] = 'JK Title';
			$asso['prodDesc'] = $prodDesc;
			$asso['prodPrice'] = '400';
			$asso['prdShip'] = '200';				
			echo json_encode(array('success' => $ok, 'itemAr' => $asso));
		}
        else
            echo json_encode(array('success' => $ok));


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
             echo json_encode(array('success' => $ok));

    }
    
}
}

?>