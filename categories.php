<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');

if($_GET && isset($_GET['id']))
    $catId = $_GET['id'];
else
    header('location: /index.php');

$catName = '';

$title = 'Category' ;  // page title


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