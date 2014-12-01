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
		$varVal = $_POST['variationVal'];
		$varId = $_POST['variationId'];
		$ok = $cartItm->addVariationProd($prodId, $qty, $varId, $varVal);
        if($ok)
		{
			$asso['prodTitle'] = 'JK Title';
			$asso['prodDesc'] = 'Color : '. $varVal;
			$asso['prodPrice'] = '400';
			$asso['prdShip'] = '200';				
			echo json_encode(array('success' => '1', 'itemAr' => $asso));
		}
        else
            echo json_encode(array('success' => '0')); 


    }
    else{
		$cartItm = new CartProd();
		$ok = $cartItm->addToCartTable($prodId, $qty);	
		if($ok)
		{
			$asso['prodTitle'] = $ok->cProduct->proName;
			$asso['prodDesc'] = '';
			$asso['prodPrice'] = $ok->cProduct->proPrice;
			$uprice = floatval($ok->cProduct->proPrice);
			$multiply = $ok->cProduct->multiByq;
			$shipping = floatval($ok->cProduct->shipCst);
			if($multiply)
				$shipping = $shipping * floatval($qty) ;
			$asso['totalCost'] =  ($uprice * $qty) + $shipping;						
			echo json_encode(array('success' => '1', 'itemAr' => $asso)); 
		}
        else
             echo json_encode(array('success' => '0'));

    }
    
}
}

?>