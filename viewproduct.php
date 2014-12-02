<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');


//don't show add to cart if seller is same as product shop owner, instead show edit product. Also don't show quantity box

$prodID = 1000000;
//vartiation
$varid = 1 ; $varval = 'Red';
$variation = 0;


if($_GET){
    $prodID  = $_GET['product'];
}

$viewProd = new Product();
$viewProd = $viewProd->returnProduct($prodID);


$prodtitle = $viewProd->proName ;
$viewfrom = 'Comercio';  // Or Shop Name
$title = $prodtitle. ' | '. $viewfrom ;  // page title


?>



<!---------------------------------------- Header Start, Do not touch ------------------------------------------->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>
<!---------------------------------------- Add Page Edits Below ------------------------------------------------->    


<a href="cart.php">Add to cart button</a> 
back to shop/home button

if viewer is  seller link to editproduct.php 

<!-- form Select quantity and submit to add to cart page-->
<br>
        <h1> <?php echo $prodtitle ; ?>  </h1>

        <?php if($variation) { ?>

            combo boxes to select variations

        <?php } ?>


            input quantity box <br><br><br><br><br>


        <input type="button" id="additemtocart" value="Add To Cart">
        <div id="cart-success-message-id"></div>



        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#additemtocart').click(function() {
                    var cartObj = {};
                    cartObj['prodId'] = '<?php echo $viewProd->prodId ?>';
                    cartObj['variation'] = '<?php echo $viewProd->variation ?>';
                    <?php if($variation) { ?>
                    cartObj['variationId'] = '<?php echo $varid ;//echo variation ID?>';
                    cartObj['variationVal'] = '<?php echo $varval; //echo variation value name  ?>';
                    <?php } ?>
                    cartObj['quantity'] = '<?php echo 2 ;//echo quantity taken from text box ?>';

                    $.ajax({
                        type: "POST",
                        url: "/scripts/addtocart.php",
                        data: cartObj,
                        cache: false,
                        success: function(result){
						// $('#sth1').html(result);
	//			/*		
						var cItem = JSON.parse(result);
							if(cItem.success == 1)
							{
							/*	var nItem = cItem.itemAr;
								var cartDiv = '<div class="row"> <div class="col-xs-2"><img class="img-responsive" src="/content/products/prodthumbnail/'+
                                    nItem['imageLoc']+ '.jpg"> </div><div class="col-xs-4"> <h4 class="product-name"><strong>' +
                                    nItem['prodTitle'] + '</strong></h4><h4><small>' +
                                    nItem['prodDesc'] + '</small></h4> </div> <div class="col-xs-6"> <div class="col-xs-6 text-right"> <h6><strong>' +
                                    nItem ['prodPrice'] + '<span class="text-muted">x</span></strong></h6> </div> <div class="col-xs-4">' +
                                    '<input type="text" class="form-control input-sm" value="' +  cartObj['quantity'] + '"> </div> ' +
                                    '<div class="col-xs-2"> <button type="button" class="btn btn-link btn-xs"> <span class="glyphicon glyphicon-trash"> </span> ' +
                                    '</button> </div> </div> </div> <hr>' ; */
								$("#portable-cart").append(cItem.itemAr);
                                $('#cart-success-message-id').html('Item Added To Cart');
                                var getTotal = document.getElementById("portable-total-a");
                                var total = parseFloat(getTotal.innerHTML) + parseFloat(cItem.totalCost);
                                total = total.toFixed(2);
                                $('#portable-total-b').html(total);
                                $('#portable-total-a').html(total);
							}
							else
							  $('#cart-success-message-id').html('Failed'); //*/
                        }
                    });
                });
            });

        </script>
<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->