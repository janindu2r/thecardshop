<?php

include($_SERVER['DOCUMENT_ROOT'].'/internal.php');

if ($_POST) {
    $id = $_POST['id'];
    $ar = explode('-', $id);
    $db = new DbCon();
    $val = '';
    $array['status'] = $db->escapeString('Recieved');
    $array['recieved_date_time'] = $db->escapeString(date("Y-m-d H:i:s"));
    if($ar[0] == 1)
        $val = $db->runUpdateRecord('variation_order_group', $array , 'varord_group = '. $ar['2']);
    else
        $val = $db->runUpdateRecord('product_order_items', $array , 'order_id = '. $ar['1'] . ' and product_id = '. $ar[2]);
    $db->runUpdateOneValue('orders', 'processed_items = processed_items + 1', 'order_id = '. $ar[1]);
    echo $val;
}

?>