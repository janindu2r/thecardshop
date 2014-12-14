<?php
/*
	Create shop script
*/
$root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/internal.php');

if($_SESSION) {

    $db = new DbCon();
    if ($_POST) {

        $shopDetails['shop_name'] = $db->escapeString($_POST['sname']);
        $shopDetails['shop_desc'] = $db->escapeString($_POST['descr']);
        $shopDetails['shop_base_loc'] = $db->escapeString($_POST['city']);

        if (isset($_POST['money']))
            $shopDetails['mony_back_gurantee'] = 1;
        else
            $shopDetails['mony_back_gurantee'] = 0;

        $shopDetails['paypal_acc_email'] = $db->escapeString($_POST['paypalemail']);
        if($_POST['paypaltoken'])
            $shopDetails['paypal_id_token'] = $db->escapeString($_POST['paypaltoken']);


        $sell = new Seller();

        $logo = 0;
        $slider[0] = 0;
        $slider[1] = 0;

        $max_logo_size = 500000;

        $sellerAdded = $sell->insertSeller($shopDetails, $_POST['categories']);

        if ($sellerAdded) {

            if ($_FILES) {
                if (isset($_FILES['shoplogo'])) {
                    list($width, $height) = getimagesize($_FILES['shoplogo']['tmp_name']);
                    if ($_FILES['shoplogo']['type'] == 'image/jpeg' && $width == $height && $_FILES['shoplogo']['size'] <= $max_logo_size) {
                        move_uploaded_file($_FILES['shoplogo']['tmp_name'], $root. $sell->logoImg);
                        $logo = 1;
                    }
                }

                if ($_FILES['banner']) {
                    $galleryarr['shop_id'] = $db->escapeString($sell->shopId);
                    $max_banner_size = $max_logo_size * 100000;
                    foreach($_FILES['banner']['name'] as $num => $name){
                        if ($_FILES['banner']['type'][$num] == 'image/jpeg') {
                            list($width, $height) = getimagesize($_FILES['banner']['tmp_name'][$num]);
                            if ($width == 1400 && $height == 300 && $_FILES['shoplogo']['size'] <= $max_banner_size) {
                                move_uploaded_file($_FILES['banner']['tmp_name'][$num], $root . $sell->comPath . $num . ".jpg");
                                $galleryarr['image'] = $db->escapeString($num);
                                $db->runInsertRecord('shop_gallery', $galleryarr);
                                $slider[$num] = 1;
                            }
                        }
                    }
                }

            }

            if ($logo == 0)
                copy($root."/content/shop/logo/default.jpg",$root. $sell->logoImg);
            $galleryarr['shop_id'] = $db->escapeString($sell->shopId);
            if ($slider[0] == 0) {
                copy($root . "/content/shop/slider/default.jpg", $root . $sell->comPath . '0' . ".jpg");
                $galleryarr['image'] = '0';
                $db->runInsertRecord('shop_gallery', $galleryarr);
            }
            if ($slider[1] == 0) {
                copy($root . "/content/shop/slider/default.jpg", $root . $sell->comPath . '1' . ".jpg");
                $galleryarr['image'] = '1';
                $db->runInsertRecord('shop_gallery', $galleryarr);
            }

        }

        header('Location: /admin.php?success='.intval($sellerAdded).'&logo='.$logo.'&slider_a='.$slider[0].'&slider_b='.$slider[1]);

    }
}

?>