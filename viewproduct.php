<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('/overhead.php');

if($_GET){
    $prodID  = $_GET['product'];
}

$viewProd = new Product();
$viewProd = $viewProd->returnProduct($prodID);

if(!$viewProd->proName)
    header('Location: /index.php');

if(!$viewProd->virtual)
{
    $tmp = new Physical();
    $viewProd = $tmp->selectPhysicalProduct($viewProd->prodId);
    if($viewProd->variation){
         $viewProd->getAllVariations($viewProd->prodId);
    }
}

$title = $viewProd->proName. ' | Comercio' ;  // page title

?>
<!-- -------------------------------------- Header Start, Do not touch ----------------------------------------- -->
<!DOCTYPE html>
<html>
	<head>
        <link href="/css/gallery.style.css" rel="stylesheet" type="text/css" />
        <script src="/Gallery/photogallery/jquery-ajax.js"> </script>
        <script src="/Gallery/photogallery/galleria-1.2.9.min.js"></script> 
        <?php include('header.php'); ?>
<!-- -------------------------------------- Add Page Edits Below ----------------------------------------------- -->    

<div class="wrapper container">
	<div class="content-wrapper">	
		<div class="row col-md-12 col-lg-12">
			<div class="">
				
				<div class="col-md-6 carousel-bounding-box" id="slider"> <!-- product slider, carousel -->

				<div id="imagegallery">
                    <div id="galleria">
                        <img src="/content/products/prodthumbnail/<?php echo $viewProd->prodId ?>.jpg" data-title=""/>
                        <!-- multiple images -->
                        <?php foreach($viewProd->prodImages as $imSrc)
                                echo '<img src="/content/products/prodimages/'.$imSrc.'.jpg" data-title=""/>';
                        ?>
                    </div>
                </div>
					
					
				</div>

				<div class="col-md-6">
					<div class="product-title"><?php echo  $viewProd->proName ; ?></div>
					<div class="product-desc"><?php echo $viewProd->proTag ; ?> </div>
					<div class="product-rating"><?php echo $viewProd->getBadges(); ?> </div>
					<hr>
                    <p>
                    <table>

                    <?php
                    echo 'Category : '. $viewProd->getCategory() .'<br>' ;
                    if($viewProd->virtual)
                    echo 'Virtual : Yes';
                    else {
                        if($viewProd->shipCst == 0)
                        echo '<b>Free Shipping!!</b><br>';
                        else {
                            echo 'Shipping : $' . $viewProd->shipCst . '<br>';
                            if($viewProd->multiByq)
                                echo 'Shipping will be multiplied by quantity';
                        }
                    }
                    ?>
                    </table>


                    </ul>

                    </p>


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
                                <a href="/customizeproduct.php?product=<?php echo $viewProd->prodId ?>" type="button" class="btn btn-success">
                                    Edit Product
                                </a>
                    </div>
                    <?php } ?>
                </div> <!--/.end of product slider -->
			</div>
		</div><!-- end of row col-md-12 col-lg-12 -->

<!-- product description, customer reviews -->
			<div class="container-fluid">		
				<div class="col-md-12 product-info">
					<ul id="myTab" class="nav nav-tabs nav_tabs">
						
						<li class="active"><a href="#service-one" data-toggle="tab">DESCRIPTION</a></li>
						<li><a href="#service-two" data-toggle="tab">REVIEWS</a></li>
						
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active" id="service-one">
						 
							<section class="container product-info">

                                <p>Product By <b><?php echo $viewProd->getShopName() ?></b>
                                <a href="/viewshop.php?shop=<?php echo $viewProd->shopId?>" type="button" class="btn btn-success">
                                    Visit Shop
                                </a> </p>

                               <p> <?php echo $viewProd->description ?> </p>

                                <?php if(!$viewProd->virtual) {  ?>
                                    <?php if($viewProd->width)
                                        echo 'Width : '. $viewProd->width . ' cm<br>';
                                        if($viewProd->height)
                                            echo 'Height : '. $viewProd->height. ' cm<br>';
                                        if($viewProd->length)
                                            echo ' Length : '. $viewProd->length. ' cm<br>';
                                        if($viewProd->weight)
                                            echo 'Weight : '.$viewProd->weight . ' kg<br>';
                                        ?>
            			        <?php } ?>
							</section>
										  
						</div>
					<div class="tab-pane fade" id="service-two">

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
                                        <?php include('comments.php'); ?>
                    
					</div><!--  /.END **OF tab-pane fade id=service-two -->

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
<script>
    Galleria.loadTheme('/Gallery/photogallery/galleria.classic.min.js');  // Load the classic theme
    Galleria.run('#galleria'); // Initialize Galleria
</script>

<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->