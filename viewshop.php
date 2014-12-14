<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');

if(!$user->shop) {
    header('Location:/index.php');
}

$shop = new Seller();
if($_GET){
    $shop->shopId  = $_GET['shop'];
}
$shop->initiate();

$title =  $shop->shopName.' | Comercio' ;  // page title

$categories = '';
foreach($shop->categories as $key=> $val)
    $categories .= ', '.$val;

$categories = substr($categories,1);
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
            <div class="col-sm-3">
                <div class="col-item">
                    <div class="photo">
                        <img src="http://www.techlicious.com/images/phones/samsung-galaxy-s5-blue-front-and-back-350px.jpg" class="img-responsive" alt="a" />
                    </div>
                    <div class="info">
                        <div class="row">
                            <div class="price col-md-6">
                                <h5>
                                    Sample Product</h5>
                                <h5 class="price-text-color">
                                    $199.99</h5>
                            </div>
                            <div class="rating hidden-sm col-md-6">
                                <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="separator clear-left">
                            <p class="btn-add">
                                <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>
                            <p class="btn-details">
                                <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> More details</a>

                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="col-item">
                    <div class="photo">
                        <img src="http://www.rayashop.com/Images/Products/S7582-Black-Mti-300.png" class="img-responsive" alt="a" />
                    </div>
                    <div class="info">
                        <div class="row">
                            <div class="price col-md-6">
                                <h5>
                                    Product Example</h5>
                                <h5 class="price-text-color">
                                    $249.99</h5>
                            </div>
                            <div class="rating hidden-sm col-md-6">
                            </div>
                        </div>
                        <div class="separator clear-left">
                            <p class="btn-add">
                                <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>
                            <p class="btn-details">
                                <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> More details</a>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="col-item">
                    <div class="photo">
                        <img src="http://goo.gl/h8o5mB" class="img-responsive" alt="a" />
                    </div>
                    <div class="info">
                        <div class="row">
                            <div class="price col-md-6">
                                <h5>
                                    Next Sample Product</h5>
                                <h5 class="price-text-color">
                                    $149.99</h5>
                            </div>
                            <div class="rating hidden-sm col-md-6">
                                <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="separator clear-left">
                            <p class="btn-add">
                                <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>
                            <p class="btn-details">
                                <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> More details</a>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="col-item">
                    <div class="photo">
                        <img src="http://images.sodahead.com/polls/002308443/1032261492_lenovo_ideacentre_b500_08871fu_answer_2_xlarge.png" class="img-responsive" alt="a" />
                    </div>
                    <div class="info">
                        <div class="row">
                            <div class="price col-md-6">
                                <h5>
                                    Sample Product</h5>
                                <h5 class="price-text-color">
                                    $199.99</h5>
                            </div>
                            <div class="rating hidden-sm col-md-6">
                                <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="separator clear-left">
                            <p class="btn-add">
                                <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>
                            <p class="btn-details">
                                <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> More details</a>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>		    <div id="shop-product">
    <div class="item active">
        <div class="row">
            <div class="col-sm-3">
                <div class="col-item">
                    <div class="photo">
                        <img src="http://www.techlicious.com/images/phones/samsung-galaxy-s5-blue-front-and-back-350px.jpg" class="img-responsive" alt="a" />
                    </div>
                    <div class="info">
                        <div class="row">
                            <div class="price col-md-6">
                                <h5>
                                    Sample Product</h5>
                                <h5 class="price-text-color">
                                    $199.99</h5>
                            </div>
                            <div class="rating hidden-sm col-md-6">
                                <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="separator clear-left">
                            <p class="btn-add">
                                <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>
                            <p class="btn-details">
                                <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> More details</a>

                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="col-item">
                    <div class="photo">
                        <img src="http://www.rayashop.com/Images/Products/S7582-Black-Mti-300.png" class="img-responsive" alt="a" />
                    </div>
                    <div class="info">
                        <div class="row">
                            <div class="price col-md-6">
                                <h5>
                                    Product Example</h5>
                                <h5 class="price-text-color">
                                    $249.99</h5>
                            </div>
                            <div class="rating hidden-sm col-md-6">
                            </div>
                        </div>
                        <div class="separator clear-left">
                            <p class="btn-add">
                                <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>
                            <p class="btn-details">
                                <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> More details</a>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="col-item">
                    <div class="photo">
                        <img src="http://goo.gl/h8o5mB" class="img-responsive" alt="a" />
                    </div>
                    <div class="info">
                        <div class="row">
                            <div class="price col-md-6">
                                <h5>
                                    Next Sample Product</h5>
                                <h5 class="price-text-color">
                                    $149.99</h5>
                            </div>
                            <div class="rating hidden-sm col-md-6">
                                <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="separator clear-left">
                            <p class="btn-add">
                                <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>
                            <p class="btn-details">
                                <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> More details</a>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="col-item">
                    <div class="photo">
                        <img src="http://images.sodahead.com/polls/002308443/1032261492_lenovo_ideacentre_b500_08871fu_answer_2_xlarge.png" class="img-responsive" alt="a" />
                    </div>
                    <div class="info">
                        <div class="row">
                            <div class="price col-md-6">
                                <h5>
                                    Sample Product</h5>
                                <h5 class="price-text-color">
                                    $199.99</h5>
                            </div>
                            <div class="rating hidden-sm col-md-6">
                                <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="separator clear-left">
                            <p class="btn-add">
                                <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>
                            <p class="btn-details">
                                <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> More details</a>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- *****************************      End of page edits 	 **************************** -->
<?php include('footer.php'); //including the footer?>
<!-- End of page
