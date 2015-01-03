<?php
/* Cart Script
by: JK
*/


 $path = $_SERVER['DOCUMENT_ROOT'];
 include($path.'/internal.php');

//convert this to a switch statement

if($_SESSION){
 if($_POST)
{
    if($_POST['type'] == 'refresh')
    {
        $cr = new Cart();
        echo json_encode(array('success' => '1', 'itemAr' => $cr->getCompleteCartPrint(), 'totalCost' => $cr->toDec($cr->cartTotal)));
    }

    if($_POST['type'] == 'addprod')
    {
        $ok = 0;
        $variation = intval( $_POST['variation']);
        $prodId = $_POST['prodId'];
        $qty = $_POST['quantity'];
        if($variation)
        {
            $vCartItm = new CartVar();
            $varItems = $_POST['varItems'];
            $ok = $vCartItm->addToVarCartTable($prodId,$qty,$varItems);
        }
        else{
            $cartItm = new CartProd();
            $ok = $cartItm->addToCartTable($prodId, $qty);
        }
        if($ok)
            echo json_encode(array('success' => '1'));
        else
            echo json_encode(array('success' => '0'));

    }

    if($_POST['type'] == 'update')
    {
        $ok = 0;
        $relId = $_POST['relId'];
        $isVar = $_POST['isVar'];
        $uQty = $_POST['qty'];
        if($isVar)
        {
            $cartItm = new CartVar();
            $ok = $cartItm->updateFromVarGroupTable($relId,$uQty);
        }
        else
        {
            $cartItm = new CartProd();
            $ok = $cartItm->updateFromCartTable($relId, $uQty);
        }
        if($ok)
            echo json_encode(array('success' => '1'));
        else
            echo json_encode(array('success' => '0'));
    }


    if($_POST['type'] == 'delete')
    {
        $ok = 0;
        $relId = $_POST['relId'];
        $isVar = $_POST['isVar'];
        if($isVar)
        {
            $cartItm = new CartVar();
            $ok = $cartItm->deleteCartVar($relId);
        }
        else
        {
            $cartItm = new CartProd();
            $ok = $cartItm->deleteItem($relId);
        }
        if($ok)
            echo json_encode(array('success' => '1'));
        else
            echo json_encode(array('success' => '0'));
    }
}
}

?>