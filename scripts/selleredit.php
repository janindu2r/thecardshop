<?php

include($_SERVER['DOCUMENT_ROOT'].'/internal.php');

if ($_POST) {
    $db = new DbCon();
    $order = $_POST['order'];
    $product = $_POST['product'];
    $loc = $_POST['location'];

    $val = 0;

    $array['status'] = $db->escapeString('Shipped');
    $array['shipped_date'] = $db->escapeString(date("Y-m-d"));
    $array['ship_location'] = $db->escapeString($loc);

    if($_POST['var'])
        $val = $db->runUpdateRecord('variation_order_group', $array , 'varord_group = '. $product);
    else
        $val = $db->runUpdateRecord('product_order_items', $array , 'order_id = '. $order . ' and product_id = '. $product);

    header('location: /shipitem.php?order='.$order.'&shipped='.$val);
}

?>