<?php

include($_SERVER['DOCUMENT_ROOT'].'/internal.php');

if($_SESSION) {
    $db = new DbCon();//$orderItem[] =   $_POST[''];
    if ($_POST) {

        $orderItem['telephone'] =   $_POST['tpno'];
        $orderItem['bill_add_line1'] =   $_POST['adl1'];
        $orderItem['bill_add_line2'] =   $_POST['adl2'];
        $orderItem['bill_add_line3'] =   $_POST['adl3'];
        $orderItem['bill_postal_code'] =   $_POST['postalcode'];
        $orderItem['ship_to_name'] =   $_POST['sname'];
        $orderItem['ship_add_line1'] =   $_POST['shipadl1'];
        $orderItem['ship_add_line2'] =   $_POST['shipadl2'];
        $orderItem['ship_add_line3'] =   $_POST['shipadl3'];
        $orderItem['ship_postal_code'] =   $_POST['spostalcode'];
        $orderItem['buyer_note'] = $_POST['buyernote'];

        if($_POST['payment'] == 'paypal') {
            $ord = new Order();
            $ord->insertOrder($orderItem);
        }

    }
}


?>