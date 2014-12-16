<?php
include('overhead.php');
$title = 'Comercio' ; //define page title

$list = new Listing();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="Comercio, buy quality items, sell your items" />
		<meta name="keywords" content="comercio, e-commerce, buy, sell" />
		<meta name="author" content="EliteCoders" />
        <!-- include header -->
        <?php include('header.php');?>
	
    <main><!-- carousel-for-new-deals-and-adverts -->
		<div id="carousel" class="carousel slide" data-ride="carousel" data-interval="3000">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel" data-slide-to="1"></li>
			    <li data-target="#carousel" data-slide-to="2"></li>
			  </ol>

			 
			<!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img src="img/first.jpg" alt="...">
			      <div class="carousel-caption">
			        
			      </div>
			    </div>
			    <div class="item">
			      <img src="img/second.jpg" alt="...">
			      <div class="carousel-caption">
			       
			      </div>
			    </div>
			    <div class="item">
			      <img src="img/third.jpg" alt="...">
			      <div class="carousel-caption">
			        
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
			<!-- featured content *************************************************************-->
			<div class="features">
				<div class="container">
<!-- 					<div class="views">
						<strong>Change Views</strong>
				        <div class="btn-group">
				            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
				            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th"></span>Grid</a>
				        </div>
					</div> -->
				</div><!-- end of views-conatiner -->
				<div class="products">
				<div class="container">
				    <div class="row">
				        <div class="row">
				            <div class="col-md-9">
				                <h3>
				                    Top Selling Products</h3>
				            </div>
				            <div class="col-md-3">
				                <!-- Controls -->
				                <div class="controls pull-right hidden-xs">
				                    <a class="left fa fa-chevron-left btn btn-default" href="#carousel-example"
				                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-default" href="#carousel-example"
				                            data-slide="next"></a>
				                </div>
				            </div>
				        </div>
				        <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
				            <!-- Wrapper for slides -->
				            <div class="carousel-inner">
				                <div class="item active">
				                    <div class="row">
										<?php
										$prd = $list->topSellProducts(0,4);
										if($prd) {
											foreach ($prd as $row) {
												$viewProd = new Product();
												if ($row['variation']) {
													$viewProd = new Variation();
												}
												echo $viewProd->getSmallBoxItem($row['product_id']);
											}
										}
										?>
				                    </div>
				                </div>
				                <div class="item">
				                    <div class="row">
										<?php
										$prd = $list->topSellProducts(4,4);
										if($prd) {
											foreach ($prd as $row) {
												$viewProd = new Product();
												if ($row['variation']) {
													$viewProd = new Variation();
												}
												echo $viewProd->getSmallBoxItem($row['product_id']);
											}
										}
										?>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				    <div class="row">
				        <div class="row">
				            <div class="col-md-9">
				                <h3>
				                    Carousel Product Cart Slider</h3>
				            </div>
				            <div class="col-md-3">
				                <!-- Controls -->
				                <div class="controls pull-right hidden-xs">
				                    <a class="left fa fa-chevron-left btn btn-default" href="#carousel-example-generic"
				                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-default" href="#carousel-example-generic"
				                            data-slide="next"></a>
				                </div>
				            </div>
				        </div>
				        <div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
				            <!-- Wrapper for slides -->
				            <div class="carousel-inner">
				                <div class="item active">
				                    <div class="row">
										<?php
										$viewProd = new Product();
										echo $viewProd->getLargeBoxItem(1000000);
										?>

										<!-- Variation Item -->
										<?php
										$varProd = new Variation();
										echo $varProd->getLargeBoxItem(1000001);
										?>

				                        <div class="col-sm-4">
				                            <div class="col-item">
				                                <div class="photo">
				                                    <img src="http://vatenco.com/pictures/TOOL_SET.jpg" class="img-responsive" alt="a" />
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
				                    </div>
				                </div>
				                <div class="item">
				                    <div class="row">
				                        <div class="col-sm-4">
				                            <div class="col-item">
				                                <div class="photo">
				                                    <img src="http://pimg.tradeindia.com/01052945/b/1/Swiss-Knife-Tools-Handyman-.jpg" class="img-responsive" alt="a" />
				                                </div>
				                                <div class="info">
				                                    <div class="row">
				                                        <div class="price col-md-6">
				                                            <h5>
				                                                Product with Variants</h5>
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
				                        <div class="col-sm-4">
				                            <div class="col-item">
				                                <div class="photo">
				                                    <img src="http://www.bagabam.com/product_images/otis-elite-field-bag-iid21198.jpg" class="img-responsive" alt="a" />
				                                </div>
				                                <div class="info">
				                                    <div class="row">
				                                        <div class="price col-md-6">
				                                            <h5>
				                                                Grouped Product</h5>
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
				                        <div class="col-sm-4">
				                            <div class="col-item">
				                                <div class="photo">
				                                    <img src="http://chavezcycling.com/wp-content/uploads/2009/06/saddle-bag.jpg" class="img-responsive" alt="a" />
				                                </div>
				                                <div class="info">
				                                    <div class="row">
				                                        <div class="price col-md-6">
				                                            <h5>
				                                                Product with Variants</h5>
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
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>

			</div> <!-- end of products -->
	</div><!--  end of features -->


	</main>

<!-- end of middle content -->
<script>
    $('.carousel').carousel({
        interval: 8000
    })
</script>
<script>
$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
</script>
<!-- include footer -->

<?php include('footer.php');?>