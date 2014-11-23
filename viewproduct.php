<!-- add session initiation and other similar necessary php stuff below -->
<?php

$prodtitle = 'Product Title';
$viewfrom = 'Comercio';  // Or Shop Name
$title = $prodtitle. ' | '. $viewfrom ;  // page title


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


<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->