<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');
$title = 'Order' ;  // page title

if(isset($_GET['order'])){
        $order = new Order();
        $order->getOrder($_GET['order']);
}


?>
<!-- -------------------------------------- Header Start, Do not touch ----------------------------------------- -->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>
<!-- -------------------------------------- Add Page Edits Below ----------------------------------------------- -->    


        Your order has been placed.<br>
        Order ID  - <?php echo $_GET['order'] ?> <br>
        And the order Status is - <?php echo $_GET['status'] ?><br>

<div class="container">
    <div class="row">

        <div class="col-md-12">
		
    		<div class="invoice-title">
    			<h2>Invoice</h2>
    			<hr>
    			<h3 class="pull-left">Order # 12345</h3>
    		</div>
    		
    		<div class="row">
    			<div class="col-md-12 alert alert-info">
    				
		    			<div class="col-md-6">
		    				<address>
		    				<strong>Billed To:</strong><br>
		    					John Smith<br>
		    					1234 Main<br>
		    					Apt. 4B<br>
		    					Springfield, ST 54321
		    				</address>
		    			</div>
		    			<div class="col-md-6 text-right">
		    				<address>
		        			<strong>Shipped To:</strong><br>
		    					Jane Smith<br>
		    					1234 Main<br>
		    					Apt. 4B<br>
		    					Springfield, ST 54321
		    				</address>
		    			</div>
    				
    			</div>
    		<div class="col-md-12 alert alert-warning">
	    		<div class="#">
	    			<div class="col-md-6">
	    				<address>
	    					<strong>Payment Method:</strong><br>
	    					Visa ending **** 4242<br>
	    					jsmith@email.com
	    				</address>
	    			</div>
	    			<div class="col-md-6 text-right">
	    				<address>
	    					<strong>Order Date:</strong><br>
	    					March 7, 2014<br><br>
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
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td>BS-200</td>
    								<td class="text-center">$10.99</td>
    								<td class="text-center">1</td>
    								<td class="text-right">$10.99</td>
    							</tr>
                                <tr>
        							<td>BS-400</td>
    								<td class="text-center">$20.00</td>
    								<td class="text-center">3</td>
    								<td class="text-right">$60.00</td>
    							</tr>
                                <tr>
            						<td>BS-1000</td>
    								<td class="text-center">$600.00</td>
    								<td class="text-center">1</td>
    								<td class="text-right">$600.00</td>
    							</tr>
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">$670.99</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Shipping</strong></td>
    								<td class="no-line text-right">$15</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">$685.99</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>

    </div>
    <a href="#" class="btn btn-block btn-lg btn-success">Done </a>
</div>

<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->