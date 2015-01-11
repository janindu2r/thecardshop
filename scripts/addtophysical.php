<?php
/*
 created by Bmla
 */
$path = $_SERVER['DOCUMENT_ROOT'];
include ($path.'/internal.php');

$db = new DbCon();
$obj = new Physical();

$arr = null;

$res = 0;
$new = 0;
if (!empty($_POST['addPhysical'])) {
    if ($db->getScalar('select count(prod_id) from physical where prod_id = ' . $_POST["prod_id"])) {
        $obj = $obj->selectPhysicalProduct($_POST["prod_id"]);
        if ($obj->width != $_POST["width"])
            $arr['width'] = $db->escapeString($_POST["width"]);
        if ($obj->height != $_POST["height"])
            $arr['height'] = $db->escapeString($_POST["height"]);
        if ($obj->length != $_POST["length"])
            $arr['length'] = $db->escapeString($_POST["length"]);
        if ($obj->weight != $_POST["weight"])
            $arr['weight'] = $db->escapeString($_POST["weight"]);
        if ($obj->shipCst != $_POST["cost"])
            $arr['shipping_cost'] = $db->escapeString($_POST["cost"]);

        if (isset($_POST['mult']))
            $arr['multiply_byq'] = $db->escapeString('1');
        else
            $arr['multiply_byq'] = $db->escapeString('0');

        $clause = "prod_id = " . $obj->prodId;

        if ($arr != null)
            $res = $db->runUpdateRecord('physical', $arr, $clause);

            header('location: /customizeproduct.php?product=' . $obj->prodId . '&success=' . $res);
    }
    else {
        $arr['prod_id'] = $db->escapeString($_POST["prod_id"]);
        $arr['width'] = $db->escapeString($_POST["width"]);
        $arr['height'] = $db->escapeString($_POST["height"]);
        $arr['length'] = $db->escapeString($_POST["length"]);
        $arr['weight'] = $db->escapeString($_POST["weight"]);
        $arr['shipping_cost'] = $db->escapeString($_POST["cost"]);

        if (isset($_POST['mult']))
            $arr['multiply_byq'] = $db->escapeString('1');
        else
            $arr['multiply_byq'] = $db->escapeString('0');

        $new = $db->runInsertRecord("physical", $arr);

            header('location: /customizeproduct.php?product=' . $_POST["prod_id"] . '&success=' . $new);
    }
}



?>