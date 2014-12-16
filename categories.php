<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');

$catId = 0;
if($_GET && isset($_GET['id']))
    $catId = $_GET['id'];
else
    header('location: /index.php');

$category = new Category();

$title =   $category->getCatName($catId).' | Category' ;  // page title
$catList =  $category->getCatProdList($catId, 0, 4);

?>
<!-- **************************** Header Start, Do not touch **************************** -->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>
<!-- *****************************    Add Page Edits Below   **************************** -->










<!-- *****************************      End of page edits 	 **************************** -->
<?php include('footer.php'); //including the footer?>
<!-- End of page