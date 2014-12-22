<?php
/*
	Create shop script
*/
$root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/internal.php');

$user = $_SESSION['user'];

if($_SESSION) {

    $db = new DbCon();

    $owner = new Seller($user->getRegID());
    $owner->initiate();
    $owner->getCategories();

    $res = 0;
    $shopDetails = null;

    if ($_POST) {

        if (!empty($_POST['submitShopinfo'])) {
            if ($owner->shopName != $_POST['sname'])
                $shopDetails['ship_name'] = $db->escapeString($_POST['sname']);
            if ($owner->shopDesc != $_POST['descr'])
                $shopDetails['shop_desc'] = $db->escapeString($_POST['descr']);
            if ($owner->shopLoc != $_POST['city'])
                $shopDetails['shop_base_loc'] = $db->escapeString($_POST['city']);

            if ($shopDetails !=null)
                $res = $db->runUpdateRecord('shops', $shopDetails, 'shop_id = ' . $owner->shopId);

            if($_POST['categories'] != null)
                $res = $owner->insertCategories($_POST['categories']);

        }

        if (!empty($_POST['submitPaypal'])) {
            if ($owner->paypalEmail != $_POST['paypalemail'])
                $shopDetails['paypal_acc_email'] = $db->escapeString($_POST['paypalemail']);
            $b =  $db->escapeString($_POST['paypaltoken']);
            if(!$b)
                $b = 'NULL';
            if ($owner->getToken() != $b)
                $shopDetails['paypal_id_token'] = $b;

            if ($shopDetails != null)
                $res = $db->runUpdateRecord('shops', $shopDetails, 'shop_id = ' . $owner->shopId);

            echo $res;
        }


        if (!empty($_POST['submitLayout'])) {

            $logo = 0;
            $slider[0] = 0;
            $slider[1] = 0;
            $max_logo_size = 500000;

            if ($_FILES) {
                if (isset($_FILES['shoplogo'])) {
                    list($width, $height) = getimagesize($_FILES['shoplogo']['tmp_name']);
                    if ($_FILES['shoplogo']['type'] == 'image/jpeg' && $width == $height && $_FILES['shoplogo']['size'] <= $max_logo_size) {
                        move_uploaded_file($_FILES['shoplogo']['tmp_name'], $root . $sell->logoImg);
                        $logo = 1;
                    }
                }

                if ($_FILES['banner']) {
                    $galleryarr['shop_id'] = $db->escapeString($sell->shopId);
                    $max_banner_size = $max_logo_size * 100000;
                    foreach ($_FILES['banner']['name'] as $num => $name) {
                        if ($_FILES['banner']['type'][$num] == 'image/jpeg') {
                            list($width, $height) = getimagesize($_FILES['banner']['tmp_name'][$num]);
                            if ($width == 1400 && $height == 300 && $_FILES['shoplogo']['size'] <= $max_banner_size) {
                                move_uploaded_file($_FILES['banner']['tmp_name'][$num], $root . $sell->comPath . $num . ".jpg");
                                $slider[$num] = 1;
                            }
                        }
                    }
                }

            }

            if ($logo == 0)
                copy($root . "/content/shop/logo/default.jpg", $root . $sell->logoImg);
            if ($slider[0] == 0)
                copy($root . "/content/shop/slider/default.jpg", $root . $sell->comPath . '0' . ".jpg");
            if ($slider[1] == 0)
                copy($root . "/content/shop/slider/default.jpg", $root . $sell->comPath . '1' . ".jpg");

            $res = 1;

        }
    }

    header('location: /admin.php?edited='.$res);

}

?>