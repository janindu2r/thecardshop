<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');

$searchstr = null;
if($_GET && isset($_GET['search']))
    $searchstr = $_GET['search'];
else
    header('location: /index.php');

$search = new Listing();

$title = $searchstr. ' | Comercio'  ;  // page title


?>
<!---------------------------------------- Header Start, Do not touch ------------------------------------------->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>
<!---------------------------------------- Add Page Edits Below ------------------------------------------------->

        <div style="padding: 3em"> <h2> <?php echo $searchstr ?> </h2> </div>

        <div class="container">
            <div id="shop-product">
                <div class="item active">
                    <div class="row">
                        <?php
                        $flag =  $search->getProdSearch($searchstr, 0,4);
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
                        $flag =  $search->getProdSearch($searchstr, 4,4);
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
                        $flag =  $search->getProdSearch($searchstr,8,4);
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

        <br><br>

<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->