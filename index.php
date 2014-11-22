<?php
$title = 'Comercio' ; 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="Blueprint: Blueprint: Google Grid Gallery" />
		<meta name="keywords" content="google getting started gallery, image gallery, image grid, template, masonry" />
		<meta name="author" content="Codrops" />
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
				                    Featured Products</h3>
				            </div>
				            <div class="col-md-3">
				                <!-- Controls -->
				                <div class="controls pull-right hidden-xs">
				                    <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example"
				                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example"
				                            data-slide="next"></a>
				                </div>
				            </div>
				        </div>
				        <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
				            <!-- Wrapper for slides -->
				            <div class="carousel-inner">
				                <div class="item active">
				                    <div class="row">
				                        <div class="col-sm-3">
				                            <div class="col-item">
				                                <div class="photo">
				                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
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
				                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
				                                        <p class="btn-details">
				                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
				                                    </div>
				                                    <div class="clearfix">
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                        <div class="col-sm-3">
				                            <div class="col-item">
				                                <div class="photo">
				                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
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
				                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
				                                        <p class="btn-details">
				                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
				                                    </div>
				                                    <div class="clearfix">
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                        <div class="col-sm-3">
				                            <div class="col-item">
				                                <div class="photo">
				                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
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
				                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
				                                        <p class="btn-details">
				                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
				                                    </div>
				                                    <div class="clearfix">
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                        <div class="col-sm-3">
				                            <div class="col-item">
				                                <div class="photo">
				                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
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
				                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
				                                        <p class="btn-details">
				                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
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
				                        <div class="col-sm-3">
				                            <div class="col-item">
				                                <div class="photo">
				                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
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
				                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
				                                        <p class="btn-details">
				                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
				                                    </div>
				                                    <div class="clearfix">
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                        <div class="col-sm-3">
				                            <div class="col-item">
				                                <div class="photo">
				                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
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
				                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
				                                        <p class="btn-details">
				                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
				                                    </div>
				                                    <div class="clearfix">
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                        <div class="col-sm-3">
				                            <div class="col-item">
				                                <div class="photo">
				                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
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
				                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
				                                        <p class="btn-details">
				                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
				                                    </div>
				                                    <div class="clearfix">
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                        <div class="col-sm-3">
				                            <div class="col-item">
				                                <div class="photo">
				                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
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
				                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
				                                        <p class="btn-details">
				                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
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
				    <div class="row">
				        <div class="row">
				            <div class="col-md-9">
				                <h3>
				                    Carousel Product Cart Slider</h3>
				            </div>
				            <div class="col-md-3">
				                <!-- Controls -->
				                <div class="controls pull-right hidden-xs">
				                    <a class="left fa fa-chevron-left btn btn-primary" href="#carousel-example-generic"
				                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-primary" href="#carousel-example-generic"
				                            data-slide="next"></a>
				                </div>
				            </div>
				        </div>
				        <div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
				            <!-- Wrapper for slides -->
				            <div class="carousel-inner">
				                <div class="item active">
				                    <div class="row">
				                        <div class="col-sm-4">
				                            <div class="col-item">
				                                <div class="photo">
				                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
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
				                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
				                                        <p class="btn-details">
				                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
				                                    </div>
				                                    <div class="clearfix">
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                        <div class="col-sm-4">
				                            <div class="col-item">
				                                <div class="photo">
				                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
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
				                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
				                                        <p class="btn-details">
				                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
				                                    </div>
				                                    <div class="clearfix">
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                        <div class="col-sm-4">
				                            <div class="col-item">
				                                <div class="photo">
				                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
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
				                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
				                                        <p class="btn-details">
				                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
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
				                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
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
				                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
				                                        <p class="btn-details">
				                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
				                                    </div>
				                                    <div class="clearfix">
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                        <div class="col-sm-4">
				                            <div class="col-item">
				                                <div class="photo">
				                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
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
				                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
				                                        <p class="btn-details">
				                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
				                                    </div>
				                                    <div class="clearfix">
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                        <div class="col-sm-4">
				                            <div class="col-item">
				                                <div class="photo">
				                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
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
				                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
				                                        <p class="btn-details">
				                                            <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p>
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

								</div>
							</div>
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