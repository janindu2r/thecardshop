<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');

$catId = 0;
if($_GET && isset($_GET['id']))
    $catId = $_GET['id'];
else
    header('location: /index.php');

$category = new Category();

$catName = $category->getCatName($catId);
$title =   $catName.' | Category' ;  // page title

?>
<!-- **************************** Header Start, Do not touch **************************** -->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>
<!-- *****************************    Add Page Edits Below   **************************** -->

<div style="padding: 3em"> <h2> <?php echo $catName ?> </h2> </div>

        <div class="container">
            <div id="shop-product">
                <div class="item active">
                    <div class="row">
                        <?php
                        $flag = $category->getCatProdList($catId, 0, 4);
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
                        $flag = $category->getCatProdList($catId, 4, 4);
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
                        $flag = $category->getCatProdList($catId, 8, 4);
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

<div style="padding: 3em"> <h2> <?php echo 'End of product list' ?> </h2> </div>


        <!-- *****************************      End of page edits 	 **************************** -->
<?php include('footer.php'); //including the footer?>
<!-- End of page