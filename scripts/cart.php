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
            $vCartItm = new CartVar();
            $varItems = $_POST['varItems'];
            $ok = $vCartItm->addToVarCartTable($prodId,$qty,$varItems);

         /*   $cartItm = new CartVar();
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
                echo json_encode(array('success' => '0')); */

            echo json_encode(array('success' => '1'));
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

    if($_POST['type'] == 'update')
    {
        $prodId = $_POST['prodId'];
        $isVar = $_POST['isVar'];
        $uQty = $_POST['qty'];
        if($isVar)
        {
            $varVal = $_POST['variationVal'];
            $varId = $_POST['variationId'];
        }
        else
        {
            $cartItm = new CartProd();
            $ok = $cartItm->updateFromCartTable($prodId, $uQty);
            if($ok)
                echo json_encode(array('success' => '1'));
            else
                echo json_encode(array('success' => '0'));
        }
    }


    if($_POST['type'] == 'delete')
    {
        $prodId = $_POST['prodId'];
        $isVar = $_POST['isVar'];
        if($isVar)
        {
            $varVal = $_POST['variationVal'];
            $varId = $_POST['variationId'];
        }
        else
        {
            $cartItm = new CartProd();
            $ok = $cartItm->deleteItem($prodId);
            if($ok)
                echo json_encode(array('success' => '1'));
            else
                echo json_encode(array('success' => '0'));
        }
    }
}
}

?>