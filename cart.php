<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');
$title = 'Cart' ;  // page title


?>
<!-- -------------------------------------- Header Start, Do not touch ----------------------------------------- -->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>
<!-- -------------------------------------- Add Page Edits Below ----------------------------------------------- -->
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
        	<h1>Shopping Cart <span class="fa fa-shopping-cart"></span></h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-right">Unit Price</th>
                        <th class="text-right">Items Total</th>
                        <th class="text-right">Shipping</th>
                        <th class="text-right">Total</th>
                        <th class="col-sm-1 col-md-1"> </th>
                    </tr>
                </thead>
                <tbody>
                <?php echo $cart->getCompleteStaticCart() ?>

                    <tr>
                        <td colspan="5" class="text-right"><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>$<?php echo $cart->toDec($cart->cartSubTotal)?></strong></h5></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right"><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>$<?php echo $cart->toDec($cart->cartEstShipping)?></strong></h5></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right"><h3>Total</h3></td>
                        <td class="text-right"><h3>$<?php echo $cart->toDec($cart->cartTotal)?></h3></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <a href="" type="button" class="btn btn-default">
                                Update Cart
                            </a>
                        </td>
                        <td colspan="4" class="text-right">
                        <a href="/index.php" type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </a></td>
                        <td>
                        <a href="/order.php" type="button" class="btn btn-success btn-block">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </a></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->