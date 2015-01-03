<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('/overhead.php');
$title = 'Process Shipping' ;  // page title

if($_GET){
if(isset($_GET['order'])){
        $order = new Order();
        $order->getOrder($_GET['order']);
}
}

?>
<!-- -------------------------------------- Header Start, Do not touch ----------------------------------------- -->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>


<!---------------------------------------- Add Page Edits Below ------------------------------------------------->
<div class="container">
    <div class="row">
        <div class="col-md-12">
    		<div class="invoice-title">
				<br>
    			<h4>Order #  <?php echo $order->orderId ?></h4>
				<br>
    		</div>
		</div>
				<div class="col-md-12 alert alert-info">
					<div class="col-md-6">
						<address>
							<strong>Bill To:</strong><br>
							<?php echo $order->getFullName().'<br>' ;?>
							<?php echo $order->billingAd[1] .'<br>'; ?>
							<?php echo $order->billingAd[2] .'<br>'; ?>
							<?php echo $order->billingAd[3] .'<br>'; ?>
							<?php echo $order->billingAd[4] .'<br>'; ?>
						</address>
					</div>
					<div class="col-md-6 text-right">
						<address>
							<strong>Ship To:</strong><br>
							<?php echo $order->shippingAd[0] .'<br>'; ?>
							<?php echo $order->shippingAd[1] .'<br>'; ?>
							<?php echo $order->shippingAd[2] .'<br>'; ?>
							<?php echo $order->shippingAd[3] .'<br>'; ?>
							<?php echo $order->shippingAd[4] .'<br>'; ?>
						</address>
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
									<th>Image</th>
									<th>Item</th>
									<th class="text-center">Quantity</th>
									<th class="text-right">Item Total</th>
									<th class="text-right">Shipping Total</th>
									<th class="text-right">Total</th>
									<th class="text-center">Shipping</th>
                                </tr>
    						</thead>
    						<tbody>
							<?php
							if($order->simpleProds){
							foreach($order->simpleProds as $obj) {
								if($obj->getSeller() == $user->getRegID()) {
									$obj->getOrderDetails();
								?>
								<tr>
									<td><img width="80px" src="/content/products/prodthumbnail/<?php echo $obj->cProduct->prodId ?>.jpg"></td>
									<td><?php echo $obj->cProduct->proName ?> <br>
									<span style="color: #555555; font-size: 0.8em"> <?php echo $obj->cProduct->prodId ?> </span>
									</td>
									<td class="text-center"><?php echo $obj->quantity ?></td>
									<td class="text-right"><?php echo $order->toDec($obj->itemsTotal) ?> $</td>
									<td class="text-right"><?php echo $order->toDec($obj->shippingCost) ?> $</td>
									<td class="text-right"><?php echo $order->toDec($obj->calcShippingCost()) ?> $</td>
									<td class="text-center">
										<?php if($obj->shippedDate)
												echo 'Shipped on '. $obj->shippedDate;
										else { ?>
										<form class="navbar-form" action="/scripts/selleredit.php" method="post">
											<div class="input-group stylish-input-group">
												<input type="text" class="form-control" placeholder="Location" name="location" >
												<input type="hidden" name="var" value="0">
												<input type="hidden" name="order" value="<?php echo $order->orderId ?>">
												<input type="hidden" name="product" value="<?php echo $obj->cProduct->prodId ?>">
														<span class="input-group-addon">
															<button type="submit">
																<span class="glyphicon glyphicon-pencil"></span>
															</button>
														</span>
											</div>
										</form>
											<?php } ?>
									</td>
								</tr>
							<?php } //end if
							 } //end foreach
							}//end if
							if($order->varProds)
							{
								foreach($order->varProds as $obj){
									if($obj->getSeller() == $user->getRegID()){
										$obj->getOrderDetails();
									?>
										<td><img width="80px" src="/content/products/prodthumbnail/<?php echo $obj->cProduct->prodId ?>.jpg"></td>
										<td><?php echo $obj->cProduct->proName ?> <br>
											<span style="color: #555555; font-size: 0.8em"> <?php echo $obj->cProduct->prodId ?> </span> <br>
											<div style="font-size: 0.7em; margin: 5px"><table class="table"><tbody>
													<?php
													foreach($obj->cartVGroup as $k => $v)
														echo  '<tr><td><b>' .$k . '</b></td><td>' . $v .'</td></tr>'; ?>
													</tbody></table></div>
										</td>
										<td class="text-center"><?php echo $obj->quantity ?></td>
										<td class="text-right"><?php echo $order->toDec($obj->itemsTotal) ?> $</td>
										<td class="text-right"><?php echo $order->toDec($obj->shippingCost) ?> $</td>
										<td class="text-right"><?php echo $order->toDec($obj->calcShippingCost()) ?> $</td>
										<td class="text-center">
											<?php if($obj->shippedDate)
												echo 'Shipped on '. $obj->shippedDate;
											else { ?>
												<form class="navbar-form" action="/scripts/selleredit.php" method="post">
													<div class="input-group stylish-input-group">
														<input type="text" class="form-control" placeholder="Location" name="location" >
														<input type="hidden" name="var" value="1">
														<input type="hidden" name="order" value="<?php echo $order->orderId ?>">
														<input type="hidden" name="product" value="<?php echo $obj->groupId ?>">
														<span class="input-group-addon">
															<button type="submit">
																<span class="glyphicon glyphicon-pencil"></span>
															</button>
														</span>
													</div>
												</form>
											<?php } ?>
										</td>

							<?php } //end if
									} //end foreach
							} //end if ?>


    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>

    </div>
  <p align="right">
	  <a href="?order=<?php echo $order->orderId ?>" class="btn btn-lg btn-custom"> Refresh </a>
	  <a href="/dashboard.php" class="btn btn-lg btn-success"> Back to Dashboard </a>
  </p>
</div>

<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->