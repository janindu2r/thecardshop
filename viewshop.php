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

$title =  $shop->shopName.' | Comercio' ;  // page title

$categories = '';
foreach($shop->categories as $key=> $val)
    $categories .= ', '.$val;

$categories = substr($categories,1);

//calling method getshoproducts

?>
<!-- **************************** Header Start, Do not touch **************************** -->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/shop.styles.css">
<?php include('header.php'); ?>
<!-- *****************************    Add Page Edits Below   **************************** -->
<div class="#">
    <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="5000">
        <!-- Indicators
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <!-- 			    <li data-target="#carousel" data-slide-to="2"></li>
        </ol> -->


        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?php echo $shop->shopSlider[0] ?>" alt="...">
                <div class="carousel-caption" style="background-color: rgba(0,0,0,0.8); box-shadow: 0 0 2em 1em rgba(0,0,0,0.8); border-radius: 1em ">
                    <h2>Welcome to <?php echo $shop->shopName ?>   </h2>
                    <p><?php echo $shop->shopDesc ?></p>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo $shop->shopSlider[1] ?>" alt="...">
                <div class="carousel-caption" style="background-color: rgba(0,0,0,0.8); box-shadow: 0 0 2em 1em rgba(0,0,0,0.8);  border-radius: 1em ">
                    <h2> <?php echo $shop->shopName ?> </h2>
                    <h4>Our Product Categories</h4>
                    <p><?php echo $categories;?></p>
                    <h4>Location</h4>
                    <p><?php echo $shop->shopLoc;?></p>
                    <?php if($shop->moneyback) echo '<h5>We offer money back gurantee</h5>' ?>
                </div>
            </div>

        </div>

        <!-- Controls -->
       		  <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
        <div class="clearfix"></div>
    </div>

    <div id=""><img id="profile_img" src="<?php echo $shop->logoImg ?>" class=''/></div>
    <div id="info-box">

        <div id="info-content">
            <!-- 		<div style="float:right">
                        <div><i class="fa fa-camera"></i></div>
                    </div> -->
            <div id="info-photos">
                <div>Products</div>
                <div><?php echo $shop->productCount() ?></div>
            </div>
            <div id="info-friends">
                <div>Sales</div>
                <div><?php echo $shop->salesCount() ?></div>
            </div>
        </div>
        <!-- <div id="cover_container">
            <div class="image">

                  <h2>A Movie in the ParkKung Fu Panda</h2>
            </div>
        </div> -->
    </div>
</div>
<div class="container">
<div id="shop-product">
    <div class="item active">
        <div class="row">
            <?php
            $flag = $shop->getShopProducts(0,4);
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
</div>		    <div id="shop-product">
    <div class="item active">
        <div class="row">
            <?php
            $flag = $shop->getShopProducts(4,4);
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
<!-- *****************************      End of page edits 	 **************************** -->
<?php include('footer.php'); //including the footer?>
<!-- End of page
