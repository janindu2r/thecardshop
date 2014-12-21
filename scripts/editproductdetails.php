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

$arr['product_title'] = $_POST["pro_name"];
$arr['price']= $_POST["pro_price"];
$arr['product_tag'] = $_POST["pro_tag"];
$arr['category_id'] = $_POST["category"];
$arr['product_desc'] = $_POST["description"];
$arr['selling_unit'] = $_POST["sel_unit"];
$arr['initial_stck'] = $_POST["stock"];
$arr['current_stck'] = $_POST["stock"];

if (!empty($_POST['add']))
{

    $arry;
    if($obj->proName != $arr['product_title'])
    {
        $arr['product_title'] = $db->escapeString($_POST["pro_name"]);
        $arry['product_title'] = $arr['product_title'];
    }
    if($obj->proPrice != $arr['price'])
    {
        $arr['price']= $db->escapeString($_POST["pro_price"]);
        $arry['price'] = $arr['price'];
    }
    if($obj->proTag != $arr['product_tag'])
    {
        $arr['product_tag'] = $db->escapeString($_POST["pro_tag"]);
        $arry['product_tag'] = $arr['product_tag'];
    }
    if($obj->catId != $arr['category_id'])
    {
        $arr['category_id'] = $db->escapeString($_POST["category"]);
        $arry['category_id'] = $arr['category_id'];
    }
    if($obj->description != $arr['product_desc'])
    {
        $arr['product_desc'] = $db->escapeString($_POST["description"]);
        $arry['product_desc'] = $arr['product_desc'];
    }
    if($obj->sellUnit != $arr['selling_unit'])
    {
        $arr['selling_unit'] = $db->escapeString($_POST["sel_unit"]);
        $arry['selling_unit'] = $arr['selling_unit'];
    }
    if($obj->inStock != $arr['initial_stck'])
    {
        $arr['initial_stck'] = $db->escapeString($_POST["stock"]);
        $arry['initial_stck'] =$arr['initial_stck'];
    }
    if($obj->cuStock!= $arr['current_stck'])
    {
        $arr['current_stck'] = $db->escapeString($_POST["stock"]);
        $arry['current_stck'] = $arr['current_stck'];
    }

    $pro = $obj->getProductId($obj->proName);

    $clause = "product_id = $pro";

    $res = $db->runUpdateRecord('products',$arry, $clause);

}