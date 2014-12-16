<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/16/2014
 * Time: 11:09 PM
 */
include ('../class/DbCon.php');
include(' ../class/Product.php');
$path = $_SERVER['DOCUMENT_ROOT'];
include ($path.'/internal.php');

$db = new DbCon();
$obj = new Product();
$arr['product_title'] = $db->escapeString($_POST["pro_name"]);
$arr['price']= $db->escapeString($_POST["pro_price"]);
$arr['product_tag'] = $db->escapeString($_POST["pro_tag"]);
$arr['category_id'] = $db->escapeString($_POST["category"]);
$arr['product_desc'] = $db->escapeString($_POST["description"]);
$arr['selling_unit'] = $db->escapeString($_POST["sel_unit"]);
$arr['initial_stck'] = $db->escapeString($_POST["stock"]);
$arr['current_stck'] = $db->escapeString($_POST["stock"]);

if (!empty($_POST['add']))
{

    $arry;
    if($obj->proName != $arr['product_title'])
    {
        $arry['product_title'] = $arr['product_title'];
    }
    if($obj->proPrice != $arr['price'])
    {
        $arry['price'] = $arr['price'];
    }
    if($obj->proTag != $arr['product_tag'])
    {
        $arry['product_tag'] = $arr['product_tag'];
    }
    if($obj->catId != $arr['category_id'])
    {
        $arry['category_id'] = $arr['category_id'];
    }
    if($obj->description != $arr['product_desc'])
    {
        $arry['product_desc'] = $arr['product_desc'];
    }
    if($obj->sellUnit != $arr['selling_unit'])
    {
        $arry['selling_unit'] = $arr['selling_unit'];
    }
    if($obj->inStock != $arr['initial_stck'])
    {
        $arry['initial_stck'] =$arr['initial_stck'];
    }
    if($obj->cuStock!= $arr['current_stck'])
    {
        $arry['current_stck'] = $arr['current_stck'];
    }

    $pro = $obj->getProductId($obj->proName);

    $clause = "product_id = $pro";

    $res = $db->runUpdateRecord('products',$arry, $clause);

}