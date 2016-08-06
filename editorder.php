<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('/overhead.php');
$title = 'Process Orders' ;  // page title

if(isset($_GET['order'])){
        $order = new Order();
        $order->getOrder($_GET['order']);
}

if($order->userId != $user->getRegID())
	header('location: /index.php');

?>
<!-- -------------------------------------- Header Start, Do not touch ----------------------------------------- -->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>

		<!-- start of javascript functions-->
		<script>
			$(document).ready(function() {
				$(document).on('change', '.item-received', function () {
					var dataString = 'id=' + this.id;
					$.ajax({
						type: "POST",
						url: "/scripts/buyeredit.php",
						data: dataString,
						cache: false,
						success: function(result){
							if(result == 1)
								alert('Order item successfully Marked as shipped');
						}
					});
				});
			});
		</script>

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
									<th class="text-right">Total</th>
									<th class="text-center">Order Status</th>
									<th>Details</th>
                                </tr>
    						</thead>
    						<tbody>
							<?php
							if($order->simpleProds){
							foreach($order->simpleProds as $obj) {
									$obj->getOrderDetails();
								?>

								<tr>
									<td><img width="80px" src="/content/products/prodthumbnail/<?php echo $obj->cProduct->prodId ?>.jpg"></td>
									<td><?php echo $obj->cProduct->proName ?></td>
									<td class="text-center"><?php echo $obj->quantity ?></td>
									<td class="text-right"><?php echo $order->toDec($obj->calcShippingCost()) ?> $</td>
									<td class="text-center">
										<?php if($obj->receivedDateTime)
												echo 'Received';
										else {
											?>
											<select class="form-group-sm item-received" name="itemUpdate" id="<?php echo '0-'.$order->orderId.'-'.$obj->cProduct->prodId ?>">
												<option value="Placed"  selected disabled>Placed</option>
												<option value="Received">Received</option>
											</select> <?php } ?>
									</td>
									<td>
										<?php
										if($obj->receivedDateTime)
											echo 'Recieved on '. $obj->receivedDateTime . '<br>';
										else if($obj->shippedDate)
											echo 'Shipped on '.$obj->shippedDate . '<br>';
										else
											echo 'No details available at the moment';
										?>
									</td>
								</tr>
							<?php } //end foreach
							}//end if
							if($order->varProds)
							{
								foreach($order->varProds as $obj){
									$obj->getOrderDetails();
									?>
									<tr>
										<td><img width="80px" src="/content/products/prodthumbnail/<?php echo $obj->cProduct->prodId ?>.jpg"></td>
										<td><?php echo $obj->cProduct->proName ?>
											<div style="font-size: 0.8em; margin: 5px"><table class="table"><tbody>
													<?php
													foreach($obj->cartVGroup as $k => $v)
														echo  '<tr><td><b>' .$k . '</b></td><td>' . $v .'</td></tr>'; ?>
													</tbody></table></div>
										</td>
										<td class="text-center"><?php echo $obj->quantity ?></td>
										<td class="text-right"><?php echo $order->toDec($obj->calcShippingCost()) ?> $</td>
										<td class="text-center">
											<?php	if($obj->receivedDateTime)
															echo 'Recieved';
											else {
											?>
											<select class="form-group-sm item-received" name="itemUpdate" id="<?php echo '1-'.$order->orderId.'-'.$obj->groupId ?>">
												<option value="Placed"  selected disabled>Placed</option>
												<option value="Recieved">Recieved</option>
											</select> <?php } ?> </td>
										<td>
											<?php
											if($obj->receivedDateTime)
												echo 'Recieved on '. $obj->receivedDateTime . '<br>';
											else if($obj->shippedDate)
												echo 'Shipped on '.$obj->shippedDate . '<br>';
											else
												echo 'No details available at the moment';
											?>
										</td>
									</tr>
							<?php	} //end foreach
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