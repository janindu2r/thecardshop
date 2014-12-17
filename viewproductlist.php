<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');

if(isset($_GET['shop']))
{
    $shop = new Seller($_GET['shop']);
    if(!$shop->initiate())
        header('Location:/index.php');
}
else if($user->shop)
{
    $shop = new Seller($user->getRegID());
    $shop->initiate();
}
else
    header('Location:/index.php');

$title =  $shop->shopName.' Product List | Comercio' ;  // page title


?>
<!---------------------------------------- Header Start, Do not touch ------------------------------------------->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>
<!---------------------------------------- Add Page Edits Below ------------------------------------------------->

        <div style="padding: 3em"> <h2> Shop : <?php echo $shop->shopName ?> </h2> </div>

        <div class="container">
            <div id="shop-product">
                <div class="item active">
                    <div class="row">
                        <?php
                        $flag =  $shop->getProductList(0,4);
                        if($flag) {
                            foreach ($flag as $new) {
                                $obj = new Product();
                                if ($new['variations'] == 1)
                                    $obj = new Variation();
                                echo $obj->getSmallBoxItem($new['product_id']);
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div id="shop-product">
                <div class="item active">
                    <div class="row">
                        <?php
                        $flag =  $shop->getProductList(4,4);
                        if($flag) {
                            foreach ($flag as $new) {
                                $obj = new Product();
                                if ($new['variations'] == 1)
                                    $obj = new Variation();
                                echo $obj->getSmallBoxItem($new['product_id']);
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div id="shop-product">
                <div class="item active">
                    <div class="row">
                        <?php
                        $flag =  $shop->getProductList(8,4);
                        if($flag) {
                            foreach ($flag as $new) {
                                $obj = new Product();
                                if ($new['variations'] == 1)
                                    $obj = new Variation();
                                echo $obj->getSmallBoxItem($new['product_id']);
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div style="padding: 3em"> <h2> <?php echo '' ?> </h2> </div>

<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->