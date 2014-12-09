<!-- add session initiation and other similar necessary php stuff below -->
<?php
include('overhead.php');

$title = '' ;  // page title


?>
<!-- **************************** Header Start, Do not touch **************************** -->
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php'); ?>
<!-- *****************************    Add Page Edits Below   **************************** -->    
<div class="RegWrapper" id="SignUpWrapper">
	<div class="container">
		<div class="row">
			<form name=" addproduct " method="POST" action= " /scripts/addtoproduct.php " enctype="multipart/form-data" >

			</form><!-- /.end of add product -->
		</div>
	</div>
</div>

<!-- *****************************      End of page edits 	 **************************** -->
<?php include('footer.php'); //including the footer?>
<!-- End of page