<?php

include($_SERVER['DOCUMENT_ROOT'].'/internal.php');

$id = null;
$status = null;

if($_SESSION) {
    $db = new DbCon();//$orderItem[] =   $_POST[''];
    if ($_POST) {

        $orderItem['telephone'] =   $db->escapeString($_POST['tpno']);
        $orderItem['bill_add_line1'] =   $db->escapeString($_POST['adl1']);
        $orderItem['bill_add_line2'] =   $db->escapeString($_POST['adl2']);
        $orderItem['bill_add_line3'] =  $db->escapeString( $_POST['adl3']);
        $orderItem['bill_postal_code'] =  $db->escapeString( $_POST['postalcode']);
        $orderItem['ship_to_name'] =   $db->escapeString($_POST['sname']);
        $orderItem['ship_add_line1'] =   $db->escapeString($_POST['shipadl1']);
        $orderItem['ship_add_line2'] =  $db->escapeString( $_POST['shipadl2']);
        $orderItem['ship_add_line3'] =  $db->escapeString( $_POST['shipadl3']);
        $orderItem['ship_postal_code'] =  $db->escapeString( $_POST['spostalcode']);
        $orderItem['buyer_note'] = $db->escapeString($_POST['buyernote']);

        $ord = new Order();
        $id = $ord->insertOrder($orderItem);

        if($id) {
            if ($_POST['payment'] == 'paypal') {
                //process the payment and redirect the user accordingly
                $status = 'paid';
            }
        }
    }
}

if($id == 0)
    header('location: /index.php');
else
    header('location: /order.php?order='. $id.'&status='.$status);


?>