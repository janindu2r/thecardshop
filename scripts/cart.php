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

    if($_POST['type'] == 'addprod')
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
                echo json_encode(array('success' => '1'));
            }
            else
                echo json_encode(array('success' => '0'));


        }
        else{
            $cartItm = new CartProd();
            $ok = $cartItm->addToCartTable($prodId, $qty);
            if($ok)
                echo json_encode(array('success' => '1'));
            else
                echo json_encode(array('success' => '0'));
        }

    }
}
}

?>