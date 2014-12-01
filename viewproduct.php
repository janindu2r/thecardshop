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
<br><br>

<?php
echo $_POST["pro_ID"]."<br>";
echo $_POST["pro_name"]."<br>";
echo $_POST["description"]."<br>";
echo $_POST["pro_price"]."<br>";
echo $_POST["sel_unit"]."<br>";
echo $_POST["stock"]."<br>";

include('..comercio/class/ProductClass');

$anthr = new ProductClass();
$anthr.viewProduct();


?>
<a href="cart.php">Add to cart button</a> 
back to shop/home button

if viewer is  seller link to editproduct.php 


<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->