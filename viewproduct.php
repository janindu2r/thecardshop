<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');


//don't show add to cart if seller is same as product shop owner, instead show edit product. Also don't show quantity box

$prodID = 1000000;

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


$prodtitle = $viewProd->proName;
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

        <button id="update-portable-cart">Btn</button>

        <form>
            <?php if(!$viewProd->virtual) { //condition check needed for each of these to see if the value is null. only echo if not ?>
                Dimensions <br>
                Width : <?php echo $viewProd->width ?> <br>
                Height : <?php echo $viewProd->height ?> <br>
                Length : <?php echo $viewProd->length ?> <br>
                Weight: <?php echo $viewProd->weight ?><br>
            <?php }

          if($viewProd->variation) {
                echo '<br><br>Variations<br><br><table>';
                foreach($viewProd->varIdNames as $key => $val)
                {
                    echo '<tr><td>'.$val.'</td><td>';
                    echo '<select id="'.$key.'">';
                    foreach($viewProd->varNameValues[$val] as $varVl)
                    {
                        echo '<option value="'. $varVl. '">'. $varVl .'</option>';
                    }
                    echo  '</select></td></tr>';
                }
                echo '</table>';
             }   ?>

        </form>


           Quantity : <input type="number" id="cart-qty" value="1" min="1" size="20" max="999"> <br>


        <input type="button" id="additemtocart" value="Add To Cart">
        <div id="cart-success-message-id"></div>



        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#additemtocart').click(function() {
                    var cartObj = {};
                    cartObj['prodId'] = '<?php echo $viewProd->prodId ?>';
                    cartObj['variation'] = '<?php echo $viewProd->variation ?>';
                    <?php if($viewProd->variation) { ?>
                    cartObj['variationId'] = '<?php echo $varid ;//echo variation ID?>';
                    cartObj['variationVal'] = '<?php echo $varval; //echo variation value name  ?>';
                    <?php } ?>
                    cartObj['quantity'] =  document.getElementById("cart-qty").value;
                    $.ajax({
                        type: "POST",
                        url: "/scripts/addtocart.php",
                        data: cartObj,
                        cache: false,
                        success: function(result){
						var cItem = JSON.parse(result);
							if(cItem.success == 1)
							{
                                $()

                                $("#portable-cart").html(cItem.itemAr);
                                    $('#cart-success-message-id').html('Item Added To Cart');
                                    var total = parseFloat(cItem.totalCost);
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