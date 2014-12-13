<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');

$title = '' ;  // page title


?>
<!-- **************************** Header Start, Do not touch **************************** -->
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/css/shop.styles.css">
        <?php include('header.php'); ?>
<!-- *****************************    Add Page Edits Below   **************************** --> 
<div class="#">
	<div id="carousel" class="carousel slide" data-ride="carousel" data-interval="3000">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel" data-slide-to="1"></li>
<!-- 			    <li data-target="#carousel" data-slide-to="2"></li> -->
			  </ol>

			 
			<!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img src="img/shopSlider/slider-1.jpeg" alt="...">
			      <div class="carousel-caption">
			       <h2>Welcom to our shop</h2>
			       <p>Lorem ipsum desc</p>
			      </div>
			    </div>
			    <div class="item">
			      <img src="img/shopSlider/slider-3.jpeg" alt="...">
			      <div class="carousel-caption">
			      	<h4>Shop Description</h4>
			       <p>Quisque hendrerit tellus sit amet gravida pretium. Pellentesque id ex ullamcorper, elementum tellus vitae, ultricies nisi. Praesent vitae eros eu ligula mattis faucibus. Sed purus magna, interdum non interdum et, pretium vitae erat. Sed tempus porta tellus ac posuere. Donec lacinia accumsan lorem lobortis vulputate. Phasellus ullamcorper ligula ut lorem condimentum malesuada.</p>
			      </div>
			    </div>
			    
			  </div>

			  <!-- Controls -->
<!-- 			  <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a> -->
			  <div class="clearfix"></div>
			</div>
		
<div id=""><img id="profile_img" src='/img/ShopSlider/identicon.png' class=''/></div>
		<div id="info-box">

		<div id="info-content">
<!-- 		<div style="float:right">
			<div><i class="fa fa-camera"></i></div>
		</div> -->
			<div id="info-photos">
				<div>Products</div>
				<div>17</div> 
			</div>
			<div id="info-friends">
				<div>Sales</div>
				<div>270</div>
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