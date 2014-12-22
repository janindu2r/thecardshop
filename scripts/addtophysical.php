<?php

$path = $_SERVER['DOCUMENT_ROOT'];
include ($path.'/internal.php');

$db = new DbCon();
$obj = new Physical();
//$obj = $obj->selectPhysicalProduct($_POST["prod_id"]);

$arr = null;

$res = 0;
if (!empty($_POST['add']))
{
    if($obj->width != $_POST["width"])
    {
        $arr['width'] = $db->escapeString($_POST["width"]);
    }
    if($obj->height != $_POST["height"])
    {
        $arr['height'] = $db->escapeString($_POST["height"]);
    }
    if($obj->length != $_POST["length"])
    {
        $arr['length'] = $db->escapeString($_POST["length"]);
    }
    if($obj->weight != $_POST["weight"])
    {
        $arr['weight'] = $db->escapeString($_POST["weight"]);
    }
    if($obj->shipCst != $_POST["cost"])
    {
        $arr['shipping_cost'] = $db->escapeString($_POST["cost"]);
    }
    if($obj->multiByq != $_POST["var"])
    {
        $arr['multiply_byq'] = $db->escapeString($_POST["var"]);
    }
    $clause = "prod_id = ". $obj->prodId;
    if($arr != null)
        $res = $db->runUpdateRecord('physical',$arr, $clause);
    if($res)
    {
        header('location: /admin.php?product='.$obj->prodId);
    }
}
else
    $new = $db->runInsertRecord("physical",$arr);
if($new)
{
    echo "successfull";
}


?>