<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');

$prodID = 1000001;

if($_GET){
    $prodID  = $_GET['product'];
}

$viewProd = new Product();
$viewProd = $viewProd->returnProduct($prodID);
if(!$viewProd->virtual)
{
    $tmp = new Physical();
    $viewProd = $tmp->selectPhysicalProduct($viewProd->prodId);
    if($viewProd->variation){
         $viewProd->getAllVariations($viewProd->prodId);
    }
}
$_SESSION['product'] = $viewProd->prodId;

$viewfrom = 'Comercio';  // Or Shop Name
$title = $viewProd->proName. ' | '. $viewfrom ;  // page title

?>
<!---------------------------------------- Header Start, Do not touch ------------------------------------------->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>
<!---------------------------------------- Add Page Edits Below ------------------------------------------------->    

<div class="wrapper container">
	<div class="content-wrapper">	
		<div class="row col-md-12 col-lg-12">
			<div class="">
				
				<div class="col-md-6 carousel-bounding-box" id="slider"><!-- product slider, carousel -->

					<div class="product service-image-left">
							<img id="item-display" src="/content/products/prodthumbnail/<?php echo $viewProd->prodId ?>.jpg" alt="">
					</div>
					
					<!-- <div class="col-sm-2 col-md-2 pull-left" id="service1-items">
						<center>
							<a id="item-1" class="service1-item">
								<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
							</a>
							<a id="item-2" class="service1-item">
								<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
							</a>
							<a id="item-3" class="service1-item">
								<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
							</a>
						</center>
					</div> -->
				</div>

				<div class="col-md-6">
					<div class="product-title"><?php echo  $viewProd->proName ; ?></div>
					<div class="product-desc"><?php echo $viewProd->proTag ; ?> </div>
					<div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
					<hr>
                    <p><?php echo $viewProd->description ?></p>
                    <hr>
					<div class="product-price">$ <?php echo $viewProd->proPrice ?></div>

                    <div>
                            <?php   if($viewProd->variation) {
                                echo '<h4>Variations</h4><table>';
                                foreach($viewProd->varIdNames as $key => $val)
                                {
                                    echo '<tr><td>'.$val.'</td><td>';
                                    echo '<select class="prd-variations" id="'.$key.'">';
                                    foreach($viewProd->varNameValues[$val] as $varVl)
                                    {
                                        echo '<option value="'. $varVl. '">'. $varVl .'</option>';
                                    }
                                    echo  '</select></td></tr>';
                                }
                                echo '</table>';   }   ?>
                    </div>

					<div class="product-stock">
                        <?php if($viewProd->cuStock) { ?>
                        In Stock &nbsp <span> <?php echo $viewProd->cuStock.'/'.$viewProd->inStock ; ?> </span>
                        <?php }
                        else
                            echo 'Out of stock' ;
                        ?>
                    </div>
					<hr>
                    <?php if ($logged == 1 &&  $viewProd->shopId != $user->getRegID()) {
                        if($viewProd->cuStock) { ?>
                            Quantity : <input type="number" id="cart-qty" value="1" min="1" size="20" max="<?php echo $viewProd->cuStock ?>"> <br>
                                <div id="cart-success-message-id"><br></div>
                                <hr>
                                <div class="btn-group cart">
                            <button type="button" class="btn btn-success" id="additemtocart">
                                Add to cart
                            </button>
                                </div>
                    <?php } ?>
                    <div class="btn-group wishlist">
                        <button type="button" class="btn btn-danger">
                            Save Item
                        </button>
                    </div>
                    <?php } ?>
                    <?php if ($logged == 1 &&  $viewProd->shopId == $user->getRegID()) { ?>
                    <div class="btn-group cart">
                                <button type="button" class="btn btn-success">
                                    Edit Product
                                </button>
                    </div>
                    <?php } ?>
                </div> <!--/.end of product slider -->
			</div>
		</div><!-- end of row col-md-12 col-lg-12 -->

<!-- product description, shipment details, customer reviews -->
			<div class="container-fluid">		
				<div class="col-md-12 product-info">
					<ul id="myTab" class="nav nav-tabs nav_tabs">
						
						<li class="active"><a href="#service-one" data-toggle="tab">DESCRIPTION</a></li>
						<li><a href="#service-two" data-toggle="tab">PRODUCT INFO</a></li>
						<li><a href="#service-three" data-toggle="tab">REVIEWS</a></li>
						
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active" id="service-one">
						 
							<section class="container product-info">
                                <?php if(!$viewProd->virtual) {  ?>
                				<h3> Dimensions </h3>
                <!-- condition check needed for each of these to see if the value is null. only echo if not -->
                                        Width : <?php echo $viewProd->width ?> <br>
                                        Height : <?php echo $viewProd->height ?> <br>
                                        Length : <?php echo $viewProd->length ?> <br>
                                        Weight: <?php echo $viewProd->weight ?><br>
            			        <?php } ?>
							</section>
										  
						</div>
					<div class="tab-pane fade" id="service-two">
						
						<section class="container">
								
						</section>
						
					</div><!--  /.END OF tab-pane fade id=service-two -->
					<div class="tab-pane fade" id="service-three">
                    <!-- <div class="row" style="margin-top:10px;">
                    <div class="well well-sm">
						<div class="row" id="post-review-box" style=";">
                            <div class="col-md-12">
                                <form accept-charset="UTF-8" action="" method="post">
                                    
                                    <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5"></textarea>
                    
                                    <div class="text-right">
                                        <div class="stars starrr" data-rating="0"></div>
                                        <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                        <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                                        <button class="btn btn-success media-body" style="margin-top:5px;" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div> -->
                    
                    <!--Add Comments Here-->
                                        <?php include('comments.php');
                                        ?>
                    
					</div><!--  /.END **OF tab-pane fade id=service-three -->
					
					</div><!-- /.myTabContent -->
					<hr>
				</div><!--  /.END OF col-md-12 product-info -->
			</div><!--  /.END OF CONTAINER-FLUID -->
		
	</div><!-- /.content-wrapper -->
</div><!-- /.wrapper container -->



<!--- start of javascript -->


        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#additemtocart').click(function() {
                    var cartObj = {};
                    cartObj['type'] = 'addprod';
                    cartObj['prodId'] = '<?php echo $viewProd->prodId ?>';
                    cartObj['variation'] = '<?php echo $viewProd->variation ?>';
                    <?php if($viewProd->variation) { ?>
                    cartObj['varItems'] = {};
                    $(".prd-variations").each(function() {
                        cartObj['varItems']['"' + this.id + '"'] = this.value;
                    });
                        <?php } ?>
                    cartObj['quantity'] =  document.getElementById("cart-qty").value;
                    $.ajax({
                        type: "POST",
                        url: "/scripts/cart.php",
                        data: cartObj,
                        cache: false,
                        success: function(result){
					 	var cItem = JSON.parse(result);
							if(cItem.success == 1)
							{
                                $("#update-portable-cart").click();
                                $('#cart-success-message-id').html('Item Added');
							}
							else
							  $('#cart-success-message-id').html('Failed');
                        }
                    });
                });
            });

        </script>
<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->