<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');
$title = 'Order' ;  // page title

if(isset($_GET['order'])){
        $order = new Order();
        $order->getOrder($_GET['order']);
}


?>
<!---------------------------------------- Header Start, Do not touch ------------------------------------------->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>
<!---------------------------------------- Add Page Edits Below ------------------------------------------------->    


        Your order has been placed.<br>
        Order ID  - <?php echo $_GET['order'] ?> <br>
        And the order Status is - <?php echo $_GET['status'] ?><br>


<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->