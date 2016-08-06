<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/16/2014
 * Time: 11:09 PM
 */

$path = $_SERVER['DOCUMENT_ROOT'];
include ($path.'/internal.php');

$db = new DbCon();
$obj = new Product();
$obj = $obj->returnProduct($_POST["prod_id"]);

$arr = null;

$res = 0;
if (!empty($_POST['add']))
{
    if($obj->proName != $_POST["pro_name"])
        $arr['product_title'] = $db->escapeString($_POST["pro_name"]);
    if($obj->proPrice != $_POST["pro_price"])
        $arr['price']= $db->escapeString($_POST["pro_price"]);
    if($obj->proTag != $_POST["pro_tag"])
        $arr['product_tag'] = $db->escapeString($_POST["pro_tag"]);
    if($obj->catId != $_POST["category"])
        $arr['category_id'] = $db->escapeString($_POST["category"]);
    if($obj->description != $_POST["description"])
        $arr['product_desc'] = $db->escapeString($_POST["description"]);
    if($obj->sellUnit != $_POST["sel_unit"])
        $arr['selling_unit'] = $db->escapeString($_POST["sel_unit"]);
    if($obj->inStock != $_POST["stock"])
        $arr['initial_stck'] = $db->escapeString($_POST["stock"]);
    if($obj->cuStock!= $_POST["stock"])
        $arr['current_stck'] = $db->escapeString($_POST["stock"]);

    $clause = "product_id = ". $obj->prodId;

    if($arr != null)
        $res = $db->runUpdateRecord('products',$arr, $clause);

    $rel_path = $path . "/content/products/prodthumbnail/";
    $thumb = 0;
    $max_img_size = 500000;

    if($_FILES)
    {
        if (isset($_FILES['prodimg'])) {
            list($width, $height) = getimagesize($_FILES['prodimg']['tmp_name']);
            if ($_FILES['prodimg']['type'] == 'image/jpeg' && $width == $height && $_FILES['prodimg']['size'] <= $max_img_size) {
                move_uploaded_file($_FILES['prodimg']['tmp_name'], $rel_path . $obj->prodId . '.jpg');
                $thumb = 1;
            }
        }
    }
    if ($thumb == 0)
        copy($rel_path . "default.jpg", $rel_path . $obj->prodId . '.jpg');

}

if($res || $thumb)
    header('location: /viewproduct.php?product='.$obj->prodId);
else
    header('location: /customizeproduct.php?product='.$obj->prodId.'&error=1');
