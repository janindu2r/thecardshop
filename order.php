<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');
$title = 'Order' ;  // page title

if(isset($_GET['order'])){
        $order = new Order();
        $order->getOrder($_GET['order']);
}
if(isset($_GET['status'])) {
	if ($_GET['status'] == 'paid') {
		//update order status to paid, and change the value in the object here
	}
}

?>
<!-- -------------------------------------- Header Start, Do not touch ----------------------------------------- -->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>
<!-- -------------------------------------- Add Page Edits Below ------------------------------------------------->
<div class="container">
    <div class="row">

        <div class="col-md-12">
		
    		<div class="invoice-title">
    			<h2>Invoice</h2>
    			<hr>
    			<h3 class="pull-left">Order #  <?php echo $order->orderId ?></h3>
    		</div>
    		
    		<div class="row">
    			<div class="col-md-12 alert alert-info">
    				
		    			<div class="col-md-6">
		    				<address>
		    				<strong>Billed To:</strong><br>
								<?php
								$buyer = new User();
								$buyer->makeUser($order->userId);
								echo $buyer->getProfile();
								?>
		    					<?php echo $order->billingAd[1] .'<br>'; ?>
								<?php echo $order->billingAd[2] .'<br>'; ?>
								<?php echo $order->billingAd[3] .'<br>'; ?>
								<?php echo $order->billingAd[4] .'<br>'; ?>
		    				</address>
		    			</div>
		    			<div class="col-md-6 text-right">
		    				<address>
		        			<strong>Shipped To:</strong><br>
								<?php echo $order->shippingAd[0] .'<br>'; ?>
								<?php echo $order->shippingAd[1] .'<br>'; ?>
								<?php echo $order->shippingAd[2] .'<br>'; ?>
								<?php echo $order->shippingAd[3] .'<br>'; ?>
								<?php echo $order->shippingAd[4] .'<br>'; ?>
		    				</address>
		    			</div>
    				
    			</div>
    		<div class="col-md-12 alert alert-warning">
	    		<div class="#">
	    			<div class="col-md-6">
						<address><strong>Order Status</strong><br>
							<?php echo $order->orderStatus ?>
						</address>
						<?php if($order->buyerNote != '') { ?>
						<address><strong>Buyer Note</strong><br>
							<?php echo $order->buyerNote ?>
						</address>
						<?php } ?>
						<!--address>
                            <strong>Payment Method:</strong><br>
                            Visa ending **** 4242<br>
                            jsmith@email.com
                        </address -->
	    			</div>
	    			<div class="col-md-6 text-right">
	    				<address>
	    					<strong>Order Date:</strong><br>
	    				<?php echo date("Y F d, l", strtotime($order->dateTime)) ?> <br>
	    				</address>
						<address>
							<strong>Order Time:</strong><br>
							<?php echo date("h:i A ", strtotime($order->dateTime)) ?> <br>
						</address>
	    			</div>
	    		</div>
    		</div>
    		</div>
    	
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
									<th><strong>Item</strong></th>
									<th class="text-center"><strong>Quantity</strong></th>
									<th class="text-right"><strong>Unit Price (Current)</strong></th>
									<th class="text-right"><strong>Items Total</strong></th>
									<th class="text-right"><strong>Shipping</strong></th>
									<th class="text-right"><strong>Total</strong></th>
                                </tr>
    						</thead>
    						<tbody>
							<?php
							if($order->simpleProds){
							foreach($order->simpleProds as $obj) { ?>
								<tr>
									<td><?php echo $obj->cProduct->proName ?></td>
									<td class="text-center"><?php echo $obj->quantity ?></td>
									<td class="text-right"><?php echo $order->toDec($obj->cProduct->proPrice) ?> $</td>
									<td class="text-right"><?php echo $order->toDec($obj->itemsTotal) ?> $</td>
									<td class="text-right"><?php echo $order->toDec($obj->shippingCost) ?> $</td>
									<td class="text-right"><?php echo $order->toDec($obj->calcShippingCost()) ?> $</td>
								</tr>
							<?php } //end foreach
							}//end if
							if($order->varProds)
							{
								foreach($order->varProds as $obj){ ?>
									</tr>
									<td><?php echo $obj->cProduct->proName ?>
									<div style="font-size: 0.8em; margin: 5px"><table class="table"><tbody>
											<?php
												foreach($obj->cartVGroup as $k => $v)
												echo  '<tr><td><b>' .$k . '</b></td><td>' . $v .'</td></tr>'; ?>
											</tbody></table></div>
									</td>
									<td class="text-center"><?php echo $obj->quantity ?></td>
									<td class="text-right"><?php echo $order->toDec($obj->cProduct->proPrice) ?> $</td>
									<td class="text-right"><?php echo $order->toDec($obj->itemsTotal) ?> $</td>
									<td class="text-right"><?php echo $order->toDec($obj->shippingCost) ?> $</td>
									<td class="text-right"><?php echo $order->toDec($obj->calcShippingCost()) ?> $</td>
									</tr>
							<?php	} //end foreach
							} //end if ?>

							<tr>
								<td colspan="5" class="text-right"><h5>Subtotal</h5></td>
								<td class="text-right"><h5><strong>$<?php echo  $order->toDec($order->subTotal)?></strong></h5></td>
								<td></td>
							</tr>
							<tr>
								<td colspan="5" class="text-right"><h5>Shipping Total</h5></td>
								<td class="text-right"><h5><strong>$<?php echo $order->toDec($order->shippingTotal) ?></strong></h5></td>
								<td></td>
							</tr>
							<tr>
								<td colspan="5" class="text-right"><h3>Total</h3></td>
								<td class="text-right"><h3>$<?php echo $order->toDec($order->total) ?></h3></td>
								<td></td>
							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>

    </div>
    <a href="/dashboard.php" class="btn btn-block btn-lg btn-success"> Back to Dashboard </a>
</div>

<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->