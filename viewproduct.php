<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');

$prodtitle = 'Product Title';
$viewfrom = 'Comercio';  // Or Shop Name
$title = $prodtitle. ' | '. $viewfrom ;  // page title

$prodID = 1000001;
$varid = 1 ; $varval = 'Blue';
$variation = 1;

?>
<!---------------------------------------- Header Start, Do not touch ------------------------------------------->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>
<!---------------------------------------- Add Page Edits Below ------------------------------------------------->    

product page 
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
                    cartObj['prodId'] = '<?php echo $prodID?>';
                    cartObj['variation'] = '<?php echo $variation?>';
                    <?php if($variation) { ?>
                    cartObj['variationId'] = '<?php echo $varid ;//echo variation ID?>';
                    cartObj['variationVal'] = '<?php echo $varval; //echo variation value name  ?>';
                    <?php } ?>
                    cartObj['quantity'] = '<?php echo 2 ;//echo quantity ?>';

                    $.ajax({
                        type: "POST",
                        url: "/scripts/addtocart.php",
                        data: cartObj,
                        cache: false,
                        success: function(result){
                            $('#sth1').html(result);
                        }
                    });
                });
            });

        </script>
<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->