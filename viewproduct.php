<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');

$prodID = 1000000; //GET variable from url. Or post variable
$viewProd = new Product();
$viewProd = $viewProd->returnProduct($prodID);


$prodtitle = $viewProd->proName ;
$viewfrom = 'Comercio';  // Or Shop Name
$title = $prodtitle. ' | '. $viewfrom ;  // page title

//vartiation 
$varid = 1 ; $varval = 'Red';
$variation = 0;

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

        <input type="button" id="additemtocart" value="Add To Cart">
        <div id="sth1"></div>



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
								var nItem = cItem.itemAr;
								
								var cartDiv = 'Product Title :' + nItem['prodTitle'] + ' | Product Description :' + 
								nItem['prodDesc'] + '| Cost :' + nItem['totalCost'] 
								$('#sth1').html(cartDiv);					
							} 
							else
							  $('#sth1').html('Failed'); //*/
                        }
                    });
                });
            });

        </script>
<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->