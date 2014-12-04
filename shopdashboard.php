<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');
$shopname = 'Shop Name';
$title = 'Dashboard | '.$shopname  ;  // page title


?>
<!---------------------------------------- Header Start, Do not touch ------------------------------------------->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>
<!---------------------------------------- Add Page Edits Below ------------------------------------------------->    

Shop options

<a href="editshop.php">Edit Shop Layout</a>
<a href="addproduct.php">Add Product</a>
<a href="viewproductlist.php">View products owned by the seller</a>

<!---------------------------------------- End of page edits ---------------------------------------------------->
<?php include('footer.php'); //including the footer?>
<!-- End of page -->