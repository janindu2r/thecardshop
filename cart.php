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
                        <th class="text-right">Shipping</th>
                        <th class="text-right">Total</th>
                        <th class="col-sm-1 col-md-1"> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left"id="cart-picture"  href="#"><img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"></a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Product name</a></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                                <span class="text-warning"><strong>Leaves warehouse in 2 - 3 weeks</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1" style="text-align: center">
                        	
                        <input type="number" class="form-control input-sm" id="exampleInputnumber1" value="3">
                        </td>
                        <td class="col-sm-1 col-md-1 text-right"><strong>$4.87</strong></td>
                        <td class="col-sm-1 col-md-1 text-right"><strong>$4.87</strong></td>
                        <td class="col-sm-1 col-md-1 text-right"><strong>$14.61</strong></td>
                        <td class="col-sm-1 col-md-1 text-right">
                            <button type="button" class="btn btn-sm btn-danger">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>$24.59</strong></h5></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>$31.53</strong></h3></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td class="text-right">
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
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