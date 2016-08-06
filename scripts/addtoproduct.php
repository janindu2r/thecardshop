<?php
/*
 created by  JK & Bmla
 */
$root = $_SERVER['DOCUMENT_ROOT'];
include ($root.'/internal.php');

if($_SESSION) {
    $user = $_SESSION['user'];
    $db = new DbCon();
    $shopId = $user->getRegID();
    if ($_POST) {
        $pName = $_POST['pro_name'];
        $pTag = $_POST['pro_tag'];
        $cID = $_POST['category'];
        $pDesc = $_POST['description'];
        $pPrice = $_POST['pro_price'];
        $sell = $_POST['sel_unit'];
        $variation = $_POST['var'];
        $virtual = $_POST['vir'];
        $iStock = $_POST['stock'];
        $max_img_size = 500000;
        $object = new Product();
        $object = $object->insertValues($shopId, $pName, $pTag, $cID, $pPrice, $pDesc, $variation, $virtual, $sell, $iStock);

        $rel_path = $root . "/content/products/prodthumbnail/";
        $thumb = 0;

        if ($_FILES) {

            if (isset($_FILES['prodimg'])) {
                list($width, $height) = getimagesize($_FILES['prodimg']['tmp_name']);
                if ($_FILES['prodimg']['type'] == 'image/jpeg' && $width == $height && $_FILES['prodimg']['size'] <= $max_img_size) {
                    move_uploaded_file($_FILES['prodimg']['tmp_name'], $rel_path . $object->prodId . '.jpg');
                    $thumb = 1;
                }
            }
        }
        if ($thumb == 0)
            copy($rel_path . "default.jpg", $rel_path . $object->prodId . '.jpg');

        if ($object) {
            header('Location:/viewproduct.php?product=' . $object->prodId);
        } else
            header('Location:/error.php?error=1');
    }
}

?>